<div class="<?php echo $this -> course[0]['slug']; ?> registration-sheet">
		<div class="jumbotron">
			<img src="<?php echo IMAGES . "courses/" . $this -> course[0]['slug']; ?>/header.jpg" class="img-responsive hidden-sm hidden-xs" >
			
			<h1 class="hidden-md hidden-lg"><?php echo @$this -> course[0]['name']; ?>
				<small><br><?php echo @$this -> course[0]['description']; ?></small>
			</h1>
		</div>		
		
		<form id="complete-registration" action="" novalidate="novalidate" class="stepform">
			<!-- progressbar -->
			<ul id="progressbar">
				<li class="active">Selecciona tu horario</li>
				<li>Datos Personales</li>
				<li>Información Médica</li>
				<li>Información Personal</li>
				<li>Datos Representante</li>
			</ul>
		 	
		 	<!-- PASO 2 -->
			<fieldset id="registration-step1">
				<div class="seccion"><h3>DATOS PERSONALES </h3></div> 
					<input type="hidden" name="registration_id" required="required" value="<?php echo @$this -> registration['id']; ?>">			                
			        
					<div class="col-sm-6 col-lg-6">
			        	<input type="text" name="name" placeholder="Nombres" required="required" class="form-control input-lg" value="<?php echo @$this -> details['name']; ?>">			                
			        </div> 
			        <div class="col-sm-6 col-lg-6">
			        	<input type="text" name="lastname" placeholder="Apellidos" required="required"  class="form-control input-lg" value="<?php echo @$this -> details['lastname']; ?>">			                
			        </div>
			        <div class="col-sm-2 col-lg-2 nationality">
				        <label class="radio-inline">
							<input type="radio" name="nationality" id="nac1" value="V" checked>
						    V
						</label>
						<label class="radio-inline">
							<input type="radio" name="nationality" id="nac2" value="E">
						  	 E
						</label>
					</div>
			        <div class="col-sm-4 col-lg-4">
			       		<input type="text" name="cedula" placeholder="Cédula" required="required" class="form-control input-lg" value="<?php echo @$this -> details['cedula']; ?>" >
			       		
			        </div>
			        <div class="clearfix hidden-xs"></div>
			        <div class="col-sm-4 col-lg-4">
			       		<input type="text" name="birthplace" placeholder="Lugar de Nacimiento" required="required" class="form-control input-lg" value="<?php echo @$this -> details['birthplace']; ?>">
				    </div>
			        <div class="col-sm-4 col-lg-4">
			      	 	<input type="text" name="birthdate" placeholder="Fecha Nacimiento" required class="form-control input-lg datetimepicker left" value="<?php echo @$this -> details['birthdate']; ?>"/>
						<i class="glyphicon glyphicon-calendar add-on right"></i>
			        </div>
			        <div class="col-sm-4 col-lg-4">
			         	<input type="text" name="age" placeholder="Edad" required="required" class="form-control input-lg" value="<?php echo @$this -> details['age']; ?>">
			        </div>
			        <div class="col-sm-12 col-lg-12">
			       		<textarea name="address" class="form-control" placeholder="Dirección"><?php echo @$this -> details['address']; ?></textarea>
		            </div>
		            <div class="col-sm-4 col-lg-4">
		         		<input type="text" name="phonenumber" placeholder="Teléfono Habitación" class="form-control input-lg" value="<?php echo @$this -> details['phonenumber']; ?>">
		            </div>
		            <div class="col-sm-4 col-lg-4">
		         		<input type="text" name="cellphone" placeholder="Celular"  class="form-control input-lg" value="<?php echo @$this -> details['cellphone']; ?>">
		            </div>
		            <div class="col-sm-6 col-lg-6">
		            	<input type="text" name="studiesplace" placeholder="Lugar de Estudio"  class="form-control input-lg" value="<?php echo @$this -> details['studiesplace']; ?>">
		            </div>
		            <div class="col-sm-6 col-lg-6">
		            	<select name="studies" class="form-control input-lg" required>
		            		<option value="" disabled selected>Selecciona...</option>
		            		<option value="Primaria">Primaria</option>
		            		<option value="Bachiller">Bachiller</option>
		            		<option value="Medio">Medio</option>
		            		<option value="TSU">TSU</option>
		            		<option value="Universitario">Universitario</option>
		            		<option value="Otro">Otro</option>
		            	</select>
		            </div>
				
		  
					 			                
		                <div class="clearfix"></div>
		                
		                <input type="button" name="next" class="next btn" value="Siguiente »">
		                 
		            </fieldset>
		            
		            <!-- PASO 3 -->  
					<fieldset id="registration-step2">	
		            	<div class="col-sm-5 col-lg-5 nationality">
		            		¿Eres alérgica/o a algo?
					        <label class="radio-inline">
								<input type="radio" name="allergies" id="allergies1" value="si">
							    Si
							</label>
							<label class="radio-inline">
								<input type="radio" name="allergies" id="allergies2" value="no" required>
							  	 No
							</label>
						</div>
				        <div class="col-sm-7 col-lg-7">
				       		<input type="text" name="allergies-explaination" placeholder="Explique..." class="form-control input-lg" value="<?php echo @$this -> details['allergies-explaination']; ?>">				       		
				        </div>
				        <div class="col-sm-7 col-lg-7 nationality text-left">
		            		¿Estás bajo algún tratamiento médico?
					        <label class="radio-inline">
								<input type="radio" name="medicaltreatment" id="allergies1" value="si">
							    Si
							</label>
							<label class="radio-inline">
								<input type="radio" name="medicaltreatment" id="allergies2" value="no" required>
							  	 No
							</label>
						</div>
				        <div class="col-sm-5 col-lg-5">
				       		<input type="text" name="medicaltreatment-explaination" placeholder="Explique..." class="form-control input-lg" value="<?php echo @$this -> details['medicaltreatment-explaination']; ?>">				       		
				        </div>
				        <div class="col-sm-6 col-lg-6 nationality">
		            		¿Consumes algún medicamento regularmente?
					        <label class="radio-inline">
								<input type="radio" name="medication" id="allergies1" value="si">
							    Si
							</label>
							<label class="radio-inline">
								<input type="radio" name="medication" id="allergies2" value="no" required>
							  	 No
							</label>
						</div>
				        <div class="col-sm-6 col-lg-6">
				       		<input type="text" name="medication-explaination" placeholder="Explique..." class="form-control input-lg" value="<?php echo @$this -> details['medication-explaination']; ?>">				       		
				        </div>
				        <div class="col-sm-12 col-lg-12">
				        	<input type="text" name="sports" placeholder="¿Practicas algún Deporte?" class="form-control input-lg" value="<?php echo @$this -> details['sports']; ?>" />
				        </div>
		                 
		                
		
		               <div class="clearfix"></div>
		                <input type="button" name="previous" class="previous btn" value="« Anterior">
		                <input type="button" name="next" class="next btn" value="Siguiente »">
		              </fieldset>
		              
		                   
					  <!-- PASO 4 -->
					  
		              <fieldset id="registration-step3">
		              	<div class="seccion"><h3>Todo sobre ti</h3></div>
		                <div class="col-sm-6 col-lg-6">
				       		<input type="email" id="email" name="email" placeholder="Email" class="form-control input-lg" required value="<?php echo @$this -> details['email']; ?>">				       		
				        </div>
				        <div class="col-sm-6 col-lg-6">
				       		<input type="email" id="confirm_email" name="confirm_email" placeholder="Coloca tu Email nuevamente" class="form-control input-lg" required value="<?php echo @$this -> details['confirm_email']; ?>">				       		
				        </div>
				        <div class="col-sm-4 col-lg-4">
				       		<input type="text" name="facebook" placeholder="Facebook" class="form-control input-lg" value="<?php echo @$this -> details['facebook']; ?>">				       		
				        </div>
				         <div class="col-sm-4 col-lg-4">
				       		<input type="text" name="twitter" placeholder="@Twitter" class="form-control input-lg" value="<?php echo @$this -> details['twitter']; ?>">				       		
				        </div>
				         <div class="col-sm-4 col-lg-4">
				       		<input type="text" name="instagram" placeholder="@Instagram" class="form-control input-lg" value="<?php echo @$this -> details['instagram']; ?>">				       		
				        </div>
				        <div class="col-sm-3 col-lg-3">
				       		<input type="text" name="height" placeholder="Tu altura" class="form-control input-lg" value="<?php echo @$this -> details['height']; ?>">				       		
				        </div>
				        <div class="col-sm-3 col-lg-3">
				       		<input type="text" name="shoe" placeholder="Talla Calzado" class="form-control input-lg" value="<?php echo @$this -> details['shoe']; ?>">				       		
				        </div>
				        <div class="col-sm-3 col-lg-3">
				       		<input type="text" name="size" placeholder="Talla Blusa" class="form-control input-lg" value="<?php echo @$this -> details['size']; ?>">				       		
				        </div>
				        <div class="col-sm-3 col-lg-3">
				       		<input type="text" name="size-pants" placeholder="Talla Pantalon" class="form-control input-lg" value="<?php echo @$this -> details['size-pants']; ?>">				       		
				        </div>
				        <div class="col-sm-12 col-lg-12">
				       		<textarea name="buzz" class="form-control" placeholder="¿Cómo te enteraste de Nosotros?"><?php echo @$this -> details['buzz']; ?></textarea>
			            </div>
						<div class="clearfix"></div>
		                <input type="button" name="previous" class="previous btn" value="« Anterior">
		                <input type="button" name="next" class="next btn" value="Siguiente »">
		             </fieldset>
		                
		              	<!-- PASO 5 -->
		             <fieldset id="registration-step4">
		            	<div class="seccion"><h3>Datos de tu Representante</h3></div>
				        <div class="col-sm-12 col-lg-12">
				        	<input type="text" name="parent-name" placeholder="Nombre Completo" required="required" class="form-control input-lg" value="<?php echo @$this -> details['parent-name']; ?>">			                
				        </div> 				       
				        <div class="col-sm-2 col-lg-2 nationality">
					        <label class="radio-inline">
								<input type="radio" name="parent-nationality" id="nac1" value="V" checked>
							    V
							</label>
							<label class="radio-inline">
								<input type="radio" name="parent-nationality" id="nac2" value="E">
							  	 E
							</label>
						</div>
				        <div class="col-sm-4 col-lg-4">
				       		<input type="text" name="parent-cedula" placeholder="Cédula" required="required" class="form-control input-lg" value="<?php echo @$this -> details['parent-cedula']; ?>">
				       		
				        </div>
				        <div class="col-sm-4 col-lg-4">
			         		<input type="email" name="parent-email" placeholder="Email" required="" class="form-control input-lg" value="<?php echo @$this -> details['parent-email']; ?>">
			            </div>
				       
				       	<div class="col-sm-6 col-lg-6">
				       		<input type="text" name="parent-workplace" placeholder="Lugar de Trabajo" class="form-control input-lg" value="<?php echo @$this -> details['parent-workplace']; ?>">
				       	</div>
				       	<div class="col-sm-6 col-lg-6">
				       		<input type="text" name="parent-job" placeholder="Cargo" class="form-control input-lg" value="<?php echo @$this -> details['parent-job']; ?>">
				       	</div>
				       
			            <div class="col-sm-4 col-lg-4">
			         		<input type="text" name="parent-cellphone" placeholder="Celular"  class="form-control input-lg" value="<?php echo @$this -> details['parent-cellphone']; ?>">
			            </div>			            
			            <div class="col-sm-4 col-lg-4">
			         		<input type="text" name="parent-phonenumber" placeholder="Teléfono Oficina"  class="form-control input-lg" value="<?php echo @$this -> details['parent-phonenumber']; ?>">
			            </div>
				        <div class="clearfix hidden-xs"></div>
				        
				        
				        <div class="col-sm-6 col-lg-6">
				        	¿Desea Factura Jurídica?
					        <label class="radio-inline">
								<input type="radio" name="factura" id="factura1" value="si">
							    SI
							</label>
							<label class="radio-inline">
								<input type="radio" name="factura" id="factura2" value="no">
							  	NO
							</label>
						</div>
						<div class="clearfix hidden-xs"></div>
						<div id="factura-juridica" class="collapse" style="height: auto;">
							<div class="col-sm-4 col-lg-4">
				        	<input type="text" name="parent-factura" required placeholder="Factura Jurídica a Nombre de:" class="form-control input-lg" value="<?php echo @$this -> details['parent-factura']; ?>">			                
					        </div> 
					         <div class="col-sm-4 col-lg-4">
					       		<input type="text" name="parent-rif" required placeholder="RIF" class="form-control input-lg" value="<?php echo @$this -> details['parent-rif']; ?>">
					       	</div>
					       	<div class="col-sm-12 col-lg-12">
					       		<textarea name="parent-legaladdress" required class="form-control" placeholder="Dirección Fiscal"><?php echo @$this -> details['parent-legaladdress']; ?></textarea>
				            </div>
						</div>
				        
				        
				        
		                <div class="clearfix"></div>
		                <input type="button" name="previous" class="previous btn" value="« Anterior">
		                <input type="submit" name="submit" class="btn btn-success" value="Listo!">
		                    
		              </fieldset>
		        	</form>
		        	<div class="clearfix">&nbsp;</div>
	</div>
	<div id="response"></div>
	