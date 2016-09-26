<?php

include("../db/credentials.php");

// Create connection
$con = new mysqli($hostname, $username, $password, $dbname);

// Check connection
if (mysqli_connect_errno())
	echo "Failed to connect to MySQL: " . mysqli_connect_error();

htmlspecialchars($_POST["name"]);

$Email = htmlspecialchars($_POST["email"]);
$Interview_FinalYes = htmlspecialchars($_POST["yes"]);
$Interview_FinalNo = htmlspecialchars($_POST["no"]);
$Interview_FinalAbstain = htmlspecialchars($_POST["abs"]);
$Interview_Bid = htmlspecialchars($_POST["bidInt"]);

$query = "UPDATE $rushTable SET Interview_FinalYes = $Interview_FinalYes, Interview_FinalNo = $Interview_FinalNo, Interview_FinalAbstain = $Interview_FinalAbstain, Interview_Bid = $Interview_Bid WHERE Email = '$Email';";

$result = mysqli_query($con,$query);

if (!$result) {
	echo "-1";
	return;
} else {
	//	echo mysqli_query($con,"SELECT COUNT(*) FROM $rushTable");
	$result = mysqli_query($con,"SELECT SUM(Interview_Bid) FROM $rushTable");
	$row = mysqli_fetch_array($result);
	echo $row[0];
}

mysqli_close($con);

?>