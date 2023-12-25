<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="email-veri">
    <div class="row">
        <div class="col m12 s12">

            <!-- Email -->
            <div class="otp_head" style="margin-top:0;">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M20,8L12,13L4,8V6L12,11L20,6M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z" /></svg>
                <p><?php echo __('Email Verification Needed'); ?></p>
                <div class="row">

                    <div class="col s12 m12">
                        <div class="input-field inline">
                            <input id="email" type="email" value="" placeholder="<?php echo __('New Email'); ?>">
                        </div>
                        <button class="btn waves-effect waves-light" id="send_otp_email_popup"><?php echo __('Send OTP'); ?></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col m12 s12">
            <div class="enter_otp_email_step " style="max-width:270px; margin: 0 auto;margin: 20px auto 0;
                 border-top: 1px solid #ddd; opacity: 0;">
                <p><?php echo __('Please enter the verification code that was sent to your E-mail, or check Junk'); ?></p>
                <div id="otp_outer">
                    <div id="otp_inner">
                        <input id="otp_check_email_popup" type="text" maxlength="4" value="" pattern="\d*" title="Field must be a number." onkeyup="if (/\D/g.test(this.value)) {
                                                                    this.value = this.value.replace(/\D/g, '')
                                                                }
                                                                if ($(this).val().length == 4) {
                                                                    verify_email_code_popup(this);
                                                                }" required/>
                        <a href="javascript:void(0)" id="resend_send_otp_email_popup"><?php echo __('Resend'); ?></a>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<div class="email-verified" style="display: none;">
    <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"></circle><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"></path></svg>
    <p style="text-align: center;"><?php echo __('Congratulations!. Your email is changed successfully.'); ?></p>
</div>
