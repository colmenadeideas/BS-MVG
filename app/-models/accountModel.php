<?php

	class accountModel extends Model {
	
		public function __construct() {
	
			parent::__construct();
		}
		
		public function getAccount($data, $by='id') {			
			
			$table = 'student_profile';				
			$result = DB::query("SELECT * FROM " . DB_PREFIX . "$table WHERE $by=%s LIMIT 1", $data);
				
			if (empty($result)) {
			//if ($result < 1) {
				$table = 'user_profile';				
				$result = DB::query("SELECT * FROM " . DB_PREFIX . "$table WHERE $by=%s LIMIT 1", $data);
					
			}
			return $result;	
		}
		
			
				
	}
		
?>