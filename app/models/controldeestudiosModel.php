<?php

	class controldeestudiosModel extends Model 
	{
	
		public function __construct() {
	
			parent::__construct();
		}
		 
		public function existemateria($codigo = '',$id_courses = '') 
		{			
			

			$result = DB::query("SELECT * FROM `materia` as m, `pensum` as p 
									where p.`estatus` = 'Activo' 
										and  m.`id_courses` =$id_courses
											and m.`estatus`='Activo'
												and m.`codigo`='".$codigo."'
													and p.`id` = m.`id_pensum`");
				return $result;	
						
			
		}
		public function getTrimestreActivo() 
		{			
			$result = DB::query("SELECT * FROM `trimestre` WHERE  CURDATE() <= `fechaFin` limit 1 ");
			return $result;	
			
		}

		public function getMateriasPensum() 
		{			
			
			$result = DB::query("SELECT  p.`id_courses`, c.`name`,p.`id`
										FROM `pensum` as p, `courses`as c 
												where p.`id_courses` = c.`id`
														and p.`estatus`= 'Activo'");
			return $result;	
		}
		public function getPensum($and = '',$other='',$atrib) 
		{			
			
			$result = DB::query("SELECT *
										FROM `pensum` as p $other
												where p.`estatus`= 'Activo' $and ");
			return $result;	
		}


		

		public function getMaterias() 
		{			
			/*materia activas*/
			$table = 'materia';				
			//$result = DB::query("SELECT nombre_materia FROM " . DB_PREFIX . "$table");
			$result = DB::query("SELECT * FROM pensum_y_materias as pm,pensum as p, materia as m, courses as c 
						WHERE pm.`id_materia` = m.`id` 
							and pm.`id_pensum` = p.`id` 
								and p.`estatus` ='Activo' 
									and m.`id_courses` = c.`id` ");
			return $result;	
		}


		public function cronogramaPendites()	
		{

			$result = DB::query("SELECT c.`id` ,c.`id_profesor`,p.`nombre_profesor`,c.`id_materia`, m.`nombre_materia`
									 FROM `cronograma` as c, `profesor` as p, `materia` as m  
											WHERE c.`estatus`='pendiente' 
													and c.`id_materia` = m.`id`
													and c.`id_profesor` = p.`id` ");
				
		
			return $result;		
		}

		public function cronogramaPenditeEvaluacion($id = '')
		{

			/*$result = DB::query("SELECT * FROM `cronograma` as c, `evaluacion` as e
											WHERE c.`id`=$id
											 	and e.`id_cronograma` = c.`id` ");
			*/
			$result = DB::query("SELECT e.`nombre_evaluacion`,e.`descripcion` 
											FROM `cronograma` as c, `evaluacion` as e 
												WHERE c.`id`=$id
											 		and e.`id_cronograma` = c.`id`");
			return $result;		
		}
		
		public function getProfesores()	
		{

			$result = DB::query("SELECT * FROM `profesor`  WHERE `estatus`='Activo' ");
			return $result;		
		}
		public function getCoursePeriodo()	
		{

			$result = DB::query("SELECT per.`id_pensum`, per.`id_courses`, per.`id_periodo`, name 
											FROM pensum as p, courses as c, periodo as per 
												WHERE  p.`id_courses` = c.`id`
												    and p.`id` = per.`id_pensum`
												         and  per.`id_courses` = c.`id`
												            and per.`estatus` = 'Activo' ");
			return $result;		
		}

			
	}
		
?>