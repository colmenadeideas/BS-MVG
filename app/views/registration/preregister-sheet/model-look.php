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
		 	<fieldset class="pensum-costos">
		 		
		 			
		 			<div class="col-lg-12 col-md-12">
						<img src="<?php echo IMAGES . "courses/" . $this -> course[0]['slug']; ?>/info.jpg" class="img-responsive" style="margin:auto" ><br>
					</div>
		 			<div class="col-lg-7 col-md-7 row">
			 			<img class="img-responsive" src="<?php echo IMAGES; ?>courses/<?php echo $this -> course[0]['slug']; ?>/pensum.jpg">	 		
					</div>
					<div class="col-lg-5 col-md-5 pensum-costos">
			 			<h2><?php echo $this->course[0]['name'];?></h2>
			 			<?php echo $this -> course[0]['duration_payment_details']; ?>
			 			
			 			<p></p><br>
			 			<h4>PROXIMAS FECHAS</h4>
			 			
				 			<select name="course_available_group_id" class="input-lg" required>
						        <option value="" disabled selected>Selecciona..</option>
								<?php foreach($this->available_groups as $available_groups) { ?>
								<option value="<?php echo $available_groups['id']; ?>"><?php echo $available_groups['name'] . " (" . $available_groups['start_date'] . "-" . $available_groups['end_date'] . ") " . $available_groups['schedule']; ?></option>
								<?php } ?>
							</select><br><br>
			 		</div>
			 		
		 		<input type="button" name="next" class="next btn btn-info btn-lg inscributton" value="¡INSCRIBIRME! »">
		 		<br><p style="color:black !important;text-align: center;">El pensum esta sujeto a cambio sin previo aviso</p>
		 		
		 		
		 		
		 					 		
				<div class="clearfix"></div>
		        
		                
		 	</fieldset>
		 	<!-- PASO 2 -->
			<fieldset id="registration-step1">
				<div class="seccion"><h3>DATOS PERSONALES </h3></div> 
				
					<div class="col-sm-6 col-lg-6">
			        	<input type="text" name="name" placeholder="Nombres del niñ@" required="required" class="form-control input-lg">			                
			        </div> 
			        <div class="col-sm-6 col-lg-6">
			        	<input type="text" name="lastname" placeholder="Apellidos del niñ@" required="required"  class="form-control input-lg">			                
			        </div>
			       
			        <div class="col-sm-4 col-lg-4">
		         		<input type="text" name="phonenumber" placeholder="Teléfono Habitación" class="form-control input-lg" required>
		            </div>
		            <div class="col-sm-4 col-lg-4">
		         		<input type="text" name="cellphone" placeholder="Celular"  class="form-control input-lg" required>
		            </div>
		            <div class="col-sm-6 col-lg-6">
				       		<input type="email" id="email" name="email" placeholder="Email de Representante" class="form-control input-lg" required>				       		
				    </div>
				    <div class="col-sm-6 col-lg-6">
				       		<input type="email" id="confirm_email" name="confirm_email" placeholder="Coloca tu Email nuevamente" class="form-control input-lg" required>				       		
				     </div>
				     
				        
				     <div class="col-sm-12 col-lg-12">
				       		<textarea name="buzz" class="form-control" placeholder="¿Cómo te enteraste de Nosotros?"></textarea>
			        </div>
			        
			        <div class="col-sm-12 col-lg-12 bg-success">
			        	<div class="col-sm-6 col-lg-6">
			        		<br>Refiere a una amiga y si tu amiga se inscribe <br><strong> ¡Recibes un 15% de descuento!</strong>
			        	</div>
			        	<div class="col-sm-6 col-lg-6"><br>
				       		<input type="email" id="referal" name="referal" placeholder="" class="form-control input-lg">
				       	</div>
				       	
				       
				       	<input type="hidden" id="referred" name="referred" value="<?php echo $_GET['referred']; ?>">
				       	<input type="hidden" id="referalid" name="referalid" value="<?php echo $_GET['referalid']; ?>" >
				       	<input type="hidden" id="code" name="code" value="<?php echo $_GET['code']; ?>" >
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