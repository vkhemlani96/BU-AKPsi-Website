<?php

include("/home/content/03/5577503/html/rush/password_protect_cookie.php");
ini_set('display_errors', 1);

?>


<!DOCTYPE html>
<html lang="en">

	<head>

		<link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.0/material.indigo-pink.min.css">
		<title>Rushes | Alpha Kappa Psi Nu Chapter</title>

		<script src="https://storage.googleapis.com/code.getmdl.io/1.0.0/material.min.js"></script>
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

		<script src="../js/jquery.js"></script>
		<script src="../js/jquery.color.js"></script>
		<script src="../js/jquery.floatThead.min.js"></script>

		<style>
			.mdl-title {
				position: relative;
				vertical-align: bottom;
				text-overflow: ellipsis;
				font-weight: 700;
				letter-spacing: 0;
				height: 48px;
				font-size: 12px;
				color: rgba(0,0,0,.54);
				box-sizing: border-box;
			}
			table th {
				background-color:#000033;
			}
			table th span {
				color:white;
			}
		</style>

	</head>

	<?php

	include("../db/db_credentials.php");

	// Create connection
	$con = new mysqli($hostname, $username, $password, $dbname);

	// Check connection
	if (mysqli_connect_errno())
		echo "Failed to connect to MySQL: " . mysqli_connect_error();

	$fields = array(
		"Info1",
		"Info2",
		"Professional",
		"Coffeehouse",
		"Fashion",
		"Interview",
		"Mocktail"
	);


	$queryBody = "";

	$i = 0;
	for ($i = 0; $i < count($fields); $i++) {
		$queryBody .= ", SUM(`" . $fields[$i] . "`)";
	}

	$result = mysqli_query($con,"SELECT COUNT(*), SUM(`InvitedToClosed`), SUM(`AppSubmitted`)" . $queryBody . " FROM $rushTable");
	$row = mysqli_fetch_array($result);
	echo "
<table class='mdl-data-table mdl-js-data-table mdl-shadow--2dp' style='margin:10px; display:inline-block'>
	<tr>
		<td class='mdl-title'><div><span>Number of Rushes</span></div></td>
		<td><div><span>".$row["COUNT(*)"]."</span></div></td>
	</tr>
	<tr>
		<td class='mdl-title'><div><span>Applications Submitted</span><div></span></td>
		<td><div><span>".$row["SUM(`AppSubmitted`)"]."</span></div></td>
	</tr>
	<tr>
		<td class='mdl-title'><div><span>Invited to Closed</span><div></span></td>
		<td><div><span>".$row["SUM(`InvitedToClosed`)"]."</span></div></td>
	</tr>
