function tablinkClick(event, userId){
	WorkoutLoader.workoutOfUser(userId);

	document.getElementById("userId").value = userId;
	tablinks = document.getElementsByClassName("tablinks");
	for (i = 0; i < tablinks.length; i++) {
		tablinks[i].className = tablinks[i].className.replace(" active", "");
	}
	event.currentTarget.className += " active";
}

function openTab(evt, cityName) {
	var i, tabcontent, tablinks;
	tabcontent = document.getElementsByClassName("tabcontent");
	for (i = 0; i < tabcontent.length; i++) {
		tabcontent[i].style.display = "none";
	}
	tablinks = document.getElementsByClassName("tablinks");
	for (i = 0; i < tablinks.length; i++) {
		tablinks[i].className = tablinks[i].className.replace(" active", "");
	}
	document.getElementById(cityName).style.display = "block";
	evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it

function showPassword(event) {
	var eye = event.target;
	var pwdField = event.target.parentNode.querySelector("input");
	if (pwdField.type === "password") {
		pwdField.type = "text";
		eye.classList.remove("fa-eye");
		eye.classList.add("fa-eye-slash");
	} else {
		pwdField.type = "password";
		eye.classList.remove("fa-eye-slash");
		eye.classList.add("fa-eye");
	}
} 