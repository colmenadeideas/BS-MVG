<div class="col-lg-12 col-xs-12">
	<div class="jumbotron text-center">
		<h2><span class="name"><?php echo $this -> student[0]['name']; ?></span>, Completa tu inscripción</h2>
  
    <?php
         
          $registros = $this -> registros;
          sizeof($registros);
     ?> 
	</div>

	<h2 class="text-center">Cursos inscritos<br><br></h2>

 </div>


	<div class="col-lg-12 col-sm-12 well">
		<!--?php echo $this->courseinfo[0]['step1_instructions']; ?-->
       
      <div class="col-lg-12" style="padding-top: 5%; padding-bottom: 5%; padding-left: 5%; padding-right: 5%;" align="center">

              <?php foreach ($registros as $key => $registro) {

                $nombre = json_decode($registro['data']);
                $name= $nombre->{'name'} ;
                
                ?> 

                <div class="col-lg-4">

                    <a href="#registration/verify/<?php echo $registro['id']; ?>" class="btn btn-lg btn-success action-view showtooltip">
                    <center> <i  class="fa fa-user fa-lg"></i> <br> <?php echo $name; ?> <br> <?php echo $registro['horario-slug']; ?> </center> 
                    </a>
                </div>     
                <?php } ?> 
        </div>

	
</div>
