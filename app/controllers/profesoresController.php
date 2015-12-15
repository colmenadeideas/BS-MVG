<?php 
	
	class profesoresController extends Controller {
		
		public function __construct() {
			
			parent::__construct();	
		}
		
		
			public function process($what = 'user') {
				
			$array_data = array();	
			foreach ($_POST as $key => $value) {
				$field = escape_value($key);
				$field_data = escape_value($value);
				
				$array_data[$field] = $field_data;
			}
			unset($array_data['submit']);
			
			switch ($what) {
				
				/*****  PROCESS REGISTRO  *****/
				case 'user':
					// 1 -Creates User&Profile and Sends Authentication Link
					$array_student['username'] 	= $array_data['email'];
					//$array_student['rif'] 		= $array_data['nationality'].$array_data['cedula'];
					$array_student['role'] 		= 'profesor';
					$array_student['name'] 		= $array_data['name'];
					$array_student['lastname'] 	= $array_data['lastname'];
					$array_student['email'] 	= $array_data['email'];
					//$array_student['PromoIns']	= $array_data['PromoIns'];
					$array_student['data'] 		= $array_data[$field];
					//Registration Data
										
					//Check if already exist in User database
					
					$already_registered =	$this->model->getRegistrant($array_data['email'], 'username');
					$already_registered_result = DB::count();
					
					if (empty($already_registered)) {
							
						//Register User				
						require_once('usersController.php');	
						$users = new usersController;	
						$create_user = $users->create($array_student);	
						
						//echo $create_user;
						  
					}
					break;
					
					
					}
		
			}
		
		
		
		
				
		function all() {
			//Auth::handleLogin('users');
			$this->view->render('cde/users/all');
			
		}
		
		function get($what) {
			//Auth::handleLogin('users');
			switch($what){
				case 'users':
					$tablename = 'cde_profesor'; // List only administrative Users ( won't show clientes) 
					$fields = array( 'name', 'username', 'id');
					//$where = "WHERE status !='2'";
					//$temptable ='';
					break;
				case 'actionlogs':
					$tablename = 'users_action_log';
					$fields = array( 'username', 'action','controller', 'timestamp', 'item','id');					
					$temptable = 'actionlogs';
					$where = "";//"WHERE supplies_fields.status='active'";
					break;
			}
			$data = $this->helper->getJSONtables($tablename, $fields, $where, $temptable);
			echo $data;
		
		}
		
		function edit($what,$id) {
			//Auth::handleLogin('users');
			$userdata = $this->user->getUserdata();
			switch($what){
				case 'user':
					$this->view->item = $this->model->getUser($id, 'id');					
					$this->view->item_profile = $this->model->getUserProfile($id,'id');
					//page
					$this->view->render('miweb/users/detail');
					break;
			}
		}
		
		function delete($what, $id) {
			Auth::handleLogin('users');
			$userdata = $this->user->getUserdata();
			
			switch ($what) {
				case 'user':
					$tablename = 'users';
					$controller = 'users';
					
					//evitar eliminar el Usuario actual
					if ($id !== $userdata[0]['username']) {
						//$vars['status'] = 'deleted';
						//$var_profile['status'] = 'deleted';
						//$vars['pass_hash'] = '';//emptyhash so no login can happen again
						//$data = $this->helper->update($tablename, $id, $vars, 'username');	
						$data = $this->helper->delete($tablename, $id,'username');
						//delete profile too
						//$this->helper->update('user_profile', $id, $var_profile, 'username');	
						$data = $this->helper->delete('user_profile', $id, 'username');
					}
					break;
			}		
			
			if ($data > 0) {
				//::::Log Action::::					
				$log = $this->helper->insert('users_action_log', array('controller'=>$controller, 'action' =>  'delete', 'item' =>  $id, 'username'=> $userdata[0]['id']));
			
			} else {
				echo "error";
			}

		}
		
		function add($what) {
			//Auth::handleLogin('users');
			$userdata = $this->user->getUserdata();
			$fields = '';
			$values = '';
			$array_datos = array();
			$array_profile = array();
			
			switch ($what) {
				case 'user':
					$user_email = escape_value($_POST['email']);
					//User Profile
					$array_profile['username'] = $user_email;
					$array_profile['name'] = escape_value($_POST['name']);
					$array_profile['email'] = $user_email;
					$array_profile['phone'] = escape_value($_POST['phone']);
					$array_profile['rif'] = escape_value($_POST['rif']);	
					//$array_profile['vip'] = escape_value($_POST['vip']);						
					//User
					//$array_user['status'] = escape_value($_POST['status']);
					$array_user['status'] = "1";
					$array_user['username'] = $user_email;
					
					//$array_user['role'] = escape_value($_POST['role']);
					$array_user['role'] = "Profesor";
					$temp_key = uniqid(rand(), true);				
					$array_user['pass_hash'] = $this->user->create_hash($temp_key);
					
					//Add User
					$insert = $this->helper->insert('users', $array_user);
					
					if ($insert > 0) {
						$id =  DB::insertId();
						$array_profile['id'] = $id;
						//Create and add Profile
						$insert_profile = $this->helper->insert('user_profile', $array_profile);
						//Create Role Permissions for User
						/*If Permissions where setted by admin user, they would be created here */
						
						//::::Log Action::::					
						//$log = $this->helper->insert('users_action_log', array('controller'=>'user_profile', 'action' =>  'add', 'item' =>  $id, 'username'=> $userdata[0]['id']));
						
						$log = $this->helper->insert('users_action_log', array('controller'=>'user_profile', 'action' =>  'add', 'item' =>  '5', 'username'=> 9));
						
						
						if($array_user['status'] !== "2"){
						//Email User Activation
						
							//Email User Activation Notification
							$message = SYSTEM_SIMPLE_EMAIL_HEAD;								
							$message .= SYSTEM_EMAIL__USER_ACTIVATION_MESSAGE_PART1;
							$message .= 'Su usuario es: '. $array_user['username'] .'<br><br>';
							$message .= SYSTEM_EMAIL__USER_ACTIVATION_MESSAGE_PART2;
							$message .= '<a href="'.URL.'account/authenticate/'.$temp_key.'/'.$array_user['username'].'" style="color: #ffffff; font-size:16px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; text-decoration: none; line-height:40px; width:100%; display:inline-block">Activar Usuario</a>';				
							$message .= SYSTEM_EMAIL__USER_ACTIVATION_MESSAGE_PART3;
							$message .= SYSTEM_SIMPLE_EMAIL_FOOTER;
							
							alert('correo de activacion enviado');
							
							//$this->email->sendMail($array_user['username'], SYSTEM_EMAIL, ACTIVATION_USER_SUBJECT , $message);						
							
						}
					
					
					}
					
				/*	print_r($array_user);
					print_r($array_profile);			
				*/	
					break;
					//end add user
				
			}			
		}
		
				function editinline() {
			
			$pk = escape_value($_POST['pk']);
			$value = escape_value($_POST['value']);
			
			$parts = explode( '-', $pk );
			$tablename = $parts[0];
			$fieldname = $parts[1];
			$id = $parts[2];
			//if not by ID, something else
			@$by = $parts[3];	
						
			$arrayModificacion = array();
			
			$arrayModificacion[$fieldname] = $value;
			
			/*if($tablename == 'user_profile') {
					
				$userdata = $this->user->getUserdata();	
				//$arrayModificacion['edited_by'] = $userdata[0]['id'];
				$arrayModificacion['id'] = $id;
				$insert = $this->helper->insert($tablename, $arrayModificacion);	
				
			} else {*/
					
				if (!empty($by)) {
					$insert = $this->helper->update($tablename, $id, $arrayModificacion, $by);
				} else {
					$insert = $this->helper->update($tablename, $id, $arrayModificacion);			
				}
			
			//}
									
			
			
			//::::Log Action::::
			$userdata = $this->user->getUserdata();					
			$log = $this->helper->insert('users_action_log', array('controller'=>$tablename, 'action' =>  'edit', 'item' =>  $id, 'username'=> $userdata[0]['id']));		
			
			print_r($insert);
			
			
		}
		
		
		
		
	}
?>