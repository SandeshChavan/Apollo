<?php
include("../config/dbconnection.php");


$sql1 = "SELECT * FROM scheduled_appointment A,doctor D WHERE patient_id =".$_COOKIE['patient_id']." AND A.doctor_id = D.doctor_id;";
echo $sql1;
$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0) {
	  	echo "Success";
	} else {
	  echo "0 results";
	}



$sql = "SELECT * FROM patient_appointment A,doctor D WHERE patient_id =".$_COOKIE['patient_id']." AND A.doctor_id = D.doctor_id;";
echo $sql;
$result = $conn->query($sql);
	if ($result->num_rows > 0) {
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
	<script type="text/javascript" src="js/patient_main.js"></script>
</head>
<body>
	<div class="container">
		<div class = "row">
			<div class = 'col-12'>
				<div id  = 'scheduled'>
					<div id = 'record'>
							<?php
							  while($row1 = $result1->fetch_assoc()) {
									
							  	echo "
							  	<div>
							  		".$row1['doctor_name']."
							  	</div>
							  	<div>
							  		".$row1['doctor_email']."
							  	</div>
							  	<div>
							  		".$row1['doctor_department']."
							  	</div>
							  	<div>
							  		".$row1['appointment_date']."
							  	</div>
							  	<div>
							  		".$row1['doctor_note']."
							  	</div>
							  	";	

  								}
							  ?>
						</div>
				</div>
				<div id  = 'request'>
					<div id  = 'previous_records'>
						<?php
							  while($row = $result->fetch_assoc()) {
									
							  	echo "
							  	<div>
							  		".$row['doctor_name']."
							  	</div>
							  	<div>
							  		".$row['doctor_email']."
							  	</div>
							  	<div>
							  		".$row['doctor_department']."
							  	</div>
							  	<div>
							  		".$row['schedule_date']."
							  	</div>
							  	";	

  								}
							  ?>
					</div>
					<div id  = 'create_record'>
						<div onclick="navigateToCreateRequest()">
							Create service request
						</div>
					</div>
				</div>
			</div>
			<div class = 'col-6' onclick="togglePage()">appointment</div>
			<div class = 'col-6' onclick="togglePage()">Previous appointment</div>
		</div>
	</div>
</body>
</html>