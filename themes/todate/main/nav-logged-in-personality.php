
<!-- Header  -->
<nav role="navigation" id="nav-logged-in">
	<div class="valign-wrapper nav-wrapper container-fluid">
		<div class="valign-wrapper">
			<a id="logo-container" href="<?php echo $site_url;?>/<?php if( $profile->verified == 1 ){?>find-matches<?php }?>" class="header_logo">
				<img src="<?php echo $config->sitelogo;?>" alt="" data-default="" data-light="">
			</a>
		</div>
		<div>
			
				<ul class="">
                                        <li>
						<a class="modal-trigger" href="#contactus_modal">
							<svg style="width: 32px;
    height: 32px;
    fill: #fff;" xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 512"><path fill-rule="nonzero" d="M256 0c70.69 0 134.7 28.66 181.02 74.98C483.34 121.31 512 185.31 512 256c0 70.69-28.66 134.7-74.98 181.02C390.7 483.34 326.69 512 256 512c-70.69 0-134.69-28.66-181.02-74.98C28.66 390.7 0 326.69 0 256c0-70.69 28.66-134.69 74.98-181.02C121.31 28.66 185.31 0 256 0zm-21.49 301.51v-2.03c.16-13.46 1.48-24.12 4.07-32.05 2.54-7.92 6.19-14.37 10.97-19.25 4.77-4.92 10.51-9.39 17.22-13.46 4.31-2.74 8.22-5.78 11.68-9.18 3.45-3.36 6.19-7.27 8.23-11.69 2.02-4.37 3.04-9.24 3.04-14.62 0-6.4-1.52-11.94-4.57-16.66-3-4.68-7.06-8.28-12.04-10.87-5.03-2.54-10.61-3.81-16.76-3.81-5.53 0-10.81 1.11-15.89 3.45-5.03 2.29-9.25 5.89-12.55 10.77-3.3 4.87-5.23 11.12-5.74 18.74h-32.91c.51-12.95 3.81-23.92 9.85-32.91 6.1-8.99 14.13-15.8 24.08-20.42 10.01-4.62 21.08-6.9 33.16-6.9 13.31 0 24.89 2.43 34.84 7.41 9.96 4.93 17.73 11.83 23.27 20.67 5.48 8.84 8.28 19.1 8.28 30.88 0 8.08-1.27 15.34-3.81 21.79-2.54 6.45-6.1 12.24-10.77 17.27-4.68 5.08-10.21 9.54-16.71 13.41-6.15 3.86-11.12 7.82-14.88 11.93-3.81 4.11-6.56 8.99-8.28 14.58-1.73 5.63-2.69 12.59-2.84 20.92v2.03h-30.94zm16.36 65.82c-5.94-.04-11.02-2.13-15.29-6.35-4.26-4.21-6.35-9.34-6.35-15.33 0-5.89 2.09-10.97 6.35-15.19 4.27-4.21 9.35-6.35 15.29-6.35 5.84 0 10.92 2.14 15.18 6.35 4.32 4.22 6.45 9.3 6.45 15.19 0 3.96-1.01 7.62-2.99 10.87-1.98 3.3-4.57 5.94-7.82 7.87-3.25 1.93-6.86 2.9-10.82 2.94zM417.71 94.29C376.33 52.92 319.15 27.32 256 27.32c-63.15 0-120.32 25.6-161.71 66.97C52.92 135.68 27.32 192.85 27.32 256c0 63.15 25.6 120.33 66.97 161.71 41.39 41.37 98.56 66.97 161.71 66.97 63.15 0 120.33-25.6 161.71-66.97 41.37-41.38 66.97-98.56 66.97-161.71 0-63.15-25.6-120.32-66.97-161.71z"/></svg>
						</a>
					</li>
					<li class="header_user">
						<a href="javascript:void(0);" data-target="user_dropdown" class="dropdown-trigger">
							<img src="<?php echo $profile->avater->avater;?>" alt="<?php echo $profile->full_name;?>" />
						</a>
						<ul id="user_dropdown" class="dropdown-content">
							<li>
								<a href="javascript:void(0);" onclick="logout()" class="waves-effect"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M6.265 3.807l1.147 1.639a8 8 0 1 0 9.176 0l1.147-1.639A9.988 9.988 0 0 1 22 12c0 5.523-4.477 10-10 10S2 17.523 2 12a9.988 9.988 0 0 1 4.265-8.193zM11 12V2h2v10h-2z" fill="currentColor"/></svg> <?php echo __( 'Log Out' );?></a>
							</li>
						</ul>
					</li>
                                    
				</ul>
		</div>
	</div>
    
</nav>



<div class="modal" id="contactus_modal" role="dialog" data-keyboard="false">
		<div class="modal-content">
			<h4 class="center" style="margin-bottom: 0;"><?php echo __('Contact Us');?></h4>
			<form method="POST" action="/shared/contact" class="col m12 l8">
			<div class="dt_settings" style="box-shadow: none;margin-bottom: 0;">
				<div class="alert alert-danger" role="alert" style="display:none;"></div>
				<div class="alert alert-success" role="alert" style="display:none;"></div>
				<div class="row mb-0 hide">
					<div class="col m6 s12">
						
					</div>
					<div class="col m6 s12 ">
						<div class="to_mat_input">
							<input id="last_name" name="last_name" class="browser-default" type="text" placeholder="<?php echo __( 'Last Name' );?>">
							<label for="last_name"><?php echo __( 'Last Name' );?></label>
						</div>
					</div>
				</div>
                                <div class="to_mat_input">
                                        <input id="first_name" name="first_name" class="browser-default" type="text" placeholder="<?php echo __( 'First Name' );?>" required>
                                        <label for="first_name"><?php echo __( 'First Name' );?></label>
                                </div>
				<div class="to_mat_input">
					<input id="email" name="email" class="browser-default" type="email" placeholder="<?php echo __( 'Email' );?>" required>
					<label for="email"><?php echo __( 'Email' );?></label>
				</div>
				<div class="to_mat_input">
					<textarea id="how_we_can_help" name="message" rows="3" placeholder="<?php echo __( 'How can we help?' );?>"></textarea>
					<label for="how_we_can_help"><?php echo __( 'How can we help?' );?></label>
				</div>
				<div class="dt_sett_footer" style="padding-bottom: 0;">
                                    <button class="btn btn-large modal-close waves-effect bold btn_round" type="button"><?php echo __( 'Cancel' );?></button>
                                    <button class="btn btn-large waves-effect waves-light bold btn_primary btn_round" type="submit" name="action"><span><?php echo __( 'Send' );?></span> <svg viewBox="0 0 19 14" xmlns="http://www.w3.org/2000/svg" width="18" height="18"><path fill="currentColor" d="M18.6 6.9v-.5l-6-6c-.3-.3-.9-.3-1.2 0-.3.3-.3.9 0 1.2l5 5H1c-.5 0-.9.4-.9.9s.4.8.9.8h14.4l-4 4.1c-.3.3-.3.9 0 1.2.2.2.4.2.6.2.2 0 .4-.1.6-.2l5.2-5.2h.2c.5 0 .8-.4.8-.8 0-.3 0-.5-.2-.7z"></path></svg></button>
				</div>
			</div>
		</form>
		</div>
    </div>
