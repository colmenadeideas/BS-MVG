<?php

	function escape_value($data) {
	if( ini_get ( 'magic_quotes_gpc') ) {
		$data = stripslashes($data);
	}
		$data =	strip_tags($data, '<p><a><br>');
	    return mysql_real_escape_string($data);   //use this if local
		//return mysql_escape_string($data); //use this for server
	}
	
	function strip_zeros_from_date($marked_string="") {
		$no_zeros = str_replace('*0','', $marked_string);
		$clean_string = str_replace('*','', $no_zeros);
		return $clean_string;
	}
	
	function create_slug($data) {
		$search = explode(',','&iacute;,&eacute;,&aacute;,&oacute;,&uacute;,&ntilde;,&aacute;,Á,É,Í,Ó,Ú,á,é,í,ó,ú,ñ,#,.,@, ,');
		$replace = explode(",","i,e,a,o,u,n,a,A,E,I,O,U,a,e,i,o,u,n,,_,_,-");
		$data = str_replace($search, $replace, $data);
		return $data;
	}
	
	//--- Funcion para adicionar 0 delante
	function zerofill ($num,$zerofill) {
	   while (strlen($num)<$zerofill) {
	       $num = "0".$num;
	   }
	   return $num;
	}
	
	function format_linebr($data) {
		$data = str_replace("\r\n", "<br>", $data);
		$data = str_replace("\&quot;", "", $data);
		$data = str_replace('\"', '"', $data);
		$data = str_replace('\\', '', $data);
		$data = str_replace('rn', '', $data);
		$data = str_replace('<div>', '', $data);
		$data = str_replace('</div>', '', $data);
		
		return $data;	
	
	}
	function pointforcomma($data){
		$data = str_replace(",", ".", $data);
		return $data;	
	}
	
	function remove_p($data) {
		$data = str_replace("<p>", "", $data);
		$data = str_replace("</p>", "", $data);	
		return $data;	
	}
	//Locate thumbnail file based on name
	function thumb_size($file) {
		
		//$file = preg_replace('/\.[^.]*$/', '', $file);
		$file = preg_replace("/\.jpg/i", "_thumb.jpg", $file); 	
		return $file;
	}
	
	function cleanSpecialCharacters($data) {
		$search = explode(',','&iacute;,&eacute;,&aacute;,&oacute;,&uacute;,&ntilde;,&aacute;,Á,É,Í,Ó,Ú,á,é,í,ó,ú,#,"');
		$replace = explode(",","i,e,a,o,u,n,a,A,E,I,O,U,a,e,i,o,u,,");
		$data = str_replace($search, $replace, $data);
		
		return $data;
	}
	
				
	function word_limiter($str,$limit=10) {
		if(stripos($str," ")){
		$ex_str = explode(" ",$str);
			if(count($ex_str)>$limit){
				for($i=0;$i<$limit;$i++){
				@$str_s.=$ex_str[$i]." ";
				}
			return $str_s."...";
			}else{
			return $str;
			}
		}else{
		return $str;
		}
	}
	
	function new_title_limit( $string, $limit) {
		$limit_minus = $limit - 3;
		$string = (strlen($string) > $limit) ? substr($string,0,$limit_minus).'...' : $string;
		return $string;
	}

	function limit_chars_words($string, $char_limit = 150) {
		// limitar el número de caracteres y devolver solo palabras enteras
		$string = preg_replace('/<(p|br)s*>/i', ' ', $string);
		$string = strip_tags($string);
		$orig_str_length = strlen($string);
		$words = explode(' ', $string);
		
		$i=0;
		$str_length = 0;
		while ($str_length < $char_limit) {
			$str_length = $str_length + strlen($words[$i])+1;
			$new_words[$i] = $words[$i];
			$i++;
		}
		
		$string = implode(' ', $new_words);
		
		if (strlen($string) > $char_limit) {
			$new_words = explode(' ', $string);
			$word_count = count($new_words);
			$word_limit = $word_count - 1;
			$string = implode(' ', array_slice($new_words, 0, $word_limit));
		}
		
		if ($orig_str_length > strlen($string)) { $string = "$string..."; }
		return $string;
	}
	
	
	function handleTextHtmlSplit($text, $maxSize) { //Breaks HTML without breakign html tags
	
		//our collection array
		$niceHtml[] = '';
	
		// Splits on tags, but also includes each tag as an item in the result
		$pieces = preg_split('/(<[^>]*>)/', $text, -1, PREG_SPLIT_DELIM_CAPTURE);
	
		//the current position of the index
		$currentPiece = 0;
	
		//start assembling a group until it gets to max size
	
		foreach ($pieces as $piece) {
			//make sure string length of this piece will not exceed max size when inserted
			if (strlen($niceHtml[$currentPiece] . $piece) > $maxSize) {
				//advance current piece
				//will put overflow into next group
				$currentPiece += 1;
				//create empty string as value for next piece in the index
				$niceHtml[$currentPiece] = '';
			}
			//insert piece into our master array
			$niceHtml[$currentPiece] .= $piece;
			
			
			
		}
	
		//return array of nicely handled html
		return $niceHtml;
	}
	
	function textHtmlSplit($text, $maxSize =2200) {
	
		 //recibir el String
		$niceHtml[] = '';
		 
		$length = strlen($text);
		
		$textByChar = str_split($text);
		
		$p = 0;
		$i = 0;
		$count = true; 
		
		$niceHtml[$p] = '';
		// contar caracther por caracther, agregar a array
		foreach($textByChar as $char){
		    //Agregar al array
		    
		    if ($i > $maxSize) {
		    	
				//Si alcanzó el limite, buscar el proximo 'BLANKSPACE' para cambiar de array
				if ($char === " ") {
						
					$p += 1;  $i = 0;
					$niceHtml[$p] = '';
					
					$niceHtml[$p] .= $char;
				
				} else {
					
					//$i--;
					$niceHtml[$p] .= $char;
				}
				
		    	
				
				
			} else {
				
				$niceHtml[$p] .= $char; //$i.' (' .$p.')';
			}			
			
			switch ($char) {
				case '<': 			 // if < is found stop counting, agregar a array
					$count = false;
					$i = $i;
					break;
				case '>':			 // if > is found start counting again, agregar a array
					$count = true;
				
				default:
					
					if($count == true) {
						$i++;	
					} else {
						$i = $i;
					}				
					
					break;
			}  

		} 
		
		return $niceHtml;	
		
		
	}

	

	
		

	
	

	
	function fecha($string, $format = "d/m/Y") {
		$newDate = date($format, strtotime($string));
		return $newDate;
		
	}
	function fechasFragmentadas($string, $format = "d/m/Y")	{

		switch ($format) {
			case 'd/m/Y':
				return date("d/m/Y", strtotime($string));
				break;

			case 'hora':
				return date("g:i a" ,strtotime($string));
				break;	
			case 'all':
					date("F j, Y, g:i a",strtotime($string));
				break;		
			
			default:
				 return $string;
				break;

		}
	}

	 function dineroFormat($string, $decimales = 2, $sin = '') {
		
		if (empty($string)) {
			$string = 0;
		}
		if ($sin != '') {
			$sin = '';
		} else {
			$sin ="Bs. ";
		}
		
		$data = $sin.number_format($string, $decimales, ',', '.');
		return $data; 
	}	
	
	//Mayusculas y reemplaza los espacios por %20
	function filenameformat($string, $separador = '%20') { 
		
		$name = strtoupper(cleanSpecialCharacters($string));
		$name = str_replace(' ',$separador, $name);
		$name = rtrim($name, "-"); //if details_nomenclatura empty, remove last "-"	
		return $name;
	
	}
	
	//Usar imagen NOT FOUND para productos
	function checkfoundimg($string){
		
		$realpath = dirname(dirname(dirname(realpath(__FILE__)))).'/public/images/productos/';
			
		//Build Name			
		//Remove special characthers and turn to UPPERCASE
		$name = strtoupper(cleanSpecialCharacters($string));
		//Buil full link for download/open file
		$filenameCheck = $realpath . '' . $name . '.png';	
			
		if (!file_exists($filenameCheck)) {
					 
			return 'notfound';
					 
		} else {
			
			return $string;
		}
	}
	
	
	//redondear numero a 2 digitos
	function redondear($num) {
			
		$num = round($num);
			
		if ($num < 1) {
			$num = 1;
		}
		return $num;

	}
	
	//Mayusculas y reemplaza los espacios por %20
	function cleanforRif($string) { 
		
		$name = strtoupper(cleanSpecialCharacters($string));
		$name = str_replace('-','', $name);
		return $name;
	
	}
	
	function rif($string) {
			
		$string = substr($string, 0, 1) . "-" . substr($string, 1);
		$string = substr($string, 0, 1) . "-" . substr($string, 1);
		
		return $string;
	}
	
	function field_diccionario($data) {
		
		//Dictionary
		//TODO  manejar FIELD_CATEGORY para poder cambiarlo a idiomas más adelante
		$array_fields = array();
		$array_fields['category']		 	= 'Categoria'; 
		$array_fields['name'] 				= 'Nombre';
		$array_fields['distribuidores'] 	= 'Distribuidores';
		$array_fields['state'] 				= 'Estado';
		$array_fields['username'] 			= 'Usuario';
		
		return $array_fields[$data];
	}

	function getPage() {
		$current = explode("/",$_SERVER['REQUEST_URI']);
		if (end($current) == "") {
			return "home";
		} else {
			return end($current);	
		}
	}
	function normaliza ($cadena)
	{
	    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
	    $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
	    $cadena = utf8_decode($cadena);
	    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
	    return utf8_encode($cadena);
	}
	
	function FilesInDir($tdir,$carr='')	{ //funcion para abrir la carpeta y leer las fotos disponibles
		$fulldir = IMAGES.'modelos/'.$tdir;
		//$dirs = scandir(IMAGES.'modelos/'.$tdir);
		$dirs = scandir(dirname(SITE_PATH)."/html/public/images/modelos/".$tdir."/");
		//agata-r-portfolio
		
			$count=0;

		//$indicators = '<ol class="carousel-indicators">';
		$banners =  '<div class="carousel-inner">';

		foreach($dirs as $file)	{

			if (($file == '.')||($file == '..')) {
			} elseif (is_dir($tdir.'/'.$file)){
				FilesInDir($tdir.'/'.$file,$carr);
			} else {

				//Solo los thumbs							
				$pos = strpos($file, "s");
				$pos2 = strpos($file, "_DS_Store");
				
				if ($pos === false and $pos=== false) 
				{ //Si el archivo  contiene s en su nombre, omitir
					if(empty($carr))
					{
						if ($file == "01.jpg" ) { $active = "active";} else { $active = ""; }
						$banners.='<div class="item '.$active.'">
				            <img src="'.$fulldir."/".$file.'" class="img-responsive">
				        </div>';
			    	}
			    	else
			    	{
						if ($file == "02.jpg" ) { $active = "active";} else { $active = ""; }
						$banners.='<div class="item '.$active.'">
				            <img src="'.$fulldir."/".$file.'" class="img-responsive">
				        </div>';
			    	}	
			   // $indicators.= '<li data-target="'.$id_indicator.'" data-slide-to="'.$count.'" class="'.$active.'"></li>';							
				} else {
					//Si el archivo se llama 's'algo lo omite porque es un thumb							
				}						
			}	
			$count++;				
		}
		$banners.= "</div>";
		
		//$indicators.= "</ol>";
		//$final_slider = $banners.$indicators; 
		$final_slider = $banners; 
		echo $final_slider;		
		
	}
	
	function replo($string){
	
		$tmp = $string;
		$tmp = str_replace("á", "&#225;", $tmp);
		$tmp = str_replace("&aacute;", "&#225;", $tmp);
		$tmp = str_replace("à", "&#224; ", $tmp);
		$tmp = str_replace("&agrave;", "&#224; ", $tmp);
		
		$tmp = str_replace("Ã¡", "&#225;", $tmp);
		$tmp = str_replace("Ã", "", $tmp);
		$tmp = str_replace("Â¿", "&#191;", $tmp);
		
		$tmp = str_replace("Á", "&#193;", $tmp);
		
		$tmp = str_replace("é", "&#233;", $tmp);
		$tmp = str_replace("&eacute;", "&#233;", $tmp);
		$tmp = str_replace("ê", "&#234;", $tmp);
		$tmp = str_replace("&ecirc;", "&#234;", $tmp);
		$tmp = str_replace("è", "&#232;", $tmp);
		$tmp = str_replace("&egrave;", "&#232;", $tmp);
		
		$tmp = str_replace("É", "&#201;", $tmp);
		$tmp = str_replace("&Eacute;", "&#201;", $tmp);
		$tmp = str_replace("Ã©", "&#201;", $tmp);
		
		$tmp = str_replace("í", "&#237;", $tmp);
		$tmp = str_replace("&iacute;", "&#237;", $tmp);
		$tmp = str_replace("Ã­", "&#237;", $tmp);
		$tmp = str_replace("&igrave;", "&#236; ", $tmp);
		
		$tmp = str_replace("Í", "&#205;", $tmp);
		$tmp = str_replace("&Iacute;", "&#205;", $tmp);
		
		$tmp = str_replace("ó", "&#243;", $tmp);
		$tmp = str_replace("&oacute;", "&#243;", $tmp);
		$tmp = str_replace("Ã³", "&#243;", $tmp);
		
		$tmp = str_replace("Ó", "&#211;", $tmp);
		$tmp = str_replace("&Oacute;", "&#211;", $tmp);
		
		$tmp = str_replace("ú", "&#250;", $tmp);
		$tmp = str_replace("&uacute;", "&#250;", $tmp);
		$tmp = str_replace("Ãº", "&#250;", $tmp);
		
		$tmp = str_replace("Ú", "&#218;", $tmp);
		$tmp = str_replace("&Uacute;", "&#218;", $tmp);
		
		$tmp = str_replace("ü", "&#252;", $tmp);
		$tmp = str_replace("&uuml;", "&#252;", $tmp);
		
		$tmp = str_replace("Ü", "&#220;", $tmp);
		$tmp = str_replace("&Uuml;", "&#220;", $tmp);
		
		$tmp = str_replace("ñ", "&#241;", $tmp);
		$tmp = str_replace("•", "&#241;", $tmp);		
		$tmp = str_replace("&ntilde;", "&#241;", $tmp);
		$tmp = str_replace("Ã±", "&#241;", $tmp);
		
		$tmp = str_replace("Ñ", "&#209;", $tmp);
		$tmp = str_replace("&Ntilde;", "&#209;", $tmp);
		
		//		Las comillas"
		$tmp = str_replace("&ldquo;", "&#8220;", $tmp);
		$tmp = str_replace("&rdquo;", "&#8221;", $tmp);
		$tmp = str_replace("&quot;", "&#34;", $tmp);
		$tmp = str_replace("¡", "&#161;", $tmp);
		$tmp = str_replace("&iexcl;", "&#161;", $tmp);
		$tmp = str_replace("&hellip;", "&#8230;", $tmp);
		$tmp = str_replace("&bull;", "&#8226;", $tmp);
		$tmp = str_replace("¿", "&#191;", $tmp);
		$tmp = str_replace("&iquest;", "&#191;", $tmp);
		$tmp = str_replace("®", "&#174;", $tmp);
		$tmp = str_replace("&reg;", "&#174;", $tmp);
		$tmp = str_replace("©", "&#169;", $tmp);
		$tmp = str_replace("&copy;", "&#169;", $tmp);
		$tmp = str_replace("¨", "&#168;", $tmp);
		$tmp = str_replace("&uml;", "&#168;", $tmp);
		$tmp = str_replace("&", "&amp;", $tmp);
		
		//	FRACCIONES
		$tmp = str_replace("&frac14;", "&#188;", $tmp);
		$tmp = str_replace("&frac12;", "&#189;", $tmp);
		$tmp = str_replace("&frac34;", "&#190;", $tmp);
		
		$string = $tmp;
		return $string;
	}

	
			
?>