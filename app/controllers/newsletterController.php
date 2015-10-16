<?php 
	
	class newsletterController extends Controller {
		
		public function __construct() {
			
			parent::__construct();
			//Auth::handleLogin('escuela');	
		}
		
		public function register() {
			
			$array_data['email'] = escape_value($_POST['email']);
			$array_data['interests'] = escape_value($_POST['interests']);
			//Check if already registered
			$already_registered = $this->model->getRegistrant($array_data['email']);
			if (empty($already_registered)) {
				//Register
				return $this->helper->insert('newsletter_subscriptions', $array_data);
			
			} else {
				//Update 'interests'
				$interests = $already_registered[0]['interests'];
				//TODO revisar
				if (@!in_array($array_data['interests'], $interests)) {
					$interests.= ','.$array_data['interests'].'';
				}
				$vars['interests'] = $interests;
				$this->helper->update('newsletter_subscriptions', $already_registered[0]['id'], $vars);
				
				echo "Actualizado";				
			}
			
			
		}
		public function notifyme () {
			
			$register = $this->register();
			
			if ($register > 0) {					
				//Email Confirmation
				$email = escape_value($_POST['email']);		
				$message = NEWSLETTER__NOTIFY_MESSAGE_PART1;
				$message.= "<h3>".escape_value($_POST['interests'])."</h3>";
				$message.= NEWSLETTER__NOTIFY_MESSAGE_PART2;
				$bodyuser = $this->email->buildNiceEmail('newsletter', NEWSLETTER__NOTIFY_SUBJECT, $message);
				$this->email->sendMail($email, SYSTEM_EMAIL , NEWSLETTER__NOTIFY_SUBJECT, $bodyuser);
			} else {
				echo $register;
			}
			
			
		}
		
		public function cleanlist() {
			$email_list = $this->model->getMailList();
			
			foreach ($email_list as $mailchimp) {
			//	$this->isDomain($mailchimp['email_address']);
				/*if($this->isDomain($mailchimp['email_address'])) {
					$vars['status'] = '1';
					$this->helper->update('mailchimp_emails', $mailchimp['id'], $vars);
				} else {
					
					$vars['status'] = '2';
					$this->helper->update('mailchimp_emails', $mailchimp['id'], $vars);
				}*/
				//echo $mailchimp['email_address'] ."<br>";
				
				if(!$this->checkEmail($mailchimp['email_address'])) {  
					echo "Invalid email address!<br>";
				}
				else {
				 	echo "Email address is valid<br>";
				}
			}
			
			
		}

		public function isDomain($email) {
		    // split email address into username and domain.
		    //list($userName, $mailDomain) = split("@", $email);
		    //$mailDomain = split("@", $email);
		    $mailDomain = explode("@", $email);
		    if (!checkdnsrr($mailDomain, "MX")) {
		      //  return $mailDomain[1];
		      echo "0";
		    } else {
				echo "1";
			}
		    //return false;
//		    echo $mailDomain[1]. "<br>";
		}
		
		
		function checkEmail($email) {
		 // checks proper syntax
		if(preg_match("/^( [a-zA-Z0-9] )+( [a-zA-Z0-9._-] )*@( [a-zA-Z0-9_-] )+( [a-zA-Z0-9._-] +)+$/" , $email)) {
			// gets domain name
			//list($username,$domain)=split("@",$email);
			$domain = explode("@", $email);
			// checks for if MX records in the DNS
			if(!checkdnsrr($domain[1], "MX")) {
				return false;
			}
			// attempts a socket connection to mail server
			if(!fsockopen($domain,25,$errno,$errstr,30)) {
				return false;
			}
			return true;
		}
			return false;
		}
		


	}

?>