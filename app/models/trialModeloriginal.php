<?php

	class trialModel extends Model {
	
		public function __construct() {
	
			parent::__construct();
		}
		
		public function getRegistration($data, $by='id') {
			return DB::query("SELECT * FROM " . DB_PREFIX . "courses_registrations WHERE $by=%s LIMIT 1", $data);
		}	
		public function getRegistrant($data, $by='id') {	
			return DB::query("SELECT * FROM " . DB_PREFIX . "student_profile WHERE $by=%s LIMIT 1", $data);
		}
		
		
		public function getCourseAvailable($data, $by='id') {	
			return DB::query("SELECT * FROM " . DB_PREFIX . "courses_available_groups WHERE $by=%s LIMIT 1", $data);
		}
		
		public function getCourse($data, $by='id') {	
			return DB::query("SELECT * FROM " . DB_PREFIX . "courses WHERE $by=%s LIMIT 1", $data);
		}	
			
			
		public function getPending() {
			
			return DB::query("SELECT " . DB_PREFIX . "courses_registrations.*," . DB_PREFIX . "courses_available_groups.name ,
							student_profile.name AS 'student_name',
							student_profile.lastname AS 'student_lastname'
							FROM " . DB_PREFIX . "courses_registrations 
							inner join " . DB_PREFIX . "courses_available_groups on course_available_group_id =" . DB_PREFIX . "courses_available_groups.id
							inner join  " . DB_PREFIX . "student_profile on  " . DB_PREFIX . "student_profile.id =  " . DB_PREFIX . "courses_registrations.student_id
							WHERE " . DB_PREFIX . "courses_registrations.status='pending' order by student_id");
				
					
		}	
				
	}
		
?>