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
						<div onclick="navigateToViewRequest()">
							View patient request
						</div>
					</div>
				</div>
				<div id  = 'scheduled'>
					I am schedule
				</div>
			</div>
			<div class = 'col-6' onclick="togglePage()">Appointment request</div>
			<div class = 'col-6' onclick="togglePage()">Scheduled appointment</div>
		</div>
	</div>
</body>
</html>