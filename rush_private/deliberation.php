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
			.content > div {
				height: 100%;
				width: 100%;
				display: table-cell;
				vertical-align: middle;
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
	$result = mysqli_query($con,"SELECT FirstName, LastName, MajorSchools, Grade, Email, Interview_Wave FROM $rushTable WHERE Interview_Deliberate = 1 ORDER BY Interview_Wave, LastName");
	$resultArray = array();

	//	var_dump($result);

	while($row = mysqli_fetch_array($result)) {
		foreach ($files1 as $value) {
			if (strpos(".".strtolower($value), str_replace("@bu.edu","",strtolower($row[4]))) !== FALSE) {
				$row[4] = $value;
			}
			//			$img = strpos(".".strtolower($value), str_replace("@bu.edu","",strtolower($email))) >= 0 ? $value : $image;
			//			echo $img;
		}
		$resultArray[] = $row;
	}

	?>

	<body>
		<div class="content">
			<div>
				<h1 class="name">Vinay Khemlani</h1>
				<h2 class="details"></h2>
				<img class="picture" style="max-height: 60vh;">
					
				</div>
			</div>
		</div>
	</body>
	<script>

		var delibIndex = 0;
		var delibs = <? echo json_encode($resultArray); ?>;

		$(".name").html(delibs[0][0] + " " + delibs[0][1]);
		$(".details").html(delibs[0][2] + " - " + delibs[0][3]);
		$(".picture").attr("src", "http://buakpsi.com/rush/rushPics/" + delibs[0][4]);

	</script>

</html>