function WorkoutLoader(){}

WorkoutLoader.DEFAUL_METHOD = "GET";
WorkoutLoader.WORKOUT_REQUEST = "./ajax/workoutLoader.php";
WorkoutLoader.ASYNC_TYPE = true;

WorkoutLoader.SUCCESS_RESPONSE = "0";
WorkoutLoader.NO_MORE_DATA = "-1";

WorkoutLoader.workoutOfUser = function(userId) {
    var responseFunction = WorkoutLoader.onAjaxResponse;
    var queryString = "?userId=" + userId;
    var url = WorkoutLoader.WORKOUT_REQUEST + queryString;

    AjaxManager.performAjaxRequest(WorkoutLoader.DEFAUL_METHOD, 
        url, WorkoutLoader.ASYNC_TYPE, 
        null, responseFunction);
}

WorkoutLoader.onAjaxResponse = function(response){
    if (response.responseCode === WorkoutLoader.SUCCESS_RESPONSE){
		WorkoutDashboard.refreshData(response.data, response.isTrainer);
		return;
	}
	
	if (response.responseCode === WorkoutLoader.NO_MORE_DATA)
        WorkoutDashboard.setEmptyDashboard();
	return;
}