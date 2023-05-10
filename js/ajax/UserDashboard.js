function UserDashboard(){}

UserDashboard.removeContent = function(){
	var dashboardElement = document.getElementById("userDashboard");
	if (dashboardElement === null)
		return;
	
	var firstChild = dashboardElement.firstChild;
	while(firstChild !== null){
		dashboardElement.removeChild(firstChild);
		firstChild = dashboardElement.firstChild;
	}

}

UserDashboard.setEmptyDashboard = function(){
	UserDashboard.removeContent();
}


UserDashboard.refreshData = function(data, isTrainer) {
	UserDashboard.removeContent();

	var dashboardElement = document.getElementById("userDashboard");
	for (var i = 0; i < data.length; i++){
		var header = document.createElement("h3");
		header.innerHTML = "Informazioni Utente";
		dashboardElement.appendChild(header);
		var updateUserDataForm = UserDashboard.createUpdateUserDataForm(data[i]);
		dashboardElement.appendChild(updateUserDataForm);
		if(isTrainer){
			var updatePswForm = UserDashboard.createTrainerPasswordForm(data[i]);
			dashboardElement.appendChild(updatePswForm);
			var deleteForm = UserDashboard.createDeleteForm(data[i]);
			dashboardElement.appendChild(deleteForm);
		}
		else{
			var updatePswForm = UserDashboard.createPasswordForm(data[i]);
			dashboardElement.appendChild(updatePswForm);
		}
	}
}

// ******************* USER DATA FORM *******************

UserDashboard.createUpdateUserDataForm = function(currentData) {
	var form = UserDashboard.createFormElement("util/updateuser.php", "userDataForm");
	var container = UserDashboard.createContainer();
	form.appendChild(container);

	form.addEventListener("submit", checkEditUser);

	UserDashboard.createUsernameField(container, currentData);
	UserDashboard.createNomeField(container, currentData);
	UserDashboard.createCognomeField(container, currentData);
	UserDashboard.createUserIdField(container, currentData);
	UserDashboard.createSaveButton(container);
	return form;
}


UserDashboard.createContainer = function() {
	var container = document.createElement("div");
	container.className = "container";
	return container;
}

UserDashboard.createUsernameField = function(container, currentData) {
	var usernameLabel = UserDashboard.createLabel("Username");
	var usernameInput = UserDashboard.createInput("text", "Username..", "user", currentData.username);
	container.appendChild(usernameLabel);
	container.appendChild(usernameInput);
}

UserDashboard.createNomeField = function(container, currentData) {
	var nomeLabel = UserDashboard.createLabel("Nome");
	var nomeInput = UserDashboard.createInput("text", "Nome..", "nome", currentData.nome);
	container.appendChild(nomeLabel);
	container.appendChild(nomeInput);
}

UserDashboard.createCognomeField = function(container, currentData)  {
	var cognomeLabel = UserDashboard.createLabel("Cognome");
	var cognomeInput = UserDashboard.createInput("text", "Cognome..", "cognome", currentData.cognome);
	container.appendChild(cognomeLabel);
	container.appendChild(cognomeInput);
}
  
UserDashboard.createUserIdField = function(container, currentData)  {
	var userIdInput = UserDashboard.createInput("hidden", "", "userId", currentData.id);
	container.appendChild(userIdInput);
}
  
UserDashboard.createSaveButton = function(container) {
	var saveButton = document.createElement("button");
	saveButton.type = "submit";
	saveButton.className = "updatebtn";
	saveButton.innerHTML = "Salva";
	container.appendChild(saveButton);
}

// ******************* PASSWORD FORM *******************

UserDashboard.createPasswordForm = function(currentData) {
	var form = UserDashboard.createFormElement("util/updatepassword.php", "pswForm");
	var container = UserDashboard.createContainer();
	form.appendChild(container);
	UserDashboard.createUserIdField(container, currentData);
	UserDashboard.createPasswordField(container);
	UserDashboard.createNewPasswordField(container);
	UserDashboard.createChangePasswordButton(container);
	return form;
}

// ******************* TRAINER PASSWORD FORM *******************

UserDashboard.createTrainerPasswordForm = function(currentData) {
	var form = UserDashboard.createFormElement("util/trainerupdatepassword.php", "trainerPswForm");
	var container = UserDashboard.createContainer();
	form.appendChild(container);
	UserDashboard.createUserIdField(container, currentData);
	UserDashboard.createNewPasswordField(container);
	UserDashboard.createChangePasswordButton(container);
	return form;
}
  
UserDashboard.createUserIdField = function(container, currentData) {
	var userIdInput = UserDashboard.createInput("hidden", "", "userId", currentData.id);
	container.appendChild(userIdInput);
}
  
UserDashboard.createPasswordField = function(container) {
	var passwordLabel = UserDashboard.createLabel("Vecchia Password");
	var passwordInput = UserDashboard.createInput("password", "Password..", "psw", "");
	container.appendChild(passwordLabel);
	container.appendChild(passwordInput);
}
  
UserDashboard.createNewPasswordField = function(container) {
	var newPasswordLabel = UserDashboard.createLabel("Nuova Password");
	var newPasswordInput = UserDashboard.createInput("password", "Nuova Password..", "newPsw", "");
	container.appendChild(newPasswordLabel);
	container.appendChild(newPasswordInput);
}
  
UserDashboard.createChangePasswordButton = function(container) {
	var changePasswordButton = document.createElement("button");
	changePasswordButton.type = "submit";
	changePasswordButton.className = "updatebtn";
	changePasswordButton.innerHTML = "Cambia Password";
	container.appendChild(changePasswordButton);
}

// ******************* DELETE FORM *******************

UserDashboard.createDeleteForm = function(currentData) {
	var form = UserDashboard.createFormElement("util/deleteaccount.php", "deleteForm");
	var container = UserDashboard.createContainer();
	form.appendChild(container);
	UserDashboard.createUserIdField(container, currentData);
	UserDashboard.createDeleteButton(container);
	return form;
}
  
UserDashboard.createUserIdField = function(container, currentData) {
	var userIdInput = UserDashboard.createInput("hidden", "", "userId", currentData.id);
	container.appendChild(userIdInput);
}
  
UserDashboard.createDeleteButton = function(container) {
	var deleteButton = document.createElement("button");
	deleteButton.type = "submit";
	deleteButton.className = "deletebtn";
	deleteButton.innerHTML = "Elimina Account";
	container.appendChild(deleteButton);
}

// Funzioni di Utility
  
UserDashboard.createLabel = function(text) {
	var label = document.createElement("label");
	label.innerHTML = "<b>" + text + "</b>";
	return label;
}
  
UserDashboard.createInput = function(type, placeholder, name, value) {
	var input = document.createElement("input");
	input.type = type;
	input.placeholder = placeholder;
	input.name = name;
	input.value = value;
	input.defaultValue = value;
	return input;
}

UserDashboard.createFormElement = function(action, id) {
	var form = document.createElement("form");
	form.action = action;
	form.className = "editUser";
	form.method = "POST";
	form.id = id;
	return form;
}