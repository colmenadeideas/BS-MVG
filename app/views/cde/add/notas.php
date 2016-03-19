<?php $cursos = $this->cursos;     ?>

<div style="background: rgba(112, 110, 154, 0.71); height:100%; ">
    <!-- complete-registration-cde-->
    <form id="complete-registration-notas" action="post" novalidate="novalidate" class="stepform">
      <!-- Asignacion de periodo -->
      <fieldset id="registration-step1">              
            <div class="seccion"><h3>Cargar Notas </h3></div> 
 
                <div class="col-sm-6 col-lg-6">  
                    <h4>Seleccione curso</h4>   
                     <select name="curso" >
                        <?php 
                          foreach ($cursos as $curso) 
                          {?>
                              <option value="<?php echo $curso['id']; ?>"><?php echo $curso['name']; ?></option>
                          
                          <?php  } ?>

                     </select>                                                                                
                </div>  

                <div class="col-sm-6 col-lg-6">  
                    <h4>Seleccione trimestre</h4>   
                     <select name="trimestre" >
                          <option value="1">Trimestre 1</option>
                          <option value="2">Trimestre 2</option>
                          <option value="3">Trimestre 3</option>
                          <option value="4">Trimestre 4</option>
                          <option value="5">Trimestre 5</option>
                     </select>                                                                                
                </div>                       
            <div class="clearfix"></div>
            <br>   <input type="button" name="next" class="next btn" value="Siguiente »">                                           
        </fieldset>
       
        <fieldset id="registration-step2">  
              <div class="seccion"><h3>Cargar Notas </h3></div> 
              <div class="col-sm-12 col-lg-12">



              </div>  

        </fieldset>
        
   
    </form>
              <div class="clearfix">&nbsp;</div>
  </div>
  <div id="response"></div>
