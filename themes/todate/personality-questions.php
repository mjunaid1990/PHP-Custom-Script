<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css"  />
<link rel="stylesheet" href="<?php echo $theme_url; ?>assets/css/zInput_default_stylesheet.css?v=<?php echo time(); ?>"  />

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js" integrity="sha512-An4a3FEMyR5BbO9CRQQqgsBscxjM7uNNmccUSESNVtWn53EWx5B9oO7RVnPvPG6EcYcYPp0Gv3i/QQ4KUzB5WA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?php echo $theme_url; ?>assets/js/zInput.js"></script>

<?php
global $config;
$qualities = $config->qualities_list?explode(',',$config->qualities_list):'';
?>

<style>
    * {
        direction: ltr !important;
    }
    [type="checkbox"]+span:not(.lever) {
        padding-left: 35px;
        padding-right: 0;
    }
    .hero-centered {
        width: 100%;
        height: auto;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .min-height {
        min-height: 70vh;
    }
    #stepForm {
        position: relative;
    }
    #stepForm .steps {
        position: relative;
    }
    .image-box {
        color: white;
        display: block;
        background-size: cover;
        background-repeat: no-repeat;
        background-blend-mode: multiply;
        background-color: rgba(0,0,0,0.5);
        width: 100%;
        height: 70vh;
        background-position: center center;
    }
    .image-overlay-text {
        padding: 20px;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        height: 100%;
    }
    .image-overlay-text p {
        font-size: 20px;
        margin-top: 0;
        line-height: 1.6;
    }
    .btn-step-back {
        display: none;
    }
    .btn-step-back.show {
        display: block;
    }
    button.btn-step-back.btn.btn-default {
        background-color: #ccc;
        color: #222;
    }
    .row.d-flex {
        display: flex;
        justify-content: flex-end;
        width: 100%;
    }
    .flex-right {
        margin-left: 20px;
    }
    .slick-prev, .slick-next {
        display: none !important;
    }
    .to_main_hero_filters_innrlist {
        max-width: 400px;
        margin: 0 auto;
    }
    .to_main_hero_filters_radio {
        max-width: 500px;
        margin: 0 auto;
    }
    h4.header {
        font-size: 14px;
        margin: 0;
        font-weight: 500;
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
        width: 150px;
        height: 80px;
        position: absolute;
        top: 40%;
        left: 50%;
        transform: translate(-50%, -50%);
        display: flex;
        flex-direction: column;
    }

    .card-style3 .option .icon i {
        color: #e64980;
        line-height: 80px;
        font-size: 60px;
    }

    .card-style3 .option .icon span {
        color: #e64980;
        font-size: 14px;
        text-transform: uppercase;
    }

    .card-style3 .box input:checked+.option {
        border: 3px solid #e64980;
    }

    .card-style3 .box input:checked+.option>i {
        opacity: 1;
        transform: translateX(-50%) scale(1);
    }
    [type="radio"]:not(:checked)+span:before, [type="radio"]:not(:checked)+span:after {
        border: 2px solid #5a5a5a;
    }
/*    [type="radio"]:not(:checked)+span:before, 
    [type="radio"]:not(:checked)+span:after, 
    [type="radio"]:checked+span:before, 
    [type="radio"]:checked+span:after, [type="radio"].with-gap:checked+span:before, [type="radio"].with-gap:checked+span:after {
        border-radius: 50%;
    }*/
    [type="radio"].with-gap+span:before, [type="radio"].with-gap+span:after {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        margin: 4px;
        width: 16px;
        height: 16px;
        z-index: 0;
        -webkit-transition: .28s ease;
        transition: .28s ease;
    }
    [type="radio"].with-gap:checked + span:before,
    [type="radio"].with-gap:checked + span:after {
      border: 2px solid #e64980;
    }

    [type="radio"].with-gap:checked + span:after {
      background-color: #e64980;
    }
    .picture-answer {
        max-width: 440px;
        margin-right: auto;
        margin-left: auto;
    }
    .picture-width-550 {
        max-width: 550px;
        margin-right: auto;
        margin-left: auto;
    }
    .loveos-tile-select {
        display: grid;
        grid-gap: 1rem;
        grid-template-columns: repeat(2, 1fr);
    }
    .loveos-tile-select.dynamic-grid {
        display: grid;
        grid-template: repeat(3, 1fr)/repeat(3, 1fr);
        grid-gap: 1rem;
    }
    .loveos-tile-select.dynamic-grid-simple {
        grid-template-columns: repeat(3, 1fr);
    }
    .loveos-tile-select.dynamic-grid .loveos-tile-select-option:nth-child(1) {
        grid-column: span 2;
        grid-row: span 2;
    }
    .loveos-tile-select.dynamic-grid .loveos-tile-select-option:nth-child(7) {
        grid-column: span 1;
        grid-row: span 1;
    }

