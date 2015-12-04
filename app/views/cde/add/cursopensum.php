<div style="background: rgba(112, 110, 154, 0.71); height:100%; ">
    
    <form id="complete-registration-cde" action="" novalidate="novalidate" class="stepform">

    
      <!-- Asignacion de materia-->
      <br><br> 
      <fieldset id="registration-step1">
            <div class="seccion"><h3>Actualizar pensum</h3></div> 
              <div class="col-sm-12 col-lg-12">  
                  <center>
                    <div class="col-sm-8 col-lg-8 center">
                      <select name="courses" class="form-control input-lg" >
                        <option value="" disabled selected>Curso</option>
                        <?php $course_lists  = $this -> course_lists; 

                          foreach ($course_lists  as $course_list  ) 
                          {  ?>               
                          
                            <option value="<?php echo $course_list['id']; ?>"><?php echo $course_list['name']; ?></option>
                          
                        <?php } ?>  

                                              
                      </select>
                    </div>
                   </center>            
             </div>    
                                                  
                        <div class="clearfix"></div>
                        <br>
                        <input type="button" name="guardar" class="next btn" value="- Guardar -">
                        <input type="button" name="cancelar" class="next btn" value="- Cancelar -">
             </fieldset>
          
               
    </form>
              <div class="clearfix">&nbsp;</div>
  </div>
  <div id="response"></div>

