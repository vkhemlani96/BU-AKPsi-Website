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
			include("../mamage_db/db_credentials.php");

			// Create connection
			$con = new mysqli($hostname, $username, $password, $dbname);

			// Check connection
			if (mysqli_connect_errno())
			{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

			$appsTable = $rushTableApps;
			$dataTable = $rushTable;
			$query = "SELECT * FROM $rushTable WHERE Email IN ('dguan@bu.edu', 'kathcui@bu.edu', 'teresat@bu.edu', 'mwhyte@bu.edu', 'ashcwong@bu.edu', 'mallonk@bu.edu', 'tyadgood@bu.edu', 'yeohde@bu.edu', 'nbunanta@bu.edu', 'kcheng19@bu.edu', 'monicasl@bu.edu', 'ger@bu.edu', 'dlshao@bu.edu', 'helenmyy@bu.edu', 'dsun21@bu.edu', 'sharenac@bu.edu', 'carmenzh@bu.edu', 'quyihan@bu.edu', 'saranshk@bu.edu') ORDER BY `LastName`";
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