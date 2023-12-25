<?php
$admin_mode = false;
if( $profile->admin == '1' || CheckPermission($profile->permission, "manage-users") ){
    $admin_mode = true;
}

$target_user = route(2);
if($target_user !== ''){
    $_user = LoadEndPointResource('users');
    if( $_user ){
        if( $target_user !== '' ){
            $profile = $_user->get_user_profile(Secure($target_user));
            if( !$profile ){
                echo '<script>window.location = window.site_url;</script>';
                exit();
            }else{
                if( $profile->admin == '1' ){
                    $admin_mode = true;
                }
            }
        }
    }
}
?>
<!-- Settings  -->
<!--added is_admin as parameter to get profile from user suspension page-->
<!--added by Community Devs LLC-->
<div class="container page-margin">
<div class="row to_sett_row">
	<div class="col m12 l4">
		<div class="sett_navbar">
            <ul class="browser-default">
                <li class="general active">
					<a href="<?php echo $site_url;?>/settings/<?php echo $profile->username;?>" data-ajax="/settings/<?php echo $profile->username;?>" target="_self"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M12 1l9.5 5.5v11L12 23l-9.5-5.5v-11L12 1zm0 14a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" fill="currentColor"/></svg></span> <?php echo __( 'General' );?></a>
				</li>
                <li class="profile">
					<a href="<?php echo $site_url;?>/settings-profile/<?php echo $profile->username;?>" data-ajax="/settings-profile/<?php echo $profile->username;?>" target="_self"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M20 22H4v-2a5 5 0 0 1 5-5h6a5 5 0 0 1 5 5v2zm-8-9a6 6 0 1 1 0-12 6 6 0 0 1 0 12z" fill="currentColor"/></svg></span> <?php echo __( 'Profile' );?></a>
				</li>
				<?php if( $config->social_media_links == 'on' ){ ?>
					<li class="social">
						<a href="<?php echo $site_url;?>/settings-social/<?php echo $profile->username;?>" data-ajax="/settings-social/<?php echo $profile->username;?>" target="_self"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M13.06 8.11l1.415 1.415a7 7 0 0 1 0 9.9l-.354.353a7 7 0 0 1-9.9-9.9l1.415 1.415a5 5 0 1 0 7.071 7.071l.354-.354a5 5 0 0 0 0-7.07l-1.415-1.415 1.415-1.414zm6.718 6.011l-1.414-1.414a5 5 0 1 0-7.071-7.071l-.354.354a5 5 0 0 0 0 7.07l1.415 1.415-1.415 1.414-1.414-1.414a7 7 0 0 1 0-9.9l.354-.353a7 7 0 0 1 9.9 9.9z" fill="currentColor"/></svg></span> <?php echo __( 'Social Links' );?></a>
					</li>
				<?php } ?>
				<hr class="border_hr">
                <li class="privacy">
					<a href="<?php echo $site_url;?>/settings-privacy/<?php echo $profile->username;?>" data-ajax="/settings-privacy/<?php echo $profile->username;?>" target="_self"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M3.783 2.826L12 1l8.217 1.826a1 1 0 0 1 .783.976v9.987a6 6 0 0 1-2.672 4.992L12 23l-6.328-4.219A6 6 0 0 1 3 13.79V3.802a1 1 0 0 1 .783-.976zM13 10V5l-5 7h3v5l5-7h-3z" fill="currentColor"/></svg></span> <?php echo __( 'Privacy' );?></a>
				</li>
				<li class="emails">
					<a href="<?php echo $site_url;?>/settings-sessions/<?php echo $profile->username;?>" data-ajax="/settings-sessions/<?php echo $profile->username;?>" target="_self"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M17 13v1c0 2.77-.664 5.445-1.915 7.846l-.227.42-1.747-.974c1.16-2.08 1.81-4.41 1.882-6.836L15 14v-1h2zm-6-3h2v4l-.005.379a12.941 12.941 0 0 1-2.691 7.549l-.231.29-1.55-1.264a10.944 10.944 0 0 0 2.471-6.588L11 14v-4zm1-4a5 5 0 0 1 5 5h-2a3 3 0 0 0-6 0v3c0 2.235-.82 4.344-2.271 5.977l-.212.23-1.448-1.38a6.969 6.969 0 0 0 1.925-4.524L7 14v-3a5 5 0 0 1 5-5zm0-4a9 9 0 0 1 9 9v3c0 1.698-.202 3.37-.597 4.99l-.139.539-1.93-.526c.392-1.437.613-2.922.658-4.435L19 14v-3A7 7 0 0 0 7.808 5.394L6.383 3.968A8.962 8.962 0 0 1 12 2zM4.968 5.383l1.426 1.425a6.966 6.966 0 0 0-1.39 3.951L5 11 5.004 13c0 1.12-.264 2.203-.762 3.177l-.156.29-1.737-.992c.38-.665.602-1.407.646-2.183L3.004 13v-2a8.94 8.94 0 0 1 1.964-5.617z" fill="currentColor"/></svg></span> <?php echo __( 'Manage Sessions' );?></a>
				</li>
                                    <!--//manage subscription page added by Community Devs LLC-->
                                <li class="general">
					<a href="<?php echo $site_url;?>/manage-subscriptions/<?php echo $profile->username;?>" data-ajax="/manage-subscriptions/<?php echo $profile->username;?>" target="_self"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="24" height="24"><path fill="currentColor" d="M174.89,512c-8.592,0.001-17.251-2.699-24.858-8.185 c-17.079-12.317-22.508-34.11-13.203-52.999c0.066-0.134,0.134-0.268,0.203-0.4l68.441-131.421h-67.61 c-32.229,0-58.13-24.373-60.246-56.693c-1.226-18.724,6.295-36.58,20.646-49.068L314.642,10.359c0.354-0.332,0.72-0.651,1.098-0.956 C323.232,3.339,332.666,0,342.303,0c15.391,0,29.116,7.99,36.716,21.373c7.561,13.313,7.433,29.097-0.328,42.272l-63.878,112.352 h71.182c19.206,0,36.08,10.765,44.039,28.092c7.991,17.399,5.146,37.3-7.428,51.938c-7.197,8.379-19.824,9.337-28.203,2.141 c-8.379-7.196-9.337-19.824-2.141-28.203c3.197-3.722,2.263-7.35,1.422-9.181c-0.821-1.788-2.912-4.788-7.69-4.788H280.437 c-7.122,0-13.706-3.787-17.287-9.943c-3.582-6.155-3.619-13.751-0.099-19.942l80.955-142.389c0.068-0.121,0.138-0.241,0.209-0.36 c0.198-0.333,0.663-1.112,0.023-2.238c-0.64-1.126-1.547-1.126-1.935-1.126c-0.391,0-0.775,0.104-1.112,0.298L125.327,242.69 c-0.218,0.205-0.441,0.404-0.667,0.599c-6.418,5.499-7.418,11.954-7.127,16.4c0.628,9.594,7.814,19.307,20.332,19.307h100.574 c6.99,0,13.473,3.649,17.099,9.626c3.626,5.976,3.868,13.412,0.64,19.612l-83.554,160.439c-0.416,0.861-0.669,1.637,0.805,2.701 c1.385,0.999,2.048,0.631,2.692,0.03l154.641-166.997c7.505-8.104,20.159-8.59,28.264-1.086c8.104,7.505,8.591,20.159,1.086,28.264 L205.114,498.966c-0.204,0.219-0.412,0.435-0.625,0.645C196.179,507.814,185.587,512,174.89,512z"></path></svg></span> <?php echo __( 'Manage Subscriptions' );?></a>
				</li>
                                    <!--end by Community Devs LLC-->
                <?php if( $config->two_factor == '1' ){ ?>
					<li class="profile">
						<a href="<?php echo $site_url;?>/settings-twofactor/<?php echo $profile->username;?>" data-ajax="/settings-twofactor/<?php echo $profile->username;?>" target="_self"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M2,7V9H6V11H4A2,2 0 0,0 2,13V17H8V15H4V13H6A2,2 0 0,0 8,11V9C8,7.89 7.1,7 6,7H2M9,7V17H11V13H14V11H11V9H15V7H9M18,7A2,2 0 0,0 16,9V17H18V14H20V17H22V9A2,2 0 0,0 20,7H18M18,9H20V12H18V9Z" fill="currentColor"/></svg></span> <?php echo __( 'Two-factor authentication' );?></a>
					</li>
				<?php } ?>
				<li class="general">
					<a href="<?php echo $site_url;?>/my-info/<?php echo $profile->username;?>" data-ajax="/my-info/<?php echo $profile->username;?>" target="_self"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm-1-11v6h2v-6h-2zm0-4v2h2V7h-2z" fill="currentColor"/></svg></span> <?php echo __( 'My Information' );?></a>
				</li>
				<hr class="border_hr">
				<?php if( $config->invite_links_system == '1' ){ ?>
					<li class="social">
						<a href="<?php echo $site_url;?>/settings-links/<?php echo $profile->username;?>" data-ajax="/settings-links/<?php echo $profile->username;?>" target="_self"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M14 14.252V22H4a8 8 0 0 1 10-7.748zM12 13c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm6 4v-3h2v3h3v2h-3v3h-2v-3h-3v-2h3z" fill="currentColor"/></svg></span> <?php echo __( 'Invitation Links' );?></a>
					</li>
				<?php } ?>
				<?php if( $config->affiliate_system == '1' ){ ?>
					<li class="general">
						<a href="<?php echo $site_url;?>/settings-affiliate/<?php echo $profile->username;?>" data-ajax="/settings-affiliate/<?php echo $profile->username;?>" target="_self"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M12 11a5 5 0 0 1 5 5v6H7v-6a5 5 0 0 1 5-5zm-6.712 3.006a6.983 6.983 0 0 0-.28 1.65L5 16v6H2v-4.5a3.5 3.5 0 0 1 3.119-3.48l.17-.014zm13.424 0A3.501 3.501 0 0 1 22 17.5V22h-3v-6c0-.693-.1-1.362-.288-1.994zM5.5 8a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zm13 0a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zM12 2a4 4 0 1 1 0 8 4 4 0 0 1 0-8z" fill="currentColor"/></svg></span> <?php echo __( 'My affiliates' );?></a>
					</li>
				<?php } ?>
				<?php if( $config->emailNotification == '1' ){ ?>
					<li class="emails">
						<a href="<?php echo $site_url;?>/settings-email/<?php echo $profile->username;?>" data-ajax="/settings-email/<?php echo $profile->username;?>" target="_self"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M3 3h18a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zm9.06 8.683L5.648 6.238 4.353 7.762l7.72 6.555 7.581-6.56-1.308-1.513-6.285 5.439z" fill="currentColor"/></svg></span> <?php echo __( 'Manage Notifications' );?></a>
					</li>
				<?php } ?>
				<li class="password">
					<a href="<?php echo $site_url;?>/settings-password/<?php echo $profile->username;?>" data-ajax="/settings-password/<?php echo $profile->username;?>" target="_self"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M18 8h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1h2V7a6 6 0 1 1 12 0v1zm-2 0V7a4 4 0 1 0-8 0v1h8zm-5 6v2h2v-2h-2zm-4 0v2h2v-2H7zm8 0v2h2v-2h-2z" fill="currentColor"/></svg></span> <?php echo __( 'Password' );?></a>
				</li>
				<hr class="border_hr">
                <li class="block">
					<a href="<?php echo $site_url;?>/settings-blocked/<?php echo $profile->username;?>" data-ajax="/settings-blocked/<?php echo $profile->username;?>" target="_self"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zM8.523 7.109l8.368 8.368a6.04 6.04 0 0 1-1.414 1.414L7.109 8.523A6.04 6.04 0 0 1 8.523 7.11z" fill="currentColor"/></svg></span> <?php echo __( 'Blocked Users' );?></a>
				</li>
                <?php if( $admin_mode == false && $config->deleteAccount == '1' ) {?>
					<li class="delete">
						<a href="<?php echo $site_url;?>/settings-delete/<?php echo $profile->username;?>" data-ajax="/settings-delete/<?php echo $profile->username;?>" target="_self"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M7 6V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v3h5v2h-2v13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V8H2V6h5zm2-2v2h6V4H9z" fill="currentColor"/></svg></span> <?php echo __( 'Delete Account' );?></a>
					</li>
				<?php } ?>
            </ul>
        </div>
	</div>
    <div class="col m12 l8">
        <form method="POST" action="/profile/save_general_setting" class="form-general-settings">
            <div class="dt_settings">
                
                <!--
                auth_id and pro_id 
                added by Community Devs LLC-->
                
                
                <input type="hidden" id="auth_id" value="<?php echo auth()->id; ?>" />
                <input type="hidden" id="pro_id" value="<?php echo $profile->id; ?>" />
                
                
                <h2 class="user_sttng_panel_hd" style="margin-bottom:0"><?php echo __( 'General' );?> <?php echo __( 'Settings' );?></h2>
                
                <!--subtitle added by Muhammad Junaid-->    
                <p class="setting-subtitle">
                    <?php echo __( 'it_s_about_building_a_new_family__we_expect_real_information_from_wise_people' );?>
                </p>
            <div class="alert alert-success" role="alert" style="display:none;"></div>
			<div class="alert alert-danger" role="alert" style="display:none;"></div>

            <div class="row mb-0">
                <div class="col m12 s12">
					<div class="to_mat_input">
						<input name="first_name" id="first_name" class="browser-default" type="text" maxlength="30" placeholder="<?php echo __( 'Safe Name' );?>" value="<?php echo $profile->first_name;?>" autofocus>
						<label for="first_name"><?php echo __( 'Safe Name' );?></label>
					</div>
                </div>
                <!--start by Community Devs LLC-->
