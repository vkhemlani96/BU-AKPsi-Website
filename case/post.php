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
		<h1>Trans-Atlantic Case Competition</h1>
		<div class="seperator"></div>
		<h2></h2>
	</div>


<?php
//ini_set('display_errors', 1);

//foreach ($_POST as $key => $value)
// echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
//echo $_POST["rushEmail"];
//echo count($_POST);

$no_error = false;

if (isset($_POST["Email"]) && isset($_POST['q1'])  && isset($_POST['q2'])  && isset($_POST['q3'])) {
	
	include("../manage_db/db_credentials.php");
	
	// Create connection
	$conn = new mysqli($hostname, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "INSERT INTO $caseTable (FirstName, LastName, Email, Grade, School, Phone, q1, q2, q3)
	VALUES ('" . $_POST["FirstName"] . "', '" . $_POST["LastName"] . "', '" . $_POST["Email"] . "', '" . $_POST["Grade"] . "', '" . $_POST["School"] . "', '" . $_POST["Phone"] . "', '" . $_POST["q1"] . "', '" . $_POST["q2"] . "', '" . $_POST["q3"] . "')";
	
	if ($conn->query($sql) === TRUE) {
//		echo "New record created successfully";
		$no_error = true;

//		$to      = $_POST["rushEmail"];
//		$subject = "Alpha Kappa Psi Fall 2015 Recruitment Application Confirmation";
//		$message = "Dear ".$_POST['rushFirstName'].",\r\n\r\nThank you for your application! We look forward to reviewing your application and will contact you with further details on your candidacy by Monday morning. Below is a copy of your application for your own record.\r\n\r\n------------------------------\r\n\r\n".
//			"Email: " . $_POST["rushEmail"] . "\r\n".
//			"First Name: " . $_POST["rushFirstName"] . "\r\n".
//			"Last Name: " . $_POST["rushLastName"] . "\r\n".
//			"Grade: " . $_POST["rushGrade"] . "\r\n".
//			"School: " . $_POST["rushSchool"] . "\r\n".
//			"Majors: " . $_POST["rushMajors"] . "\r\n".
//			"Phone: " . $_POST["rushPhone"] . "\r\n".
//			"GPA: " . $_POST["gpa"] . "\r\n". "\r\n".
//			"Why should Alpha Kappa Psi select you? " . "\r\n" . $_POST["q1_why"] . "\r\n". "\r\n".
//			"What are three words that describe you? " . "\r\n" . $_POST["q2_words"] . "\r\n". "\r\n".
//			"What excites you about your major? " . "\r\n" . $_POST["q3_excite"] . "\r\n". "\r\n".
//			"What organizations are you involved with or planning on involving yourself with on campus? " . "\r\n" . $_POST["q4_orgs"] . "\r\n". "\r\n".
//			"What is your most notable work experience? " . "\r\n" . $_POST["q5_work"] . "\r\n". "\r\n".
//			"What are your goals for the next few years of college/post-college? " . "\r\n" . $_POST["q6_goals"] . "\r\n". "\r\n".
//			"Please list two notable interactions you had with brothers throughout the recruitment process? " . "\r\n" . $_POST["q7_bro"] . "\r\n". "\r\n".
//			"What does brotherhood mean to you? " . "\r\n" . $_POST["q8_brohood"] . "\r\n". "\r\n".
//			"If this is not your first time applying, what have you done to strengthen your candidacy? " . "\r\n" . $_POST["q9_second"] . "\r\n". "\r\n".
//			"How did you hear about Alpha Kappa Psi's recruitment process? " . "\r\n" . $_POST["q10_hear"] . "\r\n". "\r\n".
//			"What did you think of the recruitment events you attended? How do you think they could be improved? " . "\r\n" . $_POST["q11_improve"];
//			
////	$sql = "INSERT INTO $rushTableApps (FirstName, LastName, Email, Phone, Majors, MajorSchools, Grade, AppSubmitted)
////	VALUES ('" . $_POST["rushFirstName"] . "', '" . $_POST["rushLastName"] . "', '" . $_POST["rushEmail"] . "', '" . $_POST["rushPhone"] . "', '" . $_POST["rushMajors"] . "', '" . $_POST["rushSchool"] . "', '" . $_POST["rushGrade"] . "', '1') ON DUPLICATE KEY UPDATE AppSubmitted=VALUES(AppSubmitted)";
//			
//		$headers = 'From: AKΨ Nu Chapter <akpsi.nu.recruitment@gmail.com>';
//
//		mail($to, $subject, $message, $headers);
		
		
	?>
		<h2 style="margin: 200px 0;"><strong>Thank you for your submission!</strong><br>We will review your submission and contact you with further details.</h2>
	
	<?
		
		// make a note of the current working directory, relative to root. 
		$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']); 

		// make a note of the directory that will recieve the uploaded file 
		$uploadsDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . 'resumes/';
		
		// fieldname used within the file <input> of the HTML form 
		$fieldname = 'Resume';
		
		// possible PHP upload errors 
		$errors = array(1 => 'php.ini max file size exceeded', 
						2 => 'html form max file size exceeded', 
						3 => 'file upload was only partial', 
						4 => 'no file was attached'); 

		// make a unique filename for the uploaded file and check it is not already 
		// taken... if it is already taken keep trying until we find a vacant one 
		// sample filename: 1140732936-filename.jpg 
		$now = time(); 
		$user = $_POST["LastName"] . "_" . $_POST["FirstName"];
		$path = $_FILES[$fieldname]['name'];
		$ext = pathinfo($path, PATHINFO_EXTENSION);
		$uploadFilename = $uploadsDirectory.$user.".".$ext;
		
		// now let's move the file to its final location and allocate the new filename to it 
		@move_uploaded_file($_FILES[$fieldname]['tmp_name'], $uploadFilename);
//			or echo 'receiving directory insuffiecient permission';
		
		
	} else {
//		echo "Error: " . $sql . "<br>" . $conn->error;
		
	?>
	
	<h2 style="margin: 50px 0;"><strong>An error has occured.</strong><br>Please copy paste the following and email it to <a href="mailto:warriera@bu.edu">warriera@bu.edu</a>.</h2>
	
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

//if ($no_error && isset($_POST['rushEmail'])) {
//	include("../manage_db/db_credentials.php");
//
//	// Create connection
//	$conn = new mysqli($hostname, $username, $password, $dbname);
//	// Check connection
//	if ($conn->connect_error) {
//		die("Connection failed: " . $conn->connect_error);
//	} 
//	$sql = "INSERT INTO $rushtableApps (FirstName, LastName, Email, Phone, Majors, MajorSchools, Grade, AppSubmitted)
//	VALUES ('" . $_POST["rushFirstName"] . "', '" . $_POST["rushLastName"] . "', '" . $_POST["rushEmail"] . "', '" . $_POST["rushPhone"] . "', '" . $_POST["rushMajors"] . "', '" . $_POST["rushSchool"] . "', '" . $_POST["rushGrade"] . "', '1') ON DUPLICATE KEY UPDATE AppSubmitted=VALUES(AppSubmitted)";
//
//	if ($conn->query($sql) === TRUE) {
////		echo "New record created successfully";
//	} else {
//		echo "Error: " . $sql . "<br>" . $conn->error;
//		if (strpos($conn->error,'Duplicate') !== false) {
//			die('THIS USER ALREADY EXISTS');
//		}
//	}
//
//	$conn->close();
//}

	getFooter();

?>

	</body>
</html>