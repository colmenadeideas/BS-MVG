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
					case 'profesor':
						$profile = 'cde_profesor';
						break;
					default:
						$profile = 'user_profile';
						break;
				}				
				
				$this->create_profile($id, $profile, $data);
				
				//$log = $this->helper->insert('users_action_log', array('controller'=>'user_profile', 'action' =>  'add', 'item' =>  $id, 'username'=> 3 /*$userdata[0]['id']*/));
						
					//if($data['role']=='profesor'){
						//$UserId=$this->model->getUserId($array_user['username']);
						//$UserId['id']=10;
						//$userdata = $this->user->getUserdata();
						
						//$id=2;
						$UserId=7;
							//$log = $this->helper->insert('users_action_log', array('controller'=>'user_profile', 'action' =>  'add', 'item' =>  $id, 'username'=> $UserId));
						
						//$log = $this->helper->insert('users_action_log', array('controller'=>'user_profile', 'action' =>  'add', 'item' =>  $id, 'username'=> $UserId));
						
						$arreglo=array('controller'=>'user_profile', 'action' =>  'add', 'item' =>  $id, 'username'=> $UserId);
						/*importante que el arreglo se haga fuera del insert*/
						
						$this->helper->insert('users_action_log', $arreglo);
						
						
					//	}		
								
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
			//if(isset($data['data'])){
				$array_profile['data'] = json_encode($data);			
				//Create and add Profile
			//}
			$insert_profile = $this->helper->insert($tablename, $array_profile);
			
		}
			
		
	}
?>