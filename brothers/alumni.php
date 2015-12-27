<?php

//ini_set('display_errors', 1);


include("../manage_db/db_credentials.php");
$usertable="brothers";
$eboardTable="eboard";
$yourfield = "LAST_NAME";

$link = mysqli_connect($hostname,$username, $password) or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please try again later.')</script></html>");
mysqli_select_db($link, $dbname);

$firstGraduatingClass = 2008;
$lastGraduatingClass = 2016;
$graduateClasses = array();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Alumni Brothers | Alpha Kappa Psi Nu Chapter</title>
	<link href="../css/styles.css" rel="stylesheet"/>
	<link href="../css/navbar.css" rel="stylesheet" />
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.color.js"></script>
	<script src="../js/countup.js"></script>
</head>

<style>
	
</style>

<body>
	<?php include("../navbar.php"); getNavbar(true); ?>
	
	<div class="center vertical_padding title_section">
		<h1>Alumni Brothers</h1>
		<div class="seperator"></div>
	</div>
	
	<div class="center vertical_padding">
		<p class="centered_text">The network of Alpha Kappa Psi extends far beyond our Brotherhood at Nu Chapter at Boston University. We have a network of Brothers across the globe that include Presidents Reagan and Nixon and notable business and industry leaders including Malcom Forbes, Jr., J.C. Penney, and J. Willard Marriott. Our own alumni network at Nu Chapter spans multiple industries ranging from investment banking and consulting to entrepreneurship and film.</p>
	</div>
	
	<div class="center stats">
		<div>
			<h1 id="chapterAlumni">0</h1>
			<h4>CHAPTER ALUMNI</h4>
		</div><div>
			<h1 id="alumniWorldwide">0</h1>
			<h4>ALUMNI WORLDWIDE</h4>
		</div><div>
			<h1 id="alumniChapters">0</h1>
			<h4>ALUMNI CHAPTERS</h4>
		</div>
	</div>
	
	<table class=" blue_background alumni_table">
		<tr>
			<td>
				<p class="center" style="padding-top: 40px; text-align: center">We are incredibly proud of all of our Alumni Brothers here at Nu Chapter and want to thank them for continuing to be role models and supporting us throughout our endeavors!</p>
			</td>
		</tr>
		<tr>
			<td>
			
				<?php

				for ($x = 0; $x < $lastGraduatingClass - $firstGraduatingClass; $x++)
					echo "<h3 class=\"hidden hidden_left\"></h3>";
				for ($x = $firstGraduatingClass; $x <= $lastGraduatingClass; $x++) {
					if ($x == $lastGraduatingClass)
						echo "<h3 data-year=\"$x\" class=\"selected\">Class of $x</h3>";
					else
						echo "<h3 data-year=\"$x\">$x</h3>";

				}
				for ($x = 0; $x < $lastGraduatingClass - $firstGraduatingClass; $x++)
					echo "<h3 class=\"hidden hidden_right\"></h3>";
				echo "</td></tr>
					<tr class=\"blue_background\">
						<td style=\"position:relative; height: 310px; background-color:#000033 \">";


				$query = "SELECT firstName, lastName, year FROM $usertable WHERE status = 'Alumni' ORDER BY lastName";
				$result = mysqli_query($link, $query);
				$totalAlumni = mysqli_num_rows($result);
				while ($obj = mysqli_fetch_object($result)) {
					if (!array_key_exists("$obj->year", $graduateClasses)) {
						$graduateClasses["$obj->year"] = array();
					}
					$graduateClasses["$obj->year"][] = "$obj->firstName $obj->lastName";
				}
				mysqli_free_result($result);


				for ($x = $firstGraduatingClass; $x <= $lastGraduatingClass; $x++) {
					$left = $x == $lastGraduatingClass ? "0" : "-100%";
					$display = $x == $lastGraduatingClass ? " display:block" : "";
					$visible_cell = $x == $lastGraduatingClass ? "visible_cell" : "";
					echo "<div id=\"year$x\"style=\"left:0;$display\" class=\"center blue_background alumni_cell $visible_cell\">
								<div class=\"center\">";
					$graduates = $graduateClasses["$x"];
					foreach($graduates as $name)
						echo "<p>$name</p>";

					 echo "</div> </div>";
				}

				?>

			</td>
		</tr>
	</table>
	
	<div class="vertical_padding alumni_companies">
		<h2>Alumni <strong>Careers</strong></h2>
		<div class="seperator"></div>
		<p class="center">Since being re-chartered in 2007, Nu Chapter has graduated alumni who have begun prestigious careers in fields ranging from investment banking to marketing to law. Below is a list of some of the firms from which our alumni have accepted offers. </p>
		<div class="alumni_scroll">
			<img src="../img/alumni_companies/accenture_thumb.png" />
			<img src="../img/alumni_companies/amazon_thumb.png" />
			<img src="../img/alumni_companies/boa_thumb.png" />
			<img src="../img/alumni_companies/citigroup_thumb.png" />
			<img src="../img/alumni_companies/dbs_thumb.png" />
			<img src="../img/alumni_companies/deloitte_thumb.png" />
			<img src="../img/alumni_companies/fleishmanhilliard_thumb.png" />
			<img src="../img/alumni_companies/goldman_thumb.png" />
			<img src="../img/alumni_companies/hsbc_thumb.png" />
			<img src="../img/alumni_companies/ibm_thumb.png" />
			<img src="../img/alumni_companies/jpmorgan_thumb.png" />
			<img src="../img/alumni_companies/micron_thumb.png" />
			<img src="../img/alumni_companies/pwc_thumb.png" />
			<img src="../img/alumni_companies/ritzcarlton_thumb.png" />
			<img src="../img/alumni_companies/santander_thumb.png" />
		</div>
		<div style="height:115px"></div>
	</div>
	
	<?php getFooter(); ?>
	
	</body>
	
	<script>
	
		$(".alumni_table h3").on("click",function() {
			var year = $(this).data("year");
			
			if (year == undefined) {
				return;	
			}
			
			
			var currentYear = $(".selected").data("year");
			var lowestYear = <?php echo $firstGraduatingClass; ?>;
			var highestYear = <?php echo $lastGraduatingClass; ?>;

			$(".hidden_left").each(function(index) {
				if (index >= year - lowestYear)
					$(this).animate({
						width: "68px"
					});
				else 
					$(this).animate({
						width: 0
					});
			});
			$(".hidden_right").each(function(index) {
				if (index < (year-highestYear + 1) + 6)
					$(this).animate({
						width: "68px"
					});
				else
					$(this).animate({
						width: 0
					});
			});

			$(".selected").text(currentYear).removeClass("selected");
			$(this).addClass("selected").text("Class of " + year);

			if (year != currentYear) {
				var currentCell = $(".visible_cell");
				currentCell.removeClass("visible_cell").fadeOut();
				$("#year"+year).addClass("visible_cell").fadeIn();
			}
		});

		function commaSeparateNumber(val){
			while (/(\d+)(\d{3})/.test(val.toString())){
			  val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
			}
			return val;
		}
		
		var chapterAlumni = <?php echo $totalAlumni; ?>;
		var alumniWorldwide = 260000;
		var alumniChapters = 43;
		var duration = 1;
		
		var options = {useEasing : true, useGrouping : true, separator : ',', decimal : '.', prefix : '', suffix : '' };
		setTimeout(function() {
			new CountUp("chapterAlumni", 0, chapterAlumni, 0, duration, options).start();
			new CountUp("alumniWorldwide", 0, alumniWorldwide, 0, duration, options).start();
			new CountUp("alumniChapters", 0, alumniChapters, 0, duration, options).start();
		}, 250);
		
		console.log(-1 * $(".alumni_scroll").outerWidth() + $(document).width());
		
		(function scroll(){
			$(".alumni_scroll").animate({
				left: "-4229px"
			}, 25000, "linear", function() {
				$(".alumni_scroll").css("left","100%");
				scroll();
			});
		})();
//		scroll();
		
		
	</script>
	</html>