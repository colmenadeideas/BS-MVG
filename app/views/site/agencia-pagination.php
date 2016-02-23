<input name="pagination" value="<?php echo $this->last_row;?>" type="hidden">

<?php foreach ($this->models as $Model) { ?>
	<article class="col-lg-6 col-md-6 col-sm-6 model-item">	
		<div id="<?php echo create_slug(strtolower($Model['name']."-".$Model['lastname'][0])); ?>" class="col-lg-6 col-md-6 col-sm-6 nopadding">
			 <img src="<?php echo IMAGES; ?>modelos/<?php echo create_slug(strtolower($Model['name']."_".$Model['lastname'])); ?>/01.jpg" 
			 	title="<?php echo $Model['name']." ".$Model['lastname'][0]; ?>" 
			 	alt="<?php echo $Model['name']." ".$Model['lastname'][0]; ?>" 
			 	class="img-responsive" />
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 nopadding">


			<div id="<?php echo create_slug(strtolower($Model['name']."-".$Model['lastname'][0])); ?>-portfolio" class="carousel slide carousel-fade col-lg-12 nopadding">
			  

			        <?php
			        $id_indicator = create_slug(strtolower($Model['name']."-".$Model['lastname'][0]))."-portfolio"; 
					$imagen = $Model['name']."_".$Model['lastname'];
					$imagen = preg_replace('`&[^;]+Ã­;`','',htmlentities($imagen));
					FilesInDir(strtolower($imagen)); ?>
			   
				<a class="left carousel-control" href="#<?php echo create_slug(strtolower($Model['name']."-".$Model['lastname'][0])); ?>-portfolio" data-slide="prev">
			       <img src="<?php echo IMG; ?>leftarrow.png" />
			    </a>
			    <a class="right carousel-control" href="#<?php echo create_slug(strtolower($Model['name']."-".$Model['lastname'][0])); ?>-portfolio" data-slide="next">
			        <img src="<?php echo IMG; ?>rightarrow.png" />
			    </a>
			    

			</div>

		</div>

		<div class="info">
			<div class="col-lg-4 col-md-4 col-sm-4 ">
				<h3><?php echo $Model['name']." ".$Model['lastname'][0]; ?></h3>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8 model-metadata">
				 <?php 
					
					$talla = replo($Model['size']);
					$pantalon = replo($Model['pants']);
					$calzado= replo($Model['shoe']);
					$ojos = replo($Model['eyes']);
					$piel = replo($Model['skin']);
					
					if ($Model['height'] !='') echo "Estatura &nbsp;&nbsp;&nbsp;". $Model['height']. "<br/> ";
					if ($Model['bust'] !='') echo "Medidas &nbsp;&nbsp;&nbsp;". $Model['bust']."-".$Model['waist']."-".$Model['hips']."<br/> ";
					//if ($calzado !='') echo "Calzado &nbsp;&nbsp;&nbsp;". $calzado. "<br/> ";
					echo "Cabello &nbsp;&nbsp;&nbsp;". $Model['hair']. "<br/> ";
					if ($ojos !='') echo "Ojos &nbsp;&nbsp;&nbsp;". $ojos. "<br/> ";
					//if ($piel !='') echo "Piel &nbsp;&nbsp;&nbsp;". $piel. "<br/> ";
				?>
			</div>
		</div>

	</article>	
<?php } // end foreach ?>