/*    .loveos-tile-select.dynamic-grid .loveos-tile-select-option {
        display: grid;
        height: calc(100vh - 10px);
        grid-template: repeat(6, 1fr)/repeat(6, 1fr);
        grid-gap: 0.5em;
    }*/
    .loveos-tile-select-option {
        position: relative;
        display: inline-grid;
        grid-template-rows: min-content;
        margin-bottom: 0;
        cursor: pointer;
        user-select: none;
        border-radius: 4px;
    }
    .loveos-tile-select-option.active .loveos-tile-select-option-body::before, 
    .loveos-tile-select-option [type="radio"]:focus+.loveos-tile-select-option-body::before {
        content: "";
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 2;
        display: block;
/*        background-color: #e64980;
        opacity: 0.3;*/
        border: 3px solid #e64980;
        transition: .28s ease;
    }
    .loveos-tile-select-option [type="radio"]+.loveos-icon,
    .loveos-tile-select-option [type="checkbox"]+.loveos-icon {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 3;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: fit-content;
        height: fit-content;
        margin: auto;
        font-size: 3rem;
        color: #fff;
        opacity: 0;
    }
    .loveos-tile-select-option [type="radio"]:checked+.loveos-icon {
        /*opacity: 1;*/
    }
    .loveos-tile-select-option-body {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .loveos-tile-select-option-body.shadow {
        box-shadow: 0 0 20px #c3c3c367;
        border-radius: 10px;
    }
    
    .loveos-tile-select-option-body i {
        opacity: 0;
        position: absolute;
        color: #ffffff;
        background-color: #e64980;
        font-size: 20px;
        top: -15px;
        left: 50%;
        transform: translateX(-50%) scale(4);
        border-radius: 50px;
        padding: 3px;
        transition: 0.2s;
        pointer-events: none;
        z-index: 2;
    }
    .loveos-tile-select-option.active .loveos-tile-select-option-body i {
        opacity: 1;
        transform: translateX(-50%) scale(1);
    }
    .shadow .loveos-tile-select-option-image {
        position: relative;
    }
    .loveos-tile-select-option-image img {
        position: absolute;
        width: 100%;
        height: 100%;
    }
    .shadow .loveos-tile-select-option-image img {
        top: 23%;
    }
    .loveos-tile-select-option-image::after {
        content: "";
        display: block;
        padding-bottom: 100%;
        transition: background 100ms ease;
    }
    #otp_check_email {
        color: #fff;
    }

    #otp_check_email2 {
        padding-left: 11px;
        letter-spacing: 41px;
        border: 0;
        background-image: linear-gradient(to left,#a1a1a1 70%,rgba(255,255,255,0) 0%);
        background-position: bottom;
        background-size: 50px 2px;
        background-repeat: repeat-x;
        background-position-x: 35px;
        width: 220px;
        min-width: 220px;
        box-shadow: none;
        color: #fff;
    }
    .steps-slider {
        height: auto;
        min-height: 300px;
    }
    .refresh-location-2 {
        position: absolute;
        top: 9px;
        right: 20px;
    }
    .btn-primary.btn-verify {
        background-color: transparent;
        box-shadow: unset;
        border: 0;
        cursor: default;
    }
    .btn-verify svg {
        width: 20px;
    }
    .btn-verify svg path:last-child {
        fill: #42a446;
    }
    .max-width-600 {
        max-width: 600px;
        margin: 0 auto;
    }
    .f-20 {
        font-size: 20px;
    }
    .slick-slider {
        user-select: auto !important;
    }
    footer.page_footer:not(.to_index_foot) {
        margin: 0 auto !important;
    }
    .email-veri {
        max-width: 600px;
        margin: 0 auto;
        text-align: center;
        padding-top: 30px;
    }
    span.text-name {
        position: absolute;
        bottom: 10%;
        left: 6%;
        font-size: 14px;
        color: #fff;
        background: #000;
        opacity: 0;
        padding: 5px;
        border: 4px;
        transition: opacity .25s ease-in-out;
    }
    .loveos-tile-select-option:hover .text-name {
        opacity: 0.7;
    }
    @media (max-width: 767px) {
        .refresh-location-2 {
            position: relative;
            margin-bottom: 30px;
            text-align: right;
            top:unset;
            right: unset;
        }
        .to_mhide_side_links, nav .header_user {
            display: block !important;
        }
        small {
            font-size: 90%;
        }
        .zInputWrapper {
            text-align: center;
        }
    }
    @media (max-width: 480px) {
        
    }
