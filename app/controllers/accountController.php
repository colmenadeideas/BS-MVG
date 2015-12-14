<?php 
	
	class accountController extends Controller {
		
		public function __construct() {
			
			parent::__construct();	
		}
	
		public function index() {
			$this->signin();			
		}
		
		
		public function authenticate($temp_password, $username) {
			
			$username = escape_value($username);
			$password = escape_value($temp_password);			
			
			$validUser = $this->user->validateUsername($username);
			
			if(empty($validUser)){						
				//echo "user";
				echo ERROR_AUTHENTICATE;
				exit;
								
			} else {
				$validPass = $this->user->validatePassword($username, $password);
				
				if(empty($validPass)){
					//echo "pass";	
					echo ERROR_AUTHENTICATE;
					exit;				
				} else {
					$role = escape_value($validUser[0]['role']);
					$username = escape_value($validUser[0]['username']);
					$this->user->init();
			        $this->user->set('role', $role);
					$this->user->set('loggedIn', true);
			        $this->user->set('username', $username);
			           
					//echo 'welcome';
					$this->firstlogin($password);					
					exit;
				}
			}
			
			
		} 
		
		public function signin() {
			
			$already_loggedin = User::get('role');
			
			if (empty($already_loggedin)) {
				
				$this->view->title = SITE_NAME. " | Entrar";						
				$this->view->render('login/index');
				
			} else {
				//Redirect		
				$this->identify();
			}
		}
		
		
		public function login() {
			header('Access-Control-Allow-Origin: http://www.mi.modelsviewgroup.com');	
			$array_datos = array();	
			foreach ($_POST as $key => $value) {
				$campo = escape_value($key);
				$valor = escape_value($value);
				
				$data = "\$" . $campo . "='" . escape_value($valor) . "';";						
				eval($data);
			}
			$username = $email;
			$validUser = $this->user->validateUsername($username);
			
			if(empty($validUser)){
				echo "error";
			} else {
				$validPass = $this->user->validatePassword($username, $password);
				if(empty($validPass)){
					echo "error";
				} else {
						$role = escape_value($validUser[0]['role']);
						$username = escape_value($validUser[0]['username']);
						$this->user->init();
				        $this->user->set('role', $role);
						$this->user->set('loggedIn', true);
				        $this->user->set('username', $username);				           
						echo 'welcome';					
						exit;
					}
			}
				
		}
		
		public function logout() {			
			
			$this->user->destroy();
			header('location: '. URL .'account');		
			//$this->signin();
		} 
		
		public function identify () {
				
			User::checkSession();
			//Auth::handleLogin('account');
			User::gotoMainArea();			
			
		}
		
		//Settings
		public function firstlogin($old_password= '') {
				
			$this->edit('password', $old_password);
			
		}
		// Edit Password and Profile
		public function edit ($what, $old_password = ''){
			
			$this->view->userdata = $this->user->getUserdata();
				
			Auth::handleLogin('account');
			
			$this->view->page = "";

			switch ($what) {
				case 'password':
					
					$this->view->title = "Configuración | Clave";
					$this->view->old_password =		$old_password;									
					$this->view->buildpage('settings/password-change','settings');
					
					break;				
				
			}
		}

		public function update($what) {
			//TODO Auth this method  YES or NO? Make it private
								
			$username 	= $this->user->get('username');
			$role 		= $this->user->get('role');
			
			$userdata 	= $this->user->getUserdata($role, $username);
			
			
			if (empty($userdata)) {
				exit;
			} else {
				
				$email 		= $userdata[0]['email'];
								
				$fields = '';
				$values = '';
				$array_datos = array();	
				$array_datos['username'] = $username;
				
				foreach ($_POST as $key => $value) {
							
					if ($value === '') { // skips empty fields
									
					} else {
								
						$campo = escape_value($key);
						$valor = escape_value($value);
						
						switch ($key) {
											
							case 'submit': //omitir campo
								break;
								
							case 'password_confirm': //omitir campo
								break;
	
							default:
							
							//Convert to $variables every filled field		
						
							$data = "\$" . $campo . "='" . $valor . "';";						
							eval($data);
					
							$array_datos[$campo] = $valor;
						
						}
								
					}
									
				}
					switch ($what) {
						
					case 'password':
						
						//Validate Data
						$validPass = $this->user->validatePassword($username, $password_old);
						
						if(empty($validPass)){
								
							echo SYSTEM_INVALID_PASSWORD;					
						
						} else {
								
							//Previous Password Approved, move on						
							$array_datos['pass_hash'] = $this->user->create_hash($password);
							
							//remove extra $_POST;
							unset($array_datos['password_old'], $array_datos['password']);
							 
							//Update Data
							$this->helper->update('users', $username, $array_datos, 'username', 1);
							$updated_data = DB::affectedRows();
							
							if($updated_data !== 0)  {
								
								//Notificacion 
								$message = SYSTEM_EMAIL__PASSWORD_CHANGE;
				
								$bodyuser = $this->email->buildNiceEmail('settings', SYSTEM_PASSWORD_CHANGE, $message);
										
								//Notificar registro
								$this->email->sendMail($email, SYSTEM_EMAIL , SYSTEM_PASSWORD_CHANGE, $bodyuser);
								
								// Insertar registro de Session
								User::logSession($username);						
								
								//Redirect	
								$this->view->redirect_link = URL .'account/identify';
								$this->view->response = SYSTEM_PASSWORD_CHANGE;
								$this->view->render('redirect');						
								
							} 
							
												
							
						}				
						
						
						break;
					
					default:
						echo "def";
						break;
				}
				
			}				
					
			
		
		}

		function recover($what='password'){
			
			$username = escape_value($_POST['recover-password']);
			//Check for username in Database
			$already_registered =	$this->model->getAccount($username, 'username');
			
			if (empty($already_registered)) {
				echo SYSTEM_USERNAME_NOT_EXISTS;
			} else {
				$temp_key = uniqid(rand(), true);	
				$array_user['pass_hash'] = $this->user->create_hash($temp_key);
				$insert = $this->helper->update('users', $already_registered[0]["id"], $array_user);
				//Send Passwrod change email
				$message =  SETTINGS_EMAIL_HEAD;								
				$message .= PASSWORD_RECOVERY_MESSAGE_PART1;
				$message .= PASSWORD_RECOVERY_MESSAGE_PART2;
				$message .= '<a href="'.URL.'account/authenticate/'.$temp_key.'/'.$username.'" style="color: #ffffff; font-size:16px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; text-decoration: none; line-height:40px; width:100%; display:inline-block">Cambiar Password</a>';				
				$message .= PASSWORD_RECOVERY_MESSAGE_PART3;
				$message .= SETTINGS_EMAIL_FOOTER;
					
				$this->email->sendMail($username, SYSTEM_EMAIL, PASSWORD_RECOVERY_SUBJECT , $message);
				
				echo PASSWORD_RECOVERY_SUCCESS_RESPONSE;
			}
			
				
		}

		
		
		
	}
	
?>