<div class="col-lg-12 col-sm-12 well">
		<!--?php echo $this->courseinfo[0]['step1_instructions']; ?-->
       
      <div class="col-lg-12">

           <?php $slug = $this-> slug;
              
            if($slug=='Model Look INFANTIL')
            { ?> 
               <div class="col-lg-6">
                 
                  <a href="<?php echo IMAGES; ?>courses/model-look/Cronograma_infantil_matutino-01.jpg" download>
                     <img class="img-responsive" src="<?php echo IMAGES; ?>courses/model-look/Cronograma_infantil_matutino-01.jpg" alt="Cronograma_infantil_matutino-01" >
                  </a>
             
               
                  <a href="<?php echo IMAGES; ?>courses/model-look/Cronograma_infantil_vespertino-01.jpg" download>
                     <img class="img-responsive" src="<?php echo IMAGES; ?>courses/model-look/Cronograma_infantil_vespertino-01.jpg" alt="Cronograma_infantil_vespertino-01" >
                  </a>

              </div>
            <?php }
              else
              { ?>

              <div class="col-lg-6">  
                  <a href="<?php echo IMAGES; ?>courses/model-look/Cronograma_juvenil_matutino-01.jpg" download>
                     <img class="img-responsive" src="<?php echo IMAGES; ?>courses/model-look/Cronograma_juvenil_matutino-01.jpg" alt="Cronograma_infantil_matutino" >
                  </a>
                  </div>
              <div class="col-lg-6">

                  <a href="<?php echo IMAGES; ?>courses/model-look/Cronograma_juvenil_vespertino-01.jpg" download>
                     <img class="img-responsive" src="<?php echo IMAGES; ?>courses/model-look/Cronograma_juvenil_vespertino-01.jpg" alt="Cronograma_infantil_vespertino" >
                  </a>
              </div>
              </div>
            <?php
              }
             ?>
        </div>

	
</div>

