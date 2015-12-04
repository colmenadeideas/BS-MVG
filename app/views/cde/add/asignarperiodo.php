<div style="background: rgba(112, 110, 154, 0.71); height:100%; ">
    
 <?php 
                     
    $courses  = $this -> courses;            
    $form     = $this -> form;            
    $band     = $this -> band;            
?>


   
    <form id="complete-registration-cde" action="post" novalidate="novalidate" class="stepform">

     <?php 
              if ($band == 1)
              {?>
                             

     <?php   
              }             
               
      ?>




      <!-- Asignacion de periodo -->
      <br><br> 

      <fieldset id="registration-step1">
          <input type="hidden" name="tipo" required="required" value="nuevoperiodo">                     
    
            <input type="hidden" name="parte1" required="required" value="parte1">                     
     

            <div class="seccion"><h3>Registrar Nuevo Periodo </h3></div> 
              <div class="col-sm-12 col-lg-12">  

                   <div class="col-sm-4 col-lg-3">
                          
                  </div>

                  <div class="col-sm-6 col-lg-6">
                          <input type="text" name="fechaInicio" placeholder="Fecha de inicio del trimestre" required="" class="form-control input-lg datetimepicker left valid" value="<?php echo @$this -> fechaInicio['fechaInicio']; ?>">
                          <i class="glyphicon glyphicon-calendar add-on right"></i>
                  </div>
                   <div class="col-sm-4 col-lg-3">
                        
                  </div>

                                                
             </div>    

                                                  
                        <div class="clearfix"></div>
                        <br>   <input type="button" name="next" class="next btn" value="Siguiente »">
                      
                      
        </fieldset>
       
        <fieldset id="registration-step2">  
                <div class="container col-sm-12 col-lg-12">
                    <div class="seccion"><h3>Registrar Nuevo Periodo </h3></div> 
                      
                      <?php 
                       
                        foreach ($this->courses as $course) { ?>
                       
                          <div class="col-lg-3 col-md-3 col-xs-6 text-center courses-link">


                               <input type="checkbox" name="c[]" value="<?php echo $course['id']; ?>"><br>

                                <img src="<?php echo IMAGES; ?>courses/<?php echo $course['slug']; ?>/course.jpg" class="img-responsive img-circle" />

                            </div>
                           
                            <h2><?php echo $course['name']; ?></h2> 
                            <p><?php echo $course['description']; ?></p>
                          </div>
                       
                      <?php } ?>
                  </div>    
    



                         <div class="clearfix"></div>
                        <input type="button" name="previous" class="previous btn" value="« Anterior">
                        <input type="submit" name="submit" class="next btn" value="Siguiente »">

        </fieldset>
        
   
    </form>
              <div class="clearfix">&nbsp;</div>
  </div>
  <div id="response"></div>
