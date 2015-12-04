<div style="background: rgba(112, 110, 154, 0.71); height:100%; ">
		
		<form id="complete-registration-cde" method="post" novalidate="novalidate" class="stepform">

		 	<!-- Info del profesor -->
		 	<br><br>
			<fieldset id="registration-step1">
						<div class="seccion"><h3>Agregar Materia </h3></div> 
					        <input type="hidden" name="tipo" required="required" value="materia">			                

							<div class="col-sm-6 col-lg-6">
					        	<input type="text" name="name" placeholder="Nombre" required="required" class="form-control input-lg" value="<?php echo @$this -> details['name']; ?>">			                
					        </div> 
					        <div class="col-sm-6 col-lg-4">
					        	<input type="text" name="codigo" placeholder="Codigo" required="required"  class="form-control input-lg" value="<?php echo @$this -> details['lastname']; ?>">			                
					        </div>
					      
					        <div class="clearfix hidden-xs"></div>
					       
					        <div class="col-sm-12 col-lg-12">
					       		<textarea name="descripcion" class="form-control" placeholder="Descripción" required="required"><?php echo @$this -> details['address']; ?></textarea>
				            </div>
				           

				            <div class="col-sm-6 col-lg-6">
				            	<select name="courses" class="form-control input-lg" required="required">
				            		<option value="" disabled selected>Curso</option>
				            		<?php $course_lists  = $this -> course_lists; 

				            			foreach ($course_lists  as $course_list  ) 
				            			{  ?>       				
				    							
				            				<option value="<?php echo $course_list['id_courses']; ?>"><?php echo $course_list['name']; ?></option>
				            				
	
				            	  <?php } ?> 	

				            						            	
				            	</select>
				            </div>

							 <div class="col-sm-6 col-lg-6">
				            	<select name="trimestre" class="form-control input-lg" required="required">
				            		<option value="" disabled selected>Trimestre</option>
				            		

				            		<option value="1"> 1er Trimestre </option>
				            		<option value="2"> 2do Trimestre </option>
				            		<option value="3"> 3er Trimestre </option>
				            		<option value="4"> 4to Trimestre </option>
				            		<option value="5"> 5to Trimestre </option>
				            		
				            	
				            	</select>
				            </div>
				  		 			                
				                <div class="clearfix"></div>
				              
				               <br>
				                <input type="submit" name="submit" class="btn btn-success send" value="Listo!">
		                 		<input type="button" name="cancelar" class=" btn" value="- Cancelar -">
		         </fieldset>
		      
		           
		</form>
		        	<div class="clearfix">&nbsp;</div>
	</div>
	<div id="response"></div>
	