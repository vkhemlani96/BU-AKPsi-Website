<?php
// Author: Linmic, email: linmicya@gmail.com

include("../db/credentials.php");

$host = $hostname; // your db host (ip/dn)
$user = $username; // your db's privileged user account
$password = $password; // and it's password
$db_name = $dbname; // db name
$tbl_name = "caseFall2016"; // table name of the selected db

$link = mysql_connect ($host, $user, $password) or die('Could not connect: ' . mysql_error());
mysql_select_db($db_name) or die('Could not select database');

$select = "SELECT * FROM `".$tbl_name."`";

mysql_query('SET NAMES utf8;');
$export = mysql_query($select); 
//$fields = mysql_num_rows($export); // thanks to Eric
$fields = mysql_num_fields($export); // by KAOSFORGE

for ($i = 0; $i < $fields; $i++) {
	$col_title .= '<Cell ss:StyleID="2"><Data ss:Type="String">'.mysql_field_name($export, $i).'</Data></Cell>';
}

$col_title .= '<Cell ss:StyleID="2"><Data ss:Type="String">Link to Resume</Data></Cell>';
$col_title = '<Row>'.$col_title.'</Row>';

while($row = mysql_fetch_row($export)) {
	$line = '';
	foreach($row as $value) {
		if ((!isset($value)) OR ($value == "")) {
			$value = '<Cell ss:StyleID="1"><Data ss:Type="String"></Data></Cell>\t';
		} else {
			$value = str_replace('"', '', $value);
			$value = '<Cell ss:StyleID="1"><Data ss:Type="String">' . $value . '</Data></Cell>\t';
		}
		$line .= $value;
	}
	$resume_link = 'http://www.buakpsi.com/case/';
	foreach (glob("resumes/".$row[1] . "_" . $row[0].".*") as $filename) {
		$resume_link .= $filename;
		break;
	}
//	$resume_link = 'http://www.buakpsi.com/case/resumes/' . $row[1] . "_" . $row[0] . '.pdf';
	$line .= '<Cell ss:StyleID="s65" ss:HRef="'.$resume_link.'"><Data ss:Type="String">'.$resume_link.'</Data></Cell>\t';
	$data .= trim("<Row>".$line."</Row>")."\n";
}

$data = str_replace("\r","",$data);

header("Content-Type: application/vnd.ms-excel;");
header("Content-Disposition: attachment; filename=export.xls");
header("Pragma: no-cache");
header("Expires: 0");

$xls_header = '<?xml version="1.0" encoding="utf-8"?>
<Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet" xmlns:html="http://www.w3.org/TR/REC-html40">
<DocumentProperties xmlns="urn:schemas-microsoft-com:office:office">
<Author></Author>
<LastAuthor></LastAuthor>
<Company></Company>
</DocumentProperties>
<Styles>
<Style ss:ID="1">
<Alignment ss:Horizontal="Left"/>
</Style>
<Style ss:ID="2">
<Alignment ss:Horizontal="Left"/>
<Font ss:Bold="1"/>
</Style>
<Style ss:ID="s65">
	<Font ss:FontName="Calibri" x:Family="Swiss" ss:Size="12" ss:Color="#00ABEA"
		ss:Underline="Single"/>
   <Alignment ss:Horizontal="Left" ss:Vertical="Bottom"/>
   <Borders/>
   <Interior/>
   <NumberFormat/>
   <Protection/>
</Style>

</Styles>
<Worksheet ss:Name="Export">
<Table>';

$xls_footer = '</Table>
<WorksheetOptions xmlns="urn:schemas-microsoft-com:office:excel">
<Selected/>
<FreezePanes/>
<FrozenNoSplit/>
<SplitHorizontal>1</SplitHorizontal>
<TopRowBottomPane>1</TopRowBottomPane>
</WorksheetOptions>
</Worksheet>
</Workbook>';

print $xls_header.$col_title.$data.$xls_footer;
exit;

?>