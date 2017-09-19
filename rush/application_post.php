<?php
include("application_questions.php");
include("../db/credentials.php");
ini_set('display_errors', 1);


function isValid($appQ, $fbQ, $lQ) {
	foreach($appQ as $count => $question) {
		if (!isset($_POST["q".$count])) {
			return false;
		}
	}
	foreach($fbQ as $count => $question) {
		if (!isset($_POST["fb".$count])) {
			return false;
		}
	}
	return isset($_POST["rushEmail"]) && isset($_POST["rushGPA"]) && isset($_POST["time"]);
}

function gradeLogic($logicQuestions) {
	$grade = 0;
	foreach($logicQuestions as $count => $question) {
		if (isset($_POST["l".$count])) {
		$submitted = $_POST["l".$count];
			if ($submitted == $question['answer']) {
				$grade += 1;
			}
		}
	}
	return $grade;
}
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


		$no_error = false;

		if (isValid($appQuestions, $feedbackQuestions, $logicQuestions)) {

			// Create connection
			$conn = new mysqli($hostname, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
			
//			Insert into Application table

			$sql = "INSERT INTO $rushTableApps (email, address, gpa";
			foreach($appQuestions as $key => $question) {
				$sql .= ", q" . $key;
			}
			foreach($feedbackQuestions as $key => $question) {
				$sql .= ", fb" . $key;
			}
			
//			Insert static values (email, address, gpa)
			$sql .= ") VALUES ('" . $_POST["rushEmail"] . "', '" . $_POST["rushAddress"] . "', " . $_POST["rushGPA"];
			
//			Append question answers
			foreach($appQuestions as $key => $question) {
				$sql .= ", '" . addslashes($_POST["q".$key]) . "'";
			}
			foreach($feedbackQuestions as $key => $question) {
				$sql .= ", '" . addslashes($_POST["fb".$key]) . "'";
			}

			$sql .= ")";
			echo $sql . "<br>";
			
			$appConfirm = $conn->query($sql);
				
//			Insert into Logic table
			$sql = "INSERT INTO $rushTableLogic (email, score, time";
			foreach($logicQuestions as $key => $question) {
				if (isset($_POST["l".$key])) {
					$sql .= ", l" . $key;
				}
			}
			
//			Insert static values (email, address, gpa)
			$sql .= ") VALUES ('" . $_POST["rushEmail"] . "', '" . gradeLogic($logicQuestions) . "', " . $_POST["time"];
			
//			Append question answers
			foreach($logicQuestions as $key => $question) {
				if (isset($_POST["l".$key])) {
					$sql .= ", '" . $_POST["l".$key] . "'";
				}
			}

			$sql .= ")";
			echo $sql . "<br>";
			
			$logicConfirm = $conn->query($sql);
			
//			Send email to rush if data was successfully added with confirmation
			if ($appConfirm && $logicConfirm) {
				//		echo "New record created successfully";
				$no_error = true;

				$to      = $_POST["rushEmail"];
				$subject = "Alpha Kappa Psi Fall 2017 Recruitment Application Confirmation";
				$message = "Dear ".$_POST['rushFirstName'].",\r\n\r\nThank you for your application! We look forward to reviewing your application and will contact you with further details on your candidacy by Saturday night. Below is a copy of your application for your own record.\r\n\r\n------------------------------\r\n\r\n".
					"Email: " . $_POST["rushEmail"] . "\r\n".
					"First Name: " . $_POST["rushFirstName"] . "\r\n".
					"Last Name: " . $_POST["rushLastName"] . "\r\n".
					"Grade: " . $_POST["rushGrade"] . "\r\n".
					"School: " . $_POST["rushSchool"] . "\r\n".
					"Majors: " . $_POST["rushMajors"] . "\r\n".
					"Minors: " . $_POST["rushMinors"] . "\r\n".
					"Phone: " . $_POST["rushPhone"] . "\r\n".
					"Address: " . $_POST["rushAddress"] . "\r\n".
					"GPA: " . $_POST["rushGPA"] . "\r\n". "\r\n";
				foreach($appQuestions as $count => $question) {
					$message .= $question[0] . " " . "\r\n" . $_POST["q".$count] . "\r\n". "\r\n";
				}
				foreach($feedbackQuestions as $count => $question) {
					$message .= $question . " " . "\r\n" . $_POST["fb".$count] . "\r\n". "\r\n";
				}
				$message .= "\r\nLogic:\r\n";
				foreach($logicQuestions as $count => $question) {
					if (isset($_POST["l".$count])) {
						$message .= $_POST["l".$count] . "\r\n";
					}
				}
				$message = strip_tags($message);

//				$sql = "INSERT INTO $rushTable (FirstName, LastName, Email, Phone, Majors, MajorSchools, Grade, AppSubmitted)
//	VALUES ('" . $_POST["rushFirstName"] . "', '" . $_POST["rushLastName"] . "', '" . $_POST["rushEmail"] . "', '" . $_POST["rushPhone"] . "', '" . $_POST["rushMajors"] . "', '" . $_POST["rushSchool"] . "', '" . $_POST["rushGrade"] . "', '1') ON DUPLICATE KEY UPDATE AppSubmitted=VALUES(AppSubmitted)";

				$headers = 'From: AKΨ Nu Chapter <akpsi.nu.recruitment@gmail.com>';

				mail($to, $subject, $message, $headers);


		?>
		<h2 style="margin: 200px 100px;"><strong>Thank you for your submission!</strong><br>We will review your application and contact you with further details by Wednesday morning. A confirmation email will be sent to you shortly.<br><b>If you did not recieve a confirmation email, please check your "Junk" folder.</b></h2>

		<?

//				Upload a picture
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


//				If there was an error, show the error along with a message they can copy to the VPMK/Recruitment committee
			} else {

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
		} else {
			
			echo "not valid!";
			die();
		}

//		If there was no error, update AppSubmitted Column
		if ($no_error && isset($_POST['rushEmail'])) {
			include("../db/credentials.php");

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