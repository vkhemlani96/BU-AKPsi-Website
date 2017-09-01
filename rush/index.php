<!DOCTYPE html>
<html lang="en">

<head>


	<link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.0/material.indigo-pink.min.css">
	<script src="https://storage.googleapis.com/code.getmdl.io/1.0.0/material.min.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

	
	<!-- Latest compiled and minified JavaScript -->
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

	<title>Rush | Alpha Kappa Psi Nu Chapter</title>
	
	
	<link href="../css/styles.css" rel="stylesheet"/>
	<link href="../css/navbar.css" rel="stylesheet" />
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.color.js"></script>
	
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script>
		
		var map;
		
		var info1Marker;
		var info2Marker;
		var event1Marker;
		var event2Marker;
		
		var infosession1 = new google.maps.LatLng(42.349172, -71.106589);
		var infosession2 = new google.maps.LatLng(42.350080, -71.103776);
//		var event1 = new google.maps.LatLng(42.348839, -71.102315);
//		var event2 = new google.maps.LatLng(42.350961, -71.108859);
		
//		var bounds = new google.maps.LatLngBounds();
//		bounds.extend(infosession1);
//		bounds.extend(infosession2);
//		bounds.extend(event1);
//		bounds.extend(event2);
		
		var info1Window = new google.maps.InfoWindow({
			content: "<div class='text-center'><strong>Information Session I, Professional Night</strong><br>PHO 206 (Photonics Center Auditorium)<br><strong>Fashion Night</strong><br>PHO 906 (Photonics Center Colloquium Room)</div>"
		});
		var info2Window = new google.maps.InfoWindow({
			content: "<div class='text-center'><strong>Infomation Session II</strong><br>STO B50 (Stone Science Auditorium)</div>",
		});
//		var event1Window = new google.maps.InfoWindow({
//			content: "<div class='text-center'><strong>Fashion Night</strong><br>COM 101</div>"
//		});
//		var event2Window = new google.maps.InfoWindow({
//			content: "<div class='text-center'><strong>Community Service Event</strong><br>GSU Backcourt</div>"
//		});

		function init() {
			map = new google.maps.Map(document.getElementById('map-canvas'), {
				zoom: 17,
				center: new google.maps.LatLng(42.349626, -71.1051818),
    			scrollwheel: false,
			  });

			info1Marker = new google.maps.Marker({
				position: infosession1,
				map: map,
				title: 'Information Session I, Professional Night, Fashion Night (PHO)'
			});
			info2Marker = new google.maps.Marker({
				position: infosession2,
				map: map,
				title: 'Information Session II, Professional Night (STO)'
			});
//			event1Marker = new google.maps.Marker({
//				position: event1,
//				map: map,
//				title: 'Fashion Night (COM)'
//			});
//			event2Marker = new google.maps.Marker({
//				position: event2,
//				map: map,
//				title: 'Community Service Event (GSU)'
//			});
			
			info1Window.open(map,info1Marker);
			info2Window.open(map,info2Marker);
//			event1Window.open(map,event1Marker);
//			event2Window.open(map,event2Marker);
			
//			map.fitBounds(bounds);

		}

		google.maps.event.addDomListener(window, 'load', init);

    </script>
    <style>
		.vcenter {
			display: inline-block;
			vertical-align: middle;
			float: none;
		}
	</style>
	
</head>

<body>
	<?php include("../navbar.php"); getNavbar(true); ?>
	
	<div class="container-fluid">
		<div class="row">
			<div class="title_section vertical_padding col-md-12">
				<h1>Rush Alpha Kappa Psi</h1>
				<div class="seperator"></div>
				<h2>Unlock Your Passion</h2>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-8 col-md-offset-2" style="padding-top: 35px">
				<p>Recruitment (also known as Rush) is a process held at the beginning of each semester, during which the Fraternity holds info sessions and other events to welcome potential members. The purpose of recruitment is to allow potential members to learn about the Fraternity, network with current Brothers and determine if Alpha Kappa Psi is a good fit for them. In order to be considered for admission to the Fraternity, recruits must attend at least one event (but it is recommended that recruits attend one info session, and one other open recruitment event) and submit the Recruitment Application (which will be posted at a future time). For more information about the recruitment process, visit our <a href="/faq.php">FAQ page</a>.
			</div>
		</div>
		
		<div class="row vertical_padding">
			<div class="col-md-4 col-md-offset-4">
				<a href="signup.php?source=<?php if (strpos($_SERVER['HTTP_REFERER'], 'facebook') !== false) {echo 'fb';} else {echo 'web';} ?>" style="text-decoration: none"><p class="button text-center">Sign up for Recruitment!</p></a>
			</div>
<!--			<div class="col-md-4">-->
<!--				<a href="application.php" style="text-decoration: none"><p class="button text-center">Fill out our Application!</p></a>-->
<!--			</div>-->
		</div>
		
