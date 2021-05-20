<html>
<head>
	<title>Hosipital Management system</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="http://localhost/css/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="http://localhost/doctor/css/style.css">
	<script type="text/javascript" src="http://localhost/doctor/js/doctor_main.js"></script>
</head>
<body>
	<div class="container">
		<div class = "row">
			<div class = 'col-12'>
				{{final_prediction}}
			</div>
			<div>				  
				<ol>
				<!-- For loop logic of jinja template -->
				{%for item in data%}
				  	<li>{{item}}</li>
				{%endfor%}
				</ol>
			</div>
			<button onclick="window.print()">Print this page</button>
			<button onclick="navigateToScheduleAppointment('{{data[2]}}','{{data[0]}}')
			">Schedule appoint</button>
		</div>
	</div>
</body>
</html>
