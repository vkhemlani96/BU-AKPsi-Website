<?php

ini_set('display_errors', 1);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://crowdfunding.bu.edu/admin/projects/3305/donations",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "accept: application/json, text/plain, */*",
    "accept-encoding: gzip, deflate, sdch, br",
    "accept-language: en-US,en;q=0.8",
    "cache-control: no-cache",
    "cookie: wantsMobile=false_1.2_manual; credsrv3=cussp-srv2; __utma=21468840.337516880.1438974336.1452710161.1456530242.42; __utmc=21468840; weblogin3=676ead1167a2db13d8da7831031d1176:cussp-srv3; isMobile=false_1.2; _gat=1; _ga=GA1.2.337516880.1438974336; sft=eyJhbGciOiJIUzUxMiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJ1ZXI0YWg2cGtkODRzN3lwMjc3NDMyZyIsImlzcyI6ImNyb3dkZnVuZGluZy5idS5lZHUiLCJleHAiOjE0ODMwNDA5MTEsImp0aSI6IkJ3dlZGMWFqVTRpd3BPbDlLWlhWSUVhIiwieHNyZlRva2VuIjoiM1VIMXpWeVVhWjFZM1NFOF80bHoifQ.HTEGVjG4FF23te6vNQ8UK_NZVeYp64RBP2gkij3IdjD7OUVlRXYryl1eheb8U-YM-tRKjHamEVBdUjOyoqCWIQ; XSRF-TOKEN=3UH1zVyUaZ1Y3SE8_4lz",
    "dnt: 1",
    "postman-token: aab326cd-fd1d-3e6f-27ab-62a237da4525",
    "referer: https://crowdfunding.bu.edu/static/admin-app/",
    "user-agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.98 Safari/537.36",
    "x-xsrf-token: 3UH1zVyUaZ1Y3SE8_4lz"
  ),
));

$donations = json_decode(curl_exec($curl), true)["donations"];
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
}

?>


<table>
	<?
		for ($i = 0; $i < sizeof($donations); $i++) {
			$d = $donations[$i];
	?>
			<tr>
				<td><? echo ucfirst(strtolower($d["first_name"]));?></td>
				<td><? echo ucfirst(strtolower($d["last_name"]));?></td>
			</tr>
	<?		
		}
		
	?>
	
	
</table>