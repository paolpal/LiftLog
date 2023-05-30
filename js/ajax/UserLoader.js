function UserLoader(){}

UserLoader.DEFAUL_METHOD = "GET";
UserLoader.USER_REQUEST = "./ajax/userLoader.php";
UserLoader.ASYNC_TYPE = true;

UserLoader.SUCCESS_RESPONSE = "0";
UserLoader.NO_MORE_DATA = "-1";

UserLoader.dataOfUser = function(userId) {
	var responseFunction = UserLoader.onAjaxResponse;
	var queryString = "?userId=" + userId;
	var url = UserLoader.USER_REQUEST + queryString;

	AjaxManager.performAjaxRequest(UserLoader.DEFAUL_METHOD, 
		url, UserLoader.ASYNC_TYPE, 
		null, responseFunction);
}

UserLoader.onAjaxResponse = function(response){
	if (response.responseCode === UserLoader.SUCCESS_RESPONSE){
		UserDashboard.refreshData(response.data, response.isTrainer);
		return;
	}
	
	if (response.responseCode === UserLoader.NO_MORE_DATA)
		UserDashboard.setEmptyDashboard();
	return;
}