</table>";
	echo "<table class='mdl-data-table mdl-js-data-table mdl-shadow--2dp' style='margin:10px; display:inline-block'>";

	for ($i = 0; $i < count($fields); $i++) {
		echo "<tr>
			<td class='mdl-title'><div><span>$fields[$i]</span></div></td>
			<td><div><span>".$row["SUM(`$fields[$i]`)"]."</span></div></td>
			</tr>
		";
	}

	//	<tr>
	//		<td class='mdl-title'><div><span>Info Session I</span></div></td>
	//		<td><div><span>".$row["SUM(`Info1`)"]."</span></div></td>
	//	</tr>
	//	<tr>
	//		<td class='mdl-title'><div><span>Info Session II</span><div></span></td>
	//		<td><div><span>".$row["SUM(`Info2`)"]."</span></div></td>
	//	</tr>
	//	<tr>
	//		<td class='mdl-title'><div><span>Fashion Night</span><div></span></td>
	//		<td><div><span>".$row["SUM(`Fashion`)"]."</span></div></td>
	//	</tr>
	//	<tr>
	//		<td class='mdl-title'><div><span>Professional Workshop</span></div></td>
	//		<td><div><span>".$row["SUM(`Professional`)"]."</span></div></td>
	//	</tr>
	//	<tr>
	//		<td class='mdl-title'><div><span>Trivia Night</span><div></span></td>
	//		<td><div><span>".$row["SUM(`Trivia`)"]."</span></div></td>
	//	</tr>
	//	<tr>
	//		<td class='mdl-title'><div><span>Mocktail Night</span><div></span></td>
	//		<td><div><span>".$row["SUM(`Mocktail`)"]."</span></div></td>
	//	</tr>
	echo "</table>";

	$result = mysqli_query($con,"SELECT `Channel`, COUNT(*) FROM $rushTable group by `Channel`");
	echo "<table class='mdl-data-table mdl-js-data-table mdl-shadow--2dp' style='margin:10px; display:inline-block'>";
	while($row = mysqli_fetch_array($result)) {
		echo "<tr>
		<td class='mdl-title'><div><span>".$row["Channel"]."</span></div></td>
		<td><div><span>".$row["COUNT(*)"]."</span></div></td>
	</tr>";
	}
	echo "</table>";

	$result = mysqli_query($con,"SELECT `MajorSchools`, COUNT(*) FROM $rushTable group by `MajorSchools`");
	echo "<table class='mdl-data-table mdl-js-data-table mdl-shadow--2dp' style='margin:10px; display:inline-block'>";
	while($row = mysqli_fetch_array($result)) {
		echo "<tr>
		<td class='mdl-title'><div><span>".$row["MajorSchools"]."</span></div></td>
		<td><div><span>".$row["COUNT(*)"]."</span></div></td>
	</tr>";
	}
	echo "</table>";

	$result = mysqli_query($con,"SELECT `Grade`, COUNT(*) FROM $rushTable group by `Grade`");
	echo "<table class='mdl-data-table mdl-js-data-table mdl-shadow--2dp' style='margin:10px; display:inline-block'>";
	while($row = mysqli_fetch_array($result)) {
		echo "<tr>
		<td class='mdl-title'><div><span>".$row["Grade"]."</span></div></td>
		<td><div><span>".$row["COUNT(*)"]."</span></div></td>
	</tr>";
	}
	echo "</table>";

	$query = "SELECT `Sign Up Time`, FirstName, LastName, Email, Phone, Majors, MajorSchools, Grade, Channel, AppSubmitted, InvitedToClosed, " . join(", ", $fields) . " FROM $rushTable ORDER BY `Sign Up Time`";
	$result = mysqli_query($con,$query);
	$fields = mysqli_num_fields($result);

	echo "<table id='table' class='mdl-data-table mdl-js-data-table mdl-shadow--2dp' style='margin:10px'>
	<tr>
	<th><div><span>#</span></div></th>";

	for ($i = 0; $i < $fields; $i++) {
		if (strpos(mysqli_fetch_field_direct($result, $i)->name, 'Interview') !== false) {
			continue;
		}
		echo "<th class='mdl-data-table__cell--non-numeric'><div><span>".mysqli_fetch_field_direct($result, $i)->name."</span></div></th>";
	}

	echo "</tr>";

	$x = 1;
	while($row = mysqli_fetch_row($result)) {
		//		$direct = 

		echo "<tr>";
		echo "<td>" . $x++ . "</td>";
		for ($i = 0; $i < count($row); $i++) {
			if (strpos(mysqli_fetch_field_direct($result, $i)->name, 'Interview') !== false) {
				continue;
			}

			if (mysqli_fetch_field_direct($result, $i)->name == "AppSubmitted" && $row[$i]) {
				echo "<td><a href=\"http://buakpsi.com/rush/view_app.php?email=" . $row[3] . "\">" . ($row[$i] ? "Yes" : "No") . "</a></td>";
			} else if (mysqli_fetch_field_direct($result, $i)->type == 1) {
				echo "<td>" . ($row[$i] ? "Yes" : "No") . "</td>";
			} else {
				echo "<td>" . $row[$i] . "</td>";
			}

		}
		echo "</tr>";
	}
	echo "</table>";

	mysqli_close($con);
	?>

	<script>
		var $table = $('#table');
		$table.floatThead();
	</script>