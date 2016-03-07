<?php 

	class controldeestudiosController extends Controller {
		
		public function __construct() 
		{
			
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
			
			foreach ($permisos as $key => $value) 
			{
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
			
			switch ($action) 
			{
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
		
/*borrado las funciones profesor, add, saveinfo 01022016 */
		public function process()
		{
				
				//print_r($_POST);
				$fecha = escape_value($_POST['fecha']);
				$num_courses = escape_value($_POST['num_courses']);
				unset($_POST['fecha']);				
				unset($_POST['num_courses']);
				unset($_POST['next']);
				$i =1;$j=1;
				$band = true;
				$aux_array = $array_data;
				
				foreach ($_POST as $key => $value)
				{
					$field = escape_value($key);
					$field_data = escape_value($value);
					$array_data[$field] = $field_data;
				}
				
				$pensum = "Pensum_".$i;
				$pensum_value = $array_data["Pensum_".$i];
				$slug   = $array_data['slug_'.$i];
				$id     = $array_data['id_'.$slug];
				
				unset($array_data['slug_'.$i]);
				unset($array_data["Pensum_".$i]);
				unset($array_data['id_'.$slug]);
				print_r($array_data);
				exit;
				foreach ($array_data as $key => $value) 
				{
					
		
					if($key!=$pensum )
					{
						if(strpos($key, '_'.$slug.'_'.'0')!==false)
						{
							switch ($key) {
								case 'materia_'.$slug.'_'.$j:
									$array_mat['nombre_materia']  = $value;
									break;								
								case 'desc_'.$slug.'_'.$j:
									$array_mat['descripcion']     = $value;
									break;
								case 'sel_'.$slug.'_'.$j:
									$array_mat['trimestre']       = $value;
									$array_mat['id_courses']      = $id;
									$array_materia[$j]            = $array_mat;
									$j++;

									break;
								
								default:
									# code...
									break;
							}


						}
			

					}
					else
					{
						
						$i++;
						$pensum = "Pensum_".$i;
						$pensum_value = $array_data["Pensum_".$i];
						$slug   = $array_data['slug_'.$i];
						$id     = $array_data['id_'.$slug];
						$j = 1;
						$band = true;
					}	
				}
				
		}

		public function users($action='') 
		{
			switch ($action) 
			{
				case 'all':
			
				$this->view->render('cde/users/all');
				break;
			}
		
		}
		
		/*puebaaaa muejajaja */
		public function periodo()
		{	
			
			$courses[1]=1;
			$courses[2]=2;
			//$courses[3]=3;
			$i = 0;
				foreach ($courses as $key => $value) 
				{
					$aux = $this->model->getPensumCourseMateria($value);
					if(empty($aux))
					{
						$aux = $this->model->getCourse($value);
						$pensumActivos[$value] = $aux;
					}
					else
					{
						$pensumActivos[$value] = $aux;
					}
					unset($aux);
				}

				
  				$this->view->pensumActivos   = $pensumActivos;
  				$this->view->materias        = $this->model->getMaterias();
  				$this->view->fecha           = $array_data['fechaInicio'];
  				$this->view->render('cde/add/creategroup');	

		}
		public function periodo2($action = '')
		{
			
			if(empty($_POST))
			{
				$this->loadModel('courses');
				$this->view->courses = $this->model->getCoursesPensum();
				$this->view->render('cde/add/nuevoperiodo');	
			}
			else
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
							$courses[$i]=$selected;
							$i++;
						}
						$array_data['c'] = $courses;
					}
					else
					{
						$array_data[$field] = $field_data;
					}		
				}
				unset($array_data['submit']);

				foreach ($courses as $key => $value) 
				{
					$aux = $this->model->getPensumCourseMateria($value);
					if(empty($aux))
					{
						$aux = $this->model->getCourse($value);
						$pensumActivos[$value] = $aux;
					}
					else
					{
						$pensumActivos[$value] = $aux;
					}
					unset($aux);
				}
				
  				$this->view->pensumActivos   = $pensumActivos;
  				$this->view->materias        = $this->model->getMaterias();
  				$this->view->fecha           = $array_data['fechaInicio'];
  				$this->view->render('cde/add/creategroup');	
			}
		}
		public function editinline() 
		{
			
			$pk = escape_value($_POST['pk']);
			$value = escape_value($_POST['value']);
			
			$parts = explode( '-', $pk );
			$tablename = $parts[0];
			$fieldname = $parts[1];
			$id = $parts[2];
			//if not by ID, something else
			@$by = $parts[3];	
			print_r($_POST['pk']);
			/*
			$arrayModificacion = array();
			
			$arrayModificacion[$fieldname] = $value;
			
			if($tablename == 'supplies_fields') 
			{
					
				$userdata = $this->user->getUserdata();	
				$arrayModificacion['edited_by'] = $userdata[0]['id'];
				$arrayModificacion['parent_id'] = $id;
				$insert = $this->helper->insert($tablename, $arrayModificacion);	
				
			} else {
					
				if (!empty($by)) {
					$insert = $this->helper->update($tablename, $id, $arrayModificacion, $by);
				} else {
					$insert = $this->helper->update($tablename, $id, $arrayModificacion);			
				}
			
			}*/
									
			
			
			//::::Log Action::::
			//$userdata = $this->user->getUserdata();					
			//$log = $this->helper->insert('users_action_log', array('controller'=>$tablename, 'action' =>  'edit', 'item' =>  $id, 'username'=> $userdata[0]['id']));		
			
			//print_r($insert);
			
			
		}
}
?>