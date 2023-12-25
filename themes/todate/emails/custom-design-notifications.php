<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
	<head>
		<meta name="viewport" content="width=device-width" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Actionable emails e.g. reset password</title>
		<style type="text/css">
			img {
			max-width: 100%;
			}
			body {
			-webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6em;
			}
			body {
			background-color: #f5f5f5;
			}
			@media only screen and (max-width: 640px) {
			body {
			padding: 0 !important;
			}
			h1 {
			font-weight: 800 !important; margin: 20px 0 5px !important;
			}
			h2 {
			font-weight: 800 !important; margin: 20px 0 5px !important;
			}
			h3 {
			font-weight: 800 !important; margin: 20px 0 5px !important;
			}
			h4 {
			font-weight: 800 !important; margin: 20px 0 5px !important;
			}
			h1 {
			font-size: 22px !important;
			}
			h2 {
			font-size: 18px !important;
			}
			h3 {
			font-size: 16px !important;
			}
			.container {
			padding: 0 !important; width: 100% !important;
			}
			.content {
			padding: 0 !important;
			}
			.content-wrap {
			padding: 10px !important;
			}
			.invoice {
			width: 100% !important;
			}
			}
		</style>
	</head>
	<body itemscope itemtype="http://schema.org/EmailMessage" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6em; background-color: #f6f6f6; margin: 0;">
		<table class="body-wrap" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: #f5f5f5; margin: 0;">
			<tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
				<td class="container" width="700" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;" valign="top">
					<div class="content" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
						<table class="main" width="100%" cellpadding="0" cellspacing="0" itemprop="action" itemscope itemtype="http://schema.org/ConfirmAction" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 7px; background-color: #fff; margin: 0;box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
							<tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
								<td class="content-wrap" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 5px 10px;border: 1px solid #353533;background-color: #353533;border-top-left-radius: 6px;
    border-top-right-radius: 6px;" valign="top">
									<meta itemprop="name" content="Confirm Email" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;" />
									<table width="100%" cellpadding="0" cellspacing="0" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
										<tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
											<td class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: middle; margin: 0; padding: 0; width: 20%; position: relative;text-align: center;display: block;" valign="middle">
                                                                                            
                                                                                            <div style="max-height:0;max-width:0;overflow: visible;">
        <div style="width: 30px;
    height: 30px;
    display: inline-block;
    text-align: center;
    line-height: 30px;
    background: transparent;
    margin-left: 20px;
    margin-top: 9px;
    ">
            <span>
                                                                                                <img src="https://queenmuslima.com/themes/todate/assets/img/bell-3.png" alt="bell" width="30px" />
                                                                                            </span>
        </div>
    </div>
                                                                                            <div style="max-height:0;max-width:0;overflow: visible;">
        <div style="width:20px;height:20px;margin-top:6px;margin-left:35px;display:inline-block;text-align:center;line-height:20px;font-size:10px;">
        <a href="<?php echo $notification_url; ?>" style="text-decoration: none;">   
        <?php if($notifications > 0) { ?>
            <span class="count" style="width: 15px;
    height: 15px;
    line-height: 15px;
    background-color: #d33007;
    text-align: center;
    border-radius: 100%;
    border: 2px solid #222;
    color: #fff;
    font-weight: bold;
    font-size: 10px;
    display: block;"><?php echo $notifications; ?></span>
           <?php } ?>
        </a>
        </div>
    </div>
                                                                                            
                                                                                        </td>
                                                                                    <td class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: middle; margin: 0; padding: 0; width: 60%;text-align: center;" valign="middle">
                                                                                        <img src="https://www.queenmuslima.com/themes/todate/assets/img/logo-light.png" alt="logo" style="width: 50%;" />
											</td>
                                                                                    <td class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: middle; margin: 0; padding: 0; width: 20%;text-align: center;" valign="middle">
                                                                                        <a href="<?php echo $profile_url; ?>" style="text-decoration: none;">
                                                                                                <img src="<?php echo $profile_pic; ?>" alt="user| <?= $profile_pic; ?>" style="width: 30%;
    border-radius: 100%;
    border: 1px solid #222;
    margin-top: 5px;" /> </a>
											</td>
										</tr>
										
									</table>
								</td>
							</tr>
                                                        <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
								<td class="content-wrap" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 20px;border: 1px solid #ddd;border-radius: 6px; border-top-left-radius: 0; border-top-right-radius: 0;" valign="top">
									<meta itemprop="name" content="Confirm Email" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;" />
									<table width="100%" cellpadding="0" cellspacing="0" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
										<tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
											<td class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                                                            <a href="<?php echo $config->uri . '/@' . $username;?>" style="text-decoration:none;color:#444;">
                                                                                                <?php echo $full_name;?></a>
                                                                                            <div style="color:#666;font-size:12px;">
                                                                                                <b>
                                                                                                    <?php echo $contents;?>
                                                                                                </b>
                                                                                            </div>
                                                                                        </td>
										</tr>
										
									</table>
								</td>
							</tr>
						</table>
					</div>
				</td>
				<td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
			</tr>
                    <tr>
                            <td style="text-align:center; padding-bottom: 0px;">
                                <a href="https://queenmuslima.com/terms" style="text-decoration:none;">Term Of Use</a> / 
                                <a href="https://queenmuslima.com/privacy" style="text-decoration:none;">Privacy Policy</a> /  
                                <a href="https://queenmuslima.com/page/community_guidelines" style="text-decoration:none;">Community Standard</a> / 
                                <a href="https://queenmuslima.com/contact" style="text-decoration:none;">Support</a>
                            </td>
                        </tr>
                    <tr>
                            <td style="text-align:center; padding-bottom: 0px; color: gray;">
                                224 Madison Avenue, New York, NY, USA
                            </td>
                        </tr>
                    <tr>
                            <td style="text-align:center; padding-bottom: 0px;">
                                <a style="color: gray;" href="https://facebook.com/queenmuslimadotcom" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="margin: 0;"><path fill="currentColor" d="M12 2.04C6.5 2.04 2 6.53 2 12.06C2 17.06 5.66 21.21 10.44 21.96V14.96H7.9V12.06H10.44V9.85C10.44 7.34 11.93 5.96 14.22 5.96C15.31 5.96 16.45 6.15 16.45 6.15V8.62H15.19C13.95 8.62 13.56 9.39 13.56 10.18V12.06H16.34L15.89 14.96H13.56V21.96A10 10 0 0 0 22 12.06C22 6.53 17.5 2.04 12 2.04Z"></path></svg></a>
                                <a style="color: gray;" href="https://twitter.com/queen_muslima" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="margin: 0;"><path fill="currentColor" d="M22.46,6C21.69,6.35 20.86,6.58 20,6.69C20.88,6.16 21.56,5.32 21.88,4.31C21.05,4.81 20.13,5.16 19.16,5.36C18.37,4.5 17.26,4 16,4C13.65,4 11.73,5.92 11.73,8.29C11.73,8.63 11.77,8.96 11.84,9.27C8.28,9.09 5.11,7.38 3,4.79C2.63,5.42 2.42,6.16 2.42,6.94C2.42,8.43 3.17,9.75 4.33,10.5C3.62,10.5 2.96,10.3 2.38,10C2.38,10 2.38,10 2.38,10.03C2.38,12.11 3.86,13.85 5.82,14.24C5.46,14.34 5.08,14.39 4.69,14.39C4.42,14.39 4.15,14.36 3.89,14.31C4.43,16 6,17.26 7.89,17.29C6.43,18.45 4.58,19.13 2.56,19.13C2.22,19.13 1.88,19.11 1.54,19.07C3.44,20.29 5.7,21 8.12,21C16,21 20.33,14.46 20.33,8.79C20.33,8.6 20.33,8.42 20.32,8.23C21.16,7.63 21.88,6.87 22.46,6Z"></path></svg></a>
                            </td>
                        </tr>
                    
                    <tr>
                            <td style="text-align:center; padding-bottom: 0px;">
                                <div style="max-width: 500px;
    margin: 0 auto;
    color: #aaa;">You have received this email because you are a member of queenmuslima.com <a href="<?php echo $unsub_url; ?>">Unsubscribe</a></div>
                            </td>
                        </tr>
                    
                    <tr>
                            <td style="text-align:center; padding-bottom: 0px; color: gray;">
                                © <?php echo date('Y'); ?> <a href="https://queenmuslima.com">Queen Muslima</a>
                            </td>
                        </tr>
		</table>
	</body>
</html>