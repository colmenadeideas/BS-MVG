<?php 
	
	class productoraController extends Controller {
		
		public function __construct() {
			
			parent::__construct();
		}

		public function index() {
			
			$this->view->title = "MODEL'S VIEW | Productora de Eventos";
			$this->view->buildpage('site/productora', 'site');	

		}
	}

?>