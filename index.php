<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Alpha Kappa Psi Nu Chapter</title>
		<link href="css/styles.css" rel="stylesheet"/>
		<link href="css/navbar.css" rel="stylesheet" />
		<script src="js/jquery.js"></script>
		<script src="js/jquery.color.js"></script>

		<link rel="apple-touch-icon" sizes="57x57" href="icon/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="icon/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="icon/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="icon/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="icon/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="icon/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="icon/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="icon/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="icon/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="icon/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="icon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="icon/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="icon/favicon-16x16.png">

		<link rel="manifest" href="icon/manifest.json">
		<meta name="msapplication-TileColor" content="#000033">
		<meta name="msapplication-TileImage" content="icon/ms-icon-144x144.png">
		<meta name="theme-color" content="#000033">
	</head>

	<body>
		<?php include("navbar.php"); getNavbar(false); ?>

		<!-- REMOVE COMMENT to bring back to rush theme
++++ Look in navbar.css and styles.css for more
<div id="banner">
<div class="center" style="width:1056px">
<h5 class="banner_text">dare to be <a class="banner_change">professional.</a></h5>
Padding required below in order to make sure it doesn't fall on blue-white border
<p style="text-align:center; padding-bottom: 80px;"><a href="rush/" class="button_gold">Rush Alpha Kappa Psi</a></p>
</div>
</div>
-->

		<style>
			#navbar {
				background-color: rgba(0,0,0,0);
				position: absolute;
				z-index: 3;
			}

			#banner {
				height: 90vh !important;
				height: 585px !important;
				overflow: hidden;
				/*				background-color: rgba(0,0,51,.7);*/
				position: relative
			}

			.banner_text {
				text-transform: none;
				font-size: 40px !important;
				text-align: center !important;
				width: 100%;
			}

			#banner #overlay {
				background-color: rgba(0,0,51,.7);
				position: absolute;
				top: 0px;
				right: 0px;
				bottom: 0px;
				left: 0px;
			}

			#about {
				position: relative;	
			}

			#rush_theme {
				margin-top: 160px;
				background-color: #000033;
				text-align: center;
				/*
				display: table-cell;
				vertical-align: middle;
				*/
			}

			#rush_theme h2 {
				margin: 0 auto;
				width: 1480px;
				max-width: 1480px;
				font-family: 'Bebas Neue';
				font-weight: bold;
				font-size: 80px;
			}

			#rush_theme h2 a {
				color: rgba(255, 255, 255, .2)
			}

			#rush_theme > div {
				position: absolute;
				top: 160px;
				height: 425px;
				width: 100vw;
				display: none;
				opacity: 0;
				background-color: rgba(0, 0, 51, .9);
			}

			#rush_theme > div > div {
				height: 425px;
				width: 100vw;
				display: table-cell;
				vertical-align: middle;
			}

			#rush_theme h1 {
				color: white;
				margin-top: 0;
				font-size: 180px;
			}
		</style>

		<!--
<div id="banner">
<div style="position: absolute; z-index: 1; top: 190px; left: 0; right: 0;">
<h5 class="banner_text">The International Co-Ed Professional Business Fraternity</h5>
<div style="position: absolute; z-index: 10; width: inherit; top: 160px;left: 0; right: 0">
<p style="text-align:center"><a href="./about.php" class="button_gold">Learn More</a></p>
</div>
</div>
<div id="overlay"></div>
<video autoplay="autoplay" loop="loop" src="img/index_video_2.mov" style="width: 100vw" muted></video>
</div>
-->
		<div id="banner">
			<div id="rush_theme">
				<h2><a>Omega&emsp;</a><a class="stand_out">Alpha</a><a>&emsp;Beta&emsp;Gamma&emsp;Delta&emsp;Epsilon&emsp;Zeta&emsp;Eta&emsp;Theta&emsp;Iota&emsp;</a><a class="stand_out">Kappa</a><a>&emsp;Lambda&emsp;Mu&emsp;Nu&emsp;Xi&emsp;Omicron&emsp;Pi&emsp;Rho&emsp;Sigma&emsp;Tau&emsp;Upsilon&emsp;Phi&emsp;Chi&emsp;</a><a class="stand_out">Psi</a><a>&emsp;Omega&emsp;Alpha&emsp;Beta&emsp;Gamma&emsp;Delta&emsp;Epsilon&emsp;Zeta&emsp;Eta&emsp;Theta&emsp;Iota</a></h2>

				<div>
					<div>
						<h1>STAND OUT</h1>
						<p style="text-align:center"><a href="./about.php" class="button_gold">Rush Alpha Kappa Psi</a></p>
					</div>
				</div>
			</div>
		</div>
		<!--END RETURN-->

		<div id="about" class="center">
			<table>
				<tr>
					<td>
						<img src="img/index_coat_of_arms_large.png" />
					</td>
					<td width="750px">
						<h2>About <strong>Alpha Kappa Psi</strong></h2>
						<div class="seperator"></div>
						<p style="width:700px; line-height:24px;">In 1904, Alpha Kappa Psi was founded on the principles of educating its members and the public to appreciate and demand higher ideals in business and to further the individual welfare of members during college and beyond. College men and women everywhere are discovering that Alpha Kappa Psi is much more than just another organization or club &mdash; it is a unique, prestigious association of students, professors, graduates and professionals with common interests and goals. They join Alpha Kappa Psi to take advantage of valuable educational, friendship and networking opportunities.</p>
					</td>
				</tr>
			</table>
		</div>
		<div class="blue_background">
			<div class="center" id="social_media">
				<table>
					<tr>
						<td><h3>Find us on Social Media:</h3></td>
						<td>
							<a href="http://www.facebook.com/buakpsi" target="_blank"><img src="img/social_media/facebook_white.png" width="30"></a><span></span>
						</td>
						<td>
							<a href="http://www.twitter.com/buakpsi" target="_blank"><img src="img/social_media/twitter_white.png" width="30"></a><span></span>
						</td>
						<td>
							<a href="http://www.instagram.com/buakpsi" target="_blank"><img src="img/social_media/instagram_white.png" width="30"><span></a></span>
						</td>
						<td>
							<a href="http://www.youtube.com/user/akpsibostonu" target="_blank"><img src="img/social_media/youtube_white.png" width="30"><span></a></span>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="vertical_padding" id="comps">
			<h2 class="center">Our Brothers <strong>Work and Intern At...</strong></h2>
			<div class="seperator"></div>
			<table>

				<tr>
					<td>
						<img class="imgCell0" src="img/index_companies/citigroup_cropped.png">
					</td><td>
					<img class="imgCell1" src="img/index_companies/pwc_cropped.png">
					</td><td>
					<img class="imgCell2" src="img/index_companies/ibm_cropped.png">
					</td>

				</tr>
			</table>
		</div>

		<?php getFooter(); ?>
		<!--
