function UserEventHandler(){}

UserEventHandler.DEFAUL_METHOD = "GET";
UserEventHandler.POST_METHOD = "POST";
UserEventHandler.EXERCISE_REQUEST = "./ajax/exerciseLoader.php";
UserEventHandler.WORKOUT_REQUEST = "./ajax/workoutLoader.php";
UserEventHandler.ASYNC_TYPE = true;

UserEventHandler.SUCCESS_RESPONSE = "0";
UserEventHandler.NO_MORE_DATA = "-1";


UserEventHandler.addExercise = function() {
    var responseFunction = UserEventHandler.addExerciseResponse;
    var queryString = "?all";
    var url = UserEventHandler.EXERCISE_REQUEST + queryString;

    AjaxManager.performAjaxRequest(UserEventHandler.DEFAUL_METHOD, 
        url, UserEventHandler.ASYNC_TYPE, 
        null, responseFunction);
}


UserEventHandler.addExerciseResponse = function(response){
    if (response.responseCode === UserEventHandler.SUCCESS_RESPONSE){
		WorkoutDashboard.addExercise(response.data);
	}
    return;
}

UserEventHandler.delExercise = function(elem) {
	elem.parentElement.parentElement.remove();
}

UserEventHandler.saveWorkoutPlan = function() {
    var form = document.getElementById("formScheda");
    var userId = document.getElementById("userId").value;
    //console.log(form);
    var exes = form.getElementsByClassName("exe");
    //console.log(exes.length);
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
    var data = {
        "userId": userId,
        "exes": exesJson
    }
    var scheda = JSON.stringify(data);

    // ------ Ajax ------

    var responseFunction = UserEventHandler.addExerciseResponse;
    var queryString = "?workout="+scheda;
    var url = UserEventHandler.WORKOUT_REQUEST + queryString;

    AjaxManager.performAjaxRequest(UserEventHandler.DEFAUL_METHOD, 
        url, UserEventHandler.ASYNC_TYPE, 
        null, responseFunction);

}

UserEventHandler.onWorkoutAjaxResponse = function(response){
    if (response.responseCode === WorkoutLoader.SUCCESS_RESPONSE){
		//WorkoutDashboard.refreshData(response.data);
		//return;
	}
	//if (response.responseCode === WorkoutLoader.NO_MORE_DATA)
    //    WorkoutDashboard.setEmptyDashboard();
	return;
}