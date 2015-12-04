<body class="<?php echo $this -> course[0]['slug']; ?>">
	<div class="container">
		<div class="jumbotron">
			<img src="<?php echo IMAGES . "courses/" . $this -> course[0]['slug']; ?>/header.jpg" class="img-responsive hidden-sm hidden-xs" >
			
			<h1 class="hidden-md hidden-lg"><?php echo $this -> course[0]['name']; ?>
				<small><br><?php echo $this -> course[0]['description']; ?></small>
			</h1>
		</div>	
		
		<form id="registration" action="" novalidate="novalidate" class="stepform">
			<!-- progressbar -->
			<ul id="progressbar">
				<li class="active">Selecciona tu horario</li>
				<li>Datos Personales</li>
			</ul>
		 	<!-- PASO 1 -->
		 	<fieldset>
		 		<div class="seccion"><h3>SELECCIONA EL HORARIO DE TU PREFERENCIA </h3></div> 
		 		<div class="col-sm-6 col-lg-6 col-sm-offset-1 col-lg-offset-1">
		 			<select name="course_available_group_id" class="input-lg" required>
				        <option value="" disabled selected>Selecciona..</option>
						<?php foreach($this->available_groups as $available_groups) { ?>
						<option value="<?php echo $available_groups['id']; ?>"><?php echo $available_groups['name'] . " (" . $available_groups['start_date'] . "-" . $available_groups['end_date'] . ") " . $available_groups['schedule']; ?></option>
						<?php } ?>
					</select><br><br>
		 		</div>
		 					 		
				<div class="clearfix"></div>
		        <input type="button" name="next" class="next btn" value="Siguiente »">
		        <br><p style="color:black !important;text-align: center;">El pensum esta sujeto a cambio sin previo aviso</p>        
		 	</fieldset>
		 	<!-- PASO 2 -->
			<fieldset id="registration-step1">
				<div class="seccion"><h3>DATOS PERSONALES </h3></div> 
				
					<div class="col-sm-6 col-lg-6">
			        	<input type="text" name="name" placeholder="Nombres" required="required" class="form-control input-lg">			                
			        </div> 
			        <div class="col-sm-6 col-lg-6">
			        	<input type="text" name="lastname" placeholder="Apellidos" required="required"  class="form-control input-lg">			                
			        </div>
			        <div class="col-sm-4 col-lg-4">
		         		<input type="text" name="phonenumber" placeholder="Teléfono Habitación" class="form-control input-lg" required>
		            </div>
		            <div class="col-sm-4 col-lg-4">
		         		<input type="text" name="cellphone" placeholder="Celular"  class="form-control input-lg" required>
		            </div>
		            <div class="col-sm-6 col-lg-6">
				       		<input type="email" id="email" name="email" placeholder="Email" class="form-control input-lg" required>				       		
				    </div>
				    <div class="col-sm-6 col-lg-6">
				       		<input type="email" id="confirm_email" name="confirm_email" placeholder="Coloca tu Email nuevamente" class="form-control input-lg" required>				       		
				     </div>
				     <div class="col-sm-4 col-lg-4">
				       		<input type="text" name="facebook" placeholder="Facebook" class="form-control input-lg">				       		
				        </div>
				         <div class="col-sm-4 col-lg-4">
				       		<input type="text" name="twitter" placeholder="@Twitter" class="form-control input-lg">				       		
				        </div>
				         <div class="col-sm-4 col-lg-4">
				       		<input type="text" name="instagram" placeholder="@Instagram" class="form-control input-lg">				       		
				        </div>
				        
				        <div class="col-sm-12 col-lg-12">
				       		<textarea name="buzz" class="form-control" placeholder="¿Cómo te enteraste de Nosotros?"></textarea>
				       		<input type="hidden" id="PromoIns" name="PromoIns" value="1" >
			            </div>
					
		              
		                    <div class="clearfix"></div>
		                     <input type="button" name="previous" class="previous btn" value="« Anterior">
		                    
		                    <input type="submit" name="submit" class="btn btn-success send" value="Listo!">
		                    <br><p style="color:black !important;text-align: center;">El pensum esta sujeto a cambio sin previo aviso</p>  
		                    
		       </fieldset>
		 </form>
		 <div id="response" class="col-lg-offset-3 col-xs-offset-3 col-lg-6 col-xs-6 registration-response"><?php echo COURSES_SUCCESS_REGISTRATION_MESSAGE; ?></div> 
	</div>