<?php

require_once realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'bootstrap.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor
 */
global $config, $db, $_LIBS;
$stripe = array(
    'secret_key' => $config->stripe_secret,
    'publishable_key' => $config->stripe_id
);
require_once $_LIBS . 'stripe/vendor/autoload.php';
\Stripe\Stripe::setApiKey($stripe['secret_key']);



$payload = @file_get_contents('php://input');
$event = null;
try {
    $event = \Stripe\Event::constructFrom(
                    json_decode($payload, true)
    );
} catch (\UnexpectedValueException $e) {
    // Invalid payload
    echo 'Webhook error while parsing basic request.';
    http_response_code(400);
    exit();
}

if ($endpoint_secret) {
    // Only verify the event if there is an endpoint secret defined
    // Otherwise use the basic decoded event
    $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
    try {
        $event = \Stripe\Webhook::constructEvent(
                        $payload, $sig_header, $endpoint_secret
        );
    } catch (\Stripe\Exception\SignatureVerificationException $e) {
        // Invalid signature
        echo 'Webhook error while validating signature.';
        http_response_code(400);
        exit();
    }
}

if (!empty($event)) {
    switch ($event->type) {
        case "charge.failed":
            $old = $db->objectBuilder()->where('customer', $event->data->object->customer)->where('type', 'PRO')->getOne('payments');
            if ($old) {
                $db->where('id', $old->user_id)->update('users', array(
                    'pro_time' => '0',
                    'is_pro' => '0',
                    'pro_type' => '0'
                ));
                //cancel old subscription
                $db->where('user_id', $old->user_id)->update('payments', array(
                    'is_subscription_cancelled' => 1
                ));
                $user = $db->objectBuilder()->where('id', $old->user_id)->getOne('users');
                if($event->data->object->failure_code == 'card_declined') {
                    SendEmailCustom($user->email, 13);
                }else if($event->data->object->failure_code != null && $event->data->object->failure_code != 'card_declined') {
                    SendEmailCustom($user->email, 14);
                }else {
                    //send email
                    SendEmailCustom($user->email, 12);
                }   
            }else {
//                if($event->data->object->failure_code == 'card_declined') {
//                    SendEmailCustom($event->data->object->billing_details->email, 13);
//                }else if($event->data->object->failure_code != null && $event->data->object->failure_code != 'card_declined') {
//                    SendEmailCustom($event->data->object->billing_details->email, 14);
//                }
            }
            break;

        case "charge.succeeded":
            $old = $db->objectBuilder()->where('customer', $event->data->object->customer)->where('type', 'PRO')->where('is_subscription_cancelled', 0)->orderBy('id','desc')->getOne('payments');
            
            if ($old) {
                
                //RegisterAffRevenue($old->user_id,$old->amount / 100,'membership');
                $old_date = date('Y-m-d',strtotime($old->date));
                $current_date = date('Y-m-d');
                if($current_date > $old_date) {
                    $insert = [
                        'user_id' => $old->user_id,
                        'amount' => $old->amount,
                        'type' => $old->type,
                        'date' => date('Y-m-d h:i:s'),
                        'credit_amount' => 0,
                        'via' => 'Stripe',
                        'session_id' => $old->session_id,
                        'customer' => $event->data->object->customer,
                        'pro_plan' => $old->pro_plan
                    ];
                    $db->insert('payments', $insert);

                    $db->where('id', $old->user_id)->update('users', array(
                        'pro_time' => time(),
                        'is_pro' => '1',
                        'pro_type' => $old->pro_plan
                    ));
    //                
                    $user = $db->objectBuilder()->where('id', $old->user_id)->getOne('users');
                    //send email
                    SendEmailCustom($user->email, 11);
                }
                
            }
            break;
    }
}
http_response_code(200);
