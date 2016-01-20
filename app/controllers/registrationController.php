<?php 
	
	class registrationController extends Controller {
		
		public function __construct() {
						
			parent::__construct();
			
		}
	
		
		public function process($what = 'preregister') {
				
			$array_data = array();	
			foreach ($_POST as $key => $value) {
				$field = escape_value($key);
				$field_data = escape_value($value);
				
				$array_data[$field] = $field_data;
			}
			unset($array_data['submit']);
			
			switch ($what) {
				
				/*****  PROCESS PRE INSCRIPCION  *****/
				case 'preregister':
					// 1 -Creates User&Profile and Sends Authentication Link
					$array_student['username'] 	= $array_data['email'];
					//$array_student['rif'] 		= $array_data['nationality'].$array_data['cedula'];
					$array_student['role'] 		= 'estudiante';
					$array_student['name'] 		= $array_data['name'];
					$array_student['lastname'] 	= $array_data['lastname'];
					$array_student['email'] 	= $array_data['email'];
					//$array_student['PromoIns']	= $array_data['PromoIns'];
					$array_student['data'] 		= $array_data;
					//Registration Data
					//Check if user is reserved email 
					$protected_emails =	$this->model->getReservedEmails();
					
					foreach ($protected_emails as $protected_email) {
						
						if ($protected_email['email'] == $array_data['email']) {
							echo PROTECTED_EMAIL_MESSAGE;
							exit;
						}
					}
					
					
					//Check if already exist in User database
					$already_registered =	$this->model->getRegistrant($array_data['email'], 'username');
					$already_registered_result = DB::count();
					
					if (empty($already_registered)) {
							
						//Register User				
						require_once('usersController.php');	
						$users = new usersController;	
						$create_user = $users->create($array_student);	
						
						//echo $create_user;
						  
						if ($create_user > 0) {
								
							//Create Course Registration	
							$array_registration['course_available_group_id'] = 	$array_data['course_available_group_id'];
							$array_registration['student_id'] 				 = 	DB::insertId();
							$array_registration['data'] 					 = 	json_encode($array_data);
							$array_registration['status']					 =  'pending'; //awaits for payment
							//$array_registration['PromoIns']					 =  $array_data['PromoIns']; //PROMO PREREGISTRO POR LA PAGINA
							
							$create_registration = $this->step1($array_registration);				
							
						}			
						
					
					} else {
						// User exists just create Course Registration												
						//Create Course Registration	
							$array_registration['course_available_group_id'] = 	$array_data['course_available_group_id'];
							$array_registration['student_id'] 				 = 	$already_registered[0]['id'];
							$array_registration['data'] 					 = 	json_encode($array_data);
							$array_registration['status']					 =  'pending'; //awaits for payment
							//$array_registration['PromoIns']					 =  $array_data['PromoIns']; //PROMO PREREGISTRO POR LA PAGINA
							
							$create_registration = $this->step1($array_registration);			
							
						
					}
					
					//ADD DELIA
					$array_data['registration_id'] = DB::insertId();
					
					
					//Add Referal Process
					if (!empty($array_data['referal'])) {
						require_once('referalsController.php');	
					    $referal = new referalsController;	
					    $create_referal = $referal->inviteme($array_data);	
						$loaded = 1;					
					}

					if (!empty($array_data['referred']) && !empty($array_data['referalid'])  && !empty($array_data['code'])) {
						if ($loaded != 1) {
							require_once('referalsController.php');	
					    	$referal = new referalsController;
						}								
					    $create_referal = $referal->activate($array_data['referalid'], /*$array_data['referred']*/ $array_student['email'], $array_data['code']);	
					}
					//ADD DELIA
					
					break;
				
				/*****  PROCESS INSCRIPCION  *****/
				case 'fullregistration':
					//Registration Data
					$array_registration['id'] = $array_data['registration_id'];
					unset($array_data['registration_id']);
					$array_registration['data'] 					 = 	json_encode($array_data);
							
					$create_registration = $this->step3($array_registration);			
					break;
				
				case 'payment' :
					
					/*****  PROCESS PAYMENT  *****/
					
					$array_registration['id']			 =	$array_data['id'];
					unset($array_data['id']);
			
					
					$array_registration['data_payment']	 = 	json_encode($array_data);
					$array_registration['status']	 =  'clearpayment';
														 //awaits for payment checkup
					
					$create_registration = $this->step2($array_registration);	
					//print_r($registration);
					break;
			}
			
			
		}

		public function documentation($id) {
			//Check status for registration
			$registration = $this->model->getRegistration($id);			
			
			if ($registration[0]['status'] === 'approved' && $registration[0]['documentation'] === 'pending') {
				//All ready to print, build forms
				$this->view->registration = $registration[0];
				$this->view->details =  json_decode($this->view->registration['data'], TRUE);
				
				$this->loadModel('courses');
				$this->view->course_group = $this->model->getCourseGroup($registration[0]['course_available_group_id']);
				$this->view->course = $this->model->getCourse($this->view->course_group[0]['parent_id']);							
				
				$this->view->render('registration/documentation/'.$this->view->course[0]['slug']);
				
				
				
			} else {
				//Registration Sheet is yet pending for Complete, so show Sheet
				$this->view->render('escuela/registration/step3');
			}
		}
		
		
		public function step3($data) {
			
			$registration = $this->model->getRegistration($data['id']);
			//id Approved, can run step3
			if ($registration[0]['status'] == 'approved') {
					
				$vars['data'] = $data['data'];
				$vars['documentation'] = 'pending';
				$insert = $this->helper->update('courses_registrations', $data['id'], $vars);
				if ($insert > 0) {
					
					//Redirect	
					$forcechangeurl = rand(0, 50);
					$this->view->redirect_link = 'registration/documentation/'.$data['id'].'/'. $forcechangeurl;
					$this->view->response = "Listo! Ahora solo debes imprimir tu planilla y llevarla a Model's View";
					$this->view->render('redirect_hash');	
					
				}
			}
			
			//print_r($data);
			
		}

		public function step2($data) {
			
			$registration = $this->model->getRegistration($data['id']);
			$vars['data_payment'] = $data['data_payment'];
			$vars['status'] = $data['status'];
			$insert = $this->helper->update('courses_registrations', $data['id'], $vars);
			
			$codigodedescuento2 = json_decode($data['data_payment']);
			$codigodedescuento = $codigodedescuento2->{'payment-code'} ;
			
			if ($insert > 0) {
					
					$student = $this->model->getRegistrant($registration[0]['student_id']);
					$email = $student[0]['username'];
						
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
						case 'model-look-juvenil':
							$head = REGISTRATION_EMAIL_MODELSLOOK_JUVENIL_BG;
							$head.= REGISTRATION_EMAIL_MODELSLOOK_JUVENIL_HEAD;							
							break;	
					}						
					
					//Email Instructions Step 1 
					$message = $head;
					$message.= $course_data[0]['step2_instructions'];
					$message.= REGISTRATION_EMAIL__STEP_2_MESSAGE_PART2;
					$message.= '<h6 style="margin: 0; padding: 0;"><small>'.$course_data[0]['disclosure'].'</small></h6>';
					$message.= REGISTRATION_EMAIL_FOOTER;

					$this->email->sendMail($email, SYSTEM_EMAIL , REGISTRATION_EMAIL__STEP_2_SUBJECT, $message);
					$this->email->ClearAddresses();
					
					//Email to MODELS VIEW				
					$who = $this->user->get('role');
					
					if ($who != 'administracion') 
					{
						
								echo $codigodedescuento;
						/* aqui se manda el correo */

								$system_message = SYSTEM_SIMPLE_EMAIL_HEAD;
								$system_message.= "<strong>".$student[0]['name']." ".$student[0]['lastname']."</strong>". PAYMENT_NOTIFICATION_EMAIL_MESSAGE ;
						
							if(!empty($codigodedescuento))
							{

								$system_message.= "<br><center><p> *Esta inscripcion tiene un ";
 								$system_message.= $registration[0]['disccountvalue'];
 								$system_message.= "% descuento </p></center>";



							}
		
 							
							$system_message.= SYSTEM_SIMPLE_EMAIL_FOOTER;
													
							$this->email->sendMailwithCC(USUARIO_ADMINISTRACION, 
											SYSTEM_EMAIL , 
											$student[0]['name']." ".$student[0]['lastname'].PAYMENT_NOTIFICATION_EMAIL__SUBJECT, 
											$system_message,
											"adortega90@gmail.com",
											"aortega@besign.com.ve");	

											//"presidencia@modelsviewgroup.com",
											//"dlarez@besign.com.ve");	
				
					}
					
			}
			
		}

		/*Esto envia el correo del descuento a las inscritos que tengon el descuento   */
		public function stepDisccount() 
		{			
			$c=0;
				
			$this->view->title = SITE_NAME. " | Descuento";
			$registros =" ";


			$registros = $this->model->getRegistrationsCode();
			
			
			foreach ($registros as $registro) 
			{	
				$aux = json_decode($registro['data']);
				$email = $aux->{'email'} ;
				//if($email == "aaaa.@GMAIL.COM"){
				
					
					$head = SYSTEM_SIMPLE_EMAIL_HEAD;
				
					///* ENVIO DE CORREO ELECTRONICO 
					    	
					
							
							$messagedisc.=	$head;
							$messagedisc.="<h2> <center>";
							$messagedisc.="¡Felicidades! <br>";
							$messagedisc.="tienes un <span style='color:blue'>".$registro['disccountvalue']."%</span> de descuento";
							$messagedisc.="</center></h2>";
							$messagedisc.="<p><center> para realizar tu inscripcion al curso </p> </center>";

							$messagedisc.="<br><h3>Puedes hacer uso de este descuento ingresando este codigo en la confirmacion de tu pago</h3> <br>";
							$messagedisc.="<center><h1>CODIGO: <span style='color:blue'>".$registro['code']."</span> </h1> </center><br>";
							///boton 

							
							$messagedisc.='<table cellspacing="0" align="center" cellpadding="0"> <tr> 
					<td align="center" width="130" height="40" bgcolor="'.SYSTEM_EMAIL_BUTTONSCOLOR.'" style="-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; color: #ffffff; display: block;">
					<a href="'.URL .'" style="color: #ffffff; font-size:16px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; text-decoration: none; line-height:40px; width:100%; display:inline-block">Ir al Sistema</a>
					</td></tr></table>';
							

							$messagedisc.= SYSTEM_SIMPLE_EMAIL_FOOTER;
							

							
							$vars['disccount'] = 1;
				
					
							$insert = $this->helper->update('courses_registrations', $registro['id'], $vars);
		
							//$email="crodriguez@besign.com.ve";
							$this->email->sendMail($email, SYSTEM_EMAIL , strtoupper($course_data[0]['name'])." TIENES UN DESCUENTO EN EL PAGO DE INSCRIPCION" ,$messagedisc);	
							$this->email->ClearAddresses();
							
							echo utf8_decode($messagedisc);
							$messagedisc="";
							$c=$c+1;
					//}		
			}
			echo $c." Correos Enviados";
			
		}

		

		
		public function step1($data) {
			
			//Check if user is already registered in this course
			$and = 'AND course_available_group_id ='. $data['course_available_group_id'];
			
			//student data
			$student_info = $this->model->getRegistrant($data['student_id'], 'id' );
			
			$already_registered = $this->model->getRegistration($data['student_id'], 'student_id', $and );
			
			
			if ($student_info[0]['name'] == $data['name']){
				
				if (!empty($already_registered )) {				
					echo COURSES_ALREADYREGISTERED_MESSAGE;				
				} 
				
			} else {
				$insert = $this->helper->insert('courses_registrations', $data);
			
				if ($insert > 0) {
					$student = $this->model->getRegistrant($data['student_id']);
					$email = $student[0]['username'];
						
					$this->loadModel('courses');
					$course_group_data = $this->model->getCourseGroup($data['course_available_group_id']);
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
							$extra = "";							
							break;	
						case 'model-look':
							$head = REGISTRATION_EMAIL_MODELSLOOK_BG;
							$head.= REGISTRATION_EMAIL_MODELSLOOK_HEAD;	
							$extra = "<br>https://www.youtube.com/watch?v=62OR1CtKxjA";							
							break;	
						case 'model-look-juvenil':
							$head = REGISTRATION_EMAIL_MODELSLOOK_JUVENIL_BG;
							$head.= REGISTRATION_EMAIL_MODELSLOOK_JUVENIL_HEAD;		
							$extra = "<br>https://www.youtube.com/watch?v=62OR1CtKxjA";				
							break;	
										
														
						
					}
												
					
					//Email Instructions Step 1 
					$message =	$head;
					$message.= REGISTRATION_EMAIL__STEP_1_MESSAGE_PART1;
					$message.= "<h2>".$course_data[0]['name']." <small>(".$course_group_data[0]['name']."<br>".$course_group_data[0]['schedule'].")</small></h2>";
					$message.= $course_data[0]['step1_instructions'];
					$message.= REGISTRATION_EMAIL__STEP_1_MESSAGE_PART2;
					$message.= '<h6 style="margin: 0; padding: 0;"><small>'.$course_data[0]['disclosure'].'</small></h6>';
					$message.= $extra;
					$message.= REGISTRATION_EMAIL_FOOTER;
					//$bodyuser = $this->email->buildNiceEmail('registration', REGISTRATION_EMAIL__STEP_1_SUBJECT, $message);
					$this->email->sendMail($email, SYSTEM_EMAIL , strtoupper($course_data[0]['name'])." ". REGISTRATION_EMAIL__STEP_1_SUBJECT, $message);				
					if($data['disccount']==null && $data['code']!=null){
						$messagedisc ="</br>";
						$messagedisc =	$head;							
						$messagedisc.="<h2>Felicidades, con tu inscripción al curso has obtenido 15% de descuento </h2>";
						$messagedisc.="<h3>Puedes hacer uso de este descuento ingresando este codigo :".$data['code']." en la confirmacion de tu pago</h3>";
						$messagedisc.="<h2>".$course_data[0]['name']." <small>(".$course_group_data[0]['name']."<br>".$course_group_data[0]['schedule'].")</small></h2>";
						$messagedisc.= REGISTRATION_EMAIL_FOOTER;
						echo $messagedisc;
						//$this->email->sendMail($email, SYSTEM_EMAIL , strtoupper($course_data[0]['name'])." ". REGISTRATION_EMAIL__STEP_1_SUBJECT_DISC, $messagedisc);
						//$vars['disccount'] = $data['disccount'];						
						//$insert = $this->helper->update('courses_registrations', $data['id'], $vars);
					}
					echo COURSES_SUCCESS_REGISTRATION_MESSAGE;
				}
			}
			
			
			
			
			
		}


		public function paymentform($id) {
			//get Details from selected Registration
			$this->view->registration = $this->model->getRegistration($id);
			//$this->view->details =  json_decode($this->view->registration[0]['data'], TRUE);
			//Build View
			$this->view->render('registration/payments/register');			
		}
		public function complete($id) 
		{
			
			Auth::handleLogin('escuela');	
			
			$student = $this->user->getUserdata();
			$this->view->student = $student;
			
			$registration = $this->model->getRegistration($id);
			$this->view->registration = $registration[0];
			$this->view->details =  json_decode($this->view->registration['data'], TRUE);
			
			$this->loadModel('courses');
			$course_group = $this->model->getCourseGroup($registration[0]['course_available_group_id']);
			$this->view->course = $this->model->getCourse($course_group[0]['parent_id']);							
			
			$this->view->render('registration/sheet/'.$this->view->course[0]['slug']);
			
		}
		public function verifycode () {

			
			$codigo = escape_value($_POST['payment-code']);
			$idreg = escape_value($_POST['id']);
			
			$already_codigo =	$this->model->getRegistration($idreg, 'id'); //checkRegistered


			


				if ( $already_codigo[0]['code'] == $codigo  ) {
	   				 echo 'true';
				}
				else {
				    echo 'false';
				}
			
		}
			
		public function alreadylisted(/*$name, $course_id, $email*/) {
				
			$name = escape_value($_POST['name']);
			$course_id = escape_value($_POST['course_id']);
			$email =  escape_value($_POST['email']);
		//	WHERE  `course_available_group_id` =31
			$already_listed =	$this->model->getRegistrations($course_id, 'course_available_group_id', $email); //checkRegistered
			
			$already_listed[0]['data'] = json_decode($already_listed[0]['data'],TRUE);
			//print_r($already_listed);	
			similar_text(strtoupper($already_listed[0]['data']['name']),strtoupper($name), $percent);
		//	echo $percent;
			//if ($listed_name == strtoupper($name)) {
			//if ($_POST['name'] == 'VALERIA'){		
			if ($percent > 50){	
	   			echo 'false';
			} else {
				echo 'true';
			}			
			
		}

		public function verify ($id='', $preview ='') {
	
			//Auth::handleLogin('escuela');			
			
			$student = $this->user->getUserdata();			
			
			//Get Registration Status And Notify user if needed TODO ¿MAS DE UNA INSCRIPCION, COMO EVALUAR?
			
			$id = escape_value($id);
		
			
			if(empty($id))	{	
				$registration = $this->model->getRegistration($student[0]['id'], 'student_id');
				
			} else {
				
				$student[0]['id'] = $id;
				$registration = $this->model->getRegistration($student[0]['id'], 'id');
				$nombre = json_decode($registration[0]['data']);
                $name= $nombre->{'name'} ;
                $student[0]['name'] = $name;	                
			}	
			
			$this->view->student = $student;

			$this->loadModel('courses');
			
			$course_group = $this->model->getCourseGroup($registration[0]['course_available_group_id']);
			$courseinfo = $this->model->getCourse($course_group[0]['parent_id']);	
			$this->view->courseinfo	= $courseinfo;				
			$this->view->registration = $registration[0];
			
				
			switch ($registration[0]['status']) {
				case 'pending':
							
					$this->view->render('escuela/registration/step1');
					
					break;
				
				case 'clearpayment':
					
					$this->view->render('escuela/registration/step2');
					
					break;
					
				case 'approved':
				
					if ($preview === 'schedule') {
						
						$this->view->course_group = $course_group;
						
						$this->view->render('escuela/schedule'); 
						
					} else {
						
						
						//Check if PLanilla is ready to print, or needs completation
						switch ($registration[0]['documentation']) {
							
							case 'to complete':
								$this->view->render('escuela/registration/step3'); //Complete form
								break;
								
							case 'pending':
								$this->view->render('escuela/registration/step4'); //Print and take
								break;
							//TODO case recieved
							//print await?
						}
						
					}
					
								
					
					break;
				
				case 'completed':
			
					$this->view->render('escuela/home');

					$curso = $courseinfo[0]['slug'];
					$curso2 = 'model-look-juvenil';
					$curso3 = 'model-look-infantil';
					
					if( (strcmp($curso, $curso2) == 0) or (strcmp($curso, $curso3) == 0))
					{
						$this->view->slug = $courseinfo[0]['name'];	
						
						$this->view->render('escuela/registration/complete');	
					}	
					
					
					break;
					
				default:		
							
					break;
			}
				
			
		}

		//public function preverify ($id, $preview ='') {
		public function preverify ( $preview ='') {
			
			$student = $this->user->getUserdata();

			$this->view->student = $student;
			
			$registration= $this->model->getRegistroCurso($student[0]['id']);
						
			$this->view->registros = $registration;	
					
			$this->view->render('escuela/registration/preregistration');
		}





		public function schedule() {
			
		}

		//RESEND APPROVAL
		public function reminder($what = "bringdocs", $id) {
			
			$registration = $this->model->getRegistration($id);
			if (!empty($registration) && $registration[0]['status'] == 'approved') {
				
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
						case 'model-look-juvenil':
							$head = REGISTRATION_EMAIL_MODELSLOOK_JUVENIL_BG;
							$head.= REGISTRATION_EMAIL_MODELSLOOK_JUVENIL_HEAD;							
							break;						
						
					}
				
				//Email Instructions Step 2 			
				
				$message = $head;
				$message.= REGISTRATION_EMAIL__STEP_3_MESSAGE_PART1;
				$message.= "<h2>".$course_data[0]['name']." <small>(".$course_group_data[0]['name']."<br>".$course_group_data[0]['schedule'].")</small></h2>";
				$message.= $course_data[0]['step3_instructions'];
				$message.= REGISTRATION_EMAIL__STEP_3_MESSAGE_PART2;
				$message.= '<h6 style="margin: 0; padding: 0;"><small>'.$course_data[0]['disclosure'].'</small></h6>';
				$message.= REGISTRATION_EMAIL_FOOTER;
				$this->email->sendMail($email, SYSTEM_EMAIL , "RECORDATORIO: ".REGISTRATION_EMAIL__STEP_3_SUBJECT, $message);	
				
			}
			echo '<h4 class="text-center">Se ha enviado un mensaje recordatorio <br>a <a href="mailto:'.$email.'">'.$email.'</a></h4>' ;		
		}
	
	
	}
?>