function ExerciseLoader(){}

ExerciseLoader.DEFAUL_METHOD = "GET";
//ExerciseLoader.URL_REQUEST = "./ajax/movieLoader.php";
ExerciseLoader.EXERCISE_REQUEST = "./ajax/exerciseLoader.php";
ExerciseLoader.ASYNC_TYPE = true;

ExerciseLoader.SUCCESS_RESPONSE = "0";
ExerciseLoader.NO_MORE_DATA = "-1";

ExerciseLoader.search = function(pattern){
	var responseFunction = ExerciseLoader.onExerciseAjaxResponse;
	var queryString;
	if (pattern === null || pattern.length === 0){
		//ExerciseDashboard.removeContent();
		queryString = "?all";
	}
	else{
		queryString = "?pattern=" + pattern;
	}
	var url = ExerciseLoader.EXERCISE_REQUEST + queryString;

	AjaxManager.performAjaxRequest(ExerciseLoader.DEFAUL_METHOD, 
									url, ExerciseLoader.ASYNC_TYPE, 
									null, responseFunction);
}


ExerciseLoader.onExerciseAjaxResponse = function(response){
	if (response.responseCode === ExerciseLoader.SUCCESS_RESPONSE){
		ExerciseDashboard.refreshData(response.data);
		//console.log(response.message);
		return;
	}
	
	if (response.responseCode === ExerciseLoader.NO_MORE_DATA)
        ExerciseDashboard.setEmptyDashboard();
	return;
}
	