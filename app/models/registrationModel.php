<?php

	class registrationModel extends Model {
	
		public function __construct() {
	
			parent::__construct();
		}
		
		public function getReservedEmails() {	
			return DB::query("SELECT * FROM " . DB_PREFIX . "user_profile", $data);
		}
		public function getRegistrant($data, $by='id') {	
			return DB::query("SELECT * FROM " . DB_PREFIX . "student_profile WHERE $by=%s LIMIT 1", $data);
		}
		public function getRegistration($data, $by='id', $and ='') {
			
			$and =	escape_value($and);
			return DB::query("SELECT * FROM " . DB_PREFIX . "courses_registrations WHERE $by=%s $and ORDER BY id DESC LIMIT 1", $data);
			//return DB::query("SELECT * FROM " . DB_PREFIX . " courses_registrations WHERE $by=%s $and order by $by ASC LIMIT 1", $data);
			//return DB::query("SELECT * FROM " . DB_PREFIX . " courses_registrations ORDER BY id ASC WHERE $by=%s $and" ORDER BY id ASC LIMIT 1, $data);
	
			//SELECT * FROM courses_registrations WHERE student_id =  '279' ORDER BY id ASC LIMIT 1
		}	
		
		public function getRegistrations($data, $by='id', $string) {
			
			$and =	escape_value($and);
			return DB::query("SELECT * FROM " . DB_PREFIX . "courses_registrations WHERE $by=%s AND  data LIKE '%$string%'  ORDER BY id DESC", $data, $string);			
		}
		
		public function getRegistrationsCode() {
			return DB::query("SELECT * FROM " . DB_PREFIX . "courses_registrations WHERE code IS NOT NULL AND disccount IS NULL");
		}

		public function getRegistroCurso($data)
		{

			return DB::query("SELECT * FROM " . DB_PREFIX ."courses_available_groups, courses_registrations WHERE course_available_group_id =  courses_available_groups.id AND courses_registrations.student_id =  %s", $data);


		}

	
				
	}
		
?>

