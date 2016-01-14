<?php 
	
	class recordatorioController extends Controller {
		
		public function __construct() {
			
			parent::__construct();
			//Auth::handleLogin('recordatorio');	
		}
		
				
	public function recordatorios($authkey) {
		
		$c=0;
		
		if ($authkey !== 'mdlsN054') {
			echo "error";
			exit;
			
		} else {
			$this->view->title = SITE_NAME. " | Recordatorio de Inscripción";

		$registros = $this->model->getRegistrations();
		$students = $this->model->getRegistrants();

		$i =1;
		//*************ciclo repetitivo recorrera los registros de curso y evaluara quienes estan en pendiente y tienen 2 o 5 dias de haberse registrado
		foreach ($registros as $registro) {

				if ($registro['status']=='pending') 
				{
					$days = $this->model->getDay($registro['date']); //cuantos dias tiene desde que sin inscribio
					$days = $days[0]['days'];
					
					if($days>=31) // si son mas de 31 se archiva la inscripcion y no se toma de en cuenta 
					{
						
						$array_vars['status']='archived'; 
						$this->helper->update('courses_registrations',$registro['id'],$array_vars);
						echo $registro['id'].'  ';
					}	
					
				}

				$rem=$registro['rememberMail'];
			
				$id=$registro['id'];
			
				$student_id = $registro['student_id'];
				
				$uservista = $this->model->getRegistrant($student_id);
						 
				$course_group__id = $registro['course_available_group_id'];
				
				$coursevista= $this->model->getCourseAvailable($course_group__id);
				
				
				
				$course_id=$coursevista[0]['parent_id'];
				
				
				$cursoVista= $this->model->getCourse($course_id);
				
				$curso=utf8_decode($cursoVista[0]['slug']);
				
				$course_name=utf8_decode($cursoVista[0]['name']);
			
					
				$nombre = utf8_decode($uservista[0]['name']);
				$apellido= utf8_decode($uservista[0]['lastname']);
				$email=$uservista[0]['email'];
				$estado= $registro['status'];							
				$fecharegistro=$registro['date'];
				$horario=utf8_decode($registro['schedule']);
				$desc=utf8_decode($registro['fecha']);
				
				$status=$registro['status'];
				
			
				//calcula diferencia de fechas
				
				$time = date("d-m-Y H:i:s");
				
				$date1 = new DateTime($fecharegistro);
				
				$date2 = new DateTime($time);
			
				$diff = $date2->diff($date1);

				$horas = $diff->h;
				//$hours = $hours + ($diff->days*24);
				$difdays = $diff->days;
			
			
			
			//if ($registro['status']=='pending' && ($email=="dlarez@besign.com.ve" || $email=="crodriguez@besign.com.ve")  ){
			if ($registro['status']=='pending'  )
			{
				
			$studentid = $registro['student_id'];
			$e_mail =  $this->model->getRegistrant($studentid); 
		
					
			
			//muestra correos filtrados			
			//$message.="<h4 style='text-align: center'>".$id." Id estudiante ".$student_id." ".$e_mail[0]['username']." Dias registrado".$difdays."   Status de envio".$registro['rememberMail']."</h4>";
			
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
						case 'model-look-juvenil':
							$head = RECORDATORIO_EMAIL_MODELSLOOK_BG;
							$head.= RECORDATORIO_EMAIL_MODELSLOOK_HEAD;							
							break;	
					}	

									
				$message.= $head;
								
				$message.= "<br><h1 style='text-align: center;'>!HOLA, " .$nombre." ".$apellido."!<br> <small></h1>
				<br><h2 style='text-align: center'><i>Hace ".$difdays." dias te registraste en ".$course_name."</i><br></small></h2>";
	
				$message.= RECORDATORIO_EMAIL__SALUDO_PART2;
				//$message.= "<h2 style='text-align: center'>".$curso."</h2> ";
				//$message.= "<h4 style='text-align: center'> ".$desc."  ".$horario."  </h4>";
				
			
				$message.=RECORDATORIO_EMAIL__BOTON1_1.$id.RECORDATORIO_EMAIL__BOTON1_2.RECORDATORIO_EMAIL__BOTON2_1.$id.RECORDATORIO_EMAIL__BOTON2_2.RECORDATORIO_EMAIL__BOTON3_1.$id.RECORDATORIO_EMAIL__BOTON3_2;
				
			
				$message.=RECORDATORIO_EMAIL__STEP_1_MESSAGE_PART2;
			
				$message.= REGISTRATION_EMAIL_FOOTER;
			
			
							
					
			//asigna flag de enviado al campo rememberMail
			//if(empty($rem) && $difdays<=30){
				
			if(empty($rem) && $difdays > 2 && $difdays<60){
			 $vars['rememberMail'] = '1';
						
												 	
						 	
						 	$mail = new PHPMailer(); // defaults to using php "mail()"	
									$mail->IsSMTP(); 
							 
									$mail->SMTPDebug  = '0';         
																	
									$mail->SMTPAuth   = true; // SMTP authentication
								    $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
								    $mail->Host       = 'smtp.gmail.com'; // SMTP server
								    $mail->Port       = 587; // SMTP Port
								    $mail->Username   = 'noresponder@modelsviewgroup.com'; // SMTP account username
								    $mail->Password   ='mlogadmin2007';    
									
									
									$mail->Subject = utf8_decode("Recordatorio de inscripcion Model´s View");
									$mail->SetFrom(SYSTEM_EMAIL);
									$mail->AddAddress($email);
									$mail->MsgHTML($message);
									//$mail->Send();
									$approve = $this->helper->update('courses_registrations', $id, $vars);
						 			 	
						 					
				echo utf8_decode($message);
				$vars['rememberMail'] = '0';
				$message="";
				$c=$c+1;
			}
			
			if($rem==1 && $difdays>5 && $difdays<60){
			 $vars['rememberMail'] = '2';
			  //ingresa valor a campo flag de recordatorio
						
						 	
						 		$mail = new PHPMailer(); // defaults to using php "mail()"	
									$mail->IsSMTP(); 
							
									$mail->SMTPDebug  = '0';         
																
									$mail->SMTPAuth   = true; // SMTP authentication
								    $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
								    $mail->Host       = 'smtp.gmail.com'; // SMTP server
								    $mail->Port       = 587; // SMTP Port
								    $mail->Username   = 'noresponder@modelsviewgroup.com'; // SMTP account username
								    $mail->Password   ='mlogadmin2007';    
									
									
									$mail->Subject = "Recordatorio de inscripcion";
									$mail->SetFrom(SYSTEM_EMAIL);
									$mail->AddAddress($email);
									$mail->MsgHTML($message);
									//$mail->Send();
							
						 	$approve = $this->helper->update('courses_registrations', $id, $vars);
						 					
									echo utf8_decode($message);
									$vars['rememberMail'] = '0';
									$message="";
									$c=$c+1;
						}
				
				
			
								
				}
				$message="";
			}
		}
							
		echo $c. " Correos enviados";
														
	}


		public function reject($id) {
			
			$titulo =utf8_decode("Cancela Inscripción");	
			$this->view->title = SITE_NAME. " | $titulo"; 
			$mesage = "Esta opción cancelara su inscripcion, Desea Continuar?";
			$message .='<script type="text/javascript">alert('.$mesage.');</script>';
						
			$registrationvista = $this->model->getRegistration($id);
			if($registrationvista[0]['status']=="pending" || $registrationvista[0]['status']=="cancelled"){
			
				$cursoview = $this->model->getCourseAvailable($registrationvista[0]['course_available_group_id']);
				$cursov= $this->model->getCourse($cursoview[0]['parent_id']);
				$curso= $cursov[0]['slug'];
			
				$nombre = $registrationvista[0]['name'];
				$apellido= $registrationvista[0]['lastname'];
				$estado= $registrationvista[0]['status'];
				
				
				$email=$registrationvista[0]['email'];
				$fecharegistro=$registrationvista[0]['date'];
				$horario=$registrationvista[0]['schedule'];
				$desc=$registrationvista[0]['fecha'];
				$id=$registrationvista[0]['id'];
				
				/*actualiza estatus cancelado -----------------------*/
				
				$time = date("d-m-Y H:i:s");
				$date2 = new DateTime($time);
				$varis['date']=date_format($date2, 'd-m-y H:m:s');
				$varis['id']=$id;				
				$varis['razon']="norazon";
				$varis['obs']="no indico razon";
				//$varis['mail']='first';
				$vars['razon']=json_encode($varis);
				$razon=$vars['razon'];
				$vars['status']="cancelled";
				
			
						
					//$varis['mail']='final';
					$vars['razon']=json_encode($varis);
					$razon=$vars['razon'];
					$approve = $this->helper->update('courses_registrations', $id, $vars);
					
				$this->email->sendMail($email, SYSTEM_EMAIL , $asunto , utf8_decode($razon));
				
				
				/*--------------------------------------------------*/
				
				//$approve = $this->helper->update('courses_registrations', $id, $vars);
				


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
						case 'model-look-juvenil':
							$head = RECORDATORIO_EMAIL_MODELSLOOK_BG;
							$head.= RECORDATORIO_EMAIL_MODELSLOOK_HEAD;							
							break;	
					}	

				//echo $curso."<br>";
				//$message.="<h4 style='text-align: center'> ".$curso." ".URL_EMAIL."images/courses/model-look-juvenil/email-bg.jpg Prueba Funcionamiento de envio de correo, <br>botones con URL local no deberian funcionar por los momentos</h4>";
				$message.= $head;
				$message.= RECORDATORIO_EMAIL__RESP_BODY;
				
				$message.=RECORDATORIO_EMAIL__FORM;
				
				$message.= RECORDATORIO_EMAIL_FOOTER;
				//Carga valores en objeto json y los actualiza en el campo razon de la tabla courses_registrations
				if(strlen($_GET["raz"])>0){
						
				//$validacorreocancel=strpos($registrationvista[0]['razon'],"final");
				$time = date("d-m-Y H:i:s");
				$date2 = new DateTime($time);
				$varis['date']=date_format($date2, 'd-m-y H:m:s');
				$varis['id']=$id;				
				$varis['razon']=htmlspecialchars($_GET["raz"]);
				$varis['obs']=escape_value(trim(htmlspecialchars($_GET["obs"])));
				//$varis['mail']='second';
				$vars['razon']=json_encode($varis);
				$razon=$vars['razon'];
				//$vars['status']="cancelled";
				
				
				$approve = $this->helper->update('courses_registrations', $id, $vars);
				
				header('Location: ../../recordatorio/despedida/'.$id.'');
				}
				echo utf8_decode($message);			
				
				$email="dlarez@besign.com.ve";
				$email="crodriguez@besign.com.ve";
				$asunto=utf8_decode("Cancelacion de Inscripción");
					
				//permite que solo se envie correo de cancelacion solo la primera vez que se ejecuta				
			
						
					//$varis['mail']='final';
					$vars['razon']=json_encode($varis);
					$razon=$vars['razon'];
					$approve = $this->helper->update('courses_registrations', $id, $vars);
					
				$this->email->sendMail($email, SYSTEM_EMAIL , $asunto , utf8_decode($razon));
				
				
				}else{
					
				header('Location: ../../recordatorio/error/');	
				
			}
		}
		
		
		
		
		
		public function inscrito($id) {
			$titulo =utf8_decode("Confirma Inscripción");	
			$this->view->title = SITE_NAME. " | $titulo";
			$registrationvista = $this->model->getRegistration($id);
			if($registrationvista[0]['status']=="pending"){
			
			$usuario = $this->model->getRegistrant($registrationvista[0]['student_id']);
			
				$cursoview = $this->model->getCourseAvailable($registrationvista[0]['course_available_group_id']);
				$cursov= $this->model->getCourse($cursoview[0]['parent_id']);
				$curso= $cursov[0]['slug'];
			
				$nombre = $usuario[0]['name'];
				$apellido= $usuario[0]['lastname'];
				$estado= $registrationvista[0]['status'];
		
		
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
						case 'model-look-juvenil':
							$head = RECORDATORIO_EMAIL_MODELSLOOK_BG;
							$head.= RECORDATORIO_EMAIL_MODELSLOOK_HEAD;							
							break;	
					}	
					//echo $curso."<br>";
					//$message.="<h4 style='text-align: center'> ".$curso."Prueba Funcionamiento de envio de correo, <br>botones con URL local no deberian funcionar por los momentos</h4>";
				$message.= $head;
				$message.= RECORDATORIO_EMAIL__RESP_BODY;
				$message.= "<h2 style='text-align: center;'>Confirmación de inscripción </h2>";
				$message.='
					
						<div class="col-sm-10 col-lg-10 col-sm-offset-1" >
						<br><h3 style="text-align: center;"> '.$nombre.' '.$apellido.', confirmaste que realizaste tu inscripción por la agencia<br> <small></h3>
					</div>
					<br>					
				
					<div class="clearfix"></div>';
			
				
				
			$vars['status'] = 'agency';
			$vars['rememberMail'] = '2';
			//Change status
			$approve = $this->helper->update('courses_registrations', $id, $vars);
		
			echo utf8_decode($message);
			//$this->email->sendMail($email, Confirmacion Inscripcion , utf8_decode($message));
			}else{
				header('Location: ../../recordatorio/error/');
				
				
				
			}
		
}


		
		public function despedida($id) {
			$titulo =utf8_decode("Despedida");	
			$this->view->title = SITE_NAME. " | $titulo";
			
			$registrationvista = $this->model->getRegistration($id);
			$usuario = $this->model->getRegistrant($registrationvista[0]['student_id']);
			
				$cursoview = $this->model->getCourseAvailable($registrationvista[0]['course_available_group_id']);
				$cursov= $this->model->getCourse($cursoview[0]['parent_id']);
				$curso= $cursov[0]['slug'];
			
				$nombre = $usuario[0]['name'];
				$apellido= $usuario[0]['lastname'];
				$estado= $registrationvista[0]['status'];
		
		
				$email=$registrationvista[0]['email'];
				$fecharegistro=$registrationvista[0]['date'];
				$horario=$registrationvista[0]['schedule'];
				$desc=$registrationvista[0]['fecha'];
				$id=$registrationvista[0]['id'];
				
				/*$registrationvista = $this->model->getRegistration($id);
				
				$nombre = $registrationvista[0]['name'];
				$apellido= $registrationvista[0]['lastname'];
				$estado= $registrationvista[0]['status'];
				$curso= $registrationvista[0]['slug'];
				$email=$registrationvista[0]['email'];
				$fecharegistro=$registrationvista[0]['date'];
				$horario=$registrationvista[0]['schedule'];
				$desc=$registrationvista[0]['fecha'];
				$id=$registrationvista[0]['id'];*/
				
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
						case 'model-look-juvenil':
							$head = RECORDATORIO_EMAIL_MODELSLOOK_BG;
							$head.= RECORDATORIO_EMAIL_MODELSLOOK_HEAD;							
							break;	
					}	
					//echo $curso."<br>";
					//$message.="<h4 style='text-align: center'>Prueba Funcionamiento de envio de correo, <br>botones con URL local no deberian funcionar por los momentos</h4>";
				$message.= $head;
				
			//$vars['status'] = 'completed';
			//Change status
			//$approve = $this->helper->update('courses_registrations', $id, $vars);
		
			$message.= "<br><h3 style='text-align: center;'> Su inscripción ha sido cancelada<br> <small></h3>";
			echo utf8_decode($message);
			//$this->email->sendMail($email, Cancela Inscripcion , $message);
		}


		public function error() {
			$head .= REGISTRATION_EMAIL_DEFAULT_BG;
				$head.= REGISTRATION_EMAIL_DEFAULT_HEAD;	
				$message=$head;
				$message.= RECORDATORIO_EMAIL__RESP_BODY;
				$message.='<div class="col-sm-10 col-lg-10 col-sm-offset-1" >
				
							<br><h3 style="text-align: center;">';
				$message.="Un error ha ocurrido ejecutando este proceso";	
				$message.='</div>';	
					echo utf8_decode($message);
			
		}
		
		
		function escape_value($data) {

				if (ini_get('magic_quotes_gpc')) {
				
				$data = stripslashes($data);
				
				}
				
				$data = strip_tags($data, '<p><a><br>');
				
				//use this if local
				
				return mysql_real_escape_string($data);
				
				//use this for server
				
				//return mysql_escape_string($data); 
				
		}




	}
	

?>