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
		public $name;
		public $image;
		public $description;

		function __construct($name = null, $image = null, $description = null){
			$this->name = $name;
			$this->image = $image;
			$this->description = $description;
		}
	}

?>