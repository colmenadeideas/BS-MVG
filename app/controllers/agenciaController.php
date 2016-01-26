<?php 
	
	class agenciaController extends Controller {
		
		public function __construct() {
			
			parent::__construct();
		}

		public function index() {
			
			$this->view->title = "MODEL'S VIEW | Agencia de Modelos";
			$this->view->buildpage('site/agencia', 'site');	

		}
	}

?>