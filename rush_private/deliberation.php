<?php include("/home/content/03/5577503/html/rush/password_protect.php"); ini_set('display_errors', 1); ?>
<!DOCTYPE html>
<html lang="en">

	<head>

		<title>Deliberation | Alpha Kappa Psi Nu Chapter</title>
		<link href="../css/styles.css" rel="stylesheet"/>
		<script src="../js/jquery.js"></script>

		<style type="text/css">
			.content {
				height: 100vh;
				width: 100vw;
				display: table;
			}
			td:first-child {
				width: 60%;
				height: 100%;
				vertical-align: middle;
				text-align: center;
			}
			td {
				width: 50%;
			}
			textarea {
				width: 80%;
				margin: 10px 0;
				height: 40%;
			}
		</style>

	</head>

	<?php

	include("../manage_db/db_credentials.php");

	// Create connection
	$con = new mysqli($hostname, $username, $password, $dbname);

	$dir    = '/home/content/03/5577503/html/rush/rushPics/';
	$files1 = scandir($dir);

	// Check connection
	if (mysqli_connect_errno())
		die("Failed to connect to MySQL: " . mysqli_connect_error());

	//	$result = mysqli_query($con,"SELECT Email, SUM(`InvitedToClosed`), SUM(`AppSubmitted`)" . $queryBody . " FROM $rushTable");
	$result = mysqli_query($con,"SELECT FirstName, LastName, MajorSchools, Grade, Email FROM $rushTable WHERE Interview_Deliberate = 1 ORDER BY Interview_Wave, LastName");
	$resultArray = array();

	//	var_dump($result);

	while($row = mysqli_fetch_array($result)) {
		foreach ($files1 as $value) {
			if (strpos(".".strtolower($value), str_replace("@bu.edu","",strtolower($row[4]))) !== FALSE) {
				$row[4] = $value;
				break;
			}
		}
		$resultArray[] = $row;
	}

	?>

	<body>
		<table class="content">
			<tr>
				<td>
					<h1 class="name"></h1>
					<h2 class="details"></h2>
					<img class="picture" style="max-height: 60vh; margin-top: 20px;">
					<h4 class="count" style="margin-top: 20px"></h4>
				</td><td>
					<textarea></textarea>
					<textarea></textarea>
				</td>
			</tr>
		</table>
	</body>
	<script>

		var delibIndex = 0;
		var delibs = <? echo json_encode($resultArray); ?>;

		function updatePage(index) {
			$(".name").html(delibs[index][0] + " " + delibs[index][1]);
			$(".details").html(delibs[index][2] + " - " + delibs[index][3]);
			$(".picture").attr("src", "http://buakpsi.com/rush/rushPics/" + delibs[index][4]);
			$(".count").html((delibIndex + 1) + "/" + delibs.length);
		}
		updatePage(0);

		document.onkeydown = function(e) {
			e = e || window.event;
			console.log("keydown!");

			if (e.keyCode == '37') {
				// left arrow
				if (delibIndex > 0) {
					delibIndex--;
					updatePage(delibIndex);
				}
			}
			else if (e.keyCode == '39') {
				// right arrow
				if (delibIndex < delibs.length - 1) {
					delibIndex++;
					updatePage(delibIndex);
				}
			}
		}

	</script>

</html>