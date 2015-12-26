<?php 

$sendEmail = $_REQUEST["messageEmail"] != null;

$to      = 'vinayk@bu.edu';
$subject = $_REQUEST["messageSubject"];
$message = $_REQUEST["messageName"] . "\r\n" .$_REQUEST["messageEmail"]. "\r\n" . $_REQUEST["message"];
$headers = 'From: noreply@buakpsi.com';
	
if ($sendEmail)
	mail($to, $subject, $message, $headers);
?>


<!DOCTYPE html>
<html lang="en">

<head>

	<link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.0/material.indigo-pink.min.css">
	<title>Contact Us | Alpha Kappa Psi Nu Chapter</title>
	
	<script src="https://storage.googleapis.com/code.getmdl.io/1.0.0/material.min.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	
	<link href="css/styles.css" rel="stylesheet"/>
	<link href="css/navbar.css" rel="stylesheet" />
	<script src="js/jquery.js"></script>
	<script src="js/jquery.color.js"></script>
	
</head>

<body>
	<?php include("navbar.php"); getNavbar(true); ?>
	
	<div class="center vertical_padding title_section">
		<h1>Contact Us</h1>
		<div class="seperator"></div>
		<h2>Get In Touch With the Brotherhood</h2>
	</div>
	
	
	<div class="vertical_padding" style="position:relative">
<!--
		<div style="position:absolute; top:35px; bottom: 35px; width: 100%; z-index: -1">
			<div style="width: 100%; height: 100%; display: table">
				<div style="width: 100%; height: 310px; display: table-cell; vertical-align: middle">
					<div style="width: 50%; height: inherit; float: right" class="blue_background"></div>
				</div>
			</div>
		</div>
-->
		<table class="contact_table center" style="background:white" id="form">
				<tr>
					<td style="height:482px; width: 593px; vertical-align:middle">
					
						<?php
							if ($sendEmail)
								echo "<h2><strong>Thank you for your e-mail!<br>We will be in touch shortly.</strong></h2>";
							else
								echo '<h2><strong>Send us a message!</strong></h2>
						<div class="seperator"></div>
						
						
						<form action="#"  style="margin-right: 17px">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo" style="width:49.5%; display:inline-block">
								<input class="mdl-textfield__input" type="text" id="messageName" name="messageName" />
								<label class="mdl-textfield__label" for="sample1">Name*</label>
								<span class="mdl-textfield__error">Letters and spaces only</span>
							</div>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo" style="width:49.5%; display:inline-block">
								<input class="mdl-textfield__input" type="text" id="messageEmail" name="messageEmail"/>
								<label class="mdl-textfield__label" for="sample1">E-Mail*</label>
							</div>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
								<input class="mdl-textfield__input" type="text" id="messageSubject" name="messageSubject" />
								<label class="mdl-textfield__label" for="sample1">Subject*</label>
							</div>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
								<textarea class="mdl-textfield__input" type="text" rows= "9" id="message" name="message" ></textarea>
								<label class="mdl-textfield__label" for="sample5">Message*</label>
							</div>
							<input class="button" type="submit">
						</form>';
						?>
					

						

	<!--
						<h5>OR</h5>
						<p>E-mail us at <a href="akpsi.nu.outreach@gmail.com">akpsi.nu.outreach@gmail.com</a>!</p>
	-->

					</td>
					<td class="table_vertical_seperator">
						<div></div>
					</td>
					<td style="margin-left: 17px">
						<style>
						
						</style>

						<h2><strong>Find Us On Social Media!</strong></h2>
						<div class="seperator"></div>
						
						<table>
							<tr>
								<td>
									<a href="mailto:akpsi.nu.outreach@gmail.com">
										<img src="img/social_media/email_black.png" height="30">
									</a>
								</td><td>
									<a href="mailto:akpsi.nu.outreach@gmail.com">
										<h5>akpsi.nu.outreach@gmail.com</h5>
									</a>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<a href="mailto:akpsi.nu.outreach@gmail.com">
										<div class="table_seperator" style="padding:0"></div>
									</a>
								</td>
							</tr>
							<tr>
								<td>
									<a href="http://www.facebook.com/buakpsi" target="_blank">
										<img src="img/social_media/facebook_black.png" height="30">
									</a>
								</td><td>
									<a href="http://www.facebook.com/buakpsi" target="_blank">
										<h5>facebook.com/buakpsi</h5>
									</a>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<a href="http://www.facebook.com/buakpsi" target="_blank"><div class="table_seperator" style="padding:0"></div>
									</a>
								</td>
							</tr>
							<tr>
								<td>
									<a href="http://www.twitter.com/buakpsi" target="_blank">
										<img src="img/social_media/twitter_black.png" height="30">
									</a>
								</td><td>
									<a href="http://www.twitter.com/buakpsi" target="_blank">
										<h5>@buakpsi</h5>
									</a>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<a href="http://www.twitter.com/buakpsi" target="_blank"><div class="table_seperator" style="padding:0"></div>
									</a>
								</td>
							</tr>
							<tr>
								<td>
									<a href="http://www.instagram.com/buakpsi" target="_blank">
										<img src="img/social_media/instagram_black.png" height="30">
									</a>
								</td><td>
									<a href="http://www.instagram.com/buakpsi" target="_blank">
										<h5>@buakpsi</h5>
									</a>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<a href="http://www.instagram.com/buakpsi" target="_blank"><div class="table_seperator" style="padding:0"></div>
									</a>
								</td>
							</tr>
							<tr>
								<td>
									<a href="http://www.youtube.com/user/akpsibostonu" target="_blank">
										<img src="img/social_media/youtube_black.png" height="30">
									</a>
								</td><td>
									<a href="http://www.youtube.com/user/akpsibostonu" target="_blank">
										<h5>youtube.com/buakpsi</h5>
									</a>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<a href="http://www.youtube.com/user/akpsibostonu" target="_blank">
										<div class="table_seperator" style="padding:0; background-color:transparent"></div>
									</a>
								</td>
							</tr>
						</table>
					</td>
					
				</tr>
		</table>
	</div>
		
	<div class="blue_background vertical_padding">
		<div class="center">
			<h3><strong>NCCG</strong> Social Media</h3>
			<div class="gold_seperator"></div>
			
			
			<div class="nccg_media" style="text-align:right">
				<a href="mailto:nuchapterconsultinggroup@gmail.com">
					<div>
						<h5>nuchapterconsultinggroup@gmail.com</h5>
						<img src="img/social_media/email_white.png" height="30">
					</div>
				</a>
			</div><div class="nccg_media">
				<a href="https://www.linkedin.com/company/nu-chapter-consulting-group ">
					<div>
						<img src="img/social_media/linkedin_white.png" height="30">
						<h5>Nu Chapter Consulting Group</h5>
					</div>	
				</a>
			</div>
			<div class="nccg_media" style="text-align:right">
				<a href="http://www.facebook.com/bunccg">
					<div>
						<h5>facebook.com/BUNCCG</h5>
						<img src="img/social_media/facebook_white.png" height="30">
					</div>
				</a>
			</div><div class="nccg_media">
				<a href="https://twitter.com/nuconsulting">
					<div>
						<img src="img/social_media/twitter_white.png" height="30">
						<h5>@NuConsulting</h5>
					</div>
				</a>
			</div>
		</div>
	</div>
	
	<?php getFooter(); ?>
	
</body> 
</html>
