<link rel="icon" href="<?php echo $theme_url;?>assets/img/icon.png" type="image/x-icon"><link href="<?php echo $theme_url;?>assets/css/materialize.min.css" type="text/css" id="materialize" rel="stylesheet" media="screen,projection"/><link href="<?php echo $theme_url;?>assets/css/plugins.css" type="text/css" id="plugins" rel="stylesheet" media="screen,projection"/><link href="<?php echo $theme_url;?>assets/css/style.css" type="text/css" id="style" rel="stylesheet" media="screen,projection"/><link href="<?php echo $theme_url;?>assets/css/ie.css" type="text/css" id="ie" rel="stylesheet" media="screen,projection"/>
<!--added by Community Devs LLC-->
<link href="<?php echo $theme_url;?>assets/css/bootstrap-select.min.css?ver=<?php echo abs(rand(111,999)); ?>" type="text/css" id="se" rel="stylesheet" media="screen,projection"/>

<link href="<?php echo $theme_url;?>assets/css/custom.css?v=1.0" type="text/css" id="ie" rel="stylesheet" media="screen,projection"/>
<link href="<?php echo $theme_url;?>assets/css/custom-changes.css?v=<?php echo time(); ?>" type="text/css" id="ie" rel="stylesheet" media="screen,projection"/>
<!--end by Community Devs LLC-->
<?php if( $config->displaymode == 'night' ){?>
    <link href="<?php echo $theme_url;?>assets/css/night.css" type="text/css" id="night-mode-css" rel="stylesheet" media="screen,projection"/>
<?php } ?>
<?php if( $config->is_rtl === true ){?>
    <link href="<?php echo $theme_url;?>assets/css/rtl.css" type="text/css" id="rtl" rel="stylesheet" media="screen,projection"/>
<?php } ?>