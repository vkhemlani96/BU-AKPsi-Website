<?php

//foreach ($_POST as $key => $value)
//	echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";

// IF DATA HAS BEEN POSTED, ADD TO DB

if (isset($_POST["rushFirstName"]) && isset($_POST["rushLastName"]) && isset($_POST['rushEmail'])  && isset($_POST['rushPhone'])  && isset($_POST['rushMajors'])  && isset($_POST['rushSchool']) && isset($_POST['rushGrade']) ) {
	include("../db/credentials.php");

	// Create connection
	$conn = new mysqli($hostname, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	$sql = "INSERT INTO $rushTable (Channel, FirstName, LastName, Email, Phone, Majors, MajorSchools, Grade, " . $_GET["event"] . ")
	VALUES ('Event', '" . $_POST["rushFirstName"] . "', '" . $_POST["rushLastName"] . "', '" . $_POST["rushEmail"] . "', '" . $_POST["rushPhone"] . "', '" . $_POST["rushMajors"] . "', '" . $_POST["rushSchool"] . "', '" . $_POST["rushGrade"] . "', '1') ON DUPLICATE KEY UPDATE " . $_GET["event"] . "=VALUES(".$_GET['event'].")";

	if ($conn->query($sql) === TRUE) {
		//		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
		if (strpos($conn->error,'Duplicate') !== false) {
			die('THIS USER ALREADY EXISTS');
		}
	}

	$conn->close();
}

$event = $_GET["event"];
$title = "";

$eventList = array(
	"Info1" => "Infosession 1",
	"Info2" => "Infosession 2",
	"Professional" => "Professional Night",
	"Fashion" => "Fashion Night",
	"CommunityService" => "Community Service",
	"Speaker" => "Speaker Series",
	"Mocktail" => "Mocktail Night",
);


if (array_key_exists($event, $eventList)) {
	$title = $eventList[$event];
} else {
	$eventUrls = "";
	$arrayKeys = array_keys($eventList);

	for ($i = 0; $i < count($arrayKeys); $i++) {
		$eventUrls .= '<p><a href="http://www.buakpsi.com/rush/event.php?event=' . $arrayKeys[$i] . '">' . $eventList[$arrayKeys[$i]] . '</a></p>';
	}
	die('Choose an event<br>' . $eventUrls);
}

?>


<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Event Sign In | Alpha Kappa Psi Nu Chapter</title>

		<link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.0/material.indigo-pink.min.css">
		<script src="https://storage.googleapis.com/code.getmdl.io/1.0.0/material.min.js"></script>
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

		<link href="../css/styles.css" rel="stylesheet"/>
		<link href="../css/material_modify.css" rel="stylesheet"/>
		<link href="../css/navbar.css" rel="stylesheet" />
		<script src="../js/jquery.js"></script>
		<script src="../js/jquery.color.js"></script>
	</head>

	<body>
		<?php include("../navbar.php"); getNavbar(true); ?>

		<div class="center vertical_padding title_section">
			<h1>Event Sign In</h1>
			<div class="seperator"></div>
			<h2><?php echo $title ?></h2>
		</div>

		<div class="vertical_padding center rushForm">
			<form style="text-align:center; width: 60%; margin: 0 auto;" action="event.php?event=<?php echo $event; ?>" id="rushForm" method="post">
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo" style="display:none">
					<input class="mdl-textfield__input" type="text" id="rushChannel" name="rushChannel" hidden="hidden" value="<?php echo $title; ?>" />
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
					<input class="mdl-textfield__input" type="text" id="rushEmail" name="rushEmail"/>
					<label class="mdl-textfield__label" for="sample1">E-Mail (@bu.edu)</label>
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
				if(inputs[i].value == ""){
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
				alert("Please fill all required fields");
			}


		});

		$('input').on('keydown', function(e) {
			if (e.which == 13 || e.keyCode == 13) {
				$("#formSubmit").click();
			}
		});

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

		//Get all entries to populate Javascript Object
		$result = mysqli_query($con,"SELECT * FROM $rushTable");

		while($row = mysqli_fetch_array($result)) {

			echo "RushInfo = {};\n"
				. "RushInfo['FirstName'] = '" . trim(str_replace("'","",$row['FirstName'])) . "';\n"
				. "RushInfo['LastName'] = '" . trim(str_replace("'","",$row['LastName'])) . "';\n"
				. "RushInfo['Email'] = '" . strtolower(trim(str_replace("'","",$row['Email']))) . "';\n"
				. "RushInfo['Phone'] = '" . trim(str_replace("'","",$row['Phone'])) . "';\n"
				. "RushInfo['Majors'] = '" . trim(str_replace("'","",$row['Majors'])) . "';\n"
				. "RushInfo['MajorSchools'] = '" . trim(str_replace("'","",$row['MajorSchools'])) . "';\n"
				. "RushInfo['Grade'] = '" . trim(str_replace("'","",$row['Grade'])) . "';\n"
				. "Rushes['" . trim(str_replace("'","",$row['Email'])) . "'] = RushInfo;";
		}
		?>

		var lastChar = -1;

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
					$("input#rushGrade").val(rushesInfo['Grade']).parent().addClass("is-dirty");

					$(".rush_grade .mdl-js-radio input[value='" + rushesInfo['Grade'] + "']").parent()[0].MaterialRadio.check();

					var schools = rushesInfo['MajorSchools'].split(", ");
					for (var i = 0; i < schools.length; i++) {
						console.log($(".rush_schools input[value='" + schools[i] + "']"));
						$(".rush_schools .mdl-js-checkbox input[value='" + schools[i] + "']").parent()[0].MaterialCheckbox.check();
					}
				} else {
					$("input#rushFirstName").focus();
				}

			}
			
			
		});
	</script>
</html>