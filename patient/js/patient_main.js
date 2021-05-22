
function navigateToRegister(){
	window.location.href = 'register.php';
}


function navigateToPatientMainPage(){
	window.location.href = 'patientMainPage.php';
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

function navigateToCreateRequest(){
	window.location.href = 'request.php';
}




var loadFile = function(event) {
								var image = document.getElementById('output');
								image.src = URL.createObjectURL(event.target.files[0]);
								};


function navigateToIndividualReport(patientId, appointmentId){
	var url = 'detail.php?patient_id=' + patientId + '&appointment_id=' + appointmentId;
	window.location.href = url;
}