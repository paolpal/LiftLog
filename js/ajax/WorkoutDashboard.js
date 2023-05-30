function WorkoutDashboard(){}

// **************** FIELD FORM NUOVA SCHEDA ****************

WorkoutDashboard.addExerciseFields = function(data){
	var container = document.getElementById("formScheda");

	var riga = document.createElement("div");
	riga.setAttribute("class", "exe");

	var select = WorkoutDashboard.createGruppedSelectExercise(data);
	var series = WorkoutDashboard.createSiriesPicker();
	var reps = WorkoutDashboard.createRepsPicker();
	var rest = WorkoutDashboard.createRestPicker();
	var trash = WorkoutDashboard.createTrashIcon();

	riga.appendChild(select);
	riga.appendChild(series);
	riga.appendChild(reps);
	riga.appendChild(rest);
	riga.appendChild(trash);

	container.appendChild(riga);
}

WorkoutDashboard.groupByParteCorpo = function(data) {
	return data.reduce((acc, element) => {
	  const { parteCorpo } = element;
	  if (!acc[parteCorpo]) {
		acc[parteCorpo] = [];
	  }
	  acc[parteCorpo].push(element);
	  return acc;
	}, {});
}
  

WorkoutDashboard.createSelectExercise = function(data){
	var div = document.createElement("div");
	var sel = document.createElement("select");
	sel.setAttribute("name", "name")
	if(data!=null)
	data.forEach(element => {
		var opt = document.createElement("option");
		opt.innerHTML = element.name;
		opt.value = element.id;
		sel.appendChild(opt);
	});
	div.appendChild(sel);
	return div;
}

WorkoutDashboard.createGruppedSelectExercise = function(data){
	var div = document.createElement("div");
	var sel = document.createElement("select");
	sel.setAttribute("name", "name")
	if(data!=null){
		var groupedData = WorkoutDashboard.groupByParteCorpo(data);
		const keys = Object.keys(groupedData);
		for (let i = 0; i < keys.length; i++) {
		  	const key = keys[i];
		  	const elements = groupedData[key];
			var optgroup = document.createElement("optgroup");
			optgroup.setAttribute("label", key);
		  	for (let j = 0; j < elements.length; j++) {
				var opt = document.createElement("option");
				opt.innerHTML = elements[j].name;
				opt.value = elements[j].id;
				optgroup.appendChild(opt);
		  	}
			sel.appendChild(optgroup);
		}
	}
	div.appendChild(sel);
	return div;
}

WorkoutDashboard.createSiriesPicker = function(){
	var div = document.createElement("div");
	var series = document.createElement("input");
	series.setAttribute("type", "number");
	series.setAttribute("name", "series");
	series.setAttribute("value", "3");
	div.appendChild(series);
	return div;
}

WorkoutDashboard.createRepsPicker = function(){
	var div = document.createElement("div");
	var reps = document.createElement("input");
	reps.setAttribute("type", "number");
	reps.setAttribute("name", "reps");
	reps.setAttribute("value", "10");
	div.appendChild(reps);
	return div;
}

WorkoutDashboard.createRestPicker = function(){
	var div = document.createElement("div");
	var rest = document.createElement("input");
	rest.setAttribute("type", "number");
	rest.setAttribute("name", "rest");
	rest.setAttribute("value", "30");
	rest.setAttribute("step", "30");
	div.appendChild(rest);
	return div;
}

WorkoutDashboard.createTrashIcon = function(){
	var div = document.createElement("div");
	var trash = document.createElement("i");
	trash.setAttribute("class", "fa fa-trash");
	trash.setAttribute("onclick", "UserEventHandler.delExercise(this)");
	div.appendChild(trash);
	return div;
}

WorkoutDashboard.removeContent = function(){
	var dashboardElement = document.getElementById("workoutDashboard");
	if (dashboardElement === null)
		return;
	
	var firstChild = dashboardElement.firstChild;
	while(firstChild !== null){
		dashboardElement.removeChild(firstChild);
		firstChild = dashboardElement.firstChild;
	}

}