<!--                <div class="col m6 s12">
					<div class="to_mat_input">
						<input name="last_name" id="last_name" class="browser-default" type="text" maxlength="30" placeholder="<?php echo __( 'Last Name' );?>" value="<?php echo $profile->last_name;?>">
						<label for="last_name"><?php echo __( 'Last Name' );?></label>
					</div>
                </div>-->
                <!--end by Community Devs LLC-->
            </div>
            <div class="row mb-0">
<!--                hide this field so user could not change it
                by Community Devs LLC-->

                <div class="col m6 s12">
					<div class="to_mat_input">
						<input name="username" id="username" class="browser-default" type="text" placeholder="<?php echo __( 'Username' );?>" value="<?php echo $profile->username;?>">
						<label for="username"><?php echo __( 'Username' );?></label>
					</div>
                </div>
                <div class="col m6 s12">
					<div class="to_mat_input">
						<input name="email" id="email" class="browser-default" type="email" placeholder="<?php echo __( 'Email' );?>" value="<?php echo $profile->email;?>">
						<label for="email"><?php echo __( 'Email' );?></label>
					</div>
                </div>
            </div>
            <div class="row mb-0">
                
<!--                new location field added and hide
                by Muhammad Junaid-->
                
                <div class="col m12 s12 <?php echo $profile->admin == 0?'hide':''; ?>">
					<div class="to_mat_input">
                            <input id="ulocation" name="incomplete_address" type="text" class="browser-default current-location" placeholder="<?php echo __( 'Location' );?>" value="<?php echo $profile->incomplete_address;?>">
                            <label for="ulocation"><?php echo __( 'Place' );?></label>
					</div>
                    <input name="location" type="hidden" class="browser-default current-location-hidden" value="<?php echo $profile->location;?>">
                </div>


                
                


				<?php if( $config->disable_phone_field == 'on' ){ ?>
					<div class="col m6 s12">
						<div class="to_mat_input">
							<input name="phone_number" id="mobile" class="browser-default" type="tel" placeholder="<?php echo __( 'Mobile Number' );?>" value="<?php echo $profile->phone_number;?>">
							<label for="mobile"><?php echo __( 'Mobile Number' );?></label>
						</div>
					</div>
				<?php } ?>
                
                <!--align fields
             By Muhammad Junaid-->           
            <!--<div class="row mb-0">-->

                <div class="col m6 s12">
					<div class="to_mat_input">
						<select id="gender" name="gender" class="browser-default pp_select_has_label" <?php echo auth()->admin == 0?'disabled':''; ?>>
							<?php echo DatasetGetSelect( $profile->gender, "gender", "Choose your Gender" );?>
						</select>
						<label for="gender"><?php echo __( 'Gender' );?></label>
					</div>
                </div>

                <div class="col m6 s12">
					<div class="to_mat_input">
						<select id="country" name="country" class="browser-default pp_select_has_label">
							<option value="" disabled selected><?php echo __( 'Choose your country' );?></option>
							<?php
