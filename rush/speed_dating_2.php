<?
	if (isset($_GET["rushEmail"])) {
		$sql = "UPDATE `rushFall2015` SET `sd2` = 1 WHERE `Email` = '".$_GET["rushEmail"]."' and `InvitedToClosed` = '1'";
		include("../mamage_db/db_credentials.php");

		// Create connection
		$conn = new mysqli($hostname, $username, $password, $dbname);
		// Check connection
		if ($conn->query($sql) === TRUE) {
//			echo "New record created successfully";
			$updated = true;
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	} else {
		$sql = "SELECT  `sd2` , COUNT( * ) FROM  `rushFall2015` GROUP BY `sd2`";
		include("../mamage_db/db_credentials.php");

		// Create connection
		$conn = new mysqli($hostname, $username, $password, $dbname);
		$result = mysqli_query($conn,$sql);
		if (!$result) {
			echo 'Could not run query: ' . mysqli_error($conn);
			exit;
		}
		// Check connection
//		echo $result;
		while($row = mysqli_fetch_array($result))
		{
			if ($row[0] == "1" && $row[1] > 42) {
				$closed = true;
			}
		}
	}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>Speed Dating Sign Up | Alpha Kappa Psi Nu Chapter</title>
	
	<link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.0/material.indigo-pink.min.css">
	<script src="https://storage.googleapis.com/code.getmdl.io/1.0.0/material.min.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	
	<link href="../css/styles.css" rel="stylesheet"/>
	<link href="../css/navbar.css" rel="stylesheet" />
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.color.js"></script>
</head>

<body>
	<?php include("../navbar.php"); getNavbar(true); ?>
	
	<div class="center vertical_padding title_section">
		<h1>Recruitment RSVP</h1>
		<div class="seperator"></div>
		<h2>Speed Dating #2</h2>
	</div>
	<?
		if ($updated) {
			
	?>
	<div class="vertical_padding center">
		<h2 style="margin: 120px 0">You have been registered.</h2>
		
<!--		<a href="https://recruitmentpro-app.chapterspot.com/prospects/view" target="_blank"><p>Visit Recruitment Pro!</p></a>-->
		
	</div>
	<? 		return;
		} else if ($closed) {
			
	?>
	<div class="vertical_padding center">
		<h2 style="margin: 120px 0">Unfortunately, this event is full. Please sign up for our first Speed Dating Event <a href="speed_dating_2.php">HERE</a> if you can.</h2>
		
<!--		<a href="https://recruitmentpro-app.chapterspot.com/prospects/view" target="_blank"><p>Visit Recruitment Pro!</p></a>-->
		
	</div>
	<? } else { ?>
	<div class="vertical_padding center">
		<h2 style="margin: 100px 0">Please enter your email below to reserve your seat at <strong>Speed Dating #2</strong><br>on Sept. 22nd at 6pm in the Photonics Colloquium Room.</h2>
		<form style="text-align:center; width: 60%; margin: 0 auto;" action="speed_dating_2_post.php" id="rushForm" method="get">
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
				<input class="mdl-textfield__input" type="text" id="rushEmail" name="rushEmail"/>
				<label class="mdl-textfield__label" for="sample1">E-Mail (@bu.edu)</label>
			</div>
			<button class="button" type="submit" id="formSubmit" name="formSubmit">SUBMIT</button>
		</form>
		
<!--		<a href="https://recruitmentpro-app.chapterspot.com/prospects/view" target="_blank"><p>Visit Recruitment Pro!</p></a>-->
		
	</div>
	<? } ?>
	
	
	<?php getFooter(); ?>
	
</body>

</html>