<!--div class="model-look registration-sheet">
		<div class="jumbotron">
			<img src="<?php echo IMAGES . "courses/" . $this -> course[0]['slug']; ?>/header.jpg" class="img-responsive hidden-sm hidden-xs" >
			
			<h1 class="hidden-md hidden-lg"><?php echo $this -> course[0]['name']; ?>
				<small><br><?php echo $this -> course[0]['description']; ?></small>
			</h1>
		</div>	
</div-->
<?php $this->render('registration/documentation/warning-header'); ?>
<div id="printable-area" class="print-documentation">
	<div style="height:1cm"></div>
	<div class="col-lg-6 col-xs-6">
		<img src="<?php echo IMAGES; ?>modelsview-logo-planilla.jpg" class="img-responsive" />
	</div>
	<div class="col-lg-6 col-xs-6">
		<div class="col-lg-8 col-xs-8 upper"><img src="<?php echo IMAGES; ?>courses/<?php echo $this -> course[0]['slug']; ?>/print-sheetlogo.jpg" class="img-responsive" />
			Fecha de Ingreso  <strong><?php echo date("d/m/Y"); ?> </strong><br>
			Curso: <strong><?php echo $this->course[0]['name']; ?></strong><br>
			<?php echo $this->course_group[0]['name']; ?>
			<br>
			<?php echo $this->course_group[0]['schedule']; ?>
		</div>
		<div class="col-lg-4 col-xs-4 registration-foto"> Foto Alumno</div>
	</div>
	<p>&nbsp;</p>
	<div class="col-lg-12 col-xs-12 registration-title"> <h5>Datos Personales</h5> </div>
	<div class="clearfix"></div>
	
	<div><div class="registration-question">NOMBRE COMPLETO:</div> <div class="col-lg-5 col-xs-5 registration-answer">&nbsp;<?php echo $this->details['name']." ".$this->details['lastname']; ?></div></div>
	<div><div class="registration-question">C.I.:</div> <div class="col-lg-3 col-xs-3 registration-answer">&nbsp;<?php echo $this->details['nationality']."-".$this->details['cedula']; ?></div></div>
	<div class="clearfix"></div>
	
	
	<div><div class="registration-question">LUGAR Y FECHA DE NACIMIENTO:</div> <div class="col-lg-5 col-xs-5 registration-answer">&nbsp;<?php echo $this->details['birthplace']; ?> <?php echo $this->details['birthdate']; ?></div></div>
	<div><div class="registration-question">EDAD:</div> <div class="col-lg-1 col-xs-1 registration-answer">&nbsp;<?php echo $this->details['age']; ?></div></div>
	
	<div class="clearfix"></div>
	<div><div class="registration-question">DIRECCIÓN:</div> <div class="col-lg-10 col-xs-10 registration-answer">&nbsp;<?php echo $this->details['address']; ?></div></div>
	
	<div class="clearfix"></div>
	<div><div class="registration-question">TELÉFONO MOVIL:</div> <div class="col-lg-3 col-xs-3 registration-answer">&nbsp;<?php echo $this->details['cellphone']; ?></div></div>
	<div><div class="registration-question">TELÉFONO CANTV:</div> <div class="col-lg-4 col-xs-4 registration-answer">&nbsp;<?php echo $this->details['phonenumber']; ?></div></div>
	
	<div class="clearfix"></div>
	<div><div class="registration-question">LUGAR DE ESTUDIO:</div> <div class="col-lg-4 col-xs-4 registration-answer">&nbsp;<?php echo $this->details['studiesplace']; ?></div></div>
	<div><div class="registration-question">NIVEL DE ESTUDIO:</div> <div class="col-lg-3 col-xs-3 registration-answer">&nbsp;<?php echo $this->details['studies']; ?></div></div>
	
	<div class="clearfix"></div>
	<div><div class="registration-question">EMAIL:</div> <div class="col-lg-3 col-xs-3 registration-answer">&nbsp;<?php echo $this->details['email']; ?></div></div>
	<div><div class="registration-question">¿PRACTICAS ALGUN DEPORTE?</div> <div class="col-lg-4 col-xs-4 registration-answer">&nbsp;<?php echo $this->details['sports']; ?></div></div>
	
	<div class="clearfix"></div>	
	<div><div class="registration-question">FACEBOOK:</div> <div class="col-lg-3 col-xs-3 registration-answer">&nbsp;<?php echo $this->details['facebook']; ?></div></div>
	<div><div class="registration-question">TWITTER:</div> <div class="col-lg-3 col-xs-3 registration-answer">&nbsp;<?php echo $this->details['twitter']; ?></div></div>
	<div><div class="registration-question">INSTAGRAM:</div> <div class="col-lg-3 col-xs-3 registration-answer">&nbsp;<?php echo $this->details['instagram']; ?></div></div>
	
	<div class="clearfix"></div>
	<div><div class="registration-question">¿ES ALERGIC@ A ALGO?</div> <div class="col-lg-1 col-xs-1 registration-answer">&nbsp;<?php echo $this->details['allergies']; ?></div></div>
	<div><div class="registration-question">EXPLIQUE:</div> <div class="col-lg-7 col-xs-7 registration-answer">&nbsp;<?php echo $this->details['allergies-explaination']; ?></div></div>
	<div class="clearfix"></div>
	<div><div class="registration-question">¿ESTÁ BAJO TRATAMIENTO MÉDICO?</div> <div class="col-lg-1 col-xs-1 registration-answer">&nbsp;<?php echo $this->details['medicaltreatment']; ?></div></div>
	<div><div class="registration-question">EXPLIQUE:</div> <div class="col-lg-5 col-xs-5 registration-answer">&nbsp;<?php echo $this->details['medicaltreatment-explaination']; ?></div></div>
	<div class="clearfix"></div>
	<div><div class="registration-question">¿CONSUME ALGÚN MEDICAMENTO REGULARMENTE?</div> <div class="col-lg-1 col-xs-1 registration-answer">&nbsp;<?php echo $this->details['medication']; ?></div></div>
	<div><div class="registration-question">EXPLIQUE:</div> <div class="col-lg-4 col-xs-4 registration-answer">&nbsp;<?php echo $this->details['medication-explaination']; ?></div></div>
	
	<div class="clearfix"></div>
	<div><div class="registration-question">ALTURA:</div> <div class="col-lg-2 col-xs-2 registration-answer">&nbsp;<?php echo $this->details['height']; ?></div></div>
	<div><div class="registration-question">TALLA DE CALZADO:</div> <div class="col-lg-1 col-xs-1 registration-answer">&nbsp;<?php echo $this->details['shoe']; ?></div></div>
	<div><div class="registration-question">TALLA DE BLUSA:</div> <div class="col-lg-1 col-xs-1 registration-answer">&nbsp;<?php echo $this->details['size']; ?></div></div>
	<div><div class="registration-question">TALLA DE PANTALÓN:</div> <div class="col-lg-1 col-xs-1 registration-answer">&nbsp;<?php echo $this->details['size-pants']; ?></div></div>
	
	
	<div class="clearfix"></div>
	<p>&nbsp;</p>
	<div class="col-lg-12 col-xs-12 registration-title"> <h5>Datos del Representante</h5> </div>
	
	<div><div class="registration-question">NOMBRE COMPLETO:</div> <div class="col-lg-5 col-xs-5 registration-answer">&nbsp;<?php echo $this->details['parent-name']; ?></div></div>
	<div><div class="registration-question">C.I.:</div> <div class="col-lg-2 col-xs-2 registration-answer">&nbsp;<?php echo $this->details['parent-nationality']."-".$this->details['parent-cedula']; ?></div></div>
	
	<div class="clearfix"></div>
	<div><div class="registration-question">FACTURA JURÍDICA</div> <div class="col-lg-1 col-xs-1 registration-answer">&nbsp;<?php echo $this->details['factura']; ?></div></div>
	<div><div class="registration-question">A NOMBRE DE:</div> <div class="col-lg-5 col-xs-5 registration-answer">&nbsp;<?php echo $this->details['parent-factura']; ?></div></div>
	
	<div><div class="registration-question">RIF:</div> <div class="col-lg-2 col-xs-2 registration-answer">&nbsp;<?php echo $this->details['parent-rif']; ?></div></div>
	<div class="clearfix"></div>
	<div><div class="registration-question">DIRECCIÓN FISCAL:</div> <div class="col-lg-8 col-xs-8 registration-answer">&nbsp;<?php echo $this->details['parent-legaladdress']; ?></div></div>
	
	<div class="clearfix"></div>
	<div><div class="registration-question">LUGAR DE TRABAJO:</div> <div class="col-lg-5 col-xs-5 registration-answer">&nbsp;<?php echo $this->details['parent-workplace']; ?></div></div>
	<div><div class="registration-question">CARGO:</div> <div class="col-lg-4 col-xs-4 registration-answer">&nbsp;<?php echo $this->details['parent-job']; ?></div></div>	
	
	<div class="clearfix"></div>
	<div><div class="registration-question">EMAIL:</div> <div class="col-lg-8 col-xs-8 registration-answer">&nbsp;<?php echo $this->details['parent-email']; ?></div></div>
	
	<div class="clearfix"></div>
	<div><div class="registration-question">TELÉFONO MÓVIL:</div> <div class="col-lg-4 col-xs-4 registration-answer">&nbsp;<?php echo $this->details['parent-cellphone']; ?></div></div>
	<div><div class="registration-question">TELÉFONO DE OFICINA:</div> <div class="col-lg-4 col-xs-4 registration-answer">&nbsp;<?php echo $this->details['parent-phonenumber']; ?></div></div>
	
	<div class="clearfix"></div>
	<div><div class="registration-question">¿CÓMO TE ENTERASTE DE NOSOTROS?</div> <div class="col-lg-8 col-xs-8 registration-answer">&nbsp;<?php echo $this->details['buzz']; ?></div></div>
	
	<div class="clearfix"></div>
	<div class="col-lg-5 col-xs-5 text-center"><div class="firma">FIRMA ALUMNO</div></div> 
	<div class="col-lg-2 col-xs-2"></div>
	<div class="col-lg-5 col-xs-5 text-center"><div class="firma">FIRMA DEL REPRESENTANTE</div></div>
	
	<div class="col-lg-12 col-xs-12 text-center">LOS DATOS SUMINISTRADOS SON DE USO ÚNICO Y CONFIDENCIAL DE LA EMPRESA</div>
	
	<!--div class="col-lg-12 col-xs-12 text-center"> <h5><strong>CANCELAR LA MENSUALIDAD LOS PRIMEROS SIETE (7) DÍAS DEL MES</strong></h5> </div-->
	
	<div class="registration-rules">
		<?php $this->insert('registration/documentation/rules/'. $this->course[0]['slug'].'.jpg'); ?>
		<?php $this->insert('registration/documentation/schedule/'.$this->course_group[0]['slug']."/".$this->course_group[0]['horario-slug'].'.jpg'); ?>
		<?php $this->insert('registration/documentation/schedule/lista.jpg'); ?>
	</div>
	
</div>