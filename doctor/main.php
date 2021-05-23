<?php
include("../config/dbconnection.php");

$sql = "SELECT * FROM scheduled_appointment S,patient P WHERE doctor_id =".$_COOKIE['doctor_id']." AND S.patient_id = P.patient_id;";
$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	} else {
	  echo "0 results";
	}

$sql1 = "SELECT * FROM patient_appointment A,patient P WHERE doctor_id =".$_COOKIE['doctor_id']." AND A.patient_id = P.patient_id;";
$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0) {
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
	<script type="text/javascript" src="js/doctor_main.js"></script>
</head>
<body>
	<div class="container">
		<div class = "row">
			<div class = 'col-12'>
				<div id  = 'request'>
					<div>
						<div class = 'heading'>PATIENT TOKENS</div>
					</div>
					<div id  = 'view_record'>
							<?php
							  while($row1 = $result1->fetch_assoc()) {
									
							  	echo "
							  	<div class = 'record' onclick = 'navigateToIndividualReport(".$row1['patient_id'].",".$row1['appointment_id'].")'>
							  	<div class = 'content'>
							  	<div class = 'main-container'>
							  		<div class = 'label-container d-inline-block'>
							  			<div class = 'label'>Patient id</div>
							  		</div>
							  		<div class = 'label-value d-inline-block'>
							  		".$row1['patient_id']."
							  		</div>
							  	</div>
							  	<div class = 'main-container'>
							  		<div class = 'label-container d-inline-block'>
							  			<div class = 'label'>Patient name</div>
							  		</div>
							  		<div class = 'label-value d-inline-block'>
							  		".$row1['patient_name']."
							  		</div>
							  	</div>
							  	<div class = 'main-container'>
							  		<div class = 'label-container d-inline-block'>
							  			<div class = 'label'>Token date</div>
							  		</div>
							  		<div  class = 'label-value d-inline-block'>
							  		".$row1['schedule_date']."
							  		</div>
							  	</div>
							  	<div class = 'main-container'>
							  		<div class = 'label-container d-inline-block'>
							  			<div class = 'label'>Mobile</div>
							  		</div>
							  		<div class = 'label-value d-inline-block'>
							  		".$row1['patient_mobile']."
							  		</div>
							  	</div>
							  	</div>
							  	<div class = 'content-image'>
							  		<img class = 'img-thumb' src = '../".$row1['patient_picture_url']."'>
							  	</div>
							  	</div>
							  	";	

  								}
							  ?>
					</div>
				</div>



				<div id  = 'scheduled'>
					<div>
						<div class = 'heading'>APPOINTMENT SCHEDULED</div>
					</div>
						<?php
							  while($row = $result->fetch_assoc()) {	
							  	echo "
							  	<div class = 'record'>
							  	<div class = 'content'>
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
							  			<div class = 'label'>Appointment</div>
							  		</div>
							  		<div class = 'label-value d-inline-block'>
							  		".$row['appointment_date']."
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
							  	</div>
							  	<div class = 'content-image'>
							  		<img class = 'img-thumb' src = '../".$row['patient_picture_url']."'>
							  	</div>
							  	</div>
							  	";	

  								}
							  ?>
				
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