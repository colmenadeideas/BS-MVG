<?php $pensumActivos = $this->pensumActivos;     ?>
<?php $pensumInactivos = $this->pensumInactivos;     ?>
<div  class="col-lg-12 col-md-12 col-xs-12">
                 
    <form id="periodo" name="periodo" method="post" action='' novalidate="novalidate" class="stepform">
      <?php $i = 0;
        $periodo = 'periodo-step';

       if (!empty($pensumActivos)) 
       {
          foreach ($pensumInactivos as $activos) 
          {?>
              <fieldset id='<?php echo $periodo.$i;?>'>
               <div class="seccion"> <h3> Asignar Pensum </h3> </div> 
                  


              </fieldset>
    <?php }
       }
      ?>

      
  
    </form>
              <div class="clearfix">&nbsp;</div>
  </div>
  <div id="response"></div>