</style>
<style>
    .progressbar {
        counter-reset: step;
        display: flex;
        direction: ltr;
    }
    .progressbar li {
        list-style: none;
        display: inline-block;
        width: 100%;
        position: relative;
        text-align: center;
        cursor: pointer;
    }
    .progressbar li:before {
        content: counter(step);
        counter-increment: step;
        width: 30px;
        height: 30px;
        line-height : 30px;
        border: 1px solid #ddd;
        border-radius: 100%;
        display: block;
        text-align: center;
        margin: 0 auto 10px auto;
        background-color: #fff;
    }
    .progressbar li:after {
        content: "";
        position: absolute;
        width: 100%;
        height: 1px;
        background-color: #ddd;
        top: 15px;
        left: -50%;
        z-index : -1;
    }
    .progressbar li:first-child:after {
        content: none;
    }
    .progressbar li.active {
        color: #2296f3;
    }
    .progressbar li.active:before {
        border-color: #2296f3;
        background-color: #2296f3;
        color: #fff;
    } 
    .progressbar li.active + li:after {
        background-color: #2296f3;
    }
</style>
<?php $user = auth(); $fields = UserFieldsData($user->id); ?>
<?php
$providers = array(
        'Google',
        'Facebook',
        'Twitter',
        'LinkedIn',
        'Vkontakte',
        'Instagram',
        'QQ',
        'WeChat',
        'Discord',
        'Mailru'
    );
?>
<div class="hero-centered">
    <div class="container">
        <div class="row r_margin" style="margin-top:30px;">
            <div class="col s12 m12 margin-b30">
                <ul class="progressbar hide">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>

                    <?php
                    if ($user->src && !in_array($user->src, $providers)) {
                        echo '<li></li>';
                    }
                    ?>
                </ul>
            </div>
            <div class="col s12 m12">
                <div class="dt_user_profile dt_user_info">
                    <div id="personality-questions-steps">
                        <!-- multistep form -->
                        <form id="stepForm" class="min-height">
