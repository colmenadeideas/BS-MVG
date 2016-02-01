<?php 

	class controldeestudiosController extends Controller {
		
		public function __construct() {
			
			parent::__construct();
			Auth::handleLogin('controldeestudios');
			$this->view->userdata = $this->user->getUserdata();
       		$this->view->userdata = $this->view->userdata[0];
		
		}
	
		public function index() 
		{

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
			$this->view->buildpage('', 'cde');	
			$this->welcome();
			 	
		}

		public function welcome() 
		{
			$this->view->render('cde/home');
		}

		
		public function cronogramas($action = "", $id = "")
		 {
			
			switch ($action) {
				case 'get':

						$activities = $this->model->getCronograma($id);
						$this->view->activities = $activities;
						
						$this->view->profesor = $this->model->getProfesores($activities[0]['id_profesor']);
						$this->view->render('cde/cronogramas/edit');

					break;

				default: //'all'
					
					$this->view->pendientes = $this->model->getPendingCronogramas();
					$this->view->render('cde/cronogramas/all');
					break;
			}
		}
		public function startperiod()
		{
	
			$i = 0;
			foreach ($_POST as $key => $value)
			{
				$field = escape_value($key);
				$field_data = escape_value($value);
				
				if($field=='c')
				{
						
					foreach($value as $selected) 
					{
						echo $selected.' ';
						$course[$i]=$selected;
						$i++;
					}
					$array_data['c'] = $course;
				}
				else
				{
					$array_data[$field] = $field_data;

				}	
				
				
			}
			

			unset($array_data['submit']);
			print_r($array_data);

		}


		

/*borrado las funcione profesor, add, saveinfo 01022016 */
		

		public function users($action='') 
		{
			switch ($action) 
			{
				case 'all':
			
				$this->view->render('cde/users/all');
				break;
			}
		
		}
		public function periodo()
		{
			
			$this->loadModel('courses');
			//$this->view->courses = $this->model->listAvailableCourses();
			$this->view->courses = $this->model->getCoursesPensum();
			$course = $this->model->getCourse('infantil','slug');
			
			$this->view->course = $course;
			$this->view->render('cde/add/nuevoperiodo');
		}
}
?>