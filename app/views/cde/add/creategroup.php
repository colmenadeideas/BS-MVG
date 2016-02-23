<?php $pensumActivos = $this->pensumActivos;    ?>
<?php $pensumInactivos = $this->pensumInactivos; ?>
<?php $materias = $this->materias;     ?>

<form id="pensum" name="pensum" method="post" action='' novalidate="novalidate" class="stepform">
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
                      <p><input type="radio" name="<?php echo $activos[0]['slug'].'[]';?>" value="actual" checked><p>Pensum actual   <span data-toggle="collapse" data-target="#<?php echo $activos[0]['slug'].'1'; ?>"> Ver mas</span></p></p>
                         <div id="<?php echo $activos[0]['slug'].'1'; ?>" class="collapse">
                              <div class="panel panel-primary" style="border-color: #1F1F1F; ">
                              <div class="panel-heading" style="border-color: #1F1F1F; background-color: #0D0D0E;">
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
                        <div> <input type="radio" name="<?php echo $activos[0]['slug'].'[]';?>" value="nuevo" > <p data-toggle="collapse" data-target="#<?php echo $activos[0]['slug'].'2'; ?>">Crear pensum nuevo</p></div>
                         <div id="<?php echo $activos[0]['slug'].'2'; ?>" class="collapse">
                              <div class="panel panel-primary" style="border-color: #1F1F1F; ">
                              <div class="panel-heading" style="border-color: #1F1F1F; background-color: #0D0D0E;">
                                  <h2 class="panel-title">Informacion del pensum actual </h2>
                              </div>
                              <div class="panel-body">
                                  <div class="row">
                                      <div class="col-md-2 col-lg-2 hidden-xs hidden-sm">
                                         <img class="img-responsive img-circle" src="<?php echo IMAGES; ?>courses/<?php echo $activos[0]['slug']; ?>/course.jpg"  alt="User Pic">
                                      </div>
                                      <div class=" col-md-10 col-lg-10">
                                          <strong><?php echo $activos[0]['slug']; ?></strong><br>
                                          <!--table class="table table-user-information"-->
                                           <table class="table table-bordered table-hover table-sortable" id="tab_logic" name="">
                                              <thead>
                                                <tr >
                                                  <th class="text-center">
                                                    Name
                                                  </th>

                                                  <th class="text-center">
                                                    Notes
                                                  </th>
                                                    <th class="text-center">
                                                    Option
                                                  </th>
                                                      <th class="text-center" style="border-top: 1px solid #ffffff; border-right: 1px solid #ffffff;">
                                                  </th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                  <tr id='addr0' data-id="0" class="hidden">
                                                  <td data-name="name">
                                                      <input type="text" name='name0'  placeholder='Name' class="form-control"/>
                                                  </td>
                                                  <td data-name="desc">
                                                      <textarea name="desc0" placeholder="Description" class="form-control"></textarea>
                                                  </td>
                                                    <td data-name="sel">
                                                      <select name="sel0">
                                                              <option value"">Trimestre</option>
                                                              <option value"1">Trimestre 1</option>
                                                              <option value"2">Trimestre 2</option>
                                                              <option value"3">Trimestre 3</option>
                                                              <option value"4">Trimestre 4</option>
                                                              <option value"5">Trimestre 5</option>
                                                      </select>
                                                    </td>
                                                              <td data-name="del">
                                                                  <button nam"del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'></button>
                                                              </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          <div> <a id="add_row"  class="add_row_new btn">Add Row</a> </div>
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
<?php foreach ($pensumInactivos as $activos ) 
{ ?>
   <div class="container">
           <div class="well col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2" style="margin-left: 0px;">
              

                  <div class="row user-row">
                      <div class="col-xs-3 col-sm-2 col-md-1 col-lg-1">
                          <img class="img-responsive img-circle" src="<?php echo IMAGES; ?>courses/<?php echo $activos[0]['slug']; ?>/course.jpg"  alt="User Pic">
                      </div>
                      <div class="col-xs-8 col-sm-9 col-md-10 col-lg-10">
                          <strong><?php echo $activos[0]['slug']; ?></strong><br>
                          <span class="text-muted">Pensum: NO Disponible </span>
                      </div>
                      <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 dropdown-user" data-for=".<?php echo $activos[0]['slug']; ?>">
                          <i class="glyphicon glyphicon-chevron-down text-muted"></i>
                      </div>
                  </div>

                  <div class="row user-infos <?php echo $activos[0]['slug']; ?>">
                      <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1">
                        <div> <input type="radio" name="<?php echo $activos[0]['slug'].'[]';?>" value="nuevo" > <p data-toggle="collapse" data-target="#<?php echo $activos[0]['slug'].'2'; ?>">Crear pensum nuevo</p></div>
                         <div id="<?php echo $activos[0]['slug'].'2'; ?>" class="collapse">
                              <div class="panel panel-primary" style="border-color: #1F1F1F; ">
                              <div class="panel-heading" style="border-color: #1F1F1F; background-color: #0D0D0E;">
                                  <h2 class="panel-title">Informacion del pensum actual </h2>
                              </div>
                              <div class="panel-body">
                                  <div class="row">
                                      <div class="col-md-2 col-lg-2 hidden-xs hidden-sm">
                                         <img class="img-responsive img-circle" src="<?php echo IMAGES; ?>courses/<?php echo $activos[0]['slug']; ?>/course.jpg"  alt="User Pic">
                                      </div>
                                      <div class=" col-md-10 col-lg-10">
                                          <strong><?php echo $activos[0]['slug']; ?></strong><br>
                                          <!--table class="table table-user-information"-->
                                           <table class="table table-bordered table-hover table-sortable" id="tab_logic">
                                              <thead>
                                                <tr >
                                                  <th class="text-center">
                                                    Name
                                                  </th>

                                                  <th class="text-center">
                                                    Notes
                                                  </th>
                                                    <th class="text-center">
                                                    Option
                                                  </th>
                                                      <th class="text-center" style="border-top: 1px solid #ffffff; border-right: 1px solid #ffffff;">
                                                  </th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                  <tr id='addr0' data-id="0" class="hidden">
                                                  <td data-name="name">
                                                      <input type="text" name='name0'  placeholder='Name' class="form-control"/>
                                                  </td>
                                                  <td data-name="desc">
                                                      <textarea name="desc0" placeholder="Description" class="form-control"></textarea>
                                                  </td>
                                                    <td data-name="sel">
                                                      <select name="sel0">
                                                              <option value"">Trimestre</option>
                                                              <option value"1">Trimestre 1</option>
                                                              <option value"2">Trimestre 2</option>
                                                              <option value"3">Trimestre 3</option>
                                                              <option value"4">Trimestre 4</option>
                                                              <option value"5">Trimestre 5</option>
                                                      </select>
                                                    </td>
                                                              <td data-name="del">
                                                                  <button nam"del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'></button>
                                                              </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          <div><a id="add_row" class="add_row_new btn">Add Row</a></div>
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
       
</fieldset>
 </form>
    
  