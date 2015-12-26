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
		var profNightMarker;
		var socialMarker;
		var infosession1 = new google.maps.LatLng(42.349639,-71.0995457);
		var infosession2 = new google.maps.LatLng(42.3494308,-71.098098);
		var profNight = new google.maps.LatLng(42.348874,-71.102463);
		var social = new google.maps.LatLng(42.3507745,-71.1060315);
//		var LatLngList = new Array(infosession1, infosession2, profNight, social);
//		var bounds = new google.maps.LatLngBounds ();
//		//  Go through each...
//		for (var i = 0, LtLgLen = LatLngList.length; i < LtLgLen; i++) {
//		  //  And increase the bounds to take this point
//		  bounds.extend (LatLngList[i]);
//		}
		
		var info1Window = new google.maps.InfoWindow({
			content: "<div class='text-center'><strong>Infosession #1</strong><br>Questrom 105</div>"
		});
		var info2Window = new google.maps.InfoWindow({
			content: "<div class='text-center'><strong>Infosession #2</strong><br>KCB 101</div>",
		});
		var profNightWindow = new google.maps.InfoWindow({
			content: "<div class='text-center'><strong>Professional Night</strong><br>COM 101</div>"
		});
		var socialWindow = new google.maps.InfoWindow({
			content: "<div class='text-center'><strong>BBQ Social</strong><br>BU Beach</div>"
		});

		function init() {
			map = new google.maps.Map(document.getElementById('map-canvas'), {
				zoom: 17,
				center: new google.maps.LatLng(42.35023656896355, -71.10206474999995),
    			scrollwheel: false,
			  });

			info1Marker = new google.maps.Marker({
				position: infosession1,
				map: map,
				title: 'Infosession #1 (Questrom)'
			});
			info2Marker = new google.maps.Marker({
				position: infosession2,
				map: map,
				title: 'Infosession #2 (KCB)'
			});
			profNightMarker = new google.maps.Marker({
				position: profNight,
				map: map,
				title: 'Professional Night (COM)'
			});
			socialMarker = new google.maps.Marker({
				position: social,
				map: map,
				title: 'BBQ Social (KCB)'
			});
			
			info1Window.open(map,info1Marker);
			info2Window.open(map,info2Marker);
			profNightWindow.open(map,profNightMarker);
			socialWindow.open(map,socialMarker);

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
				<h2>Dare to be Remarkable</h2>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-10 col-md-offset-1" style="padding-top: 35px">
				<p>Recruitment (also known as Rush) is a process held at the beginning of each semester, during which the Fraternity holds infosessions and other events to welcome potential members. The purpose of recruitment is to allow potential members to learn about the Fraternity, network with current Brothers and determine if Alpha Kappa Psi is a good fit for them. In order to be considered for admission to the Fraternity, recruits must attend at least one infosession, one other open recruitment event and submit the Recruitment Application (which will be posted at a future time). For more information about the recruitment process, visit our <a href="faq.php">FAQ page</a>.</p>
			</div>
		</div>
		
		<div class="row vertical_padding">
			<div class="col-md-4 col-md-offset-2">
				<a href="signup.php?src=web" style="text-decoration: none"><p class="button text-center">Sign up for Recruitment!</p></a>
			</div>
			<div class="col-md-4">
				<a href="application.php" style="text-decoration: none"><p class="button text-center">Fill out our Application!</p></a>
			</div>
		</div>
		
		
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
						<h2><strong>Infosession #1</strong> Monday, Sept. 14</h2>
						<h4 style="padding-bottom: 5px;"><strong>Presented by Pinch</strong></h4>
						<h4>Questrom 105 | 6-8PM</h4>
					</div>
					<div class="col-md-5">
						<h2><strong>Infosession #2</strong> Tuesday, Sept. 15</h2>
						<h4 style="padding-bottom: 5px;"><strong>Presented by Fundraise.com</strong></h4>
						<h4>KCB 101 | 6-8PM</h4>
					</div>
				</div>
				<div class="row" style="margin-top:20px;">
					<p class="col-md-10 col-md-offset-1">Our infosessions are your first chance to learn what Alpha Kappa Psi and Nu Chapter are all about. Come out to learn more about the chapter's history and operations, as well as all the opportunities you can benefit from as a member of the Fraternity! The event also includes a networking session for you to meet and get to know many of the chapter's brothers. <i>One infosession is required to be considered for admission.</i></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="table_seperator"></div>
				</div>
			</div>
			
			<div class="row vertical_padding">
				<div class="col-md-5 col-md-offset-1">
					<h2><strong>Professional Night</strong> Thursday, Sept. 17</h2>
					<h4 style="padding-bottom: 6px"><strong>Presented by Ann Taylor and Ministry of Supply</strong></h4>
					<h4>COM 101 | 6-8PM</h4>
					<p style="margin-top: 20px;">Professional night will begin with an informative fashion show in which our own brothers will be modeling outfits and explaining the fundamentals of professional attire! The show will be followed by a panel of brothers speaking about their experiences within the brotherhood and answering many of your questions. At the end of the event, you will again have the chance to network with all of the brothers in attendance! <i>Professional attire is not required.</i></p>
				</div>
				<div class="col-md-5">
					<h2><strong>BBQ Social</strong> Saturday, Sept. 19</h2>
					<h4 style="padding-bottom: 6px;"><strong>Presented By Luvo</strong></h4>
					<h4>BU Beach | 12-2PM</h4>
					<p style="margin-top:20px;">Our BBQ Social is the last chance to meet the brothers before recruitment applications are due! This networking-focused event will feature food from local vendors around campus and a few lawn games to show your competitive side.</p>
				</div>
			</div>
			
		</div>
		
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