<?php
include("../config/dbconnection.php");
if(isset($_COOKIE['patient_id'])) {
	$sql_query_1 = "SELECT * FROM PATIENT WHERE patient_id =".$_COOKIE['patient_id'].";";
}
	$result = $conn->query($sql_query_1);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
  	} else {
 	 echo "0 results";
	}
	$sql_query_2 = "SELECT * FROM DOCTOR";
	$result2 = $conn->query($sql_query_2);
	if ($result2->num_rows > 0) {
		$row2 = $result2->fetch_assoc();
  	} else {
 	 echo "0 results";
	}
if(isset($_POST['submit']) && isset($_COOKIE['patient_id']))
{
	$patient_id = $_COOKIE['patient_id'];
	echo $patient_id;
	$doctor_id = $_REQUEST['doctor_id'];
	$schedule_date = $_REQUEST['schedule_date'];
	$details = $_REQUEST['details'];
	$dir = "../images/";
	$patient_image_url = "images/".$_FILES['image']['name'];
	move_uploaded_file($_FILES["image"]["tmp_name"], $dir. $_FILES["image"]["name"]);
	$sql = "INSERT INTO patient_appointment(doctor_id, patient_id, schedule_date, details, patient_image_url)  VALUES ('$doctor_id','$patient_id','$schedule_date','$details','$patient_image_url');";
	if ($conn->query($sql) === TRUE) {
    		echo "Insert successful";
	} else {
  	echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
$sql_query_3 = "SELECT * FROM patient_appointment";
	$result3 = $conn->query($sql_query_3);
	if ($result3->num_rows > 0) {
		$row3 = $result3->fetch_assoc();
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
				<form  action="" method="post" enctype="multipart/form-data">
						<div>
							<div>
								<div class = 'text'>Name</div>
							</div>
							<div>
								<input class = 'form-control' type="text" name="patient_name" value = "<?php echo $row['patient_name']; ?>">
							</div>
						</div>
						<div>
							<div class = 'text-container'>
								<div class = 'text'>Email</div>
							</div>
							<div>
								<input class = 'form-control' type="text" name="patient_email" value = "<?php echo $row['patient_email']; ?>">
							</div>
						</div>
						<div>
							<div class = 'text-container'>
								<div class = 'text'>Mobile</div>
							</div>
							<div >
								<input class = 'form-control' type="text" name="patient_mobile" value = "<?php echo $row['patient_mobile']; ?>">
							</div>
						</div>
						<div>
							<div class = 'text-container'>
								<div class = 'text'>address</div>
							</div>
							<div>
								<input class = 'form-control' type="text" name="patient_address" value = "<?php echo $row['patient_address']; ?>">
							</div>
						</div>
						<div>
							<div class = 'text-container'>
								<div class = 'text'>Blood group</div>
							</div>
							<div>
								<select class = 'form-control' name = 'patient_blood_group' value = "<?php echo $row['patient_blood_group']; ?>">
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
								<select class = 'form-control' name = 'patient_sex' value = "<?php echo $row['patient_sex']; ?>">
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
								<input class = 'form-control' type="text" name="patient_age" value = "<?php echo $row['patient_age']; ?>">
							</div>
						</div>
						<div>
							<div class = 'text-container'>
								<div class = 'text'>Details</div>
							</div>
							<div>
								<textarea class = 'form-control' name="details"></textarea> 
							</div>
						</div>
						<div>
							<div class = 'd-inline-block'>
								<input type="file"  name="image" id="file"  onchange="loadFile(event)" style="display: none;">
								<label for="file" style="cursor: pointer;">Upload Image</label>
								<img id="output" width="200" />
							</div>
						</div>
						<div>
							<div class = 'text-container'>
								<div class = 'text'>Doctor</div>
							</div>
							<div class = 'text'>
								<?php 
								echo "<select class = 'form-control' name = 'doctor_id'>";								
								echo "<option  value='".$row2['doctor_id']."'>".$row2['doctor_name']."</option>";
								echo "</select>";
								 ?> 
							</div>
						</div>
						<div id = 'submit-container'>
							<input class = 'btn orange' type="submit" name="submit" id="submit" value="submit">
						</div>
					</form>
			</div>
		</div>
	</div>
</body>
</html>