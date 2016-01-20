<?php
//Sample Database Connection Syntax for PHP and MySQL.

//Connect To Database

//PHPMyAdmin URL - https://p3nlmysqladm002.secureserver.net/grid55/223
//include("db_credentials.php");
//$usertable="brothers";
//
//$link = mysqli_connect($hostname,$username, $password) or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please try again later.')</script></html>");
//mysqli_select_db($link, $dbname);
//
//
//$creation_query = "CREATE TABLE $usertable (
//email VARCHAR(15),
//lastName VARCHAR(20) NOT NULL,
//firstName VARCHAR(20) NOT NULL,
//class VARCHAR(8),
//year YEAR(4) NOT NULL,
//majorSchool TINYTEXT,
//major TINYTEXT,
//minorSchool TINYTEXT,
//minor TINYTEXT,
//status SET('Active','Inactive','Alumni') NOT NULL
//)";
//
////echo $creation_query;$result = mysql_query("SHOW COLUMNS FROM $usertable");
//$result = mysqli_query($link, $creation_query);
//if (!$result) {
//    echo 'Could not run query1: ' . mysql_error();
//    exit;
//}
	
//$result = mysqli_query($link, "SHOW COLUMNS FROM $usertable");
//if (!$result) {
//    echo 'Could not run query2: ' . mysql_error();
//    exit;
//}
//if (mysqli_num_rows($result) > 0) {
//    while ($row = mysqli_fetch_assoc($result)) {
//        print_r($row);
//    }
//}
	
?>