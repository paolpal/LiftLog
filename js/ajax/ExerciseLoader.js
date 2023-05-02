function ExerciseLoader(){}

ExerciseLoader.DEFAUL_METHOD = "GET";
//ExerciseLoader.URL_REQUEST = "./ajax/movieLoader.php";
ExerciseLoader.EXPLORE_REQUEST = "./ajax/exerciseLoader.php";
ExerciseLoader.ASYNC_TYPE = true;

ExerciseLoader.SUCCESS_RESPONSE = "0";
ExerciseLoader.NO_MORE_DATA = "-1";

ExerciseLoader.search = function(pattern){
	if (pattern === null || pattern.length === 0){
		ExerciseDashboard.removeContent();
		return;	
	}
		
	var queryString = "?pattern=" + pattern;
	var url = ExerciseLoader.EXPLORE_REQUEST + queryString;
	var responseFunction = ExerciseLoader.onExploreAjaxResponse;

	AjaxManager.performAjaxRequest(ExerciseLoader.DEFAUL_METHOD, 
									url, ExerciseLoader.ASYNC_TYPE, 
									null, responseFunction);
}


ExerciseLoader.onExploreAjaxResponse = function(response){
	if (response.responseCode === ExerciseLoader.SUCCESS_RESPONSE){
		ExerciseDashboard.refreshData(response.data);
		//console.log(response.message);
		return;
	}
	
	if (response.responseCode === ExerciseLoader.NO_MORE_DATA);
        ExerciseDashboard.setEmptyDashboard();
	
}
	