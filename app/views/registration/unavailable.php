<body class="unavailable">
	<div class="container">
		<div class="jumbotron">			
			
			<h1>¡Lo sentimos!</h1>	
			<h3>Al momento no hay fechas disponibles de apertura para curso <?php echo $this->course[0]['name']; ?></h3>
			<h4>Si quieres ser notificado de nuestras próximas aperturas, suscribete</h4>
		</div>
		
			
		
		<div class="col-sm-11 col-lg-11 col-lg-push-1 col-sm-push-1">
			<?php $this->render('subscription/form'); ?>
		</div>
		<div id="response" class="col-sm-11 col-lg-11 col-lg-push-1 col-sm-push-1">			
		</div>
		<div class="col-sm-11 col-lg-11 col-lg-push-1 col-sm-push-1">
			<br>
			<a href="<?php echo URL; ?>courses"> Ver otras inscripciones</a>
		</div>
	</div>