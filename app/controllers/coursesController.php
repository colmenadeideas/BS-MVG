<?php 
	
	class coursesController extends Controller {
		
		public function __construct() {
			
			parent::__construct();
			//Auth::handleLogin('escuela');	
		}
	
		public function index() {
			$this->available();
		}
		
		public function available ($buildpage='') {
				
			$this->view->title = SITE_NAME. " | Pensums Disponibles";
			$this->view->courses = $this->model->listAvailableCourses();
				
			if ($buildpage == 'nopage') {
				//Page
				$this->view->render('registration/available_courses');
				
			} else {
				//Page
				$this->view->buildpage('registration/available_courses');
			}
			
		}
		
		
		
		public function preregistration ($course_slug, $buildpage='' ) {
			
			$course = $this->model->getCourse($course_slug,'slug');
			
			$this->view->course = $course;
			//get available dates per Course
			$available_groups = $this->model->listAvailableGroups($course[0]['id'],'id', 'ASC');
			//Check for openings per Course
			
			foreach ($available_groups as $group) {
			// - 1 Check Date				
				$today = strtotime(date("Y/m/d"));			
				//Convert Start Date
				$datetime = DateTime::createFromFormat('d/m/y', $group['start_date']);
				$start_date = $datetime->format('Y/m/d');
				$expire_time = strtotime($start_date);
				
				$date_difference =  $expire_time - $today;
				
     			//echo floor($date_difference/(60*60*24))."<br>";
				
				$current_diference_in_days = floor($date_difference/(60*60*24));
				
				//Still on time for Registration
				define ("DAYS_BEFORE_REGISTRATION_CLOSURE", -20); //Inscribir incluso durante la 1era semana
				define ("DAYS_BEFORE_REGISTRATION_OPENING", /*71*/150);
				if ($current_diference_in_days > DAYS_BEFORE_REGISTRATION_CLOSURE && $current_diference_in_days < DAYS_BEFORE_REGISTRATION_OPENING) {
					
					// 2- Check Quota
					$max_quota = $group['max_quota'];
					$openings = $this->model->openingsLeftPerCourse($course[0]['id']);
					$openings = DB::count();
					//echo $openings;
					if ($openings < $max_quota) {
						$this->view->available_groups[] = $group;
					}
					
				}
				
			}
			//
			$this->view->title = SITE_NAME. " | Inscripcion". $course[0]['name'];
			
			if (empty($this->view->available_groups)) {
				//Show subscription page
				if ($buildpage == 'nopage') {
					$this->view->render('registration/unavailable');
				} else {
					$this->view->buildpage('registration/unavailable');
				}
				
			} else {
				
				if ($buildpage == 'nopage') {
					//Page
					$this->view->render('registration/preregister-sheet/'.$course[0]['slug']);
				} else {
					//Page
					$this->view->buildpage('registration/preregister-sheet/'.$course[0]['slug']);
				}
				
			}
			
			
		}

		
	
	}
?>