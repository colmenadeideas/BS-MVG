

<div  class="col-lg-12 col-md-12 col-xs-12">
                
    <form id="periodo" name="periodo" method="post" action='' novalidate="novalidate" class="stepform">

      <!-- Asignacion de periodo -->
      <fieldset id="periodo-step0">
          <input type="hidden" name="tipo" required="required" value="nuevoperiodo">                     
          <input type="hidden" name="parte1" required="required" value="parte1">                     
          <div class="seccion"><h3>Registrar Nuevo Periodo </h3></div> 
            <div class="col-sm-12 col-lg-12">  
              <div class="col-sm-2 col-lg-2"> </div>              
                
                <div class="col-sm-4 col-lg-4">
                  <input type="text" name="fechaInicio" placeholder="Fecha de inicio del trimestre" required="" class="form-control input-lg datetimepicker left valid" value="<?php echo @$this -> fechaInicio['fechaInicio']; ?>">
                  <i class="glyphicon glyphicon-calendar add-on right"></i>
                 </div>   

                  <div class="col-sm-4 col-lg-4">
                    <input type="text" name="fechaFin" placeholder="Fecha de fin del trimestre" required="" class="form-control input-lg datetimepicker left valid" value="<?php echo @$this -> fechaInicio['fechaInicio']; ?>">
                    <i class="glyphicon glyphicon-calendar add-on right"></i>
                 </div>

              <div class="col-sm-2 col-lg-2"></div> 
            </div>    
            <div class="clearfix"></div>
            <br>   <input type="button" name="next" class="next btn" value="Siguiente »">
        </fieldset>

        <fieldset id="periodo-step1">  

          <div class="container col-sm-12 col-lg-12">
          
            <div class="seccion"><h3>Registrar Nuevo Periodo </h3></div> 
              <?php 
                foreach ($this->courses as $course) 
                { 
                  if ($course['estatus'] != 'Inactivo') 
                  {?>
                      <div class="col-lg-2 col-md-2 col-xs-6 text-center courses-link" style="min-height: 60px;">
                          <div class="col-sm-12 col-lg-12">
                              <input type="hidden" name="json" id="json" > 
                              <input type="checkbox" name="c[]" class="courses-link" value="<?php echo $course['id']; ?>" id="<?php echo $course['slug']; ?>" ><br>
                              <img src="<?php echo IMAGES; ?>courses/<?php echo $course['slug']; ?>/course.jpg" class="img-responsive img-circle" />   
                          </div>
                       
                        <h5><?php echo $course['name']; ?></h5> 
                        <p><?php echo $course['description']; ?></p>
                      
                      </div>    
            <?php }
                } ?>
          
          </div>

          <div class="clearfix"></div>

              <input type="button" name="previous" class="previous btn" value="« Anterior">
              <input type="submit" name="send" class="btn btn-success send" value="Asignar pensum »" >

        </fieldset>

        <!--fieldset id="periodo-step2">  
          <div class="container col-sm-12 col-lg-12">
            <div class="seccion"><h3>Registrar Nuevo Periodo </h3></div> 
              <div class="col-lg-12 col-xs-12" >
                  <button type="button" class="btn btn-info" data-toggle="collapse" style="margin: 20px;" data-target="#materias">Materias</button><br>
                    <div id="materias" class="collapse">
                      <table id="registrations-clearpayment-list" class="table table-hover" style="margin: 20px;" >
                        <tr>
                          <th width="20%">#Código</th>
                          <th width="40%">Materia</th>
                          <th width="40%">Trimestre</th>
                          
                          
                        </tr>
                        <tr>
                          <td><?php echo 'id';           ?></td>
                          <td><?php echo 'grupo';        ?></td>
                          <td><?php echo  'Pendientes';  ?></td>

                        </tr>
                      </table>  
                    </div>
                      <?php print_r($this->pensumActivos) ;        ?>    
                  </div>          
            </div>
          <div class="clearfix"></div>
          <input type="button" name="previous" class="previous btn" value="« Anterior">
          <input type="button" name="next" class="next btn" value="Siguiente »">

        </fieldset-->



    </form>
              <div class="clearfix">&nbsp;</div>
  </div>
  <div id="response"></div>
