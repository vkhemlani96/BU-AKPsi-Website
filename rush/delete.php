<?php
	if (isset($_POST["email"])) {

		include("../db/credentials.php");

		// Create connection
		$con = new mysqli($hostname, $username, $password, $dbname);

		// Check connection
		if (mysqli_connect_errno())
		{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		$query = "DELETE FROM `$rushTable` WHERE CONVERT(`$rushTable`.`Email` USING utf8) = '".$_POST["email"]."'";
		$result = mysqli_query($con,$query);
		echo $result == 1 ? "Success" : "Error occured. Try again?";
		echo "<br><a href='delete.php'>Go Back</a>";
	} else {

	include("/home/content/03/5577503/html/rush/password_protect.php");?>

	<form action="delete.php" method="post"  enctype="multipart/form-data">
		<label class="mdl-textfield__label" for="email">E-Mail</label>
		<input class="mdl-textfield__input" type="text" id="email" name="email"/>
		<br>
		 <input type="submit" value="Submit">
	</form>

<? } ?>