<body class="courses-list">
	<div class="container">
		<div class="jumbotron"><h1>Inscripciones</h1>
			<div class="col-lg-12 col-md-12" style="margin:10px auto">
				<img src="<?php echo IMAGES; ?>modelsview-PASOS-PARA-REGISTRARTE.jpg" class="img-responsive />
				<br><br> 
			</div >
		</div>
		
			<div class="col-lg-12 col-md-12"><br></div>
			<?php 
				foreach ($this->courses as $course) { ?>
				<a href="<?php echo URL; ?>courses/preregistration/<?php echo $course['slug']; ?>">
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 text-center courses-link">
						<img src="<?php echo IMAGES; ?>courses/<?php echo $course['slug']; ?>/course.jpg" class="img-responsive img-circle" />
						<h2><?php echo $course['name']; ?></h2>	
						<p><?php echo $course['description']; ?></p>
					</div>
				</a>
			<?php } 
			?>
	</div>