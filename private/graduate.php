<?php

include("../db/credentials.php");
$usertable="brothers";
$eboardTable="eboard";
$yourfield = "LAST_NAME";

$link = mysqli_connect($hostname,$username, $password) or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please try again later.')</script></html>");
mysqli_select_db($link, $dbname);

$classes = array();

$query = "SELECT firstName, lastName, class, email, status AS s FROM $usertable WHERE status = 'Active' OR status = 'Inactive' ORDER BY lastName";
$result = mysqli_query($link, $query);


?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Brothers | Alpha Kappa Psi Nu Chapter</title>
		<link href="../css/styles.css" rel="stylesheet"/>
		<link href="../css/navbar.css" rel="stylesheet" />
		<script src="../js/jquery.js"></script>
		<script src="../js/jquery.color.js"></script>
		<script src="../js/countup.js"></script>
		
		<style>
			table {
				width: 100%
			}
			table p {
				padding: 10px 0;
			}
			table tr {
				border-bottom: 1px solid lightgray;
			}
		</style>
	</head>

	<body>
		<?php include("../navbar.php"); getNavbar(true); ?>

		<div class="center vertical_padding title_section">
			<h1>Alumni Brothers</h1>
			<div class="seperator"></div>
		</div>

		<div class="center vertical_padding">
			<table>
				<?
				while ($obj = mysqli_fetch_object($result)) {
					$class = $obj->class;
					if (!in_array($class, $classes)) {
						array_push($classes, $class);

					}
					var_dump(strcmp($obj->s, "Active"));
					echo "<tr><td><p>$obj->lastName</p></td><td><p>$obj->firstName</p></td><td><p>$obj->class</p></td><td><p>$obj->s</p></td><td><a><p>" . ((strcmp($obj-s,"Active") == 0) ? "Make Inactive" : "Make Active") . "</p></a></td></tr>";
				}
				?>
			</table>

		</div>

	</body>

</html>


<? mysqli_free_result($result); ?>