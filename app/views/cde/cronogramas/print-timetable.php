<?php $this->render('cde/cronogramas/warning-header'); ?>
<div style="background:white;">
	<div class="col-lg-2 col-xs-2">
	</div>	
	<div class="col-lg-8 col-xs-8" style="overflow-y: auto;height: 600px;">
		<div id="printable-area" class="print-documentation" style="background:white; border: 3px solid #585870;height: 100%">
			
			<div style="height:1cm"></div>
			
			<div class="col-lg-6 col-xs-6">
				<img src="<?php echo IMAGES; ?>modelsview-logo-planilla.jpg" class="img-responsive" />
			</div>
			
			<div class="col-lg-6 col-xs-6">
				<div class="col-lg-12 col-xs-12 upper" style="font-size: initial;">
					<p>  Profesor: <?php echo $this->profesor[0]['name'].' '.$this->profesor[0]['lastname']; ?></p>
		            <p>   Materia: <?php echo $this->activities[0]['nombre_materia']; ?></p>  
		            <p>   Periodo: </p>     
				</div>
			</div>
			<br>
			<br>
			
			<div class="col-lg-12 col-xs-12" style="text-align:center">
				<strong><h1>Actividades</h1><br></strong>
			</div>
	
			<div class="col-lg-12 col-xs-12">
				<div class="col-lg-12 col-sm-12 "></div>

				
						<div class="col-lg-12 col-sm-12" id="cronograma-edit" style="overflow-y: hidden;height: 100%;">  
						<?php 
						  
						    $i =1; 
						    foreach ($this->activities as $activity)
						    { ?>
						    	<div>
						      		<h4 class="text-right"><small>Editado el <?php echo fecha($activity['lastupdate'], "d/m/Y h:i"); ?></small> CLASE <?php echo $i; ?></h4>
							      	<hr style="border-top: 1px solid #585870;">
							      	<h5><?php echo $activity['nombre_evaluacion']; ?></h5>
							      	<h5><?php echo $activity['descripcion']; ?> </h5>
						    	</div>
						  		<?php 
						    $i++;

						    } 
						   
						?>
					</div>
			</div>
			<p>&nbsp;</p>
		</div>
	</div>

	<div class="col-lg-2 col-xs-2">	</div>
</div>



<script type="text/javascript">
	function printdocs()
	{
		$('#printable-area').printArea();
	}
</script>