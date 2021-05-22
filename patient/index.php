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
	<script type="text/javascript" src="js/patient_main.js"></script></script>
</head>
<body>
	<div class="container">
		<div class = "row card">
			<div class = 'col-12'>
				<div>
					<form method="post" action="">
						<div id  = 'sign-in-container'>
							<div id  = 'sign-in'>
								Sign in
							</div>
						</div>
						<div>
							<div class = 'd-inline-block'>
								New User?
							</div>
							<div id = 'register' class = 'd-inline-block' onClick = 'navigateToRegister()'>
								Create new account?
							</div>
						</div>
						<div class  = 'text-container'>
							<div class = 'text'>
								Patient Username
							</div>
						</div>
						<div>
							<input class = 'form-control'  type = 'text' name = 'patient_name' id="loginid">
						</div>
						<div class  = 'text-container'>
							<div class = 'text'>
								Password
							</div>
						</div>
						<div>
							<input class = 'form-control' type = 'password' name = 'patient_password' id="password">
						</div>
						<div class = 'login-container'>
							<input class ='btn' type="submit" name="submit" id="submit" value="submit">
						</div>
					</form>	
				</div>
			</div>
		</div>
	</div>
</body>
</html>