<?php
global $config;
$msg_cls = 'hide';
$form_cls = '';
$user_id = auth()->id;
$profile_fields_error = auth()->filter_profile_setting_words;
$setting_fields_error = auth()->filter_general_setting_words;

if(empty($profile_fields_error) && empty($setting_fields_error)) {
    ?>
    <script>
        window.location.href='<?php echo $config->uri ?>';
    </script>    
    <?php
}
?>
<div class="page-margin">
    <div class="sus-bg">
        <div class="container">
            <div class="row flex">
                <div class="flex-inner text-center">
                    <div class="icon-lock">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M18 8h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1h2V7a6 6 0 1 1 12 0v1zm-2 0V7a4 4 0 1 0-8 0v1h8zm-5 6v2h2v-2h-2zm-4 0v2h2v-2H7zm8 0v2h2v-2h-2z" fill="currentColor"></path></svg>
                    </div>
                    <h2 class="bold"><?php echo __('Your account is suspended'); ?></h2>
                    <h4><?php echo __('Contact Administrator To Verify your identity'); ?></h4>
                </div>
            </div>
        </div>
    </div>

    <div class="sus-form-wrap">
        <div class="container">
            <?php
            
            
            if($user_id) {
                $attachment = get_identity_unapproved($user_id);
                if($attachment) {
                    $msg_cls = '';
                    $form_cls = 'hide';
                }
            }
            
            ?>
            <div class="success-message <?php echo $msg_cls; ?>" style="text-align: center;color: #67ac5b;">
                <h6 style="text-align: center;margin-bottom: 0;"><?php echo __("Successfully Submitted"); ?></h5>
                <p style="text-align: center;margin: 0"><?php echo __("You will get notified within 48 hours") ?></p>
            </div>
            
            <?php if($user_id) { ?>
            <form method="POST" action="Useractions/resetpassword" class="sus-form <?php echo $form_cls; ?>" id="suspended-form">
                <div class="msg">
                    <h6><?php echo __("You can't use Queen Muslima because your account, or activity on it, didn’t follow our community standards.To get back into your account, you will have to verify your identity through one step."); ?></h5>
                    <p><?php echo __("Accepted Identification") ?>:</p>
                    <ul>
                        <li><?php echo __("Passport") ?></li>
                        <li><?php echo __("Driver's Licence") ?></li>
                        <li><?php echo __("National ID Card") ?></li>
                    </ul>
                </div>
                
                <div class="form-group">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16.5,6V17.5A4,4 0 0,1 12.5,21.5A4,4 0 0,1 8.5,17.5V5A2.5,2.5 0 0,1 11,2.5A2.5,2.5 0 0,1 13.5,5V15.5A1,1 0 0,1 12.5,16.5A1,1 0 0,1 11.5,15.5V6H10V15.5A2.5,2.5 0 0,0 12.5,18A2.5,2.5 0 0,0 15,15.5V5A4,4 0 0,0 11,1A4,4 0 0,0 7,5V17.5A5.5,5.5 0 0,0 12.5,23A5.5,5.5 0 0,0 18,17.5V6H16.5Z"></path></svg>
                    <input id="attachment-identity" name="attachment" type="file" class="browser-default hide">
                    <label for="attachment-identity" id="file-chosen"><?php echo __('Upload Identity'); ?></label>
                    
                </div>

                <div class="dt_login_footer">
                    <button class="btn btn-large bold btn_primary" id="btn-submit-identity" type="submit"><?php echo __('Verify Account'); ?></button>
                </div>		
                <div class="clear"></div>
            </form>
            <?php } ?>
        </div> 
    </div>

</div>
<script>
</script>