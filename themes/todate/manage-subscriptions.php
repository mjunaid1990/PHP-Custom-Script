<?php if( $config->pro_system == 0 ){?><script>window.location = window.site_url;</script><?php } ?>
<?php if( isGenderFree($profile->gender) === true ){?><script>window.location = window.site_url;</script><?php } ?>
<?php 
$payment = Wo_GetUserLastSubscription($profile->id);
$next_payment_date = $payment?Wo_GetPlanRecurringDate($payment):false;
$curren_date = strtotime(date('Y-m-d'));
$next_payment_due = $next_payment_date?strtotime($next_payment_date):'';

$color = '';
if($next_payment_due) {
    if($curren_date > $next_payment_due) {
        $color = 'color:#e64980;';
    }
}

if($payment) {
    if($payment['pro_plan'] ==  1) {
        $payment_date = $next_payment_date?strtotime('-3 days', strtotime($next_payment_date)):"";
    }else if($payment['pro_plan'] == 2) {
        $payment_date = $next_payment_date?strtotime('-7 days', strtotime($next_payment_date)):"";
    }else if($payment['pro_plan'] == 3) {
        $payment_date = $next_payment_date?strtotime('-15 days', strtotime($next_payment_date)):"";
    }else if($payment['pro_plan'] == 4) {
        $payment_date = $next_payment_date?strtotime('-1 month', strtotime($next_payment_date)):"";
    }
}


$show_renewal_radio = true;
if($curren_date > strtotime($next_payment_date) && ($payment && $payment['is_subscription_cancelled'] == 1)) {
    $show_renewal_radio = false;
}

?>
<style>
    .dt_pro_plans label [type="radio"]:disabled+span {
        background-color: rgba(228, 152, 42, 0.1);
        color: #26a69a;
        box-shadow: inset 0 0 0 2px #26a69a, 0 2px 8px 0px rgb(0 0 0 / 20%);
    }
    .dt_pro_plans label [type="radio"]:disabled+span svg {
        display: block;
        color: #26a69a !important;
    }
    .flex.justify-content-between {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-bottom: 15px;
    }
    .pay_using {
        display: none;
    }
    .pay_using.active {
        display: block;
    }
</style>

<!-- Premium  -->
<div class="to_page_main_head premium">
    
