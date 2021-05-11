
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

function createItem(patient_id) {
	localStorage.setItem('patient_id', patient_id); 
} 

function getValue() {
	return localStorage.getItem('patient_id');  
} 



var loadFile = function(event) {
								var image = document.getElementById('output');
								image.src = URL.createObjectURL(event.target.files[0]);
								};


					