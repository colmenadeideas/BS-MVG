

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
                              <input type="checkbox" name="c[]" value="<?php echo $course['id']; ?>" id="<?php echo $course['slug']; ?>" ><br>
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
              <input type="button" name="next" class="next btn" value="Asignar pensum »" >

        </fieldset>
         <fieldset id='periodo-step2'>
           
                  <?php $pensumActivos = $this->pensumActivos;     ?>
                  <?php print_r($pensumActivos);?>
                  <?php $pensumInactivos = $this->pensumInactivos;     ?>
                  <?php $band = false;     ?>
                   <div class="seccion"> <h3 style="margin-bottom: 30px;" >  <?php echo $activos[0]['slug']; ?>  </h3> </div> 
                      <div class="col-sm-12 col-lg-12" style="margin-bottom: 40px;"> 
                        <h4>Seleccione o modifique el pensum</h4>
                          <div  class="col-lg-6 col-md-6 col-xs-6">
                            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Ver materias del pensum actual </button>
                          </div> 
                          <div  class="col-lg-6 col-md-6 col-xs-6">
                            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo1">Agregar un nuevo pensum</button>
                          </div> 

                              <div id="demo" class="collapse">

                                  <table  class="table table-hover table-list dataTable" >
                                    <thead>
                                      <tr>
                                        <th width="20%" style="text-align: center;"> Codigo       </th>
                                        <th width="30%" style="text-align: center;"> Materia      </th>
                                        <th width="30%" style="text-align: center;"> Descripcion  </th>
                                        <th width="30%" style="text-align: center;"> Trimestre    </th>
                                      </tr>  
                                    </thead>
                                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                                     
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
                              <div id="demo1" class="collapse">
                                <table  class="table table-hover table-list dataTable" >
                                  <thead>
                                    <tr>
                                      <th width="10%" style="text-align: center;">              </th>
                                      <th width="20%" style="text-align: center;"> Codigo       </th>
                                      <th width="25%" style="text-align: center;"> Materia      </th>
                                      <th width="30%" style="text-align: center;"> Descripcion  </th>
                                      <th width="25%" style="text-align: center;"> Trimestre    </th>
                                    </tr>  
                                  </thead>
                                  <tbody role="alert" aria-live="polite" aria-relevant="all">
                                   
                                        <?php foreach ($activos as $act) 
                                        {?> <tr>
                                               <td> <input type="checkbox" name="vehicle" value="Bike" required="" > </td>
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
                     <div class="clearfix"></div>
                     <!--input type="button" name="previous" class="previous btn" value="« Anterior"-->
                    <input type="button" name="next" class="next btn" value="Siguiente »">                  
                  </fieldset>
    </form>
              <div class="clearfix">&nbsp;</div>
  </div>
  <div id="response"></div>
