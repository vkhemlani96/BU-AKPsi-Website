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
		<h1>Trans-Atlantic Case Competition</h1>
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
//
$caseTable = "caseFall2016";
//$sql = "INSERT INTO $caseTable (firstNameMain, lastNameMain, email, school, year, firstName1, lastName1, school1, year1, firstName2, lastName2, school2, year2, firstName3, lastName3, school3, year3, Phone, q1, q2, q3)";
////	VALUES ('" . $_POST["FirstName"] . "', '" . $_POST["LastName"] . "', '" . $_POST["Email"] . "', '" . $_POST["Grade"] . "', '" . $_POST["School"] . "', '" . $_POST["Phone"] . "', '" . $_POST["q1"] . "', '" . $_POST["q2"] . "', '" . $_POST["q3"] . "')";
//
//
//	$sql = "INSERT INTO "
$sql = "INSERT INTO $caseTable (firstNameMain, lastNameMain, email, school, year, firstName1, lastName1, school1, year1, firstName2, lastName2, school2, year2, f irstName3, lastName3, school3, year3) VALUES ('";
//	. $_POST["firstNameMain"] . "', '" . $_POST["lastNameMain"] . "', '" . $_POST["email"] . "', '" . $_POST["school"] . "', '" . $_POST["firstName1"] . "', '" . $_POST["lastName1"] . "', '" . $_POST["school1"] . "', '" . $_POST["year1"] . "', '" $_POST["firstName2"] . "', '" . $_POST["lastName2"] . "', '" . $_POST["school2"] . "', '" . $_POST["year2"] . "', '" $_POST["firstName3"] . "', '" . $_POST["lastName3"] . "', '" . $_POST["school3"] . "', '" . $_POST["year3"] . "')";

if ($conn->query($sql) === TRUE) {
	$no_error = true;

?>
	<h2 style="margin: 200px 0;"><strong>Thank you for your submission!</strong><br>We will review your submission and contact you with further details.</h2>

<?

} else {

?>
	
	<h2 style="margin: 50px 0;"><strong>An error has occured.</strong><br>Please copy paste the following and email it to <a href="mailto:warriera@bu.edu">warriera@bu.edu</a>.</h2>
	
	<?
		echo "<p class='center'>";
		
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