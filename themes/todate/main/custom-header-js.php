<script>
        document_title = document.title;

        window.site_url =  "<?php echo $config->uri; ?>";
        window.ajax = "<?php echo $config->uri . "/aj/"; ?>";
        window.theme_url = "<?php echo $theme_url; ?>";
        window.worker_updateDelay = '<?php echo (int)$config->worker_updateDelay;?>';
        window.email_notification = '<?php echo (int)$config->emailNotification;?>';
        window.media_path = "<?php echo GetMedia('', false);?>";
        window.current_route1 = "/<?php echo route( 1 );?>";
        window.current_route2 = "/<?php echo route( 2 );?>";
        window.current_route3 = "/<?php echo route( 3 );?>";
        window.current_route4 = "/<?php echo route( 4 );?>";
        window.current_page = "<?php echo $data['name'];?>";
        window.located = "125";
        window.ajaxsend = true;
        <?php
        if(isset($_GET['access']) && $_GET['access'] == 'admin'){
            echo 'window.maintenance_mode = "?access=admin";' . "\n";
        }else{
            echo 'window.maintenance_mode = ""' . "\n";
        }

        if(IS_LOGGED === true){
            if (isset(auth()->username)) {
                echo 'window.loggedin_user = "@' . auth()->username . '";' . "\n";
				echo 'window.loggedInUserID = "' . strtolower(!empty(auth()->web_token) ? auth()->web_token : '') . '";' . "\n";
                echo 'window.start_up = "' . auth()->start_up . '";' . "\n";
                echo 'window.isadmin = "' . auth()->admin . '";' . "\n";
                echo 'window.swaps = ' .GetUserTotalSwipes(auth()->id) . ';' . "\n";
                echo 'window.image_verification = ' . (int)$config->image_verification .';' . "\n";
                if(auth()->is_pro === "1"){
                    echo 'window.max_swaps = 999999999999999999999999;' . "\n";
                }else{
                    echo 'window.max_swaps = ' . (($config->max_swaps ) ? (int)$config->max_swaps : 0) .';' . "\n";
                }
            }else{
                echo 'window.image_verification = null;' . "\n";
            }
        }
        ?>

        var imageAddr = "<?php echo $theme_url . "assets/img/logo.png";?>" + "?n=" + Math.random();
        var startTime, endTime;
        var downloadSize = 5616998;
        var download = new Image();
        download.onload = function () {
            endTime = (new Date()).getTime();
            var duration = (endTime - startTime) / 1000; //Math.round()
            var bitsLoaded = downloadSize * 8;
            var speedBps = (bitsLoaded / duration).toFixed(2);
            var speedKbps = (speedBps / 1024).toFixed(2);
            var speedMbps = (speedKbps / 1024).toFixed(2);

            window.internet_speed = speedMbps;
        }
        startTime = (new Date()).getTime();
        download.src = imageAddr;

    </script>
<?php
if(IS_LOGGED === true){
    echo '<script src="//media.twiliocdn.com/sdk/js/video/v1/twilio-video.min.js"></script>';
	if($config->stripe_secret !== '' && $config->stripe_id !== '' ){
        echo '<script src="https://js.stripe.com/v3/"></script>';
        echo "<script type='text/javascript'>var stripe = Stripe('".$config->stripe_id."');</script>";
    }
    if ($config->checkout_payment == 'yes') { 
        echo '<script type="text/javascript" src="https://www.2checkout.com/checkout/api/2co.min.js"></script>';
	}

}
?>
    <script src="<?php echo $theme_url . 'assets/js/jquery-3.5.1.min.js';?>" type="text/javascript" id="jquery-2.1.1"></script>
    <!-- added by Community Devs LLC-->
    <script src="<?php echo $theme_url . 'assets/js/bootstrap-select.min.js'; ?>" type="text/javascript" id="functions"></script>
    <!--end by Community Devs LLC-->
    <script src="<?php echo $theme_url . 'assets/js/functions.js';?>" type="text/javascript" id="functions"></script>
    <!-- added by Community Devs LLC-->
    <script src="<?php echo $theme_url . 'assets/js/jquery.countdown.min.js?v='. time();?>" type="text/javascript" id="functions"></script>
    <script src="<?php echo $theme_url . 'assets/js/jquery-read-more.min.js'; ?>" type="text/javascript" id="functions"></script> 
    <script src="<?php echo $theme_url . 'assets/js/custom-changes.js?ver='. time();?>" type="text/javascript" id="functions"></script>
    <!--end by Community Devs LLC-->