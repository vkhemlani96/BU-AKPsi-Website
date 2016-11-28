<?php
ini_set('display_errors', 1);

$_POST["articleAuthor"] = addslashes($_POST["articleAuthor"]);
$_POST["articleTitle"] = addslashes($_POST["articleTitle"]);
$_POST["articleBody"] = addslashes($_POST["articleBody"]);
$_POST["articleFootnotes"] = addslashes($_POST["articleFootnotes"]);

$slug_components = explode(" ",preg_replace("/[^A-Za-z ]/", '', strtolower($_POST["articleTitle"])), 5);
unset($slug_components[4]);
$slug = join("_", $slug_components);

include("../../db/credentials.php");

// Create connection
$conn = new mysqli($hostname, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 

	$articleTable = "eye2eyeBlog";
	$sql = "INSERT INTO $articleTable (email, title, body, footnotes, slug) VALUES ('" . $_POST["articleAuthor"] . "', '" . $_POST["articleTitle"] . "', '" . $_POST["articleBody"] . "', '" . $_POST["articleFootnotes"] . "', '" . $slug . "')";

if ($conn->query($sql) === TRUE) {
	$no_error = true;
	header('Location: http://www.buakpsi.com/eye2eye/blog/'.$slug);

} else {

?>
	
	<h2 style="margin: 50px 0;"><strong>An error has occured.</strong><br>Please copy paste the following and email it to <a href="mailto:jskim@bu.edu">jskim@bu.edu</a>.</h2>
	
	<?
		echo "<p class='center'>";
	
//		echo $sql . "<br>";
		
		echo $conn->error . "<br>";
	
		
		foreach($_POST as $stuff ) {
			if( is_array( $stuff ) ) {
				foreach( $stuff as $thing ) {
					echo $thing;
				}
			} else {
				echo $stuff;
			}
			echo "<br>";
		}
		
		echo "</p><br><br><br><br>";
		
	}

$conn->close();


	getFooter();

?>