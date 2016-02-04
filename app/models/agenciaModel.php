<?php

	class agenciaModel extends Model {
	
		public function __construct() {
	
			parent::__construct();
		}

		public function getModels($category) {
			return DB::query("SELECT * FROM " . DB_PREFIX . "modelos WHERE cat=%s AND activo ='si' ORDER BY name LIMIT 10", $category);
		}

		

		
	}
		
?>