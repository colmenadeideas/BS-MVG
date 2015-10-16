<?php

	class referalsModel extends Model {
	
		public function __construct() {
	
			parent::__construct();
		}
	
		public function getReferal($id,$referred,$code) {
			return DB::query("SELECT * FROM " . DB_PREFIX . "courses_referals WHERE id=%s AND referred_email=%s AND code=%s LIMIT 1", $id,$referred,$code);
		}
		public function getRegistrant($id) {
			return DB::query("SELECT * FROM " . DB_PREFIX . "student_profile WHERE id=%s LIMIT 1",$id);
		}
		public function getRegistration($id) {
			return DB::query("SELECT * FROM " . DB_PREFIX . "courses_registrations WHERE id=%s LIMIT 1", $id);
		}
		
		public function getCourse($id) {	
			return DB::query("SELECT * FROM " . DB_PREFIX . "courses WHERE id=%s LIMIT 1", $id);
		}
		public function getAvailableCourse($id) {	
			return DB::query("SELECT * FROM " . DB_PREFIX . "courses_available_groups WHERE id=%s LIMIT 1", $id);
		}
		
	}
?>

