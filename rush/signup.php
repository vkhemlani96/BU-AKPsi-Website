<?php

// TODO - Thank you page for non-tabling sources?

//foreach ($_POST as $key => $value)
// echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";

if (isset($_POST["rushFirstName"]) && isset($_POST["rushLastName"]) && isset($_POST['rushEmail'])  && isset($_POST['rushPhone'])  && isset($_POST['rushMajors'])  && isset($_POST['rushSchool']) && isset($_POST['rushGrade']) ) {
	$_POST['rushSchool'] = join(", ", $_POST['rushSchool']);

	include("../db/credentials.php");

	// Create connection
	$conn = new mysqli($hostname, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO $rushTable (FirstName, LastName, Email, Phone, Majors, Minors, MajorSchools, Grade, Channel)
	VALUES ('" . $_POST["rushFirstName"] . "', '" . $_POST["rushLastName"] . "', '" . $_POST["rushEmail"] . "', '" . $_POST["rushPhone"] . "', '" . $_POST["rushMajors"] . "', '" . $_POST["rushMinors"] . "', '" . $_POST["rushSchool"] . "', '" . $_POST["rushGrade"] . "', '" . $_POST["rushChannel"] . "')";

	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		//		echo "Error: " . $sql . "<br>" . $conn->error;
		if (strpos($conn->error,'Duplicate') !== false) {
			die('THIS USER ALREADY EXISTS');
		}
	}

	$conn->close();
}

//if (!isset($_GET["src"]) || $_GET["src"] == "" ) {
//			die('NO SRC PROVIDED');
//}

$src = $_GET["source"];
$title = $link = "";

