<div style="background: rgba(112, 110, 154, 0.71); height:100%; ">
    
    <form id="complete-registration-cde" action="" novalidate="novalidate" class="stepform">
     <input type="hidden" name="tipo" required="required" value="bind">                     

      <!-- Asignacion de materia -->
      <br><br> 
      <fieldset id="registration-step1">
            <div class="seccion"><h3>ASIGNAR MATERIA</h3></div> 
              <div class="col-sm-12 col-lg-12">  
              </div>    
              
                <div class="col-sm-6 col-lg-6">
                      <select name="id_profesor" class="form-control input-lg" required>
                        <option value="" disabled selected>Profesores ...</option>
                        
                        <?php $profesores = $this -> profesores; 

                          foreach ($profesores as $profesor ) 
                          {
                              $aux = $profesor['nombre_profesor'].' - '.$profesor['username'];
                            ?>               
                           
                            <option value="<?php echo $profesor['id']; ?>"><?php echo  $aux; ?></option>
                          
                        <?php } unset($aux);?> 
                      </select>   
                </div>

                    <div class="col-sm-6 col-lg-6">
                      <select name="id_materia" class="form-control input-lg" required>
                        <option value="" disabled selected>Materia...</option>
                        
                        <?php $materias = $this -> materias; 

                          foreach ($materias as $materia ) 
                          {  
                             
                              $aux = $materia['nombre_materia'].' - '.$materia['name'];
                            ?>               
                          
                            <option value="<?php echo $materia['id']; ?>"><?php echo $aux; ?></option>
                            
                        <?php } ?> 


                      </select>
                    </div>
            
                                    
                        <div class="clearfix"></div>
                       <br>
                        <input type="submit" name="send" class="btn btn-success send" value="Listo!">
                        <input type="button" name="cancelar" class=" btn" value="- Cancelar -">
             </fieldset>
          
               
    </form>
              <div class="clearfix">&nbsp;</div>
  </div>
  <div id="response"></div>
