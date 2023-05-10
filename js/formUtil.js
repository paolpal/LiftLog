function checkEditUser(event) {
	//var form = document.querySelector("#userDataForm");
	var form = event.currentTarget;

	var usernameInput = form.querySelector('input[name="user"]');
	var nomeInput = form.querySelector('input[name="nome"]');
	var cognomeInput = form.querySelector('input[name="cognome"]');

	// Verifica se i valori sono diversi dai valori di default
	var usernameChanged = (usernameInput.value !== usernameInput.defaultValue);
	var nomeChanged = (nomeInput.value !== nomeInput.defaultValue);
	var cognomeChanged = (cognomeInput.value !== cognomeInput.defaultValue);

	// Verifica se almeno uno dei parametri è cambiato
	if (!usernameChanged && !nomeChanged && !cognomeChanged) {
	  	event.preventDefault();
		//alert("Nessun cambiamento rilevato. Modifica almeno un campo.");
		createErrorAlert("Nessun cambiamento rilevato. Modifica almeno un campo.");
	}
}


// Controlla l'unicità nel form Nuova Scheda
function checkUniqueSelects(formScheda) {
	//var selects = document.getElementsByTagName('select');
	var selects = formScheda.querySelectorAll('select');
	var values = [];
  
	for (var i = 0; i < selects.length; i++) {
	  var value = selects[i].value;
  
	  // Controlla se il valore è già presente nell'array
	if (values.includes(value)) {
		// Il valore è duplicato, esegui le azioni necessarie
		console.log('Errore: I valori delle select devono essere unici.');
		createErrorAlert('Non puoi selezionare lo stesso esercizio.');
		return false;
	}
  
	  // Aggiungi il valore all'array
	  values.push(value);
	}
  
	// Tutti i valori delle select sono unici
	return true;
}

function checkUserSelected() {
    var userId = document.querySelector("#userId").value;
	if (userId===""){
		console.log('Errore: Utente non selezionato.');
		createErrorAlert('Utente non selezionato.');
		return false;
	}
	return true;
}

function checkBeforeSave() {
	var formScheda = document.querySelector('#formScheda');
	var isUnique = checkUniqueSelects(formScheda);
	var isUserSelected = checkUserSelected();
	return isUnique && isUserSelected; 
}

function resetWorkoutForm() {
	var formScheda = document.querySelector('#formScheda');
	var exes = formScheda.querySelectorAll('.exe');
	for (var i = 0; i < exes.length; i++){
		exes[i].remove();
	}
}
  