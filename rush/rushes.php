<?php
	include("/home/content/03/5577503/html/rush/password_protect.php");

	include("../manage_db/db_credentials.php");

	// Create connection
	$con = new mysqli($hostname, $username, $password, $dbname);
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM rushFall2015");

echo "<table border='1'>
<tr>
<th><div><span>#</span></div></th>
<th><div><span>Firstname</span></div></th>
<th><div><span>Lastname</span></div></th>
<th><div><span>Email</span></div></th>
<th><div><span>Phone</span></div></th>
<th><div><span>Major(s)</span></div></th>
<th><div><span>School(s)</span></div></th>
<th><div><span>Grade</span></div></th>
<th><div><span>Channel</span></div></th>
<th><div><span>Info-session 1</span></div></th>
<th><div><span>Info-session 2</span></div></th>
<th><div><span>Prof. Night</span></div></th>
<th><div><span>BBQ Social</span></div></th>
<th><div><span>Submitted Application</span></div></th>
<th><div><span>Invited to Closed Rush?</span></div></th>
</tr>";

$x = 0;
while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $x++ . "</td>";
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
echo "<td>" . ($row['Prof'] ? "Yes" : "No") . "</td>";
echo "<td>" . ($row['BBQ'] ? "Yes" : "No") . "</td>";
echo "<td>" . ($row['AppSubmitted'] ? "<a href=\"view_app.php?email=".$row['Email']."\">Yes</a>" : "No") . "</td>";
echo "<td>" . ($row['InvitedToClosed'] ? "Yes" : "No") . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>

