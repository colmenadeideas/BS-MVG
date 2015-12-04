<?php 
	
	class referalsController extends Controller {
		
		public function __construct() {
						
			parent::__construct();
			
		}
		
		
		public function codeGenerator() {
			$string = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
			$code = "";
			for ($i = 0; $i < 8; $i++) {
				$code .= substr($string, rand(0, 62), 1);
			}
			return $code;
		}
		
		public function inviteme($data) {
			
			$array_referal['referent_email'] = $data['email'];
			$array_referal['referred_email'] = $data['referal'];
			//days_valid
			$array_referal['courses_valid'] = json_encode($data['course_available_group_id']);
			$array_referal['code'] = $this->codeGenerator();
			
			$array_referal['data']['registration_id'] = $data['registration_id'];
			$array_referal['data']['course_available_group_id'] = $data['course_available_group_id'];
			$array_referal['data']['disccountvalue'] = '15';
			$array_referal['data']['code'] = $this->codeGenerator();
			
			
			$array_referal['data'] = json_encode($array_referal['data']);
			
			$this->loadModel('referals');
			
			$course = $this->model->getAvailableCourse($data['course_available_group_id']);
			$course = $this->model->getCourse($course[0]['parent_id']);
			
			$insert = $this->helper->insert('courses_referals', $array_referal);
			$referalid = DB::insertId();
			
			// Send Email with Referal Invite				
				$message = DISCOUNT_EMAIL_HEAD;
				$message.="<h3><center>".$data['name']." quiere invitarte a que te inscribas en</center></h3>
				<h1><center>".$course[0]['name']."</center></h1>
				<center>¡Inscribete y celebren su amistad juntas!<br><br></center>";
				//$message.= DISCOUNT_EMAIL__MESSAGE_PART1;
				$message.="<center>Ven y conoce todos los detalles</center><br>";
				$message.= '<table cellspacing="0" align="center" cellpadding="0"> <tr> 
					<td align="center" width="130" height="40" bgcolor="'.SYSTEM_EMAIL_BUTTONSCOLOR.'" style="-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; color: #ffffff; display: block;">
					<a href="'.URL .'courses/preregistration/'.$course[0]['slug'].'/?referred='.$array_referal['referred_email']."&code=".$array_referal['code']."&referalid=".$referalid.'" style="color: #ffffff; font-size:16px; font-weight: bold; 
					font-family: Helvetica, Arial, sans-serif; text-decoration: none; line-height:40px; width:100%; display:inline-block">¡Inscribirme!</a>
					</td></tr></table>';
				$message.= SYSTEM_SIMPLE_EMAIL_FOOTER;
				
				//Email Discount Activation for user
				$this->email->sendMail($array_referal['referred_email'], SYSTEM_EMAIL , strtoupper($course_data[0]['name']). $data['name']." quiere Celebrar tu Amistad! ",$message);	
				$this->email->ClearAddresses();
						
		}
		
		public function activate($id,$referred,$code) {
			
			$this->loadModel('referals');			
			$referal = $this->model->getReferal($id,$referred,$code);	
			
			
			if ($referal > 0) {
				//crear descuento 
				//y enviar correo de descuento
				$referal[0]['data'] = json_decode($referal[0]['data'], TRUE);
				
				
				$registro = $this->model->getRegistration($referal[0]['data']['registration_id']);
				
							
				$message =	SYSTEM_SIMPLE_EMAIL_HEAD;
				$message.='<h2><center>¡Felicidades! <br> tienes un <span style="color:blue">'.$registro[0]['disccountvalue'].'%</span> de descuento</center></h2>';
				$message.= DISCOUNT_EMAIL__MESSAGE_PART1;
				$message.='<center><h1>CODIGO: <span style="color:blue">'.$registro[0]['code'].'</span> </h1> </center><br>';
				$message.= DISCOUNT_EMAIL__MESSAGE_PART2;
				$message.= SYSTEM_SIMPLE_EMAIL_FOOTER;
				
				
				
				//Email Discount Activation for user
				$this->email->sendMail($referal[0]['referent_email'], SYSTEM_EMAIL , strtoupper($course_data[0]['name']). DISCOUNT_EMAIL__SUBJECT,$message);	
				//$this->email->ClearAddresses();
				
				$vars['disccount'] = 1; //flag for receiving this email				
				$vars['disccountvalue'] = $referal[0]['data']['disccountvalue'];
				$vars['code'] = $referal[0]['data']['code'];
				$vars['id'] =	$referal[0]['data']['registration_id']; 
				
								
				$insert = $this->helper->update('courses_registrations', $referal[0]['data']['registration_id'], $vars, 'id');
				
			} else {
				//TODO Notification
				//No match, no discount!				
			}
			
		}

		
		
	}

?>
	