<table class="center" id="organizations">
<tr>
<td class="blue_background vertical_padding" id="org_text" width="33%">
<div>
<h3>Nu Chapter-Run Organizations</h3>
<div class="gold_seperator"></div>
</div>
</td>
<td class="vertical_padding" width="33%">
<div>
<img src="img/index_NCCG_logo.png" width="200">
<p>Nu Chapter Consulting Group is a student consulting group founded by Alpha Kappa Psi Nu Chapter in 2012. The group provides consulting services in the fields of finance, accounting, marketing, operations management and information systems to small and medium-sized businesses and startups.</p>
</div>
</td>
<td class="vertical_padding" width="33%">
<div>
<img src="img/index_elevate_logo.png" width="200">
<p>Elevate is a student consulting group that was founded by Alpha Kappa Psi Nu Chapter in 2013. The group provides consulting services for academic programs and entrepreneurship initiatives.</p>
</div>
</td>
</tr>
</table>
-->
	</body>

	<script>
		$("#rush_theme h2 a.stand_out").each(function(index) {
			var anchor = $(this);
			setTimeout(function() {
				console.log(anchor.css("color"));
				anchor.animate({
					color: "white"
				}, 400);
			}, index * 800)
		});
		setTimeout(function() {
			$("#rush_theme > div").css("display", "block");
			$("#rush_theme > div").animate({
				opacity: 1
			}, 500);
		}, 2700)

		//Counter to go throw array containing image links
		var imgCellIndex = 1;
		//Array of arrays that contain imgs to display in each cell
		var imgCell = [ [
			"citigroup",
			"ey",
			"fidelity",
			"kpmg",
			"boomberg",
		],[
			"pwc",
			"fleishmanhilliard",
			"ritzcarlton",
			"ubs",
			"deloitte",
		],[
			"ibm",
			"boa",
			"jpmorgan",
			"hsbc",
			"accenture",
		]];

		function changeImgCell(index) {
			$(".imgCell" + index).fadeOut(function() {
				$(this).attr("src", "img/index_companies/" + imgCell[index][imgCellIndex] + "_cropped.png");
			}).fadeIn();
			if (index == 0) {
				imgCellIndex = (imgCellIndex + 1) % 5;	
			}
		}

		setInterval(function() {
			//Changes Middle Cell
			changeImgCell(1);
			setTimeout(function() {
				//Changes Right Cell after delay
				changeImgCell(2)
			}, 1000);
			setTimeout(function() {
				//Changes Left Cell after delay
				changeImgCell(0)
			}, 2000);
		}, 3000);

		setTimeout(function() {
			$(".dropdown").each(function(index){
				$(this).css("left", "0");

				var parent = $(this).parent();
				var parentLeft = parent.offset().left;
				var parentRight = parentLeft + parent.outerWidth();
				var parentCenter = (parentLeft + parentRight)/2;
				var newOffset = $(this).offset();

				newOffset.top = 0;
				newOffset.left = parentCenter - $(this).outerWidth()/2;
				$(this).offset(newOffset);
				//		$(this).left("1000px");
			});
		}, 100);
	</script>

</html>