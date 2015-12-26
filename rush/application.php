<?php
//ini_set('display_errors', 1);
//
////foreach ($_POST as $key => $value)
//// echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
////echo $_POST["rushEmail"];
//
//foreach( $_POST as $stuff ) {
//    if( is_array( $stuff ) ) {
//        foreach( $stuff as $thing ) {
//            echo $thing;
//        }
//    } else {
//        echo $stuff;
//    }
//}
//
//if (isset($_POST["rushEmail"]) && isset($_POST["gpa"]) && isset($_POST['q1_why'])  && isset($_POST['q2_words'])  && isset($_POST['q3_excite']) && isset($_POST['q4_orgs']) && isset($_POST['q5_work']) && isset($_POST['q6_goals']) && isset($_POST['q7_bro']) && isset($_POST['q8_brohood']) && isset($_POST['q9_second']) && isset($_POST['q10_hear']) && isset($_POST['q11_improve']) ) {
//	
//include("db_credentials.php");
//	
////	gpa
////q1_why
////q2_words
////q3_excite
////q4_orgs
////q5_work
////q6_goals
////
////q7_bro
////q8_brohood
////q9_second
////q10_hear
////q11_improve
//
//	// Create connection
//	$conn = new mysqli($hostname, $username, $password, $dbname);
//	// Check connection
//	if ($conn->connect_error) {
//		die("Connection failed: " . $conn->connect_error);
//	} 
//
//	$sql = "INSERT INTO rushFall2015Apps (rushEmail, rushGPA, q1_why, q2_words, q3_excite, q4_orgs, q5_work, q6_goals, q7_bro, q8_brohood, q9_second, q10_hear, q11_improve)
//	VALUES ('" . $_POST["rushEmail"] . "', '" . $_POST["gpa"] . "', '" . $_POST["q1_why"] . "', '" . $_POST["q2_words"] . "', '" . $_POST["q3_excite"] . "', '" . $_POST["q4_orgs"] . "', '" . $_POST["q5_work"] . "', '" . $_POST["q6_goals"] . "', '" . $_POST["q7_bro"] . "', '" . $_POST["q8_brohood"] . "', '" . $_POST["q9_second"] . "', '" . $_POST["q10_hear"] . "', '" . $_POST["q11_improve"] . "')";
//
//	if ($conn->query($sql) === TRUE) {
//		echo "New record created successfully";
//	} else {
////		echo "Error: " . $sql . "<br>" . $conn->error;
//		if (strpos($conn->error,'Duplicate') !== false) {
//			die('THIS USER ALREADY EXISTS');
//		}
//	}
//
//	$conn->close();
//}
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
</head>

