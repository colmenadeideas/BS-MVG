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
        <div class="col-lg-4 col-md-4 col-sm-4 cronograma-materias">
            <h3>1er Trimestre</h3>
            <ul>
                <li>Pasarela</li>
                <li>Fashion Art</li>
                <li>Actuación</li>
                <li>Coreografía</li>
            </ul>
            <h3>2do Trimestre</h3>
            <ul>
                <li>Fotopose</li>
                <li>Coreografía II</li>
                <li>Protocolo</li>
                <li>Lectura de Cuentos</li>
            </ul>

            <h3>3er Trimestre</h3>
            <ul>
                <li>Fashion Art</li>
                <li>Pasarella II</li>
                <li>Yoga</li>
                <li>Actuación</li>
            </ul>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 cronograma-materias">
            <h3>4to Trimestre</h3>
            <ul>
                <li>Coreografía III</li>
                <li>Fotopose II</li>
                <li>Pasarella III</li>
                <li>Cocina sin gluten</li>
            </ul>

            <h3>5to Trimestre</h3>
            <ul>
                <li>Pre-producción</li>
                <li>Estilismo</li>
                <li>Maquillaje</li>
                <li>Coreografía IV</li>
                <li>Pasarella IV</li>
                <li>Actuación</li>
                <li>Producción</li>
                <li>Ensayo</li>
                <li>Presentación</li>
            </ul>
        </div>

        *El pensum esta sujeto a cambio sin previo aviso
	</div>
	<?php } ?>
</div>