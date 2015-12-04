<div class="views">
  <div class="col-lg-12 col-xs-12">
    	<div class="jumbotron text-center" style="background-color: #eee;">
    	<?php $pendientes = $this -> pendientes;
     
      ?> 
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
                   ?>
                   <div class="col-lg-3 col-sm-3 text-left">
                            <h3>Nombre del profesor:</h3>  </h4> 
                   </div>  

                   <div class="col-lg-3 col-sm-3 text-left">
                            <h3>Nombre de la materia:<br></h3>
                   </div>  
                   <div class="col-lg-5 col-sm-5 text-left">
                                  <h3>Descripcion del cronograma de actividades:</h3><br>
                    </div>  
                    <div class="col-lg-1 col-sm-1 text-left">
                    </div>       
                    <div class="col-lg-12 col-sm-12 ">       
                   <?php 
                      $j=1;
                      $tam = count($pendientes);
                      foreach ($pendientes as $pendiente)
                      { 
                        if ($j<=$tam) 
                        {
                          $inf = 'info'.$j;
                      
                          $eval = 'eval'.$j; 
                         
                        }

                        ?>

                          <div class="col-lg-3 col-sm-3 text-left">
                            <h4><br> <?php echo $pendiente[$inf]['nombre_profesor'];?>  </h4> 
                           </div>  
                          
                           <div class="col-lg-3 col-sm-3 text-left">
                            <h4><br><?php echo $pendiente[$inf]['nombre_materia'];?></h4>
                           </div>  
                         
                           <div class="col-lg-5 col-sm-5 text-left">
                                 <p><br>
                                        <ul>
                                              <?php 
                                                                                        
                                             //  print_r($pendiente[$eval]);

                                             
                                                  $i=1;
                                                  // print_r($pendiente);
                                                  foreach ($pendiente[$eval] as $cronograma) 
                                                  {

                                                     
                                                    
                                                    ?>
                                                          <li><?php echo 'Evaluacion '.$i; ?>  
                                                           
                                                              <ul>
                                                                    <li><?php echo $cronograma['nombre_evaluacion']; ?></li>
                                                                    <li><?php echo $cronograma['descripcion']; ?></li>
                                                                    <br>
                                                              </ul>

                                                          </li> 
                                                    <? 
                                                    $i++;
                                                    
                                                  }

                                                $j++;
                                               ?>

                                              
                                       </ul>
                                  </p> 
                           </div>  


                           <div class="col-lg-1 col-sm-1 text-left">
                               
                                <div class="col-lg-6 col-sm-6 text-center" style="padding-left: 0px;padding-right: 0px;">
                                 <br> <p><a href="#approveCronograma/aprobado/<?php echo $pendiente[$inf]['id'];?>"> <i class="glyphicon glyphicon-ok"></i></a></p>
                                </div> 

                                <div class="col-lg-6 col-sm-6 text-center" style="padding-left: 0px;padding-right: 0px;">
                                 <br> <p> <a href="#approveCronograma/rechazado/<?php echo $pendiente[$inf]['id'];?>"> <i class="glyphicon glyphicon-remove"></i></a></p>
                                </div> 

                          </div>  

                   <?php  }?> 
                 </div>
               <?php    }  ?>   
         

          
    </div>
  </div> 
</div> 




