<?php 

	class cronogramasController extends Controller 
	{
		
		public function __construct() {
			
			parent::__construct();
			Auth::handleLogin('cronogramas');
		
		}

		public function get($what) {
			
			switch ($what) {
					
				default: 
					$tablename = 'cde_cronograma';
					$fields = array('id','data','name', 'lastname',  'nombre_materia','creationdate', 'lastupdate','status','datacomments');
					$temptable = 'cronogramas';
					//$where = "WHERE courses_registrations.status!='completed' AND courses_registrations.status!='cancelled' AND courses_registrations.status!='archived'";
					
					break;
			}
			
			$data = $this->helper->getJSONtables($tablename, $fields, $where, $temptable);
					
			
		}


		public function showbutton ($which) {
			switch ($which) {
				case 'approve':
					$this->view->render('cde/cronogramas/confirm-approve-content');
					break;
				
				case 'reject':
					$this->view->render('cde/cronogramas/confirm-reject-content');
					break;
			}			
		}



		//Statuses
		public function approve($id) {

			$vars['status'] = 'approved';
			//Change status
			$approve = $this->helper->update('cde_cronograma', $id, $vars);
			//Send Notification & instructions
			if ($approve > 0) {

				//Get Profesor, notificar Cronograma aprobado y Publicado	
				$cronograma = $this->model->getCronograma($id);
				$materia = $this->model->getMateria($cronograma[0]['id_materia']);
				
				$this->loadModel('profesor');
				$profesor = $this->model->getProfesor($cronograma[0]['id_profesor']);
				
				//Email Instructions Step 2 	
				$head= CDE__EMAIL_HEAD;							
								
				$message = $head;
				$message.= "Hola, ".$profesor[0]['name']."<br><br> El Cronograma de <strong>".$materia[0]['nombre_materia']."</strong> ha sido aprobado y publicado.<br><br> ¡Gracias!";
				$message.= CDE__EMAIL_FOOTER;
				$this->email->sendMail($profesor[0]['email'], SYSTEM_EMAIL , CRONOGRAMA_EMAIL_SUBJECT, $message);	
				
				//$response["tag"] = "login";
				$response["success"] = 1;
				$response["error"] = 0;	
				$response["response"] = "Mensaje Respuesta";
			} else {
				$response["success"] = 0;
				$response["error"] = 1;	
			}
			echo json_encode($response);
			
		}

		public function print($id)
		{
		//	$registration = $this->model->getRegistration($id);			
			
			//if ( TRUE /*$registration[0]['status'] === 'approved' && $registration[0]['documentation'] === 'pending'*/) 
		/*
			{
				//All ready to print, build forms
				$this->view->registration = $registration[0];
				$this->view->details =  json_decode($this->view->registration['data'], TRUE);
				
				$this->loadModel('courses');
				$this->view->course_group = $this->model->getCourseGroup($registration[0]['course_available_group_id']);
				$this->view->course = $this->model->getCourse($this->view->course_group[0]['parent_id']);							
				
				$this->view->render('registration/documentation/'.$this->view->course[0]['slug']);
			}
			else 
			{
				//Registration Sheet is yet pending for Complete, so show Sheet
				$this->view->render('escuela/registration/step3');
			}*/
			echo "holaaa ".$id;
		}
	}
?>