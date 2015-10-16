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
	<div class="clearfix"></div>
	
	
	<div><div class="registration-question">LUGAR Y FECHA DE NACIMIENTO:</div> <div class="col-lg-5 col-xs-5 registration-answer">&nbsp;<?php echo $this->details['birthplace']; ?> <?php echo $this->details['birthdate']; ?></div></div>
	<div><div class="registration-question">EDAD:</div> <div class="col-lg-1 col-xs-1 registration-answer">&nbsp;<?php echo $this->details['age']; ?></div></div>
	
	<div class="clearfix"></div>
	<div><div class="registration-question">DIRECCIÓN:</div> <div class="col-lg-10 col-xs-10 registration-answer">&nbsp;<?php echo $this->details['address']; ?></div></div>
	
	
	
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
	
	<div><div class="registration-question">NOMBRE MAMÁ:</div> <div class="col-lg-6 col-xs-6 registration-answer">&nbsp;<?php echo $this->details['parent-name-mother']; ?></div></div>
	<div><div class="registration-question">C.I.:</div> <div class="col-lg-2 col-xs-2 registration-answer">&nbsp;<?php echo $this->details['parent-nationality-mother']."-".$this->details['parent-cedula-mother']; ?></div></div>
	<div class="clearfix"></div>
	<div><div class="registration-question">OCUPACIÓN:</div> <div class="col-lg-2 col-xs-2 registration-answer">&nbsp;<?php echo $this->details['parent-occupation-mother']; ?></div></div>
	<div><div class="registration-question">EMAIL:</div> <div class="col-lg-3 col-xs-3 registration-answer">&nbsp;<?php echo $this->details['email']; ?></div></div>
	<div><div class="registration-question">TELÉFONO:</div> <div class="col-lg-3 col-xs-3 registration-answer">&nbsp;<?php echo $this->details['parent-cellphone-mother']; ?></div></div>
	
	<div class="clearfix"></div>
	<div><div class="registration-question">NOMBRE PAPÁ:</div> <div class="col-lg-7 col-xs-7 registration-answer">&nbsp;<?php echo $this->details['parent-name-father']; ?></div></div>
	<div><div class="registration-question">C.I.:</div> <div class="col-lg-2 col-xs-2 registration-answer">&nbsp;<?php echo $this->details['parent-nationality-father']."-".$this->details['parent-cedula-father']; ?></div></div>
	
	<div class="clearfix"></div>
	<div><div class="registration-question">OCUPACIÓN:</div> <div class="col-lg-2 col-xs-2 registration-answer">&nbsp;<?php echo $this->details['parent-occupation-father']; ?></div></div>
	<div><div class="registration-question">EMAIL:</div> <div class="col-lg-3 col-xs-3 registration-answer">&nbsp;<?php echo $this->details['parent-email-father']; ?></div></div>
	<div><div class="registration-question">TELÉFONO:</div> <div class="col-lg-3 col-xs-3 registration-answer">&nbsp;<?php echo $this->details['parent-cellphone-father']; ?></div></div>
	
	
	<div class="clearfix"></div>
	<div><div class="registration-question">FACTURA JURÍDICA</div> <div class="col-lg-1 col-xs-1 registration-answer">&nbsp;<?php echo $this->details['factura']; ?></div></div>
	<div><div class="registration-question">A NOMBRE DE:</div> <div class="col-lg-5 col-xs-5 registration-answer">&nbsp;<?php echo $this->details['parent-factura']; ?></div></div>
	
	<div><div class="registration-question">RIF:</div> <div class="col-lg-2 col-xs-2 registration-answer">&nbsp;<?php echo $this->details['parent-rif']; ?></div></div>
	<div class="clearfix"></div>
	<div><div class="registration-question">DIRECCIÓN FISCAL:</div> <div class="col-lg-8 col-xs-8 registration-answer">&nbsp;<?php echo $this->details['parent-legaladdress']; ?></div></div>
	
	
	<div class="clearfix"></div>
	<div><div class="registration-question">¿CÓMO TE ENTERASTE DE NOSOTROS?</div> <div class="col-lg-8 col-xs-8 registration-answer">&nbsp;<?php echo $this->details['buzz']; ?></div></div>
	
	<div class="clearfix"></div>
	<div class="col-lg-5 col-xs-5 text-center"></div> 
	<div class="col-lg-2 col-xs-2"></div>
	<div class="col-lg-5 col-xs-5 text-center"><div class="firma">FIRMA DEL REPRESENTANTE</div></div>
	
	<div class="col-lg-12 col-xs-12 text-center">LOS DATOS SUMINISTRADOS SON DE USO ÚNICO Y CONFIDENCIAL DE LA EMPRESA</div>
	
	<div class="col-lg-12 col-xs-12 text-center"> <h5><strong>AL CANCELAR SU MENSUALIDAD LOS PRIMEROS SIETE (7) DÍAS DEL MES, RECIBE UN DESCUENTO DE PROTO-PAGO EN LA MENSUALIDAD</strong></h5> </div>
	
	<div class="registration-rules">
		<?php $this->insert('registration/documentation/rules/'. $this->course[0]['slug'].'.jpg'); ?>
	</div>
	
</div>