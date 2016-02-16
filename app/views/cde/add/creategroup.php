<?php $pensumActivos = $this->pensumActivos;     ?>
<?php $pensumInactivos = $this->pensumInactivos;     ?>
<?php $materias = $this->materias;     ?>
<?php $band = false;     ?>


    <div  id="response" class="col-lg-12 col-md-12 col-xs-12">          
      <form id="periodo" name="periodo" method="post" action='' novalidate="novalidate" class="stepform">
        <?php $i = -1; $periodo = 'periodo-step';
           if (!empty($pensumActivos)) 
           {  
              $i=$i+1; 
              $j=$i+1;
              $band = true;
              foreach ($pensumActivos as $activos) 
              { ?>
                  <fieldset id='<?php echo $periodo.$i;?>'>
                   <div class="seccion"> <h3 style="margin-bottom: 30px;" >  <?php echo $activos[0]['slug']; ?>  </h3> </div> 
                      <div class="col-sm-12 col-lg-12" style="margin-bottom: 40px;"> 
                        <h4>Seleccione o modifique el pensum</h4>
                          <div  class="col-lg-6 col-md-6 col-xs-6">
                            <button type="button" class="btn btn-info" data-toggle="collapse" data-target='<?php echo "#demo".$i?>'>Ver materias del pensum actual </button>
                          </div> 
                          <div  class="col-lg-6 col-md-6 col-xs-6">
                            <button type="button" class="btn btn-info" data-toggle="collapse" data-target=<?php echo "#demo".$j?>>Agregar un nuevo pensum</button>
                          </div> 

                              <div id='<?php echo "demo".$i?>' class="collapse">

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
                              <div id='<?php echo "demo".$j?>' class="collapse">
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
                                   
                                        <?php foreach ($materias as $act) 
                                        { 
                                          if($act['id_courses'] == $activos[0]['id_courses']){

                                          ?> <tr>
                                               <td> <input type="checkbox" name="<?php echo $activos[0]['slug'].'[]'; ?>" value='<?php echo $act['id'];?>' required="" > </td>
                                               <td><?php echo $act['id'];             ?> </td>
                                               <td><?php echo $act['nombre_materia']; ?> </td>
                                               <td><?php echo $act['descripcion'];    ?> </td>
                                               <td><?php echo $act['trimestre'];      ?> </td>
                                             </tr>   
                                   <?php } }?>
                                  </tbody>    
                              </table> 
                                    <div class="col-lg-4 col-md-4 col-xs-4">
                                      <td><input type="text" name="name" placeholder="Nombres del niñ@" required="required" class="form-control input-lg"></td>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-xs-4">
                                      <td><input type="text" name="name" placeholder="Nombres del niñ@" required="required" class="form-control input-lg"></td>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-xs-4">
                                      <td><input type="text" name="name" placeholder="Nombres del niñ@" required="required" class="form-control input-lg"></td>
                                    </div> 
                          </div>  

                     </div> 
                     <div class="clearfix"></div>
                     <!--input type="button" name="previous" class="previous btn" value="« Anterior"-->
    
                    <input type="button" name="previous" class="previous btn" value="« Anterior">
                    <input type="button" name="next" class="next btn" value="Siguiente »"> 
                  </fieldset>
        <?php }
           }
          ?>          
        <!-- SINO TIENEN PENSUM ASIGNADOS --> 
         <?php  if (!empty($pensumInactivos)) 
           {
           
              $j=$j+1;
              foreach ($pensumInactivos as $inactivos) 
              {  $i=$i+1;$j=$j+1;?>
                  <fieldset id='<?php echo $periodo.$i;?>'>
                   <div class="seccion"> <h3 style="margin-bottom: 30px;" >  <?php echo $inactivos[0]['slug']; ?>  </h3> </div> 
                      <div class="col-sm-12 col-lg-12" style="margin-bottom: 40px;"> 
                        
                           
                          <div  class="col-lg-6 col-md-6 col-xs-6">
                            <button type="button" class="btn btn-info" data-toggle="collapse" data-target='<?php echo "#demo".$j?>'>Agregar un nuevo pensum</button>
                          </div> 
                              <div id='<?php echo "demo".$j?>' class="collapse">
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
                                   
                                        <?php foreach ($materias as $act) 
                                        {?> <tr>
                                               <td><?php echo $act['id']     ?> </td>
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
                     <input type="button" name="previous" class="previous btn" value="« Anterior">
                     <input type="button" name="next" class="next btn" value="Siguiente »">                  
                  </fieldset>
        <?php }
           }/**/
          ?>

      
        </form>
                  <div class="clearfix">&nbsp;</div>
      </div>
     