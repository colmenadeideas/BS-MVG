<?php
	//EMAIL Head & Footer
	define('CDE_EMAIL_BGCOLOR', '#686BCC');
	define('CDE__EMAIL_HEAD', '<table width="100%" height="100%" cellpadding="0" bgcolor="'.CDE_EMAIL_BGCOLOR.'" style="font-size:medium;font-family:Arial,Helvetica,sans-serif;padding:0px">
		<tbody><tr align="center"><td>
			<table width="575px" height="40px" cellpadding="0" cellspacing="0" bgcolor="#FFF" style="font-family:Arial,Helvetica,sans-serif;padding:10px 15px 0px 15px;margin:40px 0px 0px;border-top-left-radius:6px;border-top-right-radius:6px">
				<tbody><tr><td><span style="font-family:Raleway,Arial,Helvetica,sans-serif;color:#FFFFFF"><img src="'.URL_EMAIL.'img/email/logo-center.gif" alt="'.SITE_NAME.'"></font></td>
					</tr></tbody></table>
			<table width="575px" height="40px" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="font-family:Arial,Helvetica,sans-serif;padding:0px 20px">
				<tbody><tr><td width="575px"  style="padding:20px 0px;margin-top:20px"><span style="letter-spacing:-0.5px;line-height:23px;font-family:Raleway,
				Arial,Helvetica,sans-serif;font-weight:normal;font-size:18px;color:#2c2d25">');
				
	define('CDE__EMAIL_FOOTER', '</td></tr><tr><td style="padding-top:0px;border-bottom-left-radius: 6px;border-bottom-right-radius: 6px;">
							</td></tr></tbody></table><table width="575px" height="20px" bgcolor="#FFF" style="padding-top:20px;margin-bottom:40px;border-bottom-left-radius: 
							6px;border-bottom-right-radius: 6px;"><tbody></tr></tbody></table></td></tr></tbody></table>');

	define ('CRONOGRAMA_EMAIL_SUBJECT','Cronograma Aprobado');
?>