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


		

		public function profesor($action='') {//profesor


			switch ($action) {
				case 'add':

						$profesores = $this->model->getProfesores();
						$this->view->profesores = $profesores;

						$materias = $this->model->getCoursePeriodo();
						$this->view->materias = $materias;	

						$this->view->render('cde/add/profesor');	

					break;

				case 'materia':
						//$this->loadModel('courses');
						$course_list = $this->model->getMateriasPensum();
						//$course_list = $this->model->listAvailableCourses();
						$this->view->course_lists = $course_list;
						$this->view->render('cde/add/materia');
				break; 	



				case 'bind':
						$materia = $this->model->getMaterias();
						$this->view->materias = $materia;	
						
						$profesor = $this->model->getProfesores();
						$this->view->profesores = $profesor;

						$this->view->render('cde/add/asignarmateria');
					break;

				case 'nuevoperiodo':
						
						$this->loadModel('courses');
						//$this->view->courses = $this->model->listAvailableCourses();
						$this->view->courses = $this->model->getCoursesPensum();

						$this->view->render('cde/add/nuevoperiodo');

					break;
								
				default:
						$this->view->render('cde/add/index');
					break;	

			}
		}
		public function add($caso='') 
		{


			switch ($caso) {
				case 'profesor':
						$materia = $this->model->getMaterias();
						$this->view->materias = $materia;	
						$this->view->render('cde/add/profesor');	
					break;
				case 'materia':
						$this->loadModel('courses');
						$course_list = $this->model->listAvailableCourses();
						$this->view->course_lists = $course_list;
						$this->view->render('cde/add/materia');
					break;	
				case 'asigna':
						$materia = $this->model->getMaterias();
						$this->view->materias = $materia;	
						
						$profesor = $this->model->getProfesores();
						$this->view->profesores = $profesor;

						$this->view->render('cde/add/asignarmateria');
					break;
				case 'nuevoperiodo':

						$this->loadModel('courses');
						$course_list = $this->model->listAvailableCourses();
						$this->view->course_lists = $course_list;

						$this->view->render('cde/add/nuevoperiodo');
					break;	

				case 'pensum':

						$this->loadModel('courses');
						$course_list = $this->model->listAvailableCourses();
						$this->view->course_lists = $course_list;
						
						$this->view->render('cde/add/cursopensum');
						break;	
							
				default:
						$this->view->render('cde/add/index');
					break;
			}

			
		}
		public function saveinfo($caso='') {
			$caso =$_POST['tipo'];
			if(isset($_POST['c']))
			{ 
				$i = 1;
								
					foreach($_POST['c'] as $selected)
					{
						$courses[$i] = $selected;
						$i++;
					}
					
								$array_data['c'] = $courses;
								unset($_POST['c']);
			}			
		
			foreach ($_POST as $key => $value)
			{
					$field = escape_value($key);
					$field_data = escape_value($value);
					$array_data[$field] = $field_data;
			}
			unset($array_data['submit']);
			

			switch ($array_data['tipo']) 
			{
				case 'profesor':

						unset($array_data['tipo']);
						$array_profesor['username']     = $array_data['email'];
						$array_profesor['status'] 		= '1';
						$array_profesor['name'] 		= $array_data['name'];
						$array_profesor['lastname'] 	= $array_data['lastname'];
						//$array_data['photo'] 			= '<img src="'.SITE_URL.'public/img/photo.png" class="img-responsive img-circle" />';
						$array_profesor['data'] 		= json_encode($array_data);
						$insert = $this->helper->insert('cde_profesor', $array_profesor);
						$forcechangeurl = rand(0, 50);
						$this->view->redirect_link = 'profesor'.'/'. $forcechangeurl;
						$this->view->response = "Listo! Asigancion exitosa... ";
						$this->view->render('redirect_hash');	


					break;

				case 'materia':

						unset($array_data['tipo']);
						

						$codigo = $array_data['codigo'];
						$id_courses = $array_data['courses'];
				
						$array_materia['nombre_materia'] = $array_data['name'];
						$array_materia['codigo'] = $array_data['codigo'];
						$array_materia['descripcion'] = $array_data['descripcion'];
						$array_materia['pos_trimestre'] = $array_data['trimestre'];
						$array_materia['id_courses'] = $array_data['courses'];
						$array_materia['estatus'] ='Activo';

						
						$materia = $this->model->existemateria($codigo,$id_courses);
						if(count($materia)==0)
						{		
							$insert = $this->helper->insert('cde_materia', $array_materia);
							
							$this->view->redirect_link = 'profesor';
							$this->view->response = "Listo!... ";
							$this->view->render('redirect_hash');
						}
						else
						{
							$this->view->redirect_link = 'profesor';
							$this->view->response = "La materia ya existe";
							$this->view->render('redirect_hash');
						}		
						
					break;

				case 'bind':

						unset($array_data['tipo']);
						
						$array_bind['id_profesor'] =  $array_data['id_profesor'] ;
						$array_bind['id_materia']  =  $array_data['id_materia'] ;
	

						$this->view->redirect_link = 'profesor';
						$this->view->response = "Listo! ... ";
						$this->view->render('redirect_hash');
						
						break;	

				case 'pensum':
					# code...
					break;

				case 'nuevoperiodo':


						unset($array_data['tipo']);
						

						$array_periodo['star_date'] = $array_data['fechaInicio'];
						$array_periodo['courses'] = $array_data['c'];

						$i = 1; 
						

						switch ($array_data['parte1']) 
						{
							case 'parte1':
								unset($array_periodo['parte1']);

								$j = 1;
								$k = 1;
								$courC = $array_periodo['c'];
								foreach ( $courC as $pem)
								{
									$aux = "and p.id_courses = $pem and c.parent_id = p.id_courses";	
									
									$pensum = $this->model->getPensum($aux,', courses_available_groups as c ');
									
									if(empty($pensum))
									{
										$sinPen[$j] = $pensum;
										$j++;
									}
									else
									{
										$conPen[$k] = $pensum;;
										$k++;	
									}	

								}
								// liberamos las variables 
								unset($j);
								unset($k);
								unset($pensum);
								unset($aux);

								//todos tienen pensum
								if (empty($sinPen) and !empty($conPen)) 
								{
									
									$this->view->courses = $conPen;
									$this->view->form    = $array_periodo;	
									$this->view->band    = 1;	
									$this->view->render('cde/add/asignarperiodo');
								}

								//ninguno tienen pensum
								if (!empty($sinPen) and empty($conPen)) 
								{
									# code...
								}

								//algunos tienen pensum y otros no 
								if (!empty($sinPen) and !empty($conPen)) 
								{
									# code...
								}

								break;
							
							default:
								# code...
								break;
						}



						/*$array_periodo[''] =  $array_data['name'];
						$array_periodo[''] =  $array_data['name'];
						$array_periodo[''] =  $array_data['name'];
						$array_periodo[''] =  $array_data['name'];*/


						exit;
						$materia = $this->model->existemateria($codigo,$id_courses);
						if(count($materia)==0)
						{		
							$insert = $this->helper->insert('cde_materia', $array_materia);
							
							$this->view->redirect_link = 'profesor';
							$this->view->response = "Listo!... ";
							$this->view->render('redirect_hash');
						}
						else
						{
							$this->view->redirect_link = 'profesor';
							$this->view->response = "La materia ya existe";
							$this->view->render('redirect_hash');
						}	
						
					break;
				case 'comentario':
					
					unset($array_data['tipo']);
					unset($array_data['send']);
					$array_comentario['id_cronograma'] = $array_data['id_cronograma'];
					$array_comentario['from_usuario'] = $array_data['id_profesor'];
					$array_comentario['status'] = 'unread';
					$array_comentario['data'] = json_encode($array_data);
					$insert = $this->helper->insert('cde_cronograma_comments', $array_comentario);
					
					/*enviar correo*/
					$and = 'id = '. $array_data['id_profesor'];
					$profesor = $this->model->getProfesores($and);
					
					$email = $profesor[0]['email'];
					
					$head = 'algo aqui ';
			    	
			    	$message = $head;
					
					$message.= '<h6 style="margin: 0; padding: 0;"><small>'.$array_data['comment'].'</small></h6>';
					
					$this->email->sendMail($email, SYSTEM_EMAIL , 'Correciones del cronograma' , $message);
					
					$this->email->ClearAddresses();
					$system_message.= SYSTEM_SIMPLE_EMAIL_FOOTER;
					$this->email->sendMailwithCC(USUARIO_ADMINISTRACION, 
													SYSTEM_EMAIL , 
													$student[0]['name']." ".$student[0]['lastname'].PAYMENT_NOTIFICATION_EMAIL__SUBJECT, 
													$system_message,
													//"adortega90@gmail.com",
													//"aortega@besign.com.ve");	
													"alejandra85@hotmail.com",
													"aortega@besign.com.ve");
					$this->view->render('cde/cronogramas/all');
					break;		

				default:
					$this->view->render('cde/home');
					break;
			}


		}

		public function approveCronograma($caso='',$id='')
		{
			switch ($caso) 
			{
				case 'aprobado':
						$vars['status'] = 'approved';
								//Change status
						$approve = $this->helper->update('cde_cronograma', $id, $vars);
								//Send Notification & instructions
						if ($approve > 0)
						{

									//Get Profesor, notificar Cronograma aprobado y Publicado	
									$activities = $this->model->getCronograma($id);
									$profesor = $this->model->getProfesores($activities[0]['id_profesor']);
									
									//Email Instructions Step 2 	
									$head= CDE__EMAIL_HEAD;							
													
									$message = $head;
									$message.= "Hola, ".$profesor[0]['name']."<br><br> El Cronograma de <strong>".$materia[0]['nombre_materia']."</strong> ha sido aprobado y publicado.<br><br> ¡Gracias!";
									$message.= CDE__EMAIL_FOOTER;
									$this->email->sendMail('aortega@besign.com.ve'/*$profesor[0]['email']*/, SYSTEM_EMAIL , CRONOGRAMA_EMAIL_SUBJECT, $message);	
									
									//$response["tag"] = "login";
									$response["success"] = 1;
									$response["error"] = 0;	
									$response["response"] = "Mensaje Respuesta";
						} 
						else 
						{
									$response["success"] = 0;
									$response["error"] = 1;	
						}
								echo json_encode($response);	
					break;

				case 'rechazado':
						
						$array_vars['estatus']='rechazado';
						$this->helper->update('cde_cronograma',$id,$array_vars);

						$pendientes= $this->model->cronogramaPendientes();
						
						$i = 1;
						foreach ($pendientes as $pendiente) 
						{

							
								$aux = $this->model->cronogramaPenditeEvaluacion($pendiente['id']);
							
								if(!empty($aux))
								{
									$name = 'info'.$i;
									$resultado[$name] = $pendiente;
									$name = 'eval'.$i;
									$resultado[$name] = $aux; 
									$res[$i] = $resultado;
									$i++;
								}
								unset($aux);	
							
						}
						unset($aux);
						unset($resultado);
						$this->view->pendientes = $res;	

						
						
						$this->view->render('cde/vistas/cronograma');
					break;		
				
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