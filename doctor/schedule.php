<?php
include("../config/dbconnection.php");
	if(isset($_GET['patient_id']) && isset($_GET['appointment_id'])){
	$sql = "SELECT * FROM patient_appointment A, doctor D,patient P WHERE A.doctor_id =".$_COOKIE['doctor_id']."  AND A.patient_id =".$_GET['patient_id']." AND appointment_id = ".$_GET['appointment_id']." AND A.patient_id = P.patient_id AND A.doctor_id = D.doctor_id;";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	  	echo "Success";
	} else {
	  echo "0 results";
	}
	}

if(isset($_POST['submit']))
{
	if(isset($_POST['doctor_note']) && isset($_POST['appointment_date'])){
		$doctorNote = $_REQUEST["doctor_note"];
		$appointmentDate = $_REQUEST["appointment_date"];
		$patientId = $_GET['patient_id'];
		$doctorId = $_COOKIE['doctor_id'];
	}
	$sql1 = "INSERT INTO scheduled_appointment(doctor_id, patient_id, appointment_date, doctor_note) VALUES ($doctorId,$patientId,\"$appointmentDate\",\" $doctorNote\")";
	echo $sql1;
	if ($conn->query($sql1) === TRUE) {
	  echo "New record created successfully";
	} else {
	  echo "Error: " . $sql1 . "<br>" . $conn->error;
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
	<script type="text/javascript" src="js/doctor_main.js"></script>
</head>
<body>
	<div class="container">
		<div class = "row">
			<div class = 'col-12'>
				<?php
							  while($row = $result->fetch_assoc()) {
									
							  	echo "
							  	<form action ='' method = 'post'>
								  	<div>
								  		".$row['patient_id']."
								  	</div>
								  	<div>
								  		".$row['patient_name']."
								  	</div>
								  	<div>
								  		".$row['schedule_date']."
								  	</div>
								  	<div>
								  		".$row['patient_mobile']."
								  	</div>
								  	<div>
								  		<textarea rows='4' cols='50' name = 'doctor_note'></textarea>
								  	</div>
								  	<div>
								  		<input type = 'date' name = 'appointment_date'>
								  	</div>
								  	<div>
								  		<input  type='submit' name='submit' id='submit' value='submit'>
								  	</div>
								  	<div onclick = 'navigateToHome()'>
								  		Close 
								  	</div>
								  </form>
							  	";	

  								}
							  ?>
			</div>
		</div>
	</div>
</body>
</html>