</div>
<div class="container">
	<div class="dt_premium dt_sections">

		<div class="dt_choose_pro">
                    <div class="flex justify-content-between">
                        <div class="left-info">
                            <h2 style="margin-bottom: 5px;"><?php echo __( 'Your activated plan is' );?>: <?php echo $payment?Wo_GetPlanById($payment['pro_plan']):__( 'Free' ); ?></h2>
                            <?php if($curren_date < strtotime($next_payment_date)) { ?>
                                <?php if($payment && $payment['is_subscription_cancelled'] == 1) { ?>
                                    <h4 style="margin-top: 0; font-size: 14px; font-weight: 500;<?php echo $color; ?>"><?php echo __( 'End Date' );?>: <?php echo $next_payment_date; ?></h4>
                                <?php }else { ?>
                                    <h4 style="margin-top: 0; font-size: 14px; font-weight: 500;<?php echo $color; ?>"><?php echo __( 'Renewal Date' );?>: <?php echo $next_payment_date; ?></h4>
                                <?php } ?>
                            <?php } ?>
                            <!--hide renewal button if lifetime plan is selected-->
                            <?php 
                            if(!empty($payment_date) && $payment_date <= $curren_date) {
                            ?>
                            <a href="javascript:void(0);" class="btn btn-primary btn-renew" data-id="<?php echo ( ( $payment ) ? $payment['id'] : '' );?>"> <?php echo __( 'Renew Now' ); ?></a>
                            <?php } ?>
                        </div>
                    
                            <div class="to_mat_input switch" style="margin-bottom: 15px;">
                                <!--hide is lifetime plan is selected-->
                                
                                <?php if($curren_date < strtotime($next_payment_date) && $show_renewal_radio ) { ?>
                                <label style="left: 0; top: 0; font-size: 13px;">
                                            <?php echo __( 'Enable Auto Renew' );?>
                                            <input type="checkbox" name="is_subscription_cancelled" data-id="<?php echo ( ( $payment ) ? $payment['id'] : '' );?>" <?php echo ( ( $payment && $payment['is_subscription_cancelled'] == 0 ) ? 'checked' : '' );?> >
                                            <span class="lever"></span>
                                    </label>
                                <?php } ?>
                            </div>
                    </div>

                    <div class="valign-wrapper dt_pro_plans">
				<div>
					<label>
						<input class="with-gap" name="pro_plan" type="radio" value="<?php echo __( 'Weekly' );?>" data-price="<?php echo (float)$config->weekly_pro_plan;?>" <?php echo $payment && $payment['pro_plan'] == 1?'disabled':''; ?> />
						<span class="pln_name">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m21.28 4.473c-.848-.721-2.109-.604-2.817.262l-8.849 10.835-4.504-3.064c-.918-.626-2.161-.372-2.773.566s-.364 2.205.555 2.83l7.494 5.098 11.151-13.653c.707-.866.592-2.152-.257-2.874z" /></svg>
							<span class="duration"><?php echo __( 'Weekly' );?></span>
							<span class="price"><?php echo $config->currency_symbol . (float)$config->weekly_pro_plan;?></span>
                                                        <?php
                                                        if($payment) {
                                                            if($payment['pro_plan'] == 1) {
                                                                echo '<span class="pln_popular">'.__( 'Current Plan' ).'</span>';
                                                            }
                                                        }
                                                        ?>
						</span>
					</label>
				</div>
				<div>
					<label>
						<input class="with-gap" name="pro_plan" type="radio" value="<?php echo __( 'Monthly' );?>" data-price="<?php echo (float)$config->monthly_pro_plan;?>" <?php echo $payment && $payment['pro_plan'] == 2?'disabled':''; ?> />
						<span class="pln_name">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m21.28 4.473c-.848-.721-2.109-.604-2.817.262l-8.849 10.835-4.504-3.064c-.918-.626-2.161-.372-2.773.566s-.364 2.205.555 2.83l7.494 5.098 11.151-13.653c.707-.866.592-2.152-.257-2.874z" /></svg>
							<span class="duration"><?php echo __( 'Monthly' );?></span>
							<span class="price"><?php echo $config->currency_symbol . (float)$config->monthly_pro_plan;?></span>
							<?php
                                                        if($payment) {
                                                            if($payment['pro_plan'] == 2) {
                                                                echo '<span class="pln_popular">'.__( 'Current Plan' ).'</span>';
                                                            }
                                                        }
                                                        ?>
						</span>
					</label>
				</div>
				<div>
					<label>
						<input class="with-gap" name="pro_plan" type="radio" value="<?php echo __( 'Yearly' );?>" data-price="<?php echo (float)$config->yearly_pro_plan;?>" <?php echo $payment && $payment['pro_plan'] == 3?'disabled':''; ?> />
						<span class="pln_name">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m21.28 4.473c-.848-.721-2.109-.604-2.817.262l-8.849 10.835-4.504-3.064c-.918-.626-2.161-.372-2.773.566s-.364 2.205.555 2.83l7.494 5.098 11.151-13.653c.707-.866.592-2.152-.257-2.874z" /></svg>
							<span class="duration"><?php echo __( '3 Months' );?></span>
							<span class="price"><?php echo $config->currency_symbol . (float)$config->yearly_pro_plan;?></span>
                                                        <?php
                                                        if($payment) {
                                                            if($payment['pro_plan'] == 3) {
                                                                echo '<span class="pln_popular">'.__( 'Current Plan' ).'</span>';
                                                            }else {
                                                                echo '<span class="pln_popular">'.__( 'Most popular' ).'</span>';
                                                            }
                                                        }else {
                                                        ?>
                                                        <span class="pln_popular"><?php echo __( 'Most popular' );?></span>
                                                        <?php } ?>
						</span>
					</label>
				</div>
				<div>
					<label>
						<input class="with-gap" name="pro_plan" type="radio" value="<?php echo __( 'Lifetime' );?>" data-price="<?php echo (float)$config->lifetime_pro_plan;?>" <?php echo $payment && $payment['pro_plan'] == 4?'disabled':''; ?> />
						<span class="pln_name">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m21.28 4.473c-.848-.721-2.109-.604-2.817.262l-8.849 10.835-4.504-3.064c-.918-.626-2.161-.372-2.773.566s-.364 2.205.555 2.83l7.494 5.098 11.151-13.653c.707-.866.592-2.152-.257-2.874z" /></svg>
							<span class="duration"><?php echo __( 'Yearly' );?></span>
							<span class="price"><?php echo $config->currency_symbol . (float)$config->lifetime_pro_plan;?></span>
                                                        <?php
                                                        if($payment) {
                                                            if($payment['pro_plan'] == 4) {
                                                                echo '<span class="pln_popular">'.__( 'Current Plan' ).'</span>';
                                                            }
                                                        }
                                                        ?>
						</span>
					</label>
				</div>
			</div>
                    <!--hide if lifetime plan is selected-->
                        <?php
                        $show_payment = true;
