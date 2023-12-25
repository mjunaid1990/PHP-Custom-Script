<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    #myVideo {
        position: absolute;
        right: 0;
        bottom: 0;
        min-width: 100%;
        min-height: 100%;
        top: -90px;
    }
    .to_main_hero.with-video {
        z-index: 1;
        background-image: url(/upload/bg-home.jpg);
        padding: 315px 0 340px;
        background-color: transparent;
    }
    .with-video .to_main_hero_text {
        color: #e1e3ec;
        text-shadow: unset;
    }
    .with-video .to_main_hero_text p {
        color: #e1e3ec;
    }
    .bg_white.with-video {
        position: relative;
        top: -200px;
        left: 0;
    }
    .with-video .to_main_hero_filters {
        margin-left: 0;
        top: -450px;
        margin-top: 0;
    }
    #detach-button-host {
        display: none !important;
    }
    .to_index_nav .header_logo {
        max-width: 280px;
        margin-left: 35px;
    }
    .to_index_nav ul a.qdt_hdr_auth_btns:not(.btn) {
        background-color: #bbb;
    }
/*    [type="radio"]:checked + span:after,
 
    [type="radio"].with-gap:checked + span:before,

    [type="radio"].with-gap:checked + span:after {

      border: 2px solid #e64980;

    }



    [type="radio"]:checked + span:after,

    [type="radio"].with-gap:checked + span:after {

      background-color: #e64980;

    }*/
    @media (min-width: 1300px) {
        .container {
            width: 1085px;
        }
    }
    
    /*=====================
    03. Deby CUSTOM RADIO BUTTONS STYLE 3 CSS
    =======================*/
    [type="radio"]+span:before, [type="radio"]+span:after {
        content: unset;
    }
    .card-style3 {
        width: 100%;
    }
    .card-style3 .box {
        width: 100%;
    }
    .card-style3 .box input {
        display: none;
    }

    .card-style3 .option {
        margin: 10px 0;
        width: 100%;
        height: 130px !important;
        border: 3px solid transparent;
        display: inline-block;
        border-radius: 10px;
        position: relative;
        text-align: center;
        box-shadow: 0 0 20px #c3c3c367;
        cursor: pointer;
    }

    .card-style3 .option>i {
        color: #ffffff;
        background-color: #e64980;
        font-size: 20px;
        position: absolute;
        top: -15px;
        left: 50%;
        transform: translateX(-50%) scale(4);
        border-radius: 50px;
        padding: 3px;
        transition: 0.2s;
        pointer-events: none;
        opacity: 0;
    }

    .card-style3 .option .icon {
        width: 80px;
        height: 80px;
        position: absolute;
        top: 40%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .card-style3 .option .icon i {
        color: #e64980;
        line-height: 80px;
        font-size: 60px;
    }

    .card-style3 .option .icon span {
        color: #e64980;
        font-size: 16px;
        text-transform: uppercase;
    }

    .card-style3 .box input:checked+.option {
        border: 3px solid #e64980;
    }

    .card-style3 .box input:checked+.option>i {
        opacity: 1;
        transform: translateX(-50%) scale(1);
    }
    
</style>
<!--end by Community Devs LLC-->
<nav role="navigation" class="to_index_nav">
	<div class="nav-wrapper container to_index_cont">
		<div class="left header_logo">
			<a href="<?php echo $site_url;?>/" class="brand-logo"><img src="<?php echo $theme_url;?>assets/img/logo-light.png" /></a>
		</div>
		<ul class="right">
			<li class="hide_mobi_login"><a href="<?php echo $site_url;?>/login" data-ajax="/login" class="btn-flat white-text qdt_hdr_auth_btns"><?php echo __( 'Login' );?></a></li>
			<li class="hide_mobi_login"><a href="<?php echo $site_url;?>/register" data-ajax="/register" class="btn-flat btn btn_primary white-text qdt_hdr_auth_btns"><?php echo __( 'Register' );?></a></li>
			<div class="header_user show_mobi_login to_no_usr_hdr_menu">
				<a class="dropdown-trigger" href="#" data-target="log_in_dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm-4.987-3.744A7.966 7.966 0 0 0 12 20c1.97 0 3.773-.712 5.167-1.892A6.979 6.979 0 0 0 12.16 16a6.981 6.981 0 0 0-5.147 2.256zM5.616 16.82A8.975 8.975 0 0 1 12.16 14a8.972 8.972 0 0 1 6.362 2.634 8 8 0 1 0-12.906.187zM12 13a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" /></svg></a>
				<ul id="log_in_dropdown" class="dropdown-content">
					<li><a href="<?php echo $site_url;?>/login" data-ajax="/login"><?php echo __( 'Login' );?></a></li>
					<li><a href="<?php echo $site_url;?>/register" data-ajax="/register"><?php echo __( 'Register' );?></a></li>
				</ul>
			</div>
		</ul>
	</div>
</nav>
	
<div class="to_main_hero with-video">
        <video autoplay muted loop id="myVideo" oncontextmenu="return false;">
            <source src="<?php echo $site_url;?>/upload/compressed-queen-muslima-vid.mp4" type="video/mp4">
        </video>
	<div class="container to_index_cont">
		<div class="valign-wrapper to_main_hero_innr">
			<div class="to_main_hero_text">
				<h1><?php echo __( 'Meet new and interesting people.' );?></h1>
				<p><?php echo __( 'Join' );?> <?php echo ucfirst( $config->site_name );?>, <?php echo __( 'where you could meet anyone, anywhere!' );?></p>
				<a href="<?php echo $site_url;?>/register" class="btn btn_primary bold btn_round"><?php echo __( 'Get Started' );?></a>
			</div>
		</div>
	</div>
</div>

<div class="bg_white with-video">
<div class="container to_index_cont">
	<div class="valign-wrapper to_main_hero_filter_prnt">
		<div class="to_main_hero_filters">
                    <?php /*
			<div class="to_main_hero_filters_innrlist">
				<p><?php echo __( 'I am a' );?></p>
				<div>
					<div class="row">
						<div class="input-field col s12">
							<select class="browser-default">
								<?php
									$all_gender = array();
									$gender = Dataset::load('gender');
									$iz = 0;
									if (isset($gender) && !empty($gender)) {
										foreach ($gender as $key => $val) {
											$_checked = '';
											if($iz === 1){
												$_checked = 'selected';
											}
											echo '<option value="' . $key . '" '.$_checked.'>' . $val . '</option>';
											$iz++;
										}
									}
								?>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="to_main_hero_filters_innrlist">
				<p><?php echo __( 'I\'m looking for a' );?></p>
				<div>
					<div class="row">
						<div class="input-field col s12">
							<select class="browser-default">
								<?php
									$all_gender = array();
									$gender = Dataset::load('gender');
									$ix = 0;
									if (isset($gender) && !empty($gender)) {
										foreach ($gender as $key => $val) {
											$_checked = '';
											if($ix === 0){
												$_checked = 'selected';
											}
											echo '<option value="' . $key . '" '.$_checked.'>' . $val . '</option>';
											$ix++;
										}
									}
								?>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="to_main_hero_filters_innrlist">
				<p><?php echo __( 'Ages' );?></p>
				<div>
					<div class="row">
						<div class="input-field col s6">
							<select class="_age_from browser-default">
								<?php for($i = 18 ; $i < 51 ; $i++ ){?>
									<option value="<?php echo $i;?>" <?php if( $i == 20){ echo 'selected';}?> ><?php echo $i;?></option>
								<?php }?>
							</select>
						</div>
						<div class="input-field col s6">
							<select class="_age_to browser-default">
								<?php for($i = 51 ; $i < 99 ; $i++ ){?>
									<option value="<?php echo $i;?>" <?php if( $i == 55){ echo 'selected';}?>><?php echo $i;?></option>
								<?php }?>
							</select>
						</div>
					</div>
				</div>
			</div>
                     * 
                     */?>
                    
                        <div class="to_main_hero_filters_innrlist">
				<p><?php echo __( 'Begin Your Royal Journey?' );?></p>
				<div>
					<div class="row">
                                                
						<div class="input-field col s6">
                                                    <div class="card-style3">
                                                        <label class="box">
                                                            <input type="radio" name="want_marry">
                                                            <span class="option">
                                                                <i class="fa fa-check-circle"></i>
                                                                <div class="icon">
                                                                    <i class="fa fa-heart"></i>
                                                                    <span>Yes</span>
		</div>
                                                            </span>
                                                        </label>
	</div>
							
</div>
						<div class="input-field col s6">
							<div class="card-style3">
                                                        <label class="box">
                                                            <input type="radio" name="want_marry">
                                                            <span class="option">
                                                                <i class="fa fa-check-circle"></i>
                                                                <div class="icon">
                                                                    <i class="fa fa-heart-o"></i>
                                                                    <span>No</span>
</div>
                                                            </span>
                                                        </label>
                                                    </div>
						</div>
					</div>
				</div>
			</div>

			<a href="<?php echo $site_url;?>/login" class="btn btn_primary btn-large bold btn-begin" disabled="disabled"><span><?php echo __( 'Let\'s Begin' );?></span></a>
		</div>
	</div>
</div>
</div>

<div class="section bg_white to_index_ftrs_prnt">
	<div class="container to_index_cont">
		<div class="valign-wrapper row">
			<div class="col l6">
				<img src="<?php echo $theme_url;?>assets/img/SYMPHONY-OF-SOULS.png" alt="<?php echo __( 'Symphony of Souls' );?>" class="to_index_ftrs_img">
			</div>
			<div class="col l6">
				<div class="to_index_ftrs">
					<p><?php echo __( 'Symphony of Souls' );?></p>
					<h2><?php echo __( 'Our Core…Harmonizing Hearts Beyond Locale and Lore' );?></h2>
				</div>
			</div>
		</div>
	</div>
	<div class="container to_index_cont to_index_ftr_row">
		<div class="valign-wrapper row">
			<div class="col l6">
				<img src="<?php echo $theme_url;?>assets/img/VEIL-OF-SECRECY.png" alt="<?php echo __( 'Veil of Secrecy' );?>" class="to_index_ftrs_img">
			</div>
			<div class="col l6">
				<div class="to_index_ftrs">
					<p><?php echo __( 'Veil of Secrecy' );?></p>
					<h2><?php echo str_replace('{0}', ucfirst( $config->site_name ) , __( 'In a digital embrace, we guard your grace. Your secrets on {0}. sacred in our space, held with care in technology&#x27;s trace' ) );?></h2>
				</div>
			</div>
		</div>
	</div>
	<div class="container to_index_cont">
		<div class="valign-wrapper row">
			<div class="col l6">
				<img src="<?php echo $theme_url;?>assets/img/VEIL-OF-PRIVACY.png" alt="<?php echo __( 'Veil of Privacy' );?>" class="to_index_ftrs_img">
			</div>
			<div class="col l6">
				<div class="to_index_ftrs">
					<p><?php echo __( 'Veil of Privacy' );?></p>
					<h2><?php echo __( 'In your realm, you are supreme. Narrate your tale, master your veil. In the art of privacy, you&#x27;re our priority' );?></h2>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
	$stories = GetStories();
	if( !empty($stories) ){
?>
	<div class="to_index_story">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="top-l"><path d="M4.583 17.321C3.553 16.227 3 15 3 13.011c0-3.5 2.457-6.637 6.03-8.188l.893 1.378c-3.335 1.804-3.987 4.145-4.247 5.621.537-.278 1.24-.375 1.929-.311 1.804.167 3.226 1.648 3.226 3.489a3.5 3.5 0 0 1-3.5 3.5c-1.073 0-2.099-.49-2.748-1.179zm10 0C13.553 16.227 13 15 13 13.011c0-3.5 2.457-6.637 6.03-8.188l.893 1.378c-3.335 1.804-3.987 4.145-4.247 5.621.537-.278 1.24-.375 1.929-.311 1.804.167 3.226 1.648 3.226 3.489a3.5 3.5 0 0 1-3.5 3.5c-1.073 0-2.099-.49-2.748-1.179z" fill="currentColor"/></svg>
		<div class="container to_index_cont">
			<div class="dt_test_title">
				<h3 class="center-align"><?php echo __( 'Success Stories' );?></h3>
			</div>
			<div class="dt_tstm_usr">
				<div class="carousel carousel-slider">
					<?php foreach ($stories as $key => $story){ ?>
						<div class="carousel-item valign-wrapper" href="#one!">
							<div class="dt_testimonial_slide">
								<div class="slide_head">
									<img src="<?php echo $story['user1Data']->avater->avater;?>" alt="<?php echo $story['user1Data']->full_name;?>" class="circle" />
								</div>
								<h5><?php echo $story['quote'];?></h5>
								<p><?php echo substr( strip_tags (br2nl( html_entity_decode( $story['description'] )) ) , 0 , 250);?>...</p>
							</div>
						</div>
					<?php } ?>
  				</div>
				<div class="to_index_story_shdw"></div>
			</div>
		</div>
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="bottom-r"><path d="M19.417 6.679C20.447 7.773 21 9 21 10.989c0 3.5-2.457 6.637-6.03 8.188l-.893-1.378c3.335-1.804 3.987-4.145 4.247-5.621-.537.278-1.24.375-1.929.311-1.804-.167-3.226-1.648-3.226-3.489a3.5 3.5 0 0 1 3.5-3.5c1.073 0 2.099.49 2.748 1.179zm-10 0C10.447 7.773 11 9 11 10.989c0 3.5-2.457 6.637-6.03 8.188l-.893-1.378c3.335-1.804 3.987-4.145 4.247-5.621-.537.278-1.24.375-1.929.311C4.591 12.322 3.17 10.841 3.17 9a3.5 3.5 0 0 1 3.5-3.5c1.073 0 2.099.49 2.748 1.179z" fill="currentColor"/></svg>
	</div>
<?php } ?>

<div class="bg_white to_index_how">
	<div class="container to_index_cont">
		<div class="dt_how_work" id="how_it_work">
			<h3 class="center-align"><?php echo __( 'How Royal Journey on' );?> <?php echo ucfirst( $config->site_name );?> <?php echo __( 'Works' );?> </h3>
			<div class="row">
				<div class="col s12 m12 l4">
					<div class="icon-block center">
						<span class="green-text text-lighten-1">
							<svg class="dt_how_work_svg" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg"><g transform="translate(300,300)"><path d="M151.5,-172.7C196.3,-143,232.6,-95.2,216.3,-57.4C200,-19.6,131.2,8.2,94,37.1C56.8,66,51.3,95.9,30,120C8.7,144.1,-28.5,162.3,-66.7,158.9C-105,155.6,-144.3,130.8,-163.4,95.4C-182.5,60.1,-181.3,14.1,-176.6,-34.3C-171.8,-82.7,-163.3,-133.7,-133.3,-166C-103.3,-198.4,-51.6,-212.2,0.9,-213.2C53.4,-214.2,106.7,-202.5,151.5,-172.7Z" fill="currentColor" /></g></svg>
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M4.5 8.552c0 1.995 1.505 3.5 3.5 3.5s3.5-1.505 3.5-3.5-1.505-3.5-3.5-3.5S4.5 6.557 4.5 8.552zM19 8L17 8 17 11 14 11 14 13 17 13 17 16 19 16 19 13 22 13 22 11 19 11zM4 19h8 1 1v-1c0-2.757-2.243-5-5-5H7c-2.757 0-5 2.243-5 5v1h1H4z"/></svg>
						</span>
						<h5 class="bold"><?php echo __( 'Create Account' );?><div class="bg_number">1</div></h5>
						<p><?php echo __( 'Register for free and Forge your identity.' );?></p>
					</div>
				</div>
				<div class="col s12 m12 l4">
					<div class="icon-block center">
						<span class="purple-text text-darken-2">
							<svg class="dt_how_work_svg" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg"><g transform="translate(300,300)"><path d="M151.5,-172.7C196.3,-143,232.6,-95.2,216.3,-57.4C200,-19.6,131.2,8.2,94,37.1C56.8,66,51.3,95.9,30,120C8.7,144.1,-28.5,162.3,-66.7,158.9C-105,155.6,-144.3,130.8,-163.4,95.4C-182.5,60.1,-181.3,14.1,-176.6,-34.3C-171.8,-82.7,-163.3,-133.7,-133.3,-166C-103.3,-198.4,-51.6,-212.2,0.9,-213.2C53.4,-214.2,106.7,-202.5,151.5,-172.7Z" fill="currentColor" /></g></svg>
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21.47,4.35L20.13,3.79V12.82L22.56,6.96C22.97,5.94 22.5,4.77 21.47,4.35M1.97,8.05L6.93,20C7.24,20.77 7.97,21.24 8.74,21.26C9,21.26 9.27,21.21 9.53,21.1L16.9,18.05C17.65,17.74 18.11,17 18.13,16.26C18.14,16 18.09,15.71 18,15.45L13,3.5C12.71,2.73 11.97,2.26 11.19,2.25C10.93,2.25 10.67,2.31 10.42,2.4L3.06,5.45C2.04,5.87 1.55,7.04 1.97,8.05M18.12,4.25A2,2 0 0,0 16.12,2.25H14.67L18.12,10.59"/></svg>
						</span>
						<h5 class="bold"><?php echo __( 'Find Matches' );?><div class="bg_number">2</div></h5>
						<p><?php echo __( 'Quest for hearts that resonate with your soul.' );?></p>
					</div>
				</div>
				<div class="col s12 m12 l4">
					<div class="icon-block center">
						<span class="pink-text text-lighten-1">
							<svg class="dt_how_work_svg" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg"><g transform="translate(300,300)"><path d="M151.5,-172.7C196.3,-143,232.6,-95.2,216.3,-57.4C200,-19.6,131.2,8.2,94,37.1C56.8,66,51.3,95.9,30,120C8.7,144.1,-28.5,162.3,-66.7,158.9C-105,155.6,-144.3,130.8,-163.4,95.4C-182.5,60.1,-181.3,14.1,-176.6,-34.3C-171.8,-82.7,-163.3,-133.7,-133.3,-166C-103.3,-198.4,-51.6,-212.2,0.9,-213.2C53.4,-214.2,106.7,-202.5,151.5,-172.7Z" fill="currentColor" /></g></svg>
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M10 19.748V16.4c0-1.283.995-2.292 2.467-2.868A8.482 8.482 0 0 0 9.5 13c-1.89 0-3.636.617-5.047 1.66A8.017 8.017 0 0 0 10 19.748zm8.88-3.662C18.485 15.553 17.17 15 15.5 15c-2.006 0-3.5.797-3.5 1.4V20a7.996 7.996 0 0 0 6.88-3.914zM9.55 11.5a2.25 2.25 0 1 0 0-4.5 2.25 2.25 0 0 0 0 4.5zm5.95 1a2 2 0 1 0 0-4 2 2 0 0 0 0 4zM12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z" fill="currentColor"/></svg>
						</span>
						<h5 class="bold"><?php echo __( 'Start Dating' );?><div class="bg_number">3</div></h5>
						<p><?php echo __( 'Engage in conversations, and commence your royal tale.' );?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<?php if( $config->show_user_on_homepage == '1'){
		$siteUsers = GetSiteUsers();
		if( !empty($siteUsers) ){
	?>
		<div class="container to_index_cont">
			<div class="center-align to_latest_users">
				<h4><?php echo __( 'Newest Members' );?></h4>
				<div class="center">
					<?php foreach ($siteUsers as $key => $user){ if($user->avater->avater != 'https://queenmuslima.com/upload/photos/d-avatar.jpg') { ?>
						<a class="circle xuser" href="<?php echo $site_url;?>/@<?php echo $user->username;?>" data-ajax="/@<?php echo $user->username;?>">
							<img src="<?php echo $user->avater->avater;?>" alt="<?php echo $user->full_name;?>" class="circle">
						</a>
                                        <?php } } ?>
				</div>
			</div>
		</div>
	<?php }} ?>
	
	<svg width="742px" height="135px" viewBox="0 0 742 135" version="1.1" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"><path d="M0,18.1943359 C0,18.1943359 33.731258,1.47290595 88.7734375,0.0931329845 C219.81339,-3.19171847 250.381265,81.3678781 463.388672,103.315789 C574.953531,114.811237 741.039062,66.8974609 741.039062,66.8974609 L741.039062,134 L0,133.714227 L0,18.1943359 Z" id="Rectangle-2" fill="#ffe9ef" opacity="0.53177472" style="mix-blend-mode: multiply;"></path><path d="M0,98.1572266 C0,98.1572266 104.257812,78.1484375 186.296875,78.1484375 C268.335938,78.1484375 310.78125,115.222656 369,104.40625 C534.365804,73.6830944 552.410156,15.5898438 625.519531,7.62890625 C698.628906,-0.33203125 741.039062,42.75 741.039062,42.75 L741.039062,134 L0,134.166016 L0,98.1572266 Z" id="Rectangle-4" fill="#ffe9ef" opacity="0.37004431" style="mix-blend-mode: multiply;"></path> <path d="M0,45 C0,45 62.1359299,107.911868 208.148437,109.703125 C354.160945,111.494382 436.994353,57.1871807 491.703125,51.9257812 C644.628906,37.21875 741.039062,109.703125 741.039062,109.703125 L741.039062,134 L0,134 L0,45 Z" id="Rectangle-5" fill="#ffe9ef" opacity="0.231809701" style="mix-blend-mode: multiply;"></path> <path d="M0.288085938,112.378906 C0.288085938,112.378906 81.0614612,76.8789372 194.78125,75.40625 C308.501039,73.9335628 337.203138,98.34218 458.777344,106.441406 C580.35155,114.540633 741,116.601562 741,116.601562 L741.039062,134 L0,132.889648 L0.288085938,112.378906 Z" id="Rectangle-6" fill="#ffe9ef" opacity="0.209188433" style="mix-blend-mode: multiply;"></path></svg>
</div>

<div class="to_index_start">
	<div class="container to_index_cont">
		<div class="section">
			<div class="center-align dt_get_start">
				<h4><?php echo str_replace('{0}', ucfirst( $config->site_name ) , __( 'On {0}&#x27;s Halal Haven, 
				Where Queens Find Their Kings, 
				Love&#x27;s Tale Begins...' ) );?></h4>
				<a href="<?php echo $site_url;?>/register" class="btn btn_primary btn-large bold"><?php echo __( 'Get Started' );?></a>
			</div>
		</div>
	</div>
	<footer id="footer" class="page_footer to_index_foot">
		<div class="footer-copyright">
			<div class="container to_index_cont valign-wrapper">
				<span><?php echo __( 'Copyright' );?> © <?php echo date( "Y" ) . " " . ucfirst( $config->site_name );?>. <?php echo __( 'All rights reserved' );?>.</span>
				<span class="dt_fotr_spn">
					<ul class="dt_footer_links">
						<li><a href="<?php echo $site_url;?>/about" data-ajax="/about"><?php echo __( 'About Us' );?></a></li>
                                                &nbsp;-&nbsp;<li><a href="<?php echo $site_url;?>/blogs" data-ajax="/blogs"><?php echo __( 'Blogs' );?></a></li>
						&nbsp;-&nbsp;<li><a href="<?php echo $site_url;?>/terms" data-ajax="/terms"><?php echo __( 'Terms' );?></a></li>
						&nbsp;-&nbsp;<li><a href="<?php echo $site_url;?>/privacy" data-ajax="/privacy"><?php echo __( 'Privacy Policy' );?></a></li>
						&nbsp;-&nbsp;<li><a href="<?php echo $site_url;?>/contact" data-ajax="/contact"><?php echo __( 'Contact' );?></a></li>
					</ul>
					<?php require( $theme_path . 'main' . $_DS . 'custom-page.php' );?>
					<?php require( $theme_path . 'main' . $_DS . 'language.php' );?>
				</span>
			</div>
                    
                    <div class="container to_index_cont valign-wrapper" style="justify-content: center;">
                        <ul class="dt_footer_links">
                            <?php if(!empty($config->facebook_url)){ ?>
                            <li>
                                <a href="<?php echo $config->facebook_url;?>" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="margin: 0;"><path fill="currentColor" d="M12 2.04C6.5 2.04 2 6.53 2 12.06C2 17.06 5.66 21.21 10.44 21.96V14.96H7.9V12.06H10.44V9.85C10.44 7.34 11.93 5.96 14.22 5.96C15.31 5.96 16.45 6.15 16.45 6.15V8.62H15.19C13.95 8.62 13.56 9.39 13.56 10.18V12.06H16.34L15.89 14.96H13.56V21.96A10 10 0 0 0 22 12.06C22 6.53 17.5 2.04 12 2.04Z"></path></svg></a>
                            </li>
                            <?php }?>
                            <?php if(!empty($config->twitter_url)){ ?>
                            <li>
                                <a href="<?php echo $config->twitter_url;?>" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="margin: 0;"><path fill="currentColor" d="M22.46,6C21.69,6.35 20.86,6.58 20,6.69C20.88,6.16 21.56,5.32 21.88,4.31C21.05,4.81 20.13,5.16 19.16,5.36C18.37,4.5 17.26,4 16,4C13.65,4 11.73,5.92 11.73,8.29C11.73,8.63 11.77,8.96 11.84,9.27C8.28,9.09 5.11,7.38 3,4.79C2.63,5.42 2.42,6.16 2.42,6.94C2.42,8.43 3.17,9.75 4.33,10.5C3.62,10.5 2.96,10.3 2.38,10C2.38,10 2.38,10 2.38,10.03C2.38,12.11 3.86,13.85 5.82,14.24C5.46,14.34 5.08,14.39 4.69,14.39C4.42,14.39 4.15,14.36 3.89,14.31C4.43,16 6,17.26 7.89,17.29C6.43,18.45 4.58,19.13 2.56,19.13C2.22,19.13 1.88,19.11 1.54,19.07C3.44,20.29 5.7,21 8.12,21C16,21 20.33,14.46 20.33,8.79C20.33,8.6 20.33,8.42 20.32,8.23C21.16,7.63 21.88,6.87 22.46,6Z"></path></svg></a>
                            </li>
                            <?php }?>
                            <?php if(!empty($config->google_url)){ ?>
                            <li>
                                <a href="<?php echo $config->google_url;?>" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="margin: 0;"><path fill="currentColor" d="M23,11H21V9H19V11H17V13H19V15H21V13H23M8,11V13.4H12C11.8,14.4 10.8,16.4 8,16.4C5.6,16.4 3.7,14.4 3.7,12C3.7,9.6 5.6,7.6 8,7.6C9.4,7.6 10.3,8.2 10.8,8.7L12.7,6.9C11.5,5.7 9.9,5 8,5C4.1,5 1,8.1 1,12C1,15.9 4.1,19 8,19C12,19 14.7,16.2 14.7,12.2C14.7,11.7 14.7,11.4 14.6,11H8Z"></path></svg></a>
                            </li>
                            <?php }?>
                            <!--added by muhammad junaid-->
                            <?php if(!empty($config->instagram_url)){ ?>
                            <li>
                                <a href="<?php echo $config->instagram_url;?>" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 30 30" style="fill: currentColor"><path d="M 9.9980469 3 C 6.1390469 3 3 6.1419531 3 10.001953 L 3 20.001953 C 3 23.860953 6.1419531 27 10.001953 27 L 20.001953 27 C 23.860953 27 27 23.858047 27 19.998047 L 27 9.9980469 C 27 6.1390469 23.858047 3 19.998047 3 L 9.9980469 3 z M 22 7 C 22.552 7 23 7.448 23 8 C 23 8.552 22.552 9 22 9 C 21.448 9 21 8.552 21 8 C 21 7.448 21.448 7 22 7 z M 15 9 C 18.309 9 21 11.691 21 15 C 21 18.309 18.309 21 15 21 C 11.691 21 9 18.309 9 15 C 9 11.691 11.691 9 15 9 z M 15 11 A 4 4 0 0 0 11 15 A 4 4 0 0 0 15 19 A 4 4 0 0 0 19 15 A 4 4 0 0 0 15 11 z"></path></svg></a>
                            </li>
                            <?php }?>
                            <?php if(!empty($config->pinterest_url)){ ?>
                            <li>
                                <a href="<?php echo $config->pinterest_url;?>" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 30 30" style=" fill: currentColor;"><path d="M15,3C8.373,3,3,8.373,3,15c0,5.084,3.163,9.426,7.627,11.174c-0.105-0.949-0.2-2.406,0.042-3.442 c0.218-0.936,1.407-5.965,1.407-5.965s-0.359-0.719-0.359-1.781c0-1.669,0.967-2.914,2.171-2.914c1.024,0,1.518,0.769,1.518,1.69 c0,1.03-0.655,2.569-0.994,3.995c-0.283,1.195,0.599,2.169,1.777,2.169c2.133,0,3.772-2.249,3.772-5.495 c0-2.873-2.064-4.882-5.012-4.882c-3.414,0-5.418,2.561-5.418,5.208c0,1.031,0.397,2.137,0.893,2.739 c0.098,0.119,0.112,0.223,0.083,0.344c-0.091,0.379-0.293,1.194-0.333,1.361c-0.052,0.22-0.174,0.266-0.401,0.16 c-1.499-0.698-2.436-2.889-2.436-4.649c0-3.785,2.75-7.262,7.929-7.262c4.163,0,7.398,2.966,7.398,6.931 c0,4.136-2.608,7.464-6.227,7.464c-1.216,0-2.359-0.632-2.75-1.378c0,0-0.602,2.291-0.748,2.853 c-0.271,1.042-1.002,2.349-1.492,3.146C12.57,26.812,13.763,27,15,27c6.627,0,12-5.373,12-12S21.627,3,15,3z"></path></svg></a>
                            </li>
                            <?php }?>
                            <?php if(!empty($config->telegram_url)){ ?>
                            <li>
                                <a href="<?php echo $config->telegram_url;?>" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 24 24" style=" fill: currentColor;"><path d="M 20.302734 2.984375 C 20.013769 2.996945 19.748583 3.080055 19.515625 3.171875 C 19.300407 3.256634 18.52754 3.5814726 17.296875 4.0976562 C 16.06621 4.61384 14.435476 5.2982348 12.697266 6.0292969 C 9.2208449 7.4914211 5.314238 9.1361259 3.3125 9.9785156 C 3.243759 10.007156 2.9645852 10.092621 2.65625 10.328125 C 2.3471996 10.564176 2.0039062 11.076462 2.0039062 11.636719 C 2.0039062 12.088671 2.2295201 12.548966 2.5019531 12.8125 C 2.7743861 13.076034 3.0504903 13.199244 3.28125 13.291016 L 3.28125 13.289062 C 4.0612776 13.599827 6.3906939 14.531938 6.9453125 14.753906 C 7.1420423 15.343433 7.9865895 17.867278 8.1875 18.501953 L 8.1855469 18.501953 C 8.3275588 18.951162 8.4659791 19.243913 8.6582031 19.488281 C 8.7543151 19.610465 8.8690398 19.721184 9.0097656 19.808594 C 9.0637596 19.842134 9.1235454 19.868148 9.1835938 19.892578 C 9.191962 19.896131 9.2005867 19.897012 9.2089844 19.900391 L 9.1855469 19.894531 C 9.2029579 19.901531 9.2185841 19.911859 9.2363281 19.917969 C 9.2652427 19.927926 9.2852873 19.927599 9.3242188 19.935547 C 9.4612233 19.977694 9.5979794 20.005859 9.7246094 20.005859 C 10.26822 20.005859 10.601562 19.710937 10.601562 19.710938 L 10.623047 19.695312 L 12.970703 17.708984 L 15.845703 20.369141 C 15.898217 20.443289 16.309604 21 17.261719 21 C 17.829844 21 18.279025 20.718791 18.566406 20.423828 C 18.853787 20.128866 19.032804 19.82706 19.113281 19.417969 L 19.115234 19.416016 C 19.179414 19.085834 21.931641 5.265625 21.931641 5.265625 L 21.925781 5.2890625 C 22.011441 4.9067171 22.036735 4.5369631 21.935547 4.1601562 C 21.834358 3.7833495 21.561271 3.4156252 21.232422 3.2226562 C 20.903572 3.0296874 20.591699 2.9718046 20.302734 2.984375 z M 19.908203 5.1738281 C 19.799442 5.7198576 17.33401 18.105877 17.181641 18.882812 L 13.029297 15.041016 L 10.222656 17.414062 L 11 14.375 C 11 14.375 16.362547 8.9468594 16.685547 8.6308594 C 16.945547 8.3778594 17 8.2891719 17 8.2011719 C 17 8.0841719 16.939781 8 16.800781 8 C 16.675781 8 16.506016 8.1197812 16.416016 8.1757812 C 15.272368 8.8887854 10.401283 11.664685 8.0058594 13.027344 C 7.8617016 12.96954 5.6973962 12.100458 4.53125 11.634766 C 6.6055146 10.76177 10.161156 9.2658083 13.472656 7.8730469 C 15.210571 7.142109 16.840822 6.4570977 18.070312 5.9414062 C 19.108158 5.5060977 19.649538 5.2807035 19.908203 5.1738281 z M 17.152344 19.025391 C 17.152344 19.025391 17.154297 19.025391 17.154297 19.025391 C 17.154252 19.025621 17.152444 19.03095 17.152344 19.03125 C 17.153615 19.024789 17.15139 19.03045 17.152344 19.025391 z"></path></svg></a>
                            </li>
                            <?php }?>
                            <?php if(!empty($config->linkedin_url)){ ?>
                            <li>
                                <a href="<?php echo $config->linkedin_url;?>" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 30 30" style=" fill: currentColor;"><path d="M24,4H6C4.895,4,4,4.895,4,6v18c0,1.105,0.895,2,2,2h18c1.105,0,2-0.895,2-2V6C26,4.895,25.105,4,24,4z M10.954,22h-2.95 v-9.492h2.95V22z M9.449,11.151c-0.951,0-1.72-0.771-1.72-1.72c0-0.949,0.77-1.719,1.72-1.719c0.948,0,1.719,0.771,1.719,1.719 C11.168,10.38,10.397,11.151,9.449,11.151z M22.004,22h-2.948v-4.616c0-1.101-0.02-2.517-1.533-2.517 c-1.535,0-1.771,1.199-1.771,2.437V22h-2.948v-9.492h2.83v1.297h0.04c0.394-0.746,1.356-1.533,2.791-1.533 c2.987,0,3.539,1.966,3.539,4.522V22z"></path></svg></a>
                            </li>
                            <?php }?>
                            <?php if(!empty($config->tiktok_url)){ ?>
                            <li>
                                <a href="<?php echo $config->tiktok_url;?>" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 30 30" style=" fill: currentColor;"><path d="M24,4H6C4.895,4,4,4.895,4,6v18c0,1.105,0.895,2,2,2h18c1.105,0,2-0.895,2-2V6C26,4.895,25.104,4,24,4z M22.689,13.474 c-0.13,0.012-0.261,0.02-0.393,0.02c-1.495,0-2.809-0.768-3.574-1.931c0,3.049,0,6.519,0,6.577c0,2.685-2.177,4.861-4.861,4.861 C11.177,23,9,20.823,9,18.139c0-2.685,2.177-4.861,4.861-4.861c0.102,0,0.201,0.009,0.3,0.015v2.396c-0.1-0.012-0.197-0.03-0.3-0.03 c-1.37,0-2.481,1.111-2.481,2.481s1.11,2.481,2.481,2.481c1.371,0,2.581-1.08,2.581-2.45c0-0.055,0.024-11.17,0.024-11.17h2.289 c0.215,2.047,1.868,3.663,3.934,3.811V13.474z"></path></svg></a>
                            </li>
                            <?php }?>
                            <?php if(!empty($config->youtube_url)){ ?>
                    <li>
                        <a href="<?php echo $config->youtube_url;?>" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 30 30" style=" fill: currentColor;">    <path d="M 15 4 C 10.814 4 5.3808594 5.0488281 5.3808594 5.0488281 L 5.3671875 5.0644531 C 3.4606632 5.3693645 2 7.0076245 2 9 L 2 15 L 2 15.001953 L 2 21 L 2 21.001953 A 4 4 0 0 0 5.3769531 24.945312 L 5.3808594 24.951172 C 5.3808594 24.951172 10.814 26.001953 15 26.001953 C 19.186 26.001953 24.619141 24.951172 24.619141 24.951172 L 24.621094 24.949219 A 4 4 0 0 0 28 21.001953 L 28 21 L 28 15.001953 L 28 15 L 28 9 A 4 4 0 0 0 24.623047 5.0546875 L 24.619141 5.0488281 C 24.619141 5.0488281 19.186 4 15 4 z M 12 10.398438 L 20 15 L 12 19.601562 L 12 10.398438 z"></path></svg></a>
                    </li>
                    <?php }?>
                        </ul>
                    </div>
                    <center>
                        
                        <a href="//www.dmca.com/Protection/Status.aspx?id=db793ee8-5e54-484f-8e43-6fe33f34422d" title="DMCA.com Protection Status" class="dmca-badge"> <img src="//images.dmca.com/Badges/dmca-badge-w100-2x1-02.png?ID=//www.dmca.com/Protection/Status.aspx?id=db793ee8-5e54-484f-8e43-6fe33f34422d" alt="DMCA.com Protection Status"></a> <script src="//images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script>
                        <a href="https://www.dmca.com/compliance/www.queenmuslima.com" title="DMCA Compliance information for www.queenmuslima.com"><img src="https://www.dmca.com/img/dmca-compliant-grayscale.png" alt="DMCA compliant image" /></a>
                    </center>
                    
                    <center>
                        <a href="javascript:void(0)"><img src="<?php echo $theme_url . "assets/img/ssl-verify.jpg";?>" style="width: 150px; height: 48px;" /></a>
                        
                    </center>
		</div>
	</footer>
</div>