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
				<div id  = 'result-container'>
					<div id = 'result-text'>MRI ANALYSIS</div>
				</div>
				<div class = 'image-container'>
					<img src = 'http://localhost/{{data[5]}}' class = 'image'>
				</div>
				<div class = 'image-container'>
					<img src = 'http://localhost/images/noise.png' class = 'image'>
				</div>
				<div class = 'image-container'>
					<img src = 'http://localhost/images/tumor-location.png' class = 'image'>
				</div>
				<div class = 'main-container'>
					<div class = 'label-container d-inline-block'>
						<div class = 'label1'>PREDICTION</div>
					</div>
					<div class = 'final-prediction d-inline-block'>
							  		{{final_prediction}}
					</div>
				</div>
				<div class = 'record-probablity'>
				<div id  = 'probablity'>Prediction probablity</div>
				<div class = 'main-container'>
					<div class = 'label-container d-inline-block'>
						<div class = 'label1'>GLIOMA</div>
					</div>
					<div class = 'label-value d-inline-block'>
							  		{{glioma}}
					</div>
				</div>
				<div class = 'main-container'>
					<div class = 'label-container d-inline-block'>
						<div class = 'label1'>MENINGIOMA</div>
					</div>
					<div class = 'label-value d-inline-block'>
							  		{{meningioma}}
					</div>
				</div>
				<div class = 'main-container'>
					<div class = 'label-container d-inline-block'>
						<div class = 'label1'>PITUITARY</div>
					</div>
					<div class = 'label-value d-inline-block'>
							  		{{pituitary}}
					</div>
				</div>
				<div class = 'main-container'>
					<div class = 'label-container d-inline-block'>
						<div class = 'label1'>NO TUMOR</div>
					</div>
					<div class = 'label-value d-inline-block'>
							  		{{notumor}}
					</div>
				</div>
				</div>
				<div class = 'main-container'>
					<div class = 'label-container d-inline-block'>
						<div class = 'label1'>GRADE</div>
					</div>
					<div class = 'label-value d-inline-block'>
							  		{{grade}}
					</div>
				</div>
				<div class = 'main-container'>
					<div class = 'label-container d-inline-block'>
						<div class = 'label1'>Patient name</div>
					</div>
					<div class = 'label-value d-inline-block'>
							  		{{data[7]}}
					</div>
				</div>
				<div class = 'main-container'>
					<div class = 'label-container d-inline-block'>
						<div class = 'label1'>Patient email</div>
					</div>
					<div class = 'label-value d-inline-block'>
							  		{{data[8]}}
					</div>
				</div>
				<div class = 'main-container'>
					<div class = 'label-container d-inline-block'>
						<div class = 'label1'>Patient mobile</div>
					</div>
					<div class = 'label-value d-inline-block'>
							  		{{data[9]}}
					</div>
				</div>
				<div id = 'submit-container'>
					<button onclick="window.print()" class = 'btn orange' id="submit">GENERATE PDF</button>
				</div>
				<div id = 'submit-container'>
					<button class = 'btn orange' id="schedule" onclick="navigateToScheduleAppointment('{{data[2]}}','{{data[0]}}')">SCHEDULE APPOINTMENT</button>
				<div>
				</div>	
			</div>
			</div>
		</div>
	</div>
</body>
</html>


<!-- {{final_prediction}}
			</div>
			<div>
				{{notumor}}
				{{glioma}}
				{{meningioma}}
				{{pituitary}}
			</div>
			<img src = 'http://localhost/images/noise.png'>
			<img src = 'http://localhost/images/tumor-location.png'>
			<div>				  
				<ol>
				For loop logic of jinja template
				{%for item in data%}
				  	<li>{{item}}</li>
				{%endfor%}
				</ol>
			</div>
			<button onclick="window.print()">Print this page</button>
			<button onclick="navigateToScheduleAppointment('{{data[2]}}','{{data[0]}}')
			">Schedule appoint</button> -->