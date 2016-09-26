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
			/*
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
			*/
			/*			}*/
			table th {
				color: black;
				opacity: 1;
			}
		</style>

	</head>

	<?php

	include("../db/db.php");

	// Create connection
	$con = new mysqli($hostname, $username, $password, $dbname);

	// Check connection
	if (mysqli_connect_errno())
		echo "Failed to connect to MySQL: " . mysqli_connect_error();

	$query = "SELECT CONCAT(FirstName, ' ', LastName), Interview_Wave, Interview_PrelimYes, Interview_PrelimNo, Interview_PrelimAbstain, Interview_Deliberate, Interview_FinalYes, Interview_FinalNo, Interview_FinalAbstain, Interview_Bid FROM $rushTable WHERE Interview_Wave >= 0 ORDER BY Interview_Wave, LastName";
	$result = mysqli_query($con,$query);
	$fields = mysqli_num_fields($result);

	?>

	<table id='table' class='mdl-data-table mdl-js-data-table mdl-shadow--2dp' style='margin:10px'>
		<tr>
			<th><div><span>#</span></div></th>
			<th><div><span>Name</span></div></th>
			<th>Wave</th>
			<th>Prelim - Yes</th>
			<th>Prelim - No</th>
			<th>Prelim - Abstain</th>
			<th>Deliberate?</th>
			<th>Final - Yes</th>
			<th>Final - No</th>
			<th>Final - Abstain</th>
			<th>Bid?</th>
		</tr>


		<?
		$x = 0;
		while($row = mysqli_fetch_row($result)) {
		?>
		<tr style="background-color:<? echo is_null($row[9]) == true ? 'white' : ($row[9] === '0' ? 'rgba(255,0,0,.1)' : 'rgba(0, 255,0,.1)'); ?>">
			<td><? echo ++$x; ?></td>
			<? for ($i = 0; $i < count($row); $i++) { ?>
			<td><? 
			if (is_null($row[$i])) {
				echo '--';
			} else if ($i == 5 || $i == 9) {
				echo $row[$i] === '0' ? 'No' : 'Yes';
			} else {
				echo $row[$i];
			} ?></td>
			<? } ?>
		</tr>
		<?
			//				echo "<tr>";
			//				echo "<td>" . $x++ . "</td>";
			//				for ($i = 0; $i < count($row); $i++) {
			//					if (strpos(mysqli_fetch_field_direct($result, $i)->name, 'Interview') !== false) {
			//						continue;
			//					}
			//
			//					if (mysqli_fetch_field_direct($result, $i)->name == "AppSubmitted" && $row[$i]) {
			//						echo "<td><a href=\"http://buakpsi.com/rush/view_app.php?email=" . $row[3] . "\">" . ($row[$i] ? "Yes" : "No") . "</a></td>";
			//					} else if (mysqli_fetch_field_direct($result, $i)->type == 1) {
			//						echo "<td>" . ($row[$i] ? "Yes" : "No") . "</td>";
			//					} else {
			//						echo "<td>" . $row[$i] . "</td>";
			//					}
			//
			//				}
			//				echo "</tr>";
			//			}
			//			echo "</table>";
		}	
		mysqli_close($con);
		?>

	</table>

	<script>
		var $table = $('#table');
		$table.floatThead();
	</script>