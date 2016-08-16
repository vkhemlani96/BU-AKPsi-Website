<?php
$advisors = array(
	array(
		"Furman",
		"Jeffrey L.",
		"Associate Professor, Strategy & Innovation Department",
		"Jeffrey L. Furman (Ph.D. 2001, MIT-Sloan) is Associate Professor of Strategy & Innovation at Boston University and a Faculty Research Fellow at the National Bureau of Economic Research (NBER). Furman's research addresses issues at the intersection of Strategy, International Business, and Innovation. His recent projects examine the strategic management of science-based firms and the impact of institutions on cumulative innovation. Jeff's research has been published in the American Economic Review (AER), Journal of Economic Behavior and Organization (JEBO), Research Policy, Industrial & Corporate Change (ICC), and Nature, among others. He has also served on the editorial review boards of the Journal of International Business Studies (JIBS), Strategic Organization! (SO!), Journal of Management, and Industry & Innovation. Jeff has been an active member of the Academy throughout the 2000s and has served as reviewer, presenter, discussant, and session chair at AOM annual meetings and has organized multiple Professional Development Workshops and served as a member and co-chair of the BPS Division Research & Teaching Committee. In addition to his contributions to the AOM, Furman co-organizes the NBER's Summer Institute program on Innovation Policy & the Economy."
	),
	array(
		"McCarthy",
		"John",
		"Associate Professor, Organizational Behavior Department; Director of the Executive Development Roundtable",
		"Dr. Jack McCarthy is an Associate Professor of Organizational Behavior in the School of Management at Boston University, where he also serves as the Director of the Executive Development Roundtable, a major consortium and research center on leadership. His research interests are in leadership, organizational change and global sustainability, and he teaches courses on leadership and organizational behavior in the undergraduate, MBA, international and executive programs. Additionally, he designs and leads a year-long seminar series on leadership for the Hubert H. Humphrey Fellowship Program at Boston University, comprised of mid-career professionals and scholars from developing nations studying in the United States. He also serves as the Faculty Director for the university's core undergraduate Organizational Behavior course. His work has been published in leading journals and he is a frequent speaker on leadership at academic and professional conferences in the US and abroad. With over fifteen years in corporate finance in several large firms as a financial analyst, manager, and senior executive prior to his career transition into academia, Dr. McCarthy draws heavily upon his real-world management and leadership experience in his teaching and research. He also serves as a leadership development consultant for executives and senior management teams in various industries. He was previously an Assistant Professor at the University of New Hampshire, where he launched and led the undergraduate business program at the university's urban campus in Manchester, NH and was the recipient of the college-wide 2005 Teaching Excellence Award. Having taught for three summers in residence in China, he received the 2009 Faculty of the Year Award from the International MBA Cohort at Boston University. In addition, he was selected to deliver the 2011 Faculty Address for the School of Management's Convocation Ceremony for its Bachelor's degree candidates as part of Boston University's 138th Commencement Exercises. Most recently, Dr. McCarthy received the 2012 Broderick Prize for Excellence in Teaching at the Boston University School of Management, the school's highest honor for teaching.<br><br>
In addition to a DBA in Organizational Behavior from the Graduate School of Management at Boston University, he received an MBA with a concentration in Finance from Babson College, and a BA in Economics from the University of Massachusetts at Amherst. A native Bostonian, and an alumnus of The Boston Latin School, Jack is an avid Boston sports fan and still plays competitive ice hockey, although at an increasingly less competitive pace."
	),
	array(
		"Morrison",
		"Paul",
		"Assistant Professor, Operations and Technology Management",
		""
	),
	array(
		"Wilson",
		"Raymond",
		"Lecturer/Executive-in-Residence, Accounting Department",
		"Raymond Wilson is an Executive in Residence and Senior Lecturer at the Boston University School of Management, where he has been teaching since 2001. He teaches a wide range of courses in both the graduate and undergraduate programs, as well as in the School of Law. He holds an MBA from Bentley University. Prior to his appointment at BU, Ray served in a variety of senior executive roles for several companies. At Scitex America Corp., a technology company, he served over 12 years as CFO, SVP of Marketing, and EVP of Business Operations. In the late 90's, Ray co-founded Protocol Direct Marketing, an internet marketing and support company, and as CFO helped lead Protocol's growth to over $225m in four years. He has also started and grown several small businesses, including marketing and financial services companies. Today, in addition to lecturing at SMG and the School of Law, Ray is principal and co-owner of an investment company focused on early stage companies."
	)
);
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>Faculty Brothers | Alpha Kappa Psi Nu Chapter</title>
	<link href="../css/styles.css" rel="stylesheet"/>
	<link href="../css/navbar.css" rel="stylesheet" />
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.color.js"></script>
</head>

<body>
	<?php include("../navbar.php"); getNavbar(true); ?>
	
	<div class="vertical_padding title_section">
		<h1>Faculty Brothers</h1>
		<div class="seperator"></div>
		<h2>Some of Boston University's Most Honored Professors</h2>
	</div>
	
	<div class="center vertical_padding" style="width: 90%; max-width: 1200px; padding-bottom: 0">
<!--		<p style="padding-bottom:40px; text-align:center" class="indented_text">Faculty Brothers are members of the chapter who are honored for their extrordinary contributions<br>to Boston University and the overall field of business.</p>-->
		<table class="nccg_advisor_table">
		<?php
			foreach ($advisors as $person) {
				
				echo "
					<tr>
						<td class=\"faculty_brother_image_cell\">
							<img src=\"../img/brothers/faculty/".strtolower($person[0])."_".strtolower(preg_replace("/ .*/i","",$person[1])).".png\">
						</td>
						<td class=\"faculty_brother_bio_cell\">
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