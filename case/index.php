<!DOCTYPE html>
<html lang="en">

<head>
	<title>AKPSI Case Competition Registration Form | Alpha Kappa Psi Nu Chapter</title>
	
	<link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.0/material.indigo-pink.min.css">
	<script src="https://storage.googleapis.com/code.getmdl.io/1.0.0/material.min.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	
	<link href="../css/styles.css" rel="stylesheet"/>
	<link href="../css/navbar.css" rel="stylesheet" />
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.color.js"></script>
</head>

<body>
	<?php include("../navbar.php"); getNavbar(true); ?>
	
	<div class="center vertical_padding title_section">
		<h1>4th Annual Case Competition</h1>
		<div class="seperator"></div>
		<h2></h2>
	</div>
	
	<div class="center">
		<style>
			#Form div.mdl-textfield {
				display:inline-block;
				width:24%;
				text-align:center;
			}
			#Form .main div.mdl-textfield {
				width:33% !important;
			}
			#Form div div.mdl-textfield * {
				width: 95%;
			}
			#Form div div.pic {
				display: block;
				width: 100%;
				text-align: left;
			}
			#Form div div.pic p {
				width: 33%; 
				text-transform: uppercase;
			}
			#Form p {
				font-family: "Open Sans", sans-serif;
				font-size: 16px;
				padding: 4px 0;
				background: 16px;
    			color: rgba(0,0,0,1);
			}
			#Form div div.pic * {
				width: auto;
				display: inline-block;
			}
			#Form textarea {
				width: 100%;
				height: 100px;
    			border-color: rgba(0,0,0,.26);
				font-size: 16px;
				margin-bottom: 20px;
			}
			#Form .is-invalid label:after {
				background-color:#000033;
			}
		</style>
		<form style="margin: 0 auto;" action="post.php" id="Form" method="post" enctype="multipart/form-data">
			<div class="vertical_padding">
			
				<div class="main">
			
				<p><b>Main Team Contact</b></p>
				
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
						<input class="mdl-textfield__input" type="text" id="TeamName" name="teamName" />
						<label class="mdl-textfield__label" for="sample1">Team Name</label>
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
						<input class="mdl-textfield__input" type="text" id="Name" name="name" />
						<label class="mdl-textfield__label" for="sample1">Name</label>
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
						<input class="mdl-textfield__input" type="text" id="Email" name="email"/>
						<label class="mdl-textfield__label" for="sample1">E-Mail</label>
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
						<input class="mdl-textfield__input" type="text" id="Grade" name="year"/>
						<label class="mdl-textfield__label" for="sample1">Graduation Year</label>
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
						<input class="mdl-textfield__input" type="text" id="School" name="school"/>
						<label class="mdl-textfield__label" for="sample1">School within BU/University</label>
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
						<input class="mdl-textfield__input" type="text" id="Major" name="major"/>
						<label class="mdl-textfield__label" for="sample1">Major</label>
					</div>
				
				</div>
			
				<p><b>Team Member #2</b></p>
				
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
					<input class="mdl-textfield__input" type="text" id="Name" name="name1" />
					<label class="mdl-textfield__label" for="sample1">Name</label>
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
					<input class="mdl-textfield__input" type="text" id="Grade" name="year1"/>
					<label class="mdl-textfield__label" for="sample1">Graduation Year</label>
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
					<input class="mdl-textfield__input" type="text" id="School" name="school1"/>
					<label class="mdl-textfield__label" for="sample1">School within BU/University</label>
				</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
					<input class="mdl-textfield__input" type="text" id="Major" name="major1"/>
					<label class="mdl-textfield__label" for="sample1">Major</label>
				</div>
			
				<p><b>Team Member #3</b></p>
				
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
					<input class="mdl-textfield__input" type="text" id="Name" name="name2" />
					<label class="mdl-textfield__label" for="sample1">Name</label>
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
					<input class="mdl-textfield__input" type="text" id="Grade" name="year2"/>
					<label class="mdl-textfield__label" for="sample1">Graduation Year</label>
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
					<input class="mdl-textfield__input" type="text" id="School" name="school2"/>
					<label class="mdl-textfield__label" for="sample1">School within BU/University</label>
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
					<input class="mdl-textfield__input" type="text" id="Major" name="major2"/>
					<label class="mdl-textfield__label" for="sample1">Major</label>
				</div>
			
				<p><b>Team Member #4</b></p>
				
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
					<input class="mdl-textfield__input" type="text" id="Name" name="name3" />
					<label class="mdl-textfield__label" for="sample1">Name</label>
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
					<input class="mdl-textfield__input" type="text" id="Grade" name="year3"/>
					<label class="mdl-textfield__label" for="sample1">Graduation Year</label>
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
					<input class="mdl-textfield__input" type="text" id="School" name="school3"/>
					<label class="mdl-textfield__label" for="sample1">School within BU/University</label>
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
					<input class="mdl-textfield__input" type="text" id="Major" name="major3"/>
					<label class="mdl-textfield__label" for="sample1">Major</label>
				</div>
			</div>
			
