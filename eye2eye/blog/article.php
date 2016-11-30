<?php 
$url = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$slug = end(explode("/", $url));

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

	</head>

	<body>
		<?php include("../../navbar.php"); getNavbar(true); ?>

		<div class="vertical_padding center title_section blog_header">
			<h1><? echo $article->title; ?></h1>
			<h4><a href="../research.php#<? echo strtolower( $author->lastName) ?>"><? echo $author->firstName . ' ' . $author->lastName; ?></a> | <? echo $article->writeDate ?></h4>
			<div class="table_seperator"></div>
		</div>
		<div class="vertical_padding center blog_body">

			<? echo stripslashes($article->body) ?>

		</div>
		<div class="blog_footer vertical_padding center">
			<div class="table_seperator"></div>

			<? 
	for($i = 1; $i <= count($article->footnotes); $i++) {
		$footnote = $article->footnotes[$i-1];
		echo "<p><sup>$i</sup> $footnote </p>";
	}	
			?>
			<!--			<p><sup>1</sup> Davis, Laura Marini, and Victoria Geyfman. "The Glass Door Remains Closed: Another Look at Gender Inequality in Undergraduate Business Schools." Journal of Education for Business 90, no. 2 (2014): 81-88. doi:10.1080/08832323.2014.980715.</p>-->
		</div>
	</body>

</html>