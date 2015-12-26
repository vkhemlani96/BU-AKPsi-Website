<!DOCTYPE html>
<html lang="en">

<head>
	<title>Tutorial | Alpha Kappa Psi</title>
	<link href="css/styles.css" rel="stylesheet"/>
	<link href="css/navbar.css" rel="stylesheet" />
	<link href="http://trac.webkit.org/export/185921/trunk/Source/WebCore/css/html.css" rel="stylesheet" />
	<style>
		body h1, h2, h3, h4, h5, h6, p, p2 {
			font-family: "Times New Roman";	
			color: black;
			text-align: left;
		}
		xmp {
			margin-left: -100px;
		}
	</style>
	
</head>
	
<body>
	<h1>Website Tutorial</h1>
	<p>This is a quick tutorial, not on how HTML works, but on the different classes and patterns to use on the website to make sure all of our pages look uniform.</p>
	<p>To start, this is how you should start all of your files:</p>
	<xmp>
		<!DOCTYPE html>
		<html lang="en">

		<head>
			<title>{TITLE} | Alpha Kappa Psi Nu Chapter</title>
			<link href="css/styles.css" rel="stylesheet"/>
			<link href="css/navbar.css" rel="stylesheet" />
		</head>

		<body>
			<div id="navbar">
				<h1>Alpha Kappa Psi <a style="color:#bda75d; font-weight:300">Nu Chapter</a></h1>
				<div class="gold_seperator" style="margin-top:0px; margin-bottom:0px;"></div>
				<ul>
					<li>
						<p>About</p>
					</li>
					<li>
						<p>Brothers</p>
					</li>
					<li>
						<p style="color:#bda75d">Rush</p>
					</li>
					<li>
						<p>Elevate</p>
					</li>
					<li>
						<p>Consulting</p>
					</li>
					<li>
						<p>FAQ</p>
					</li>
					<li>
						<p>Contact Us</p>
					</li>
				</ul>
			</div>
			
<!--			<!-- -------------{everything else goes here}---------------- -->
		</body>
		</html>
	</xmp>
	
	<p>This should have set up the banner for the page. The buttons don't lead anywhere yet; don't worry about that. All you have to do is replace the {TITLE} portion with the title of the page.</p>
	
	<div class="seperator"></div> <!-- ------------------------------------------------------------------------ -->
	
	<p>Next, you're going to set up the title portion for the page by appending the following code. Replace the {TITLE} and {SUBTITLE} with the appropriate content, if applicable. </p>
	
	<xmp>
		<div class="center vertical_padding title_section">
			<h1>{TITLE}</h1>
			<div class="seperator"></div>
			<h2>{SUBTITLE}</h2>
		</div>
	</xmp>
	
	<p> Put this before the closing body tag where it says</p>
	<xmp><!--			<!-- -------------{everything else goes here}---------------- --></xmp>
	<p>All the html code for the rest of the page should go here. </p>
	
	<div class="seperator"></div> <!-- ------------------------------------------------------------------------ -->
	
	<p>Next, you should typically break the content on the page up into seperate parts. For example, the <a href="about.html">about page</a> has three sections. The background colors should generally alternate but don't have to. The first section, just below the title, should have the following format. Look at the about page's code as an example. </p>
	
	<xmp>
		<div class="center vertical_padding">
		{CONTENT}
		</div>
	</xmp>
	
	<div class="seperator"></div> <!-- ------------------------------------------------------------------------ -->
	
	<p>After that section, other white sections should take the following format:</p>
	<xmp>
		<div class="center vertical_padding">
			<h2>{SECTION TITLE}</h2>
			<div class="seperator"></div>
			{REST OF SECTION CONTENT}
		</div>
	</xmp>
	
	<p>Other blue-background sections should take the following format:</p>
	<xmp>
		<div class="center vertical_padding blue_background">
			<h3>{SECTION TITLE}</h3>
			<div class="gold_seperator"></div>
			{REST OF SECTION CONTENT}
		</div>
	</xmp>
	
	<p>The only differences are the the blue background div has the blue_background class, uses a gold_seperator as opposed to a regular seperator and uses an h3 tag instead of an h2 tag for the section title (if you look at the styles.css file, the only difference between h3 and h2 is the color). If you want to play around with the design, you can get rid of the center class. That will allow the content in the section to span the entire width of the screen like the core values section of the <a href="about.html#values">about page</a>. Also as you can see in all the section titles, there is a variation in font weight. It's just a design thing. To do that, surround whatever you want to be bold with "strong" tags. For example, the title for the core values section is</p>
	<xmp>
		<h3>Alpha Kappa Psi's <strong>Core Values</strong></h3>
	</xmp>
	
	<div class="seperator"></div> <!-- ------------------------------------------------------------------------ -->
	
	<p>We'll be adding a footer later on but don't worry about that for now. Put all your css in the styles.css file in the css folder. Feel free to experiment and explore and don't worry if anything goes wrong. Look at the about and elevate pages' code if you need help.</p>
	
	
</body>
</html>