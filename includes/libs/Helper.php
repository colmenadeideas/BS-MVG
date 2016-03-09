<?php
	
	require_once ( LIBS . 'upload/class.upload.php');
//	require_once ( LIBS . 'fileuploader/class.fileuploader.php');
//	require_once ( LIBS . 'twitteroauth/twitteroauth.php'); //Path to twitteroauth library
//	require_once ( LIBS . 'twitteroauth/OAuth.php');
	require_once ( LIBS . 'MercadoPago.php');
	
	class Helper {
	
		function __construct() {
			
		
		}
				 		
		static function loadJS($filename, $isprivate = 0) {
			if($isprivate === 1) {
				
				return '<script type="text/javascript" src="' . ADMINJS . $filename . '.js"></script>
';			
			} else {
			
				return '<script type="text/javascript" src="' . JS . $filename . '.js"></script>
';
			}
			
	    }
		
		static function loadCSS($filename, $isprivate = 0) {

			if($isprivate === 1) {
				
				return '<link rel="stylesheet" href="' . ADMINCSS . $filename . '.css" />';				

			} else {
				
				return '<link rel="stylesheet" href="' . CSS . $filename . '.css" />';
			}
			
		}
		
		static function getIpAddress($ip = USER_IP) {
			
			if ($ip === '') {
				
				if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
					$ip = $_SERVER['HTTP_CLIENT_IP'];
				} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
					$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
				} else {
					$ip = $_SERVER['REMOTE_ADDR'];
				}
				
			}
			return $ip;
		}
			
		 
		//Database	
		static function insert($tablename, $vars){
			
			$tablename = escape_value($tablename);
			
			$query = DB::insert( DB_PREFIX . $tablename, $vars);
			return DB::affectedRows();
		}
		
		static function update($tablename, $id, $vars, $by ='id'){
				
			$tablename = escape_value($tablename);
			$id = escape_value($id);
			$by = escape_value($by);
			
			$query = DB::update( DB_PREFIX . $tablename, $vars, $by."=%s", $id);		
			return DB::affectedRows();
			
				//return DB::update(DB_PREFIX . $tablename, $vars, "id=%s", $id);
	  			
		}
		static function delete($tablename, $id, $by ='id'){
				
			$tablename = escape_value($tablename);
			$id = escape_value($id);
			$by = escape_value($by);			
							
			$query =  DB::delete( DB_PREFIX . $tablename, $by."=%s", $id);	
			return DB::affectedRows();
		}
		
		static function openPDF($fileurl) {
			
			//header('Content-Type: application/force-download'); 
			//header('Content-Description: File Transfer'); 
			
			header('Content-type: application/pdf');
			header('Content-Disposition: inline; filename="' . $fileurl . '"');
			header('Content-Transfer-Encoding: binary');
			header('Content-Length: ' . filesize($fileurl));
			header('Accept-Ranges: bytes');
			
			readfile($fileurl);
		}
		
		 
		 
		static function uploadFile($file) {
			
			//print_r($file);
			$folder = CLIENTS_FOLDER;
			$handle = new Upload($_FILES['files']);
			//echo 
			$username = User::get('username');
			$username = create_slug($username); //sanitizar nombre de caracteres, acentos
			
			
			if ($handle->uploaded) {
				//upload original file no changes
				$file_new_name = "PL-".date("Ymd")."-".$username;
				$handle->file_new_name_body = $file_new_name;
				$handle->Process($folder);
				
				//check if went ok
				if($handle->processed){
					/* 
					 * Ejecutar el exec a partir del archivo en el servidor para ¿dulpicar? y cambiar el colorspace IF 'CMYK'
					 * luego escalar y generar thumb
					 * 	
					//	exec("/usr/bin/convert ".$file_new_name."  files/preview/".$file_new_name."");
					 * 
					//	Helper::thumbnailPreview($handle, CLIENTS_FOLDER .'/preview/');
					 * */
						echo '{"status":"success"}';
											
					} else {
						echo '{"status":"error"}';
						//echo '  Error: ' . $handle->error . '';
					}
				
				$handle->Clean();
				
			} else {
				echo '{"statuss":"error"}'; //echo '  Error: ' . $handle->error . '';
			}
						
		}
		
		
		static function thumbnailPreview($file, $ruta = 'public/images/temp') {
			
				
			$handle2 = $file;
				
			//resizing
			$handle2->image_convert         = 'jpg';
			//$handle2->file_name_body_add   = '_thumb';
			$handle2->image_resize         = true;
			$handle2->image_x              = 400;
			$handle2->image_ratio_y        = true;
			
			$handle2->Process($ruta);		
			/*
			if ($handle->processed) {
										
			} else {
				
				echo '  Error: ' . $handle->error . '';
			}*/		
			
			$handle2->Clean();
			
		
		}
		
		
		static function uploadFileCSV($file) {
			
			//print_r($file);
			$folder = ADMIN_FOLDER;
			$handle = new Upload($_FILES['files']);
			
			$handle->file_new_name_body   = 'datas';
			$handle->file_overwrite = true;
			$handle->allowed = array('csv','application/vnd.ms-excel');
			 
			if ($handle->uploaded) {
				$handle->Process($folder);
				//check if went ok
				if($handle->processed){
					
					echo '{"status":"success"}';
					// 
				} else {
					//echo '{"status":"error"}';
					echo '  Error: ' . $handle->error . '';
				}
				
				$handle->Clean();
				
			} else {
				echo '{"statuss":"error"}'; //echo '  Error: ' . $handle->error . '';
			}
						
		}
		
		
		
 		/* Twitter */
		static function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
 		 		
 		 	$connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  			return $connection;
		
		}
		
		static function loadTweets() {
				
			//Variables
			$twitteruser = "edil_FABRICA";
			$notweets = 30;
			$consumerkey = "eBa3pwc27Ga1cMAKulNg";
			$consumersecret = "miIAq1UygMGINHo3ZRWkAXIHcbfrOcFcEcYHPZqZ7EI";
			$accesstoken = "136305776-gFtXbayO8AiZC9LEoRwd5PiQMI1LVHBZmzYNCQpm";
			$accesstokensecret = "pzX0zfsS7tCS5g3wc25EfHciE7HW2Nj3Y10gi58Cz0rAO";
			
			$connection = Helper::getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
 
			$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);
 
			echo json_encode($tweets);
				
		}
		
		
		/*Datatables*/
		static function getJSONtables($tablename, $vars, $where ='', $temptable=""){

			$tablename = escape_value($tablename);
			
			$aColumns = $vars;
			
			/* Array of database columns which should be read and sent back to DataTables. Use a space where
			 * you want to insert a non-database field (for example a counter or static image)
			 */
			
			
			
			/* Indexed column (used for fast and accurate table cardinality) */
			$sIndexColumn = "id";
			
			/* DB table to use */
			$sTable = $tablename;
			
			/* Database connection information */
			$gaSql['user']       = DB_USER;
			$gaSql['password']   = DB_PASSWORD;
			$gaSql['db']         = DB_NAME;
			$gaSql['server']     = DB_HOST;
			
			
			/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
			 * If you just want to use the basic configuration for DataTables with PHP server-side, there is
			 * no need to edit below this line
			 */
			
			/* 
			 * MySQL connection
			 */
			$gaSql['link'] =  mysql_pconnect( $gaSql['server'], $gaSql['user'], $gaSql['password']  ) or
				die( 'Could not open connection to server' );
			mysql_set_charset('utf8');
			mysql_select_db( $gaSql['db'], $gaSql['link'] ) or 
				die( 'Could not select database '. $gaSql['db'] );
			
			/*
			 * BESIGN
			 * If need Inner Join, create a different conecction and use this TEMPORARY TABLE switch
			*/
			switch ($temptable) {
				case 'registrations':
					
					$hora=date("his");
					$tablename = $temptable."_".$hora;
					
					$sql="CREATE TEMPORARY TABLE IF NOT EXISTS ".$tablename. " 
					SELECT  courses_registrations.id AS 'id', 
							courses_registrations.date AS 'date',
							courses_registrations.status AS 'status',
							courses.name AS 'course',
							courses_available_groups.name AS 'group_name',
							
							student_profile.name AS 'student_name',
							student_profile.lastname AS 'student_lastname',
							student_profile.status AS 'current'
							
					FROM ((student_profile JOIN courses_registrations ON ((student_profile.id = courses_registrations.student_id))) 
					JOIN courses_available_groups ON ((courses_available_groups.id = courses_registrations.course_available_group_id))
					
					JOIN courses ON ((courses.id = courses_available_groups.parent_id))) ".
					$where ." 
					GROUP BY courses_registrations.id
					";
					
					
					mysql_query( $sql ) or die(mysql_error());
					
					$sTable =$tablename;					
					$where = ''; //clears '$where' so it won't use it in $sWhere, lines below
					
					break;

				case 'cronogramas':
					
					$hora=date("his");
					$tablename = $temptable."_".$hora;
					
			
					$sql="CREATE TEMPORARY TABLE IF NOT EXISTS ".$tablename. "
						SELECT c.`id`, c.`id_profesor`, c.`creationdate`, c.`lastupdate`,c.`status`, 
						   p.`name`, p.`lastname`, p.`data`, c.`id_materia`, m.`nombre_materia`, 
						   IFNULL(cc.`data`, 'undefined') datacomments, cc.creationdate updatecomments
						   		FROM (cde_cronograma c,cde_profesor p,cde_materia m) 
						   			LEFT JOIN cde_cronograma_comments cc
						   				ON c.`id` = cc.`id_cronograma` 
						   					WHERE c.`status`='pending'
						   							AND c.`id_materia` = m.`id` 
						   								AND c.`id_profesor` = p.`id` ".$where ."GROUP BY cc.`creationdate` DESC";

					
						
					mysql_query( $sql ) or die(mysql_error());
					
					$sTable =$tablename;					
					$where = ''; //clears '$where' so it won't use it in $sWhere, lines below
					
					break;
				
				default:
					
					break;
			}
			/*
			 * END BESIGN
			 * 
			 */
			
			/* 
			 * Paging
			 */
			$sLimit = "";
			if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
			{
				$sLimit = "LIMIT ".mysql_real_escape_string( $_GET['iDisplayStart'] ).", ".
					mysql_real_escape_string( $_GET['iDisplayLength'] );
			}
			
			
			/*
			 * Ordering
			 */
			if ( isset( $_GET['iSortCol_0'] ) )
			{
				$sOrder = "ORDER BY  ";
				for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
				{
					if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
					{
						$sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
						 	".mysql_real_escape_string( $_GET['sSortDir_'.$i] ) .", ";
					}
				}
				
				$sOrder = substr_replace( $sOrder, "", -2 );
				if ( $sOrder == "ORDER BY" )
				{
					$sOrder = "";
				}
			}
			
			
			/* 
			 * Filtering
			 * NOTE this does not match the built-in DataTables filtering which does it
			 * word by word on any field. It's possible to do here, but concerned about efficiency
			 * on very large tables, and MySQL's regex functionality is very limited
			 */
			if ( $where != '') {
				$sWhere = $where;
			} else {
				$sWhere = "";
			}
			
			if ( $_GET['sSearch'] != "" )
			{
				$sWhere = "WHERE (";
				for ( $i=0 ; $i<count($aColumns) ; $i++ )
				{
					$sWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string( $_GET['sSearch'] )."%' OR ";
				}
				$sWhere = substr_replace( $sWhere, "", -3 );
				$sWhere .= ')';
			}
			
			/* Individual column filtering */
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				if ( $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
				{
					if ( $sWhere == "" )
					{
						$sWhere = "WHERE ";
					}
					else
					{
						$sWhere .= " AND ";
					}
					$sWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string($_GET['sSearch_'.$i])."%' ";
				}
			}
			
			
			/*
			 * SQL queries
			 * Get data to display
			 */
			$sQuery = "
				SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
				FROM   $sTable
				$sWhere
				$sOrder
				$sLimit
			";
			$rResult = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
			
			/* Data set length after filtering */
			$sQuery = "
				SELECT FOUND_ROWS()
			";
			$rResultFilterTotal = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
			$aResultFilterTotal = mysql_fetch_array($rResultFilterTotal);
			$iFilteredTotal = $aResultFilterTotal[0];
			
			/* Total data set length */
			$sQuery = "
				SELECT COUNT(".$sIndexColumn.")
				FROM   $sTable
			";
			$rResultTotal = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
			$aResultTotal = mysql_fetch_array($rResultTotal);
			$iTotal = $aResultTotal[0];
			
			
			/*
			 * Output
			 */
			$output = array(
				"sEcho" => intval($_GET['sEcho']),
				"iTotalRecords" => $iTotal,
				"iTotalDisplayRecords" => $iFilteredTotal,
				"aaData" => array()
			);
			
			while ( $aRow = mysql_fetch_array( $rResult ) )
			{
				$row = array();
				for ( $i=0 ; $i<count($aColumns) ; $i++ )
				{
					if ( $aColumns[$i] == "version" )
					{
						/* Special output formatting for 'version' column */
						$row[] = ($aRow[ $aColumns[$i] ]=="0") ? '-' : $aRow[ $aColumns[$i] ];
					}
					else if ( $aColumns[$i] != ' ' )
					{
						/* General output */
						$row[] = $aRow[ $aColumns[$i] ];
					}
				}
				$output['aaData'][] = $row;
			}
			
			echo json_encode( $output );
		}
		
		//assing inner join ands group by
 		static function getJSONtablesInner($tablename, $vars,$sjoin,$sgroupBy){

			$tablename = escape_value($tablename);
			
			$aColumns = $vars;
			
			/* Array of database columns which should be read and sent back to DataTables. Use a space where
			 * you want to insert a non-database field (for example a counter or static image)
			 */
			
			
			
			/* Indexed column (used for fast and accurate table cardinality) */
			$sIndexColumn = "id";
			
			/* DB table to use */
			$sTable = $tablename;
		
			/* Database connection information */
			$gaSql['user']       = DB_USER;
			$gaSql['password']   = DB_PASSWORD;
			$gaSql['db']         = DB_NAME;
			$gaSql['server']     = DB_HOST;
			
			
			/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
			 * If you just want to use the basic configuration for DataTables with PHP server-side, there is
			 * no need to edit below this line
			 */
			
			/* 
			 * MySQL connection
			 */
			$gaSql['link'] =  mysql_pconnect( $gaSql['server'], $gaSql['user'], $gaSql['password']  ) or
				die( 'Could not open connection to server' );
			
			mysql_select_db( $gaSql['db'], $gaSql['link'] ) or 
				die( 'Could not select database '. $gaSql['db'] );
			
			
			/* 
			 * Paging
			 */
			$sLimit = "";
			if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
			{
				$sLimit = "LIMIT ".mysql_real_escape_string( $_GET['iDisplayStart'] ).", ".
					mysql_real_escape_string( $_GET['iDisplayLength'] );
			}
			
			
			/*
			 * Ordering
			 */
			if ( isset( $_GET['iSortCol_0'] ) )
			{
				$sOrder = "ORDER BY  ";
				for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
				{
					if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
					{
						$sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
						 	".mysql_real_escape_string( $_GET['sSortDir_'.$i] ) .", ";
					}
				}
				
				$sOrder = substr_replace( $sOrder, "", -2 );
				if ( $sOrder == "ORDER BY" )
				{
					$sOrder = "";
				}
			}
			
			
			/* 
			 * Filtering
			 * NOTE this does not match the built-in DataTables filtering which does it
			 * word by word on any field. It's possible to do here, but concerned about efficiency
			 * on very large tables, and MySQL's regex functionality is very limited
			 */
			$sWhere = "";
			if ( $_GET['sSearch'] != "" )
			{
				$sWhere = "WHERE (";
				for ( $i=0 ; $i<count($aColumns) ; $i++ )
				{
					$sWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string( $_GET['sSearch'] )."%' OR ";
				}
				$sWhere = substr_replace( $sWhere, "", -3 );
				$sWhere .= ')';
			}
			
			/* Individual column filtering */
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				if ( $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
				{
					if ( $sWhere == "" )
					{
						$sWhere = "WHERE ";
					}
					else
					{
						$sWhere .= " AND ";
					}
					$sWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string($_GET['sSearch_'.$i])."%' ";
				}
			}
			
			
			/*
			 * SQL queries
			 * Get data to display
			 */
			 $sQuery = "
				SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
				FROM   $sTable
				$sjoin
				$sgroupBy
				$sWhere
				$sOrder
				$sLimit
			";
			$rResult = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
			
			/* Data set length after filtering */
			$sQuery = "
				SELECT FOUND_ROWS()
			";
			$rResultFilterTotal = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
			$aResultFilterTotal = mysql_fetch_array($rResultFilterTotal);
			$iFilteredTotal = $aResultFilterTotal[0];
			
			/* Total data set length */
			$sQuery = "
				SELECT COUNT(".$sIndexColumn.")
				FROM   $sTable
			";
			$rResultTotal = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
			$aResultTotal = mysql_fetch_array($rResultTotal);
			$iTotal = $aResultTotal[0];
			
			
			/*
			 * Output
			 */
			$output = array(
				"sEcho" => intval($_GET['sEcho']),
				"iTotalRecords" => $iTotal,
				"iTotalDisplayRecords" => $iFilteredTotal,
				"aaData" => array()
			);
			
			while ( $aRow = mysql_fetch_array( $rResult ) )
			{
				$row = array();
				for ( $i=0 ; $i<count($aColumns) ; $i++ )
				{
					if ( $aColumns[$i] == "version" )
					{
						/* Special output formatting for 'version' column */
						$row[] = ($aRow[ $aColumns[$i] ]=="0") ? '-' : $aRow[ $aColumns[$i] ];
					}
					else if ( $aColumns[$i] != ' ' )
					{
						/* General output */
						$row[] = $aRow[ $aColumns[$i] ];
					}
				}
				$output['aaData'][] = $row;
			}
			
			echo json_encode( $output );
		}
		
		
 		
		
					
	}
	
?>