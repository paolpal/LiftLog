function WorkoutDashboard(){}

WorkoutDashboard.addExercise = function(currentData){
    var container = document.getElementById("formScheda");

	var riga = document.createElement("div");
	riga.setAttribute("class", "exe");

	var select = WorkoutDashboard.createSelectExercise(currentData);
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

WorkoutDashboard.createSelectExercise = function(data){
	var div = document.createElement("div");
	var sel = document.createElement("select");
	sel.setAttribute("name", "name")
	if(data!=null)
	data.forEach(element => {
		var opt = document.createElement("option");
		opt.textContent = element.name;
		opt.value = element.id;
		sel.appendChild(opt);
	});
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

WorkoutDashboard.setEmptyDashboard = function(){
	WorkoutDashboard.removeContent();
}

WorkoutDashboard.refreshData = function(data) {
	WorkoutDashboard.removeContent();

	var dashboardElement = document.getElementById("workoutDashboard");
	for (var i = 0; i < data.length; i++){
        var workoutCard = WorkoutDashboard.createWorkoutCard(data[i]);
        dashboardElement.appendChild(workoutCard);
    }
}

WorkoutDashboard.createWorkoutCard = function(currentData){
	var workoutCard = document.createElement("div");
	workoutCard.setAttribute("class", "scheda");

	var date = document.createElement("h4");
	date.textContent = currentData.assignDate;

	var lista = WorkoutDashboard.createListElement(currentData);
	var cestino = document.createElement("i");
	cestino.setAttribute("class", "fa fa-trash fa-lg");
	var stampa = document.createElement("i");
	stampa.setAttribute("class", "fa fa-print fa-lg");

	workoutCard.appendChild(date);
	workoutCard.appendChild(lista);
	workoutCard.appendChild(cestino);
	workoutCard.appendChild(stampa);

	return workoutCard;
}

WorkoutDashboard.createListElement = function(currentData){
	var lista = document.createElement("ul");
	currentData.trainingList.forEach(exe => {
		var elem = document.createElement("li");
		
		var nome = document.createElement("div");
		nome.setAttribute("class", "exe");
		nome.textContent = exe.exercise;
		var info = document.createElement("div");
		info.setAttribute("class", "info");


		var series = document.createElement("div");
		series.textContent = exe.series;
		var times = document.createElement("i");
		times.setAttribute("class", "fa fa-times");
		var reps = document.createElement("div");
		reps.textContent = exe.reps;
		var rest = document.createElement("div");
		rest.textContent = exe.rest;
		
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