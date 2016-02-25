<?php

	class agenciaModel extends Model {
	
		public function __construct() {
	
			parent::__construct();
		}

		public function getModels($category, $pagination_limit) 
		{
			$pagination_limit_end = $pagination_limit + 5;

			return DB::query("SELECT * FROM " . DB_PREFIX . "modelos WHERE cat=%s AND activo ='si' ORDER BY name LIMIT %i, %i", $category, $pagination_limit, $pagination_limit_end);
		}

		
		
	}
		
?>