<?php
include("../config/dbconnection.php");
if(isset($_POST['submit']))
{
	if(isset($_POST['patient_name']) && isset($_POST['patient_password'])){
		$name = $_REQUEST["patient_name"];
		$password = $_REQUEST["patient_password"];
	}
	$sql = "SELECT * FROM patient WHERE patient_name= '$name' AND patient_password= '$password';";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$patient_id = $row["patient_id"];
			setcookie('patient_id', $patient_id, time() + (86400 * 30), "/"); // 86400 = 1 day
  		}
	  	echo "<script >
	  	location.href = 'main.php';</script>";
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
	<script type="text/javascript" src="js/patient_main.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</head>
<body>
	<div class="container">
		<div class = "row">
			<div class = 'col-12'>
				<div>
					<form method="post" action="">
						<div>
							<input  type = 'text' name = 'patient_name' id="loginid">
						</div>
						<div>
							<input type = 'password' name = 'patient_password' id="password">
						</div>
						<div>
							<input  type="submit" name="submit" id="submit" value="submit">
						</div>
						<div>
							<div onClick = 'navigateToRegister()'>
								Register?
							</div>
						</div>
					</form>	
				</div>
			</div>
		</div>
	</div>
</body>
</html>