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
				$fechaInicio = escape_value($_POST['fechaInicio']);
				$fechaFin    = escape_value($_POST['fechaFin']);
				unset($_POST['fechaInicio']);				
				unset($_POST['fechaFin']);				
				unset($_POST['num_courses']);
				/**/
				foreach ($_POST as $key => $value)
				{
					$field = escape_value($key);
					$field_data = escape_value($value);
					$array_data[$field] = $field_data;
				}
				/*Inicializando las variables necesarias*/
				//print_r($array_data);
				$i =1;$j=1;
				$pensum = "Pensum_2";
				$pensum_value = $array_data["Pensum_".$i];
				$slug   = $array_data['slug_'.$i];
				$id     = $array_data['id_'.$slug];
				$band = true;
				unset($array_data['slug_'.$i]);unset($array_data["Pensum_".$i]);unset($array_data['id_'.$slug]);
				$i++;

				foreach ($array_data as $key => $value) 
				{
					
					if($key!=$pensum and $key !='next')
					{
						if(strpos($key, '_'.$slug.'_'.'0')===false)
						{	
							
								switch ($key) 
								{
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
										unset($array_mat);
										$j++;
										
										break;
									default:
										# code...
										break;
								}
						}
						if($pensum_value == 'actual' and $band)
						{
							
							$pen_act = $this->model->getPensum($id);
							$vars['id_pensum']  = $pen_act[0]['id'];
							$vars['id_courses'] = $id;
							$vars['star_date']  = $fechaInicio; // poner las fecha que van 
							$vars['end_date']   = $fechaFin;
							$insert = $this->helper->insert('cde_periodo', $vars);
							$band = false;
						}
					}
					else
					{	
							
								
								if($pensum_value == 'actualizado' or $pensum_value == 'nuevo')
								{
									/*desactivar el pensum actual y sus materias */
									if ($pensum_value == 'actualizado' ) 
									{
										
										$pen_act = $this->model->getPensum($id);
										$vars['estatus'] = 'Activo';
										$this->helper->update('cde_pensum',$pen_act[0]['id'], $vars);
										$this->helper->update('cde_materia',$id,$vars,"id_courses");
										unset($vars);
									}
									/*crear pensum */
									$vars['codigo'] = '20162';
									$vars['estatus'] = 'Activo';
									$vars['id_courses'] = $array_materia[1]['id_courses'];
									$insert = $this->helper->insert('cde_pensum', $vars);
									unset($vars);
									
									/* crear materias para el curso */
									$id_pensum = DB::insertId();
									$vars['id_pensum'] = $id_pensum;
									$vars['estatus'] ='Activo';
									foreach ($array_materia as $mat) 
									{
										$vars['nombre_materia'] = $mat['nombre_materia'];
										$vars['descripcion'] 	= $mat['descripcion'];
										$vars['trimestre'] 		= $mat['trimestre'];
										$vars['id_courses']		= $mat['id_courses'];
										$insert = $this->helper->insert('cde_materia', $vars);
									}
									unset($vars);

									/*crear el periodo*/
									$vars['id_pensum']  = $id_pensum;
									$vars['id_courses'] = $id;
									$vars['star_date']  = $fechaInicio; 
									$vars['end_date']   = $fechaFin;
									$insert = $this->helper->insert('cde_periodo', $vars);
									unset($vars);

									/*fin del proceso */	
								}

						switch ($key) 
						{
								
							case 'Pensum_'.$i :	
								$pensum = "Pensum_".$i;
								$pensum_value = $value;
								break;
							case 'slug_'.$i :
								$slug   = $value;
								break;
							case 'id_'.$slug :
								$id = $value;
								$j = 1;
								$band = true;
							break;
							
							default:
								# code...
								break;
						}


					}	
				}
						echo'<div class="col-lg-3 col-md-3 col-xs-3"></div>
								<div class="col-lg-6 col-md-6 col-xs-6" style="margin-top:60px;">
									<div class="alert alert-success">
										<h3>¡Se han iniciado los periodos de inscripcion inscripcion exitosamentente!<br> 
											Continue con el proceso por favor.
										</h3>
											<br>
										<p style="text-align: center;" >
											<a class="next btn btn-info btn-lg inscributton" href="#">
												Asignar Horarios
											</a>
										</p>
									</div>
							</div><div class="col-lg-3 col-md-3 col-xs-3"></div>';
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
		public function periodo2()
		{	
			
			$courses[1]=1;
		//	$courses[2]=2;
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
  				$this->view->render('cde/add/creategroup');	

		}

		public function periodo($action = '')
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
				
  				$this->view->pensumActivos   		= $pensumActivos;
  				$this->view->materias       		= $this->model->getMaterias();
  				$this->view->fecha['inicio']        = $array_data['fechaInicio'];
  				$this->view->fecha['fin']           = $array_data['fechaFin'];
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
		
			
			
		}
}
?>