<?php
$advisors = array(
	array(
		"Aquino",
		"Voltaire",
		"Consultant, Cloud Sherpas",
		"Voltaire Aquino is a Consultant at Innoveer Solutions, a Boston-based CRM consulting firm. In his current role at Innoveer, Voltaire analyzes currently existing organizational and technological architecture in order to solution and deliver CRM and Social Media Solutions to clients utilizing Salesforce.com. He holds 4 consulting certifications under Salesforce.<br><br>Prior to joining Innoveer, Voltaire worked for Digitas in their Strategy & Analysis Division where he managed digital campaigns and initiatives for Proctor and Gamble's CPG brands. He received his BS in Business Administration from Boston University where he studied information systems, marketing and economics; during this time he worked as a research assistant for the strategic brand team at Genzyme where he focused on product marketing and industry analysis.",
		"http://www.linkedin.com/in/voltaireaquino"
	),
	array(
		"Goulart",
		"Michael",
		"Associate Consultant, Veeva Systems",
		"Michael Goulart is an Associate Consultant at Veeva Systems, a Silicon Valley-based start-up focused on developing Enterprise Apps for the Pharmaceutical/Bio-tech verticals. In his current role, Michael works to bring these traditionally late-adopting, FDA/compliance-centric clients to the cloud. He has been focused on implementing mobile CRM on the iPad and is now transitioning to a Junior Product Management SME for the company's next cloud App. <br><br>Previously, Michael was a Senior Consultant in the Enterprise Applications group of IBM Global Business Services. With a focus on business process harmonization and SAP system implementations, he aimed to assist clients in solving some of their biggest problems. He has a specific interest in the Product Management process - covering the full scope of system development from requirements gathering, through product build, QA testing and eventual product go-live. Michael completed several internships, focusing on Project Management, in both the Pharmaceutical (Novartis) and Consulting (BearingPoint/KPMG Consulting) Industries. Other interests include playing guitar and piano, as well as traveling and cycling. He received his BS in Business Administration with concentrations in Finance and Business Law in 2010.",
		"http://www.linkedin.com/in/mikegoulart"
	),
	array(
		"Koretsky",
		"Lana",
		"MBA student, MIT Sloan School of Management",
		"Lana Koretsky is a first-year MBA student at MIT Sloan School of Management. Prior to enrolling at Sloan, Lana was a Consultant at Deloitte working with clients to transform their organization and talent strategies. Over the course of her time with Deloitte, Lana has worked with organizations in the Consumer Products, Healthcare, and Aerospace & Defense industries on a variety of projects related to organization design, culture, governance, competency modeling, and change management.<br><br>Prior to joining Deloitte, Lana completed several internships within the Human Resources Departments of financial services and technology companies and conducted retirement actuarial and data analysis at Watson Wyatt Worldwide (now Towers Watson). Lana graduated from Boston University in 2009 with a BA in Psychology and a BS in Business Administration with a concentration in Organizational Behavior.",
		"http://www.linkedin.com/pub/lana-koretsky/4/801/99a"
	),
	array(
		"Yamamoto",
		"Takumi",
		"ERS Consultant at Deloitte",
		"Takumi graduated from Boston University in 2014 with a BS in Business Administration. He is also an alumni brother of Alpha Kappa Psi Nu Chapter, and is the co-founder of the Nu Chapter Consulting Group. Takumi is currently employed by Deloitte, where he works as a risk consultant, specifically in the technology industry. From his experience there, he offers NCCG the professional guidance to meet client expectations.",
		"http://www.linkedin.com/in/takumiyamamoto"
	)
);
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>NCCG Partners | Alpha Kappa Psi Nu Chapter</title>
	<link href="../css/styles.css" rel="stylesheet"/>
	<link href="../css/navbar.css" rel="stylesheet" />
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.color.js"></script>
</head>

<body>
	<?php include("../navbar.php"); getNavbar(true); ?>
	
	<div class="vertical_padding title_section">
		<h1>Our Partners</h1>
		<div class="seperator"></div>
		<h2>Nu Chapter Consulting Group</h2>
	</div>
	
	<div class="center vertical_padding" style="width:90%; max-width: 1200px;">
		<p style="padding-bottom:40px" class="indented_text">Partners are alumni of Alpha Kappa Psi who either have worked or are currently working professionally as consultants. A Partner is assigned to each project that NCCG accepts and remains involved throughout the semester to ensure that significant value is added to each business.</p>
		<table class="nccg_advisor_table">
		<?php
			foreach ($advisors as $person) {
				echo "
					<tr>
						<td class=\"nccg_advisor_image_cell\">
							<img src=\"../img/nccg/".strtolower($person[0])."_".strtolower($person[1])."_thumb.png\">
						</td>
						<td class=\"nccg_advisor_bio_cell\">
							<h2 class=\"nccg_name\"><strong>$person[1] $person[0]</strong>
								<a target=\"_blank\" href=\"$person[4]\"><img height=\"24\" style=\"float:right; margin-top:2px\" src=\"../img/nccg/linkedin.png\"></a>
							</h2>
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