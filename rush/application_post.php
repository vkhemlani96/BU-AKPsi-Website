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
</head>

<body>
	<?php include("../navbar.php"); getNavbar(true); ?>
	
	<div class="center vertical_padding title_section">
		<h1>Recruitment Application</h1>
		<div class="seperator"></div>
		<h2></h2>
	</div>


<?php
	

function isValid($appQ, $fbQ) {
	foreach($appQ as $count => $question) {
		if (!isset($_POST["q".$count]))
			return false;
	}
	foreach($fbQ as $count => $question) {
		if (!isset($_POST["fb".$count]))
			return false;
	}
	return isset($_POST["rushEmail"]) && isset($_POST["gpa"]);
}

$no_error = false;

if (isValid($appQuestions, $feedbackQuestions)) {
	
	include("../manage_db/db_credentials.php");
	
	// Create connection
	$conn = new mysqli($hostname, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "INSERT INTO $rushTableApps (email, gpa";
	foreach($appQuestions as $key => $question) {
		$sql .= ", q" . $key;
	}
	foreach($feedbackQuestions as $key => $question) {
		$sql .= ", fb" . $key;
	}
	
	$sql .= ") VALUES ('" . $_POST["rushEmail"] . "', " . $_POST["gpa"];
	foreach($appQuestions as $key => $question) {
		$sql .= ", '" . $_POST["q".$key] . "'";
	}
	foreach($feedbackQuestions as $key => $question) {
		$sql .= ", '" . $_POST["fb".$key] . "'";
	}
	
	$sql .= ")";
	
//	, q1_why, q2_words, q3_excite, q4_orgs, q5_work, q6_goals, q7_bro, q8_brohood, q9_second, q10_hear, q11_improve)
//	VALUES ('" . $_POST["rushEmail"] . "', " . $_POST["gpa"] . ", '" . $_POST["q1_why"] . "', '" . $_POST["q2_words"] . "', '" . $_POST["q3_excite"] . "', '" . $_POST["q4_orgs"] . "', '" . $_POST["q5_work"] . "', '" . $_POST["q6_goals"] . "', '" . $_POST["q7_bro"] . "', '" . $_POST["q8_brohood"] . "', '" . $_POST["q9_second"] . "', '" . $_POST["q10_hear"] . "', '" . $_POST["q11_improve"] . "')";

	if ($conn->query($sql) === TRUE) {
//		echo "New record created successfully";
		$no_error = true;

		$to      = $_POST["rushEmail"];
		$subject = "Alpha Kappa Psi Spring 2016 Recruitment Application Confirmation";
		$message = "Dear ".$_POST['rushFirstName'].",\r\n\r\nThank you for your application! We look forward to reviewing your application and will contact you with further details on your candidacy by Monday morning. Below is a copy of your application for your own record.\r\n\r\n------------------------------\r\n\r\n".
			"Email: " . $_POST["rushEmail"] . "\r\n".
			"First Name: " . $_POST["rushFirstName"] . "\r\n".
			"Last Name: " . $_POST["rushLastName"] . "\r\n".
			"Grade: " . $_POST["rushGrade"] . "\r\n".
			"School: " . $_POST["rushSchool"] . "\r\n".
			"Majors: " . $_POST["rushMajors"] . "\r\n".
			"Phone: " . $_POST["rushPhone"] . "\r\n".
			"GPA: " . $_POST["gpa"] . "\r\n". "\r\n";
		foreach($appQuestions as $count => $question) {
			$message .= $question[0] . " " . "\r\n" . $_POST["q".$count] . "\r\n". "\r\n";
		}
		foreach($feedbackQuestions as $count => $question) {
			$message .= $question . " " . "\r\n" . $_POST["fb".$count] . "\r\n". "\r\n";
		}
		$message = strip_tags($message);
			
	$sql = "INSERT INTO $rushTable (FirstName, LastName, Email, Phone, Majors, MajorSchools, Grade, AppSubmitted)
	VALUES ('" . $_POST["rushFirstName"] . "', '" . $_POST["rushLastName"] . "', '" . $_POST["rushEmail"] . "', '" . $_POST["rushPhone"] . "', '" . $_POST["rushMajors"] . "', '" . $_POST["rushSchool"] . "', '" . $_POST["rushGrade"] . "', '1') ON DUPLICATE KEY UPDATE AppSubmitted=VALUES(AppSubmitted)";
			
		$headers = 'From: AKΨ Nu Chapter <akpsi.nu.recruitment@gmail.com>';

		mail($to, $subject, $message, $headers);
		
		
	?>
		<h2 style="margin: 200px 100px;"><strong>Thank you for your submission!</strong><br>We will review your application and contact you with further details by Monday morning. A confirmation email will be sent to you shortly.</h2>
	
	<?
		
		// make a note of the current working directory, relative to root. 
		$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']); 

		// make a note of the directory that will recieve the uploaded file 
		$uploadsDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . 'rushPics/';
		
		// fieldname used within the file <input> of the HTML form 
		$fieldname = 'rushPic';
		
		// possible PHP upload errors 
		$errors = array(1 => 'php.ini max file size exceeded', 
						2 => 'html form max file size exceeded', 
						3 => 'file upload was only partial', 
						4 => 'no file was attached'); 

		// make a unique filename for the uploaded file and check it is not already 
		// taken... if it is already taken keep trying until we find a vacant one 
		// sample filename: 1140732936-filename.jpg 
		$now = time(); 
		$email = $_POST["rushEmail"];
		$user = str_replace("@bu.edu","",$email);
		$path = $_FILES[$fieldname]['name'];
		$ext = pathinfo($path, PATHINFO_EXTENSION);
		$uploadFilename = $uploadsDirectory.$user.".".$ext;
		
		// now let's move the file to its final location and allocate the new filename to it 
		@move_uploaded_file($_FILES[$fieldname]['tmp_name'], $uploadFilename);
//			or echo 'receiving directory insuffiecient permission';
		
		
		
	} else {
//		echo "Error: " . $sql . "<br>" . $conn->error;
		
	?>
	
	<h2 style="margin: 50px 0;"><strong>An error has occured.</strong><br>Please copy paste the following and email it to <a href="mailto:akpsi.nu.recruitment@gmail.com">akpsi.nu.recuitment@gmail.com</a>.</h2>
	
	<?
		echo "<p class='center'>";
		
		echo $conn->error . "<br>";
		
		foreach($_POST as $stuff ) {
			if( is_array( $stuff ) ) {
				foreach( $stuff as $thing ) {
					echo $thing;
				}
			} else {
				echo $stuff;
			}
			echo "<br>";
		}
		
		echo "</p><br><br><br><br>";
		
//		if (strpos($conn->error,'Duplicate') !== false) {
//			die('THIS USER ALREADY EXISTS');
//		}
	}

	$conn->close();
}

if ($no_error && isset($_POST['rushEmail'])) {
	include("../manage_db/db_credentials.php");

	// Create connection
	$conn = new mysqli($hostname, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	$sql = "INSERT INTO $rushTable (FirstName, LastName, Email, Phone, Majors, MajorSchools, Grade, AppSubmitted)
	VALUES ('" . $_POST["rushFirstName"] . "', '" . $_POST["rushLastName"] . "', '" . $_POST["rushEmail"] . "', '" . $_POST["rushPhone"] . "', '" . $_POST["rushMajors"] . "', '" . $_POST["rushSchool"] . "', '" . $_POST["rushGrade"] . "', '1') ON DUPLICATE KEY UPDATE AppSubmitted=VALUES(AppSubmitted)";

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

	getFooter();

?>

	</body>
</html>