<!--
		<div class="row vertical_padding" style="padding-top: 0px">
			<div class="col-md-6 col-md-offset-3">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/sju8yD9JJLU" frameborder="0" allowfullscreen style="width:560px; margin: 0 auto;"></iframe></p>
		<div id="fb-root"></div><script>(function(d, s, id) {  var js, fjs = d.getElementsByTagName(s)[0];  if (d.getElementById(id)) return;  js = d.createElement(s); js.id = id;  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";  fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script><div class="fb-video" data-allowfullscreen="1" data-href="/buakpsi/videos/vb.332191163535/10153853410268536/?type=3"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/buakpsi/videos/10153853410268536/"><a href="https://www.facebook.com/buakpsi/videos/10153853410268536/">Spring Recruitment Infographic Video</a><p>Aspire. Accelerate. Achieve. RUSH ALPHA KAPPA PSISpring Recruitment 2016</p>Posted by <a href="https://www.facebook.com/buakpsi/">Alpha Kappa Psi &#064; Boston University</a> on Friday, January 22, 2016</blockquote></div></div>
			</div>
		</div>
-->
		
<!--
		<div class="row" style="background-color: #000033">
			<div class="col-md-10 col-md-offset-1" style="padding-top: 15px; padding-bottom: 15px;">
				<div class="row blue_background" style="margin-left: 0">
					<div class="col-md-6" style="padding-top:20px; padding-bottom:20px">
						<h3 class="text-left">Sign Up For Our Recruitment Mailing List:</h3>
					</div>
					<div class="col-md-6">
						<form action="#" class="row">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo col-md-7" style="display:inline-block; width: 58.33333%">
								<input class="mdl-textfield__input" type="text" id="messageName" name="messageName" />
								<label class="mdl-textfield__label" for="sample1">Email</label>
								<span class="mdl-textfield__error">Letters and spaces only</span>
							</div>
							<input class="button_gold col-md-offset-1 col-md-4" type="submit" style="margin-top: 20px; margin-bottom: 20px; background-color:transparent">
						</form>
					</div>
				</div>
			</div>
		</div>
-->
		
		<div class="">
			
			<div class="row">
				<div class="col-md-12" style="padding-right: 0; padding-left: 0">
					<div id="map-canvas" style="height: 400px; width: 100%;"></div>
				</div>
			</div>
			<div class="row vertical_padding" style="padding-bottom: 0">
				<div class="col-md-12">
					<h2><strong>Recruitment Events</strong></h2>
					<div class="seperator"></div>
				</div>
			</div>
			
			<div class="vertical_padding">
				<div class="row">
					<div class="col-md-5 col-md-offset-1">
						<h2><strong>Information Session I</strong> Monday, Sept. 18</h2>
<!--						<h4 style="padding-bottom: 5px;"><strong>Presented by Pinch</strong></h4>-->
						<h4>PHO 206 (Photonics Center Auditorium) | 6:30-8:30 PM</h4>
					</div>
					<div class="col-md-5">
						<h2><strong>Information Session  II</strong> Tuesday, Sept. 19</h2>
<!--						<h4 style="padding-bottom: 5px;"><strong>Presented by Fundraise.com</strong></h4>-->
						<h4>STO B50 (Stone Science Auditorium) | 6:30-8:30 PM</h4>
					</div>
				</div>
				<div class="row" style="margin-top:20px;">
					<p class="col-md-10 col-md-offset-1">Our information sessions are your first chance to learn what Alpha Kappa Psi and Nu Chapter are all about. Come out to learn more about the chapter's history and operation, as well as all the opportunities you can benefit from as a member of the Fraternity! The event also includes a networking session for you to meet and get to know many of the chapter's brothers. </i></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="table_seperator"></div>
				</div>
			</div>
			
			<div class="row vertical_padding">
				<div class="col-md-5 col-md-offset-1">
					<h2><strong>Professional Night</strong> Wednesday, Sept. 20</h2>
<!--					<h4 style="padding-bottom: 6px"><strong>Presented by Ann Taylor and Ministry of Supply</strong></h4>-->
					<h4>PHO 206 (Photonics Center Auditorium) | 6:30-8:30 PM</h4>
					<p style="margin-top: 20px;">Learn about career paths and professional life through our panel of senior brothers. The panel will be open to answer questions and share their experiences about their professional careers and Alpha Kappa Psi. At the end of the event, you will have an opportunity to network with the brothers in attendance. Business casual attire is required. 
</i></p>
				</div>
				<div class="col-md-5">
					<h2><strong>Fashion Night</strong> Thursday, Sept. 21</h2>
<!--					<h4 style="padding-bottom: 6px;"><strong>Presented By Luvo</strong></h4>-->
					<h4>PHO 906 (Photonics Center Colloquium Room) | 6-8 PM</h4>
					<p style="margin-top:20px;">Learn how to dress for success — our brothers will show you how to dress for any occasion, from casual networking to a cocktail party. At the end of the event, you will have an opportunity to network with the brothers in attendance. <i>Business casual is recommended but not required.</i></p>
				</div>
			</div>
			
		</div>
		
<!--
		<div class="row vertical_padding" style="padding-bottom: 0">
			<div class="col-md-12">
				<h2>A Special Thank You to <strong>Our Sponsors</strong></h2>
				<div class="seperator"></div>
			</div>
		</div>
		
		<div class="row vertical_padding">
			<div class="col-md-2 col-md-offset-1 vcenter">
				<a href="https://www.fundraise.com/" target="_blank"><img src="../img/sponsors/fundraisecom.png" width="100%"></a>
			</div><div class="col-md-2 vcenter">
				<a href="http://www.pinchapp.com/" target="_blank"><img src="../img/sponsors/pinch.png" width="100%"></a>
			</div><div class="col-md-2 vcenter">
				<a href="http://www.luvolearn.com/" target="_blank"><img src="../img/sponsors/luvo.png" width="100%">
			</div><div class="col-md-2 vcenter">
				<a href="http://www.anntaylor.com/" target="_blank"><img src="../img/sponsors/ann_taylor.png" width="100%"></a>
			</div><div class="col-md-2 vcenter">
				<a href="http://ministryofsupply.com/" target="_blank"><img src="../img/sponsors/ministry_of_supply.png" width="100%"></a>
			</div>
		</div>
-->
		
	</div>
	
	
	<?php getFooter(); ?>
	
</body>

	<script>
		$(".gm-style-iw > div").css("margin-left", "11px");
	</script>
	<style>
		.gm-style-iw {
			text-align:center;
		}
		.gm-style-iw + div {
			display: none;	
		}
	</style>
</html>