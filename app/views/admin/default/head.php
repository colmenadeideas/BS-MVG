<!DOCTYPE html>
<html lang="es">
<head>	
	<meta charset="<?php echo DB_ENCODE; ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo IMG; ?>favicon.png">
    
    <title><?php echo $this->title; ?></title>
	
	<link href="<?php echo CSS; ?>bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo CSS; ?>font-awesome.css" rel="stylesheet">
	<link href="<?php echo CSS; ?>styles.css" rel="stylesheet">
	<link href="<?php echo CSS;?>all.css" rel="stylesheet">  
	
	<?php echo GOOGLE_FONTS; ?>

    <script src="<?php echo JS; ?>config.js"></script>
    <script data-main="<?php echo JS;?>main-app" src="<?php echo JS; ?>require.js"></script>
    
		<!--Start of Zopim Live Chat Script>
			<script type="text/javascript">
			window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
			d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
			_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
			$.src="//v2.zopim.com/?36Eh9ErfCOUUsGykeTib79eS0Uphe3NX";z.t=+new Date;$.
			type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
			</script>
		<!--End of Zopim Live Chat Script-->
</head>
<body class="sistema">
	<div class="container-full">