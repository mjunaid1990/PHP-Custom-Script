<?php

Class Custom_ajax extends Aj {
    
    function states_list(){
        global $conn;
        if (!empty($_GET['id'])) {
            $id = Secure($_GET['id']);
            $current_lang = isset($_COOKIE['activeLang']) && !empty($_COOKIE['activeLang'])?strtolower($_COOKIE['activeLang']):'english';
            $query = mysqli_query($conn, "SELECT * FROM `states` WHERE `country_id` = $id ");
            if ($query) {
                $data = array(
                    'status' => 200
                );
                $rows = mysqli_fetch_all($query, MYSQLI_ASSOC);
                $html = '<option value="" disabled selected>'.__( 'Choose your state' ).'</option>';
                if($rows) {
                    foreach ($rows as $row) {
                        $html .= '<option value="'. $row['id'] .'"  >'. $row[$current_lang] .'</option>';
                    }
                }
                $data['html'] = $html;
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    
    function cities_list(){
        global $conn;
        if (!empty($_GET['id'])) {
            $id = Secure($_GET['id']);
            $current_lang = isset($_COOKIE['activeLang']) && !empty($_COOKIE['activeLang'])?strtolower($_COOKIE['activeLang']):'english';
            $query = mysqli_query($conn, "SELECT * FROM `cities` WHERE `state_id` = $id ");
            if ($query) {
                $data = array(
                    'status' => 200
                );
                $rows = mysqli_fetch_all($query, MYSQLI_ASSOC);
                $html = '<option value="" disabled selected>'.__( 'Choose your city' ).'</option>';
                if($rows) {
                    foreach ($rows as $row) {
                        $html .= '<option value="'. $row['id'] .'"  >'. $row[$current_lang] .'</option>';
                    }
                }
                $data['html'] = $html;
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    
    function address() {
        global $conn, $db;
        if (isset($_POST) && !empty($_POST)) {
            $current_lang = isset($_COOKIE['activeLang']) && !empty($_COOKIE['activeLang'])?strtolower($_COOKIE['activeLang']):'english';
            $city = isset($_POST['city'])?$_POST['city']:'';
            $state = isset($_POST['state'])?$_POST['state']:'';
            $country = isset($_POST['country'])?$_POST['country']:'';
            $data = array(
                'status' => 200
            );
            $country_row = GetCountryByName($country);
            $state_row = GetStateByNameWithCountryId($state, $country_row['id']);
            if(empty($state_row) && !empty($country_row)) {
                $st_data = [
                    'country_id'=>$country_row['id'],
                    'name'=>$state,
                    'english'=>$state,
                    'lang_key'=>'english',
                ];
                $db->insert('states', $st_data);
                $state_row = GetStateByNameWithCountryId($state, $country_row['id']);
                
            }
            if(empty($city)) {
                $city_row = '';
            }else {
                $city_row = GetCityByNameWithCountryAndState($city, $state_row['id'], $country_row['id']);
                if(empty($city_row) && !empty($country_row) && !empty($state_row)) {
                    $ct_data = [
                        'country_id'=>$country_row['id'],
                        'state_id'=>$state_row['id'],
                        'name'=>$city,
                        'lang_key'=>'english',
                        'english'=>$city
                    ];
                    $db->insert('cities', $ct_data);
                        $city_row = GetCityByNameWithCountryAndState($city, $state_row['id'], $country_row['id']);
                }
            }
            
            $data['address'] = [
                'city'=>$city_row,
                'state'=>$state_row,
                'country'=>$country_row,
                'lang'=>$current_lang
            ];
            
            if($city_row) {
                $db->where('id', auth()->id)->update('users',array('is_location_verified'=>1));
            }
            
            
            
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    
//    suspended verification
    function suspended_identity_verification() {
        global $db, $_UPLOAD, $_DS;
        if (self::ActiveUser() == NULL) {
            return array(
                'status' => 403,
                'message' => __('Forbidden')
            );
        }
        if (!isset($_FILES) && empty($_FILES)) {
            return array(
                'status' => 403,
                'message' => __('Forbidden')
            );
        }
        
        $data['status'] = 200;
        
        
        
        if (!file_exists($_UPLOAD . 'photos' . $_DS . date('Y'))) {
            mkdir($_UPLOAD . 'photos' . $_DS . date('Y'), 0777, true);
        }
        if (!file_exists($_UPLOAD . 'photos' . $_DS . date('Y') . $_DS . date('m'))) {
            mkdir($_UPLOAD . 'photos' . $_DS . date('Y') . $_DS . date('m'), 0777, true);
        }
        $dir = $_UPLOAD . 'photos' . $_DS . date('Y') . $_DS . date('m');
        $ext      = pathinfo($_FILES['identity_file'][ 'name' ], PATHINFO_EXTENSION);
        $key      = GenerateKey();
        $filename = $dir . $_DS . $key . '_full.' . $ext;

        if (move_uploaded_file($_FILES['identity_file'][ 'tmp_name' ], $filename)) {
            $org_file  = 'upload'. $_DS . 'photos' . $_DS . date('Y') . $_DS . date('m') . $_DS . $key . '_full.' . $ext;
            if (is_file($org_file)) {
                $upload_s3 = UploadToS3($org_file, array(
                    'amazon' => 0
                ));
            } 
            $media                 = array();
            $media[ 'user_id' ]    = auth()->id;
            $media[ 'file' ]       = 'upload/photos/' . date('Y') . '/' . date('m') . '/' . $key . '_full.' . $ext;
            $media[ 'created_at' ] = date('Y-m-d H:i:s');
            $media['is_identity'] = 1;
            $db->insert('mediafiles', $media);
            $user = $db->where('id', auth()->id)->getOne('users');
            if($user) {
                $suspended_count = $user['suspended_count'];
                if($suspended_count < 3) {
                    $suspended_count = $user['suspended_count'] + 1;
                    $db->where('id', $user['id'])->update('users',array('suspended_count'=>$suspended_count));
                }
                SendEmailCustom(self::ActiveUser()->email, 6, true, $user);
            }
            $data['success'] = true;
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    
    //cancel subscription
    function cancel_subscription() {
        global $config, $db;
        $payment = Wo_GetPaymentById($_GET['id']);
        if($payment) {
            $data = ['status' => 200];
            if($payment['user_id'] == auth()->id) {
                $data['success'] = true;
                $stripe = array(
                    'secret_key' => $config->stripe_secret,
                    'publishable_key' => $config->stripe_id
                );
                $z= \Stripe\Stripe::setApiKey($stripe[ 'secret_key' ]);
                $stripe_client = new \Stripe\StripeClient($stripe[ 'secret_key' ]);
                if($payment['session_id']) {
                    $stripe_session = \Stripe\Checkout\Session::retrieve($payment['session_id']);
                    
                    if($stripe_session && !empty($stripe_session->subscription)) {
                        $cancel = $stripe_client->subscriptions->cancel(
                                    $stripe_session->subscription,
                                    ['cancel_at_period_end' => true]
                                  );
                        $db->where('id', $payment['id'])->update('payments', array(
                            'is_subscription_cancelled' => 1
                        ));
                        $updated                = $db->where('id', $payment['user_id'])->update('users', array(
                            'pro_time' => time(),
                            'is_pro' => '0',
                            'pro_type' => '0'
                        ));
                    }
                }
            }
            $data['success'] = false;
        }
        
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
        
    }
    
    //enable or disable subscription
    function enable_disable_subscription() {
        global $config, $db;
        $payment = Wo_GetPaymentById($_GET['id']);
        $type = isset($_GET['type'])?$_GET['type']:'';
        if($payment) {
            $data = ['status' => 200];
            if($payment['user_id'] == auth()->id) {
                $data['success'] = true;
                $stripe = array(
                    'secret_key' => $config->stripe_secret,
                    'publishable_key' => $config->stripe_id
                );
                $z= \Stripe\Stripe::setApiKey($stripe[ 'secret_key' ]);
                $stripe_client = new \Stripe\StripeClient($stripe[ 'secret_key' ]);
                if($payment['session_id']) {
                    $stripe_session = \Stripe\Checkout\Session::retrieve($payment['session_id']);
                    
                    if($type == 0) {
                        if($stripe_session && !empty($stripe_session->subscription)) {
                            $cancel = $stripe_client->subscriptions->update(
                                        $stripe_session->subscription,
                                        ['cancel_at_period_end' => true]
                                      );
                            $db->where('id', $payment['id'])->update('payments', array(
                                'is_subscription_cancelled' => 1
                            ));
                        }
                    }else if($type == 1) {
                        if($stripe_session && !empty($stripe_session->subscription)) {
                            $cancel = $stripe_client->subscriptions->update(
                                        $stripe_session->subscription,
                                        ['cancel_at_period_end' => false]
                                      );
                            $db->where('id', $payment['id'])->update('payments', array(
                                'is_subscription_cancelled' => 0
                            ));
                        }
                    }
                }
            }
            $data['success'] = false;
        }
        
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
        
    }
    
    function unset_notification() {
        if (isset($_COOKIE['open_notifications'])) {
            unset($_COOKIE['open_notifications']);
            setcookie('open_notifications', '', time() - 3600, '/'); // empty value and old timestamp
        } 
        $data['success'] = true;
        $data['status'] =  200;
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    
    function show_countdown_timer() {
        global $config;
        $show_clock = false;
        $curr_date = date('Y-m-d');
        $payment = Wo_GetUserLastSubscription(auth()->id);
        $date_end = '';
        $data = [];
        $success = false;
        if(isset($_COOKIE['countdown-'.auth()->id])) {
            $date_end = $_COOKIE['countdown-'.auth()->id];
        }
        if($config->is_countdown_active == 1 && !empty($date_end)) {
            if($config->coupon_repeat_date == $curr_date && empty($payment)) {
                $show_clock = true;
                $data['show_clock'] = true;
            }
        }
        if($show_clock) {
            $success = true;
            $data['show_clock'] = true;
            $data['coupon_code'] = $config->coupon_code;
            $data['hours'] = countdown_seconds();
            $data['coupon_input'] = '<div class="custom-input">
                                                <input type="text" name="coupon_code" id="coupon_code" class="browser-default" placeholder="'.__( 'Coupon Code' ).'" value="">
                                                <div class="apply-coupon" data-text-1="'.__('Apply Now').'" data-text-2="'.__('Applied').'">'.__('Apply Now').'</div>
                                            </div>';
        }
        
        $data['success'] = $success;
        $data['status'] =  200;
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
        
    }
    
    public function daily_credit() {
        global $config;
        $success=false;
        if((int)$config->credit_earn_system == 1){
            $res = RecordDailyCredit();
            if($res) {
                $prof = userProfile(auth()->id);
                $data['balance'] = (int)$prof->balance;
                $data['show'] = auth()->show_daily_credit_popup == 0 ? 'show':'show';
                $data['time'] = daily_credit_time_ago();
                $success = true;
            }
        }
        $data['success'] = $success;
        $data['status'] =  200;
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    
    public function daily_credit_popup() {
        global $db;
        $success=true;
        $db->where('id',auth()->id)->update('users',array('show_daily_credit_popup'=>1));
        $data['success'] = $success;
        $data['status'] =  200;
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    
    //    suspended verification
    function upload_id_verification() {
        global $db, $_UPLOAD, $_DS;
        if (self::ActiveUser() == NULL) {
            return array(
                'status' => 403,
                'message' => __('Forbidden')
            );
        }
        if (!isset($_FILES) && empty($_FILES)) {
            return array(
                'status' => 403,
                'message' => __('Forbidden')
            );
        }
        
        $data['status'] = 200;
        
        
        
        if (!file_exists($_UPLOAD . 'photos' . $_DS . date('Y'))) {
            mkdir($_UPLOAD . 'photos' . $_DS . date('Y'), 0777, true);
        }
        if (!file_exists($_UPLOAD . 'photos' . $_DS . date('Y') . $_DS . date('m'))) {
            mkdir($_UPLOAD . 'photos' . $_DS . date('Y') . $_DS . date('m'), 0777, true);
        }
        $dir = $_UPLOAD . 'photos' . $_DS . date('Y') . $_DS . date('m');
        $ext      = pathinfo($_FILES['identity_file'][ 'name' ], PATHINFO_EXTENSION);
        $key      = GenerateKey();
        $filename = $dir . $_DS . $key . '_full.' . $ext;

        if (move_uploaded_file($_FILES['identity_file'][ 'tmp_name' ], $filename)) {
            $org_file  = 'upload'. $_DS . 'photos' . $_DS . date('Y') . $_DS . date('m') . $_DS . $key . '_full.' . $ext;
            if (is_file($org_file)) {
                $upload_s3 = UploadToS3($org_file, array(
                    'amazon' => 0
                ));
            } 
            $media                 = array();
            $media[ 'user_id' ]    = auth()->id;
            $media[ 'file' ]       = 'upload/photos/' . date('Y') . '/' . date('m') . '/' . $key . '_full.' . $ext;
            $media[ 'created_at' ] = date('Y-m-d H:i:s');
            $media['is_id_verification'] = 1;
            $db->insert('mediafiles', $media);
            
            SendEmailCustom(auth()->email, 17);
            
            $data['success'] = true;
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    
    function initiate_new_converstaion() {
        global $db, $config;
        $data['success'] = false;
        $toid = isset($_POST['toid'])?(int)$_POST['toid']:0;
        $uid = auth()->id;
        $exist = $db->where('toid', $toid)->where('uid', $uid)->getOne('new_message_users_list');
        $profile = $db->where('id', $toid)->getOne('users',array('id, web_device_id'));
        $current_user = $db->where('id', $uid)->getOne('users',array('id, balance'));
        if($exist && $exist['toid']) {
            $data['success'] = true;
            $data['exists'] = true;
            $data['balance'] = (int)$current_user['balance'];
        }else {

            // check if current user has enough trex balance
            
            if((int)$current_user['balance'] >= (int)$config->new_message_trex_cost) {
                $data_insert['uid'] = $uid;
                $data_insert['toid'] = $toid;
                $db->insert('new_message_users_list', $data_insert);

                if (is_numeric($config->new_message_trex_cost) &&  $config->new_message_trex_cost > 0) {

                    $minus_credit = (int)$current_user['balance'] - (int)$config->new_message_trex_cost;
                    $db->where('id', trim($uid))->update('users', array(
                        'balance' => $minus_credit
                    ));
                    $data['balance'] = $minus_credit;
                }

                $data['success'] = true;
            }else {
                $data['success'] = false; // not enough balance
            }
        }
        $data['status'] = 200;
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    
} 