<?php $pensumActivos = $this->pensumActivos;     ?>
<?php $pensumInactivos = $this->pensumInactivos;     ?>
<?php $band = false;     ?>


    <div  class="col-lg-12 col-md-12 col-xs-12">          
      <form id="periodo" name="periodo" method="post" action='' novalidate="novalidate" class="stepform">
        <?php $i = -1; $periodo = 'periodo-step';
           if (!empty($pensumActivos)) 
           {$i=$i+1;
              $band = true;
              foreach ($pensumActivos as $activos) 
              { ?>
                  <fieldset id='<?php echo $periodo.$i;?>'>
                   <div class="seccion"> <h3 style="margin-bottom: 30px;" >  <?php echo $activos[0]['slug']; ?>  </h3> </div> 
                      <div class="col-sm-12 col-lg-12" style="margin-bottom: 40px;"> 
                        
                          <div  class="col-lg-6 col-md-6 col-xs-6">
                            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Elegir pensum Actual </button>
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
                     </div> 
                     <div class="clearfix"></div>
                     <!--input type="button" name="previous" class="previous btn" value="« Anterior"-->
                    <input type="button" name="next" class="next btn" value="Siguiente »">                  
                  </fieldset>
        <?php }
           }/**/
          ?>          

         <?php  if (!empty($pensumInactivos)) 
           {$i=$i+1;
              $band = true;
              foreach ($pensumInactivos as $inactivos) 
              { ?>
                  <fieldset id='<?php echo $periodo.$i;?>'>
                   <div class="seccion"> <h3 style="margin-bottom: 30px;" >  <?php echo $inactivos[0]['slug']; ?>  </h3> </div> 
                      <div class="col-sm-12 col-lg-12" style="margin-bottom: 40px;"> 
                        
                          <div  class="col-lg-6 col-md-6 col-xs-6">
                            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Elegir pensum Actual </button>
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
                     </div> 
                     <div class="clearfix"></div>
                     <!--input type="button" name="previous" class="previous btn" value="« Anterior"-->
                    <input type="button" name="next" class="next btn" value="Siguiente »">                  
                  </fieldset>
        <?php }
           }/**/
          ?>

      
        </form>
                  <div class="clearfix">&nbsp;</div>
      </div>
      <div id="response"></div>