//                                                        in countries data id is added
//                                                        by Muhmmad junaid
								foreach( Dataset::load('countries') as $key => $val ){
									echo '<option value="'. $key .'" data-code="'. $val['isd'] .'"  '. ( ( $profile->country == $key ) ? 'selected' : '' ) .'>'. $val['name'] .'</option>';
								}
							?>
						</select>
						<label for="country"><?php echo __( 'Origional Nationality' );?></label>
					</div>
                </div>                
                <div class="col m6 s12">
					<div class="to_mat_input">
						<input name="birthday" id="birthday" class="datepicker user_bday browser-default" type="text" placeholder="<?php echo __( 'Birth date' );?>" value="<?php echo $profile->birthday;?>">
						<label for="birthday"><?php echo __( 'Birth date' );?></label>
					</div>
                </div>
                <!--</div>-->
            </div>

             
                        
				
            <?php
            
                // only display specific fields in general settings
                // By  Muhammad junaid
            
                $fields = GetProfileFieldsByLocationTypeByIds('general', '1,11,12');
            $custom_data = UserFieldsData($profile->id);
            $template = $theme_path . 'partails' . $_DS . 'profile-fields.php';
            $html = '';
            if (count($fields) > 0) {
                foreach ($fields as $key => $field) {
                    ob_start();
                    require($template);
                    $html .= ob_get_contents();
                    ob_end_clean();
                }
                echo '<div class="row mb-0">' . $html . '</div>';
                echo '<input name="custom_fields" type="hidden" value="1">';
            }
            ?>

            <?php
            
            
