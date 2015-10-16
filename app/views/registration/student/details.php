<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">

			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
				&times;
			</button>
		</div>
		<div class="modal-body">

			<!-- Detail goes here -->
			<div class="col-lg-6 col-sm-6 col-xs-12"><h3><?php echo $this->details['name'] . " " . $this->details['lastname']; ?></h3></div>
			<div class="col-lg-6 col-sm-6 col-xs-12"><span class="badge pull-right"><h4>Ficha #<?php echo $this -> registration[0]['id']; ?></h4></span>	</div>
			<div class="clearfix"></div>

			<?php
			foreach ($this->details as $key => $value) {

				switch ($key) {
					case 'name' :
						$ficha_personal['name'] = $value;
						break;
					case 'lastname' :
						$ficha_personal['lastname'] = $value;
						break;
					case 'lastname' :
						$ficha_personal[$key] = $value;
						break;

					default :
						//	echo $key.": ". $value."<br>";
						break;
				}

			}
			?>

			
			
			<ul class="nav nav-tabs">
			  <li class="active"><a href="#home" data-toggle="tab"><i class="fa fa-user"></i> Datos Personales</a></li>
			  	<?php if (!empty($this->details)) { ?>
			  		<li><a href="#profile" data-toggle="tab"><i class="fa fa-graduation-cap"></i> Inscripción </a></li>
			 	 <?php } ?>
			 	 <?php	if (!empty($this->details_payment)) { ?>
			 	 	<li><a href="#messages" data-toggle="tab"><i class="fa fa-money fa-lg"></i> Información de Pago</a></li>
			 	 <?php } ?>
			 	 
			</ul>
			
			<!-- Tab panes -->
			<div class="tab-content">
			  <div class="tab-pane active" id="home">
			  	<br>
			  	<div class="col-lg-6 col-sm-6 col-xs-12">
					<i class="fa fa-phone"></i> <?php echo $this->details['phonenumber']; ?><br>
					<i class="fa fa-mobile"></i> <?php echo $this->details['cellphone']; ?><br>
					<i class="fa fa-envelope-o"></i> <?php echo $this->details['email']; ?><br>
				</div>
				<div class="col-lg-6 col-sm-6 col-xs-12">
					<i class="fa fa-facebook"></i> <?php echo $this->details['facebook']; ?><br>
					<i class="fa fa-twitter"></i> <?php echo $this->details['twitter']; ?><br>
					<i class="fa fa-instagram"></i> <?php echo $this->details['instagram']; ?><br>
				</div>
			  	
			  </div>
			  <?php if (!empty($this->details)) { ?>
			  <div class="tab-pane" id="profile">
			  	<br>
			  	
			  	<!--div class="col-lg-6 col-sm-6 col-xs-12">
					<i class="fa fa-phone"></i> <?php echo $this->details['phonenumber']; ?><br>
					<i class="fa fa-mobile"></i> <?php echo $this->details['cellphone']; ?><br>
					<i class="fa fa-envelope-o"></i> <?php echo $this->details['email']; ?><br>
				</div>
				<div class="col-lg-6 col-sm-6 col-xs-12">
					<i class="fa fa-facebook"></i> <?php echo $this->details['facebook']; ?><br>
					<i class="fa fa-twitter"></i> <?php echo $this->details['twitter']; ?>	<br>
					<i class="fa fa-instagram"></i> <?php echo $this->details['instagram']; ?><br>
				</div-->
			  	
			  	<?php echo $this->details['course_available_group_id']; ?>
						<?php
							foreach ($this->details as $key => $value) {
								echo $key . ": " . $value . "<br>";
					}
				?>	
					    		
				
			  </div>
			   <?php } ?>
			  <?php	if (!empty($this->details_payment)) { ?>
			  <div class="tab-pane" id="messages">
			  	<br>
			  	<h4><?php echo $this->details_payment['payment-form']; ?> # <?php echo $this->details_payment['payment-number']; ?></h4>
					    		
					<strong><?php echo dineroFormat($this->details_payment['payment-amount']); ?></strong><br>
					<i class="fa fa-bank"></i> <?php echo $this->details_payment['payment-bank']; ?><br>
					    			<i class="fa fa-calendar"></i> <?php echo $this->details_payment['payment-date']; ?>
					    			<hr>
					    			<?php switch( $this->registration[0]['status']) {
											case 'clearpayment': ?>
												<button title="Aprobar Pago" data-element="registrations" data-registration="<?php echo $this -> registration[0]['id']; ?>" data-toggle="modal" data-target="#confirm-approve" type="button" class="btn btn-sm btn-success action-approve pull-right">Aprobar Pago <i class="glyphicon glyphicon-ok"></i></button>
												
									<?php 		break;
											case 'approved': ?>											
									<?php
												
												break;
					    			}
					    			
					    			?>
				
			  </div>
			  <?php } ?>
			</div>
			
			<div class="clearfix"></div>
			
			<!--div class="panel-group" id="accordion">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#tab-info"><i class="fa fa-user"></i> Datos Personales <span class="caret"></span></a></h4>
						
					</div>
					<div id="tab-info" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="col-lg-6 col-sm-6 col-xs-12">
								<i class="fa fa-phone"></i> <?php echo $this->details['phonenumber']; ?><br>
								<i class="fa fa-mobile"></i> <?php echo $this->details['cellphone']; ?><br>
								<i class="fa fa-envelope-o"></i> <?php echo $this->details['email']; ?><br>
							</div>
							<div class="col-lg-6 col-sm-6 col-xs-12">
								<i class="fa fa-facebook"></i> <?php echo $this->details['facebook']; ?><br>
								<i class="fa fa-twitter"></i> <?php echo $this->details['twitter']; ?><br>
								<i class="fa fa-instagram"></i> <?php echo $this->details['instagram']; ?><br>
							</div>
							
							
						</div>
					</div>
				</div>
				<?php	if (!empty($this->details)) { ?>
				<div  class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title"><i class="fa fa-graduation-cap"></i> <a data-toggle="collapse" data-parent="#accordion" href="#tab-registration"> Inscripción <span class="caret"></span></a></h4>
					</div>
					<div id="tab-registration" class="panel-collapse collapse">
						<div class="panel-body">
							
						<?php echo $this->details['course_available_group_id']; ?>
								<?php
							/*foreach ($this->details as $key => $value) {
								echo $key . ": " . $value . "<br>";
							}*/
							?>	
					    		
							
						</div>
					</div>
				</div>	
				<?php } ?>
						
			</div-->
		</div>
	</div>
</div>
