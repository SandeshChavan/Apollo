<?php
include("../config/dbconnection.php");


$sql1 = "SELECT * FROM scheduled_appointment A,doctor D WHERE patient_id =".$_COOKIE['patient_id']." AND A.doctor_id = D.doctor_id; ";
$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0) {
	} else {
	  echo "0 results";
	}



$sql = "SELECT * FROM patient_appointment A,doctor D,patient P WHERE A.patient_id =".$_COOKIE['patient_id']." AND A.doctor_id = D.doctor_id AND A.patient_id  = P.patient_id;";
$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	} else {
	  echo "0 results";
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
				<div id  = 'scheduled'>
					<div>
						<div class = 'heading'>SCHEDULED APPOINTMENT</div>
					</div>
					<div id  = 'view_record'>
							<?php
							  while($row1 = $result1->fetch_assoc()) {
									
							  	echo "
							  	<div class = 'record'>
							  	<div class = 'content'>
							  	<div class = 'main-container'>
							  		<div class = 'label-container d-inline-block'>
							  			<div class = 'label'>Doctor name</div>
							  		</div>
							  		<div class = 'label-value d-inline-block'>
							  		".$row1['doctor_name']."
							  		</div>
							  	</div>
							  	<div class = 'main-container'>
							  		<div class = 'label-container d-inline-block'>
							  			<div class = 'label'>Doctor mobile</div>
							  		</div>
							  		<div class = 'label-value d-inline-block'>
							  		".$row1['doctor_mobile_number']."
							  		</div>
							  	</div>
							  	<div class = 'main-container'>
							  		<div class = 'label-container d-inline-block'>
							  			<div class = 'label'>Department</div>
							  		</div>
							  		<div class = 'label-value d-inline-block'>
							  		".$row1['doctor_department']."
							  		</div>
							  	</div>
							  	<div class = 'main-container'>
							  		<div class = 'label-container d-inline-block'>
							  			<div class = 'label'>Appointment</div>
							  		</div>
							  		<div class = 'label-value d-inline-block'>
							  		".$row1['appointment_date']."
							  		</div>
							  	</div>
							  	<div class = 'main-container'>
							  		<div class = 'label-container d-inline-block'>
							  			<div class = 'label'>Doctor note</div>
							  		</div>
							  		<div class = 'label-value d-inline-block'>
							  		".$row1['doctor_note']."
							  		</div>
							  	</div>
							  	</div>
							  	<div class = 'content-image'>
							  		<img class = 'img-thumb' src = '../".$row1['doctor_picture_url']."'>
							  	</div>
							  	</div>
							  	";	

  								}
							  ?>
					</div>
				</div>
				<div id  = 'request'>
					<div>
						<div class = 'heading'>TOKEN RAISED</div>
					</div>
					<div id  = 'previous_records'>
						<?php
							  while($row = $result->fetch_assoc()) {	
							  	echo "
							  	<div class = 'record' onclick = 'navigateToIndividualReport(".$row['patient_id'].",".$row['appointment_id'].")'>
							  	<div class = 'content'>
							  		<div class = 'label-container d-inline-block'>
							  			<div class = 'label'>Doctor name</div>
							  		</div>
							  		<div class = 'label-value d-inline-block'>
							  		".$row['doctor_name']."
							  		</div>
							  	<div class = 'main-container'>
							  		<div class = 'label-container d-inline-block'>
							  			<div class = 'label'>Doctor mobile</div>
							  		</div>
							  		<div class = 'label-value d-inline-block'>
							  		".$row['doctor_mobile_number']."
							  		</div>
							  	</div>
							  	<div class = 'main-container'>
							  		<div class = 'label-container d-inline-block'>
							  			<div class = 'label'>Department</div>
							  		</div>
							  		<div class = 'label-value d-inline-block'>
							  		".$row['doctor_department']."
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
							  	</div>
							  	<div class = 'content-image'>
							  		<img class = 'img-thumb' src = '../".$row['patient_picture_url']."'>
							  	</div>
							  	</div>
							  	";	

  								}
							  ?>
					</div>
					<div id = 'submit-container'>
						<div class = 'btn orange' onclick="navigateToCreateRequest()">
							Create service request
						</div>
					</div>
				</div>
			</div>
			<div id  = 'navigator'>
				<div class = 'd-inline-block navigate-main'>
					<div class = 'navigate-botton' onclick="togglePage()">TOKEN</div>
				</div>
				<div class = 'd-inline-block navigate-main'>
					<div class = 'navigate-botton' onclick="togglePage()">APPOINTMENT</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>