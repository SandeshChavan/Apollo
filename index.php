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
		<div class = "row">
			<div class = 'col-12' onclick = "navigate('doctor')">
				Doctor
			</div>
			<div class = 'col-12' onclick = "navigate('patient')">
				Patient
			</div>
		</div>
	</div>
</body>
</html>
<?php
include("footer.php");
?>