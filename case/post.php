<!DOCTYPE html>
<html lang="en">

<head>
	<title>Application | Alpha Kappa Psi Nu Chapter</title>
	
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
		<h1>4th Annual Case Competition</h1>
		<div class="seperator"></div>
		<h2></h2>
	</div>


<?php
ini_set('display_errors', 1);

$no_error = false;
	
include("../db/credentials.php");

// Create connection
$conn = new mysqli($hostname, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 

	$caseTable = "caseSpring2017";
	$sql = "INSERT INTO $caseTable (teamName, name, email, school, year, major, name1, school1, year1, major1, name2, school2, year2, major2, name3, school3, year3, major3) VALUES ('" . $_POST["teamName"] . "', '" . $_POST["name"] . "', '" . $_POST["email"] . "', '" . $_POST["school"] . "', '" . $_POST["year"] . "', '" . $_POST["major"] . "', '" . $_POST["name1"] . "', '" . $_POST["school1"] . "', '" . $_POST["year1"] . "', '" . $_POST["major1"] . "', '" . $_POST["name2"] . "', '" . $_POST["school2"] . "', '" . $_POST["year2"] . "', '" . $_POST["major2"] . "', '" . $_POST["name3"] . "', '" . $_POST["school3"]	. "', '" . $_POST["year3"]	. "', '" . $_POST["major3"] . "')";

if ($conn->query($sql) === TRUE) {
	$no_error = true;

?>
	<h2 style="margin: 200px 0;"><strong>Thank you for signing up!</strong><br>To complete your submission, please send copies of each team member's resumes to <a href="mailto:njohari@bu.edu">njohari@bu.edu</a>!</h2>

<?

} else {

?>
	
	<h2 style="margin: 50px 0;"><strong>An error has occured.</strong><br>Please copy paste the following and email it to <a href="mailto:jskim@bu.edu">njohari@bu.edu</a>.</h2>
	
	<?
		echo "<p class='center'>";
	
//		echo $sql . "<br>";
		
		echo $conn->error . "<br>";
	
		
		foreach($_POST as $stuff ) {
			if( is_array( $stuff ) ) {
				foreach( $stuff as $thing ) {
					echo $thing;
				}
			} else {
				echo $stuff;
			}
			echo "<br>";
		}
		
		echo "</p><br><br><br><br>";
		
	}

$conn->close();


	getFooter();

?>

	</body>
</html>