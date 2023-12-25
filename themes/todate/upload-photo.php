<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css"  />
<link rel="stylesheet" href="<?php echo $theme_url; ?>assets/css/zInput_default_stylesheet.css?v=<?php echo time(); ?>"  />
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>


<style>
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



    .funnel-container {
        display: flex;
        min-height: 550px;
    }
    .funnel-container .sidebar {
        background-color: #f4f5f5;
        width: 306.25px;
    }
    .funnel-container .sidebar-image {
        width: 100%;
        height: 100%;
        background: no-repeat 50%/cover;
    }
    .funnel-container .content, .funnel-container .content>* {

        display: flex;
        flex: 1;
        flex-direction: column;

    }
    .funnel-container .content {
        position: relative;
        padding: 32px 32px 12px;
    }
    .funnel-container .funnel-header {
        position: relative;
        margin: 0 32px 16px 0;
        font-size: 18px;
        font-weight: 600;
        line-height: 1.5;
    }
    .photo-upload-tips {
        padding: 16px;
        margin-top: 32px;
        background: #edf4fe;
        border-radius: 8px;
        color: #444;
    }
    .text-right {
        text-align: right;
    }
    .link-help {
        cursor: pointer;
    }
    .funnel-container .bottom {
        display: flex;
        flex-direction: row;
        margin-top: auto;
        margin-right: auto;
        margin-left: auto;
    }
    .upload-options {
        text-align: center;
    }
    .btn-later {
        background-color: transparent !important;
        padding: 0 !important;
        border: none !important;
        box-shadow: unset;
    }
    @media (max-width: 767px) {
        .funnel-container {
            flex-direction: column;
            min-height: 600px;
        }
        .funnel-container .content {
            padding: 32px 0;
        }
        .funnel-container .sidebar {
            display: block;
            height: 200px;
            width: 100%;
        }
        .funnel-container .funnel-header {
            font-size: 14px;
        }
        .to_mhide_side_links, nav .header_user {
            display: block !important;
        }
        .photo-upload-tips small {
            font-size: 14px;
        }
        .link-help {
            font-size: 16px;
        }
    }
</style>


<style>
    .modal {
        max-width: 600px;
    }
    .modal .modal-content {
        overflow: hidden;
        padding-bottom: 12px;
    }
    .let-us-help-container {
        width: 100%;
        position: relative;
    }
    .let-us-slider-inner {
        opacity: 0;
        transition: opacity 0.6s;
    }
    .let-us-slider-inner.slick-active {
        opacity: 1;
    }
    .let-us-slider-box {
        display: flex;
        align-items: center;
    }
    .let-us-slider-box .examples {
        margin-right: 20px;
    }
    .let-us-slider-box .examples dd {
        position: relative;
        display: block;
        width: 150px;
        margin-left: 0;
    }
    .let-us-slider-box .examples img {
        max-width: 100%;
    }
    .modal h1, .modal h2 {
        font-size: 24px;
    }
    .let-us-help-container .slick-dots li button:before {
        color: white;
        opacity: 1;
    }
    .let-us-help-container .slick-dots li.slick-active button:before {
        color: #26a69a;
        opacity: 1;
    }
    .photo-inner .photo {
        text-align: center;
    }
    .photo-inner img {
        width: auto;
        height: 150px;
    }
    .photo-inner h4 {
        font-size: 18px;
    }
    .photo-buttons .btn {
        width: 100%;
        max-width: 300px;
        margin: 0 auto;
        display: block;
    }
    .photo-buttons .btn-default {
        background: transparent;
        border: 1px solid #2bbbad;
    }
    .photo-gallery {
        text-align: center;
        position: relative;
    }
    .photo-gallery img {
        height: 150px;
        border: 2px solid #26a69a;
        margin-top: 20px;
        padding: 20px;
    }
    .photo-gallery .remove-image {
        position: absolute;
        border-radius: 100%;
        background-color: rgba(255, 255, 255, 0.3);
        top: 10px;
        left: 62.5%;
        color: #c1c1c1;
        cursor: pointer;
    }
</style>