<!--			<div class="table_seperator" style="width: 66%"></div>-->
			
<!--
			<div class="vertical_padding">
				<p><strong>Why have you applied for the competition? (Max 650 Characters)</strong></p>
				<textarea name="q1" maxlength="650"></textarea>
-->
<!--
				<p><strong>Give 3 reasons why global consulting firm YSC is requesting help from students from Boston University & Newcastle University (Max 2,200 Characters)</strong></p>
				<textarea name="q2" maxlength="2200"></textarea>
-->
<!--
				<p><strong>How would winning this competition help you? (Max 700 Characters)</strong></p>
				<textarea name="q2" maxlength="700"></textarea>
				<p><strong>Have you ever worked in a culturally diverse team? If yes, did you work effectively? If not, why would you like to work in a culturally diverse team? (Max 1,000 Characters)</strong></p>
				<textarea name="q3" maxlength="1000"></textarea>
-->
<!--
				<p><strong>What is your most notable work experience?</strong></p>
				<textarea name="q5_work"></textarea>
				<p><strong>What are your goals for the next few years of college/post-college?</strong></p>
				<textarea name="q6_goals"></textarea>
				<p><strong>Please list two notable interactions you had with brothers throughout the recruitment process:</strong></p>
				<textarea name="q7_bro"></textarea>
				<p><strong>What does brotherhood mean to you?</strong></p>
				<textarea name="q8_brohood"></textarea>
				<p><strong><i>If this is not your first time applying</i>, what have you done to strengthen your candidacy?</strong></p>
				<textarea name="q9_second" class="notRequired"></textarea>
-->
<!--
			</div>
			<div class="pic">
				<p class="">Please attach your resume: </p>
				<input type="file" id="Resume" name="Resume" style="display:inline-block; width: 66%"/>
			</div>
-->
	
			<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-2">
  				<input type="checkbox" id="checkbox-2" class="mdl-checkbox__input">
				<span class="mdl-checkbox__label">Click to acknowledge: Only teams that hand in a cash or check for the $50 team deposit will be properly registered for the competition. This deposit is to ensure each registered team's participation. Deposits will be maintained by Alpha Kappa Psi professional fraternity and will be returned upon successful completion of the competition day.</span>
			</label>
		
			<div style="text-align:center; margin: 80px 0;">
				<button class="button" type="button" id="formSubmit" name="formSubmit">SUBMIT</button>
			</div>
			
		</form>
		
	</div>
	
	<?php getFooter(); ?>
	
	<script>
		
		function checkform() {
			// get all the inputs within the submitted form
			var inputs = document.getElementById("Form").getElementsByTagName('input');
			for (var i = 0; i < 14; i++) {
				// only validate the inputs that have the required attribute
				if(inputs[i].value == ""){
					alert(inputs[i].id);
					// found an empty field that is required
					return false;
				}
			}
			return true;
		}
		
		$("#formSubmit").click(function() {
			if (!checkform()) {
				alert("Please fill out all fields.");
				return;
			} else {
				if (!$("#checkbox-2").is(':checked')) {
					alert("Please acknowledge the agreement stated above.");
					return;
				} else {
					$("#Form").submit();
				}
			}
		});
		
//		
//		$("#formSubmit").click(function() {
//			if (checkform()) {
//
//				if ($("#Email").val().trim().indexOf("@bu.edu", this.length - "@bu.edu".length) == -1 || $("#Email").val().length > 15) {
//					alert("Please use your BU email");
//					return;
//				}
//
//				$("#Form").submit();
//			} else {
//				if( document.getElementById("Resume").files.length == 0 ){
//					alert("Please include a copy of your resume with your application.");
//					return;
//				}
//				alert("Please fill all required fields.");
//			}
//		});
		
//		
//		$("textarea").click(function() {
//			$( this ).prev().css( "color", "#000033" );
//		});
//		$("#Resume").click(function() {
//			$( this ).prev().css( "color", "#000033" );
//		});
		
	</script>
	
</body>
</html>