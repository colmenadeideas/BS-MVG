<?php 
	
	class agenciaController extends Controller {
		
		public function __construct() {
			
			parent::__construct();
		}

		public function index() {
			
			$this->view->title = "MODEL'S VIEW | Agencia de Modelos";
			$this->view->buildpage('site/agencia', 'site');	

		}

		public function women() {
			
			$this->view->title = "MODEL'S VIEW | Agencia de Modelos - WOMEN";
			$this->view->models = $this->model->getModels('women');
			$this->view->buildpage('site/agencia', 'site');	

		}
		public function load($what){
			$this->view->models = $this->model->getModels('women');
			$this->view->render('site/agencia-pagination');					
		}

		
	}

?>