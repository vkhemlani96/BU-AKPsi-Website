<?php
	include("/home/content/03/5577503/html/rush/password_protect.php");

	include("../mamage_db/db_credentials.php");

	// Create connection
	$con = new mysqli($hostname, $username, $password, $dbname);

	// Check connection
	if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$appsTable = "rushFall2015Apps";
	$dataTable = "rushFall2015";
	$query = "SELECT * FROM rushFall2015Apps JOIN rushFall2015 ON rushFall2015Apps.email = rushFall2015.Email AND rushFall2015Apps.email = '".$_GET["email"]."'";
	$result = mysqli_query($con,$query);
//	echo "SELECT * FROM $appsTable WHERE email = ".$_GET["email"]." JOIN $dataTable ON $appsTable.email = $dataTable.Email";

//$query = "SELECT *
//    FROM $usertable
//    JOIN $eboardTable
//    ON $usertable.firstName = $eboardTable.firstName AND $usertable.lastName = $eboardTable.lastName and $usertable.status = 'Active'
//	ORDER BY $eboardTable.order";

	while($row = mysqli_fetch_object($result)) {
		$firstName = $row->FirstName;
		$lastName = $row->LastName;
		$email = $row->Email;
		$phone = $row->Phone;
		$major = $row->Majors;
		$majorSchools = $row->MajorSchools;
		$grade = $row->Grade;
		$channel = $row->Channel;
		$info1 = $row->Info1 ? "Yes" : "No";
		$info2 = $row->Info2 ? "Yes" : "No";
		$prof = $row->Prof ? "Yes" : "No";
		$bbq = $row->BBQ ? "Yes" : "No";
		$gpa = $row->gpa;
		$q1 = $row->q1_why;
		$q2 = $row->q2_words;
		$q3 = $row->q3_excite;
		$q4 = $row->q4_orgs;
		$q5 = $row->q5_work;
		$q6 = $row->q6_goals;
		$q7 = $row->q7_bro;
		$q8 = $row->q8_brohood;
		$q9 = $row->q9_second;
		$q10 = $row->q10_hear;
		$q11 = $row->q11_improve;
		$time = $row->timestamp;
		
		$dir    = '/home/content/03/5577503/html/rush/rushPics/';
		$files1 = scandir($dir);
	}
?>


<!DOCTYPE html>
<html lang="en">

<head>

	<link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.0/material.indigo-pink.min.css">
	<title>Contact Us | Alpha Kappa Psi Nu Chapter</title>
	
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
			$img = strpos(".".$value, str_replace("@bu.edu","",$email)) ? $value : $image;
			echo $img;
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
					<p><strong>Professional Night: </strong><? echo $prof;?></p>
					<p><strong>BBQ Social: </strong><? echo $bbq;?></p>
					<p><strong>Submitted At: </strong><? echo $time;?></p>
				</td>
			</tr>
		</table>
		<div class="applicationBody">
				<p class="question">Why should Alpha Kappa Psi select you?</p>
				<p><? echo $q1;?></p>
				<p class="question">What are three words that describe you?</p>
				<p><? echo $q2;?></p>
				<p class="question">What excites you about your major?</p>
				<p><? echo $q3;?></p>
				<p class="question">What organizations are you involved with or planning on involving yourself with on campus?</p>
				<p><? echo $q4;?></p>
				<p class="question">What is your most notable work experience?</p>
				<p><? echo $q5;?></p>
				<p class="question">What are your goals for the next few years of college/post-college?</p>
				<p><? echo $q6;?></p>
				<p class="question">Please list two notable interactions you had with brothers throughout the recruitment process:</p>
				<p><? echo $q7;?></p>
				<p class="question">What does brotherhood mean to you?</p>
				<p><? echo $q8;?></p>
				<? if ($q9) {?>
				<p class="question"><i>If this is not your first time applying</i>, what have you done to strengthen your candidacy?</p>
				<? echo $q9;
					} ?>
				<div style="opacity:.5">
					<p class="question">How did you hear about Alpha Kappa Psi's recruitment process?</p>
					<p><? echo $q10;?></p>
					<p class="question">What did you think of the recruitment events you attended? How do you think they could be improved?</p>
					<p><? echo $q11;?></p>
				</div>
		</div>
	</div>
	
</body>
	
</html>