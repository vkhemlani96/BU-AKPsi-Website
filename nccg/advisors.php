<?php
$advisors = array(
	array(
		"Mashiter",
		"Ian",
		"Entrepreneurial Educator at Boston University School of Management",
		"Ian Mashiter is an entrepreneurial executive with more than 28 years of high technology experience. Mr. Mashiter has raised $100 million in venture funding since 1996. Over his career, Ian has served as a board member, chief executive officer and co-founder of such innovative telecommunications companies as Dymec, Quarry Technologies, and Ennovate Networks.

Currently, Mr. Mashiter serves as executive chairman of Biomimetic Systems, where he provides assistance to the management team in the areas of strategic partners and company financing. Mr. Mashiter is also a partner with Hub Angel Investment Group, LLC where he evaluates business plans for potential investment and provides advice to portfolio companies. 

Mr. Mashiter is an executive-in-residence and a lecturer at Boston University where he teaches entrepreneurship, strategy, business management. He holds a BA (Hons) from the University of Newcastle-upon-Tyne in the UK. "
	)
);
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>NCCG Advisors | Alpha Kappa Psi Nu Chapter</title>
	<link href="../css/styles.css" rel="stylesheet"/>
	<link href="../css/navbar.css" rel="stylesheet" />
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.color.js"></script>
</head>

<body>
	<?php include("../navbar.php"); getNavbar(true); ?>
	
	<div class="vertical_padding title_section">
		<h1>Our Advisors</h1>
		<div class="seperator"></div>
		<h2>Nu Chapter Consulting Group</h2>
	</div>
	
	<div class="center vertical_padding" style="width: 90%; max-width: 1200px">
		<p style="padding-bottom:40px; text-align: center" class="indented_text">Faculty Advisors are experts in their fields who are available upon request to provide assistance with the development<br>of solutions for the client, as well as to review and give feedback on finished work.</p>
		<table class="nccg_advisor_table">
		<?php
			foreach ($advisors as $person) {
				echo "
					<tr>
						<td class=\"nccg_advisor_image_cell\">
							<img src=\"../img/nccg/".strtolower($person[0])."_".strtolower($person[1])."_thumb.png\">
						</td>
						<td class=\"nccg_advisor_bio_cell\">
							<h2 class=\"nccg_name\"><strong>$person[1] $person[0]</strong></h2>
							<h4>$person[2]</h4>
							<div class=\"seperator\"></div>
							<p>$person[3]</p>
						</td>
					</tr>
				";
			}
			
		?>
		</table>
	</div>
	
	<?php getFooter(); ?>
	
</body>
</html>