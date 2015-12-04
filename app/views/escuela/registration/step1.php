
<div class="col-lg-12 col-xs-12">
	<div class="jumbotron text-center">
		<h2><span class="name"><?php echo $this -> student[0]['name']; ?></span>, Completa tu inscripción</h2>
		
		<!--steps-->
			<div class="row bs-wizard" style="border-bottom:0;">                
                <div class="col-xs-2 bs-wizard-step active">
                   <div class="text-center bs-wizard-stepnum">&nbsp;</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>  
                  <div class="bs-wizard-info text-center">Pre-inscribete</div>               
                </div>
                
                <div class="col-xs-2 bs-wizard-step disabled"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">&nbsp;</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Registra tu Pago</div>  
                </div>
                
                <div class="col-xs-2 bs-wizard-step disabled"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">&nbsp;</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Imprime tus datos</div>  
                 </div>
                
                <div class="col-xs-2 bs-wizard-step disabled"><!-- active -->
                  <div class="text-center bs-wizard-stepnum">&nbsp;</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Formaliza tu Inscripción</div>  
                </div>
               	<div class="col-xs-2 bs-wizard-step disabled"><!-- active -->
                  <div class="text-center bs-wizard-stepnum">&nbsp;</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">¡Bienvenid@!</div>  
                </div>
            </div>
          <!--steps-->
          
          
	</div>

	<h2 class="text-center">Continúa con tu proceso de inscripción<br><br></h2>
	<div class="col-lg-7 col-sm-7 well"><br>
		<?php echo $this->courseinfo[0]['step1_instructions']; 

    ?>

    <br><p><center>*El pensum esta sujeto a cambio sin previo aviso </center></p>
	</div>
	<div class="col-lg-5 col-sm-5">
		<h3>Si ya realizaste el pago,<br> registralo aquí:</h3><br><br>
		<button type="button" class="btn btn-lg btn-success action-view showtooltip" onclick="loadform('payment','<?php echo $this->registration['id']; ?>')">Registrar Mi Pago <i  class="fa fa-credit-card fa-lg"></i></button>

	</div>
</div>
<?php $this->render('students/edit-loadarea'); ?>
<?php $this->render('students/modal-loadarea'); ?>