//            hide defaul function
//            By Muhammad junaid

//            $fields = GetProfileFields('general');
//            $custom_data = UserFieldsData($profile->id);
//            $template = $theme_path . 'partails' . $_DS . 'profile-fields.php';
//            $html = '';
//            if (count($fields) > 0) {
//                foreach ($fields as $key => $field) {
//                    ob_start();
//                    require($template);
//                    $html .= ob_get_contents();
//                    ob_end_clean();
//                }
//                echo '<div class="row mb-0">' . $html . '</div>';
//                echo '<input name="custom_fields" type="hidden" value="1">';
//            }
            ?>

            <?php if( $admin_mode == true ){?>
				<div class="row">
					<?php //if( $profile->admin !== '1' ){?>
					<div class="col m6 s12">
						<div class="to_mat_input switch">
							<label>
								<?php echo __( 'User' );?>
								<input type="hidden" name="admin" value="off" />
								<input type="checkbox" name="admin" <?php echo ( ( $profile->admin == 1 ) ? 'checked' : '' );?> >
								<span class="lever"></span>
								<?php echo __( 'Admin' );?>
							</label>
						</div>
					</div>
					<?php //}?>
					<div class="col m6 s12">
						<div class="to_mat_input switch">
							<label>
								<?php echo __( 'unverified' );?>
								<input type="hidden" name="verified" value="off" />
								<input type="checkbox" name="verified" <?php echo ( ( $profile->verified == 1 ) ? 'checked' : '' );?> >
								<span class="lever"></span>
								<?php echo __( 'verified' );?>
							</label>
						</div>
					</div>
					<?php if( $config->pro_system == 1 ) {?>
					<div class="col m6 s12">
						<div class="to_mat_input switch">
							<label>
								<?php echo __( 'Free Member' );?>
								<input type="checkbox" name="is_pro" <?php echo ( ( $profile->is_pro == 1 ) ? 'checked' : '' );?>>
								<span class="lever"></span>
								<?php echo __( 'Pro Member' );?>
							</label>
						</div>
					</div>
					<?php }?>
				</div>
                <div class="row mb-0">
                    <div class="col m6 s12">
						<div class="to_mat_input">
							<input name="balance" id="balance" class="browser-default" type="number" placeholder="<?php echo __( 'Credits' );?>" value="<?php echo (int)$profile->balance;?>" pattern="\d*" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
							<label for="balance"><?php echo __( 'Credits' );?></label>
						</div>
                    </div>
                </div>
            <?php }?>

            </div>
            
            
            <!--location group add by Community Devs LLC-->
            <div class="dt_settings">
                <h5 class="user_sttng_panel_hd"><?php echo __( 'living_in' );?></h5>
                <p class="text-green" style="color: #42a446;"><sup>*</sup> <?php echo __( 'verified_location_text' );?></p>
                <div class="row mb-0">
                    <div class="col m6 s12">
					<div class="to_mat_input">
						<select id="country_id" name="country_id" class="browser-default pp_select_has_label">
							<option value="" disabled selected><?php echo __( 'Choose your country' );?></option>
							<?php
