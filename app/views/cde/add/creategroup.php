<?php $pensumActivos = $this->pensumActivos;     ?>
<?php $pensumInactivos = $this->pensumInactivos;     ?>
<?php $materias = $this->materias;     ?>
<?php    ?>

<?php $band = false;   


 /* ?>


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
                                  <table id="tabla"  class="table table-hover table-list dataTable">
                                    <!-- Cabecera de la tabla -->
                                    <thead>
                                      <tr>
                                        <th>Materia</th>
                                        <th>Descripcion</th>
                                        <th>Trimestre</th>
                                        <th>&nbsp;</th>
                                      </tr>
                                    </thead>
                                   
                                    <!-- Cuerpo de la tabla con los campos -->
                                    <tbody>
                                   
                                      <!-- fila base para clonar y agregar al final -->
                                      <tr class="fila-base" >
                                        <td><input type="text" class="nombre" /></td>
                                        <td><input type="text" class="apellidos" /></td>
                                        <td>
                                           <select class="sexo">
                                            <option value="0">- Trimestre -</option>
                                            <option value="1">1er Trimestre</option>
                                            <option value="2">2do Trimestre</option>
                                            <option value="3">3er Trimestre</option>
                                            <option value="4">4to Trimestre</option>
                                            <option value="5">5to Trimestre</option>
                                          </select>
                                        </td>
                                        <td class="eliminar"> <input type="button" id="eliminar" value="Eliminar" /> </td>
                                      </tr>
                                      <!-- fin de código: fila base -->
                                   
                                      <!-- Fila de ejemplo -->
                                      <tr style="display: none;">
                                        <td><input type="text" class="nombre" /></td>
                                        <td><input type="text" class="apellidos" /></td>
                                        <td>
                                          <select class="sexo" >
                                            <option value="0">- Trimestre -</option>
                                            <option value="1">1er Trimestre</option>
                                            <option value="2">2do Trimestre</option>
                                            <option value="3">3er Trimestre</option>
                                            <option value="4">4to Trimestre</option>
                                            <option value="5">5to Trimestre</option>
                                          </select>
                                        </td>
                                        <td class="eliminar"><input type="button" id="eliminar" value="Eliminar" /> </td>
                                      </tr>
                                      <!-- fin de código: fila de ejemplo -->
                                   
                                    </tbody>
                                  </table>
                                  <!-- Botón para agregar filas -->
                                  <input type="button" id="agregar" value="Agregar fila" /> 
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
                          <table id="tabla"  class="table table-hover table-list dataTable">
                                    <!-- Cabecera de la tabla -->
                                    <thead>
                                      <tr>
                                        <th>Materia</th>
                                        <th>Descripcion</th>
                                        <th>Trimestre</th>
                                        <th>&nbsp;</th>
                                      </tr>
                                    </thead>
                                   
                                    <!-- Cuerpo de la tabla con los campos -->
                                    <tbody>
                                   
                                      <!-- fila base para clonar y agregar al final -->
                                      <tr class="fila-base" >
                                        <td><input type="text" class="nombre" /></td>
                                        <td><input type="text" class="apellidos" /></td>
                                        <td>
                                           <select class="sexo">
                                            <option value="0">- Trimestre -</option>
                                            <option value="1">1er Trimestre</option>
                                            <option value="2">2do Trimestre</option>
                                            <option value="3">3er Trimestre</option>
                                            <option value="4">4to Trimestre</option>
                                            <option value="5">5to Trimestre</option>
                                          </select>
                                        </td>
                                        <td class="eliminar"> <input type="button" id="eliminar" value="Eliminar" /> </td>
                                      </tr>
                                      <!-- fin de código: fila base -->
                                   
                                      <!-- Fila de ejemplo -->
                                      <tr style="display: none;">
                                        <td><input type="text" class="nombre" /></td>
                                        <td><input type="text" class="apellidos" /></td>
                                        <td>
                                          <select class="sexo" >
                                            <option value="0">- Trimestre -</option>
                                            <option value="1">1er Trimestre</option>
                                            <option value="2">2do Trimestre</option>
                                            <option value="3">3er Trimestre</option>
                                            <option value="4">4to Trimestre</option>
                                            <option value="5">5to Trimestre</option>
                                          </select>
                                        </td>
                                        <td class="eliminar"><input type="button" id="eliminar" value="Eliminar" /> </td>
                                      </tr>
                                      <!-- fin de código: fila de ejemplo -->
                                   
                                    </tbody>
                                  </table>
                                  <!-- Botón para agregar filas -->
                                  <input type="button" id="agregar" value="Agregar fila" />              
                     </div> 
                     <div class="clearfix"></div>
                     <input type="button" name="previous" class="previous btn" value="« Anterior">
                     <input type="button" name="next" class="next btn" value="Siguiente »">                  
                  </fieldset>
        <?php }
           }
          ?>

      
        </form>
                  <div class="clearfix">&nbsp;</div>
      </div>
     <script type="text/javascript">
 
        $(function(){
          // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
          $("#agregar").on('click', function(){
            $("#tabla tbody tr:eq(0)").clone().removeClass('fila-base').appendTo("#tabla tbody");
          });
         
          // Evento que selecciona la fila y la elimina 
          $(document).on("click",".eliminar",function(){
            var parent = $(this).parents().get(0);
            $(parent).remove();
          });
        });
 
    </script> */  ?>
        <fieldset id="periodo-step2">  

          <div class="container col-sm-12 col-lg-12">
          
           <br><br>
