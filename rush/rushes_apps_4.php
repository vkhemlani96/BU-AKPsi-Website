<!DOCTYPE html>
<html lang="en">

<head>
	<link href="../css/styles.css" rel="stylesheet"/>
	<style>
		tr {
			height: 2.75in;
			width: 8in;
			margin-top: 0.06in;
			margin-bottom: 0.06in;
		}
		img {
			height: 2.5in;
			width: 1.5in;
		}
		p {
			width: .65in;
			display: inline-block;
			text-align :center;
		}
		td {
			vertical-align:middle;
			height: 2.7in;
		}
		.seperator {
			width: 2in;	
			margin-top: 2px;
		}
	</style>
</head>


<body>
	<table>
		<?php 
			include("../manage_db/db_credentials.php");

			// Create connection
			$con = new mysqli($hostname, $username, $password, $dbname);

			// Check connection
			if (mysqli_connect_errno())
			{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

			$appsTable = $rushTableApps;
			$dataTable = $rushTable;
			$query = "SELECT * FROM $rushTableApps WHERE Email IN ('acastano@bu.edu', 'nmcollet@bu.edu', 'cku@bu.edu', 'gautama@bu.edu', 'racheld1@bu.edu', 'cgxu@bu.edu', 'samodaro@bu.edu', 'Grf96@bu.edu', 'Cdwelsh@bu.edu', 'ineslee@bu.edu', 'chermant@bu.edu', 'sonalipa@bu.edu', 'ctager@bu.edu', 'kpatel11@bu.edu', 'ysuh95@bu.edu', 'shannahm@bu.edu', 'vteng@bu.edu', 'linh4@bu.edu', 'emmawu@bu.edu', 'shengli@bu.edu', 'rtaylor9@bu.edu') ORDER BY `LastName`";
			$result = mysqli_query($con,$query);

			while($row = mysqli_fetch_array($result)) {
		$dir    = '/home/content/03/5577503/html/rush/rushPics/';
		$files1 = scandir($dir);
		?>
		<tr>
			<td style='width:1in'>
				<img src="http://buakpsi.com/rush/rushPics/<?
		foreach ($files1 as $value) {
			$img = strpos(".".$value, str_replace("@bu.edu","",$row["Email"])) ? $value : $image;
			echo $img;
		}?>">
			</td><td style='width: 7in'>
				<h2 style='width: 7in'><strong><? echo $row["FirstName"] . " " . $row["LastName"]; ?></strong></h2>
				<div class="seperator"></div>
				<div style='height:1.4in'>
					
				</div>
				<p>1</p>
				<p>2</p>
				<p>3</p>
				<p>4</p>
				<p>5</p>
				<p>6</p>
				<p>7</p>
				<p>8</p>
				<p>9</p>
				<p>10</p>
			</td>
		</tr>
		<? } ?>
<!--
		<tr>
			<td>
				<img src="http://buakpsi@buakpsi.com/rush/rushPics/Racheld1.jpg">
			</td>
		</tr><tr>
			<td>
				<img src="http://buakpsi@buakpsi.com/rush/rushPics/Racheld1.jpg">
			</td>
		</tr><tr>
			<td>
				<img src="http://buakpsi@buakpsi.com/rush/rushPics/Racheld1.jpg">
			</td>
		</tr>
-->
	</table>
</body>
</html>