switch ($src) {
	case "fb":
		$title = "Facebook";
		$link = "ipJZqnRGhmk5Cc0WWZYt8FqKAOndMUy6Ikl";
		break;
	case "tabling":
		$title = "Questrom Atrium Tabling";
		$link = "YpuMXBn4tprqfWRCZDJsMcYZ8DW4kLG25Zu";
		break;
	case "web":
		$title = "Website";
		$link = "ZL8PEOa1bfTTJDkKRrZjs8VXsZeBec4JQUx";
		break;
	case "splash":
		$title = "Splash";
		$link = "xAmSFqwEN8ym1HQy1xdhnyQ09lep8vqX30M";
		break;
	case "gsu":
		$title = "GSU Tabling";
		$link = "xAmSFqwEN8ym1HQy1xdhnyQ09lep8vqX30M";
		break;
	default:
		die('NO SRC PROVIDED
		<p><a href="http://www.buakpsi.com/rush/signup.php?source=splash">SPLASH</a></p>
		<p><a href="http://www.buakpsi.com/rush/signup.php?source=fb">Facebook</a></p>
		<p><a href="http://www.buakpsi.com/rush/signup.php?source=tabling">Tabling</a></p>
		<p><a href="http://www.buakpsi.com/rush/signup.php?source=web">Website</a></p>
		<p><a href="http://www.buakpsi.com/rush/signup.php?source=gsu">GSU Tabling</a></p>');
}

//echo $title;

?>


<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Recruitment Sign Up | Alpha Kappa Psi Nu Chapter</title>

		<link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.0/material.indigo-pink.min.css">
		<script src="https://storage.googleapis.com/code.getmdl.io/1.0.0/material.min.js"></script>
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

		<link href="../css/styles.css" rel="stylesheet"/>
		<link href="../css/navbar.css" rel="stylesheet" />
		<link href="../css/material_modify.css" rel="stylesheet" />
		<script src="../js/jquery.js"></script>
		<script src="../js/jquery.color.js"></script>
		<style>
			
		</style>
	</head>

	<body>
		<?php include("../navbar.php"); getNavbar(true); ?>

		<div class="center vertical_padding title_section">
			<h1>Recruitment Sign-Up</h1>
			<div class="seperator"></div>
			<h2><?php echo $title ?></h2>
		</div>

		<div class="vertical_padding center rushForm">
			<form style="text-align:center; width: 60%; margin: 0 auto;" action="signup.php?source=<?php echo $src; ?>" id="rushForm" method="post">
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo" style="display:none">
					<input class="mdl-textfield__input" type="text" id="rushChannel" name="rushChannel" hidden="hidden" value="<?php echo $title; ?>" />
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
					<input class="mdl-textfield__input" type="text" id="rushEmail" name="rushEmail"/>
					<label class="mdl-textfield__label" for="sample1">E-Mail (@bu.edu)</label>
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
					<input class="mdl-textfield__input" type="text" id="rushPhone" name="rushPhone"/>
					<label class="mdl-textfield__label" for="sample1">Phone Number</label>
				</div>
				<!--
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
<input class="mdl-textfield__input" type="text" id="rushGrade" name="rushGrade"/>
<label class="mdl-textfield__label" for="sample1">Grade (eg. Freshman, Sophomore)</label>
</div>
-->

				<table class="rush_grade">
					<tr>
						<td><p>Grade:</p></td>
						<td>
							<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-freshman">
								<input type="radio" id="option-freshman" class="mdl-radio__button" name="rushGrade" value="Freshman">
								<span class="mdl-radio__label">Freshman</span>
							</label>
							<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-sophomore">
								<input type="radio" id="option-sophomore" class="mdl-radio__button" name="rushGrade" value="Sophomore">
								<span class="mdl-radio__label">Sophomore</span>
							</label>
							<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-junior">
								<input type="radio" id="option-junior" class="mdl-radio__button" name="rushGrade" value="Junior">
								<span class="mdl-radio__label">Junior</span>
							</label>
							<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-senior">
								<input type="radio" id="option-senior" class="mdl-radio__button" name="rushGrade" value="Senior">
								<span class="mdl-radio__label">Senior</span>
							</label>
						</td>
					</tr>
				</table>

				<table class="rush_schools">
					<tr>
						<td rowspan="2"><p>School(s):</p></td>
						<td>
							<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-qst">
								<input type="checkbox" id="checkbox-qst" name="rushSchool[]" value="QST" class="mdl-checkbox__input" >
								<span class="mdl-checkbox__label">QST</span>
							</label>
						</td>
						<td>
							<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-cas">
								<input type="checkbox" id="checkbox-cas" name="rushSchool[]" value="CAS" class="mdl-checkbox__input" >
								<span class="mdl-checkbox__label">CAS</span>
							</label>
						</td>
						<td>
							<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-sha">
								<input type="checkbox" id="checkbox-sha" name="rushSchool[]" value="SHA" class="mdl-checkbox__input" >
								<span class="mdl-checkbox__label">SHA</span>
							</label>
						</td>
						<td>
							<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-com">
								<input type="checkbox" id="checkbox-com" name="rushSchool[]" value="COM" class="mdl-checkbox__input" >
								<span class="mdl-checkbox__label">COM</span>
							</label>
						</td>
						<td>
							<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-eng">
								<input type="checkbox" id="checkbox-eng" name="rushSchool[]" value="ENG" class="mdl-checkbox__input" >
								<span class="mdl-checkbox__label">ENG</span>
							</label>
						</td>
					</tr>
					<tr>
						<td>
							<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-cfa">
								<input type="checkbox" id="checkbox-cfa" name="rushSchool[]" value="CFA" class="mdl-checkbox__input" >
								<span class="mdl-checkbox__label">CFA</span>
							</label>
						</td>
						<td>
							<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-cgs">
								<input type="checkbox" id="checkbox-cgs" name="rushSchool[]" value="CGS" class="mdl-checkbox__input" >
								<span class="mdl-checkbox__label">CGS</span>
							</label>
						</td>
						<td>
							<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-sar">
								<input type="checkbox" id="checkbox-sar" name="rushSchool[]" value="SAR" class="mdl-checkbox__input" >
								<span class="mdl-checkbox__label">SAR</span>
							</label>
						</td>
						<td>
							<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-pardee">
								<input type="checkbox" id="checkbox-pardee" name="rushSchool[]" value="Pardee" class="mdl-checkbox__input" >
								<span class="mdl-checkbox__label">Pardee</span>
							</label>
						</td>
						<td>
							<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-sed">
								<input type="checkbox" id="checkbox-sed" name="rushSchool[]" value="SED" class="mdl-checkbox__input" >
								<span class="mdl-checkbox__label">SED</span>
							</label>
						</td>
					</tr>
				</table>
				<!--
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
<input class="mdl-textfield__input" type="text" id="rushSchool" name="rushSchool"/>
<label class="mdl-textfield__label" for="sample1">School(s) (eg. QUESTROM, ENG)</label>
</div>
-->
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
					<input class="mdl-textfield__input" type="text" id="rushMajors" name="rushMajors"/>
					<label class="mdl-textfield__label" for="sample1">Major(s) / Concentration(s)</label>
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
					<input class="mdl-textfield__input" type="text" id="rushMinors" name="rushMinors"/>
					<label class="mdl-textfield__label" for="sample1">Minors(s) (Optional)</label>
				</div>
				<br>
				<button class="button" type="button" id="formSubmit" name="formSubmit">SUBMIT</button>
			</form>

			<!--		<a href="https://recruitmentpro-app.chapterspot.com/prospects/view" target="_blank"><p>Visit Recruitment Pro!</p></a>-->

		</div>


		<?php getFooter(); ?>

	</body>

	<script>

		function checkform() {
			// get all the inputs within the submitted form
			var inputs = document.getElementById("rushForm").getElementsByTagName('input');
			for (var i = 0; i < inputs.length; i++) {
				// only validate the inputs that have the required attribute
				console.log(inputs[i])
				if(inputs[i].value == "" && inputs[i].name != 'rushMinors'){
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
				//			$.post("https://recruitmentpro-app.chapterspot.com/f/post/<?php echo $link ?>", {
				//				organization_id: 1347,
				//				firstname: $("#rushFirstName").val(),
				//				lastname: $("#rushLastName").val(),
				//				email: $("#rushEmail").val(),
				//				phone: $("#rushPhone").val(),
				//				facebook: "",
				//				profile_field_30: $("#rushEmail").val(),
				//				profile_field_31: $("#rushMajors").val(),
				//				profile_field_33: "",
				//				profile_field_32: "", 
				//				profile_field_28 : "", 
				//				profile_field_29 : "", 
				//			}, function(result){
				//	//			alert(result);
				//			});

				$("#rushForm").submit();
			} else {
				alert("Please fill all required fields");
			}


		});

		$('input').on('keydown', function(e) {
			if (e.which == 13 || e.keyCode == 13) {
				$("#formSubmit").click();
			}
		});
	</script>
</html>