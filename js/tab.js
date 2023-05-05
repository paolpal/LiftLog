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

function showPassword() {
	var x = document.getElementById("psw");
	var eye = document.getElementById("eye");
	if (x.type === "password") {
		x.type = "text";
		eye.classList.remove("fa-eye");
		eye.classList.add("fa-eye-slash");
	} else {
		x.type = "password";
		eye.classList.remove("fa-eye-slash");
		eye.classList.add("fa-eye");
	}
} 