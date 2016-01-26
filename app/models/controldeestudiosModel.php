<?php

	class controldeestudiosModel extends Model 
	{
	
		public function __construct() 
		{
	
			parent::__construct();
		}
		 
		public function existemateria($codigo = '',$id_courses = '') 
		{			
			

			$result = DB::query("SELECT * FROM `cde_materia` AS m, `cde_pensum` AS p 
									WHERE p.`estatus` = 'Activo' 
										AND  m.`id_courses` =$id_courses
											AND m.`estatus`='Activo'
												AND m.`codigo`='".$codigo."'
													AND p.`id` = m.`id_pensum`");
				return $result;	
						
			
		}
		public function getTrimestreActivo() 
		{			
			$result = DB::query("SELECT * FROM `cde_trimestre` WHERE  CURDATE() <= `fechaFin` LIMIT 1 ");
			return $result;	
			
		}

		public function getMateriasPensum() 
		{			
			
			$result = DB::query("SELECT  p.`id_courses`, c.`name`,p.`id`
										FROM `cde_pensum` AS p, `courses` AS c 
												WHERE p.`id_courses` = c.`id`
														AND p.`estatus`= 'Activo'");
			return $result;	
		}
		public function getPensum($and = '',$other='',$atrib) 
		{			
			
			$result = DB::query("SELECT *
										FROM `cde_pensum` AS p $other
												WHERE p.`estatus`= 'Activo' $and ");
			return $result;	
		}

		public function getMaterias() 
		{			
			/*materia activas*/
			$table = 'materia';				
			//$result = DB::query("SELECT nombre_materia FROM " . DB_PREFIX . "$table");
			$result = DB::query("SELECT * FROM cde_pensum_y_materias AS pm, cde_pensum AS p, cde_materia AS m, courses AS c 
						WHERE pm.`id_materia` = m.`id` 
							AND pm.`id_pensum` = p.`id` 
								AND p.`estatus` ='Activo' 
									AND m.`id_courses` = c.`id` ");
			return $result;	
		}

		public function getPendingCronogramas()	{

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



			/*$result = DB::query("SELECT e.`nombre_evaluacion`,e.`descripcion` 
											FROM `cronograma` as c, `evaluacion` as e 
												WHERE c.`id`=$id
											 		and e.`id_cronograma` = c.`id`");
			return $result;*/		
		}

		public function cronogramaPenditeEvaluacion($id_materia, $id_profesor= "") {
			if ($id_profesor != "") {
				$and = " and p.id = $id_profesor" ;
			} else {
				$and = "" ;
			}
			$result = DB::query("SELECT e.nombre_evaluacion,e.descripcion,e.id_cronograma 
										 FROM cde_materia AS m, cde_periodo AS per, cde_cronograma AS c, cde_cronograma_actividades AS e, cde_profesor AS p, cde_pensum AS pen, courses AS cou 
												WHERE c.id = e.id_cronograma 
													and m.id = c.id_materia 
													and p.id = c.id_profesor 
													and c.status = 'pending' 
													and m.id_courses = cou.id 
													and pen.id_courses = cou.id
													and pen.estatus = 'Activo' 
													and per.id_pensum = pen.id
													and m.id = $id_materia ".
													$and."");
			return $result;		



			/*$result = DB::query("SELECT e.`nombre_evaluacion`,e.`descripcion` 
											FROM `cronograma` as c, `evaluacion` as e 
												WHERE c.`id`=$id
											 		and e.`id_cronograma` = c.`id`");
			return $result;*/		
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

			
	}
		
?>