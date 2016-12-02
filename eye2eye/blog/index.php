<?php 
ini_set('display_errors', 1);

include("../../db/credentials.php");

// Create connection
$link = mysqli_connect($hostname,$username, $password) or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please try again later.')</script></html>");
mysqli_select_db($link, $dbname);

$articleTable = "eye2eyeBlog";
$sql = "SELECT slug, email, title, body, writeDate FROM eye2eyeBlog ORDER BY writeDate DESC LIMIT 10";
$result = mysqli_query($link, $sql);
?>


<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Eye2Eye Blog | Alpha Kappa Psi Nu Chapter</title>
		<link href="../../css/styles.css" rel="stylesheet"/>
		<link href="../../css/navbar.css" rel="stylesheet" />
		<link href="../../css/eye2eye_override.css" rel="stylesheet"/>
		
		
	</head>

	<body>
		<?php include("../../navbar.php"); getNavbar(true); ?>

		<div class="vertical_padding title_section">
			<h1>Research Blog</h1>
			<div class="seperator"></div>
			<h2>Eye2Eye</h2>
		</div>

		<div class="center vertical_padding" style="width: 90%; max-width: 1200px">
			<p style="text-align: center; margin-bottom: 20px;" class="center">
				As part of our mission, Eye2Eye is invested in fostering research in the field of gender equality and using what we gather to educate the public on the severity of the issue. While we are excited to share our major research project at our conference in the spring, our research analysts has been developing blog articles sharing what they've learned and their prespectives as students experiencing and witnessing the epidemic. We encourage you to read and share the articles below as take part in our efforts to spread the word on the issue. 
			</p>
			<div class="table_seperator"></div>

			<? 
			while ($article = mysqli_fetch_object($result)) {
				$article->writeDate = date("F j, Y", strtotime($article->writeDate));
				$preview = trim(preg_replace('/\s\s+/', '', $article->body));	// Remove new lines
				$preview = trim(preg_replace('/<sup>\d+<\/sup>/', '', $article->body));	// Remove footnotes
				$previewPrefix = substr($preview, 0, 1000);
				preg_match('/.+<\/p>/', $preview, $previewSuffix, 0, 1000);
				$preview = $previewPrefix . $previewSuffix[0];
				
				$sql = "SELECT concat(firstName, \" \", lastName) as name FROM brothers WHERE email = \"" . $article->email ."\"";
				$authorResult = mysqli_query($link, $sql);
				$author = mysqli_fetch_object($authorResult)->name;
			?>
			<a href="<? echo $article->slug; ?>" style="display:block">
				<div class="blog_preview">
					<h2><strong><? echo $article->title ?></strong></h2>
					<h4><a href="../research.php#nguyen"><? echo $author; ?></a> | <? echo $article->writeDate; ?></h4>
					<? echo $preview; ?>
				</div>
			</a>
			<? } ?>
			<!--
<a href="female_quality_and_quantity.php" style="display:block">
<div class="blog_preview">
<h2><strong>Female quality and quantity stagnant at universities</strong></h2>
<h4><a href="../research.php#nguyen">Nelly Nguyen</a> | November 17, 2016</h4>
<p>
There have been numerous studies done on gender equality across industries and countries; however, there aren't many that focus on education, especially among universities. There is one that stands out in this category - "The Glass Door Remains Closed: Another Look at Gender Inequality in Undergraduate Business Schools" by Laura Marini Davis and Victoria Geyfman. The authors examined female representation in undergraduate business schools by analyzing accredited U.S. business programs in the Association to Advance Collegiate Schools of Business (AACSB) from 2003 to 2011.
<br><br>
According to AACSB data, the number of male students enrolled increased approximately 15% from 2010 to 2013 while the number of female students fell slightly by 0.55%. The data also shows that female representation at accredited member institutions in AACSB in the United States declined 3.6% from 2003 to 2011. The authors also took a look at the degree attainment and noticed that even though the number of bachelor business degrees increased by 9% during 2003 to 2011, the number of degrees awarded to female students remained virtually the same, increasing only 0.21%. Thus, the  authors concluded that female representation in undergraduate business schools measured by either enrollment or degrees awarded has declined in the last decade –remarkable findings in light of a nationally reported reversal in the gender gap. 
<br>
<a href="female_quality_and_quantity.php">Read More...</a>
</p>
</div>
</a>
<a href="looking_through_the_glass.php">
<div class="blog_preview">
<h2><strong>Looking Through the Glass: A Modern Perspective on the Glass Ceiling</strong></h2>
<h4><a href="../research.php#daniel">Ashley Daniel</a> | November 15, 2016</h4>
<p>
We are fortunate enough to live in a time where "You can be anything you want to be!" is a prominent statement in nearly every child's life. However, an overwhelming number of statistics accompanied by a series of public events this year have us all questioning that statement more than ever. Can I be anything I want to be? Are there limits to my success? After consulting a number of articles, I have decided to dive deeper into this idea of <i>The Glass Ceiling</i>. 
<br><br>
The U.S. Department of Labor defines the glass ceiling as "those artificial barriers based on attitudinal or organizational bias that prevent qualified individuals from advancing upward in their organization into management-level positions."<sup>1</sup> The glass ceiling has kept women and minorities from attaining well-deserved promotions and pay raises for years...but does it still exist in our forward-thinking, 2016 society?
<br>
<a href="looking_through_the_glass.php">Read More...</a>
</p>
</div>
</a>
-->
		</div>

		<?php getFooter(); ?>

	</body>
</html>