<h1 class="fixedtitle"><a href="#cursos-disponibles">Escuela de Modelos</a></h1>

<nav id="escuela-menu">	
	<ul>
        <a href="#cursos-disponibles">
            <li data-menuanchor="cursos">
                Cursos
            </li>
        </a>
		<?php 
			foreach ($this->courses as $course) { ?>
				<a href="#escuela-<?php echo $course['slug']; ?>">
					<li data-menuanchor="<?php echo $course['slug']; ?>">
                        <?php echo $course['name']; ?>

					</li>
				</a>
		<?php } ?>
	</ul>
</nav>

<div id="fullpage">
	<div class="section" id="cursos">
	</div>
	<?php foreach ($this->courses as $course) { ?>
   
	<div class="section" id="<?php echo $course['slug']; ?>">

        <div class="col-lg-12 nopadding register-instructions">
           <div class="col-lg-8 col-md-8 col-md-push-4">
                <div class="col-lg-2 text-center">
                    <i class="fa fa-4x fa-laptop"></i><br>
                    <h4>PASO 1</h4>
                </div>
                <div class="col-lg-2 text-center">
                    <i class="fa fa-4x fa-money"></i><br>
                    <h4>PASO 1</h4>
                </div>
                <div class="col-lg-2 text-center">
                    <i class="fa fa-4x fa-print"></i><br>
                    <h4>PASO 1</h4>
                </div>
                <div class="col-lg-2 text-center">
                    <i class="fa fa-4x fa-file-text-o"></i><br>
                    <h4>PASO 1</h4>
                </div>
                <div class="col-lg-4 text-center">
                    <a href="<?php echo URL; ?>academia/preregistration/<?php echo $course['slug']; ?>" class="btn btn-default btn-inscripciones" type="submit">Quiero Inscribirme</a>
                </div>
            </div>
        </div>
		<div class="col-lg-4 col-md-4 col-sm-4">
        </div>
        <!--div class="col-lg-4 col-md-4 col-sm-4 cronograma-materias"-->
           <?php 
                $t1 = false;    
                $t2 = false;    
                $t3 = false;    
                $t4 = false;    
                $t5 = false;    
                $band = false;
               foreach ($this->materias as $materia) 
               {  
                  
                  if($course['id'] == $materia['id_courses'])
                  {
                        switch ($materia['trimestre']) 
                        {
                            case '1':
                                if ($t1) 
                                { ?>
                                    <li><?php echo $materia['nombre_materia']; ?></li>       
                            <?php }     
                                else
                                { $t1 =true;$band = true;?>
                                    <div class="col-lg-4 col-md-4 col-sm-4 cronograma-materias">
                                     <h3>1er Trimestre</h3>
                                        <ul>
                                     <li><?php echo $materia['nombre_materia']; ?></li>  

                            <?php }

                                break;                            

                            case '2':
                                if ($t2) 
                                { ?>
                                    <li><?php echo $materia['nombre_materia']; ?></li>       
                            <?php }     
                                else
                                { $t2 =true;?>
                                    </ul>
                                     <h3>2do Trimestre</h3>
                                        <ul>
                                     <li><?php echo $materia['nombre_materia']; ?></li>  

                            <?php }

                                break;

                            case '3':
                                if ($t3) 
                                { ?>
                                    <li><?php echo $materia['nombre_materia']; ?></li>       
                            <?php }     
                                else
                                { $t3 =true;?>
                                    </ul>
                                     <h3>3er Trimestre</h3>
                                        <ul>
                                     <li><?php echo $materia['nombre_materia']; ?></li>  

                            <?php }

                                break;                           

                            case '4':
                                if ($t4) 
                                { ?>
                                    <li><?php echo $materia['nombre_materia']; ?></li>       
                            <?php }     
                                else
                                { $t4 =true;?>
                                    </ul>
                                     </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 cronograma-materias">
                                     <h3>4to Trimestre</h3>
                                        <ul>
                                     <li><?php echo $materia['nombre_materia']; ?></li>  

                            <?php }

                                break;

                            case '5':
                                if ($t5) 
                                { ?>
                                    <li><?php echo $materia['nombre_materia']; ?></li>       
                            <?php }     
                                else
                                { $t5 =true;?>
                                    </ul>
                                     <h3>5to Trimestre</h3>
                                        <ul>
                                     <li><?php echo $materia['nombre_materia']; ?></li>  

                            <?php }

                                break;
                            
                            default:
                                # code...
                                break;
                        }
                  }
                 
               } ?>
           </ul>
       </div>
            *El pensum esta sujeto a cambio sin previo aviso
	</div>
	<?php } ?>
</div>