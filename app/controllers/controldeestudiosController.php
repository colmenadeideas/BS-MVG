<?php 

	class controldeestudiosController extends Controller {
		
		public function __construct() 
		{
			
			parent::__construct();
			//Auth::handleLogin('controldeestudios');	//tu eres el que me esta fregando 
		
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
			$this->view->buildpage('', 'cde');	
			$this->welcome();
			 	
		}

		public function welcome() {
			$this->view->render('cde/home');
		}

		public function add($caso='') {


			switch ($caso) {
				case 'profesor':
						$materia = $this->model->getMaterias();
						$this->view->materias = $materia;	
						$this->view->render('cde/add/profesor');	
					break;
				case 'materia':
						$this->view->render('cde/add/materia');
					break;	
				case 'asignacion':
						# code...
					break;
							
				default:
						$this->view->render('cde/add/index');
					break;
			}

			
		}
		public function saveInfo($caso='')
		{
			switch ($caso) {
				case 'profesor':
					/*$array_data = array();	
					//paso 1
					foreach ($_POST as $key => $value) 
					{
						$field = escape_value($key);
						$field_data = escape_value($value);
						
						$array_data[$field] = $field_data;
					}
					//paso 2 
					
					unset($array_data['submit']);
					$array_registration['id'] = $array_data['registration_id'];
					unset($array_data['registration_id']);
					$array_registration['data'] 					 = 	json_encode($array_data);
					$create_registration = $this->step3($array_registration);	*/		
				
					/*paso 3*/


					break;
				case 'materia':
					# code...
					break;
				case 'pensum':
					# code...
					break;
				case 'trimestre':
						# code...
					break;	
				default:
					# code...
					break;
			}


		}

		public function approveCronograma($caso='',$id='')
		{

			switch ($caso) 
			{
				case 'aprobado':

						echo "aprobado el cronograma ".$id;
						$array_vars['estatus']='aprobado';
						$this->helper->update('cronograma',$id,$array_vars);
					
					break;
				case 'rechazado':
						echo "rechazado el cronograma ".$id;
						$array_vars['estatus']='rechazado';
						$this->helper->update('cronograma',$id,$array_vars);
					break;		
				
				default:
						$pendientes= $this->model->cronogramaPendite();
						$this->view->pendientes = $pendientes;	
						
						$json =	$pendientes[0]['data'];
						
						$obj = json_decode($json);
						$i=1;
						while ($i <= 13) 
						{
							$name = 'Semana'.$i;
							$cronograma = $obj->{$name}; 
							$i++;
						}
						
						
						
						$this->view->render('cde/vistas/cronograma');

					break;
			}

		}
	
	}
?>