<?php
include("../config/dbconnection.php");
if(isset($_POST['submit']))
{
	if(isset($_POST['name']) && isset($_POST['password'])){
		$name = $_REQUEST["name"];
		$password = $_REQUEST["password"];
	}
	$sql = "SELECT * FROM doctor WHERE doctor_name= '$name' AND doctor_password= '$password';";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$doctor_id = $row["doctor_id"];
			setcookie('doctor_id', $doctor_id, time() + (86400 * 30), "/"); // 86400 = 1 day
  		}
	  	echo "<script >
	  	location.href = 'main.php';</script>";
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
</head>
<body>
	<div class="container">
		<div class = "row">
			<div class = 'col-12'>
				<div>
					<form method="post" action="">
						<div>
							<input  type = 'text' name = 'name' id="loginid">
						</div>
						<div>
							<input type = 'password' name = 'password' id="password">
						</div>
						<div>
							<input  type="submit" name="submit" id="submit" value="submit">
						</div>
					</form>	
				</div>
			</div>
		</div>
	</div>
</body>
</html>