<!--                            <div class="image-box" style="background-image:url('<?php echo $theme_url; ?>assets/img/Improved/Intro-Questionnaire.jpg')">
                                <div class="image-overlay-text">
                                    <p>
                                        Nice To Meet Serious People<br /> We are excited to join us to provide you with wise matches.
                                    </p>
                                    <p>
                                        In order to help you build a stable family, we encourage you to take a serious step<br />
                                        with high transparency to open a gate to your new life

                                    </p>
                                    <button type="button" class="btn btn-start">Let's Start</button>
                                </div>
                            </div>-->
                            <div class="steps-slider hide">
                                
                                <div class="steps" data-step="1">
                                    <div class="to_main_hero_filters_innrlist">
                                        <p class="f-20"><?php echo __( 'I am' );?></p>
                                        <div>
                                                <div class="row">

                                                        <div class="input-field col s6">
                                                            <div class="card-style3">
                                                                <label class="box">
                                                                    <input type="radio" name="gender" value="4525" class="required" <?= $user->gender == '4525'?'checked':''; ?> >
                                                                    <span class="option">
                                                                        <i class="fa fa-check-circle"></i>
                                                                        <div class="icon">
                                                                            <i class="fa fa-male"></i>
                                                                            <span><?php echo __( 'Responsible Man' );?></span>
                                                                        </div>
                                                                    </span>
                                                                </label>
                                                            </div>

                                                        </div>
                                                        <div class="input-field col s6">
                                                                <div class="card-style3">
                                                                <label class="box">
                                                                    <input type="radio" name="gender" value="4526" class="required" <?= $user->gender == '4526'?'checked':''; ?>>
                                                                    <span class="option">
                                                                        <i class="fa fa-check-circle"></i>
                                                                        <div class="icon">
                                                                            <i class="fa fa-female"></i>
                                                                            <span><?php echo __( 'Wise Female' );?></span>
                                                                        </div>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                </div>
                                        </div>
                                        
                                        <p class="f-20"><?php echo __( 'Seeking a' );?></p>
                                        <div>
                                                <div class="row">

                                                        <div class="input-field col s6">
                                                            <div class="card-style3">
                                                                <label class="box">
                                                                    <input type="radio" name="fid_1" value="2" class="required" <?= $user->gender == '4526'?'checked':''; ?>>
                                                                    <span class="option">
                                                                        <i class="fa fa-check-circle"></i>
                                                                        <div class="icon">
                                                                            <i class="fa fa-male"></i>
                                                                            <span><?php echo __( 'Husband' );?></span>
                                                                        </div>
                                                                    </span>
                                                                </label>
                                                            </div>

                                                        </div>
                                                        <div class="input-field col s6">
                                                                <div class="card-style3">
                                                                <label class="box">
                                                                    <input type="radio" name="fid_1" value="1" class="required" <?= $user->gender == '4525'?'checked':''; ?>>
                                                                    <span class="option">
                                                                        <i class="fa fa-check-circle"></i>
                                                                        <div class="icon">
                                                                            <i class="fa fa-female"></i>
                                                                            <span><?php echo __( 'Wife' );?></span>
                                                                        </div>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                </div>
                                        </div>
                                        
                                        <p class="f-20"><?php echo __( 'With Preferred Age' );?></p>
                                        <div>
                                                <div class="row">

                                                        <div class="input-field col s6">
                                                            <div class="to_mat_input">
                                                                <select id="fid_11" name="fid_11" class="browser-default pp_select_has_label required">
                                                                        <option value="" disabled selected><?php echo __( 'Select' );?></option>
                                                                        <?php for($i = 18 ; $i <= 70 ; $i++ ){?>
                                                                                <option value="<?php echo $i;?>" <?php echo isset($fields['fid_11']) && $i == $fields['fid_11']?'selected':''; ?>><?php echo $i;?></option>
                                                                        <?php } ?>
                                                                </select>
                                                                <label for="fid_11"><?php echo __( 'From' );?></label>
                                                            </div>

                                                        </div>
                                                        <div class="input-field col s6">
                                                                <div class="to_mat_input">
                                                                    <select id="fid_12" name="fid_12" class="browser-default pp_select_has_label required">
                                                                            <option value="" disabled selected><?php echo __( 'Select' );?></option>
                                                                            <?php for($i = 19 ; $i <= 71 ; $i++ ){?>
                                                                                    <option value="<?php echo $i;?>" <?php echo $i == $fields['fid_12']?'selected':''; ?>><?php echo $i;?></option>
                                                                            <?php } ?>
                                                                    </select>
                                                                    <label for="fid_12"><?php echo __( 'To' );?></label>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                        
                                        <input name="custom_fields" type="hidden" value="1">
                                    </div>
                                    
                                    
                                </div>
                                <div class="steps" data-step="2">
                                    <div class="to_main_hero_filters_radio">
                                        <p class="f-20"><?php echo __( 'What is your last relationship experience?' );?></p>
                                        <div>
                                                <div class="row">

                                                        <div class="col m6 s12">
                                                            <?php echo DatasetGetRadio( $user->relationship, "relationship",  'relationship' );?>

                                                        </div>
                                                       
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <!--step 4-->
                                <div class="steps" data-step="3">
                                    <div class="to_main_hero_filters_radio">
                                        <p class="f-20"><?php echo __( 'When did you come to life?' );?></p>
                                        <div>
                                                <div class="row">

                                                        <div class="col m12 s12">
                                                            <div class="to_mat_input">
                                                                    <input id="birthdate" name="birthday" data-errmsg="<?php echo __( 'Select your Birth date.');?>" placeholder="<?php echo __( 'Birthdate' );?>" type="text" class="datepicker user_bday browser-default required" value="<?= $user->birthday && $user->birthday != "0000-00-00"?$user->birthday:''; ?>">
                                                                    <label for="birthdate"><?php echo __( 'Birthdate' );?></label>
                                                            </div>
                                                            <p class="lead" style="margin-top:0; color: #aaa;"><?php echo __('Your date of birth will not be visible on your profile, only your age.') ?></p>
                                                        </div>
                                                       
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!--step 4-->
                                <div class="steps" data-step="4">
                                    <div class="">
                                        <p class="f-20"><?php echo __( 'What languages do you speak?' );?></p>
                                        <div>
                                                <div class="row">
                                                    <?php
                                                    if($user->language) {
                                                        $user->language = explode(',',$user->language);
                                                    }
                                                    ?>
                                                        <?php echo DatasetGetCheckbox( $user->language, "language",  'language[]' );?>
                                                       
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!--step 5-->
                                
                                
                                
                                
                                <!--step 7-->
                                
                                
                                
                                
                                
                                <!--step 7-->
                                
                                
                                
                                <!--step 9-->
                                
                                
                                <!--step 10-->
                                <div class="steps" data-step="5">
                                    <div class="">
                                        <p class="f-20"><?php echo __( 'Where do you live now?' );?></p>
                                        <p><small><?php echo __( 'It will be used with our AI system to Assign Verified Location Badge to you, and find close matches in your current location. only we show city to your matches' );?></small></p>
                                        <div class="row">
                                            <div class="col m12 s12" style="position:relative;">
                                                <div class="to_mat_input">
                                                    <input id="location-text-box" name="location" type="text" class="browser-default current-location-hidden required" placeholder="<?php echo __( 'Location' );?>" value="<?= $user->location; ?>">
                                                    <label for="location-text-box"><?php echo __( 'Location' );?></label>
                                                </div>
                                                <div class="refresh-location-2">
                                                    <button class="btn btn-primary btn-verify verified <?= $user->is_location_verified == 1?'':'hide'; ?>" type="button">
                                                        <i><svg enable-background="new 0 0 2039.9 2500" viewBox="0 0 2039.9 2500" xmlns="http://www.w3.org/2000/svg"><path clip-rule="evenodd" d="m1991.4 503.9-942 1934.3-1001.9-1284.1z" fill="#fff" fill-rule="evenodd"></path><path d="m1019.9 0-1019.9 453.3v680c0 632.3 437.4 1223.9 1019.9 1366.7 588.2-143.9 1019.9-734.4 1019.9-1366.7v-680zm-226.6 1822.3-453.3-453.3 160.9-160.9 294.6 293.5 748-755.9 160.9 162.1z" fill="#4285f4"></path></svg></i>
                                                        <?php echo __('Location Verified'); ?> 
                                                    </button>
                                                    <button class="btn btn-primary btn-refresh-location-2" type="button" <?= $user->is_location_verified == 1?'disabled':''; ?>>
                                                        <?php echo __('Verify'); ?>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col m12 s12">
                                                <div id="map-canvas" style="width: 100%; height: 350px;"></div>
                                            </div>
                                            <input type="hidden" name="country_id" value="<?= $user->country_id ?>" />
                                            <input type="hidden" name="state_id" value="<?= $user->state_id ?>" />
                                            <input type="hidden" name="city_id" value="<?= $user->city_id ?>" />
                                            <input type="hidden" name="incomplete_address" value="<?= $user->incomplete_address ?>" />
                                            <input type="hidden" name="is_location_verified" value="<?= $user->is_location_verified?$user->is_location_verified:0; ?>" />
                                        </div>
                                    </div>
                                </div>
                                <!--step 11-->
                                <?php
                                if ($user->src && !in_array($user->src, $providers)) {
                                    ?>
                                    <div class="steps" data-step="6">
                                        <div class="email-veri">
                                            <div class="row">
                                                <div class="col m12 s12">

                                                    <!-- Email -->
                                                    <div class="otp_head" style="margin-top:0;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M20,8L12,13L4,8V6L12,11L20,6M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z" /></svg>
                                                            <p><?php echo __( 'Email Verification Needed' );?></p>
                                                            <div class="row">
                                                                    <div class="col s12 m2"></div>
                                                                    <div class="col s12 m8">
                                                                            <div class="input-field inline">
                                                                                    <input id="email" type="email" value="<?php echo strtolower($user->email);?>" data-email="<?php echo strtolower($user->email);?>" style="background-color: #fff !important;">
                                                                            </div>
                                                                            <button class="btn waves-effect waves-light" id="send_otp_email"><?php echo __( 'Send OTP' );?></button>
                                                                    </div>
                                                                    <div class="col s12 m2"></div>
                                                            </div>
                                                    </div>

                                                    <!-- End Email -->

    <!--                                                <div id="otp_outer">
                                                            <div id="otp_inner">
                                                                    <input id="otp_check_email2" type="text" maxlength="4" value="" pattern="\d*" title="Field must be a number." onkeyup="if (/\D/g.test(this.value)){ this.value = this.value.replace(/\D/g,'') } if($(this).val().length == 4){verify_email_code_step(this);}" required/>
                                                            </div>
                                                    </div>-->
                                                </div>

                                                <div class="col m12 s12">
                                                    <div class="enter_otp_email_step " style="max-width:270px; margin: 0 auto;margin: 20px auto 0;
        border-top: 1px solid #ddd; opacity: 0;">
                                                            <p><?php echo __( 'Please enter the verification code that was sent to your E-mail, or check Junk' );?></p>
                                                            <div id="otp_outer">
                                                                    <div id="otp_inner">
                                                                            <input id="otp_check_email2" type="text" maxlength="4" value="" pattern="\d*" title="Field must be a number." onkeyup="if (/\D/g.test(this.value)){ this.value = this.value.replace(/\D/g,'') } if($(this).val().length == 4){verify_email_code_step(this);}" required/>
                                                                            <a href="javascript:void(0)" id="resend_send_otp_email"><?php echo __( 'Resend' );?></a>
                                                                    </div>
                                                            </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                                
                                
                            </div>
                            <input type="hidden" name="last_step" value="<?= $user->last_step; ?>" />
                            <?php if ($user->src && in_array($user->src, $providers)) { ?>
                            <input type="hidden" id="social-login" value="1" />
                            <?php } ?>
                        </form>

                        <div class="step-actions hide">
                            <hr />
                            <div class="row d-flex">
                                <div class="flex-left">
                                    <button type="button" class="btn-step-back btn btn-default"><?php echo __( 'Back' );?></button>
                                </div>
                                <div class="flex-right">
                                    <button type="button" class="btn-step-next btn btn-primary"><?php echo __( 'Next' );?></button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



<script src="<?php echo $theme_url; ?>assets/js/map.js?v=<?php echo time(); ?>"></script>
<script type="text/javascript">

$(document).ready(function() {
    $('#stepForm').removeClass('min-height');
    $('.image-box').addClass('hide');
    $('.steps-slider').removeClass('hide');
    $('.step-actions').removeClass('hide');
    $('.progressbar').removeClass('hide');
    init_slick_slider();
})

</script>