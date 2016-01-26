<?php $this->render('cde/cronogramas/identifier'); ?>

<div class="col-lg-12 col-sm-12">
  <a  class="btn btn-info btn-main" id="button-print-cronograma" href="#documentation/<?php echo $this->activities[0]['id_cronograma']; ?>"><i class="fa fa-print add-fa" ></i> Imprimir</a>
</div>
<div class="actions-float">
  <button type="button" title="Aprobar" class="btn btn-success btn-circle action-approve showtooltip" data-cronograma="<?php echo $this->activities[0]['id_cronograma']; ?>" id="<?php echo $this->activities[0]['id_cronograma']; ?>" data-element="cronogramas"><i class="glyphicon glyphicon-ok"></i></button>

  <button type="button" title="Rechazar" class="btn btn-danger btn-circle action-reject showtooltip" data-cronograma="<?php echo $this->activities[0]['id_cronograma']; ?>" data-element="cronogramas"><i class="glyphicon glyphicon-remove"></i></button>  
</div>

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
  //  print_r($this->activities);
    ?>
</div>
<div class="col-lg-2 col-sm-2"></div>
<?php $this->render('cde/cronogramas/modal-loadarea'); ?>
<?php $this->render('cde/cronogramas/confirm-reject'); ?>
<?php $this->render('cde/cronogramas/confirm-approve'); ?>
