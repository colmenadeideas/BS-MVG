<?php
	
	class Controller {
	
		public function __construct(){
			
			$this->view = new View();
			$this->helper = new Helper();
			$this->email = new Email();
			$this->user = new User();
			
			//Added for PuntoLaser 16-03-14
			//$this->upload_handler = new UploadHandler();			
							
			$this->user->init(); //Added 26-10-13 to keep sessions through Controllers
		
		}
				 		
		/**
		 * 
		 * @param string $name Name of the model
		 * @param string $path Location of the models	
		 */
		public function loadModel($name, $modelPath = '../app/models/') {
			
			$path = $modelPath . $name.'Model.php';
			
			if (file_exists($path)) {
				require_once  $modelPath .$name.'Model.php';
				
				$modelName = $name . 'Model';
				
				$this->model = new $modelName();
				// TEST echo "<br>Cargo $modelName";
			}        
		}				
					
	}
	
?>