//                        if($next_payment_date) {
//                            $show_payment = false;
//                        }
//                        if($profile->is_pro == '1') {
//                            $show_payment = false;
//                        }
                        ?>
                        <?php if($show_payment) { ?>
			<div class="pay_using">
				<p class="bold"><?php echo __( 'Pay Using' );?></p>
				<div class="pay_u_btns">
                                        <button id="stripe_pro_new" class="btn valign-wrapper"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M3 3h18a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zm17 9H4v7h16v-7zm0-4V5H4v3h16z" fill="currentColor"/></svg> <?php echo __( 'Card' );?></button>
					<button id="paypal" onclick="clickAndDisable(this);" class="btn valign-wrapper">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M20.067 8.478c.492.88.556 2.014.3 3.327-.74 3.806-3.276 5.12-6.514 5.12h-.5a.805.805 0 0 0-.794.68l-.04.22-.63 3.993-.032.17a.804.804 0 0 1-.794.679H7.72a.483.483 0 0 1-.477-.558L7.418 21h1.518l.95-6.02h1.385c4.678 0 7.75-2.203 8.796-6.502zm-2.96-5.09c.762.868.983 1.81.752 3.285-.019.123-.04.24-.062.36-.735 3.773-3.089 5.446-6.956 5.446H8.957c-.63 0-1.174.414-1.354 1.002l-.014-.002-.93 5.894H3.121a.051.051 0 0 1-.05-.06l2.598-16.51A.95.95 0 0 1 6.607 2h5.976c2.183 0 3.716.469 4.523 1.388z" fill="currentColor"/></svg> <?php echo __( 'PayPal' );?>
					</button>
					
					<?php if(!empty($config->bank_description)){?>
						<button id="bank_transfer" class="btn valign-wrapper"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M2 20h20v2H2v-2zm2-8h2v7H4v-7zm5 0h2v7H9v-7zm4 0h2v7h-2v-7zm5 0h2v7h-2v-7zM2 7l10-5 10 5v4H2V7zm2 1.236V9h16v-.764l-8-4-8 4zM12 8a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" fill="currentColor"/></svg> <?php echo __( 'Bank Transfer' );?></button>
					<?php } ?>
					<?php if(!empty($config->paysera_password)){?>
						<button id="sms_payment" onclick="PayProViaSms();" class="btn valign-wrapper"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M6.455 19L2 22.5V4a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H6.455zm-.692-2H20V5H4v13.385L5.763 17zm5.53-4.879l4.243-4.242 1.414 1.414-5.657 5.657-3.89-3.89 1.415-1.414 2.475 2.475z" fill="currentColor"/></svg> <?php echo __( 'SMS' );?></button>
					<?php } ?>
					<?php if( $config->cashfree_payment === 'yes' && !empty($config->cashfree_client_key) && !empty($config->cashfree_secret_key)){?>
						<button id="cashfree_payment" onclick="PayViaCashfree();" class="btn valign-wrapper cashfree"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17,19V5H7V19H17M17,1A2,2 0 0,1 19,3V21A2,2 0 0,1 17,23H7C5.89,23 5,22.1 5,21V3C5,1.89 5.89,1 7,1H17M9,7H15V9H9V7M9,11H13V13H9V11Z"></path></svg> <?php echo __( 'cashfree' );?></button>
					<?php } ?>
					<?php if ($config->iyzipay_payment == "yes" && !empty($config->iyzipay_key) && !empty($config->iyzipay_secret_key)) { ?>
						<button id="iyzipay-button1" class="btn-cart btn valign-wrapper btn-iyzipay-payment" onclick="PayViaIyzipay();"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M20,8H4V6H20M20,18H4V12H20M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z" /></svg> <?php echo __( 'Iyzipay');?></button>
					<?php } ?>
					<?php if ($config->checkout_payment == 'yes') { ?>
						<button id="2co_credit" class="btn 2co valign-wrapper"  onclick="PayVia2Co();"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M20,8H4V6H20M20,18H4V12H20M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z" /></svg> <?php echo __( '2Checkout' );?></button>
					<?php } ?>
				</div>
			</div>
                        <?php } ?>
		</div>
	</div>
