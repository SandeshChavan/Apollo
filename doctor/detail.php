<?php
include("../config/dbconnection.php");
	if(isset($_GET['patient_id']) && isset($_GET['appointment_id'])){
	$sql = "SELECT * FROM patient_appointment A,patient P WHERE doctor_id =".$_COOKIE['doctor_id']."  AND A.patient_id =".$_GET['patient_id']." AND appointment_id = ".$_GET['appointment_id']." AND A.patient_id = P.patient_id;";
	echo $sql;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	  	echo "Success";
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
				<div id = 'record-container'>
					<div id = 'record'>
						
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
							  		".$row['schedule_date']."
							  	</div>
							  	<div>
							  		".$row['patient_mobile']."
							  	</div>
							  	<div>
							  		<img src = ../".$row['patient_image_url'].">
							  	</div>
							  	<div onclick = 'predict(\"".$row['patient_image_url']."\" , \"".$_COOKIE['doctor_id']."\" , \"".$row['patient_id']."\", \"".$row['appointment_id']."\")'>
							  		Scan
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
