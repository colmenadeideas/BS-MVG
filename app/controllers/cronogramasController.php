<?php 

	class cronogramasController extends Controller {
		
		public function __construct() {
			
			parent::__construct();
			//Auth::handleLogin('controldeestudios'); TODO habilitar
		
		}

		public function get($what) {
			
			switch ($what) {
					
				default: 
					$tablename = 'cde_cronograma';
					$fields = array('id','data','name', 'lastname',  'nombre_materia','creationdate', 'lastupdate','status');
					$temptable = 'cronogramas';
					//$where = "WHERE courses_registrations.status!='completed' AND courses_registrations.status!='cancelled' AND courses_registrations.status!='archived'";
					
					break;
			}
			
			$data = $this->helper->getJSONtables($tablename, $fields, $where, $temptable);
			echo $data;			
			
		}
	}
?>