</div>

<!-- End Premium  -->
<a href="javascript:void(0);" id="btnProSuccess" style="visibility: hidden;display: none;"></a>

<div class="bank_transfer_modal modal modal-fixed-footer">
	<div class="modal-dialog">
    <div class="modal-content dt_bank_trans_modal">
		<h4><?php echo __( 'Bank Transfer' );?></h4>
        <div class="modal-body">
            <div class="bank_info"><?php echo htmlspecialchars_decode($config->bank_description);?></div>
			<div class="dt_user_profile hide_alert_info_bank_trans">
                <span class="valign-wrapper">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M13,13H11V7H13M13,17H11V15H13M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z"></path></svg> <?php echo __( 'Note' );?>:
                </span>
				<ul class="browser-default dt_prof_vrfy">
					<li><?php echo __( 'Please transfer the amount of' );?> <b><span id="bank_transfer_price"></span></b> <?php echo __( 'to this bank account to buy' );?> <b>"<span id="bank_transfer_description"></span>"</b> <?php echo __( 'Plan Premium Membership' );?></li>
					<li><?php echo $config->bank_transfer_note;?></li>
				</ul>
            </div>
			<p class="dt_bank_trans_upl_rec"><a href="javascript:void(0);" onclick="$('.bank_transfer_modal').addClass('up_rec_active'); return false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M13.5,16V19H10.5V16H8L12,12L16,16H13.5M13,9V3.5L18.5,9H13Z"></path></svg> <?php echo __( 'Upload Receipt' );?></a></p>
            <div class="upload_bank_receipts">
                <div onclick="document.getElementById('receipt_img').click(); return false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M13.5,16V19H10.5V16H8L12,12L16,16H13.5M13,9V3.5L18.5,9H13Z"></path></svg>
                    <p><?php echo __( 'Upload Receipt' );?></p>
					<img id="receipt_img_preview" src="">
                </div>
            </div>
            <input type="file" id="receipt_img" class="hide" accept="image/x-png, image/gif, image/jpeg" name="receipt_img">
        </div>
        <!--<span style="display: block;text-align: center;" id="receipt_img_path"></span>-->
    </div>
    <div class="modal-footer">
		<div class="bank_transfr_progress hide" id="img_upload_progress">
			<div class="progress">
				<div id="img_upload_progress_bar" class="determinate progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
			</div>
		</div>
		<button class="modal-close waves-effect btn-flat"><?php echo __( 'Close' );?></button>
        <button class="waves-effect waves-green btn btn-flat bold" disabled id="btn-upload-receipt" data-selected=""><?php echo __( 'Confirm' );?></button>
    </div>
	</div>
</div>