<div class="hero-centered">
    <div class="container">
        <div class="row r_margin" style="margin-top:30px;">
            <div class="col s12 m12 margin-b30">
                <div class="progress-bar"></div>
            </div>
            <div class="col s12 m12">
                <div class="dt_user_profile dt_user_info">
                    <div id="personality-questions-steps">
                        <!-- multistep form -->
                        <form id="stepForm" class="min-height">

                            <div class="funnel-main">
                                <div class="funnel-container">
                                    <div class="sidebar">
                                        <?php
                                        if(isMobile()) {
                                            ?>
                                        <div class="sidebar-image photo-upload" style="background-image:url(<?php echo $theme_url; ?>assets/img/image-of-smiling-ginger-girl-taking-selfie-phot.jpg)"></div>
                                            <?php
                                        }else {
                                           ?>
                                        <div class="sidebar-image photo-upload" style="background-image:url(<?php echo $theme_url; ?>assets/img/Improved/Selfie-Add-Photo.jpeg)"></div>
                                            <?php 
                                        }
                                        ?>
                                        
                                    </div>
                                    <div class="content">
                                        <div class="fresh">
                                            <div>
                                                <h4 class="funnel-header"><?php echo __('Appear on the first of your matches homepage, and get 10X boosted of your profile by uploading a real picture to show your personality') ?></h4>
                                                
                                                <div class="photo-upload-tips" ><small><?php echo __('Need help choosing the right image?') ?></small>
                                                    <div class="text-right">
                                                        <div class="link-help" ><?php echo __('Let us help') ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="photo-gallery">
                                                
                                            </div>
                                            <input type="file" id="avatar_img_step" class="hide" accept="image/x-png, image/gif, image/jpeg" name="avatar">
                                            <div class="progress hide">
                                                    <div class="determinate" style="width: 0%"></div>
                                            </div>
                                            <div class="bottom centered">
                                                <div class="upload-options">
                                                    <div class="" style="">
                                                        <button class="btn btn-primary add-photo" type="button"  onclick="document.getElementById('avatar_img_step').click(); return false">Add a photo</button>
                                                        <br />
                                                        <div>
<!--                                                            <button class="btn btn-link text-muted btn-later show-skip-modal" type="button">Do it later</button>-->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="redirect-to hide">
                                                    <div class="" style="">
                                                        <a class="btn btn-primary" href="/find-matches" ><?php echo __('Find Match') ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<!--add photo modal-->
<!--let us help modal-->
<div id="skipPhoto" class="modal" tabindex="0">
    <div class="modal-content">
        <div class="photo-inner">
            <div class="photo">
                <img src="<?php echo $theme_url; ?>assets/img/Improved/Add-Photo.png" alt="Portrait">
            </div>
            <div class="photo-content">
                <h4><?php echo __('Are You sure?') ?></h4>
                <p><?php echo __('No Photo for your identity? Profiles without photos are often ignored and do not appear in searches.') ?></p>
                <p><?php echo __('Struggling to find a perfect picture? To get started, why not add one now to complete your profile to earn credit, and you can change it later. ') ?></p>
            </div>
            <div class="photo-buttons">
                <a class="btn btn-default" href="/find-matches" style="margin-bottom: 20px"><?php echo  __('Skip') ?></a>
                <button class="btn btn-primary btn-upload-photo" type="button"><?php echo __('Upload a photo') ?></button>
            </div>
        </div>
    </div>
</div>

<!--let us help modal-->
<div id="let-us-help" class="modal" tabindex="0">
    <div class="modal-content">
        <div class="let-us-help-container">
            <div class="let-us-slider">


                <div class="let-us-slider-inner">
                    <div class="let-us-slider-box">
                        <dl class="examples">
                            <dd class="bad">
                                <img src="<?php echo $theme_url; ?>assets/img/Improved/Show-Face.png" alt="Portrait">
                            </dd>
                        </dl>

                        <div>
                            <small class="text-muted">
                                <b><?php echo __('TIP 1/3') ?></b>
                            </small>
                            <h1><?php echo __('Show Your Character') ?></h1>
                            <p><?php echo __('Aim To upload more than one picture.') ?></p>
                            <p><?php echo __('Show your visible face in your main profile picture.') ?></p>
                            <p><?php echo __('It will attract serious matches if you formally show your real personality.') ?></p>
                        </div>

                    </div>
                </div>

                <div class="let-us-slider-inner">
                    <div class="let-us-slider-box">
                        <dl class="examples">
                            <dd class="bad">
                                <img src="<?php echo $theme_url; ?>assets/img/Improved/Quality-Matters.png" alt="Portrait">
                            </dd>
                        </dl>

                        <div>
                            <small class="text-muted">
                                <b><?php echo __('TIP 2/3') ?></b>
                            </small>
                            <h1><?php echo __('Quality Matters') ?></h1>
                            <p><?php echo __('Submit a clear, close-up shot where your face is not hidden, and photos shouldn’t be dark or blurry. We recommend using natural, soft daylight shots.') ?></p>
                        </div>

                    </div>
                </div>

                <div class="let-us-slider-inner">
                    <div class="let-us-slider-box">
                        <dl class="examples">
                            <dd class="bad">
                                <img src="<?php echo $theme_url; ?>assets/img/No-Porn.png" alt="Portrait">
                            </dd>
                        </dl>

                        <div>
                            <small class="text-muted">
                                <b><?php echo __('TIP 3/3') ?></b>
                            </small>
                            <h1><?php echo __("No No's") ?></h1>
                            <p><?php echo __('No obscene or offensive photos. Photos with your name or contact details are not allowed. It’s about Marriage only and we are keen to make you and others safe.') ?></p>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
