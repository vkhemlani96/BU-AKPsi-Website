<?php
include("../db/credentials.php");

	$conn = new mysqli($hostname, $username, $password, $dbname);
	$sql = "UPDATE $rushTable SET StartedLogic=1 WHERE email='".$_POST['email']."'";
	$conn->query($sql);
	$conn->close();
?>