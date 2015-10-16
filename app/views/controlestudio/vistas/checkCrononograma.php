<div style="background: rgba(112, 110, 154, 0.71); height:100%; ">
		
		<form id="complete-registration-teacher" action="" novalidate="novalidate" class="stepform">
	 	
		 	<!-- Info del profesor -->
		 	<br><br> 
			<fieldset id="registration-step1">
						<div class="seccion"><h3>DATOS</h3></div> 
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
				             <div class="col-sm-4 col-lg-4">
				         		<input type="email" name="email" placeholder="@Email"  class="form-control input-lg" value="<?php echo @$this -> details['cellphone']; ?>">
				            </div>

				            <div class="col-sm-6 col-lg-6">
				            	<select name="studies" class="form-control input-lg" required>
				            		<option value="" disabled selected>Trimestre</option>
				            		<option value="Primaria">Primaria</option>
				            		<option value="Bachiller">Bachiller</option>
				            		<option value="Medio">Medio</option>
				            		<option value="TSU">TSU</option>
				            		<option value="Universitario">Universitario</option>
				            		<option value="Otro">Otro</option>
				            	</select>
				            </div>

				            <div class="col-sm-6 col-lg-6">
				            	<select name="studies" class="form-control input-lg" required>
				            		<option value="" disabled selected>Materia...</option>
				            		
				            		<?php $materias = $this -> materias; 

				            			foreach ($materias as $materia ) 
				            			{  ?>       				
				    							
				            				<option value="<?php echo $materia['nombre']; ?>"><?php echo $materia['nombre']; ?></option>
				            			
				            	  <?php } ?> 


				            	</select>
				            </div>
						
				  		 			                
				                <div class="clearfix"></div>
				                <br>
				                <input type="button" name="guardar" class="next btn" value="- Guardar -">
		                 		<input type="button" name="cancelar" class="next btn" value="- Cancelar -">
		         </fieldset>
		      
		           
		</form>
		        	<div class="clearfix">&nbsp;</div>
	</div>
	<div id="response"></div>
