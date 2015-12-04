<?php 
	
	class registrationsController extends Controller {
		
		public function __construct() {
			
			parent::__construct();
			Auth::handleLogin('registrations');	//para evitar que pida login
		}
		
		public function all() {
			$this->view->pendientes=$this->model->getPending("pending","status");
			$this->view->render('students/all');
			
		}
		public function active() {
			$this->view->render('students/active');
		}
		
		public function pending() {			
		 	$this->view->render('students/pending');
		}
		public function clearpayment() {
			$this->view->render('students/clearpayment');
		}
		public function availableadmin ($buildpage='') 
		{
			//$this->view->render('students/clearpayment');


			$this->loadModel('courses');
				
			$this->view->title = SITE_NAME. " | Pensums Disponibles";
			$this->view->courses = $this->model->listAvailableCourses();
			

			
			if ($buildpage == 'nopage') {
				//Page
				$this->view->render('registration/available_courses_admin');
				
			} else {
				//Page
				$this->view->buildpage('registration/available_courses_admin');
			}
			
		}
		public function edit($id) {
			//get Details from selected Registration
			$this->view->registration = $this->model->getRegistration($id);
			$this->view->details =  json_decode($this->view->registration[0]['data'], TRUE);
			$this->view->details_payment =  json_decode($this->view->registration[0]['data_payment'], TRUE);			
			//Build View
			$this->view->render('registration/student/details');			
		}
		
		public function registerpayment($id) {
			//get Details from selected Registration
			$this->view->registration = $this->model->getRegistration($id);
			//$this->view->details =  json_decode($this->view->registration[0]['data'], TRUE);
			//Build View
			
			switch ($curso) {
						case 'baby-model':
							$head = REGISTRATION_EMAIL_BABYMODEL_BG;
							$head.= REGISTRATION_EMAIL_BABYMODEL_HEAD;							
							break;	
							
						case 'infantil':
							$head = REGISTRATION_EMAIL_INFANTIL_BG;
							$head.= REGISTRATION_EMAIL_INFANTIL_HEAD;							
							break;	
						
						case 'pre-juvenil':
							$head = REGISTRATION_EMAIL_PREJUVENIL_BG;
							$head.= REGISTRATION_EMAIL_PREJUVENIL_HEAD;							
							break;	
						case 'juvenil':
							$head = REGISTRATION_EMAIL_JUVENIL_BG;
							$head.= REGISTRATION_EMAIL_JUVENIL_HEAD;							
							break;	
						case 'only-for-men':
							$head = REGISTRATION_EMAIL_ONLYFORMEN_BG;
							$head.= REGISTRATION_EMAIL_ONLYFORMEN_HEAD;							
							break;	
						case 'certificacion-5-estrellas':
							$head = REGISTRATION_EMAIL_5ESTRELLAS_BG;
							$head.= REGISTRATION_EMAIL_5ESTRELLAS_HEAD;							
							break;	
						case 'taller-automaquillaje':
							$head = REGISTRATION_EMAIL_TALLERMAQUILLAJE_BG;
							$head.= REGISTRATION_EMAIL_TALLERMAQUILLAJE_HEAD;							
							break;	
						case 'model-look':
							$head = RECORDATORIO_EMAIL_MODELSLOOK_BG;
							$head.= RECORDATORIO_EMAIL_MODELSLOOK_HEAD;							
							break;						
						
					}	
					//echo $curso."<br>";
				//	$message.="<h4 style='text-align: center'>Prueba Funcionamiento de envio de correo, <br>botones con URL local no deberian funcionar por los momentos</h4>";
				$message.= $head;
			
			
				$this->view->render('registration/payments/register');
				echo $message;
				
		}
		
		public function reject($id) {
			$registrationvista = $this->model->getRegistrationvista($id);
				
				$nombre = $registrationvista[0]['name'];
				$apellido= $registrationvista[0]['lastname'];
				$estado= $registrationvista[0]['status'];
				$curso= $registrationvista[0]['slug'];
				$email=$registrationvista[0]['email'];
				$fecharegistro=$registrationvista[0]['date'];
				$horario=$registrationvista[0]['schedule'];
				$desc=$registrationvista[0]['fecha'];
				$id=$registrationvista[0]['id'];
				
				


//get Details from selected Registration
			$this->view->registration = $this->model->getRegistration($id);
			//$this->view->details =  json_decode($this->view->registration[0]['data'], TRUE);
			//Build View
			
			switch ($curso) {
						case 'baby-model':
							$head = REGISTRATION_EMAIL_BABYMODEL_BG;
							$head.= REGISTRATION_EMAIL_BABYMODEL_HEAD;							
							break;	
							
						case 'infantil':
							$head = REGISTRATION_EMAIL_INFANTIL_BG;
							$head.= REGISTRATION_EMAIL_INFANTIL_HEAD;							
							break;	
						
						case 'pre-juvenil':
							$head = REGISTRATION_EMAIL_PREJUVENIL_BG;
							$head.= REGISTRATION_EMAIL_PREJUVENIL_HEAD;							
							break;	
						case 'juvenil':
							$head = REGISTRATION_EMAIL_JUVENIL_BG;
							$head.= REGISTRATION_EMAIL_JUVENIL_HEAD;							
							break;	
						case 'only-for-men':
							$head = REGISTRATION_EMAIL_ONLYFORMEN_BG;
							$head.= REGISTRATION_EMAIL_ONLYFORMEN_HEAD;							
							break;	
						case 'certificacion-5-estrellas':
							$head = REGISTRATION_EMAIL_5ESTRELLAS_BG;
							$head.= REGISTRATION_EMAIL_5ESTRELLAS_HEAD;							
							break;	
						case 'taller-automaquillaje':
							$head = REGISTRATION_EMAIL_TALLERMAQUILLAJE_BG;
							$head.= REGISTRATION_EMAIL_TALLERMAQUILLAJE_HEAD;							
							break;	
						case 'model-look':
							$head = RECORDATORIO_EMAIL_MODELSLOOK_BG;
							$head.= RECORDATORIO_EMAIL_MODELSLOOK_HEAD;							
							break;						
						
					}	
					//echo $curso."<br>";
					//$message.="<h4 style='text-align: center'>Prueba Funcionamiento de envio de correo, <br>botones con URL local no deberian funcionar por los momentos</h4>";
				$message.= $head;
				$message.= "<h2 style='text-align: center;'>Indique la razón de su retiro </h2>";
				$message.='<form id="payment-registration" class="form-modal" >
		
						<div class="col-sm-10 col-lg-10 col-sm-offset-1" >
						<select name="razon" class="form-control input-lg" required>
							<option value="" disabled selected>Seleccione una razón de retiro</option>
							<option value="Tiempo">Tiempo</option>
							<option value="Dinero">Dinero</option>
							<option value="Viaje">viaje</option>
							<option value="Otros">Otros</option>
							
						</select>
					</div>

					<br>

					
					<input type="submit" name="submit" class="btn btn-success btn-lg pull-right send" value="Retiro" >
					<div class="clearfix"></div>
				</form>';
				
				$vars['razon']=htmlspecialchars($_GET["razon"]);
				$razon=$vars['razon'];
				//$message.='<h1>'.$vars['razon'].$id.'</h1>';
				
				if (strlen($razon)>0) {
				echo strlen ($razon);	
				$approve = $this->helper->update('courses_registrations', $id, $vars);
				header('Location: ../../registrations/despedida/'.$id.'');
				}
				echo $message;
			
								
				//$this->email->sendMail($email, SYSTEM_EMAIL , Cancelacion de Inscripcion , $message);*/
		}
		
		public function despedida($id) {
				$registrationvista = $this->model->getRegistrationvista($id);
				
				$nombre = $registrationvista[0]['name'];
				$apellido= $registrationvista[0]['lastname'];
				$estado= $registrationvista[0]['status'];
				$curso= $registrationvista[0]['slug'];
				$email=$registrationvista[0]['email'];
				$fecharegistro=$registrationvista[0]['date'];
				$horario=$registrationvista[0]['schedule'];
				$desc=$registrationvista[0]['fecha'];
				$id=$registrationvista[0]['id'];
				
				switch ($curso) {
						case 'baby-model':
							$head = REGISTRATION_EMAIL_BABYMODEL_BG;
							$head.= REGISTRATION_EMAIL_BABYMODEL_HEAD;							
							break;	
							
						case 'infantil':
							$head = REGISTRATION_EMAIL_INFANTIL_BG;
							$head.= REGISTRATION_EMAIL_INFANTIL_HEAD;							
							break;	
						
						case 'pre-juvenil':
							$head = REGISTRATION_EMAIL_PREJUVENIL_BG;
							$head.= REGISTRATION_EMAIL_PREJUVENIL_HEAD;							
							break;	
						case 'juvenil':
							$head = REGISTRATION_EMAIL_JUVENIL_BG;
							$head.= REGISTRATION_EMAIL_JUVENIL_HEAD;							
							break;	
						case 'only-for-men':
							$head = REGISTRATION_EMAIL_ONLYFORMEN_BG;
							$head.= REGISTRATION_EMAIL_ONLYFORMEN_HEAD;							
							break;	
						case 'certificacion-5-estrellas':
							$head = REGISTRATION_EMAIL_5ESTRELLAS_BG;
							$head.= REGISTRATION_EMAIL_5ESTRELLAS_HEAD;							
							break;	
						case 'taller-automaquillaje':
							$head = REGISTRATION_EMAIL_TALLERMAQUILLAJE_BG;
							$head.= REGISTRATION_EMAIL_TALLERMAQUILLAJE_HEAD;							
							break;	
						case 'model-look':
							$head = RECORDATORIO_EMAIL_MODELSLOOK_BG;
							$head.= RECORDATORIO_EMAIL_MODELSLOOK_HEAD;							
							break;						
						
					}	
					//echo $curso."<br>";
					//$message.="<h4 style='text-align: center'>Prueba Funcionamiento de envio de correo, <br>botones con URL local no deberian funcionar por los momentos</h4>";
				$message.= $head;
				
			$vars['status'] = 'completed';
			//Change status
			$approve = $this->helper->update('courses_registrations', $id, $vars);
			$message.= "<br><h3 style='text-align: center;'> ".$nombre." ".$apellido.",cancelo su inscripción<br> <small></h3>";
			echo $message;
			//$this->email->sendMail($email, Cancela Inscripcion , $message);
		}
		
		
			public function inscrito($id) {
				$registrationvista = $this->model->getRegistrationvista($id);
				
				$nombre = $registrationvista[0]['name'];
				$apellido= $registrationvista[0]['lastname'];
				$estado= $registrationvista[0]['status'];
				$curso= $registrationvista[0]['slug'];
				$email=$registrationvista[0]['email'];
				$fecharegistro=$registrationvista[0]['date'];
				$horario=$registrationvista[0]['schedule'];
				$desc=$registrationvista[0]['fecha'];
				$id=$registrationvista[0]['id'];
				
				switch ($curso) {
						case 'baby-model':
							$head = REGISTRATION_EMAIL_BABYMODEL_BG;
							$head.= REGISTRATION_EMAIL_BABYMODEL_HEAD;							
							break;	
							
						case 'infantil':
							$head = REGISTRATION_EMAIL_INFANTIL_BG;
							$head.= REGISTRATION_EMAIL_INFANTIL_HEAD;							
							break;	
						
						case 'pre-juvenil':
							$head = REGISTRATION_EMAIL_PREJUVENIL_BG;
							$head.= REGISTRATION_EMAIL_PREJUVENIL_HEAD;							
							break;	
						case 'juvenil':
							$head = REGISTRATION_EMAIL_JUVENIL_BG;
							$head.= REGISTRATION_EMAIL_JUVENIL_HEAD;							
							break;	
						case 'only-for-men':
							$head = REGISTRATION_EMAIL_ONLYFORMEN_BG;
							$head.= REGISTRATION_EMAIL_ONLYFORMEN_HEAD;							
							break;	
						case 'certificacion-5-estrellas':
							$head = REGISTRATION_EMAIL_5ESTRELLAS_BG;
							$head.= REGISTRATION_EMAIL_5ESTRELLAS_HEAD;							
							break;	
						case 'taller-automaquillaje':
							$head = REGISTRATION_EMAIL_TALLERMAQUILLAJE_BG;
							$head.= REGISTRATION_EMAIL_TALLERMAQUILLAJE_HEAD;							
							break;	
						case 'model-look':
							$head = RECORDATORIO_EMAIL_MODELSLOOK_BG;
							$head.= RECORDATORIO_EMAIL_MODELSLOOK_HEAD;							
							break;						
						
					}	
					//echo $curso."<br>";
				//	$message.="<h4 style='text-align: center'>Prueba Funcionamiento de envio de correo, <br>botones con URL local no deberian funcionar por los momentos</h4>";
				$message.= $head;
				
			$vars['status'] = 'clearpayment';
			//Change status
			$approve = $this->helper->update('courses_registrations', $id, $vars);
			$message.= "<br><h3 style='text-align: center;'> ".$nombre." ".$apellido.",confirmo su inscripción<br> <small></h3>";
			echo $message;
			//$this->email->sendMail($email, Confirmacion Inscripcion , $message);
		}
		
		//prueba cron----------------------------------------26052015
		public function trial() {
		   	$email="crodriguez@besign.com.ve";
		   $titulo    = 'Croncorreo';
			$mensaje   = '<h3>Croncorreo</h3>';
			    
			    
			    	$cabeceras  = 'MIME-Version: 1.0' . "\r\n";

					$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";					
					
					// Cabeceras adicionales
					
					$cabeceras .= 'To: '.$email.''."\r\n";
					
					$cabeceras .= 'From: hola@besign.com.ve'."\r\n";					
				
		
			 
					mail($email, $titulo, $mensaje, $cabeceras);
					
			echo "croncorreo enviado";
		}
		
		
		public function recordatorio($id) {
			
			
			//$registrationvista = $this->model->getRegistrationvista($id);
				
				$registrationvista = $this->model->getRegistration($id);
				
				
				$student_id = $registrationvista[0]['student_id'];
				
				$uservista = $this->model->getregistrant($student_id);
				
				$course_group__id = $registrationvista[0]['course_available_group_id'];
				
				$coursevista= $this->model->getCourseAvailable($course_group__id);
				
				$course_name=$coursevista[0]['name'];
				
				$course_id=$coursevista[0]['parent_id'];
				
				//echo $course_id;
				
				$cursoVista= $this->model->getCourse($course_id);
				
				$curso=$cursoVista[0]['slug'];
				//echo $curso;
				
				//$nombre = $registrationvista[0]['name'];
				//$apellido= $registrationvista[0]['lastname'];
				//$email=$registrationvista[0]['email'];				
				$nombre = $uservista[0]['name'];
				$apellido= $uservista[0]['lastname'];
				$email=$uservista[0]['email'];
				$estado= $registrationvista[0]['status'];
				//$curso= $registrationvista[0]['slug'];				
				$fecharegistro=$registrationvista[0]['date'];
				$horario=$registrationvista[0]['schedule'];
				$desc=$registrationvista[0]['fecha'];
				$id=$registrationvista[0]['id'];
				
				
				//echo "<H1>!Hola: ".$nombre." ".$apellido."</H1>";
				
				//echo "<br>Nombre de Curso: ".$curso." Status ".$estado;
				
				//echo "<br>Correo: ".$email." fecha ".$date;
				
				
				//calcula diferencia de fechas
				
				$time = date("d-m-Y H:i:s");
				
				$date1 = new DateTime($fecharegistro);
				
				$date2 = new DateTime($time);
			
				$diff = $date2->diff($date1);

				$hours = $diff->h;
				//$hours = $hours + ($diff->days*24);
				$hours = $diff->days;
				
				
				/*echo "<br>Fecha de registro ".$fecharegistro."<br> hoy ".$time;
				echo "<br>Han pasado: ".$hours." Dias desde el registro<br>";*/
				
				
				//Email Instructions Step 2 	
				switch ($curso) {
						case 'baby-model':
							$head = REGISTRATION_EMAIL_BABYMODEL_BG;
							$head.= REGISTRATION_EMAIL_BABYMODEL_HEAD;							
							break;	
							
						case 'infantil':
							$head = REGISTRATION_EMAIL_INFANTIL_BG;
							$head.= REGISTRATION_EMAIL_INFANTIL_HEAD;							
							break;	
						
						case 'pre-juvenil':
							$head = REGISTRATION_EMAIL_PREJUVENIL_BG;
							$head.= REGISTRATION_EMAIL_PREJUVENIL_HEAD;							
							break;	
						case 'juvenil':
							$head = REGISTRATION_EMAIL_JUVENIL_BG;
							$head.= REGISTRATION_EMAIL_JUVENIL_HEAD;							
							break;	
						case 'only-for-men':
							$head = REGISTRATION_EMAIL_ONLYFORMEN_BG;
							$head.= REGISTRATION_EMAIL_ONLYFORMEN_HEAD;							
							break;	
						case 'certificacion-5-estrellas':
							$head = REGISTRATION_EMAIL_5ESTRELLAS_BG;
							$head.= REGISTRATION_EMAIL_5ESTRELLAS_HEAD;							
							break;	
						case 'taller-automaquillaje':
							$head = REGISTRATION_EMAIL_TALLERMAQUILLAJE_BG;
							$head.= REGISTRATION_EMAIL_TALLERMAQUILLAJE_HEAD;							
							break;	
						case 'model-look':
							$head = RECORDATORIO_EMAIL_MODELSLOOK_BG;
							$head.= RECORDATORIO_EMAIL_MODELSLOOK_HEAD;							
							break;						
						
					}	
					//echo $curso."<br>";
					//$message.="<h4 style='text-align: center'>Prueba Funcionamiento de envio de correo, <br>botones con URL local no deberian funcionar por los momentos</h4>";
				$message.= $head;
								
				$message.= "<br><h1 style='text-align: center;'>HOLA, " .$nombre." ".$apellido."<br> <small></h1>
				<br><h2 style='text-align: center'><i>HACE: ".$hours." DIAS TE REGISTRASTES PARA EL CURSO: ".utf8_decode($course_name)." DE ".$curso."</i><br></small></h2>";
				
				$message.= RECORDATORIO_EMAIL__SALUDO_PART2;
				$message.= "<h2 style='text-align: center'>".$curso."</h2> ";
				$message.= "<h4 style='text-align: center'>( ".$desc."  ".$horario." ) </h4>";
				//$message.=RECORDATORIO_EMAIL__RETRASO; // INTENTO DE USAR BANDERIN
				//$message.="<div style='display:inline-block;align:center;'>";
				$message.=RECORDATORIO_EMAIL__BOTON1_1.$id.RECORDATORIO_EMAIL__BOTON1_2.RECORDATORIO_EMAIL__BOTON2_1.$id.RECORDATORIO_EMAIL__BOTON2_2.RECORDATORIO_EMAIL__BOTON3_1.$id.RECORDATORIO_EMAIL__BOTON3_2;
				
				//$message.="</div>";
				$message.=RECORDATORIO_EMAIL__STEP_1_MESSAGE_PART2;
				//$message.=REGISTRATION_EMAIL__STEP_3_MESSAGE_PART2; //BOTON IR AL SISTEMA
				//$message.= '<h6 style="margin: 0; padding: 0;"><small>'.$curso.'</small></h6>';
				$message.= REGISTRATION_EMAIL_FOOTER;
			
				//$this->email->sendMail($email, SYSTEM_EMAIL , RECORDATORIO_EMAIL__SUBJECT, $message);
				
								
				echo $message;
				
								
			
		}
		
		
		
		public function approve($id) {
			$vars['status'] = 'approved';
			//Change status
			$approve = $this->helper->update('courses_registrations', $id, $vars);
			//Send Notification & instructions
			if ($approve > 0) {
				
				$registration = $this->model->getRegistration($id);
				
				$student = $registration[0]['student_id'];
				$student = $this->model->getRegistrant($student);
				$email = $student[0]['email'];
				
				$this->loadModel('courses');
				$course_group_data = $this->model->getCourseGroup($registration[0]['course_available_group_id']);
				$course_data = $this->model->getCourse($course_group_data[0]['parent_id']);	
				
				//Email Instructions Step 2 	
				switch ($course_data[0]['slug']) {
						case 'baby-model':
							$head = REGISTRATION_EMAIL_BABYMODEL_BG;
							$head.= REGISTRATION_EMAIL_BABYMODEL_HEAD;							
							break;	
							
						case 'infantil':
							$head = REGISTRATION_EMAIL_INFANTIL_BG;
							$head.= REGISTRATION_EMAIL_INFANTIL_HEAD;							
							break;	
						
						case 'pre-juvenil':
							$head = REGISTRATION_EMAIL_PREJUVENIL_BG;
							$head.= REGISTRATION_EMAIL_PREJUVENIL_HEAD;							
							break;	
						case 'juvenil':
							$head = REGISTRATION_EMAIL_JUVENIL_BG;
							$head.= REGISTRATION_EMAIL_JUVENIL_HEAD;							
							break;	
						case 'only-for-men':
							$head = REGISTRATION_EMAIL_ONLYFORMEN_BG;
							$head.= REGISTRATION_EMAIL_ONLYFORMEN_HEAD;							
							break;	
						case 'certificacion-5-estrellas':
							$head = REGISTRATION_EMAIL_5ESTRELLAS_BG;
							$head.= REGISTRATION_EMAIL_5ESTRELLAS_HEAD;							
							break;	
						case 'taller-automaquillaje':
							$head = REGISTRATION_EMAIL_TALLERMAQUILLAJE_BG;
							$head.= REGISTRATION_EMAIL_TALLERMAQUILLAJE_HEAD;							
							break;	
						case 'model-look':
							$head = REGISTRATION_EMAIL_MODELSLOOK_BG;
							$head.= REGISTRATION_EMAIL_MODELSLOOK_HEAD;							
							break;						
						
					}		
				
				$message = $head;
				$message.= REGISTRATION_EMAIL__STEP_3_MESSAGE_PART1;
//				$message.= "<h2>".$course_data[0]['name']." <small>(".$course_group_data[0]['name']."<br>".$course_group_data[0]['schedule'].")</small></h2>";
				$message.= $course_data[0]['step3_instructions'];
				$message.= REGISTRATION_EMAIL__STEP_3_MESSAGE_PART2;
				$message.= REGISTRATION_EMAIL__STEP_3_MESSAGE_PART3;
				$message.= '<h6 style="margin: 0; padding: 0;"><small>'.$course_data[0]['disclosure'].'</small></h6>';
				$message.= REGISTRATION_EMAIL_FOOTER;
				$this->email->sendMail($email, SYSTEM_EMAIL , REGISTRATION_EMAIL__STEP_3_SUBJECT, $message);	
				
			}
			echo $approve;
			
			
		}
		public function showapprovebutton () {
			$this->view->render('students/confirm-approve-content');
		}
		public function showcompletationbutton () {
			$this->view->render('students/confirm-completation-content');
		}
		public function complete($id) {
				$vars['status'] = 'completed';
				$vars['documentation'] = 'recieved';
				//Change status
				$complete = $this->helper->update('courses_registrations', $id, $vars);
				//Send Notification & instructions
				if ($complete > 0) {
					
					$registration = $this->model->getRegistration($id);
					
					$student = $registration[0]['student_id'];
					$student = $this->model->getRegistrant($student);
					$email = $student[0]['email'];
					
					$this->loadModel('courses');
					$course_group_data = $this->model->getCourseGroup($registration[0]['course_available_group_id']);
					$course_data = $this->model->getCourse($course_group_data[0]['parent_id']);	
					
					switch ($course_data[0]['slug']) {
						case 'baby-model':
							$head = REGISTRATION_EMAIL_BABYMODEL_BG;
							$head.= REGISTRATION_EMAIL_BABYMODEL_HEAD;							
							break;	
							
						case 'infantil':
							$head = REGISTRATION_EMAIL_INFANTIL_BG;
							$head.= REGISTRATION_EMAIL_INFANTIL_HEAD;							
							break;	
						
						case 'pre-juvenil':
							$head = REGISTRATION_EMAIL_PREJUVENIL_BG;
							$head.= REGISTRATION_EMAIL_PREJUVENIL_HEAD;							
							break;	
						case 'juvenil':
							$head = REGISTRATION_EMAIL_JUVENIL_BG;
							$head.= REGISTRATION_EMAIL_JUVENIL_HEAD;							
							break;	
						case 'only-for-men':
							$head = REGISTRATION_EMAIL_ONLYFORMEN_BG;
							$head.= REGISTRATION_EMAIL_ONLYFORMEN_HEAD;							
							break;	
						case 'certificacion-5-estrellas':
							$head = REGISTRATION_EMAIL_5ESTRELLAS_BG;
							$head.= REGISTRATION_EMAIL_5ESTRELLAS_HEAD;							
							break;	
						case 'taller-automaquillaje':
							$head = REGISTRATION_EMAIL_TALLERMAQUILLAJE_BG;
							$head.= REGISTRATION_EMAIL_TALLERMAQUILLAJE_HEAD;							
							break;	
						case 'model-look':
							$head = REGISTRATION_EMAIL_MODELSLOOK_BG;
							$head.= REGISTRATION_EMAIL_MODELSLOOK_HEAD;							
							break;						
						
					}		
					
					$message = $head;
				//	$message.= REGISTRATION_EMAIL__STEP_4_MESSAGE_PART1;
					$message.= "<h2>".$course_data[0]['name']." <small>(".$course_group_data[0]['name']."<br>".$course_group_data[0]['schedule'].")</small></h2>";
					$message.= $course_data[0]['welcome_instructions'];
					$message.= REGISTRATION_EMAIL__STEP_4_MESSAGE_PART2;
					//$message.= '<h6 style="margin: 0; padding: 0;"><small>'.$course_data[0]['disclosure'].'</small></h6>';
					$message.= REGISTRATION_EMAIL_FOOTER;
					$this->email->sendMail($email, SYSTEM_EMAIL , REGISTRATION_EMAIL__STEP_4_SUBJECT, $message);	
					
				}
				echo $complete;
				
				
			}
		
		public function get($what) {
			
			switch ($what) {
				case 'pending':
					$tablename = 'courses_registrations';
					$fields = array('id','course', 'group_name','student_name','student_lastname','date','status');
					$temptable = 'registrations';
					$where = "WHERE courses_registrations.status='pending'";
					
					break;
				case 'clearpayment':
					$tablename = 'courses_registrations';
					$fields = array('id','course', 'group_name','student_name','student_lastname','date','status','id');
					$temptable = 'registrations';
					$where = "WHERE courses_registrations.status='clearpayment'";
					
					break;
					
				case 'approved':
					$tablename = 'courses_registrations';
					$fields = array('id','course', 'group_name','student_name','student_lastname','date','status');
					$temptable = 'registrations';
					$where = "WHERE courses_registrations.status='approved'";
					
					break;
				case 'active':
					$tablename = 'courses_registrations';
					$fields = array('id','course', 'group_name','student_name','student_lastname','date','status');
					$temptable = 'registrations';
					$where = "WHERE courses_registrations.status='completed' AND student_profile.status ='1'";
					
					break;
					
				default:
					$tablename = 'courses_registrations';
					$fields = array('id','course', 'group_name','student_name','student_lastname','date','status');
					$temptable = 'registrations';
					$where = "WHERE courses_registrations.status!='completed' AND courses_registrations.status!='cancelled' AND courses_registrations.status!='archived'";
					
					break;
			}
			
			$data = $this->helper->getJSONtables($tablename, $fields, $where, $temptable);
			echo $data;			
			
		}
		 
	}

?>