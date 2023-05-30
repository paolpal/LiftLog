function UserEventHandler(){}

UserEventHandler.DEFAUL_METHOD = "GET";
UserEventHandler.POST_METHOD = "POST";
UserEventHandler.EXERCISE_REQUEST = "./ajax/exerciseLoader.php";
UserEventHandler.WORKOUT_REQUEST = "./ajax/workoutLoader.php";
UserEventHandler.ASYNC_TYPE = true;

UserEventHandler.SUCCESS_RESPONSE = "0";
UserEventHandler.NO_MORE_DATA = "-1";


UserEventHandler.addExerciseFields = function() {
	var responseFunction = UserEventHandler.addExerciseResponse;
	var queryString = "?all";
	var url = UserEventHandler.EXERCISE_REQUEST + queryString;

	AjaxManager.performAjaxRequest(UserEventHandler.DEFAUL_METHOD, 
		url, UserEventHandler.ASYNC_TYPE, 
		null, responseFunction);
}


UserEventHandler.addExerciseResponse = function(response){
	if (response.responseCode === UserEventHandler.SUCCESS_RESPONSE){
		WorkoutDashboard.addExerciseFields(response.data);
	}
	return;
}

UserEventHandler.delExercise = function(elem) {
	elem.parentElement.parentElement.remove();
}

UserEventHandler.saveWorkoutPlan = function() {

	// ------ Raccolta dati Form ----

	var form = document.getElementById("formScheda");
	var userId = document.getElementById("userId").value;
	var exes = form.getElementsByClassName("exe");
	var exesJson = [];
	for (const exe of exes) {
		var exeId = exe.getElementsByTagName("select")[0].value;
		var series = exe.getElementsByTagName("input")[0].value;
		var reps = exe.getElementsByTagName("input")[1].value;
		var rest = exe.getElementsByTagName("input")[2].value;
		var exeJson = {
			"exeId": exeId,
			"series": series,
			"reps": reps,
			"rest": rest
		}
		exesJson.push(exeJson);
	}
	var scheda = JSON.stringify(exesJson);

	// ------ Ajax ------

	var responseFunction = UserEventHandler.onWorkoutAjaxResponse;
	var queryString = "?userId="+userId+"&addWorkout="+scheda;
	var url = UserEventHandler.WORKOUT_REQUEST + queryString;

	AjaxManager.performAjaxRequest(UserEventHandler.DEFAUL_METHOD, 
		url, UserEventHandler.ASYNC_TYPE, 
		null, responseFunction);

}

UserEventHandler.onWorkoutAjaxResponse = function(response){
	if (response.responseCode === WorkoutLoader.SUCCESS_RESPONSE){
		WorkoutDashboard.refreshData(response.data, response.isTrainer);
	}
	else WorkoutDashboard.setEmptyDashboard();
	return;
}

UserEventHandler.delWorkoutPlan = function(workoutId, userId) {
	var responseFunction = UserEventHandler.onWorkoutAjaxResponse;
	var queryString = "?delWorkout="+workoutId+"&userId="+userId;
	var url = UserEventHandler.WORKOUT_REQUEST + queryString;

	AjaxManager.performAjaxRequest(UserEventHandler.DEFAUL_METHOD, 
		url, UserEventHandler.ASYNC_TYPE, 
		null, responseFunction);
}