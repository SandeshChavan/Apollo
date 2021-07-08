<?php
include("../config/dbconnection.php");
	if(isset($_GET['patient_id']) && isset($_GET['appointment_id'])){
	$sql = "SELECT * FROM patient_appointment A,patient P WHERE doctor_id =".$_COOKIE['doctor_id']."  AND A.patient_id =".$_GET['patient_id']." AND appointment_id = ".$_GET['appointment_id']." AND A.patient_id = P.patient_id;";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	} else {
	  echo "0 results";
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
				<div id = 'title-container'>
					<div id  = 'title'>
						PATIENT DETAILS
					</div>
				</div>
				<div id = 'record-container'>
					<div id = 'record'>
							<?php
							  while($row = $result->fetch_assoc()) {
							  	echo "
							  	<div class = 'record'>
							  		<div class = 'label-container d-inline-block'>
							  			<div class = 'label'>Patient id</div>
							  		</div>
							  		<div class = 'label-value d-inline-block'>
							  		".$row['patient_id']."
							  		</div>
							  	<div class = 'main-container'>
							  		<div class = 'label-container d-inline-block'>
							  			<div class = 'label'>Patient name</div>
							  		</div>
							  		<div class = 'label-value d-inline-block'>
							  		".$row['patient_name']."
							  		</div>
							  	</div>
							  	<div class = 'main-container'>
							  		<div class = 'label-container d-inline-block'>
							  			<div class = 'label'>Token date</div>
							  		</div>
							  		<div class = 'label-value d-inline-block'>
							  		".$row['schedule_date']."
							  		</div>
							  	</div>
							  	<div class = 'main-container'>
							  		<div class = 'label-container d-inline-block'>
							  			<div class = 'label'>Mobile</div>
							  		</div>
							  		<div class = 'label-value d-inline-block'>
							  		".$row['patient_mobile']."
							  		</div>
							  	</div>
							  	<div class = 'main-container'>
							  		<div class = 'label-container d-inline-block'>
							  			<div class = 'label'>Blood group</div>
							  		</div>
							  		<div class = 'label-value d-inline-block'>
							  		".$row['patient_blood_group']."
							  		</div>
							  	</div>
							  	<div class = 'main-container'>
							  		<div class = 'label-container d-inline-block'>
							  			<div class = 'label'>Sex</div>
							  		</div>
							  		<div class = 'label-value d-inline-block'>
							  		".$row['patient_sex']."
							  		</div>
							  	</div>
							  	<div class = 'main-container'>
							  		<div class = 'label-container d-inline-block'>
							  			<div class = 'label'>Age</div>
							  		</div>
							  		<div class = 'label-value d-inline-block'>
							  		".$row['patient_age']."
							  		</div>
							  	</div>
							  	<div class = 'main-container'>
							  		<div class = 'label-container d-inline-block'>
							  			<div class = 'label'>Patient note</div>
							  		</div>
							  		<div class = 'label-value d-inline-block'>
							  		".$row['details']."
							  		</div>
							  	</div>


							  	</div>
							  	<div >
							  		<img class  = 'image' src = ../".$row['patient_image_url'].">
							  	</div>
							  	<div class = 'btn scan' onclick = 'predict(\"".$row['patient_image_url']."\" , \"".$_COOKIE['doctor_id']."\" , \"".$row['patient_id']."\", \"".$row['appointment_id']."\")'>
							  		Scan MRI for tumor
							  	</div>
							  	<div id = 'submit-container'>
								<button onclick='window.print()' class = 'btn orange' id='submit'>GENERATE PDF</button>
								</div>
							  	<div id = 'submit-container'>
								<button class = 'btn orange' id='schedule' onclick='navigateToScheduleAppointment(".$row['patient_id'].",".$row['appointment_id'].")'>SCHEDULE APPOINTMENT</button>
								</div>
							  	";	
  								}
							  ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
