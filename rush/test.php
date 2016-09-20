<?php
$dir    = '/home/content/03/5577503/html/rush/rushPics/';
$files1 = scandir($dir);

$email = "etu718@bu.edu";
echo $email;
foreach ($files1 as $value) {
	$img = strpos(".".strtolower($value), str_replace("@bu.edu","",strtolower($email))) >= 0 ? $value : $image;
	echo $img;
	echo '<br>';
}?>