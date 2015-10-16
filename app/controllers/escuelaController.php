<?php 
	
	class escuelaController extends Controller {
		
		public function __construct() {
			
			parent::__construct();
			//Auth::handleLogin('escuela');	
		}
	
		public function index() {

			$role = $this->user->get('role');
			
			$this->loadModel('permissions');
			$permisos = $this->model->rolePermissions($role);
			
			$permisos = json_decode($permisos[0]['permissions'], TRUE);
			
			foreach ($permisos as $key => $value) {
				//Check if Menu is authorized for user role
				if ($value == 1) { 
					$menu = $this->model->getMenu($key);
					if (!empty($menu)){
						$permissions_menu[] = $menu[0];						
						
					}
							
				}
			}
			foreach ($permissions_menu as $item) {
				
				if($item['level'] != '1'){
					
					$new_id = $item['parent'];
					$this->view->menu[$new_id]['children'][] = $item;
					
				} else {
					
					$new_id = $item['id'];
					$this->view->menu[$new_id] = $item;
				}
				
			}

			
			$this->view->title = SITE_NAME. " | Escuela";
			$estudiantes = $this->user->getUserdata();
			
						
		    $registration = $this->model->getRegistration($estudiantes[0]['id'], 'student_id');
			
			$this->view->student = $registration;
		
			if( sizeof($registration) >1 )
			{
				
				$this->view->buildpage('escuela/init2', 'escuela');	
				
			}
			else
			{
				$this->view->buildpage('escuela/init', 'escuela');		
			}	
		}
	}
?>