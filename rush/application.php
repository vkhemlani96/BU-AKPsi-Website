<?php
include("application_questions.php");
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Application | Alpha Kappa Psi Nu Chapter</title>

		<link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.0/material.indigo-pink.min.css">
		<script src="https://storage.googleapis.com/code.getmdl.io/1.0.0/material.min.js"></script>
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

		<link href="../css/styles.css" rel="stylesheet"/>
		<link href="../css/navbar.css" rel="stylesheet" />
		<script src="../js/jquery.js"></script>
		<script src="../js/jquery.color.js"></script>
		
		<style>
			#rushForm div div.mdl-textfield {
				display:inline-block;
				width:33%;
				text-align:center;
			}
			#rushForm div div.mdl-textfield * {
				width: 95%;
			}
			#rushForm div div.pic {
				display: block;
				width: 100%;
				text-align: left;
			}
			#rushForm div div.pic p {
				width: 33%; 
				text-transform: uppercase;
			}
			#rushForm p {
				font-family: "Open Sans", sans-serif;
				font-size: 16px;
				padding: 4px 0;
				background: 16px;
				color: rgba(0,0,0,.26);
			}
			#rushForm p.description {
				font-family: "Open Sans", sans-serif;
				font-size: 16px;
				color: rgba(0,0,0,1);
			}
			#rushForm div div.pic * {
				width: auto;
				display: inline-block;
			}
			#rushForm textarea {
				width: 100%;
				height: 100px;
				border-color: rgba(0,0,0,.26);
				font-size: 16px;
				margin-bottom: 20px;
			}
			#rushForm .is-invalid label:after {
				background-color:#000033;
			}
			#rushForm > div.hidden {
				display: none
			}
			#rushForm #application_logic label {
				margin: 0 0 20px 20px;
			}
			#rushForm #application_logic label:first-child {
				margin-top:20px;
			}
			#rushForm #application_logic .table_seperator {
				margin-top: 20px;
				margin-bottom: 20px;
			}
			#rushForm #application_logic input {
				margin-top: 20px;
				width: 100%;
				font-family: "Open Sans", sans-serif;
			}
			#rushForm #application_logic .table_seperator {
				opacity: .7;
			}
			#rushForm button[disabled] {
				opacity: .5;
			}
			#countdownClock {
				position: fixed;
				width: 200px;
				height: 50px;
				background-color: #000033;
				border: 1px solid white;
				bottom: 20px;
				left: 50%;
				margin-left: -100px;
			}
			#countdownClock p {
				color: white;
				line-height: 50px;
				text-align: center;
				padding: 0;
			}
		</style>
	</head>

	<body>
		<?php include("../navbar.php"); getNavbar(true); ?>

		<div class="center vertical_padding title_section">
			<h1>Recruitment Application</h1>
			<div class="seperator"></div>
			<h2></h2>
		</div>

		<div class="center">
			
			<div id="description">
				<p class="vertical_padding center description" style="text-align: center">
					Thank you for considering applying to join Alpha Kappa Psi Nu Chapter! This year, our application process consists of both, a written portion and a logical examination. Please be as specific as possible and complete the examination in one sitting with <i>absolute integrity</i>. The application can only be started once and should take no longer than 30 minutes.<br><br> <i>Note: The written portion is untimed. However, the logic examination has a 10-minute time limit and can only be completed once.</i>
				</p>

				<div class="table_seperator" style="width: 66%"></div>
			</div>
			
			
			<form style="margin: 0 auto;" action="application_post.php" id="rushForm" method="post" enctype="multipart/form-data">
			
				<div id="application_start">
				
					<div class="vertical_padding">
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
							<input class="mdl-textfield__input" type="text" id="rushEmail" name="rushEmail"/>
							<label class="mdl-textfield__label" for="sample1">E-Mail (MUST USE @bu.edu)</label>
						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
							<input class="mdl-textfield__input" type="text" id="rushFirstName" name="rushFirstName" />
							<label class="mdl-textfield__label" for="sample1">First Name</label>
						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
							<input class="mdl-textfield__input" type="text" id="rushLastName" name="rushLastName" />
							<label class="mdl-textfield__label" for="sample1">Last Name</label>
						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
							<input class="mdl-textfield__input" type="text" id="rushGrade" name="rushGrade"/>
							<label class="mdl-textfield__label" for="sample1">Grade (eg. Freshman, Sophomore)</label>
						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
							<input class="mdl-textfield__input" type="text" id="rushSchool" name="rushSchool"/>
							<label class="mdl-textfield__label" for="sample1">School(s) (eg. QUESTROM, ENG)</label>
						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
							<input class="mdl-textfield__input" type="text" id="rushMajors" name="rushMajors"/>
							<label class="mdl-textfield__label" for="sample1">Major(s) / Concentration(s)</label>
						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
							<input class="mdl-textfield__input" type="text" id="rushMinors" name="rushMinors"/>
							<label class="mdl-textfield__label" for="sample1">Minors(s)</label>
						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
							<input class="mdl-textfield__input" type="text" id="rushPhone" name="rushPhone"/>
							<label class="mdl-textfield__label" for="sample1">Phone Number</label>
						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
							<input class="mdl-textfield__input" type="text" id="rushAddress" name="rushAddress"/>
							<label class="mdl-textfield__label" for="sample1">Address (Building &amp; Room)</label>
						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
							<input class="mdl-textfield__input" pattern="\d+(\.\d*)?" id="rushGPA" name="rushGPA"/>
							<label class="mdl-textfield__label" for="sample1"style="overflow:initial">Cummulative College GPA (HS GPA for freshman)</label>
						</div>
						<div class="pic">
							<p class="">Please attach a photo of yourself: </p>
							<input type="file" id="rushPic" name="rushPic" style="display:inline-block; width: 66%"/>
						</div>
					</div>

					<div style="text-align:center; margin-bottom: 35px;">
						<button class="button" type="button" onclick="moveToNextPart()" id="beginApp">Begin Written Application</button>
					</div>
					
				</div>
				
				<div id="application_written" class="hidden">
					
					<div class="table_seperator" style="width: 66%"></div>

					<div class="vertical_padding">
						<?
						foreach($appQuestions as $count => $question) {
						?>
						<p><strong><? echo $question[0] ?></strong></p>
						<textarea name="q<? echo $count; ?>" <? if (isset($question["isRequired"]) && !$question["isRequired"]) {echo 'class="notRequired"';}?>></textarea>
						<?
						}
						?>
					</div>

					<div class="table_seperator" style="width: 66%"></div>

					<div class="vertical_padding">
						<p style="color: black; text-align:center"><i><strong>The following questions are optional and will have no affect on your candidacy.</strong></i></p>
						<br><br>

						<?
						foreach($feedbackQuestions as $count => $question) {
						?>
						<p><strong><? echo $question?></strong></p>
						<textarea name="fb<? echo $count; ?>" class="notRequired"></textarea>
						<?
						}
						?>
					</div>

					<div style="text-align:center; margin-bottom: 35px;">
						<button class="button" type="button" onclick="moveToNextPart()">Begin Logic Exam</button>
					</div>

					
				</div>
				
				<div id="application_logic" class="hidden">
				
					<div id="countdownClock">
						<p>Time Left: 10:00</p>
					</div>
					
					<div class="vertical_padding">
						<?
						foreach($logicQuestions as $count => $logic) {
							if (isset($logic['image'])) {
						?>
							<img src="<? echo $logic['image'] ?>" />
						<?
						}
						?>
							<p style="color:black"><strong><? echo $logic['question'] ?></strong></p>
							<div>
						<?
						if (isset($logic['options'])) {
							shuffle($logic['options']);
							foreach($logic['options'] as $option) {	
						?>
							<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-<? echo $option ?>">
								<input type="radio" id="option-<? echo $option ?>" class="mdl-radio__button" name="l<? echo $count ?>" value="<? echo $option ?>">
								<span class="mdl-radio__label"><? echo $option ?></span>
							</label>
							</br>
						<?
							}
						} else if (isset($logic['inputType'])) {
						?>
							<input type="<? echo $logic['inputType'] ?>" id="l<? echo $count ?>" name="l<? echo $count ?>"/>
						<?
						}
						?>
							</div>
							<div class="table_seperator" style="width: 66%"></div>
						<?
						}
						?>
						<input type="hidden" name="time">
					</div>

					<div style="text-align:center; margin-bottom: 35px;">
						<button class="button" type="button" onclick="moveToNextPart()">Submit Exam</button>
					</div>

					
				</div>

			
