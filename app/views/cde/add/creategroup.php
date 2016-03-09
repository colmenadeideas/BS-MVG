<?php $pensumActivos = $this->pensumActivos; //print_r($pensumActivos); ?>
<?php $materias = $this->materias;     ?>
<?php $fechas = $this->fecha;     ?>


<form id="pensum" name="pensum" method="post" action='' novalidate="novalidate" class="stepform">
 <input type="hidden" name="fechaInicio" value="<?php echo $this->fecha['inicio'];  ?>">   
 <input type="hidden" name="fechaFin" value="<?php echo $this->fecha['fin'];  ?>">   

<fieldset id="periodo-step2">
  <?php $i =0; foreach ($pensumActivos as $activos ) 
  { 
   
    $i++;
    $band = empty($activos[0]['order']);

  ?>
  
   <div class="container">
         <div class="table-responsive">
           <div class="well col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2" style="margin-left: 0px;">
              

                  <div class="row user-row">
                      <div class="col-xs-3 col-sm-2 col-md-1 col-lg-1">
                          <img class="img-responsive img-circle" src="<?php echo IMAGES; ?>courses/<?php echo $activos[0]['slug']; ?>/course.jpg"  alt="User Pic">
                      </div>
                      <div class="col-xs-8 col-sm-9 col-md-10 col-lg-10">
                          <strong><?php echo $activos[0]['slug']; ?></strong><br>
                          <span class="text-muted">Pensum:<?php if(!$band) echo "NO"; ?> Disponible </span>
                      </div>
                      <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 dropdown-user" data-for=".<?php echo $activos[0]['slug']; ?>">
                          <i class="glyphicon glyphicon-chevron-down text-muted"></i>
                      </div>
                  </div>

                  <div class="row user-infos <?php echo $activos[0]['slug']; ?>">
                      <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1">
                     <?php if($band) {?>
                       <p><input type="radio" name="Pensum_<?php echo $i; ?>" value="actual" checked ><p>Pensum actual   <span data-toggle="collapse" data-target="#<?php echo $activos[0]['slug'].'1'; ?>"> Ver mas</span></p></p>                    
                       <input type="hidden" name="id_<?php echo $activos[0]['slug']; ?>" value="<?php echo $activos[0]['id_courses']; ?>" >
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
                                                  
                                                  <td>Materia</td>
                                                  <td>Descripcion</td>
                                                  <td>Trimestre</td>
                                              </tr>

                                          <?php foreach ($activos as $act) 
                                          {?> <tr>
                                                 
                                                 <td><?php echo $act['nombre_materia'] ?> </td>
                                                 <td><?php echo $act['descripcion']    ?> </td>
                                                 <td><?php switch ($act['trimestre']) 
                                                          {
                                                              case '1':
                                                                    echo "I";
                                                                 break;
                                                              case '2':
                                                                    echo "II";
                                                                 break;
                                                              case '3':
                                                                    echo "III";
                                                                 break;
                                                              case '4':
                                                                echo "IV";
                                                                break;
                                                              case '5':
                                                                 echo "V";
                                                                  break;  

                                                               default:
                                                                 echo "--";
                                                                 break;
                                                            }?> 
                                               </td>
                                               </tr>   
                                            <?php } ?>
                                            </tbody>
                                          </table>
                                      </div>
                                  </div>
                              </div>
                          </div> 
                        </div> 
                        <?php } ?> 
                      </div>

                      <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1">
                        <div> 
                          <input type="radio" name="Pensum_<?php echo $i; ?>"  <?php if(!$band){ echo "checked "; echo 'value="nuevo"';}else{ echo 'value="actualizado"';} ?> > <p data-toggle="collapse" data-target="#<?php echo $activos[0]['slug'].'2'; ?>"  >Crear pensum nuevo</p></div>
                         <?php if(!$band){  ?>
                            <input type="hidden" name="id_<?php echo $activos[0]['slug']; ?>" value="<?php echo $activos[0]['id']; ?>" >
                          <?php  } ?>
                         <div id="<?php echo $activos[0]['slug'].'2'; ?>" class="collapse">
                              <div class="panel panel-primary" style="border-color: #1F1F1F; ">
                              <div class="panel-heading" style="border-color: #1F1F1F; background-color: #0D0D0E;">
                                  <h2 class="panel-title">Informacion del pensum actual </h2>
                                  <input type="hidden" name="slug_<?php echo $i; ?>" value="<?php echo $activos[0]['slug']; ?>">   
                              </div>
                              <div class="panel-body">
                                  <div class="row">
                                      <div class="col-md-2 col-lg-2 hidden-xs hidden-sm">
                                         <img class="img-responsive img-circle" src="<?php echo IMAGES; ?>courses/<?php echo $activos[0]['slug']; ?>/course.jpg"  alt="User Pic">
                                      </div>
                                      <div class=" col-md-10 col-lg-10">
                                          <strong><?php echo $activos[0]['slug']; ?></strong><br>
                                          <!--table class="table table-user-information"-->
                                           <table class="table table-bordered table-hover table-sortable" id="tab_logic_<?php echo $activos[0]['slug']; ?>" >
                                              <thead>
                                                <tr >
                                                  <th class="text-center">
                                                    Materia
                                                  </th>

                                                  <th class="text-center">
                                                    Descripción
                                                  </th>
                                                    <th class="text-center">
                                                    Trimestre 
                                                  </th>
                                                      <th class="text-center" style="border-top: 1px solid #ffffff; border-right: 1px solid #ffffff;">
                                                  </th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                  <tr id='addr0' data-id="0" class="hidden">
                                                  <td data-name="materia_<?php echo $activos[0]['slug']; ?>_">
                                                      <input type="text" name='materia_<?php echo $activos[0]['slug']; ?>_0'  placeholder='Materia' class="form-control"/ required="required">
                                                  </td>
                                                  <td data-name="desc_<?php echo $activos[0]['slug']; ?>_">
                                                      <textarea name="desc_<?php echo $activos[0]['slug']; ?>_0" placeholder="Descripción" class="form-control"></textarea>
                                                  </td>
                                                    <td data-name="sel_<?php echo $activos[0]['slug']; ?>_">
                                                      <select name="sel_<?php echo $activos[0]['slug']; ?>_0" >
                                                              <option value="1">Trimestre 1</option>
                                                              <option value="2">Trimestre 2</option>
                                                              <option value="3">Trimestre 3</option>
                                                              <option value="4">Trimestre 4</option>
                                                              <option value="5">Trimestre 5</option>
                                                      </select>
                                                    </td>
                                                              <td data-name="del">
                                                                  <button nam"del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'></button>
                                                              </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          <div> <a  class="btn btn-success add_row" data-table="<?php echo $activos[0]['slug']; ?>" > <i class="fa fa-plus"> Add Row</i> </a> </div>
                                      </div>
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
              <input type="submit" name="next" class="next btn" value="Listo!">
       
</fieldset>

 </form>
  <div id="response" class="col-lg-offset-3 col-xs-offset-3 col-lg-6 col-xs-6" style="margin-top:60px;" >

  </div> 
    
