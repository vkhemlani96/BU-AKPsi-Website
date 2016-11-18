<?php

function full_url_encode($params) {
	$result = "";
	if(is_array($params)) {
		foreach($params as $key=>$value) {
			if(is_array($value)) {
				foreach($value as $vkey=>$vvalue) {
					$result .= sprintf('%s[]=%s&', $key, urlencode(stripslashes($vvalue)));
				}
			}
			else {
				$result .= sprintf('%s=%s&',$key,urlencode(stripslashes($value)));
			}
		}
		$result = preg_replace('/\&$/','',$result);
	}
	else {
		$result = urlencode(stripslashes($params));
	}
	return $result;
}

die();

$filename = getcwd() . "/stats.txt";

$statsFile = fopen($filename, "r");
$stats = fread($statsFile, filesize($filename));
fclose($statsFile);
parse_str($stats, $parsed);

if (isset($_GET["source"])) {
	$parsed[$_GET["source"]] = $parsed[$_GET["source"]] + 1;
} else {
	$parsed['default'] = $parsed['default'] + 1;
}

$statsFile = fopen($filename, "w");
fwrite($statsFile, full_url_encode($parsed));
fclose($statsFile);

header("Location: https://crowdfunding.bu.edu/eye2eye") ;
?>