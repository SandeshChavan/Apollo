<?php
include("header.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Hosipital Management system</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<script type="text/javascript" src="js/main.js"></script>  
</head>
<body>
	<script src="js/main.js"></script>
	<div class="container">
		<div class = "row card">
			<div class = 'col-12 box' onclick = "navigate('doctor')">
				<div class = 'box-style'>
					Doctor
				</div>
			</div>
			<div class = 'col-12 box' onclick = "navigate('patient')">
				<div class = 'box-style'>
					Patient
				</div>
			</div>
		</div>
		<div>
			<div id = 'logo-container'>
				<img id = 'logo' src ='images/playstore.png'>
			</div>
		</div>
		<div id = 'main-container'>
		<div id = 'footer'>
			Connecting the healing hands.
		</div>
	</div>
	</div>
</body>
</html>