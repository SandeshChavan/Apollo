function navigateToViewRequest(){
	window.location.href = 'report.php';
}

function togglePage(){
	 var request = document.getElementById("request");
	 var scheduled = document.getElementById("scheduled");
	 if(request.style.display === 'none'){
	 	request.style.display = 'block';
	 	scheduled.style.display = 'none';
	 } else {
	 	request.style.display = 'none';
	 	scheduled.style.display = 'block';
	 }
}

function navigateToIndividualReport(patientId, appointmentId){
	var url = 'detail.php?patient_id=' + patientId + '&appointment_id=' + appointmentId;
	window.location.href = url;
}

function predict(imageurl){
	window.location.href = 'http://localhost:12345/predict?imageUrl=' + imageUrl;
}