<!--			
					<div style="text-align:center; margin-bottom: 35px;">
						<button class="button" type="button" id="formSubmit" name="formSubmit">Begin Written Application</button>
					</div>-->

			</form>

		</div>

		<?php getFooter(); ?>

		<script>
			
			var appIndex = 0;
			var totalTime = 10 * 60;
			var timeLeft = totalTime;
			var interval = null;
			function moveToNextPart() {
				if (appIndex == 0) {
					
					if (checkBasicDetails()) {

						if ($("#rushEmail").val().trim().indexOf("@bu.edu", this.length - "@bu.edu".length) == -1 || $("#rushEmail").val().length > 15) {
							alert("Please use your BU email");
							return;
						}
						
						appIndex = 1;
						$("#description").addClass("hidden")
						$("#application_start").addClass("hidden")
						$("#application_written").removeClass("hidden")
						window.scrollTo(0,0);
						
						if (!($("#rushEmail").val().toLowerCase() in Rushes)) {
							$.ajax({
								type: "POST",
								url: "signup.php",
								data: {
									rushFirstName: $("#rushFirstName").val(),
									rushLastName: $("#rushLastName").val(),
									rushEmail: $("#rushEmail").val(),
									rushPhone: $("#rushPhone").val(),
									rushMajors: $("#rushMajors").val(),
									rushMinors: $("#rushMinors").val(),
									rushSchool: $("#rushSchool").val(),
									rushGrade: $("#rushGrade").val(),
									rushChannel: 'Application' // various ways to store the ID, you can choose
								},
								success: function(data) {
								  // POST was successful - do something with the response
								},
								error: function(data) {
								  // Server error, e.g. 404, 500, error
								}
							});
						}

					} else {
						if( document.getElementById("rushPic").files.length == 0 ){
							alert("Please include a picture of yourself with your application.");
							return;
						}
						alert("Please fill all required fields.");
					}
					
				} else if (appIndex == 1) {
					
					if (!checkTextareas()) {
						alert("Please answer all required questions.");
						return
					}
					
					if (confirm("The following portion of the application has a 10 minute time limit and must be completed in one sitting. Press 'OK' to begin.")) {
						appIndex = 2;
						interval = setInterval(countdownTime, 1000)
						$("#application_written").addClass("hidden")
						$("#application_logic").removeClass("hidden")
						window.scrollTo(0,0);
						
						$.ajax({
								type: "POST",
								url: "startedLogic.php",
								data: {
									email: $("#rushEmail").val(),
								},
								success: function(data) {
								  // POST was successful - do something with the response
								},
								error: function(data) {
								  // Server error, e.g. 404, 500, error
								}
							});
					}
					
				} else if (appIndex == 2) {
					
					clearInterval(interval)
					
					if (confirm("Are you sure you want to submit your application?")) {
						$("input[name=time]").val((totalTime - timeLeft).toString())
						$("#rushForm").submit();
					} else {
						interval = setInterval(countdownTime, 1000)
					}
				}
			}

			function checkBasicDetails() {
				// get all the inputs within the submitted form
				var inputs = document.getElementById("rushForm").getElementsByTagName('input');
				for (var i = 0; i < inputs.length; i++) {
					// only validate the inputs that have the required attribute
					if(inputs[i].name.indexOf("rush") > -1 && inputs[i].value == ""){
						// found an empty field that is required
						return false;
					}
				}
				return true;
			}
			
			function checkTextareas() {
				var inputs = document.getElementById("rushForm").getElementsByTagName('textarea');
				for (var i = 0; i < inputs.length; i++) {
					// only validate the inputs that have the required attribute
					if(inputs[i].className != "notRequired" && inputs[i].value == "" && inputs[i].name != "q9_second"){
						// found an empty field that is required
						console.log("textarea" + i);
						return false;
					}
				}
				return true
			}
			
			var textElement = $("#countdownClock > p")
			function countdownTime() {
				timeLeft--;
				if (timeLeft % 60 < 10) {
					textElement.text("Time Left: " + Math.floor(timeLeft / 60) + ":0" + (timeLeft % 60))
				} else {
					textElement.text("Time Left: " + Math.floor(timeLeft / 60) + ":" + (timeLeft % 60))
				}
				if (timeLeft == 0)
					clearInterval(interval)
			}

			var Rushes = {};
			var RushInfo;

			<?php 
			include("../db/credentials.php");

			// Create connection
			$con = new mysqli($hostname, $username, $password, $dbname);
			// Check connection
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

			$result = mysqli_query($con,"SELECT * FROM $rushTable");

			while($row = mysqli_fetch_array($result)) {

				echo "\nRushInfo = {};\n"
					. "RushInfo['FirstName'] = '" . trim(str_replace("'","",$row['FirstName'])) . "';\n"
					. "RushInfo['LastName'] = '" . trim(str_replace("'","",$row['LastName'])) . "';\n"
					. "RushInfo['Email'] = '" . strtolower(trim(str_replace("'","",$row['Email']))) . "';\n"
					. "RushInfo['Phone'] = '" . trim(str_replace("'","",$row['Phone'])) . "';\n"
					. "RushInfo['Majors'] = '" . trim(str_replace("'","",$row['Majors'])) . "';\n"
					. "RushInfo['Minors'] = '" . trim(str_replace("'","",$row['Minors'])) . "';\n"
					. "RushInfo['MajorSchools'] = '" . trim(str_replace("'","",$row['MajorSchools'])) . "';\n"
					. "RushInfo['Grade'] = '" . trim(str_replace("'","",$row['Grade'])) . "';\n"
					. "RushInfo['AppSubmitted'] = '" . trim(str_replace("'","",$row['AppSubmitted'])) . "';\n"
					. "RushInfo['StartedLogic'] = '" . trim(str_replace("'","",$row['StartedLogic'])) . "';\n"
					. "Rushes['" . trim(str_replace("'","",$row['Email'])) . "'] = RushInfo;";
			}
			?>

			$('input#rushEmail').on('keyup', function(e) {
				lastChar = e.which;
				if (lastChar == 50) {
					var email = $(this).val() + "bu.edu";

					$(this).val(email);

					if ($(this).val().toLowerCase() in Rushes) {

						var rushesInfo = Rushes[email];
						$("input#rushFirstName").val(rushesInfo['FirstName']).parent().addClass("is-dirty");
						$("input#rushLastName").val(rushesInfo['LastName']).parent().addClass("is-dirty");
						$("input#rushPhone").val(rushesInfo['Phone']).parent().addClass("is-dirty");
						$("input#rushMajors").val(rushesInfo['Majors']).parent().addClass("is-dirty");
						$("input#rushMinors").val(rushesInfo['Majors']).parent().addClass("is-dirty");
						$("input#rushSchool").val(rushesInfo['MajorSchools']).parent().addClass("is-dirty");
						$("input#rushGrade").val(rushesInfo['Grade']).parent().addClass("is-dirty");
						console.log(rushesInfo['AppSubmitted'])
						
						if (rushesInfo['AppSubmitted'] === "1") {
							setTimeout(function() {
								alert("Our records indicate that you've already submitted your application. If you need to make changes or believe there is an error, please email akpsi.nu.recruitment@gmail.com.")
								$("#beginApp").prop("disabled",true);
								return;
							}, 200)
						} else if (rushesInfo['StartedLogic'] === "1") {
							setTimeout(function() {
								alert("Our records indicate that you've already started this application once. If you need to make changes or believe there is an error, please email akpsi.nu.recruitment@gmail.com.")
								$("#beginApp").prop("disabled",true);
								return;
							}, 200)
						}
						
						$("input#rushAddress").focus();
					} else {
						$("input#rushFirstName").focus();
					}

					//					if ($(this).val().indexOf("@bu.edu") > 0) {
					//						$(this).val($(this).val().substring(0,$(this).val().indexOf("@bu.edu")+7));
					//					}
				}
			});

			$("textarea").focus(function() {
				$( this ).prev().css( "color", "#000033" );
			});
			$("#rushPic").focus(function() {
				$( this ).prev().css( "color", "#000033" );
			});

		</script>

	</body>
</html>