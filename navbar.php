<?php
function getNavbar($small) {
	$text = $small ? "_small" : "";
	$left = $small ?
		array("-20px", "-34px", "-24px"):
		array("426px", "647px", "");
	$sep = $small ? "" : "<div class=\"gold_seperator\" style=\"margin-top:0px; margin-bottom:0px;\"></div>";
	
	$prefix = "";
	if (strpos($_SERVER["DOCUMENT_ROOT"],"var") !== false)
		$prefix = "http://www.buakpsi.com"; 
	else
		$prefix = "http://localhost:8888/BU%20AKPsi";

	include_once("analyticstracking.php");
	echo "
		<div id=\"navbar$text\">
				<h1><a href=\"$prefix\">Alpha Kappa Psi <a style=\"color:#bda75d; font-weight:500\" href=\"$prefix\">Nu Chapter</a></a></h1>
				$sep
				<ul>
					<li>
						<p><a href=\"$prefix/about.php\">About</a></p>
					</li><li>
						<div class=\"dropdown\" style=\"left:$left[0]\">
							<div class=\"arrow-up\"></div>
							<ul>
								<li><p><a href=\"$prefix/brothers/\">Active</a></p></li>
								<li><p><a href=\"$prefix/brothers/alumni.php\">Alumni</a></p></li>
								<li><p><a href=\"$prefix/brothers/faculty.php\">Faculty</a></p></li>
							</ul>
						</div>
						<p><a href=\"$prefix/brothers/\">Brothers</a></p>
					</li><li>
					<p><a href=\"$prefix/rush/\" style=\"color:#bda75d\">Rush</a></p>
					</li><li style=\"display:none\">
					<p><a href=\"$prefix/elevate.php\">Elevate</a></p>
					</li><li>
						<div class=\"dropdown\" style=\"left:$left[1]\">
							<div class=\"arrow-up\"></div>
							<ul>
								<li><p><a href=\"$prefix/nccg/\">About</a></p></li>
								<li><p><a href=\"$prefix/nccg/team.php\">The Team</a></p></li>
								<li><p><a href=\"$prefix/nccg/advisors.php\">Advisors</a></p></li>
								<li><p><a href=\"$prefix/nccg/partners.php\">Partners</a></p></li>
								<li><p><a href=\"$prefix/nccg/clients.php\">Clients</a></p></li>
							</ul>
						</div>
						<p><a href=\"$prefix/nccg/\">NCCG</a></p>
					</li><li>
						<div class=\"dropdown\" style=\"left:$left[2]\">
							<div class=\"arrow-up\"></div>
							<ul>
								<li><p><a href=\"$prefix/eye2eye/\">About</a></p></li>
								<li><p><a href=\"$prefix/eye2eye/board.php\">Board of Directors</a></p></li>
								<li><p><a href=\"$prefix/eye2eye/research.php\">Research Team</a></p></li>
							</ul>
						</div>
						<p><a href=\"$prefix/eye2eye/\">Eye2Eye</a></p>
					</li><li>
						<p><a href=\"$prefix/faq.php\">FAQ</a></p>
					</li><li>
						<p><a href=\"$prefix/contact.php\">Contact Us</a></p>
					</li>
				</ul>
		</div>
	";
}

function getEye2EyeNavbar() {
	echo "
		<div id=\"navbar_eye2eye\">
				<ul>
					<li>
						<p><a href=\"$prefix/eye2eye/board.php\">Board of Directors</a></p>
					</li><li>
						<p><a href=\"$prefix/eye2eye/research.php\">Research Team</a></p>
					</li><li>
						<p><a href=\"$prefix/eye2eye/research.php\">Blog</a></p>
					</li><li>
						<p><a href=\"$prefix/eye2eye/donate.php\">Donate</a></p>
					</li>
				</ul>
		</div>
	";
}
function getFooter() {
	$prefix = "";
	if (strpos($_SERVER["DOCUMENT_ROOT"],"var") !== false)
		$prefix = "http://www.buakpsi.com"; 
	else
		$prefix = "http://localhost:8888/BU%20AKPsi%20New";
	
	echo "<div class='footer'>
		<div class='center'>
			<div class='footer_img'></div>
			<h3>Alpha Kappa Psi <a style='color:#bda75d'>Nu Chapter</a></h3>
			<ul>
				<li>
					<h5><a href=\"$prefix/about.php\">About</a></h5>
				</li>
				<li>
					<h5><a href=\"$prefix/rush/\">RUSH</a></h5>
				</li>
				<li>
					<h5><a href=\"$prefix/faq.php\">FAQ</a></h5>
				</li>
				<li>
					<h5><a href=\"$prefix/contact.php\">Contact Us</a></h5>
				</li>
			</ul>
		</div>
	</div>";
}
?>


