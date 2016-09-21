<?php
	
include("../manage_db/db_credentials.php");

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

$result = mysqli_query($con,"UPDATE $rushTable SET Interview_FinalYes = $Interview_FinalYes, Interview_FinalNo = $Interview_FinalNo, Interview_FinalAbstain = $Interview_FinalAbstain, Interview_Bid = $Interview_Bid WHERE Email = $Email");

echo $result;
echo "UPDATE $rushTable SET Interview_FinalYes = $Interview_FinalYes, Interview_FinalNo = $Interview_FinalNo, Interview_FinalAbstain = $Interview_FinalAbstain, Interview_Bid = $Interview_Bid WHERE Email = '$Email'";
?>