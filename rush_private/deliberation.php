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
				text-align: center;
			}
			td {
				width: 50%;
				vertical-align: middle;
			}
			textarea {
				width: 80%;
				margin: 10px 0;
				height: 40vh;
				font-size: 20px;
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
	$result = mysqli_multi_query($con,"SET @rank=0;
SELECT * FROM ((SELECT FirstName, LastName, MajorSchools, Grade, Email, Interview_Deliberate, -1 FROM rushFall2016 WHERE Interview_Wave = 0) UNION (SELECT * FROM (SELECT FirstName, LastName, MajorSchools, Grade, Email, Interview_Deliberate, @rank:=@rank+1 as 'a' FROM rushFall2016 WHERE Interview_Wave > 0 ORDER BY Interview_Wave, LastName) as T1 WHERE Interview_Deliberate = 1)) AS a");

	$resultArray = array();
	do {
		/* store first result set */
		if ($result = mysqli_store_result($con)) {
			while ($row = mysqli_fetch_row($result)) {
//				foreach ($files1 as $value) {
//					if (strpos(".".strtolower($value), str_replace("@bu.edu","",strtolower($row[4]))) !== FALSE) {
//						$row[4] = $value;
//						break;
//					}
//				}
				$resultArray[] = $row;
			}
			mysqli_free_result($result);
		}
		if (!mysqli_more_results($con)) {
			break;
		}
	} while (mysqli_next_result($con));

	//	//		var_dump($result);
	//	if (!$result) {
	//		echo mysqli_error($con);
	//	} else {
	//		var_dump($result);
	//	}

//	while($row = mysqli_fetch_row($result)) {
//		foreach ($files1 as $value) {
//			if (strpos(".".strtolower($value), str_replace("@bu.edu","",strtolower($row[4]))) !== FALSE) {
//				$row[4] = $value;
//				break;
//			}
//		}
//		$resultArray[] = $row;
//		mysqli_free_result($result);
//	}

	mysqli_close($con);

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
				<p><b>Pros:</b></p>
				<textarea></textarea>
				<p><b>Cons:</b></p>
				<textarea></textarea>
				</td>
			</tr>
		</table>
	</body>
	<script>

		var delibIndex = 0;
		var delibs = <? echo json_encode($resultArray); ?>;

		function updatePage(index) {
			$("textarea").each(function() {
				$(this).val("");
			});

			var extraText = delibs[index][6] > -1 ? " - #" + delibs[index][6] : '';
			console.log(extraText);
			$(".name").html(delibs[index][0] + " " + delibs[index][1] + extraText);
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