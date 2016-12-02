<?php 
$url = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$slug = end(explode("/", $url));

if ($slug == "article.php") {
	$slug = "female_quality_and_quantity";
}

include("../../db/credentials.php");

// Create connection
$link = mysqli_connect($hostname,$username, $password) or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please try again later.')</script></html>");
mysqli_select_db($link, $dbname);

$articleTable = "eye2eyeBlog";
$sql = "SELECT * FROM $articleTable WHERE slug = '$slug'";
$result = mysqli_query($link, $sql);
$article = mysqli_fetch_object($result);
$article->writeDate = date("F j, Y", strtotime($article->writeDate));
$article->footnotes = json_decode(stripslashes($article->footnotes));

$sql = "SELECT firstName, lastName FROM brothers WHERE email = '$article->email'";
$result = mysqli_query($link, $sql);
$author = mysqli_fetch_object($result);

$article->body = stripslashes($article->body);
$preview = trim(preg_replace('/\s\s+/', '', $article->body));	// Remove new lines
$preview = substr($preview, 0, 1000);
$preview = addslashes(strip_tags($preview));	// Remove footnotes
?>

<!DOCTYPE html>
<html lang="en">

	<head>

		<link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.0/material.indigo-pink.min.css">
		<title><? echo $article->title; ?> | Alpha Kappa Psi Nu Chapter</title>

		<script src="https://storage.googleapis.com/code.getmdl.io/1.0.0/material.min.js"></script>
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

		<link href="../../css/styles.css" rel="stylesheet"/>
		<link href="../../css/navbar.css" rel="stylesheet" />
		<link href="../../css/eye2eye_override.css" rel="stylesheet"/>
		<script src="../../js/jquery.js"></script>
		<script src="../../js/jquery.color.js"></script>

		<!--		<meta property="og:url" content="<? echo $url; ?>">-->
		<meta property="og:url" content="http://www.buakpsi.com">
		<meta property="og:title" content="<? echo $article->title; ?>">
		<meta property="og:image" content="../../img/eye2eye_logo.php">
		<meta property="og:site_name" content="Eye2Eye | Alpha Kappa Psi Nu Chapter">
		<meta property="og:description" content="<? echo $preview; ?>">

	</head>

	<body>

		<div id="fb-root"></div>

		<?php include("../../navbar.php"); getNavbar(true); ?>

		<div class="share_button_container">
			<a class="share_button"
			   href="https://www.facebook.com/sharer/sharer.php?sdk=joey&u=<? echo $url ?>&display=popup&ref=plugin&src=share_button" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
				<img src="../../img/social_media/facebook_white.png" height="20">
			</a>
			<br>
			<a class="share_button"
			   href="http://www.twitter.com/intent/tweet?url=<? echo $url ?>&text=<? echo $article->title ?>" 
			   onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
				<img src="../../img/social_media/twitter_white.png" height="20">
			</a>
			<br>
			<a class="share_button"
			   href="http://www.linkedin.com/shareArticle?mini=true&url=<? echo $url; ?>&title=<? echo $article->title ?>&source=buakpsi.com"
			   onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
				<img src="../../img/social_media/linkedin_white.png" height="20">
			</a>
			<br>
			<a class="share_button"
			   href="mailto:?subject=Check out Eye2Eye's Blog Post: <? echo $article->title ?>&body=<? echo $article->title . ' by ' . $author->firstName . ' ' . $author->lastName . ': ' . $url;?>">
				<img src="../../img/social_media/email_white.png" height="20">
			</a>

		</div>


		<div class="vertical_padding center title_section blog_header">
			<h1><? echo $article->title; ?></h1>
			<h4><a href="../research.php#<? echo strtolower( $author->lastName) ?>"><? echo $author->firstName . ' ' . $author->lastName; ?></a> | <? echo $article->writeDate ?></h4>
			<div class="table_seperator"></div>
		</div>
		<div class="vertical_padding center blog_body">

			<? echo $article->body;?>

		</div>
		<div class="blog_footer vertical_padding center">
			<div class="table_seperator"></div>

			<? 
			for($i = 1; $i <= count($article->footnotes); $i++) {
				$footnote = $article->footnotes[$i-1];
				echo "<p><sup>$i</sup> $footnote </p>";
			}	
			?>
		</div>

		<script>
			$(".share_button_container").css("top", ($(".blog_body").offset().top + 40) + "px");
		</script>
	</body>

</html>