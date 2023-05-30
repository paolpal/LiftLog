function ExerciseDashboard(){}

ExerciseDashboard.removeContent = function(){
	var dashboardElement = document.getElementById("exerciseDashboard");
	if (dashboardElement === null)
		return;
	
	var firstChild = dashboardElement.firstChild;
	while(firstChild !== null){
		dashboardElement.removeChild(firstChild);
		firstChild = dashboardElement.firstChild;
	}

}

ExerciseDashboard.setEmptyDashboard = function(){
	ExerciseDashboard.removeContent();
}

ExerciseDashboard.refreshData = function(data){
	ExerciseDashboard.removeContent();

	var exerciseDeck = document.getElementById("exerciseDashboard");
	// Create Excercise card	
	for (var i = 0; i < data.length; i++){
		var exerciseCard = ExerciseDashboard.createExerciseCard(data[i]);
		exerciseDeck.appendChild(exerciseCard);
	}
}

ExerciseDashboard.createExerciseCard = function(currentData){
	var exerciseCard = document.createElement("div");
	exerciseCard.setAttribute("class", "excard");
	
	exerciseCard.appendChild(ExerciseDashboard.createIllustrationElement(currentData));
	exerciseCard.appendChild(ExerciseDashboard.createDetailExerciseElement(currentData));
	
	return exerciseCard; 
}

ExerciseDashboard.createDetailExerciseElement = function(currentData){
	var detailExercise = document.createElement("div");

	var nameExercise = document.createElement("h4");
	nameExercise.innerHTML = currentData.name;

	var descriptionExercise = document.createElement("p");
	descriptionExercise.innerHTML = currentData.description;
	
	detailExercise.appendChild(nameExercise);
	detailExercise.appendChild(descriptionExercise);

	return detailExercise;
}

ExerciseDashboard.createIllustrationElement = function(currentData){
	var imageExercise = document.createElement("img");
	imageExercise.setAttribute("src", "../img/"+currentData.image);
	imageExercise.setAttribute("alt", "");
	return imageExercise;
}
