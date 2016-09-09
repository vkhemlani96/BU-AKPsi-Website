<?php

//foreach ($_POST as $key => $value)
//	echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";

// IF DATA HAS BEEN POSTED, ADD TO DB
if (isset($_POST["rushFirstName"]) && isset($_POST["rushLastName"]) && isset($_POST['rushEmail'])  && isset($_POST['rushPhone'])  && isset($_POST['rushMajors'])  && isset($_POST['rushSchool']) && isset($_POST['rushGrade']) ) {
	include("../manage_db/db_credentials.php");

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

$eventList = [
	"Info1" => "Infosession 1",
	"Info2" => "Infosession 2",
	"Coffeehouse" => "Coffeehouse",
	"Professional" => "Professional Night",
	"Fashion" => "Fashion Night",
	"Interview" => "Interview Workshops",
	"Mocktail" => "Mocktail Night",
];


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

//switch ($event) {
//	case "Info1":
//		$title = ;
//		break;
//	case "Info2":
//		$title = "Infosession 2";
//		break;
//	case "Coffeehouse":
//		$title = "Coffeehouse";
//		break;
//	case "Professional":
//		$title = "Professional Night";
//		break;
//	case "Fashion":
//		$title = "Fashion Night";
//		break;
//	case "Interview":
//		$title = "Interview Workshops";
//		break;
//	default:
//}

?>


<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Event Sign In | Alpha Kappa Psi Nu Chapter</title>

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
			<h1>Event Sign In</h1>
			<div class="seperator"></div>
			<h2><?php echo $title ?></h2>
		</div>

		<div class="vertical_padding center">
			<form style="text-align:center; width: 60%; margin: 0 auto;" action="event.php?event=<?php echo $event; ?>" id="rushForm" method="post">
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
					<input class="mdl-textfield__input" type="text" id="rushPhone" name="rushPhone"/>
					<label class="mdl-textfield__label" for="sample1">Phone Number</label>
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
					<input class="mdl-textfield__input" type="text" id="rushGrade" name="rushGrade"/>
					<label class="mdl-textfield__label" for="sample1">Grade (ex. Freshman, Sophomore...)</label>
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
					<input class="mdl-textfield__input" type="text" id="rushSchool" name="rushSchool"/>
					<label class="mdl-textfield__label" for="sample1">School(s) (ex. QUESTROM, ENG)</label>
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
					<input class="mdl-textfield__input" type="text" id="rushMajors" name="rushMajors"/>
					<label class="mdl-textfield__label" for="sample1">Major(s) / Concentrations(s)</label>
				</div>
				<br>
				<button class="button" type="button" id="formSubmit" name="formSubmit">Sign In</button>
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

		//Get all entries to populate Javascript Object
		$result = mysqli_query($con,"SELECT * FROM $rushTable");

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
				console.log($(this).val().indexOf("@bu.edu"));
				console.log($(this).val());
				$(this).val($(this).val().substring(0,$(this).val().indexOf("@bu.edu")+7));
			}
		});
	</script>
</html>