<?php
	include("/home/content/03/5577503/html/rush/password_protect_cookie.php");

	include("../db/db.php");
	include("application_questions.php");

	// Create connection
	$con = new mysqli($hostname, $username, $password, $dbname);

	// Check connection
	if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$query = "SELECT * FROM $rushTableApps JOIN $rushTable ON $rushTableApps.email = $rushTable.Email AND $rushTableApps.email = '".$_GET["email"]."'";
	$result = mysqli_query($con,$query);

	$row = mysqli_fetch_array($result);
	$firstName = $row["FirstName"];
	$lastName = $row["LastName"];
	$email = $row["Email"];
	$phone = $row["Phone"];
	$major = $row["Majors"];
	$majorSchools = $row["MajorSchools"];
	$grade = $row["Grade"];
	$channel = $row["Channel"];
	$info1 = $row["Info1"] ? "Yes" : "No";
	$info2 = $row["Info2"] ? "Yes" : "No";
	$event1 = $row["Professional"] ? "Yes" : "No";
	$event2 = $row["Coffeehouse"] ? "Yes" : "No";
	$gpa = $row["gpa"];

	$time = $row["timestamp"];
	$time = strtotime($time) + (3600 * 3);
	$time = date("m/d/Y h:i A", $time);

	$dir    = '/home/content/03/5577503/html/rush/rushPics/';
	$files1 = scandir($dir);
?>


<!DOCTYPE html>
<html lang="en">

<head>

	<link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.0/material.indigo-pink.min.css">
	<title>View Application | Alpha Kappa Psi Nu Chapter</title>
	
	<link href="../css/styles.css" rel="stylesheet"/>
	<link href="../css/navbar.css" rel="stylesheet" />
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.color.js"></script>
	
</head>

<body>
	<?php include("../navbar.php"); getNavbar(true); ?>
	
	<div class="center vertical_padding title_section">
		<h1><? echo ($firstName . " " . $lastName) ;?></h1>
		<div class="seperator"></div>
<!--		<h2>Get In Touch With the Brotherhood</h2>-->
	</div>
	
	<style>
		td {
			width: 33%;
			vertical-align: middle;
		}
		td p {
			margin-left: 15px;
			line-height: 30px;;
		}
		
		.applicationBody p.question {
			padding: 20px 0 10px;
			font-weight:bold;
		}
	</style>
	
	<div class="center vertical_padding">
		<table>
			<tr>
				<td>
					<img src="http://buakpsi.com/rush/rushPics/<?
		
		foreach ($files1 as $value) {
			if (strpos(".".strtolower($value), str_replace("@bu.edu","",strtolower($email))) !== FALSE) {
				echo $value;
			}
//			$img = strpos(".".strtolower($value), str_replace("@bu.edu","",strtolower($email))) >= 0 ? $value : $image;
//			echo $img;
		}?>" height="200">
				</td><td>
					<p><strong>Grade: </strong><? echo $grade;?></p>
					<p><strong>School: </strong><? echo $majorSchools;?></p>
					<p><strong>Majors: </strong><? echo $major;?></p>
					<p><strong>Email: </strong><? echo $email;?></p>
					<p><strong>Phone: </strong><? echo $phone;?></p>
					<p><strong>GPA: </strong><? echo $gpa;?></p>
				</td><td>
					<p><strong>Channel: </strong><? echo $channel;?></p>
					<p><strong>Info1: </strong><? echo $info1;?></p>
					<p><strong>Info2: </strong><? echo $info2;?></p>
					<p><strong>Professional Workshops: </strong><? echo $event1;?></p>
					<p><strong>Coffeehouse: </strong><? echo $event2;?></p>
					<p><strong>Submitted At: </strong><? echo $time;?></p>
				</td>
			</tr>
		</table>
		<div class="applicationBody">
			<?
				foreach($appQuestions as $key => $question) {
					if (isset($row["q".$key])) {
			?>
				<p class="question"><? echo $question[0]; ?></p>
				<p><? echo $row["q".$key];?></p>
			<?
					}
				}
			?>
				<div style="opacity:.5">
					<?
						foreach($feedbackQuestions as $key => $question) {
							if (isset($row["fb".$key])) {
					?>
						<p class="question"><? echo $question; ?></p>
						<p><? echo $row["fb".$key];?></p>
					<?
							}
						}
					?>
				</div>
		</div>
	</div>
	
</body>
	
</html>