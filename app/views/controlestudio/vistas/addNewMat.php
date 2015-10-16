<div style="background: rgba(112, 110, 154, 0.71); height:100%; ">
		
		<form id="complete-registration-materia" action="" novalidate="novalidate" class="stepform">
	 	
		 	<!-- Info del profesor -->
		 	<br><br>
			<fieldset id="registration-step1">
						<div class="seccion"><h3>Agregar Materia </h3></div> 
							<input type="hidden" name="registration_id" required="required" value="<?php echo @$this -> registration['id']; ?>">			                
					        
							<div class="col-sm-6 col-lg-6">
					        	<input type="text" name="name" placeholder="Nombre" required="required" class="form-control input-lg" value="<?php echo @$this -> details['name']; ?>">			                
					        </div> 
					        <div class="col-sm-6 col-lg-4">
					        	<input type="text" name="codigo" placeholder="Codigo" required="required"  class="form-control input-lg" value="<?php echo @$this -> details['lastname']; ?>">			                
					        </div>
					      
					        <div class="clearfix hidden-xs"></div>
					       
					        <div class="col-sm-12 col-lg-12">
					       		<textarea name="descripcion" class="form-control" placeholder="Descripción"><?php echo @$this -> details['address']; ?></textarea>
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
				            		<option value="" disabled selected>Pensum...</option>
				            		<option value="Primaria">Primaria</option>
				            		<option value="Bachiller">Bachiller</option>
				            		<option value="Medio">Medio</option>
				            		<option value="TSU">TSU</option>
				            		<option value="Universitario">Universitario</option>
				            		<option value="Otro">Otro</option>
				            	</select>
				            </div>
						
				  		 			                
				                <div class="clearfix"></div>
				                <br>
				                <input type="button" name="guardar" class="next btn" value="-Guardar-">
		                 		<input type="button" name="cancelar" class="next btn" value="-Cancelar-">
		         </fieldset>
		      
		           
		</form>
		        	<div class="clearfix">&nbsp;</div>
	</div>
	<div id="response"></div>
	