<div id="stripe_modal_pro" class="modal">
	<form id="stripe_form" method="post">
		<div class="modal-content">
			<h4><?php echo __( 'Card' );?></h4>
			<div id="stripe_alert"></div>
			<div class="to_mat_input">
				<input class="browser-default" type="text" placeholder="<?php echo __( 'Name' );?>" value="<?php echo $profile->full_name;?>" id="stripe_name">
				<label for="stripe_name"><?php echo __( 'Name' );?></label>
			</div>
			<div class="to_mat_input">
				<input class="browser-default" type="email" placeholder="<?php echo __( 'Email' );?>" value="" data-email="<?php echo base64_encode($profile->email);?>" id="stripe_email">
				<label for="stripe_email"><?php echo __( 'Email' );?></label>
			</div>
			<hr class="border_hr">
			<div class="to_mat_input">
				<input class="browser-default" type="text" placeholder="<?php echo __( 'Card Number' );?>" id="stripe_number">
				<label for="stripe_number"><?php echo __( 'Card Number' );?></label>
			</div>
			<div class="row r_margin mb-0">
				<div class="col s3 m3 l3">
					<div class="to_mat_input">
						<select id="stripe_month" type="text" class="browser-default pp_select_has_label" autocomplete="off">
							<option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
						</select>
						<label for="stripe_month"><?php echo __( 'Month' );?></label>
					</div>
				</div>
				<div class="col s3 m3 l3">
					<div class="to_mat_input">
						<select id="stripe_year" type="text" class="browser-default pp_select_has_label" autocomplete="off" placeholder="<?php echo __( 'Year' );?>">
							<?php for ($i=date('Y'); $i <= date('Y')+15; $i++) {  ?>
								<option value="<?php echo($i) ?>"><?php echo($i) ?></option>
							<?php } ?>
						</select>
						<label for="stripe_year"><?php echo __( 'Year' );?></label>
					</div>
				</div>
				<div class="col s6 m6 l6">
					<div class="to_mat_input">
						<input id="stripe_cvc" type="text" class="browser-default" autocomplete="off" placeholder="CVC" maxlength="3" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
						<label for="stripe_cvc">CVC</label>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<p class="powrd_stripe">Powered by <svg width="62" height="25"><title>Stripe</title><path fill="currentColor" d="M5 10.1c0-.6.6-.9 1.4-.9 1.2 0 2.8.4 4 1.1V6.5c-1.3-.5-2.7-.8-4-.8C3.2 5.7 1 7.4 1 10.3c0 4.4 6 3.6 6 5.6 0 .7-.6 1-1.5 1-1.3 0-3-.6-4.3-1.3v3.8c1.5.6 2.9.9 4.3.9 3.3 0 5.5-1.6 5.5-4.5.1-4.8-6-3.9-6-5.7zM29.9 20h4V6h-4v14zM16.3 2.7l-3.9.8v12.6c0 2.4 1.8 4.1 4.1 4.1 1.3 0 2.3-.2 2.8-.5v-3.2c-.5.2-3 .9-3-1.4V9.4h3V6h-3V2.7zm8.4 4.5L24.6 6H21v14h4v-9.5c1-1.2 2.7-1 3.2-.8V6c-.5-.2-2.5-.5-3.5 1.2zm5.2-2.3l4-.8V.8l-4 .8v3.3zM61.1 13c0-4.1-2-7.3-5.8-7.3s-6.1 3.2-6.1 7.3c0 4.8 2.7 7.2 6.6 7.2 1.9 0 3.3-.4 4.4-1.1V16c-1.1.6-2.3.9-3.9.9s-2.9-.6-3.1-2.5H61c.1-.2.1-1 .1-1.4zm-7.9-1.5c0-1.8 1.1-2.5 2.1-2.5s2 .7 2 2.5h-4.1zM42.7 5.7c-1.6 0-2.5.7-3.1 1.3l-.1-1h-3.6v18.5l4-.7v-4.5c.6.4 1.4 1 2.8 1 2.9 0 5.5-2.3 5.5-7.4-.1-4.6-2.7-7.2-5.5-7.2zm-1 11c-.9 0-1.5-.3-1.9-.8V10c.4-.5 1-.8 1.9-.8 1.5 0 2.5 1.6 2.5 3.7 0 2.2-1 3.8-2.5 3.8z"></path></svg></p>
			<button class="modal-close waves-effect btn-flat"><?php echo __( 'Cancel' );?></button>
			<button type="button" class="btn btn_primary" onclick="SH_StripeRequestPro()" id="stripe_button_pro"><?php echo __( 'Pay' );?></button>
		</div>
	</form>
</div>

