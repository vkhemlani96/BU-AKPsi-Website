<?php
function getDonationCount() {
	$fullSource = file_get_contents("https://crowdfunding.bu.edu/project/3305");
	preg_match('/<div class=\"single-project-top-dollar\">\s*\$\d+/', $fullSource, $matches);
	preg_match('/\$\d+/', $matches[0], $matches);
	return $matches[0];
}

?>


<!DOCTYPE html>
<html lang="en">

	<head>

		<link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.0/material.indigo-pink.min.css">
		<title>Eye2Eye | Alpha Kappa Psi Nu Chapter</title>

		<script src="https://storage.googleapis.com/code.getmdl.io/1.0.0/material.min.js"></script>
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

		<link href="../css/styles.css" rel="stylesheet"/>
		<link href="../css/navbar.css" rel="stylesheet" />
		<link href="../css/eye2eye_override.css" rel="stylesheet"/>
		<script src="../js/jquery.js"></script>
		<script src="../js/jquery.color.js"></script>

	</head>

	<body>
		<?php include("../navbar.php"); getNavbar(true); ?>

		<div class="eye2eyeSplash">
			<div class="eye2eyeLogo">
				<img src="../img/eye2eye/logo_splash.png" height="400">
			</div>
			<div class="eye2eyeNavbar">
				<?php getEye2EyeNavbar(); ?>
			</div>
		</div>

		<div class="center vertical_padding">
			<h2><strong>About Us</strong></h2>
			<div class="seperator"></div>
			
			<p class="quote vertical_padding">"To promote the issue of, to foster research in, and to educate the public on gender inequality in the collegiate community and professional world."</p>
			<p>
				Eye2Eye is a service organization founded by students at Alpha Kappa Psi Nu Chapter at Boston University in 2016. The inspiration to start Eye2Eye started in the spring of 2016 with a few students from Boston University. Having experienced and witnessed gender inequality <i>firsthand</i> within the business school at BU and throughout multiple industries, coupled with eye-opening research conducted by organizations like the ITUC, pushed the team to create Eye2Eye. As a start to its journey, Eye2Eye has two main goals:
			</p>
			<table class="eye2eyeGoalsTable">
				<tr>
					<td>
						<h2><strong>Hold a National Conference</strong></h2><p>to bring together professionals from various industries to discuss gender inequality and the best ways to fight it.</p>
					</td><td>
					<h2><strong>Conduct Propreitary Research</strong></h2><p>at BU to share at our national conference and begin to expand to other universities, becoming the nation's leading collegiate gender inequality research platform.</p>
					</td>
				</tr>
			</table>
			<p>
				We've decided to focus our efforts by breaking down the issue in four categories as defined by The 3% Movement's <a href="http://www.thedrum.com/opinion/2016/08/11/thousand-words-worth-picture-women-share-how-sexism-industry-has-affected-them" target="_blank">"Elephant on Madison Avenue"</a> survey. The survey was able to collect over 500 stories of gender inequality in the workplace and broke down some of the issues into the following categories:
			</p>
			<br>
			<table class="eye2eyeCategoryTable">
				<tr>
					<td class="box_purple">
						<h2>Sexual Harrasment + Toxic Culture</h2>
					</td><td class="spacer"></td><td class="box_pink">
					<h2>Pay Inequality</h2>
					</td><td class="spacer"></td><td class="box_purple">
					<h2>Lack of Opportunity/Visibility</h2>
					</td><td class="spacer"></td><td class="box_pink">
					<h2>The Motherhood Penalty</h2>
					</td>
				</tr>
			</table>
			<br>
			
			<p>

				The research continues and the issue of gender inequality is undeniable; something needs to happen. Eye2Eye is fully committed to continue collecting research and help raise awareness on the issue. With our annual conference, we aim to invite professionals from all industries from over the country to talk, discuss, and highlight some of the issues they have faced and noticed as well as how they work to combat this epidemic. Besides the conference, our team will be working hard to research different industries and gender inequality specific to Boston University. If our research is informational and unique, we hope to expand to other universities and help lead the gender inequality research platform among colleges throughout the United States.
			</p>
		</div>

		<div class="blue_background vertical_padding">
			<div class="center">
				<h3><strong>How Can You Help</strong></h3>
				<div class="gold_seperator_small"></div>
				<p>Eye2Eye wants to see a fairer, more equal and just workforce, where hard work, talent, and determination are the main measures of success. In order to achieve our milestones, we need your help. With your support, we can develop a platform that fosters change and raises the awareness that has been mute in many communities. Please help us spread our mission by sharing our website and name. Additionally, please consider donating to our fund to help us create a meaningful and impactful conference; every dollar helps tremendously. Click on the button below to see our rewards categories and make your tax-deductible donation! We thank you for your support!</p>
				<br><br>
				<h1><? echo getDonationCount(); ?> Donated So Far</h1>
				<p style="text-align:center; margin-top: 20px"><a href="https://crowdfunding.bu.edu/project/3305" target="_blank" class="button_gold">Give Now</a></p>
			</div>
		</div>
		
		<div class="vertical_padding center">
			<h2><strong>Research</strong></h2>
			<div class="seperator"></div>
			<p>				
				Research being everyday proves that there is a problem. For example, according to <a href="http://www.ilo.org/washington/areas/gender-equality-in-the-workplace/WCMS_159496/lang--en/index.htm" target="_blank">public information collected by the International Trade Union Confederation (ITUC)</a>, "the global gender pay gap ranges from 3 percent to 51 percent with a global average of 17 percent." As noted in <a href="http://www.huffingtonpost.com/faith-popcorn/you-cant-see-the-future-f_b_1463114.html" target="_blank">You Can't See the Future From the Man-Cave</a> by Faith Popcorn of the Huffington Post, "A <a target="_blank" href="http://www.catalyst.org/file/445/the_bottom_line_corporate_performance_and_women%27s_representation_on_boards_(2004-2008).pdf">study by Catalyst</a> found that those Fortune 500 companies with the most female directors outperformed those with few, or none. And those with at least three women at the boardroom table dramatically outperformed the rest. And the numbers were huge: 84 percent return on sales; 60 greater percent return on invested capital, and 46 percent greater return on equity." 
				<br><br>
				To combat the problem Eye2Eye has decided to begin doing it's own research, right here at home. While we have decided to present our findings at our conference this coming spring, our research analysts have started blogging about their experiences. You can see the full list of articles on our <a href="blog/index.php">blog page</a> or check out our last few articles below. 
			</p>
			
			<div class="blog_table">
				<a href="blog/female_quality_and_quantity.php">
					<div>
						<h2><strong>Female quality and quantity stagnant at universities</strong></h2>
						<p>There have been numerous studies done on gender equality across industries and countries; however, there aren't many that focus on education, especially among universities. One study that stands out in this category is "The Glass Door Remains Closed: Another Look at Gender Inequality in Undergraduate Business Schools" by Laura Marini Davis and Victoria Geyfman. The authors looked at female representation in undergraduate business schools by analyzing accredited U.S. business programs in the Association to Advance Collegiate Schools of Business (AACSB) from 2003 to 2011.</p>
					</div>
				</a>
				<div class="table_seperator"></div>
				<a href="blog/looking_through_the_glass.php">
					<div>
						<h2><strong>Looking Through the Glass: A Modern Prespective on the Glass Ceiling</strong></h2>
						<p>We are fortunate enough to live in a time where "You can be anything you want to be!" is a prominent statement in nearly every child's life. However, an overwhelming number of statistics accompanied by a series of public events this year have us all questioning that statement more than ever. Can I be anything I want to be? Are there limits to my success? After consulting a number of articles, I have decided to dive deeper into this idea of <i>The Glass Ceiling</i>.</p>
					</div>
				</a>
			</div>
			
		</div>

		<!--
<div class="vertical_padding center">
<h2><strong>Help us with the Fight</strong></h2>
<div class="seperator"></div>

<p class="vertical_padding">
In order to hold a successful conference, Eye2Eye hopes to raise a significant amount of money. If you would like to support this cause and help us raise awareness in the fight to close the gender gap, click and share the link on the right where you can make your tax-deductible donation. Every bit helps - no matter how big or small.  
</p>

</div>
-->
		<?php getFooter(); ?>
	</body>
</html>