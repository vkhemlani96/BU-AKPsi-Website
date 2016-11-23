<?php

ini_set('display_errors', 1);

include("../../db/credentials.php");
include("password_protect.php");
$usertable="brothers";
$eyetable="eye2eye";

$link = mysqli_connect($hostname,$username, $password) or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please try again later.')</script></html>");
mysqli_select_db($link, $dbname);

$query = "SELECT $usertable.email, firstName, lastName
    FROM $usertable
    JOIN $eyetable
    ON $usertable.email = $eyetable.email
	WHERE $eyetable.position LIKE '%Research%'
	ORDER BY lastName";

$result = mysqli_query($link, $query);
?>


<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Article Upload | Alpha Kappa Psi Nu Chapter</title>
		<link href="../../css/styles.css" rel="stylesheet"/>
		<link href="../../css/navbar.css" rel="stylesheet" />
		<link href="../../css/eye2eye_override.css" rel="stylesheet"/>
		<script src="../../js/tinymce/tinymce.min.js"></script>
		<script src="../../js/jquery.js"></script>
		<script>
			tinymce.init({
				selector:'#articleBody',
				height: 500,
				plugins: [
					'anchor autolink lists link nonbreaking paste lists wordcount spellchecker jbimages',
				],
				toolbar: 'insertfile undo redo | bold italic superscript | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image'
			});

			function generateFootnoteFields() {
				$("#footnoteMsg").css("display", "block");
				var footnoteCount = $("#footnotesCount").val();
				$( ".footnoteTextContainer" ).remove();
				for (var i = 1; i <= footnoteCount; i++) {
					$("#footnotes").append('<p class="footnoteTextContainer">'+i+': <input class="footnoteText"></p>')
				}
			}

			function submitArticle() {
				var footnotes = $.map($(".footnoteText"),
									  function(e) {return $(e).val()}
									 );
				if ($("#articleAuthor").val() == "") {
					alert("Please choose an author to continue.");
					return;
				}
				if ($("#articleTitle").val() == "") {
					alert("Please enter a title to continue.");
					return;
				}
				if (tinyMCE.activeEditor.getContent() == "") {
					alert("LOL wtf enter paste the article in.");
					return;
				}
				if (footnotes.length == 0) {
					if (!confirm("Are you sure you have no footnotes?")) {
						return;
					}
				} else if (footnotes.includes("") ) {
					if (!confirm("You have blank footnotes. Do you want to continue?")) {
						return;
					}
				}
				$("#articleFootnotes").val(JSON.stringify(footnotes));
				$("#articleForm").submit();
			}
		</script>
		<style>
			.blogEntry p {
				min-width: 700px;
			}
			.blogEntry input, .blogEntry select {
				margin: 0 10px;
				font-size: 16px;
				height: 20px;
				width: inherit;
			}
			.blogEntry #footnoteMsg {
				display: none;
			}
			.blogEntry .footnoteText {
				width: 800px;
			}
			.blogEntry > ul li {
				list-style: disc;
				margin-left: 40px;
			}
			.blogEntry > .table_seperator {
				margin: 20px auto 60px;
			}
		</style>
	</head>

	<body>
		<?php include("../../navbar.php"); getNavbar(true); ?>

		<div class="vertical_padding title_section">
			<h1>Article Upload</h1>
			<div class="seperator"></div>
			<h2>Eye2Eye</h2>
		</div>

		<div class="vertical_padding center blogEntry">
			<p>
				Use this page to upload your articles to the the blog. <i>It is recommended that you type up your article in Google Drive and paste it in here when you're read to upload.</i> Please pay attention to the following things:<br><br>
			</p>
			<ul>
				<li><p>Please make sure you select the correct author for the article. If you are not listed, submit your article as someone else and text Vinay.</p></li>
				<li><p><strong>Footnote superscripts will not copy over from Google Docs.</strong> Please go through your articles and add the numbers to where your footnotes should go <strong>and use the superscript button (next to bold/italic) to raise them</strong>.</p></li>
				<li><p><strong>Inserting images:</strong> Click on <i>Insert > Upload image</i> within the textfield to upload an image. Please try to resize the image so that the width is &lt;= 800px (pretty much should fit in the box).</p></li>
				<li><p><strong>Do not just paste your footnotes at the bottom of the article.</strong> Use the field below the article field to mention how many footnotes you have and then paste in one footnote in each field that appears.</p></li>
				<li><p>Let Vinay know if something doesn't work or if you have any feedback!</p></li>
			</ul>
			
			<div class="table_seperator"></div>

			<form method="post" action="article_upload.php" id="articleForm">
				<p style="margin-bottom: 20px;">
					Author Name:
					<select style="margin-left:10px;" name="articleAuthor" id="articleAuthor">
						<option value=""></option>
						<? while ($obj = mysqli_fetch_object($result)) { ?>
						<option value="<? echo $obj->email ?>"><? echo ($obj->firstName . " " . $obj->lastName) ?></option>
						<? } ?>
					</select>
				</p>

				<p style="margin-bottom: 20px;">
					Title:
					<input style="width: 500px;" name="articleTitle" id="articleTitle">
				</p>

				<textarea name="articleBody" id="articleBody"></textarea>
				<input type="hidden" name="articleFootnotes" id="articleFootnotes">
			</form>
			
			
			<div id="footnotes" class="vertical_padding">
				<p>
					How many footnotes do you have: 
					<input type="number" id="footnotesCount">
					<button type="submit" onclick="generateFootnoteFields()">Enter Footnotes</button>
				</p>
				<p id="footnoteMsg">Enter your footnotes below (don't enter the number before the footnote):</p>
			</div>
			<button type="submit" onclick="submitArticle()">Submit</button>
		</div>

	</body>
</html>