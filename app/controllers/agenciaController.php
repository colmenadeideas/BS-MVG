<?php 
	
	class agenciaController extends Controller {
		
		public function __construct() {
			
			parent::__construct();
		}

		public function index() {
			
			$this->women();
		}

		public function women() {	$this->agency("women"); }
		public function men() 	{	$this->agency("men"); 	}
		public function kids() 	{	$this->agency("kids"); 	}

		public function agency($category) {
			
			$this->view->title = "MODEL'S VIEW | Agencia de Modelos - ".strtoupper($category);
			$this->view->category = $category;

			$this->view->models = $this->model->getModels($category);
			$this->view->last_row = DB::count();
			$this->view->buildpage('site/agencia', 'site');	

		}

		public function load($what, $pagination = "1"){
			$this->view->models = $this->model->getModels($what, $pagination);
			$this->view->last_row = DB::count();
			$this->view->render('site/agencia-pagination');					
		}
		

		
	}

?>