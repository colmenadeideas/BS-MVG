<div style="background: rgba(112, 110, 154, 0.71); height:100%; ">
    
    <form id="complete-registration-cde" action="post" novalidate="novalidate" class="stepform">

      <!-- Asignacion de periodo -->
      <br><br> 
      <script type="text/javascript">
      
      </script>

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
                      
                        <!--input type="button" name="cancelar" class="next btn" value="- Cancelar -"-->
        </fieldset>
       
        <fieldset id="registration-step2">  
                <div class="container col-sm-12 col-lg-12">
                    <div class="seccion"><h3>Registrar Nuevo Periodo </h3></div> 
                      
                      <?php 
                       $course;
                        foreach ($this->courses as $course) 
                        { 
                          if ($course['estatus'] != 'Inactivo') 
                          {
                            
                         
                          ?>
                       
                          <div class="col-lg-2 col-md-2 col-xs-6 text-center courses-link" style="min-height: 50px;">
                            <div class="col-sm-12 col-lg-12">
                                <input type="hidden" name="json" id="json" > 
                               <input type="checkbox" name="c[]" value="<?php echo $course['id']; ?>" id="<?php echo $course['slug']; ?>" onClick='
 
                                        if($("#<?php echo $course["slug"]; ?>").is(":checked")) {  

                                          if (typeof course2 === "undefined"){
                                              var course2 = {items:[]};
                                         
                                          }
                                          if($("#json").val()!=""){
                                            // = $("#json").val();
                                            course2 = JSON.parse( $("#json").val());
                                          }

                                          var _id = $("#<?php echo $course["slug"]; ?>").val();
                                          var _slug = $("#<?php echo $course["slug"]; ?>").attr("id");
                                          course2.items.push({"id": _id, "slug": _slug});
                                         //  course2["id"] = _id;
                                         //   course2["slug"] = _slug;
                                         $("#json").val(JSON.stringify(course2));
                                         console.log($("#json").val());

                                        } else {
                                          if (typeof course2 === "undefined"){
                                              var course2 = {items:[]};
                                          
                                          }
                                          if($("#json").val()!=""){
                                            // = $("#json").val();
                                            course2 = JSON.parse( $("#json").val());
                                          }
                                          var _id = $("#<?php echo $course["slug"]; ?>").val();
                                          console.log(course2)
                                          console.log(+"id"+" "+_id);
                                          course2.items = course2.items.filter(function(el){ return el.id != _id; });
                                          $("#json").val(JSON.stringify(course2));
                                          console.log($("#json").val());

                                        };

                                        function findAndRemove(array, property, value) {
                                          array.forEach(function(result, index) {
                                            if(result[property] === value) {
                                              //Remove from array
                                              array.splice(index, 1);
                                            }    
                                          });
                                        };'><br>

                                <img src="<?php echo IMAGES; ?>courses/<?php echo $course['slug']; ?>/course.jpg" class="img-responsive img-circle" />
                              
                                
                            </div>
                           
                            <h4><?php echo $course['name']; ?></h4> 
                            <p><?php echo $course['description']; ?></p>
                              <?php 
                                if ( empty($course['id_pensum']) ) 
                                {?>
                                  <h6> no tiene pensum</h6> 
                               <?php  }
                                ?>
                          </div>
                       
                      <?php 
                    }
                       } ?>
                  </div>    
    



                         <div class="clearfix"></div>
                          <input type="button" name="previous" class="previous btn" value="« Anterior">
                          <input type="button" name="next" class="next btn" value="Siguiente »">
                          <!--input type="submit" name="submit" class="next btn" value="Siguiente »"-->

        </fieldset>
        
          <fieldset id="registration-step4">
                  <div class="seccion"><h3>Nuevo Periodo</h3></div>
                       <?php foreach ($this->courses as $course) 
                        {     
                              if ( !empty($course['id_pensum']) )
                              {
                                
                           
                          ?>  
                                    

                                    <div>
                                            <div class="col-sm-12 col-lg-12 ">
                                              <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo"><?php echo $course['name']; ?></button>
                                                    <div id="demo" class="collapse">
                                                         <div class="col-lg-2 col-md-2 col-xs-6 text-center courses-link" style="min-height: 50px;">
                            <div class="col-sm-12 col-lg-12">
                                <input type="hidden" name="json" id="json" > 
                               <input type="checkbox" name="c[]" value="<?php echo $course['id']; ?>" id="" ><br>

                                <img src="<?php echo IMAGES; ?>courses/<?php echo $course['slug']; ?>/course.jpg" class="img-responsive img-circle" />
                              
                                
                            </div>
                           
                            <h4><?php echo $course['name']; ?></h4> 
                            <p><?php echo $course['description']; ?></p>
                              <?php 
                                if ( empty($course['id_pensum']) ) 
                                {?>
                                  <h6> no tiene pensum</h6> 
                               <?php  }
                                ?>
                          </div>
                                                    </div> 
                                             </div>
                                    </div>
                
                       <?php 
                    
                       } 
                          }?>
                
                    <div class="clearfix"></div>
                    <input type="button" name="previous" class="previous btn" value="« Anterior">
                    <input type="submit" name="submit" class="btn btn-success" value="Listo!">
                        
                  </fieldset>
              
              <div class="clearfix">&nbsp;</div>


    </form>
              <div class="clearfix">&nbsp;</div>
  </div>
  <div id="response"></div>
