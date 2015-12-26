<!DOCTYPE html>
<html lang="en">

<head>
	<link href="../css/styles.css" rel="stylesheet"/>
	<style>
		tr {
			height: 2.60in;
			width: 8in;
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
		@media print {
		table { page-break-inside: auto; }
		  tr { 
			page-break-before: always;
		  }
		}
	</style>
	<script src="../js/jquery.js"></script>
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

			$appsTable = "rushFall2015Apps";
			$dataTable = "rushFall2015";
			$query = "SELECT * FROM rushFall2015 WHERE Email IN ('cyeates@bu.edu', 'abamr14@bu.edu', 'kailinc@bu.edu', 'kz0927@bu.edu', 'tqiu@bu.edu', 'yjzhao@bu.edu', 'kimc897@bu.edu ', 'kschiff@bu.edu', 'jiaruip6@bu.edu', 'arakesh@bu.edu', 'sam0323@bu.edu', 'xswu@bu.edu', 'pdugger8@bu.edu', 'roseogr@bu.edu', 'dhunt@bu.edu', 'crissan@bu.edu', 'nlabosco@bu.edu', 'aisyaab@bu.edu', 'lizmin@bu.edu', 'Cherylxx@bu.edu') ORDER BY `LastName`";
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
		<!-- pagebreak -->
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
<!--
	<script>
		var height0 = "2.6in"
		var height = "2.32in";
		$("tr").eq(10).css("height",height0);
		$("tr").eq(10).children().eq(0).css("height",height);
		$("tr").eq(10).children().eq(1).css("height",height);
		$("tr").eq(10).children().eq(0).children().eq(0).css("height",height);
		$("tr").eq(14).css("height",height0);
		$("tr").eq(14).children().eq(0).css("height",height);
		$("tr").eq(14).children().eq(1).css("height",height);
		$("tr").eq(14).children().eq(0).children().eq(0).css("height",height);
	</script>
-->
</html>