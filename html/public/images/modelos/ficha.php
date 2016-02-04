<?php 
	include_once ('../includes/config/config.php'); 
	
		
		$modelo_seleccionada = '-1';
		if (isset($_GET['m'])) {
		  $modelo_seleccionada = escape_value($_GET['m']);
		}

		$Query_Seleccionada = DB::query("SELECT * FROM modelos WHERE id =%s", $modelo_seleccionada);
		
		foreach ($Query_Seleccionada as $Seleccionada) {
			
			$imagen = $Seleccionada['name']."_".$Seleccionada['lastname'];
			$imagen = preg_replace('`&[^;]+Ã­;`','',htmlentities($imagen));
			
			$apellido_full = $Seleccionada['lastname'];
			$apellido = $apellido_full[0];
			$nombre = replo($Seleccionada['name']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title><?php echo SITE_NAME. " | " . $nombre . " ". $apellido; ?></title>
<?php require ('../includes/default/head.php'); ?>

		<script src="<?php echo JS; ?>functions.js" type="text/javascript"></script>
		<script src="<?php echo JS; ?>jquery.carouselFredSel.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(function() {
				$div = null;
				$('#thumbs').children().each(function(i) {
					if ( i % 2 == 0) {
						$div = $( '<div />' );
						$div.appendTo( '#thumbs' );
					}
					$(this).appendTo( $div );
					$(this).addClass( 'itm'+i );
					$(this).click(function() {
						$('#images').trigger( 'slideTo', [i, 0, true] );
					});
				});
				$('#thumbs img.itm0').addClass( 'selected' );
				
				$('#images').carouFredSel({
					direction: 'left',
					circular: true,
					infinite: true,
					/*width: 367,
					height: 550,*/
					items: 1,
					auto: false,
					prev: '#prev .images',
					next: '#next .images',
					scroll: {
						fx: 'directscroll',
						}
				});
				$('#thumbs').carouFredSel({
					direction: 'left',
					circular: true,
					infinite: true,
					height: 240,
					items: 1,
					align: false,
					auto: false,
					prev: '.handlr2',
					next: '.handlr'
				});
			});
		</script>
		<style type="text/css">
		
			body * { line-height: 22px;		}

			#images {
				height: 520px;
				float: right;
				overflow: hidden;
			}
			#thumbs {
				height: 350px;
				overflow: hidden;
			}
			#images {
				width: 367px;
			}
			#thumbs, #thumbs div { width:308px; float:left }
					
			#thumbs div {	height: 350px;	}
		
			a.handlr2 { margin: 0 240px 0 0; }			
			a.thumbs {
				left: 220px;
				color: #000;
			}			
			
		</style>
	</head>
	<body>
    <?php 

		$search = explode(","," ,&iacute;,&eacute;,&aacute;,&oacute;,&uacute;,&ntilde;,&aacute;");
		$replace = explode(",",",i,e,a,o,u,n,a");
		$imagen = str_replace($search, $replace, $imagen);
		
		function filesInDir($tdir)	{ //funcion para abrir la carpeta y leer las fotos disponibles
				$dirs = scandir($tdir);
				 foreach($dirs as $file)	{
						if (($file == '.')||($file == '..')) {
						}
						elseif (is_dir($tdir.'/'.$file)){
							filesInDir($tdir.'/'.$file);
						}
						else {

							//Excluir los thumbs							
							$pos = strpos($file, "s");
							if ($pos === false) { //Si el archivo no contiene s en su nombre, listar
							$ver= $tdir."/".$file;

							list($ancho, $alto, $tipo, $atributos) = getimagesize($ver);
//							echo $ancho;

								echo "<img src='".$tdir."/".$file."' ".$atributos." />";
							} else {
								//Si el archivo se llama 's'algo lo omite porque es un thumb
							}
						}	
					}
		}
		
		function thumbsInDir($tdir)	{ //funcion para abrir la carpeta y leer las fotos disponibles
				$dirs = scandir($tdir);
				 foreach($dirs as $file)	{
						if (($file == '.')||($file == '..')) {
						}
						elseif (is_dir($tdir.'/'.$file)){
							filesInDir($tdir.'/'.$file);
						}
						else {

							//Solo los thumbs							
							$pos = strpos($file, "s");
							if ($pos === false) { //Si el archivo no contiene s en su nombre, omitir
								
							} else {
								//Si el archivo se llama 's'algo lo omite porque es un thumb
								
								echo "<img src='".$tdir."/".$file."' width='145' height='235' />";
							}
							//
						}
				}
		}		
	  ?>
      
      <div class="ficha-container" style="margin:0">
      	<h1 class="left futura size5 uppercase left-align" style="font-size:47px"> <?php  echo $nombre." ".$apellido ."."; ?></h1>	
        <div class="right"><a class="link futura size2 back2 title-agencia"><<</a></div>
        <div class="clear"></div>
        <div class="ficha-thumbs">
        	<div id="thumbs">
              <?php thumbsInDir(strtolower($imagen)); ?>
            </div>
            <div class="clear"></div>
            <div class="ficha-control">
            	<a href="#" class="handlr2 left"><br> < </a>
            	<a href="#" class="handlr left"><br>  ></a>
            </div>
            <h3 class="blacktitles uppercase futura size1-5">
              <?php 
					if ($Seleccionada['cat'] !== 'talento') {
						$estatura = $Seleccionada['height'];
						$busto = $Seleccionada['bust'];
						$medidas = $busto."-".$Seleccionada['waist']."-".$Seleccionada['hips'];
						$talla = replo($Seleccionada['size']);
						$pantalon = replo($Seleccionada['pants']);
						$calzado= replo($Seleccionada['shoe']);
						$cabello = replo($Seleccionada['hair']);
						$ojos = replo($Seleccionada['eyes']);
						$piel = replo($Seleccionada['skin']);
						if ($estatura !='') echo "Estatura &nbsp;&nbsp;&nbsp;". $estatura. "<br/> ";
						if ($busto !='') echo "Medidas &nbsp;&nbsp;&nbsp;". $medidas."<br/> ";
						if ($talla !='') echo "Talla &nbsp;&nbsp;&nbsp;". $talla. "<br/> ";
						if ($calzado !='') echo "Calzado &nbsp;&nbsp;&nbsp;". $calzado. "<br/> ";
						if ($cabello !='') echo "Cabello &nbsp;&nbsp;&nbsp;". $cabello. "<br/> ";
						if ($ojos !='') echo "Ojos &nbsp;&nbsp;&nbsp;". $ojos. "<br/> ";
						if ($piel !='') echo "Piel &nbsp;&nbsp;&nbsp;". $piel. "<br/> ";
					}						
					
				?>
            </h3>
        </div>
        <div class="ficha-photo">
        	<div id="images">
              <?php filesInDir(strtolower($imagen));// Las grandes ?>
            </div>        
        </div>
      </div>
      
        
          
    
		
		
	</body>
</html>
  <?php 
		  }//endif not empty
		?>	