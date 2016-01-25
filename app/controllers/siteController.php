<?php 
	
	class siteController extends Controller {
		
		public function __construct() {
						
			parent::__construct();
			
		}
			
		public function index() {

			$this->view->title = "MODEL'S VIEW | Inicio";
			$this->view->buildpage('site/home', 'site');	

		}

		
	
	}
?>