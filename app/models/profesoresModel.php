<?php 
	
	class profesoresModel extends Model {
	
		public function __construct() {
	
			parent::__construct();
		}
		
		public function listUsers($by='username', $order='') {	
			return DB::query("SELECT * FROM " . DB_PREFIX . "users ORDER BY $by $order");
		}
		public function getUser($id, $by='username') {
			return DB::query("SELECT * FROM " . DB_PREFIX . "users WHERE $by=%s LIMIT 1", $id);
		}
		public function getUserProfile($id, $by='username') {
			return DB::query("SELECT * FROM " . DB_PREFIX . "cde_profesor WHERE $by=%s LIMIT 1", $id);
		}
		
		public function getRegistrant($data, $by='id') {	
			return DB::query("SELECT * FROM " . DB_PREFIX . "cde_profesor WHERE $by=%s LIMIT 1", $data);
		}
	
	}

?>