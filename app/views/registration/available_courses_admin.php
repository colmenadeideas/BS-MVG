	<div class="container col-sm-12 col-lg-12">
		<div class="jumbotron"><h1>Inscripciones</h1></div>
			
			<?php 
				foreach ($this->courses as $course) { ?>
				<a href="<?php echo URL; ?>courses/fullregistration/<?php echo $course['slug']; ?>">
					<div class="col-lg-2 col-md-2 col-xs-6 text-center courses-link">
						<img src="<?php echo IMAGES; ?>courses/<?php echo $course['slug']; ?>/course.jpg" class="img-responsive img-circle" />
						<h2><?php echo $course['name']; ?></h2>	
						<p><?php echo $course['description']; ?></p>
					</div>
				</a>
			<?php } ?>
	</div>