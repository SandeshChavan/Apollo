
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

navigateToCreateRequest(){
	window.location.href = 'request.php';
}