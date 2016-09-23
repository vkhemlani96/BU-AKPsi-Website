<?php include("/home/content/03/5577503/html/rush/password_protect.php"); ini_set('display_errors', 1); ?>
<!DOCTYPE html>
<html lang="en">

	<head>

		<title>Rushes | Alpha Kappa Psi Nu Chapter</title>
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Lato:900" rel="stylesheet">

		<style type="text/css">
			@font-face {
				font-family: 'Bebas Neue';
				src: 
					local('☺'), 
					url('../fonts/BEBASNEUE REGULAR.svg') format('svg'),
					url('../fonts/BEBASNEUE REGULAR.OTF') format('opentype'), 
					url('../fonts/BEBASNEUE REGULAR.woff') format('woff'), 
					url('../fonts/BEBASNEUE REGULAR.ttf') format('truetype');
			}
			@font-face {
				font-family: 'Bebas Neue';
				src: 
					local('☺'), 
					url('../fonts/BEBASNEUE BOLD.svg') format('svg'),
					url('../fonts/BEBASNEUE BOLD.woff') format('woff'), 
					url('../fonts/BEBASNEUE BOLD.OTF') format('opentype'), 
					url('../fonts/BEBASNEUE BOLD.ttf') format('truetype');
				font-weight: bold;
			}
			table {
				border-collapse: collapse;
			}
			table, th, td {
				border: 1px solid black;
			}
			p {
				margin: 0;
				font-family: 'Open Sans', sans-serif;
				font-size: 13px;
				text-align: left;
				padding: 0px 2px;
			}
			td {
				padding: 0;
			}
			b {
				font-weight: bold;
			}
			@media print {
				.headTable {page-break-after: always;}
			}



			.headTable {
				width: 8in;
			}
			.headTable .rushRow {
				height: 2.1in;
			}
			.headTable .rushRow td {
				position: relative;
			}
			.rushRow > td > .rushDetails {
				height: 2.1in;
				width: 1.5in;
				border-right: black solid .02in;
				float: left;
				clear: both;
			}
			.rushComments h2 {
				font-family: 'Bebas Neue';
				margin: 0;
				font-weight: normal;
				text-align: center;
				margin: 5px 0;
			}
			.rushComments table tr:first-child p {
				text-align: center;
			}
			.rushPic {
				width: 1.4in;
				height: 2in;
				margin: .04in;
				background-size: cover;
				display: inline-block;
				background-position: center;
			}
			.rushDecision {
				position: absolute;
				width: 2in;
				height: .3in;
				right: 0;
				bottom: 0;
				text-align: center;
			}
			.rushNumber {
				position: absolute;
				width: .25in;
				height: .3in;
				right: .08in;
				top: .05in;
			}
			.rushNumber p {
				text-align: right;
			}
			.rushDecision p {
				width: .5in;
				text-align: center;
				display: inline-block
			}
		</style>

	</head>

	<?php

	include("../manage_db/db_credentials.php");

	// Create connection
	$con = new mysqli($hostname, $username, $password, $dbname);

	// Check connection
	if (mysqli_connect_errno())
		die("Failed to connect to MySQL: " . mysqli_connect_error());

	//	$result = mysqli_query($con,"SELECT Email, SUM(`InvitedToClosed`), SUM(`AppSubmitted`)" . $queryBody . " FROM $rushTable");
	$whereParam = $_GET["wave"] == "0" ? "= 0" : ">= 1";
	$result = mysqli_query($con,"SELECT FirstName, LastName, MajorSchools, Grade, Email, Interview_Wave FROM $rushTable WHERE Interview_Wave $whereParam ORDER BY Interview_Wave, LastName");
	?>

	<body>

		<table class="headTable">
			<? 	
			$x = 0; 
			$y = 0;
			$wave = "1";
			$dir    = '/home/content/03/5577503/html/rush/rushPics/';
			$files1 = scandir($dir);

			while($row = mysqli_fetch_row($result)) { 
				if ($x == 5 || $row[5] != $wave) {
					$wave = $row[5];
					$x = 0; 
					echo '</table><table class="headTable">';
				}
				$x++;
				$y++;

				foreach ($files1 as $value) {
					if (strpos(".".strtolower($value), str_replace("@bu.edu","",strtolower($row[4]))) !== FALSE) {
						$img = $value;
						break;
					}
					//			$img = strpos(".".strtolower($value), str_replace("@bu.edu","",strtolower($email))) >= 0 ? $value : $image;
					//			echo $img;
				}
			?>
			<tr class="rushRow">
				<td>
					<div class="rushDetails">
						<div class="rushPic" style="background-image: url('http://buakpsi.com/rush/rushPics/<? echo $img; ?>')"></div>
						<!--						<p>Nick Madson<br>COM, Junior</p>-->
					</div>
					<div class="rushComments">
						<h2><b><? echo $row[0] . " " . $row[1] ?> </b> (<? echo $row[2] . ", " . $row[3] ?>)</p>
						<table style="border-left:none; border-right:none">
							<tr style="border-left:none; border-right:none">
								<td style="border-left:none"></td>
								<td width="100"><p>Needs Works</p></td>
								<td width="100"><p>Meets</p></td>
								<td width="100"><p>Exceeds</p></td>
								<td width="186" style="border-right: none; border-bottom: none"><p style="text-align: left; font-weight: bold;">Feedback:</p></td>
								<!--								<td><p>Feedback</p></td>-->
							</tr><tr>
							<td style="border-left:none"><p>Displays Leadership</p></td>
							<td></td><td></td><td></td>
							<td style="border:none"></td>
							</tr><tr>
							<td style="border-left:none"><p>Articulates Efficiently</p></td>
							<td></td><td></td><td></td>
							<td style="border:none"></td>
							</tr><tr>
							<td style="border-left:none"><p>Executive Presence</p></td>
							<td></td><td></td><td></td>
							<td style="border:none"></td>
							</tr>
						</table>
						<p><b>Comments: </b></p>
					</div>
					<div class="rushDecision">
						<p><b>Y</b></p><p><b>N</b></p><p>A</p>
					</div>
					<div class="rushNumber">
						<p><b>#<? echo $y; ?></b></p>
					</div>
				</td>
			</tr>
			<?
			}; // End while
			
		mysqli_close($con);
			?>
			<!--
<tr class="rushRow">
<td>
<div>
<div class="rushPic" style="background-image: url('http://buakpsi.com/rush/rushPics/Nmadson.jpg')"></div>
<p>Nick Madson<br>COM, Junior</p>
</div>
</td>
</tr><tr class="rushRow">
<td>
<div>
<div class="rushPic" style="background-image: url('http://buakpsi.com/rush/rushPics/Nmadson.jpg')"></div>
<p>Nick Madson<br>COM, Junior</p>
</div>
</td>
</tr><tr class="rushRow">
<td>
<div>
<div class="rushPic" style="background-image: url('http://buakpsi.com/rush/rushPics/Nmadson.jpg')"></div>
<p>Nick Madson<br>COM, Junior</p>
</div>
</td>
</tr><tr class="rushRow">
<td>
<div>
<div class="rushPic" style="background-image: url('http://buakpsi.com/rush/rushPics/Nmadson.jpg')"></div>
<p>Nick Madson<br>COM, Junior</p>
</div>
</td>
</tr>
-->
		</table>

	</body>

</html>