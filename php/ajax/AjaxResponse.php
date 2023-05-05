<?php  
	/*
		AjaxResponse is the class that will be sent back to the client at every Ajax request.
		The class is serialize according the Json format through the json_encode function, that 
		serialize ONLY the public property.
		
		It is possibile to serialize also protected and private property but it is out of the course scope.
	*/
	class AjaxResponse{
		public $responseCode; // 0 all ok - 1 some errors - -1 some warning
		public $message;
		public $data;
		
		function __construct($responseCode = 1, 
								$message = "Somenthing went wrong! Please try later.",
								$data = null){
			$this->responseCode = $responseCode;
			$this->message = $message;
			$this->data = null;
		}
	
	}

	class Exercise {
		public $id;
		public $name;
		public $image;
		public $parteCorpo;
		public $description;

		function __construct($id=null, $name = null, $image = null, $parteCorpo = null, $description = null){
			$this->id = $id;
			$this->name = $name;
			$this->image = $image;
			$this->parteCorpo = $parteCorpo;
			$this->description = $description;
		}
	}

	class Training {
		public $exercise; // stringa nome
		public $workout;
		public $series;
		public $reps;
		public $rest;

		function __construct($exercise=null, $workout = null, $series = null, $reps = null, $rest = null){
			$this->exercise = $exercise;
			$this->workout = $workout;
			$this->series = $series;
			$this->reps = $reps;
			$this->rest = $rest;
		}
	}

	class Workout {
		public $id;
		public $userId;
		public $assignDate;
		public $trainingList;

		function __construct($id=null, $userId = null, $assignDate = null, $trainingList = null){
			$this->id = $id;
			$this->userId = $userId;
			$this->assignDate = $assignDate;
			$this->trainingList = $trainingList;
		}
	}

?>