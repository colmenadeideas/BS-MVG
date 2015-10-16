<div class="col-lg-12 col-xs-12">
	<div class="jumbotron text-center">
		<h2>¡Sólo debes llevar tus documentos a Model's View!</h2>
		<!--steps-->
			<div class="row bs-wizard" style="border-bottom:0;">                
                <div class="col-xs-2 bs-wizard-step complete">
                   <div class="text-center bs-wizard-stepnum">&nbsp;</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>  
                  <div class="bs-wizard-info text-center">Pre-inscribete</div>               
                </div>
                
                <div class="col-xs-2 bs-wizard-step complete"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">&nbsp;</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Registra tu Pago</div>  
                </div>
                
                <div class="col-xs-2 bs-wizard-step complete"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">&nbsp;</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Imprime tus datos</div>  
                 </div>
                
                <div class="col-xs-3 bs-wizard-step active"><!-- active -->
                  <div class="text-center bs-wizard-stepnum">&nbsp;</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Formaliza tu Inscripción</div>  
                </div>
               	<div class="col-xs-3 bs-wizard-step disabled"><!-- active -->
                  <div class="text-center bs-wizard-stepnum">&nbsp;</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">¡Bienvenid@!</div>  
                </div>
            </div>
          <!--steps-->
	</div>

	
	<div class="col-lg-12 col-sm-12 text-center"><br>
		<p>
			<?php echo $this->courseinfo[0]['step4_instructions']; ?>
		<br><br>
		</p>
		<a href="#registration/complete/<?php echo $this->registration['id']; ?>" class="btn btn-default btn-lg" role="button"><i class="glyphicon glyphicon-edit"></i> Modificar Planilla </a>
		<a href="#registration/documentation/<?php echo $this->registration['id']; ?>" class="btn btn-success btn-lg" role="button"><i class="glyphicon glyphicon-print"></i> Imprimir </a>
		<p><br>
			<h4><?php echo REGISTRATION__STEP_4_MESSAGE_IF; ?></h4>
		</p>
	</div>
	
</div>
