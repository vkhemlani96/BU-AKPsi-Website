<?php
//Sample Database Connection Syntax for PHP and MySQL.

//Connect To Database

//PHPMyAdmin URL - https://p3nlmysqladm002.secureserver.net/grid55/223
include("db_credentials.php");
$usertable="brothers";
$yourfield = "LAST_NAME";

$link = mysqli_connect($hostname,$username, $password) or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please try again later.')</script></html>");
mysqli_select_db($link, $dbname);

$query = "TRUNCATE $usertable";

$result = mysqli_query($link, $query);
if (!$result) {
    echo 'Could not run query2: ' . mysql_error();
    exit;
}
echo "FINITO!";

?>