<body>
	<?php include("../navbar.php"); getNavbar(true); ?>
	
	<div class="center vertical_padding title_section">
		<h1>Recruitment Application</h1>
		<div class="seperator"></div>
		<h2></h2>
	</div>
	
	<div class="center">
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
		</style>
		<form style="margin: 0 auto;" action="application_post.php" id="rushForm" method="post"  enctype="multipart/form-data">
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
					<input class="mdl-textfield__input" type="text" id="rushPhone" name="rushPhone"/>
					<label class="mdl-textfield__label" for="sample1">Phone Number</label>
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
					<input class="mdl-textfield__input" type="number" pattern="\d+(\.\d*)?"  id="gpa" name="gpa"/>
					<label class="mdl-textfield__label" for="sample1"style="overflow:initial">Cummulative College GPA (HS GPA for freshman)</label>
				</div>
				<div class="pic">
					<p class="">Please attach a photo of yourself: </p>
					<input type="file" id="rushPic" name="rushPic" style="display:inline-block; width: 66%"/>
				</div>
			</div>
			
			<div class="table_seperator" style="width: 66%"></div>
			
			<div class="vertical_padding">
				<p><strong>Why should Alpha Kappa Psi select you?</strong></p>
				<textarea name="q1_why"></textarea>
				<p><strong>What are three words that describe you?</strong></p>
				<textarea name="q2_words"></textarea>
				<p><strong>What excites you about your major?</strong></p>
				<textarea name="q3_excite"></textarea>
				<p><strong>What organizations are you involved with or planning on involving yourself with on campus?</strong></p>
				<textarea name="q4_orgs"></textarea>
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
			</div>
			
			<div class="table_seperator" style="width: 66%"></div>
			
			<div class="vertical_padding">
				<p style="color: black; text-align:center"><i><strong>The following questions will have no affect on your candidacy.</strong></i></p>
				<br><br>
				<p><strong>How did you hear about Alpha Kappa Psi's recruitment process?</strong></p>
				<textarea name="q10_hear"></textarea>
				<p><strong>What did you think of the recruitment events you attended? How do you think they could be improved?</strong></p>
				<textarea name="q11_improve"></textarea>
			</div>
			
			<div style="text-align:center; margin-bottom: 35px;">
				<button class="button" type="button" id="formSubmit" name="formSubmit">SUBMIT</button>
			</div>
			
			
		</form>
		
	</div>
	
	<?php getFooter(); ?>
	
	<script>
		
	function checkform() {
		// get all the inputs within the submitted form
		var inputs = document.getElementById("rushForm").getElementsByTagName('input');
		for (var i = 0; i < inputs.length; i++) {
			// only validate the inputs that have the required attribute
			if(inputs[i].value == ""){
				// found an empty field that is required
				return false;
			}
		}
		inputs = document.getElementById("rushForm").getElementsByTagName('textarea');
		for (var i = 0; i < inputs.length; i++) {
			// only validate the inputs that have the required attribute
			if(inputs[i].value == "" && inputs[i].name != "q9_second"){
				// found an empty field that is required
				return false;
			}
		}
		return true;
	}
		
		$("#formSubmit").click(function() {
			if (checkform()) {

				if ($("#rushEmail").val().trim().indexOf("@bu.edu", this.length - "@bu.edu".length) == -1 || $("#rushEmail").val().length > 15) {
					alert("Please use your BU email");
					return;
				}

				$("#rushForm").submit();
			} else {
				if( document.getElementById("rushPic").files.length == 0 ){
					alert("Please include a picture of yourself with your application.");
					return;
				}
				alert("Please fill all required fields.");
			}
		});
		
		
		var Rushes = new Array();

		<?php 
			include("../manage_db/db_credentials.php");

			// Create connection
			$con = new mysqli($hostname, $username, $password, $dbname);
			// Check connection
			if (mysqli_connect_errno())
			{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

			$result = mysqli_query($con,"SELECT * FROM rushFall2015");

			while($row = mysqli_fetch_array($result)) {
				echo "var RushInfo = new Array();"
					. "RushInfo['FirstName'] = '" . str_replace("'","",$row['FirstName']) . "';\n"
					. "RushInfo['LastName'] = '" . str_replace("'","",$row['LastName']) . "';\n"
					. "RushInfo['Email'] = '" . str_replace("'","",$row['Email']) . "';\n"
					. "RushInfo['Phone'] = '" . str_replace("'","",$row['Phone']) . "';\n"
					. "RushInfo['Majors'] = '" . str_replace("'","",$row['Majors']) . "';\n"
					. "RushInfo['MajorSchools'] = '" . str_replace("'","",$row['MajorSchools']) . "';\n"
					. "RushInfo['Grade'] = '" . str_replace("'","",$row['Grade']) . "';\n"
					. "Rushes['" . str_replace("'","",$row['Email']) . "'] = RushInfo;\n";
			}
		?>
	
		$('input#rushEmail').on('keyup', function(e) {
	//		alert($.inArray(Rushes, $(this).val() + "bu.edu"))
			if ( $(this).val().indexOf("@") == $(this).val().length-1 && $.inArray(Rushes, $(this).val() + "bu.edu")) {
				var rushesInfo = Rushes[$(this).val() + "bu.edu"];
				$(this).val($(this).val() + "bu.edu");
				$("input#rushFirstName").val(rushesInfo['FirstName']).parent().addClass("is-dirty");
				$("input#rushLastName").val(rushesInfo['LastName']).parent().addClass("is-dirty");
				$("input#rushPhone").val(rushesInfo['Phone']).parent().addClass("is-dirty");
				$("input#rushMajors").val(rushesInfo['Majors']).parent().addClass("is-dirty");
				$("input#rushSchool").val(rushesInfo['MajorSchools']).parent().addClass("is-dirty");
				$("input#rushGrade").val(rushesInfo['Grade']).parent().addClass("is-dirty");
			}
			if ($(this).val().indexOf("@bu.edu") > 0) {
				$(this).val($(this).val().substring(0,$(this).val().indexOf("@bu.edu")+7));
			}
		});
		
		$("textarea").click(function() {
			console.log("fskldmfd");
			$( this ).prev().css( "color", "#000033" );
		});
		$("#rushPic").click(function() {
			console.log("fskldmfd");
			$( this ).prev().css( "color", "#000033" );
		});
		
	</script>
	
</body>
</html>