<div class="container">
 <div class="well col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
        <div class="row user-row">
            <div class="col-xs-3 col-sm-2 col-md-1 col-lg-1">
                <img class="img-circle" src="#"  alt="User Pic">
            </div>
            <div class="col-xs-8 col-sm-9 col-md-10 col-lg-10">
                <strong>Cyruxx</strong><br>
                <span class="text-muted">User level: Administrator</span>
            </div>
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 dropdown-user" data-for=".cyruxx">
                <i class="glyphicon glyphicon-chevron-down text-muted"></i>
            </div>
        </div>
        <div class="row user-infos cyruxx">
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">User information</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3 col-lg-3 hidden-xs hidden-sm">
                               <img class="img-circle" src="#"  alt="User Pic">
                            </div>
                            <div class="col-xs-2 col-sm-2 hidden-md hidden-lg">
                                <img <img class="img-circle" src="#"  alt="User Pic">
                            </div>
                            <div class="col-xs-10 col-sm-10 hidden-md hidden-lg">
                                <strong>Cyruxx</strong><br>
                                <dl>
                                    <dt>User level:</dt>
                                    <dd>Administrator</dd>
                                    <dt>Registered since:</dt>
                                    <dd>11/12/2013</dd>
                                    <dt>Topics</dt>
                                    <dd>15</dd>
                                    <dt>Warnings</dt>
                                    <dd>0</dd>
                                </dl>
                            </div>
                            <div class=" col-md-9 col-lg-9 hidden-xs hidden-sm">
                                <strong>Cyruxx</strong><br>
                                <table class="table table-user-information">
                                    <tbody>
                                    <tr>
                                        <td>User level:</td>
                                        <td>Administrator</td>
                                    </tr>
                                    <tr>
                                        <td>Registered since:</td>
                                        <td>11/12/2013</td>
                                    </tr>
                                    <tr>
                                        <td>Topics</td>
                                        <td>15</td>
                                    </tr>
                                    <tr>
                                        <td>Warnings</td>
                                        <td>0</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-sm btn-primary" type="button"
                                data-toggle="tooltip"
                                data-original-title="Send message to user"><i class="glyphicon glyphicon-envelope"></i></button>
                        <span class="pull-right">
                            <button class="btn btn-sm btn-warning" type="button"
                                    data-toggle="tooltip"
                                    data-original-title="Edit this user"><i class="glyphicon glyphicon-edit"></i></button>
                            <button class="btn btn-sm btn-danger" type="button"
                                    data-toggle="tooltip"
                                    data-original-title="Remove this user"><i class="glyphicon glyphicon-remove"></i></button>
                        </span>
                    </div>
                </div>
            </div>
        </div>


                <div class="row user-row">
            <div class="col-xs-3 col-sm-2 col-md-1 col-lg-1">
                <img class="img-circle" src="#"  alt="User Pic">
            </div>
            <div class="col-xs-8 col-sm-9 col-md-10 col-lg-10">
                <strong>User 2</strong><br>
                <span class="text-muted">User level: Registered</span>
            </div>
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 dropdown-user" data-for=".user2">
                <i class="glyphicon glyphicon-chevron-down text-muted"></i>
            </div>
        </div>
        <div class="row user-infos user2">
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">User information</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3 col-lg-3 hidden-xs hidden-sm">
                               <img class="img-circle" src="#"  alt="User Pic">
                            </div>
                            <div class="col-xs-2 col-sm-2 hidden-md hidden-lg">
                               <img class="img-circle" src="#"  alt="User Pic">
                            </div>
                            <div class="col-xs-10 col-sm-10 hidden-md hidden-lg">
                                <strong>Cyruxx</strong><br>
                                <dl>
                                    <dt>User level:</dt>
                                    <dd>Administrator</dd>
                                    <dt>Registered since:</dt>
                                    <dd>11/12/2013</dd>
                                    <dt>Topics</dt>
                                    <dd>15</dd>
                                    <dt>Warnings</dt>
                                    <dd>0</dd>
                                </dl>
                            </div>
                            <div class=" col-md-9 col-lg-9 hidden-xs hidden-sm">
                                <strong>Cyruxx</strong><br>
                                <table class="table table-user-information">
                                    <tbody>
                                    <tr>
                                        <td>User level:</td>
                                        <td>Administrator</td>
                                    </tr>
                                    <tr>
                                        <td>Registered since:</td>
                                        <td>11/12/2013</td>
                                    </tr>
                                    <tr>
                                        <td>Topics</td>
                                        <td>15</td>
                                    </tr>
                                    <tr>
                                        <td>Warnings</td>
                                        <td>0</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-sm btn-primary" type="button"
                                data-toggle="tooltip"
                                data-original-title="Send message to user"><i class="glyphicon glyphicon-envelope"></i></button>
                        <span class="pull-right">
                            <button class="btn btn-sm btn-warning" type="button"
                                    data-toggle="tooltip"
                                    data-original-title="Edit this user"><i class="glyphicon glyphicon-edit"></i></button>
                            <button class="btn btn-sm btn-danger" type="button"
                                    data-toggle="tooltip"
                                    data-original-title="Remove this user"><i class="glyphicon glyphicon-remove"></i></button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row user-row">
            <div class="col-xs-3 col-sm-2 col-md-1 col-lg-1">
                <img class="img-circle"
                     src="#
