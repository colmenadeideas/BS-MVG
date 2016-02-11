<?php

	class controldeestudiosModel extends Model 
	{
	
		public function __construct() 
		{
	
			parent::__construct();
		}
		public function getPendingCronogramas()	
		{

			$result = DB::query("SELECT c.`id` ,c.`id_profesor`, p.`name`, p.`lastname`,c.`id_materia`, m.`nombre_materia`
									 FROM `cde_cronograma` AS c, `cde_profesor` AS p, `cde_materia` AS m  
											WHERE c.`status`='pending' 
													AND c.`id_materia` = m.`id`
													AND c.`id_profesor` = p.`id` ");
		
			return $result;		
		
		}

		public function getCronograma($id) {

			$result = DB::query("SELECT * 
									FROM cde_materia AS m, cde_cronograma AS c, cde_cronograma_actividades AS e
										WHERE 
										c.id = %i
										AND c.id = e.id_cronograma
										AND m.id = c.id_materia 								
									", $id);			
			
			return $result;		
	
		}

		public function getProfesores($id = '')	
		{
			if(empty($id))
			{
				$result = DB::query("SELECT * FROM `cde_profesor`  WHERE `status`='1' ");
			}
			else
			{
				$result = DB::query("SELECT * FROM `cde_profesor`  WHERE `status`='1' AND  `id`=$id");
			}	
			
			return $result;		
		}
		public function getCoursePeriodo()	
		{

			$result = DB::query("SELECT per.`id_pensum`, per.`id_courses`, per.`id_periodo`, name 
											FROM cde_pensum AS p, courses AS c, cde_periodo AS per 
												WHERE  p.`id_courses` = c.`id`
												    AND p.`id` = per.`id_pensum`
												         AND  per.`id_courses` = c.`id`
												            AND per.`estatus` = 'Activo' ");
			return $result;		
		}

		public function getPensumCourseMateria($id)
		{
			$result = DB::query("SELECT p.`id_courses`,`id_pensum`,m.`id` `id_materia`,`slug`,`nombre_materia`,`descripcion`,`trimestre`
										 FROM `courses` c, `cde_pensum` p,`cde_materia` m  
										 		WHERE p.`id_courses`=c.`id` 
              										and c.`id` = $id 
             										    and p.`estatus` = 'Activo' 
                       										and m.`id_pensum` = p.`id` ORDER BY  `m`.`trimestre` ASC ");
			return $result;	
		}
		public function getCourse($id)
		{

		    $result = DB::query("SELECT * FROM `courses` WHERE `id`=$id");
		    return $result;	
		}	
	}
		
?>