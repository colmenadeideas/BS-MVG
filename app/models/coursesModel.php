<?php

	class coursesModel extends Model {
	
		public function __construct() {
	
			parent::__construct();
		}
		
		public function listAvailableCourses($by='order', $order='ASC') 
		{
			return DB::query("SELECT * FROM courses WHERE status = 1 ORDER BY `$by` $order");
		}
		
		public function getCourse($data, $by='id') {
			$by = escape_value($by);	
			return DB::query("SELECT * FROM " . DB_PREFIX . "courses WHERE $by=%s LIMIT 1", $data);
		}
		public function getCourseGroup($data, $by='id') {
			$by = escape_value($by);	
			return DB::query("SELECT * FROM " . DB_PREFIX . "courses_available_groups WHERE $by=%s LIMIT 1", $data);
		}
		public function listAvailableGroups($data, $by='id', $order='DESC') {
			$by = escape_value($by);	
			return DB::query("SELECT * FROM " . DB_PREFIX . "courses_available_groups WHERE parent_id=%s ORDER BY $by $order", $data);
		}
		
		public function openingsLeftPerCourse($data, $by='id', $order='DESC') {
			$by = escape_value($by);	
			return DB::query("SELECT * FROM " . DB_PREFIX . "courses_registrations WHERE course_available_group_id=%s AND status='clearpayment' ORDER BY $by $order", $data);
		}

		public function getCoursesPensum()
		{
			return DB::query("SELECT  a.`id`,a.`slug`,a.`name`,a.`description`,b.`id` as `id_pensum`, b.estatus FROM " . DB_PREFIX . "courses a  LEFT JOIN cde_pensum b  ON (a.id = b.id_courses AND b.estatus = 'Activo')");
		}

		public function getListAvaibleMat()
		{
			//return DB::query("SELECT * FROM " . DB_PREFIX . "courses, cde_materia WHERE cde_materia.estatus =  'Activo' AND  `courses`.id = cde_materia.id_courses AND `courses`.`status` =1");
			return DB::query("SELECT cde_materia.`id`,`nombre_materia`,`id_courses`,`estatus`,trimestre FROM " . DB_PREFIX . "courses, cde_materia WHERE cde_materia.estatus =  'Activo' AND  `courses`.id = cde_materia.id_courses AND `courses`.`status` =1");
		}
		
	}
		
?>