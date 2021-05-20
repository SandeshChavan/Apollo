<?php
include("../config/dbconnection.php");

$sql = "SELECT * FROM scheduled_appointment S,patient P WHERE doctor_id =".$_COOKIE['doctor_id']." AND S.patient_id = P.patient_id;";
echo $sql;
$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	  	echo "Success";
	} else {
	  echo "0 results";
	}

$sql1 = "SELECT * FROM patient_appointment A,patient P WHERE doctor_id =".$_COOKIE['doctor_id']." AND A.patient_id = P.patient_id;";
echo $sql1;
$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0) {
	  	echo "Success";
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
					<div id  = 'view_record'>
						<div>
							<div id = 'record'>
							<?php
							  while($row1 = $result1->fetch_assoc()) {
									
							  	echo "
							  	<div>
							  		".$row1['patient_id']."
							  	</div>
							  	<div>
							  		".$row1['patient_name']."
							  	</div>
							  	<div>
							  		".$row1['schedule_date']."
							  	</div>
							  	<div>
							  		".$row1['patient_mobile']."
							  	</div>
							  	<div onclick = 'navigateToIndividualReport(".$row1['patient_id'].",".$row1['appointment_id'].")'>
							  		View
							  	</div>
							  	";	

  								}
							  ?>
						
					</div>
						</div>
					</div>
				</div>
				<div id  = 'scheduled'>
					<div>
						<?php
							  while($row = $result->fetch_assoc()) {
									
							  	echo "
							  	<div>
							  		".$row['patient_id']."
							  	</div>
							  	<div>
							  		".$row['patient_name']."
							  	</div>
							  	<div>
							  		".$row['appointment_date']."
							  	</div>
							  	<div>
							  		".$row['patient_mobile']."
							  	</div>
							  	";	

  								}
							  ?>
					</div>
				</div>
			</div>
			<div class = 'col-6' onclick="togglePage()">Appointment request</div>
			<div class = 'col-6' onclick="togglePage()">Scheduled appointment</div>
		</div>
	</div>
</body>
</html>