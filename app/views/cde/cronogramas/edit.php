<?php $this->render('cde/cronogramas/identifier'); ?>
<div class="col-lg-12 col-sm-12">
  <button  class="btn btn-info btn-main" id="button-print-cronograma" onclick="printdocs()" ><i class="fa fa-print add-fa" ></i> Imprimir</button>
</div>

<?php if($this->activities[0]['status'] == 'pending'){  ?>
  <div class="actions-float">
    <button type="button" title="Aprobar" class="btn btn-success btn-circle action-approve showtooltip" data-cronograma="<?php echo $this->activities[0]['id_cronograma']; ?>" id="<?php echo $this->activities[0]['id_cronograma']; ?>" data-element="cronogramas"><i class="glyphicon glyphicon-ok"></i></button>

    <button type="button" title="Rechazar" class="btn btn-danger btn-circle action-reject showtooltip" data-cronograma="<?php echo $this->activities[0]['id_cronograma']; ?>" data-element="cronogramas"><i class="glyphicon glyphicon-remove"></i></button>  
  </div>
<?php }  ?>

<div class="col-lg-2 col-sm-2"></div>
<div class="col-lg-8 col-sm-8">
  <div class="materia-ficha">
    <h2><?php echo $this->activities[0]['nombre_materia']; ?></h2>
  </div>
</div>

<div class="col-lg-12 col-sm-12 "></div>

<div class="col-lg-2 col-sm-2"></div>
<div class="col-lg-8 col-sm-8" id="cronograma-edit">  
  <?php 
  
    $i =1; 
    foreach ($this->activities as $activity){ ?>
    <div class="activities">
      <h4 class="text-right"><small>Editado el <?php echo fecha($activity['lastupdate'], "d/m/Y h:i"); ?></small> CLASE <?php echo $i; ?></h4>
      <hr>
      <p><?php echo $activity['nombre_evaluacion']; ?></p>
      <p><?php echo $activity['descripcion']; ?> </p>
    </div>
  <?php 
    $i++; 
    } 
 
    ?>
</div>
<div class="col-lg-2 col-sm-2"></div>
<!--Area de impresion  -->
  <div style="background:white;height: 100%;display:none;">
      <div id="printable-area" class="print-documentation" style="background:white; border: 3px solid #585870;height: 100%;">
        
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
          <strong><h1>Cronograma de actividades</h1><br></strong>
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
<script type="text/javascript">
    function printdocs()
    {
      $('#printable-area').printArea();
    }
 </script> 
 <!-- fin del Area de impresion  -->
 
<?php $this->render('cde/cronogramas/modal-loadarea'); ?>
<?php $this->render('cde/cronogramas/confirm-reject'); ?>
<?php $this->render('cde/cronogramas/confirm-approve'); ?>