"
                     alt="User Pic">
            </div>
            <div class="col-xs-8 col-sm-9 col-md-10 col-lg-10">
                <strong>Cyruxx</strong><br>
                <span class="text-muted">User level: Administrator</span>
            </div>
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 dropdown-user" data-for=".user3">
                <i class="glyphicon glyphicon-chevron-down text-muted"></i>
            </div>
        </div>
        <div class="row user-infos user3">
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">User information</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3 col-lg-3 hidden-xs hidden-sm">
                               <img class="img-circle" src="#"  alt="User Pic">
                            </div>
                            <div class="col-xs-2 col-sm-2 hidden-md hidden-lg">
                                <img class="img-circle" src="#"  alt="User Pic">
                            </div>
                            <div class="col-xs-10 col-sm-10 hidden-md hidden-lg">
                                <strong>Cyruxx</strong><br>
                                <dl>
                                    <dt>User level:</dt>
                                    <dd>Administrator</dd>
                                    <dt>Registered since:</dt>
                                    <dd>11/12/2013</dd>
                                    <dt>Topics</dt>
                                    <dd>15</dd>
                                    <dt>Warnings</dt>
                                    <dd>0</dd>
                                </dl>
                            </div>
                            <div class=" col-md-9 col-lg-9 hidden-xs hidden-sm">
                                <strong>Cyruxx</strong><br>
                                <table class="table table-user-information">
                                    <tbody>
                                    <tr>
                                        <td>User level:</td>
                                        <td>Administrator</td>
                                    </tr>
                                    <tr>
                                        <td>Registered since:</td>
                                        <td>11/12/2013</td>
                                    </tr>
                                    <tr>
                                        <td>Topics</td>
                                        <td>15</td>
                                    </tr>
                                    <tr>
                                        <td>Warnings</td>
                                        <td>0</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-sm btn-primary" type="button"
                                data-toggle="tooltip"
                                data-original-title="Send message to user"><i class="glyphicon glyphicon-envelope"></i></button>
                        <span class="pull-right">
                            <button class="btn btn-sm btn-warning" type="button"
                                    data-toggle="tooltip"
                                    data-original-title="Edit this user"><i class="glyphicon glyphicon-edit"></i></button>
                            <button class="btn btn-sm btn-danger" type="button"
                                    data-toggle="tooltip"
                                    data-original-title="Remove this user"><i class="glyphicon glyphicon-remove"></i></button>
                        </span>
                    </div>
                </div>
            </div>
        </div>


        
        
    </div>
</div>
          
          </div>

          <div class="clearfix"></div>

              <input type="button" name="previous" class="previous btn" value="« Anterior">
              <input type="button" name="next" class="next btn" value="Siguiente »">

        </fieldset>

    
  