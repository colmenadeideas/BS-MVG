<?php 
	
	class usersController extends Controller {
		
		public function __construct() {
			
			parent::__construct();	
		}
		
		public function create($data){
				
			//User
			$array_user['username'] = $data['username'];
			$array_user['rif'] = escape_value($data['rif']);
			$array_user['role'] = escape_value($data['role']);
			$temp_key = uniqid(rand(), true);				
			$array_user['pass_hash'] = $this->user->create_hash($temp_key);
				
			//Add User
			$insert = $this->helper->insert('users', $array_user);
			
			if ($insert > 0) {
				
				$id =  DB::insertId();
				//Insert in profile table based on Role
				switch ($data['role']) {
					case 'estudiante':
						$profile = 'student_profile';
						break;
					default:
						$profile = 'user_profile';
						break;
				}				
				
				$this->create_profile($id, $profile, $data);
							
								
				//Email User Activation Notification								
				$message = SYSTEM_EMAIL__USER_ACTIVATION_MESSAGE_PART1;
				$message.= '<a href="'.URL.'account/authenticate/'.$temp_key.'/'.$array_user['username'].'" style="color: #ffffff; font-size:16px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; text-decoration: none; line-height:40px; width:100%; display:inline-block">Activar Usuario</a>';				
				$message .= SYSTEM_EMAIL__USER_ACTIVATION_MESSAGE_PART2;
				
				$bodyuser = $this->email->buildNiceEmail('settings', ACTIVATION_USER_SUBJECT, $message);					
				$this->email->sendMail($array_user['username'], SYSTEM_EMAIL, ACTIVATION_USER_SUBJECT , $bodyuser);
						
			}
		
			return DB::affectedRows();
					
		}
		
		public function create_profile($id, $tablename, $data) {
			
			$array_profile['id'] = $id;
			//User Profile
			$array_profile['username'] = escape_value($data['username']);
			$array_profile['name'] = escape_value($data['name']);
			$array_profile['lastname'] = escape_value($data['lastname']);
			$array_profile['email'] = escape_value($data['email']);
			//$array_profile['data'] = json_encode($data['data']);			
			//Create and add Profile
			$insert_profile = $this->helper->insert($tablename, $array_profile);
			
		}
		/**10122015***********************************************************************************************/
		
		function all() {
			Auth::handleLogin('users');
			$this->view->render('cde/users/all');
			
		}
		
		function get($what) {
			Auth::handleLogin('users');
			switch($what){
				case 'users':
					$tablename = 'user_profile'; // List only administrative Users ( won't show clientes) 
					$fields = array( 'name', 'username', 'id');
					$where = "WHERE status !='deleted'";
					$temptable ='';
					break;
				case 'actionlogs':
					$tablename = 'users_action_log';
					$fields = array( 'name_user', 'action','controller', 'date', 'item','id');					
					$temptable = 'actionlogs';
					$where = "";//"WHERE supplies_fields.status='active'";
					break;
			}
			$data = $this->helper->getJSONtables($tablename, $fields, $where, $temptable);
			echo $data;
		
		}
		
		function edit($what,$id) {
			Auth::handleLogin('users');
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
			Auth::handleLogin('users');
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
					$array_profile['vip'] = escape_value($_POST['vip']);						
					//User
					$array_user['status'] = escape_value($_POST['status']);
					$array_user['username'] = $user_email;
					
					$array_user['role'] = escape_value($_POST['role']);
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
						$log = $this->helper->insert('users_action_log', array('controller'=>'user_profile', 'action' =>  'add', 'item' =>  $id, 'username'=> $userdata[0]['id']));
						
						if($array_user['status'] !== "sleep"){
						//Email User Activation
						
							//Email User Activation Notification
							$message = SYSTEM_SIMPLE_EMAIL_HEAD;								
							$message .= SYSTEM_EMAIL__USER_ACTIVATION_MESSAGE_PART1;
							$message .= 'Su usuario es: '. $array_user['username'] .'<br><br>';
							$message .= SYSTEM_EMAIL__USER_ACTIVATION_MESSAGE_PART2;
							$message .= '<a href="'.URL.'account/authenticate/'.$temp_key.'/'.$array_user['username'].'" style="color: #ffffff; font-size:16px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; text-decoration: none; line-height:40px; width:100%; display:inline-block">Activar Usuario</a>';				
							$message .= SYSTEM_EMAIL__USER_ACTIVATION_MESSAGE_PART3;
							$message .= SYSTEM_SIMPLE_EMAIL_FOOTER;
							
							$this->email->sendMail($array_user['username'], SYSTEM_EMAIL, ACTIVATION_USER_SUBJECT , $message);						
							
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