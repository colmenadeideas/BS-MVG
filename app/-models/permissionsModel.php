<?php

	class permissionsModel extends Model {
	
		public function __construct() {
	
			parent::__construct();
		}
		
		public function rolePermissions($role) {	
			return DB::query("SELECT * FROM " . DB_PREFIX . "users_role_permissions WHERE role=%s", $role);
		}
		
		public function listMenu($by='order', $order='DESC') {	
			return DB::query("SELECT * FROM " . DB_PREFIX . "menu WHERE status='active' AND display='1' ORDER BY '$by' $order");
		}
		
		public function getMenu($id) {	
			return DB::query("SELECT * FROM " . DB_PREFIX . "menu WHERE id=%s AND status = 'active' AND display = '1' LIMIT 1", $id);
		}
		
		public function getRegistration($data, $by='id', $and ='') 
		{
			
			$and =	escape_value($and);
			return DB::query("SELECT * FROM " . DB_PREFIX . "courses_registrations WHERE $by=%s $and", $data);
		}	
	}
		
?>