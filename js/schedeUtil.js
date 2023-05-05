function tablinkClick(event, userId){
    WorkoutLoader.workoutOfUser(userId);
    document.getElementById("userId").value = userId;

    tablinks = document.getElementsByClassName("tablinks");
	for (i = 0; i < tablinks.length; i++) {
		tablinks[i].className = tablinks[i].className.replace(" active", "");
	}
	event.currentTarget.className += " active";
}