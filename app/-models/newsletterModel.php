<?php

	class newsletterModel extends Model {
	
		public function __construct() {
	
			parent::__construct();
		}
		
		public function getRegistrant($data) {	
			return DB::query("SELECT * FROM " . DB_PREFIX . "newsletter_subscriptions WHERE email=%s LIMIT 1", $data);
		}
		
		public function getMailList() {	
			return DB::query("SELECT * FROM " . DB_PREFIX . "mailchimp_emails");
		}
		
		
				
				
	}
		
?>