<?php 
	
	class commentsController extends Controller {
		
		public function __construct() {
						
			parent::__construct();
			
		}
	
		
		public function process($) {
				
			$array_data = array();	
			foreach ($_POST as $key => $value) {
				$field = escape_value($key);
				$field_data = escape_value($value);
				
				$array_data[$field] = $field_data;
			}
			unset($array_data['submit']);
			
			
					
			/*****  PROCESS PAYMENT  *****/
			
			$array_registration['id']			 =	$array_data['id'];
			unset($array_data['id']);
	
			
			$array_registration['data_payment']	 = 	json_encode($array_data);
			$array_registration['status']	 =  'clearpayment';
												 //awaits for payment checkup
			
			$create_registration = $this->step2($array_registration);	
			//print_r($registration);
					
			
		}
	
	
	}
?>