<?php

//ini_set('display_errors', 1);

include("../db/credentials.php");
$usertable="brothers";
$eboardTable="eboard";
$yourfield = "LAST_NAME";

$link = mysqli_connect($hostname,$username, $password) or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please try again later.')</script></html>");
mysqli_select_db($link, $dbname);

$active_classes = array("Mu", "Nu", "Xi", "Omicron", "Pi", "Rho", "Sigma", "Transfer");
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Brothers | Alpha Kappa Psi Nu Chapter</title>
		<link href="../css/styles.css" rel="stylesheet"/>
		<link href="../css/navbar.css" rel="stylesheet" />
		<script src="../js/jquery.js"></script>
		<script src="../js/jquery.color.js"></script>
		<script src="../js/jquery.lazyload.js"></script>
	</head>

	<body>
		<?php include("../navbar.php"); getNavbar(true); ?>

		<div class="center vertical_padding title_section" style="padding-bottom: 40px;">
			<h1>Active Brothers</h1>
			<div class="seperator"></div>
			<h2>Meet the Men and Women of Nu Chapter</h2>
		</div>

		<div class="vertical_padding blue_background eboard_group">
			<div class="center brother_class">
				<h3>Executive Board</h3>
				<div class="gold_seperator"></div>

				<?php
				$code = "";
				$officers = array();
				$query = "SELECT *
    FROM $usertable
    JOIN $eboardTable
    ON $usertable.firstName = $eboardTable.firstName AND $usertable.lastName = $eboardTable.lastName and $usertable.status = 'Active'
	ORDER BY $eboardTable.order";
				$result = mysqli_query($link, $query);
				while ($obj = mysqli_fetch_object($result)) {

					$firstName = $obj->firstName;
					$lastName = $obj->lastName;
					$position = str_replace("Vice President", "V.P.", $obj->position);
					$class = $obj->class;
					$img_name = strtolower($lastName) . "_" . strtolower($firstName);
					$img_name = str_replace(" ", "_", $img_name);
					$year = $obj->year;
					$major = $obj->major . " (" . $obj->majorSchool . ")";
					$minor = $obj->minor . " (" . $obj->minorSchool . ")";
					$linkedIn = $obj->linkedInUrl;
					$linkedInText = $linkedIn !== null ? "<a target=\"_blank\" href=\"$linkedIn\" class=\"brotherLinkedIn brotherIcon\"><img src=\"../img/linked_in_blue.png\"></a>" : "";

					$eye2eyeText = $obj->eye2eye == 1 ? "<a target=\"_blank\" href=\"../eye2eye/index.php\" class=\"brotherEye2Eye brotherIcon\"><img src=\"../img/eye2eye_color.png\"></a>" : "";

					$nccgText = $obj->nccg == 1 ? "<a target=\"_blank\" href=\"../nccg/index.php\" class=\"brotherEye2Eye brotherIcon\"><img ". ($obj->eye2eye == 1 ? "style=\"left: 45px\"" : "") . " src=\"../img/nccg_color.png\"></a>" : "";

					//	echo $firstName . " " . $position;

					if (array_key_exists("$firstName $lastName", $officers)) {
						$code = str_replace($officers["$firstName $lastName"], $officers["$firstName $lastName"] . " &  $position", $code);
						$officers["$firstName $lastName"] .= " &  $position";
					} else {
						$officers["$firstName $lastName"] = $position;
						$code .= "
			<div class=\"eboard_img\">
				<p class=\"position\">$position</p>
				<div class=\"brother_img\"><img height=\"200\" width=\"200\" onerror=\"$(this).attr('src','http://buakpsi.com/img/brothers/nophoto.png');\"  src=\"../img/brothers/".strtolower($class)."s/$img_name"."_thumb.png\">
					<div>
						<p class=\"name\">$firstName $lastName</p>
						<div class=\"gold_seperator\"></div>
						<p class=\"info\"><strong>Class:</strong> $class<br><strong>Year:</strong> $year<br><strong>Major:</strong> $major<br><strong>Minor:</strong> $minor</p>".$linkedInText.$eye2eyeText."
					</div>
				</div>
			</div>";
						$code = str_replace("<br><strong>Minor:</strong>  ()", "", $code);
					}
				}
				echo $code;
				?>
			</div>
		</div>

		<?php
		$query = "";
		foreach($active_classes as $class)
			$query .= "SELECT * FROM $usertable WHERE class = '$class' and status = 'Active' ORDER BY lastName;";

		if (mysqli_multi_query($link, $query)) {
			do {
				/* store first result set */
				if ($result = mysqli_store_result($link)) {
					$class = strtolower(array_shift($active_classes));
					echo "
						<div class=\"center vertical_padding brother_class\">
							<h2><strong>$class</strong></h2>
							<div class=\"seperator\"></div>
							<div>
					";
					while ($obj = mysqli_fetch_object($result)) {
						$firstName = $obj->firstName;
						$lastName = $obj->lastName;
						$img_name = strtolower($lastName) . "_" . strtolower($firstName);
						$img_name = str_replace(" ", "_", $img_name);
						$year = $obj->year;
						$major = $obj->major . " (" . $obj->majorSchool . ")";
						$minor = $obj->minor . " (" . $obj->minorSchool . ")";
						$linkedIn = $obj->linkedInUrl;
						$linkedInText = $linkedIn !== null ? "<a target=\"_blank\" href=\"$linkedIn\" class=\"brotherLinkedIn\"><img src=\"../img/linked_in_white.png\"></a>" : "";

						$eye2eyeText = $obj->eye2eye == 1 ? "<a target=\"_blank\" href=\"../eye2eye/index.php\" class=\"brotherEye2Eye brotherIcon\"><img src=\"../img/eye2eye_white.png\"></a>" : "";

						$nccgText = $obj->nccg == 1 ? "<a target=\"_blank\" href=\"../nccg/index.php\" class=\"brotherEye2Eye brotherIcon\"><img ". ($obj->eye2eye == 1 ? "style=\"left: 45px\"" : "") . " src=\"../img/nccg_white.png\"></a>" : "";


						$code = "<div class=\"brother_img\"><img height=\"200\" width=\"200\" onerror=\"$(this).attr('src','http://buakpsi.com/images/brothers/nophoto.png');\"  class=\"lazy\" data-original=\"../img/brothers/$class"."s/$img_name"."_thumb.png\">
							<div>
								<p class=\"name\">$firstName $lastName</p>
								<div class=\"gold_seperator\"></div>
								<p class=\"info\"><strong>Year:</strong> $year<br><strong>Major:</strong> $major<br><strong>Minor:</strong> $minor</p>" . $linkedInText . $eye2eyeText . $nccgText ."
							</div>
						</div>";
						$code = str_replace("<br><strong>Minor:</strong>  ()", "", $code);
						echo $code;

						//								
					}
					echo "</div></div>";
					mysqli_free_result($result);
				}
			} while (mysqli_next_result($link));
		}
		?>

		<style>
			.brotherIcon {
				opacity: 1;	
			}
			.brotherIcon:hover {
				opacity: 1;	
			}
			.brotherLinkedIn img {
				position:absolute;
				bottom: 12px;
				right: 12px;
			}
			.brotherEye2Eye img {
				position:absolute;
				bottom: 12px;
				left: 12px;
			}
		</style>

		<!--
<div class="footer">
<div class="center">
<div class="footer_img"></div>
<h3>Alpha Kappa Psi <a style="color:#bda75d">Nu Chapter</a></h3>
<ul>
<li>
<p><a>About</a></p>
</li>
<li>
<p><a>RUSH</a></p>
</li>
<li>
<p><a>FAQ</a></p>
</li>
<li>
<p><a>Contact</a></p>
</li>
</ul>
</div>
</div>
-->
		<?php getFooter(); ?>

	</body>

	<script>
		$(".brother_img").hover(function(event) {
			$(this).children("div").animate({
				top: 0
			},300);
			$(this).find(".gold_seperator").css({
				display: "block"	
			});
		}, function(event) {
			$(this).children("div").animate({
				top: "204px"
			},300);
			$(this).find(".gold_seperator").css({
				display: "non"	
			});
		});

		$(function() {
			$("img.lazy").lazyload({
				effect : "fadeIn"
			});
		});
	</script>
</html>