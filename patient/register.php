<?php
include("../config/dbconnection.php");
if(isset($_POST['submit']))
{
	$name = $_REQUEST['patient_name'];
	$email = $_REQUEST['patient_email'];
	$mobile = $_REQUEST['patient_mobile'];
	$password = $_REQUEST['patient_password'];
	$address = $_REQUEST['patient_address'];
	$sex = $_REQUEST['patient_sex'];
	$age = $_REQUEST['patient_age'];
	$blood_group = $_REQUEST['patient_blood_group'];
	$sql = "INSERT INTO patient(patient_name, patient_email, patient_mobile, patient_password, patient_address, patient_blood_group, patient_sex, patient_age) VALUES ('$name','$email','$mobile','$password','$address','$blood_group','$sex','$age');";
	if ($conn->query($sql) === TRUE) {
    		echo "<script >location.href = 'index.php';</script>";
	} else {
  	echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Hosipital Management system</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="../css/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<script type="text/javascript" src="js/patient_main.js"></script>
</head>
<body>
	<div class="container">
		<div class = "row">
			<div class = 'col-12'>
				<div id = 'main-container'>
					<div id = 'header'>
					PATIENT INFO
					</div>
				</div>
				<div class = 'card-form'>
					<form method="post" action="">
						<div>
							<div>
								<div class = 'text'>Name</div>
							</div>
							<div>
								<input class = 'form-control' type="text" name="patient_name" required>
							</div>
						</div>
						<div>
							<div class = 'text-container'>
								<div class = 'text'>Email</div>
							</div>
							<div>
								<input class = 'form-control' type="text" name="patient_email" required>
							</div>
						</div>
						<div>
							<div class = 'text-container'>
								<div class = 'text'>Mobile</div>
							</div>
							<div >
								<input class = 'form-control' type="text" name="patient_mobile" required>
							</div>
						</div>
						<div>
							<div class = 'text-container'>
								<div class = 'text'>Password</div>
							</div>
							<div>
								<input class = 'form-control' type="password" name="patient_password" required>
							</div>
						</div>
						<div>
							<div class = 'text-container'>
								<div class = 'text'>address</div>
							</div>
							<div>
								<input class = 'form-control' type="text" name="patient_address" required>
							</div>
						</div>
						<div>
							<div class = 'text-container'>
								<div class = 'text'>Blood group</div>
							</div>
							<div>
								<select class = 'form-control' name = 'patient_blood_group'>
									<option value = 'O+'>O+</option>
									<option value = 'O-'>O-</option>
									<option value = 'A+'>A+</option>
									<option value = 'A-'>A-</option>
									<option value = 'B+'>B+</option>
									<option value = 'B-'>B-</option>
									<option value = 'AB+'>AB+</option>
									<option value = 'AB-'>AB-</option>
								</select>
							</div>
						</div>
						<div>
							<div class = 'text-container'>
								<div class = 'text'>Sex</div>
							</div>
							<div>
								<select class = 'form-control' name = 'patient_sex'>
									<option value = 'Male'>Male</option>
									<option value = 'Female'>Female</option>
									<option value = 'Other'>Other</option>
								</select>
							</div>
						</div>
						<div>
							<div class = 'text-container'>
								<div class = 'text'>Age</div>
							</div>
							<div>
								<input class = 'form-control' type="text" name="patient_age" required>
							</div>
						</div>
						<div id = 'submit-container'>
							<input class = 'btn orange' type="submit" name="submit" id="submit" value="submit">
						</div>
						</div>
					</form>	
				</div>
			</div>
		</div>
	</div>
</body>
</html>