

<div style="background: rgba(112, 110, 154, 0.71); height:100%; ">
		
		<form id="complete-registration-cde" method="post" novalidate="novalidate" class="stepform">
		 	<!-- Info del profesor -->
		 	<br><br> 

	 	<fieldset id="registration-step1">
            
            <input type="hidden" name="tipo" required="required" value="nuevoperiodo">                     
            <input type="hidden" name="parte1" required="required" value="parte1">                     
     

		        <div class="seccion"><h3>Profesores Activos</h3></div>
		          <div class="row">
		        

		      

		                  <div class="col-sm-6 col-lg-6">
		             		<h3>Profesores</h3>
		                  		<div class="row">
		                  		<?php foreach ($this->profesores as $profesor) 
		                  		{
		                  			
		                  		?>	
			                  		<div class="col-sm-12 col-lg-12">  

			                  				<input type="radio" name="prosefor" id="<?php echo $profesor['nombre_profesor'];?>" value="<?php echo $profesor['id'];?>"><?php echo $profesor['nombre_profesor'];?>

			                  		</div>	

			                  		<?php 

		                  		}

		                  		?>


		                  			 </div>
		                  		</div>	 
		                 

		                   <div class="col-sm-6 col-lg-6">
		             				<h3>Cursos</h3>
		                  				<div class="row">
					                  		<?php foreach ($this->materias as $materias) 
					                  		{
					                  			
					                  		?>	
						                  		<div class="col-sm-12 col-lg-12">  

						                  				<input type="radio" name="curso" id="<?php echo $materias['name'];?>" value="<?php echo $materias['id_courses'];?>"><?php echo $materias['name'];?>

						                  		</div>	

						                  		<?php 

					                  		}

					                  		?>


		                  			 </div>
		                  			

		            		 </div>

		            </div>
		                 	
		             

		 
		                                                  
		                        <div class="clearfix"></div>
		                        <br>   <input type="button" name="next" class="next btn" value="Siguiente »">
		                      
		                        <!--input type="button" name="cancelar" class="next btn" value="- Cancelar -"-->
		        </fieldset>	









			<!--fieldset id="registration-step2">
						<div class="seccion"><h3>DATOS</h3></div> 
							<input type="hidden" name="tipo" required="required" value="profesor">			                
					        
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
					        <div class="col-sm-6 col-lg-6">
					       		<input type="text" name="cedula" placeholder="Cédula" required="required" class="form-control input-lg" value="<?php echo @$this -> details['cedula']; ?>" >
					       		
					        </div>
					        <div class="clearfix hidden-xs"></div>
					        <div class="col-sm-4 col-lg-6">
					       		<input type="text" name="birthplace" placeholder="Lugar de Nacimiento" required="required" class="form-control input-lg" value="<?php echo @$this -> details['birthplace']; ?>">
						    </div>
					        <div class="col-sm-4 col-lg-6">
					      	 	<input type="text" name="birthdate" placeholder="Fecha Nacimiento" required class="form-control input-lg datetimepicker left" value="<?php echo @$this -> details['birthdate']; ?>"/>
								<i class="glyphicon glyphicon-calendar add-on right"></i>
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

	
				  		 			                
				                <div class="clearfix"></div>
				                <br>
				                <input type="submit" name="submit" class="btn btn-success send" value="Listo!">
		                 		<input type="button" name="cancelar" class=" btn" value="- Cancelar -">
		         </fieldset-->
		      
		           
		</form>
		        	<div class="clearfix">&nbsp;</div>
	</div>
	<div id="response"></div>

