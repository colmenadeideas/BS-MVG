<!-- -->
<div style="background-color: beige;">
  <div class="views" >
    <div class="col-lg-12 col-xs-12">
      	<?php $evaluaciones = $this -> evaluaciones; ?> 
          <h1 style="text-align: center"> <i class="glyphicon glyphicon-time"></i> <br>
              -Cronogramas- 
          </h1>
          <hr style="color: white" />
    </div>
  </div>  
  

 
   
  <div class="col-lg-12 col-sm-12">
       
        <div class="col-lg-2 col-sm-2"></div>

         <div class="col-lg-8 col-sm-8" style="border: 1px;background-color: aqua;border: 3px coral solid">
          <button  name="imprimir" class="next btn" style="-webkit-border-radius: 30px; background-color: white; "> <i class="fa fa-print"></i> Imprimir</button>
              <div class="col-lg-12 col-sm-12" style="height: 600px; overflow:auto;">
              <?php $i =1; ?>
              <?php foreach ($evaluaciones as $eval){ ?>

                <div class="col-lg-12 col-sm-12" style="-webkit-border-radius: 15px; background-color: white; margin-bottom: 20px;margin-top: 20px;" > 
                    
                    <h3 style="text-align: right;">CLASE <?php echo $i; ?></h3>
                   
                    <hr style="color: white" />
                    
                    <p> <?php echo $eval['nombre_evaluacion']; ?> </p>
                    <ul>
                        <li>
                            <?php echo $eval['descripcion']; ?>
                        </li>
                    </ul>

                </div>
              
             <?php $i++; ?>
             <?php } ?>
              

             </div>  
        </div> 
        
        <div class="col-lg-2 col-sm-2">
            <div class="col-lg-6 col-sm-6">
                  <button type="button" class="btn  btn-success btn-circle action-approve showtooltip" data-toggle="modal" data-target="#myModal"><i class="fa fa-check"></i></button>

                  <!-- Modal -->
                  <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 style="text-align: center"> <i class="fa fa-check"></i><br>
                             
                          </h4>
                        </div>
                        <div class="modal-body">
                          <p>Cronograma aprobado con exito! .</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Guardar</button>
                        </div>
                      </div>
                      
                    </div>
                  </div>
              </div>

        
             <div class="col-lg-6 col-sm-6">
                  <button type="button" class="btn btn-danger btn-circle action-reject showtooltip" data-toggle="modal" data-target="#myModalReject"><i class="glyphicon glyphicon-remove"></i></button>

                  <!-- Modal -->
                  <div class="modal fade" id="myModalReject" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 style="text-align: center">... Comentarios ...</i><br>
                             
                          </h4>
                        </div>
                        <div class="modal-body">
                          <form id="complete-registration-cde" action="" novalidate="novalidate" class="stepform">
                              <input type="hidden" name="tipo" required="required" value="comentario">
                              <input type="hidden" name="id_cronograma" required="required" value="1">
                              <input type="hidden" name="id_profesor" required="required" value="1">
                              <textarea rows="4" cols="50" name="comment" form="complete-registration-cde" placeholder="Ingrese su comentario..." requierd >  </textarea>
                         
                        </div>
                              <div class="modal-footer">
                               <p style="text-align: center"> <input type="submit" name="send" class="btn btn-success send" value="Listo!"> </p> 
                              </div>
                        </form>      
                      </div>
                      
                    </div>
                  </div>
              </div>



        </div> 


  </div> 
</div> 




