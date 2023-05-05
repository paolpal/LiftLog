function tablinkClick(userId){
    WorkoutLoader.workoutOfUser(userId);
    document.getElementById("userId").value = userId;
}