//                                                        in countries data id is added
//                                                        by Muhmmad junaid
								foreach( Dataset::load('countries') as $key => $val ){
									echo '<option value="'. $val['id'] .'"   '. ( ( $profile->country_id == $val['id'] ) ? 'selected' : '' ) .'>'. $val['name'] .'</option>';
								}
							?>
						</select>
						<label for="country_id"><?php echo __( 'Country' );?></label>
					</div>
                </div>

                <!--added country city and state fields
                    by Community Devs LLC
                -->
                <?php $current_lang = isset($_COOKIE['activeLang']) && !empty($_COOKIE['activeLang'])?strtolower($_COOKIE['activeLang']):'english'; ?>

                <input type="hidden" name="is_location_verified" value="<?php echo $profile->is_location_verified; ?>" />
                <div class="col m6 s12">
					<div class="to_mat_input">
						<select id="state" name="state_id" class="browser-default pp_select_has_label">
							<option value="" disabled selected><?php echo __( 'Choose your state' );?></option>
							<?php
                                                        if($profile->country_id) {
                                                            $states = GetStatesByCountryId($profile->country_id, $current_lang);
                                                            foreach( $states as $state ){
                                                                    echo '<option value="'. $state['id'] .'"  '. ( ( $profile->state_id == $state['id'] ) ? 'selected' : '' ) .'>'. $state[$current_lang] .'</option>';
                                                            }
                                                        }
                                                        
							?>
						</select>
						<label for="state_id"><?php echo __( 'state_or_province	' );?></label>
					</div>
                </div>
                
                <div class="col m6 s12">
					<div class="to_mat_input">
						<select id="state" name="city_id" class="browser-default pp_select_has_label">
							<option value="" disabled selected><?php echo __( 'Choose your city' );?></option>
							<?php
                                                        if($profile->state_id) {
                                                            $cities = GetCitiesByStateId($profile->state_id, $current_lang);
                                                            foreach( $cities as $city ){
                                                                    echo '<option value="'. $city['id'] .'"  '. ( ( $profile->city_id == $city['id'] ) ? 'selected' : '' ) .'>'. $city[$current_lang] .'</option>';
                                                            }
                                                        }
                                                        
							?>
						</select>
						<label for="city_id"><?php echo __( 'City' );?></label>
					</div>
                </div>
                
                <div class="col m6 s12">
                    
                    <div class="d-flex-with-center">
                        <div class="preloaders hide">
                            <div class="preloader-icon"></div>
                        </div>
                        <div class="verify-badge <?php echo $profile->is_location_verified == 1?'badge-green':'badge-gray'; ?>">
                            <button class="btn btn-primary btn-verify verified <?php echo $profile->is_location_verified == 1?'':'hide'; ?>" type="button">
                                <i><svg enable-background="new 0 0 2039.9 2500" viewBox="0 0 2039.9 2500" xmlns="http://www.w3.org/2000/svg"><path clip-rule="evenodd" d="m1991.4 503.9-942 1934.3-1001.9-1284.1z" fill="#fff" fill-rule="evenodd"/><path d="m1019.9 0-1019.9 453.3v680c0 632.3 437.4 1223.9 1019.9 1366.7 588.2-143.9 1019.9-734.4 1019.9-1366.7v-680zm-226.6 1822.3-453.3-453.3 160.9-160.9 294.6 293.5 748-755.9 160.9 162.1z" fill="#4285f4"/></svg></i>
                                <?php echo __( 'Location Verified' );?>
                            </button>
                            <button class="btn btn-primary btn-verify unverified <?php echo $profile->is_location_verified == 1?'hide':''; ?>" type="button">
                                <?php echo __( 'Not Verified Location' );?>
                            </button>   
                        </div>
                        <div class="refresh-location">
                            <button class="btn btn-primary btn-refresh-location" <?php echo $profile->is_location_verified == 1?'disabled':''; ?>>
                                Refresh
                            </button>
                        </div>
                    </div>
                    
                </div>
                
                </div>
            </div>
            
                        <div class="dt_settings">
                            <h5 class="user_sttng_panel_hd"><?php echo __( 'Proposal' );?></h5>
                            <?php
            
                        // only display specific fields in general settings
                        // By Community Devs LLC

                        $fields = GetProfileFieldsByLocationTypeByIds('general', '27,28,29,30,31');
                        $custom_data = UserFieldsData($profile->id);
                        $template = $theme_path . 'partails' . $_DS . 'profile-fields.php';
                        $html = '';
                        if (count($fields) > 0) {
                            foreach ($fields as $key => $field) {
                                ob_start(); 
                                require($template);
                                $html .= ob_get_contents();
                                ob_end_clean();
                            }
                            echo '<div class="row mb-0">' . $html . '</div>';
                        }
                        ?>
                            
            <div class="dt_sett_footer">
                <button class="btn btn-large bold btn_primary btn_round" type="submit" name="action"><span><?php echo __( 'Save' );?></span> <svg viewBox="0 0 19 14" xmlns="http://www.w3.org/2000/svg" width="18" height="18"><path fill="currentColor" d="M18.6 6.9v-.5l-6-6c-.3-.3-.9-.3-1.2 0-.3.3-.3.9 0 1.2l5 5H1c-.5 0-.9.4-.9.9s.4.8.9.8h14.4l-4 4.1c-.3.3-.3.9 0 1.2.2.2.4.2.6.2.2 0 .4-.1.6-.2l5.2-5.2h.2c.5 0 .8-.4.8-.8 0-.3 0-.5-.2-.7z"></path></svg></button>
            </div>
                            
            <?php if( $admin_mode == true ){?>
                <input type="hidden" name="targetuid" value="<?php echo strrev( str_replace( '==', '', base64_encode($profile->id) ) );?>">
            <?php }?>
                            
            </div>
                        

            
            <!--added filter_general_setting_words field by muhammad junaid-->
            <input type="hidden" name="filter_general_setting_words" value="">
        </form>
    </div>
</div>
</div>
<!-- End Settings  -->
<!--store filter words in a variable
added by Community Devs LLC-->
<?php
$filter_words = [];
if($config->filter_words) {
    $filter_words = explode(',', $config->filter_words);
}
?>
<script>
    var $filter_words = <?php echo json_encode($filter_words); ?> 
    $(document).ready(function(){
        /***phone number format***/
        $(".phone-format").keypress(function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
            var curchr = this.value.length;
            var curval = $(this).val();
            if (curchr == 3 && curval.indexOf("(") <= -1) {
                $(this).val("(" + curval + ")" + "-");
            } else if (curchr == 4 && curval.indexOf("(") > -1) {
                $(this).val(curval + ")-");
            } else if (curchr == 5 && curval.indexOf(")") > -1) {
                $(this).val(curval + "-");
            } else if (curchr == 9) {
                $(this).val(curval + "-");
                $(this).attr('maxlength', '14');
            }
        });
    });
</script>