<script>
<?php if ($config->iyzipay_payment == "yes" && !empty($config->iyzipay_key) && !empty($config->iyzipay_secret_key)) { ?>
	function PayViaIyzipay(){
		$('.btn-iyzipay-payment').attr('disabled','true');

		$.post(window.ajax + 'iyzipay/createsession', {
            payType: 'membership',
            description: getDescription(),
            price: getPrice()
        }, function(data) {
			if (data.status == 200) {
				$('#iyzipay_content').html('');
				$('#iyzipay_content').html(data.html);
			} else {
				$('.btn-iyzipay').attr('disabled', false).html("Iyzipay App not set yet.");
			}
			$('.btn-iyzipay').removeAttr('disabled');
			$('.btn-iyzipay').find('span').text("<?php echo __( 'iyzipay');?>");
		});

		$('.btn-iyzipay-payment').removeAttr('disabled');
	}
	<?php } ?>
    document.getElementById('stripe_pro_new').addEventListener('click', function(e) {
        $('#stripe_email').val(atob($('#stripe_email').attr('data-email')));
        $('#stripe_number').val('');
        $('#stripe_cvc').val('');
        $('#stripe_modal_pro').removeClass('up_rec_img_ready, up_rec_active');
        //$('#stripe_modal_pro').modal('open');

        $.post(window.ajax + 'stripe/createsession', {
            payType: 'membership',
            description: getDescription(),
            price: getPrice()
        }, function (data) {
            if (data.status == 200) {
                stripe.redirectToCheckout({ sessionId: data.session_id });
            } else {
               // $('.modal-body').html('<i class="fa fa-spin fa-spinner"></i> <?php echo __('Payment declined');?> ');
            }
    });

    });
	
	function PayViaCashfree(){

        $('.cashfree-payment').attr('disabled','true');

        $('#cashfree_type').val('membership');
        $('#cashfree_description').val(getDescription());
        $('#cashfree_price').val(getPrice());

        $("#cashfree_alert").html('');
        $('.go_pro--modal').fadeOut(250);
        $('#cashfree_modal_box').modal('open');

        $('.btn-cashfree-payment').removeAttr('disabled');
    }

    function PayProViaSms() {
        window.location = window.ajax + 'sms/generate_pro_link?price=' + getPrice() + '00';
    }

    function getDescription() {
        var plans = document.getElementsByName('pro_plan');
        for (index=0; index < plans.length; index++) {
            if (plans[index].checked) {
                return plans[index].value;
                break;
            }
        }
    }

    function getPrice() {
        var plans = document.getElementsByName('pro_plan');
        for (index=0; index < plans.length; index++) {
            if (plans[index].checked) {
                return plans[index].getAttribute('data-price');
                break;
            }
        }
    }

    document.getElementById('paypal').addEventListener('click', function(e) {
        $.post(window.ajax + 'paypal/generate_link', {description:getDescription(), amount:getPrice(), mode: "premium-membarship"}, function (data) {
            if (data.status == 200) {
                window.location.href = data.location;
            } else {
                $('.modal-body').html('<i class="fa fa-spin fa-spinner"></i> Payment declined ');
            }
        });
        e.preventDefault();
    });

    document.getElementById('bank_transfer').addEventListener('click', function(e) {
        $('#bank_transfer_price').text('<?php echo $config->currency_symbol;?>' + getPrice());
        $('#bank_transfer_description').text(getDescription());
        $('#receipt_img_path').html('');
        $('#receipt_img_preview').attr('src', '');
		$('.bank_transfer_modal').removeClass('up_rec_img_ready, up_rec_active');
        $('.bank_transfer_modal').modal('open');
    });

    document.getElementById('receipt_img').addEventListener('change', function(e) {
        let imgPath = $(this)[0].files[0].name;
        if (typeof(FileReader) != "undefined") {
            let reader = new FileReader();
            reader.onload = function(e) {
                $('#receipt_img_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
        $('#receipt_img_path').html(imgPath);
		$('.bank_transfer_modal').addClass('up_rec_img_ready');
        $('#btn-upload-receipt').removeAttr('disabled');
        $('#btn-upload-receipt').removeClass('btn-flat').addClass('btn-success');
    });

    document.getElementById('btn-upload-receipt').addEventListener('click', function(e) {
        e.preventDefault();
        let bar = $('#img_upload_progress');
        let percent = $('#img_upload_progress_bar');
        let formData = new FormData();
        formData.append("description", getDescription());
        formData.append("price", getPrice());
        formData.append("mode", 'membership');
        formData.append("receipt_img", $("#receipt_img")[0].files[0], $("#receipt_img")[0].files[0].value);
        bar.removeClass('hide');
        $.ajax({
            xhr: function() {
                let xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt){
                    if (evt.lengthComputable) {
                        let percentComplete = evt.loaded / evt.total;
                        percentComplete = parseInt(percentComplete * 100);
                        //status.html( percentComplete + "%");
                        percent.width(percentComplete + '%');
                        percent.html(percentComplete + '%');
                        if (percentComplete === 100) {
                            bar.addClass('hide');
                            percent.width('0%');
                            percent.html('0%');
                        }
                    }
                }, false);
                return xhr;
            },
            url: window.ajax + 'profile/upload_receipt',
            type: "POST",
            async: true,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
            timeout: 60000,
            dataType: false,
            data: formData,
            success: function(result) {
                if( result.status == 200 ){
                    $('.bank_transfer_modal').modal('close');
                    M.toast({html: '<?php echo __('Your receipt uploaded successfully.');?>'});
                    return false;
                }
            }
        });
    });
	
	<?php if ($config->checkout_payment == 'yes') { ?>
        function PayVia2Co(){
            $('#2checkout_type').val('membership');
            $('#2checkout_description').val(getDescription());
            $('#2checkout_price').val(getPrice());

            $('#2checkout_modal').modal('open');
        }
    <?php } ?>
</script>