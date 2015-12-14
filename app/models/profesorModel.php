<?php

	class profesorModel extends Model {
	
		public function __construct() {
	
			parent::__construct();
		}
		
		
		public function getProfesor($data, $by='id') {	
			return DB::query("SELECT * FROM " . DB_PREFIX . "cde_profesor WHERE $by=%s LIMIT 1", $data);
		}
		
				
	}
		
?>