// **************** ELENCO DELLE SCHEDE ****************


WorkoutDashboard.setEmptyDashboard = function(){
	WorkoutDashboard.removeContent();
}

WorkoutDashboard.refreshData = function(data, isTrainer) {
	WorkoutDashboard.removeContent();

	var dashboardElement = document.getElementById("workoutDashboard");
	for (var i = 0; i < data.length; i++){
		var workoutCard = WorkoutDashboard.createWorkoutCard(data[i], isTrainer);
		dashboardElement.appendChild(workoutCard);
	}
}

WorkoutDashboard.createWorkoutCard = function(currentData, isTrainer){
	var workoutCard = document.createElement("div");
	workoutCard.setAttribute("class", "scheda");

	var date = document.createElement("h4");
	date.textContent = currentData.assignDate;

	var header = WorkoutDashboard.createHeaderElement();
	var lista = WorkoutDashboard.createListElement(currentData);
	
	if(isTrainer) var cestino = WorkoutDashboard.createTrashElement(currentData);
	var stampa = WorkoutDashboard.createPrintElement(currentData);

	workoutCard.appendChild(date);
	workoutCard.appendChild(header);
	workoutCard.appendChild(lista);
	if(isTrainer) workoutCard.appendChild(cestino);
	workoutCard.appendChild(stampa);

	return workoutCard;
}

//<div class="header">
//	<div>Esercizio </div> 
//	<div class="info"> 
//		<div>Serie</div> 
//		<i class="fa fa-times"></i> 
//		<div>Ripetizioni</div> 
//		<div>Riposo</div> 
//	</div>
//</div>

WorkoutDashboard.createHeaderElement = function(){
	var header = document.createElement("div");
	header.setAttribute("class", "header");
	
	var exe = document.createElement("div");
	exe.textContent = "Esercizio";

	var info = document.createElement("div");
	info.setAttribute("class", "info");

	var series = document.createElement("div");
	series.textContent = "Serie";

	var times = document.createElement("i");
	times.setAttribute("class", "fa fa-times");

	var reps = document.createElement("div");
	reps.textContent = "Ripetizioni";

	var rest = document.createElement("div");
	rest.textContent = "Riposo";

	info.appendChild(series);
	info.appendChild(times);
	info.appendChild(reps);
	info.appendChild(rest);

	header.appendChild(exe);
	header.appendChild(info);

	return header;
}

WorkoutDashboard.createTrashElement = function(currentData){
	var button = document.createElement("button");
	var cestino = document.createElement("i");
	cestino.setAttribute("class", "fa fa-trash fa-xl");
	button.appendChild(cestino);
	button.setAttribute("onClick", "UserEventHandler.delWorkoutPlan("+currentData.id+","+currentData.userId+");");
	
	return button;
}

WorkoutDashboard.createPrintElement = function(currentData){
	var button = document.createElement("button");
	var stampa = document.createElement("i");
	stampa.setAttribute("class", "fa fa-print fa-xl");
	button.appendChild(stampa);
	button.setAttribute("onClick", "window.open('print.php?userId="+currentData.userId+"&workoutId="+currentData.id+"');");

	return button;
}

WorkoutDashboard.createListElement = function(currentData){
	var lista = document.createElement("ul");
	currentData.trainingList.forEach(exe => {
		var elem = document.createElement("li");
		
		var nome = document.createElement("div");
		nome.setAttribute("class", "exe");
		nome.innerHTML = exe.exercise;
		var info = document.createElement("div");
		info.setAttribute("class", "info");


		var series = document.createElement("div");
		series.textContent = exe.series;
		var times = document.createElement("i");
		times.setAttribute("class", "fa fa-times");
		var reps = document.createElement("div");
		reps.textContent = exe.reps;
		var rest = document.createElement("div");
		rest.textContent = exe.rest+" s";
		
		info.appendChild(series);
		info.appendChild(times);
		info.appendChild(reps);
		info.appendChild(rest);

		elem.appendChild(nome);
		elem.appendChild(info);

		lista.appendChild(elem);
	});
	return lista;
}