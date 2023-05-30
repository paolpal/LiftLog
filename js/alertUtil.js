function closeAlert(event){
	//var div = this.parentElement;
	var div = event.currentTarget.parentElement;
	div.style.opacity = "0";
	setTimeout(function(){ div.style.display = "none"; }, 600);
}

function createErrorAlert(message) {
	var alertDiv = document.createElement('div');
	alertDiv.className = 'alert';
	
	var closeBtn = document.createElement('span');
	closeBtn.className = 'closebtn';
	closeBtn.innerHTML = '&times;';
	closeBtn.addEventListener('click', function(event) {
	  closeAlert(event);
	});
	
	var strongElement = document.createElement('strong');
	strongElement.textContent = 'Attenzione! ';
	
	var errorMessage = document.createElement('span');
	errorMessage.textContent = message;
	
	alertDiv.appendChild(closeBtn);
	alertDiv.appendChild(strongElement);
	alertDiv.appendChild(errorMessage);
	
	document.body.appendChild(alertDiv);
}