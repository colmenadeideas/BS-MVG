<div class="views">
  <div class="col-lg-12 col-xs-12">
    	<div class="jumbotron text-center" style="background-color: #eee;">
    	<?php $pendientes = $this -> pendientes;?> 
      	<h1> <i class="glyphicon glyphicon-time"></i> <br>
          -Cronogramas- 
        </h1>
  		
  	  </div>
    
      

            <div class="col-lg-12 col-sm-12">
                 <?php 
                if (empty($pendientes))
                 {?> 
                   <div class="text-center">
   
                     <h3>  No hay cronogramas pendientes por evaluar  </h3>
                   </div>  
            <?php }
                 else 
                 {
                    # code...
                   
                      foreach ($pendientes as $pendiente)
                      {
                        ?>

                          <div class="col-lg-3 col-sm-3 text-left">
                            <h3>Nombre del profesor:</h3> <h4><br> <?php echo $pendiente['nombre_profesor'];?>  </h4> 
                           </div>  
                          
                           <div class="col-lg-3 col-sm-3 text-left">
                            <h3>Nombre de la materia:<br></h3><h4><br> <?php echo $pendiente['nombre_materia'];?>  </h4> 
                           </div>  
                         
                           <div class="col-lg-5 col-sm-5 text-left">
                                  <h3>Descripcion del cronograma de actividades:</h3><p><br>
                                        <ul>
                                              <?php 
                                                  $json = $pendiente['data'];
                                                  $obj = json_decode($json);
                                                  $i=1;
                                                  while ($i <= 12) 
                                                  {
                                                    $name = 'Semana'.$i;
                                                    $cronograma = $obj->{$name};
                                                    if(!empty($cronograma))
                                                    { 
                                                        ?>
                                                          <li><?php echo 'Semana '.$i; ?>  
                                                           
                                                              <ul>
                                                                    <li><?php echo $cronograma; ?></li>
                                                              </ul>

                                                            </li>
                                                        <?php
                                                    }
                                                    $i++;
                                                  }

                                               ?>

                                              
                                       </ul>
                                  </p> 
                           </div>  

                           <div class="col-lg-1 col-sm-1 text-left">
                               
                                <div class="col-lg-6 col-sm-6 text-center">
                                  <h3><a href="#controldeestudios/approveCronograma/aprobado/<?php echo $pendiente['id'];?>"> <i class="glyphicon glyphicon-ok"></i></a></h3>
                                </div> 

                                <div class="col-lg-6 col-sm-6 text-center">
                                  <h3> <a href="#controldeestudios/approveCronograma/rechazado/<?php echo $pendiente['id'];?>"> <i class="glyphicon glyphicon-remove"></i></a></h3>
                                </div> 

                          </div>  
                   <?php  }
                 }  ?>   
         

          
    </div>
  </div> 
</div> 




