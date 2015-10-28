<!DOCTYPE html>
<html lang="es">

<head>	
	<meta charset="<?php echo DB_ENCODE; ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.gif">
    
    <title><?php echo $this->title; ?></title>
	
	<link href="<?php echo CSS; ?>bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo CSS; ?>styles.css" rel="stylesheet">
	<link href="<?php echo CSS;?>all.css" rel="stylesheet">  
	
	<?php echo GOOGLE_FONTS; ?>
	
	<script src="<?php echo JS; ?>config.js"></script>
    <script data-main="<?php echo JS;?>main-app" src="<?php echo JS; ?>require.js"></script>
    
	<!--Start of Zopim Live Chat Script-->
		<script type="text/javascript">
		window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
		d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
		_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
		$.src="//v2.zopim.com/?36Eh9ErfCOUUsGykeTib79eS0Uphe3NX";z.t=+new Date;$.
		type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
		</script>
	<!--End of Zopim Live Chat Script-->
</head>


	<body class="login-screen">
		<div class="container">
			

			<div class="col-lg-6 col-sm-6 col-lg-push-3 col-sm-push-3">
				<?php $this->render('login/loginbox'); ?>
				<div id="response"></div>
			</div>
			
			
		</div>
			<!--Recover Password-->
			<div class="modal fade modalbox" id="password-recovery" role="dialog" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header modalhead">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
								&times;
							</button>
						</div>
						<div class="modal-body">
							<form role="form" method="post">
								<fieldset>
									<h3>Recuperación de Contraseña</h3>
									<label> Ingrese su correo electrónico</label>
									<div class="form-group">
										<input type="email" name="recover-password" id="recover-password" class="form-control input-lg" placeholder="usuario o email" required>
									</div>
											
									<div class="row">
										<div class="col-md-offset-6 col-xm-offset-6 col-xs-offset-6 col-xs-6 col-sm-6 col-md-6">
											<input type="submit" class="btn btn-lg btn-success btn-block recovery-send" value="Entrar">
										</div>
									</div>
								</fieldset>
							</form>

							<div id="recovery-response"></div>
						</div>
	
					</div>
				</div>
			</div>
	</body>
</html>