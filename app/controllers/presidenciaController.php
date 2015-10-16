<?php 
	
	class presidenciaController extends Controller {
		
		public function __construct() {
			
			parent::__construct();
			Auth::handleLogin('presidencia');	
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
			
			
			$this->view->title = SITE_NAME. " | Inicio";
			//Page
			$this->view->buildpage('admin/home', 'admin');	
			 	
		}
	
	}
?>