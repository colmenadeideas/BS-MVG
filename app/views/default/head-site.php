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
    <link href="<?php echo CSS; ?>font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo CSS; ?>modelsview.css" rel="stylesheet">
	<link href="<?php echo CSS;?>all.css" rel="stylesheet">  
	
	<?php echo GOOGLE_FONTS; ?>

    <script src="<?php echo JS; ?>config.js"></script>
    <script data-main="<?php echo JS;?>main-app" src="<?php echo JS; ?>require.js"></script>
</head>
<body id="<?php echo "page-".getPage(); ?>">
    <header>
       <a href="<?php echo URL; ?>"> <img src="<?php echo IMG; ?>modelsview-logo.svg" alt="Model's View Group Academia de Modelaje" title="Model's View Group Academia de Modelaje"></a>
        <hr>
    </header>