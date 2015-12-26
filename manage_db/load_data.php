<?php
//Sample Database Connection Syntax for PHP and MySQL.

//Connect To Database

//PHPMyAdmin URL - https://p3nlmysqladm002.secureserver.net/grid55/223
include("db_credentials.php");
$usertable="brothers";

$link = mysqli_connect($hostname,$username, $password) or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please try again later.')</script></html>");
mysqli_select_db($link, $dbname);

$import_query = "load data local infile 'data.csv' into table $usertable fields terminated by ','
  enclosed by ''
  lines terminated by '\n'";

$result = mysqli_query($link, $import_query);
if (!$result) {
    echo 'Could not run query2: ' . mysql_error();
    exit;
}
echo "FINITO!";

?>