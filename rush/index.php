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
//		var event2Marker;
		
		var infosession1 = new google.maps.LatLng(42.349626, -71.099547);
		var infosession2 = new google.maps.LatLng(42.35151, -71.114632);
		var event1 = new google.maps.LatLng(42.348839, -71.102315);
//		var event2 = new google.maps.LatLng(42.3498181,-71.1078257);
		
		var bounds = new google.maps.LatLngBounds();
		bounds.extend(infosession1);
		bounds.extend(infosession2);
		bounds.extend(event1);
		
		var info1Window = new google.maps.InfoWindow({
			content: "<div class='text-center'><strong>Info Session I</strong><br>HAR 105 (Questrom Auditorium)</div>"
		});
		var info2Window = new google.maps.InfoWindow({
			content: "<div class='text-center'><strong>Info Session II, Professional Night</strong><br>CGS 129 (Jacob Sleeper Auditorium)</div>",
		});
		var event1Window = new google.maps.InfoWindow({
			content: "<div class='text-center'><strong>Fashion Night</strong><br>COM 101</div>"
		});
//		var event2Window = new google.maps.InfoWindow({
//			content: "<div class='text-center'><strong>Professional Workshops</strong><br>PHO 206</div>"
//		});

		function init() {
			map = new google.maps.Map(document.getElementById('map-canvas'), {
				zoom: 17,
				center: new google.maps.LatLng(42.350608545230195, -71.10411333544312),
//				center: new google.maps.LatLng(42.35023656896355, -71.10206474999995),
    			scrollwheel: false,
			  });

			info1Marker = new google.maps.Marker({
				position: infosession1,
				map: map,
				title: 'Info Session I, Professional Night (CGS)'
			});
			info2Marker = new google.maps.Marker({
				position: infosession2,
				map: map,
				title: 'Info Session II (STO)'
			});
			event1Marker = new google.maps.Marker({
				position: event1,
				map: map,
				title: 'Coffeehouse (GSU Backcourt)'
			});
//			event2Marker = new google.maps.Marker({
//				position: event2,
//				map: map,
//				title: 'Professional Night (PHO)'
//			});
			
			info1Window.open(map,info1Marker);
			info2Window.open(map,info2Marker);
			event1Window.open(map,event1Marker);
//			event2Window.open(map,event2Marker);
			
			map.fitBounds(bounds);

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
				<h2>Dream <a style="font-size: 20px; color: #000033">x</a> Do</h2>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-8 col-md-offset-2" style="padding-top: 35px">
				<p>Recruitment (also known as Rush) is a process held at the beginning of each semester, during which the Fraternity holds info sessions and other events to welcome potential members. The purpose of recruitment is to allow potential members to learn about the Fraternity, network with current Brothers and determine if Alpha Kappa Psi is a good fit for them. In order to be considered for admission to the Fraternity, recruits must attend at least one info session, one other open recruitment event and submit the Recruitment Application (which will be posted at a future time). For more information about the recruitment process, visit our <a href="faq.php">FAQ page</a>.
			</div>
		</div>
		
		<div class="row vertical_padding">
			<div class="col-md-4 col-md-offset-4">
				<a href="signup.php?source=web" style="text-decoration: none"><p class="button text-center">Sign up for Recruitment!</p></a>
			</div>
<!--
			<div class="col-md-4 col-md-offset-4">
				<a href="application.php" style="text-decoration: none"><p class="button text-center">Fill out our Application!</p></a>
			</div>
-->
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
						<h2><strong>Info Session I</strong> Monday, Jan. 30</h2>
<!--						<h4 style="padding-bottom: 5px;"><strong>Presented by Pinch</strong></h4>-->
						<h4>HAR 105 (Questrom Auditorium) | 6-8 PM</h4>
					</div>
					<div class="col-md-5">
						<h2><strong>Info Session II</strong> Tuesday, Jan. 31</h2>
<!--						<h4 style="padding-bottom: 5px;"><strong>Presented by Fundraise.com</strong></h4>-->
						<h4>CGS 129 (Jacob Sleeper Auditorium) | 6-8 PM</h4>
					</div>
				</div>
				<div class="row" style="margin-top:20px;">
					<p class="col-md-10 col-md-offset-1">Our info sessions are your first chance to learn what Alpha Kappa Psi and Nu Chapter are all about. Come out to learn more about the chapter's history and operation, as well as all the opportunities you can benefit from as a member of the Fraternity! The event also includes a networking session for you to meet and get to know many of the chapter's brothers. <i>Attendance at One info session is required to be considered for admission.</i></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="table_seperator"></div>
				</div>
			</div>
			
			<div class="row vertical_padding">
				<div class="col-md-5 col-md-offset-1">
					<h2><strong>Professional Night</strong> Thursday, Feb. 2</h2>
<!--					<h4 style="padding-bottom: 6px"><strong>Presented by Ann Taylor and Ministry of Supply</strong></h4>-->
					<h4>CGS 129 (Jacob Sleeper Auditorium) | 6-8 PM</h4>
					<p style="margin-top: 20px;">Learn about career paths and professional life through our panel of senior brothers. The panel will be open to answer questions and share their experiences about their professional careers and Alpha Kappa Psi. At the end of the event, you will have an opportunity to network with the brothers in attendance. <i>Business casual attire is required.</i></p>
				</div>
				<div class="col-md-5">
					<h2><strong>Fashion Night</strong> Friday, Feb. 3</h2>
<!--					<h4 style="padding-bottom: 6px;"><strong>Presented By Luvo</strong></h4>-->
					<h4>CGS 129 | 6-8 PM</h4>
					<p style="margin-top:20px;">Learn how to dress for success &mdash; our brothers will show you how to dress for any occasion, from casual networking to a cocktail party. At the end of the event, you will have an opportunity to network with the brothers in attendance. <i>Business casual is recommended but not required.</i></p>
				</div>
				<div class="col-md-5 col-md-offset-3" style="margin-left: 29.1666667%; padding-top: 35px;">
					<h2><strong>Community Service Event</strong> Monday, Feb. 6</h2>
<!--					<h4 style="padding-bottom: 6px;"><strong>Presented By Luvo</strong></h4>-->
					<h4>Location TBA | 6-8 PM</h4>
					<p style="margin-top:20px;">Come network with our brothers and give back to the community. At this event, you will have the opportunity to write a short get-well card for a child at the Boston Children's Hospital. Each table will sponsor a patient, and you will be able to rotate around 10 tables and meet brothers at each table. No dress requirement is needed for this event.</p>
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