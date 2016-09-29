<?php

ini_set('display_errors', 1);

include("../db/credentials.php");
$usertable="brothers";
$eyetable="eye2eye";

$link = mysqli_connect($hostname,$username, $password) or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please try again later.')</script></html>");
mysqli_select_db($link, $dbname);

$query = "SELECT *
    FROM $usertable
    JOIN $eyetable
    ON $usertable.email = $eyetable.email
	WHERE $eyetable.position LIKE '%Research%'
	ORDER BY FIELD($eyetable.position, 'Director of Research', 'Head Research Analyst', 'Research Associate'), LastName";

$result = mysqli_query($link, $query);
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Eye2Eye Board | Alpha Kappa Psi Nu Chapter</title>
		<link href="../css/styles.css" rel="stylesheet"/>
		<link href="../css/navbar.css" rel="stylesheet" />
		<link href="../css/eye2eye_override.css" rel="stylesheet"/>
		<script src="../js/jquery.js"></script>
		<script src="../js/jquery.color.js"></script>
	</head>

	<body>
		<?php include("../navbar.php"); getNavbar(true); ?>

		<div class="vertical_padding title_section">
			<h1>Research Team</h1>
			<div class="seperator"></div>
			<h2>Eye2Eye</h2>
		</div>

		<div class="vertical_padding">
			<table class="nccg_table center">
				<?php
				while ($obj = mysqli_fetch_object($result)) {
					$firstName = $obj->firstName;
					$lastName = $obj->lastName;
					$position = $obj->position;
					$bio = $obj -> bio;
					$class = $obj->class;
					$linkedin = $obj->linkedInUrl;
					$img_name = strtolower($lastName) . "_" . strtolower($firstName);
					$img_name = str_replace(" ", "_", $img_name);
					$year = $obj->year;
					$major = $obj->major . " (" . $obj->majorSchool . ")";
					$minor = $obj->minor . " (" . $obj->minorSchool . ")";
					$code = '
					<tr>
						<td>
						<div class="nccg_image">
								<img src="../img/brothers/'.strtolower($class).'s/'.$img_name.'_thumb.png" onerror="$(this).attr(\'src\',\'http://buakpsi.com/img/brothers/nophoto.png\');" height="200">
								<div class="nccg_hover_bio blue_background">
									<p class=\"info\"><strong>Class:</strong> '.$class.'<br><strong>Year:</strong> '.$year.'<br><strong>Major:</strong> '.$major.'<br><strong>Minor:</strong> '.$minor.'</p>
								</div>
							</div>
						</td>
						<td class="nccg_bio_cell">
							<h2 class="nccg_name"><strong>'.$firstName.' '.$lastName.'</strong> '.$position.
						'<a target="_blank" href="'.$linkedin.'"><img height="24" style="float:right; margin-top:2px" src="../img/nccg/linkedin.png"></a></h2>
							<p>'.$bio.'</p>
						</td>
					</tr>
				';
					$code = str_replace("<br><strong>Minor:</strong>  ()", "", $code);
					echo $code;
				}
				?>
			</table>
		</div>

		<?php getFooter(); ?>

	</body>

	<script>
		$(".nccg_image > div").each(function(index) {
			$(this).css({
				top: "204px"
			});
		});

		$(".nccg_image").hover(function(event) {
			$(this).children("div").animate({
				top: 0
			},300);
		}, function(event) {
			$(this).children("div").animate({
				top: "204px"
			},300);
		});
	</script>

</html>