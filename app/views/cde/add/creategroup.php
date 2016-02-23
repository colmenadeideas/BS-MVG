<?php $pensumActivos = $this->pensumActivos;    ?>
<?php $pensumInactivos = $this->pensumInactivos;  print_r($pensumInactivos);   ?>
<?php $materias = $this->materias;     ?>



<fieldset id="periodo-step2">
  <?php foreach ($pensumActivos as $activos ) 
{ ?>
   <div class="container">
           <div class="well col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2" style="margin-left: 0px;">
              

                  <div class="row user-row">
                      <div class="col-xs-3 col-sm-2 col-md-1 col-lg-1">
                          <img class="img-responsive img-circle" src="<?php echo IMAGES; ?>courses/<?php echo $activos[0]['slug']; ?>/course.jpg"  alt="User Pic">
                      </div>
                      <div class="col-xs-8 col-sm-9 col-md-10 col-lg-10">
                          <strong><?php echo $activos[0]['slug']; ?></strong><br>
                          <span class="text-muted">Pensum: Disponible </span>
                      </div>
                      <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 dropdown-user" data-for=".<?php echo $activos[0]['slug']; ?>">
                          <i class="glyphicon glyphicon-chevron-down text-muted"></i>
                      </div>
                  </div>

                  <div class="row user-infos <?php echo $activos[0]['slug']; ?>">
                      <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1">
                      <input type="radio" name="<?php echo $activos[0]['slug'].'[]';?>" value="actual" checked><p>Pensum actual   <span data-toggle="collapse" data-target="#<?php echo $activos[0]['slug'].'1'; ?>"> Ver mas</span></p>
                         <div id="<?php echo $activos[0]['slug'].'1'; ?>" class="collapse">
                              <div class="panel panel-primary">
                              <div class="panel-heading">
                                  <h2 class="panel-title">Informacion del pensum actual </h2>
                              </div>
                              <div class="panel-body">
                                  <div class="row">
                                      <div class="col-md-2 col-lg-2 hidden-xs hidden-sm">
                                         <img class="img-responsive img-circle" src="<?php echo IMAGES; ?>courses/<?php echo $activos[0]['slug']; ?>/course.jpg"  alt="User Pic">
                                      </div>
                                      <div class=" col-md-10 col-lg-10">
                                          <strong><?php echo $activos[0]['slug']; ?></strong><br>
                                          <table class="table table-user-information">
                                            <tbody>
                                              <tr>
                                                  <td>Codigo</td>
                                                  <td>Materia</td>
                                                  <td>Descripcion</td>
                                                  <td>Trimestre</td>
                                              </tr>

                                          <?php foreach ($activos as $act) 
                                          {?> <tr>
                                                 <td><?php echo $act['id_materia']     ?> </td>
                                                 <td><?php echo $act['nombre_materia'] ?> </td>
                                                 <td><?php echo $act['descripcion']    ?> </td>
                                                 <td><?php echo $act['trimestre']      ?> </td>
                                               </tr>   
                                            <?php } ?>
                                            </tbody>
                                          </table>
                                      </div>
                                  </div>
                              </div>
                          </div> 
                        </div>  
                      </div>

                      <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1">
                         <input type="radio" name="<?php echo $activos[0]['slug'].'[]';?>" value="nuevo" > <p data-toggle="collapse" data-target="#<?php echo $activos[0]['slug'].'2'; ?>">Crear pensum nuevo</p>
                         <div id="<?php echo $activos[0]['slug'].'2'; ?>" class="collapse">
                              <div class="panel panel-primary">
                              <div class="panel-heading">
                                  <h2 class="panel-title">Informacion del pensum actual </h2>
                              </div>
                              <div class="panel-body">
                                  <div class="row">
                                      <div class="col-md-2 col-lg-2 hidden-xs hidden-sm">
                                         <img class="img-responsive img-circle" src="<?php echo IMAGES; ?>courses/<?php echo $activos[0]['slug']; ?>/course.jpg"  alt="User Pic">
                                      </div>
                                      <div class=" col-md-10 col-lg-10">
                                          <strong><?php echo $activos[0]['slug']; ?></strong><br>
                                          <table class="table table-user-information">
                                            <tbody>
                                              <tr>
                                                  
                                                  <td>Materia</td>
                                                  <td>Descripcion</td>
                                                  <td>Trimestre</td>
                                                  <td></td>
                                              </tr>

                                           <tr>
                                                 
                                                 <td> <input name='materia' type="text">    </td>
                                                 <td> <input name='nombre' type="text">    </td>
                                                 <td> <input name='nombre' type="text">    </td>
                        
                                                 <td><p>Guardar</p> <p>Eliminar</p></td>

                                            </tr>   
                                          <tr><td>nuevo</td></tr>
                                            </tbody>
                                          </table>
                                      </div>
                                  </div>
                              </div>
                          </div> 
                        </div>  
                      </div>
                  </div>
              </div>
          </div>
<?php }?>    


        <div class="clearfix"></div>

              <input type="button" name="previous" class="previous btn" value="« Anterior">
              <input type="button" name="next" class="next btn" value="Siguiente »">
        </form>
</fieldset>

    
  