<?php

	class controlestudioModel extends Model 
	{
	
		public function __construct() {
	
			parent::__construct();
		}
		
		public function getMateriaAll() 
		{			
			
			$table = 'materia';				
			$result = DB::query("SELECT nombre_materia FROM " . DB_PREFIX . "$table");
				
		
			return $result;	
		}
		public function cronogramaPendite()
		{

			$result = DB::query("SELECT c.`id`,m.`nombre_materia`,p.`nombre_profesor`,c.`data` 
									FROM `materia` as m, `cronograma` as c,`profesor` as p 
									    WHERE c.`id_materia` = m.`id` 
									    		and c.`id_profesor` = p.`id` 	
									    			and c.`estatus`='pendiente' ");
				
		
			return $result;		
		}
		
			
				
	}
		
?>