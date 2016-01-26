<?php

	class cronogramasModel extends Model {
	
		public function __construct() {
	
			parent::__construct();
		}
		
		
		public function getCronograma($data, $by='id') 
		{	
			return DB::query("SELECT * FROM " . DB_PREFIX . "cde_cronograma WHERE $by=%s LIMIT 1", $data);
		}

		public function getMateria($data, $by='id') 
		{	
			return DB::query("SELECT * FROM " . DB_PREFIX . "cde_materia WHERE $by=%s LIMIT 1", $data);
		}		
		public function getProfesor($data, $by='id') 
		{	
			return DB::query("SELECT * FROM " . DB_PREFIX . "cde_profesor WHERE $by=%s LIMIT 1", $data);
		}
		
				
	}
		
?>

