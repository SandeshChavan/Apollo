

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
				<div id  = 'request'>
					<div id  = 'previous_records'>
						Previous records are shown here
					</div>
					<div id  = 'create_record'>
						<div onclick="navigateToCreateRequest()">
							Create service request
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