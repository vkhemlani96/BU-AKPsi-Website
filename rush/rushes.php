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
include("/home/content/03/5577503/html/rush/password_protect.php");

include("../manage_db/db_credentials.php");

// Create connection
$con = new mysqli($hostname, $username, $password, $dbname);

// Check connection
if (mysqli_connect_errno())
	echo "Failed to connect to MySQL: " . mysqli_connect_error();

$result = mysqli_query($con,"SELECT COUNT(*), SUM(`InvitedToClosed`), SUM(`AppSubmitted`), SUM(`Info1`), SUM(`Info2`), SUM(`Fashion`), SUM(`Professional`), SUM(`Trivia`), SUM(`Mocktail`) FROM $rushTable");
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
echo "
<table class='mdl-data-table mdl-js-data-table mdl-shadow--2dp' style='margin:10px; display:inline-block'>
	<tr>
		<td class='mdl-title'><div><span>Info Session I</span></div></td>
		<td><div><span>".$row["SUM(`Info1`)"]."</span></div></td>
	</tr>
	<tr>
		<td class='mdl-title'><div><span>Info Session II</span><div></span></td>
		<td><div><span>".$row["SUM(`Info2`)"]."</span></div></td>
	</tr>
	<tr>
		<td class='mdl-title'><div><span>Fashion Night</span><div></span></td>
		<td><div><span>".$row["SUM(`Fashion`)"]."</span></div></td>
	</tr>
	<tr>
		<td class='mdl-title'><div><span>Professional Workshop</span></div></td>
		<td><div><span>".$row["SUM(`Professional`)"]."</span></div></td>
	</tr>
	<tr>
		<td class='mdl-title'><div><span>Trivia Night</span><div></span></td>
		<td><div><span>".$row["SUM(`Trivia`)"]."</span></div></td>
	</tr>
	<tr>
		<td class='mdl-title'><div><span>Mocktail Night</span><div></span></td>
		<td><div><span>".$row["SUM(`Mocktail`)"]."</span></div></td>
	</tr>
</table>";

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

	
$result = mysqli_query($con,"SELECT * FROM $rushTable");

echo "<table id='table' class='mdl-data-table mdl-js-data-table mdl-shadow--2dp' style='margin:10px'>
<tr>
<th><div><span>#</span></div></th>
<th class='mdl-data-table__cell--non-numeric'><div><span>Sign Up Time</span></div></th>
<th class='mdl-data-table__cell--non-numeric'><div><span>First Name</span></div></th>
<th class='mdl-data-table__cell--non-numeric'><div><span>Last Name</span></div></th>
<th class='mdl-data-table__cell--non-numeric'><div><span>Email</span></div></th>
<th class='mdl-data-table__cell--non-numeric'><div><span>Phone</span></div></th>
<th class='mdl-data-table__cell--non-numeric'><div><span>Major(s)</span></div></th>
<th class='mdl-data-table__cell--non-numeric'><div><span>School(s)</span></div></th>
<th class='mdl-data-table__cell--non-numeric'><div><span>Grade</span></div></th>
<th class='mdl-data-table__cell--non-numeric'><div><span>Channel</span></div></th>
<th class='mdl-data-table__cell--non-numeric'><div><span>Infosession 1</span></div></th>
<th class='mdl-data-table__cell--non-numeric'><div><span>Infosession 2</span></div></th>
<th class='mdl-data-table__cell--non-numeric'><div><span>Fashion Night</span></div></th>
<th class='mdl-data-table__cell--non-numeric'><div><span>Professional Workshop</span></div></th>
<th class='mdl-data-table__cell--non-numeric'><div><span>Submitted Application</span></div></th>
<th class='mdl-data-table__cell--non-numeric'><div><span>Invited to Closed Rush?</span></div></th>
<th class='mdl-data-table__cell--non-numeric'><div><span>Trivia Night</span></div></th>
<th class='mdl-data-table__cell--non-numeric'><div><span>Mocktail Night</span></div></th>
</tr>";

$x = 1;
while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $x++ . "</td>";
echo "<td>" . date('D M j, g:iA',strtotime($row['Sign Up Time'])) . "</td>";
echo "<td>" . $row['FirstName'] . "</td>";
echo "<td>" . $row['LastName'] . "</td>";
echo "<td>" . $row['Email'] . "</td>";
echo "<td>" . $row['Phone'] . "</td>";
echo "<td>" . $row['Majors'] . "</td>";
echo "<td>" . $row['MajorSchools'] . "</td>";
echo "<td>" . $row['Grade'] . "</td>";
echo "<td>" . $row['Channel'] . "</td>";
echo "<td>" . ($row['Info1'] ? "Yes" : "No") . "</td>";
echo "<td>" . ($row['Info2'] ? "Yes" : "No") . "</td>";
echo "<td>" . ($row['Fashion'] ? "Yes" : "No") . "</td>";
echo "<td>" . ($row['Professional'] ? "Yes" : "No") . "</td>";
echo "<td>" . ($row['AppSubmitted'] ? "<a href=\"view_app.php?email=".$row['Email']."\">Yes</a>" : "No") . "</td>";
echo "<td>" . ($row['InvitedToClosed'] ? "Yes" : "No") . "</td>";
echo "<td>" . ($row['Trivia'] ? "Yes" : "No") . "</td>";
echo "<td>" . ($row['Mocktail'] ? "Yes" : "No") . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>

<script>
	var $table = $('#table');
	$table.floatThead();
</script>