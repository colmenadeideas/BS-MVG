<?php
	require_once ("es_ES/cde.php");

	//Sistem messages
	define ('SYSTEM_INVALID_PASSWORD','Contraseña incorrecta');
	define ('SYSTEM_PASSWORD_CHANGE','Cambio de Password realizado');
	define ('USER_INACTIVE_MESSAGE', 'Estuvo inactivo mucho tiempo.\nPor favor, inicie sesión de nuevo');
	define ('ACTIVATION_USER_SUBJECT', 'Activacion de Usuario en '. SITE_NAME );
	define ('ERROR_AUTHENTICATE', 'Ha ocurrido un error. La cuenta no ha podido activarse. Por favor contacte al administrador' );
	define('RESTICTED_AREA_SESSION','Lo siento, no tiene permisos suficientes para esta acción');
	define('CONTACT_PHONENUMBER','(0241) 8257693');
	define('CONTACT_EMAIL','mercadeo@modelsviewgroup.com');
	
	define('COURSES_ALREADYREGISTERED_MESSAGE','<div class="alert alert-warning"><h3>Lo siento, ¡Ya te has inscrito previamente! Revisa tu bandeja de correo donde hemos enviado las instrucciones para continuar con tu registro, o contáctanos al '.CONTACT_PHONENUMBER.'</h3></div>');
	define('COURSES_SUCCESS_REGISTRATION_MESSAGE', '<div class="alert alert-success"><h3>¡Felicidades! Has comenzado tu proceso de inscripción</h3><br> <h4>Revisa tu bandeja de correo y sigue las instrucciones que te hemos enviado</h4></div>');
	
	//EMAIL COLORS
	define('SYSTEM_EMAIL_BGCOLOR', '#E4C4f0');
	define('SYSTEM_EMAIL_HEADCOLOR', '#000');
	define('SYSTEM_EMAIL_BUTTONSCOLOR', '#5CB85C');
	define('SYSTEM_CANCEL_BUTTONSCOLOR', 'DARKGREY');
	
	
	
	define('REGISTRATION_EMAIL_BGCOLOR', '#FF0099');
	define('REGISTRATION_EMAIL_HEADCOLOR', '#FFF');
	
	define('NEWSLETTER_EMAIL_BGCOLOR', '#B4F9FF');
	define('NEWSLETTER_EMAIL_HEADCOLOR', '#FFF');	
	
	//EMAIL MESSAGES
	//EMAIL Head & Footer
	define('SYSTEM_SIMPLE_EMAIL_HEAD', '<table width="100%" height="100%" cellpadding="0" bgcolor="'.SYSTEM_EMAIL_BGCOLOR.'" style="font-size:medium;font-family:Arial,Helvetica,sans-serif;padding:0px">
		<tbody><tr align="center"><td>
			<table width="575px" height="40px" cellpadding="0" cellspacing="0" bgcolor="#FFF" style="font-family:Arial,Helvetica,sans-serif;padding:10px 15px 0px 15px;margin:40px 0px 0px;border-top-left-radius:6px;border-top-right-radius:6px">
				<tbody><tr><td><span style="font-family:Raleway,Arial,Helvetica,sans-serif;color:#FFFFFF"><img src="'.URL_EMAIL.'img/email/logo-center.gif" alt="'.SITE_NAME.'"></font></td>
					</tr></tbody></table>
			<table width="575px" height="40px" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="font-family:Arial,Helvetica,sans-serif;padding:0px 20px">
				<tbody><tr><td width="575px"  style="padding:20px 0px;margin-top:20px"><span style="letter-spacing:-0.5px;line-height:23px;font-family:Raleway,
				Arial,Helvetica,sans-serif;font-weight:normal;font-size:18px;color:#2c2d25">');
				
	define('SYSTEM_SIMPLE_EMAIL_FOOTER', '</td></tr><tr><td style="padding-top:0px;border-bottom-left-radius: 6px;border-bottom-right-radius: 6px;">
							</td></tr></tbody></table><table width="575px" height="20px" bgcolor="#FFF" style="padding-top:20px;margin-bottom:40px;border-bottom-left-radius: 
							6px;border-bottom-right-radius: 6px;"><tbody></tr></tbody></table></td></tr></tbody></table>');
							
	define('SYSTEM_EMAIL__PASSWORD_CHANGE', 'Este email es para notificarte que hubo un cambio en tu contraseña.<br><br>
					Si no solicitaste este cambio, contacta al administrador de la página<br><br>
					<table cellspacing="0" cellpadding="0"> <tr> 
					<td align="center" width="130" height="40" bgcolor="'.SYSTEM_EMAIL_BUTTONSCOLOR.'" style="-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; color: #ffffff; display: block;">
					<a href="'.URL .'" style="color: #ffffff; font-size:16px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; text-decoration: none; line-height:40px; width:100%; display:inline-block">Ir al Sistema</a>
					</td></tr></table>');
	
	//EMAIL Head & Footer
	define('SETTINGS_EMAIL_HEAD', '<table width="100%" height="100%" cellpadding="0" bgcolor="'.SYSTEM_EMAIL_BGCOLOR.'" style="font-size:medium;font-family:Arial,Helvetica,sans-serif;padding:0px">
		<tbody><tr align="center"><td>
			<table width="575px" height="40px" cellpadding="0" cellspacing="0" bgcolor="'.SYSTEM_EMAIL_HEADCOLOR.'" style="font-family:Arial,Helvetica,sans-serif;padding:20px 45px;margin:40px 0px 0px;border-top-left-radius:6px;border-top-right-radius:6px">
				<tbody><tr><td><span style="font-family:Raleway,Arial,Helvetica,sans-serif;color:#FFFFFF"><img src="'.URL_EMAIL.'img/email/logo.jpg" alt="'.SITE_NAME.'"></font></td>
					</tr></tbody></table>
			<table width="575px" height="40px" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="font-family:Arial,Helvetica,sans-serif;padding:0px 20px">
				<tbody><tr><td width="575px"  style="padding:20px 0px;margin-top:20px"><span style="letter-spacing:-0.5px;line-height:23px;font-family:Raleway,
				Arial,Helvetica,sans-serif;font-weight:normal;font-size:18px;color:#2c2d25">');
				
	define('SETTINGS_EMAIL_FOOTER', '</td></tr><tr><td style="padding-top:20px;border-bottom-left-radius: 6px;border-bottom-right-radius: 6px;">
							</td></tr></tbody></table><table width="575px" height="20px" bgcolor="#FFF" style="padding-top:20px;margin-bottom:40px;border-bottom-left-radius: 
							6px;border-bottom-right-radius: 6px;"><tbody></tr></tbody></table></td></tr></tbody></table>');
	
	//EMAIL USER ACTIVATION
	define('SYSTEM_EMAIL__USER_ACTIVATION_MESSAGE_PART1', 'Se ha generado un usuario para tu acceso al sistema.<br>						
						Para continuar y aprobar el proceso de activación debes hacer click en el siguiente link<br><br>
						<table cellspacing="0" cellpadding="0"> <tr> 
<td align="center" width="130" height="40" bgcolor="'.SYSTEM_EMAIL_BUTTONSCOLOR.'" style="-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; color: #ffffff; display: block;">' );

	define('SYSTEM_EMAIL__USER_ACTIVATION_MESSAGE_PART2', '</td></tr></table>');
	
	
	//DISCOUNT EMAIL
	
	//EMAIL Head & Footer
	define('DISCOUNT_EMAIL_HEAD', '<table width="100%" height="100%" cellpadding="0" bgcolor="#FF0099" style="font-size:medium;font-family:Arial,Helvetica,sans-serif;padding:0px">
		<tbody><tr align="center"><td>
			<table width="575px" height="40px" cellpadding="0" cellspacing="0" bgcolor="#FFF" style="font-family:Arial,Helvetica,sans-serif;padding:10px 15px 0px 15px;margin:40px 0px 0px;border-top-left-radius:6px;border-top-right-radius:6px">
				<tbody><tr><td><span style="font-family:Raleway,Arial,Helvetica,sans-serif;color:#FFFFFF"><img src="'.URL_EMAIL.'img/email/logo-center.gif" alt="'.SITE_NAME.'"></font></td>
					</tr></tbody></table>
			<table width="575px" height="40px" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="font-family:Arial,Helvetica,sans-serif;padding:0px 20px">
				<tbody><tr><td width="575px"  style="padding:20px 0px;margin-top:20px"><span style="letter-spacing:-0.5px;line-height:23px;font-family:Raleway,
				Arial,Helvetica,sans-serif;font-weight:normal;font-size:18px;color:#2C2D25">');
		
				
	define('DISCOUNT_EMAIL__SUBJECT', ' TIENES UN DESCUENTO EN EL PAGO DE TU CURSO');
	define('DISCOUNT_EMAIL__MESSAGE_PART1', '<p><center> para realizar tu inscripcion al curso </p> </center><br><h3>Puedes hacer uso de este descuento ingresando este codigo en la confirmación de tu pago</h3><br>');
	define('DISCOUNT_EMAIL__MESSAGE_PART2', '<table cellspacing="0" align="center" cellpadding="0"> <tr> 
					<td align="center" width="130" height="40" bgcolor="'.SYSTEM_EMAIL_BUTTONSCOLOR.'" style="-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; color: #ffffff; display: block;">
					<a href="'.URL .'" style="color: #ffffff; font-size:16px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; text-decoration: none; line-height:40px; width:100%; display:inline-block">Ir al Sistema</a>
					</td></tr></table>');
					
					
	
	//EMAIL REGISTRATION COURSES
	
	//EMAIL Head & Footer
//1---BABY MODEL	
	define('REGISTRATION_EMAIL_BABYMODEL_BG', '<table width="100%" height="100%" cellpadding="0" bgcolor="#ED008C" style="padding:0px">');
	define('REGISTRATION_EMAIL_BABYMODEL_HEAD', '<tbody><tr align="center"><td>
			<table width="575px" height="40px" cellpadding="0" cellspacing="0" bgcolor="'.REGISTRATION_EMAIL_HEADCOLOR.'" style="font-family:Arial,Helvetica,sans-serif;padding:0px 0px;margin:40px 0px 0px;border-top-left-radius:6px;border-top-right-radius:6px">
				<tbody><tr><td><span style="font-family:Raleway,Arial,Helvetica,sans-serif;color:#FFFFFF"><img src="'.URL_EMAIL.'images/courses/baby-model/email-head.jpg" alt="'.SITE_NAME.'"></font></td>
					</tr></tbody></table>
			<table width="575px" height="40px" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="font-family:Arial,Helvetica,sans-serif;padding:0px 20px">
				<tbody><tr><td width="575px"  style="padding:20px 0px;margin-top:20px"><span style="letter-spacing:-0.5px;line-height:23px;font-family:Raleway,
				Arial,Helvetica,sans-serif;font-weight:normal;font-size:18px;color:#2c2d25">');
//2---INFANTIL	
	define('REGISTRATION_EMAIL_INFANTIL_BG', '<table width="100%" height="100%" cellpadding="0" bgcolor="#ED008C"  style="padding:0px">');
	define('REGISTRATION_EMAIL_INFANTIL_HEAD', '<tbody><tr align="center"><td>
			<table width="575px" height="40px" cellpadding="0" cellspacing="0" bgcolor="'.REGISTRATION_EMAIL_HEADCOLOR.'" style="font-family:Arial,Helvetica,sans-serif;padding:0px 0px;margin:40px 0px 0px;border-top-left-radius:6px;border-top-right-radius:6px">
				<tbody><tr><td><span style="font-family:Raleway,Arial,Helvetica,sans-serif;color:#FFFFFF"><img src="'.URL_EMAIL.'images/courses/infantil/email-head.jpg" alt="'.SITE_NAME.'"></font></td>
					</tr></tbody></table>
			<table width="575px" height="40px" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="font-family:Arial,Helvetica,sans-serif;padding:0px 20px">
				<tbody><tr><td width="575px"  style="padding:20px 0px;margin-top:20px"><span style="letter-spacing:-0.5px;line-height:23px;font-family:Raleway,
				Arial,Helvetica,sans-serif;font-weight:normal;font-size:18px;color:#2c2d25">');
//3---PRE JUVENIL	
	define('REGISTRATION_EMAIL_PREJUVENIL_BG', '<table width="100%" height="100%" cellpadding="0" bgcolor="#ED008C"  style="padding:0px">');
	define('REGISTRATION_EMAIL_PREJUVENIL_HEAD', '<tbody><tr align="center"><td>
			<table width="575px" height="40px" cellpadding="0" cellspacing="0" bgcolor="'.REGISTRATION_EMAIL_HEADCOLOR.'" style="font-family:Arial,Helvetica,sans-serif;padding:0px 0px;margin:40px 0px 0px;border-top-left-radius:6px;border-top-right-radius:6px">
				<tbody><tr><td><span style="font-family:Raleway,Arial,Helvetica,sans-serif;color:#FFFFFF"><img src="'.URL_EMAIL.'images/courses/pre-juvenil/email-head.jpg" alt="'.SITE_NAME.'"></font></td>
					</tr></tbody></table>
			<table width="575px" height="40px" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="font-family:Arial,Helvetica,sans-serif;padding:0px 20px">
				<tbody><tr><td width="575px"  style="padding:20px 0px;margin-top:20px"><span style="letter-spacing:-0.5px;line-height:23px;font-family:Raleway,
				Arial,Helvetica,sans-serif;font-weight:normal;font-size:18px;color:#2c2d25">');
//4---JUVENIL
	define('REGISTRATION_EMAIL_JUVENIL_BG', '<table width="100%" height="100%" cellpadding="0" bgcolor="#ED008C"  style="padding:0px">');
	define('REGISTRATION_EMAIL_JUVENIL_HEAD', '<tbody><tr align="center"><td>
			<table width="575px" height="40px" cellpadding="0" cellspacing="0" bgcolor="'.REGISTRATION_EMAIL_HEADCOLOR.'" style="font-family:Arial,Helvetica,sans-serif;padding:0px 0px;margin:40px 0px 0px;border-top-left-radius:6px;border-top-right-radius:6px">
				<tbody><tr><td><span style="font-family:Raleway,Arial,Helvetica,sans-serif;color:#FFFFFF"><img src="'.URL_EMAIL.'images/courses/juvenil/email-head.jpg" alt="'.SITE_NAME.'"></font></td>
					</tr></tbody></table>
			<table width="575px" height="40px" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="font-family:Arial,Helvetica,sans-serif;padding:0px 20px">
				<tbody><tr><td width="575px"  style="padding:20px 0px;margin-top:20px"><span style="letter-spacing:-0.5px;line-height:23px;font-family:Raleway,
				Arial,Helvetica,sans-serif;font-weight:normal;font-size:18px;color:#2c2d25">');
//5---ONLY FOR MEN	
	define('REGISTRATION_EMAIL_ONLYFORMEN_BG', '<table width="100%" height="100%" cellpadding="0" bgcolor="#2EC4DD"  style="padding:0px">');
	define('REGISTRATION_EMAIL_ONLYFORMEN_HEAD', '<tbody><tr align="center"><td>
			<table width="575px" height="40px" cellpadding="0" cellspacing="0" bgcolor="'.REGISTRATION_EMAIL_HEADCOLOR.'" style="font-family:Arial,Helvetica,sans-serif;padding:0px 0px;margin:40px 0px 0px;border-top-left-radius:6px;border-top-right-radius:6px">
				<tbody><tr><td><span style="font-family:Raleway,Arial,Helvetica,sans-serif;color:#FFFFFF"><img src="'.URL_EMAIL.'images/courses/only-for-men/email-head.jpg" alt="'.SITE_NAME.'"></font></td>
					</tr></tbody></table>
			<table width="575px" height="40px" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="font-family:Arial,Helvetica,sans-serif;padding:0px 20px">
				<tbody><tr><td width="575px"  style="padding:20px 0px;margin-top:20px"><span style="letter-spacing:-0.5px;line-height:23px;font-family:Raleway,
				Arial,Helvetica,sans-serif;font-weight:normal;font-size:18px;color:#2c2d25">');
//6---5 ESTRELLAS	
	define('REGISTRATION_EMAIL_5ESTRELLAS_BG', '<table width="100%" height="100%" cellpadding="0" bgcolor="#000000"  style="padding:0px">');
	define('REGISTRATION_EMAIL_5ESTRELLAS_HEAD', '<tbody><tr align="center"><td>
			<table width="575px" height="40px" cellpadding="0" cellspacing="0" bgcolor="'.REGISTRATION_EMAIL_HEADCOLOR.'" style="font-family:Arial,Helvetica,sans-serif;padding:0px 0px;margin:40px 0px 0px;border-top-left-radius:6px;border-top-right-radius:6px">
				<tbody><tr><td><span style="font-family:Raleway,Arial,Helvetica,sans-serif;color:#FFFFFF"><img src="'.URL_EMAIL.'images/courses/certificacion-5-estrellas/email-head.jpg" alt="'.SITE_NAME.'"></font></td>
					</tr></tbody></table>
			<table width="575px" height="40px" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="font-family:Arial,Helvetica,sans-serif;padding:0px 20px">
				<tbody><tr><td width="575px"  style="padding:20px 0px;margin-top:20px"><span style="letter-spacing:-0.5px;line-height:23px;font-family:Raleway,
				Arial,Helvetica,sans-serif;font-weight:normal;font-size:18px;color:#2c2d25">');
//7--TALLER MAQUILLAJE
	define('REGISTRATION_EMAIL_TALLERMAQUILLAJE_BG', '<table width="100%" height="100%" cellpadding="0" bgcolor="#FD5360" background="'.URL_EMAIL.'images/courses/taller-automaquillaje/email-bg.jpg" style="padding:0px">');
	define('REGISTRATION_EMAIL_TALLERMAQUILLAJE_HEAD', '<tbody><tr align="center"><td>
			<table width="575px" height="40px" cellpadding="0" cellspacing="0" bgcolor="'.REGISTRATION_EMAIL_HEADCOLOR.'" style="font-family:Arial,Helvetica,sans-serif;padding:0px 0px;margin:40px 0px 0px;border-top-left-radius:6px;border-top-right-radius:6px">
				<tbody><tr><td><span style="font-family:Raleway,Arial,Helvetica,sans-serif;color:#FFFFFF"><img src="'.URL_EMAIL.'images/courses/taller-automaquillaje/email-head.jpg" alt="'.SITE_NAME.'"></font></td>
					</tr></tbody></table>
			<table width="575px" height="40px" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="font-family:Arial,Helvetica,sans-serif;padding:0px 20px">
				<tbody><tr><td width="575px"  style="padding:20px 0px;margin-top:20px"><span style="letter-spacing:-0.5px;line-height:23px;font-family:Raleway,
				Arial,Helvetica,sans-serif;font-weight:normal;font-size:18px;color:#2c2d25">');	
//8--MODEL LOOK	
	define('REGISTRATION_EMAIL_MODELSLOOK_BG', '<table width="650px" height="100%" cellpadding="0" bgcolor="#E0DFDD" align="center" style="background-image:url('.URL_EMAIL.'images/courses/model-look/email-bg.jpg); background-repeat:no-repeat;padding:0px">');
	define('REGISTRATION_EMAIL_MODELSLOOK_HEAD', '<tbody><tr align="center">
            <td width="240"></td>
            <td>
			<table width="300px" height="300px" cellpadding="0" cellspacing="0" style="font-family:Arial,Helvetica,sans-serif;padding:0px 0px;margin:40px 0px 0px;border-top-left-radius:6px;border-top-right-radius:6px">
				<tbody><tr><td><span style="font-family:Raleway,Arial,Helvetica,sans-serif;color:#FFFFFF"></font></td>
			</tr></tbody></table>
			<table width="300px" height="40px" cellpadding="0" cellspacing="0"  style="font-family:Arial,Helvetica,sans-serif;padding:0px ">
				<tbody><tr>
				<td width="300px"  style="padding:0px;margin-top:20px">
				<span style="letter-spacing:-0.5px;line-height:23px;font-family:Raleway,
				Arial,Helvetica,sans-serif;font-weight:normal;font-size:18px;color:#2c2d25">');	
//8--MODEL LOOK	 JUVENIL
	define('REGISTRATION_EMAIL_MODELSLOOK_JUVENIL_BG', '<table width="650px" height="100%" cellpadding="0" bgcolor="#E0DFDD" align="center" style="background-image:url('.URL_EMAIL.'images/courses/model-look-juvenil/email-bg.jpg); background-repeat:no-repeat;padding:0px">');
	define('REGISTRATION_EMAIL_MODELSLOOK_JUVENIL_HEAD', '
	<tbody><tr align="center">
            <td width="260"></td>
            <td>
			<table width="300px" height="300px" cellpadding="0" cellspacing="0" style="font-family:Arial,Helvetica,sans-serif;padding:0px 0px;margin:40px 0px 0px;border-top-left-radius:6px;border-top-right-radius:6px">
				<tbody><tr><td><span style="font-family:Raleway,Arial,Helvetica,sans-serif;color:#FFFFFF"></font></td>
					</tr></tbody></table>
			<table width="300px" height="40px" cellpadding="0" cellspacing="0"  style="font-family:Arial,Helvetica,sans-serif;padding:0px">
				<tbody><tr><td width="300px"  style="padding:0px;margin-top:20px"><span style="letter-spacing:-0.5px;line-height:23px;font-family:Raleway,
				Arial,Helvetica,sans-serif;font-weight:normal;font-size:18px;color:#2c2d25">');		
				//'.URL_EMAIL.'
				
				
							
				
				
				
				
	//define('REGISTRATION_EMAIL_HEAD', '<table width="100%" height="100%" cellpadding="0" background="'.REGISTRATION_EMAIL_BGCOLOR.'" style="font-size:medium;font-family:Arial,Helvetica,sans-serif;padding:0px">
	define('REGISTRATION_EMAIL_DEFAULT_BG', '<table width="100%" height="100%" cellpadding="0" background="grey" style="padding:0px">');
	define('REGISTRATION_EMAIL_HEAD', '<tbody><tr align="center"><td>
			<table width="100%" height="40px" cellpadding="0" cellspacing="0" bgcolor="'.REGISTRATION_EMAIL_HEADCOLOR.'" style="font-family:Arial,Helvetica,sans-serif;padding:20px 45px;margin:40px 0px 0px;border-top-left-radius:6px;border-top-right-radius:6px">
				<tbody><tr><td><span style="font-family:Raleway,Arial,Helvetica,sans-serif;color:#FFFFFF"><img src="'.URL_EMAIL.'img/email/logo.jpg" alt="'.SITE_NAME.'"></font></td>
					</tr></tbody></table>
			<table width="575px" height="40px" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="font-family:Arial,Helvetica,sans-serif;padding:0px 20px">
				<tbody><tr><td width="575px"  style="padding:20px 0px;margin-top:20px"><span style="letter-spacing:-0.5px;line-height:23px;font-family:Raleway,
				Arial,Helvetica,sans-serif;font-weight:normal;font-size:18px;color:#2c2d25">');
				
	define('REGISTRATION_EMAIL_DEFAULT_HEAD', '<tbody><tr align="center"><td>
			<table width="100%" height="40px" cellpadding="0" cellspacing="0" bgcolor="'.REGISTRATION_EMAIL_HEADCOLOR.'" style="font-family:Arial,Helvetica,sans-serif;padding:20px 45px;margin:40px 35% 0px 35%;border-top-left-radius:6px;border-top-right-radius:6px">
				<tbody><tr><td><span style="font-family:Raleway,Arial,Helvetica,sans-serif;color:#FFFFFF"><img src="'.URL_EMAIL.'img/email/logo.jpg" alt="'.SITE_NAME.'"></font></td>
					</tr></tbody></table>
			<table width="575px" height="40px" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="font-family:Arial,Helvetica,sans-serif;padding:0px 20px">
				<tbody><tr><td width="575px"  style="padding:20px 0px;margin-top:20px"><span style="letter-spacing:-0.5px;line-height:23px;font-family:Raleway,
				Arial,Helvetica,sans-serif;font-weight:normal;font-size:18px;color:#2c2d25">');			
				
	define('REGISTRATION_EMAIL_FOOTER', '</td></tr><tr><td style="padding-top:20px;border-bottom-left-radius: 6px;border-bottom-right-radius: 6px;">
							</td></tr></tbody></table><table width="575px" height="20px" bgcolor="#FFF" style="padding-top:20px;margin-bottom:40px;border-bottom-left-radius: 
							6px;border-bottom-right-radius: 6px;"><tbody></tr></tbody></table></td></tr></tbody></table>');
	
	define('REGISTRATION_EMAIL__STEP_1_SUBJECT', 'Paso 1: Completa tu inscripción');
	define('REGISTRATION_EMAIL__STEP_1_MESSAGE_PART1', '<h2>¡Felicidades!</h2> Tu seleccionaste =>:<br>');
	//define('REGISTRATION_EMAIL__STEP_1_MESSAGE_PART1', '¡Felicidades! Haz dado el primer paso para registrarte en:<br>');
	define('REGISTRATION_EMAIL__STEP_1_MESSAGE_PART2', "<br><p>Si tienes dudas puedes escribirnos a ".CONTACT_EMAIL.", o llamarnos al ".CONTACT_PHONENUMBER."</p>");
	
	define('REGISTRATION_EMAIL__STEP_2_SUBJECT', 'Estamos verificando tu pago');	
	define('REGISTRATION_EMAIL__STEP_2_MESSAGE_PART1', 'Estamos procesando la información que registraste.<br>Al verificarse tu pago, recibirás un correo notificándolo.<br> Esto puede demorar hasta <strong>72 horas</strong>. Por favor, ¡ten paciencia! <br><h3>¡Ya falta poco para que seas parte de Models View!</h3>');
	define('REGISTRATION_EMAIL__STEP_2_MESSAGE_PART2', REGISTRATION_EMAIL__STEP_1_MESSAGE_PART2 );
						
	define('REGISTRATION_EMAIL__STEP_3_SUBJECT', '¡Tu Pago ha sido aceptado! Continúa tu inscripción');
	define('REGISTRATION_EMAIL__STEP_3_MESSAGE_PART1', 'Hemos verificado tu pago. <strong>Tu cupo ya está garantizado</strong>, pero para continuar debes completar estos pasos:<br>');
	
	define('REGISTRATION_EMAIL__STEP_3_MESSAGE_PART2', '<br><table cellspacing="0" cellpadding="0"> <tr> 
					<td align="center" width="130" height="40" bgcolor="'.SYSTEM_EMAIL_BUTTONSCOLOR.'" style="-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; color: #ffffff; display: block;">
					<a href="'.URL .'" style="color: #ffffff; font-size:16px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; text-decoration: none; line-height:40px; width:100%; display:inline-block">Ir al Sistema</a>
					</td></tr></table>' );
	define('REGISTRATION_EMAIL__STEP_3_MESSAGE_PART3', REGISTRATION_EMAIL__STEP_1_MESSAGE_PART2 );
	
	
	define('REGISTRATION__STEP_4_MESSAGE_IF', "Si ya has entregado tu documentación, espera a que se procesen tus datos y se de por culminada tu inscripción");
	define('REGISTRATION_EMAIL__STEP_4_SUBJECT', "¡Bienvenida a Model's View! Tu inscripción se ha completado");
	define('REGISTRATION_EMAIL__STEP_4_MESSAGE_PART1', "Tu inscripción está confirmada, ya eres parte de Model's View");
	define('REGISTRATION_EMAIL__STEP_4_MESSAGE_PART2', REGISTRATION_EMAIL__STEP_1_MESSAGE_PART2 );
	
	define('PAYMENT_NOTIFICATION_EMAIL__SUBJECT', ' ha registrado un pago');
	define('PAYMENT_NOTIFICATION_EMAIL_MESSAGE', ' ha registrado un pago.<br> Por favor verifíquelo y apruebe a través del sistema<br><br>
	<table cellspacing="0" cellpadding="0"> <tr> 
					<td align="center" width="130" height="40" bgcolor="'.SYSTEM_EMAIL_BUTTONSCOLOR.'" style="-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; color: #ffffff; display: block;">
					<a href="'.URL .'" style="color: #ffffff; font-size:16px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; text-decoration: none; line-height:40px; width:100%; display:inline-block">Ir al Sistema</a>
					</td></tr></table>
					');
	
	//NEWSLETTER
	//EMAIL Head & Footer
	define('NEWSLETTER_EMAIL_HEAD', '<table width="100%" height="100%" cellpadding="0" bgcolor="'.NEWSLETTER_EMAIL_BGCOLOR.'" style="font-size:medium;font-family:Arial,Helvetica,sans-serif;padding:0px">
		<tbody><tr align="center"><td>
			<table width="575px" height="40px" cellpadding="0" cellspacing="0" bgcolor="'.NEWSLETTER_EMAIL_HEADCOLOR.'" style="font-family:Arial,Helvetica,sans-serif;padding:20px 45px;margin:40px 0px 0px;border-top-left-radius:6px;border-top-right-radius:6px">
				<tbody><tr><td><span style="font-family:Raleway,Arial,Helvetica,sans-serif;color:#FFFFFF"><img src="'.URL_EMAIL.'img/email/logo.jpg" alt="'.SITE_NAME.'"></font></td>
					</tr></tbody></table>
			<table width="575px" height="40px" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="font-family:Arial,Helvetica,sans-serif;padding:0px 20px">
				<tbody><tr><td width="575px"  style="padding:20px 0px;margin-top:20px"><span style="letter-spacing:-0.5px;line-height:23px;font-family:Raleway,
				Arial,Helvetica,sans-serif;font-weight:normal;font-size:18px;color:#2c2d25">');
				
	define('NEWSLETTER_EMAIL_FOOTER', '</td></tr><tr><td style="padding-top:20px;border-bottom-left-radius: 6px;border-bottom-right-radius: 6px;">
							</td></tr></tbody></table><table width="575px" height="20px" bgcolor="#FFF" style="padding-top:20px;margin-bottom:40px;border-bottom-left-radius: 
							6px;border-bottom-right-radius: 6px;"><tbody></tr></tbody></table></td></tr></tbody></table>');							
	define('NEWSLETTER__NOTIFY_SUBJECT','Te notificaremos sobre Próximas Aperturas');
	define('NEWSLETTER__NOTIFY_MESSAGE_PART1','Te has suscrito al boletín de '. SITE_NAME.'<br> Indicaste que querías información sobre Cursos ');
	define('NEWSLETTER__NOTIFY_MESSAGE_PART2','<p>Te mantendremos informado, tan pronto haya cupos o fechas disponibles</p> ');
	
	define('PROTECTED_EMAIL_MESSAGE', '<h3>Lo sentimos, no puede utilizar este correo, ya que pertenece a un usuario de otro tipo.</h3> Por favor, indique un email diferente');
	
	//Password Recovery
	define('PASSWORD_RECOVERY_SUCCESS_RESPONSE', '<br><div class="alert alert-success">Hemos enviado un email con instrucciones para el cambio de su contraseña</div>');
	define('PASSWORD_RECOVERY_SUBJECT','Recuperación de Contraseña');
	define('PASSWORD_RECOVERY_MESSAGE_PART1', '<h2>Has solicitado recuperar tu contraseña</h2> Para generar una nueva contraseña debes hacer click en el siguiente link<br><br>' );
	define('PASSWORD_RECOVERY_MESSAGE_PART2', '<table cellspacing="0" cellpadding="0"> <tr><td align="center" width="160" height="40" bgcolor="'.SYSTEM_EMAIL_BUTTONSCOLOR.'" style="-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; color: #ffffff; display: block;">');
	define('PASSWORD_RECOVERY_MESSAGE_PART3', '</td></tr></table>' );
	define ('SYSTEM_USERNAME_NOT_EXISTS','<br><div class="alert alert-warning">Disculpe, este usuario no existe en el sistema</div>');
					
	
	//Recordatorio
	
	//8--MODEL LOOK	
	define('RECORDATORIO_EMAIL_MODELSLOOK_BG', '<table width="100%" height="100%" cellpadding="0" bgcolor="#000000" background="'.URL_EMAIL.'images/courses/model-look/email-bg.jpg" style="padding:0px">');
	define('RECORDATORIO_EMAIL_MODELSLOOK_HEAD', '<tbody><tr align="center"><td>
			<table width="575px" height="40px" cellpadding="0" cellspacing="0" bgcolor="'.REGISTRATION_EMAIL_HEADCOLOR.'" style="font-family:Arial,Helvetica,sans-serif;padding:0px 0px;margin:40px 0px 0px;border-top-left-radius:6px;border-top-right-radius:6px">
				<tbody><tr><td><span style="font-family:Raleway,Arial,Helvetica,sans-serif;color:#FFFFFF"><img src="'.URL_EMAIL.'images/courses/model-look/email-head.jpg" alt="'.SITE_NAME.'"></font></td>
					</tr></tbody></table>
			<table width="575px" height="40px" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="font-family:Arial,Helvetica,sans-serif;padding:0px 20px">
				<tbody><tr><td width="575px"  style="padding:20px 0px;margin-top:20px"><span style="letter-spacing:-0.5px;line-height:23px;font-family:Raleway,
				Arial,Helvetica,sans-serif;font-weight:normal;font-size:18px;color:#2c2d25">');		
			
	//define('REGISTRATION_EMAIL_HEAD', '<table width="100%" height="100%" cellpadding="0" background="'.REGISTRATION_EMAIL_BGCOLOR.'" style="font-size:medium;font-family:Arial,Helvetica,sans-serif;padding:0px">
	define('RECORDATORIO_EMAIL_DEFAULT_BG', '<table width="100%" height="100%" cellpadding="0" background="grey" style="padding:0px">');
	define('RECORDATORIO_EMAIL_HEAD', '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><tbody><tr align="center"><td>
			<table width="575px" height="40px" cellpadding="0" cellspacing="0" bgcolor="'.REGISTRATION_EMAIL_HEADCOLOR.'" style="font-family:Arial,Helvetica,sans-serif;padding:20px 45px;margin:40px 0px 0px;border-top-left-radius:6px;border-top-right-radius:6px;">
				<tbody><tr><td><span style="font-family:Raleway,Arial,Helvetica,sans-serif;color:#FFFFFF"><img src="'.URL_EMAIL.'img/email/logo.jpg" alt="'.SITE_NAME.'"></font></td>
					</tr></tbody></table>
			<table width="575px" height="40px" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="font-family:Arial,Helvetica,sans-serif;padding:0px 20px">
				<tbody><tr><td width="575px"  style="padding:20px 0px;margin-top:20px"><span style="letter-spacing:-0.5px;line-height:23px;font-family:Raleway,
				Arial,Helvetica,sans-serif;font-weight:normal;font-size:18px;color:#2c2d25">');
				
	define('RECORDATORIO_EMAIL_FOOTER', '</td></tr><tr><td style="padding-top:20px;border-bottom-left-radius: 6px;border-bottom-right-radius: 6px;">
							</td></tr></tbody></table><table width="575px" height="20px" bgcolor="#FFF" style="padding-top:20px;margin-bottom:40px;border-bottom-left-radius: 
							6px;border-bottom-right-radius: 6px;"><tbody></tr></tbody></table></td></tr></tbody></table>');
	
	
	define('RECORDATORIO_EMAIL__FORM', '<form id="payment-registration" class="form-modal"   >
						<h2 style="text-align: left;">¿Por que no deseas continuar? </h2>
						<div class="col-sm-5 col-lg-5 col-sm-offset-1" >
						<!--select name="razon" class="form-control input-lg selectpicker" required>
							<option value="" disabled selected>Seleccione una razón de retiro</option>
							<option value="Actividad">Comencé otra actividad</option>
							<option value="Costo">El costo no se adapta a mis poibilidades</option>
							<option value="Pago">La forma de pago fue problemática</option>
							<option value="Inscripcion">Tuve problemas con la inscripcion en linea</option>
							
						
													
						</select-->
												 
						<div class="radio">
							  <label>
							  <input type="radio" name="raz" id="razon1" value="Actividad">
							   		Comencé otra actividad
							  </label>					
							</br>
							  <label>
							  <input type="radio" name="raz" id="razon2" value="Costo">
							    	El costo no se adapta a mis posibilidades
							  </label>
							  </br>
							    <input type="radio" name="raz" id="razon3" value="Pago">
							    	La forma de pago fue problemática
							  </label>
							  </br>
							   <input type="radio" name="raz" id="razon4" value="Inscripcion">
							    	Tuve problemas con la inscripcion en linea
							  </label>							   
						</div>
				
						<h3 style="text-align: left;">Explicanos</h3>
			
						 
						<textarea name="obs" id="obs" class="form-control" rows="4" cols="70">
							
						</textarea>
					</div>
		</br>
					

					<input type="submit" name="submit" height="30px" class="btn btn-default btn-success" value="Continuar" style="-webkit-border-radius: 15px; -moz-border-radius: 15px; border-radius: 15px; padding:1% 2%">
					<!--input type="button" name="submit" height="30px" class="btn btn-success btn-lg send" value="Cancelar" style="-webkit-border-radius: 15px; -moz-border-radius: 15px; border-radius: 15px; color: #ffffff; padding:1% 2%"-->
					<div class="clearfix"></div>
				</form>');
	
	
	define('RECORDATORIO_EMAIL__SALUDO', '<br>¡HOLA,'.$nombre.'!<br>');
	//define('RECORDATORIO_EMAIL__SALUDO_PART2a', "<br><p>Nos gustaria saber si Si tienes dudas puedes escribirnos a ".CONTACT_EMAIL.", o llamarnos al ".CONTACT_PHONENUMBER."</p>");
	
	define('RECORDATORIO_EMAIL__RESP_BODY', "<br><p ALIGN=center></p>");
	
	
	
	define('RECORDATORIO_EMAIL__SALUDO_PART2', "<p ALIGN=center>Recuerda continuar tu registro de inscripción</p>");
	
	define('RECORDATORIO_EMAIL__SUBJECT', 'Recordatorio de proceso Inscripcion');	
		
	/*define('RECORDATORIO_EMAIL__BOTON1', '<br>
	<table cellspacing="2%" cellpadding="2%" width="100%" > <tr> 
					<td align="center"  height="30px" bgcolor="'.SYSTEM_CANCEL_BUTTONSCOLOR.'" style="-webkit-border-radius: 15px; -moz-border-radius: 15px; border-radius: 15px; color: #ffffff; padding:1%">
					<a href="'.URL.'regitrations/reject/"'.$id.'" style="color: #ffffff; font-size:12px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; text-decoration: none; line-height:40px; margin:2%; ">No voy a continuar <span><img width=12px style="margin:0 5px" src="'.URL_EMAIL.'images/email/icon_descartar.gif" alt="'.SITE_NAME.'"></span></a>
					</td>' );
					
	define('RECORDATORIO_EMAIL__BOTON2', ' 
					<td align="center"  height="30px" bgcolor="'.SYSTEM_CANCEL_BUTTONSCOLOR.'" style="-webkit-border-radius: 15px; -moz-border-radius: 15px; border-radius: 15px; color: #ffffff; padding:1%">
					<a href="'.URL.'regitrations/registerpayment/"'.$id.'" style="color: #ffffff; font-size:12px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; text-decoration: none; line-height:40px; margin:2%; ">Ya me Inscribi<span><img width=12px style="margin:0 5px" src="'.URL_EMAIL.'images/email/icon_realizada.gif" alt="'.SITE_NAME.'"></span></a>
					</td>' );
					
	define('RECORDATORIO_EMAIL__BOTON3','  
					<td align="center"  height="30px" bgcolor="'.SYSTEM_EMAIL_BUTTONSCOLOR.'" style="-webkit-border-radius: 15px; -moz-border-radius: 15px; border-radius: 15px; color: #ffffff; padding:1%;">
					<a href="'.URL.'" style="color: #ffffff; font-size:12px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; text-decoration: none; line-height:40px; margin:2%;">Continuar Inscripcion<span><img width=12px style="margin:0 5px" src="'.URL_EMAIL.'images/email/icon_continuar.gif" alt="'.SITE_NAME.'"></span></a>
					</td> </tr></table> ' );*/
					
	define('RECORDATORIO_EMAIL__BOTON1_1', '<br><table cellspacing="2%" cellpadding="2%" width="100%" > <tr> 
					<td align="center"  height="30px" bgcolor="'.SYSTEM_CANCEL_BUTTONSCOLOR.'" style="-webkit-border-radius: 15px; -moz-border-radius: 15px; border-radius: 15px; color: #ffffff; padding:1%">
					<a href="'.URL.'recordatorio/reject/' );
					
	define('RECORDATORIO_EMAIL__BOTON1_2', '" style="color: #ffffff; font-size:12px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; text-decoration: none; line-height:40px; margin:2%; ">No voy a continuar <span><img width=12px style="margin:0 5px" src="'.URL_EMAIL.'images/email/icon_descartar.gif" alt="'.SITE_NAME.'"></span></a>
					</td>' );
					
	define('RECORDATORIO_EMAIL__BOTON2_1', ' 
					<td align="center"  height="30px" bgcolor="'.SYSTEM_CANCEL_BUTTONSCOLOR.'" style="-webkit-border-radius: 15px; -moz-border-radius: 15px; border-radius: 15px; color: #ffffff; padding:1%">
					<a href="'.URL.'recordatorio/inscrito/' );
					
					
	define('RECORDATORIO_EMAIL__BOTON2_2', '" style="color: #ffffff; font-size:12px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; text-decoration: none; line-height:40px; margin:2%; ">Me inscribi en la agencia <span><img width=12px style="margin:0 5px" src="'.URL_EMAIL.'images/email/icon_continuar.gif" alt="'.SITE_NAME.'"></span></a>
					</td>' );
					
	define('RECORDATORIO_EMAIL__BOTON3_1', ' 
					<td align="center"  height="30px" bgcolor="'.SYSTEM_MAIL_BUTTONSCOLOR.'" style="-webkit-border-radius: 15px; -moz-border-radius: 15px; border-radius: 15px; color: #ffffff; padding:1%">
					<a href="'.URL.'"' );
					
					
	define('RECORDATORIO_EMAIL__BOTON3_2', '" style="color: #ffffff; font-size:12px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; text-decoration: none; line-height:40px; margin:2%; ">Continuar Inscripcion <span><img width=12px style="margin:0 5px" src="'.URL_EMAIL.'images/email/icon_continuar.gif" alt="'.SITE_NAME.'"></span></a>
					</td></tr></table>' );				
					
					
	define('RECORDATORIO_EMAIL__BOTON3','  
					<td align="center"  height="30px" bgcolor="'.SYSTEM_EMAIL_BUTTONSCOLOR.'" style="-webkit-border-radius: 15px; -moz-border-radius: 15px; border-radius: 15px; color: #ffffff; padding:1%;">
					<a href="'.URL.'" style="color: #ffffff; font-size:12px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; text-decoration: none; line-height:40px; margin:2%;">Continuar Inscripcion<span><img width=12px style="margin:0 5px" src="'.URL_EMAIL.'images/email/icon_continuar.gif" alt="'.SITE_NAME.'"></span></a>
					</td> </tr></table> ' );				

					
					
    define('RECORDATORIO_EMAIL__STEP_1_MESSAGE_PART2', "<br><p>Si tienes dudas puedes escribirnos a ".CONTACT_EMAIL.", o llamarnos al ".CONTACT_PHONENUMBER."</p>");
					
	//define('RECORDATORIO_EMAIL__RETRASO', '<img src="'.URL_EMAIL.'images/email/banderin_bg.jpg" alt=" />');
	define('RECORDATORIO_EMAIL__RETRASO', '<p style="background-image:'.URL_EMAIL.'images/email/banderin_bg.jpg";background-repeat:no-repeat;background-position:center ;">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p> ');
	
	define('REGISTRATION__STEP_4_MESSAGE_IF', "Si ya has entregado tu documentación, espera a que se procesen tus datos y se de por culminada tu inscripción");
	define('REGISTRATION_EMAIL__STEP_4_SUBJECT', "¡Bienvenida a Model's View! Tu inscripción se ha completado");
	define('REGISTRATION_EMAIL__STEP_4_MESSAGE_PART1', "Tu inscripción está confirmada, ya eres parte de Model's View");
	define('REGISTRATION_EMAIL__STEP_4_MESSAGE_PART2', REGISTRATION_EMAIL__STEP_1_MESSAGE_PART2 );
	
	define('PAYMENT_NOTIFICATION_EMAIL__SUBJECT', ' ha registrado un pago');
	define('PAYMENT_NOTIFICATION_EMAIL_MESSAGE', ' ha registrado un pago.<br> Por favor verifíquelo y apruebe a través del sistema<br><br>
	<table cellspacing="0" cellpadding="0"> <tr> 
					<td align="center" width="130" height="40" bgcolor="'.SYSTEM_EMAIL_BUTTONSCOLOR.'" style="-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; color: #ffffff; display: block;">
					<a href="'.URL .'" style="color: #ffffff; font-size:16px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; text-decoration: none; line-height:40px; width:100%; display:inline-block">Ir al Sistema</a>
					</td></tr></table>
					');
			
?>