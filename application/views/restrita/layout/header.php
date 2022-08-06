<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Título -->
        
        <?php echo (isset($titulo) ? '<title>Anuncios Legais | ' . $titulo . '</title>' : '<title>Anuncios Legais | A sua plataforma de anúncios</title>') ?> 
        
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="stacks" />
        
        <!-- Estilos gerais -->

        <link href="<?php echo base_url('public/restrita/assets/plugins/pace-master/themes/blue/pace-theme-flash.css'); ?>" rel="stylesheet"/>
        <link href="<?php echo base_url('public/restrita/assets/plugins/uniform/css/default.css'); ?>" rel="stylesheet"/>
        <link href="<?php echo base_url('public/restrita/assets/plugins/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('public/restrita/assets/plugins/fontawesome/css/font-awesome.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('public/restrita/assets/plugins/line-icons/simple-line-icons.css'); ?>" rel="stylesheet" type="text/css"/>	
        <link href="<?php echo base_url('public/restrita/assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css'); ?>" rel="stylesheet" type="text/css"/>	
        <link href="<?php echo base_url('public/restrita/assets/plugins/waves/waves.min.css'); ?>" rel="stylesheet" type="text/css"/>	
        <link href="<?php echo base_url('public/restrita/assets/plugins/switchery/switchery.min.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('public/restrita/assets/plugins/3d-bold-navigation/css/style.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('public/restrita/assets/plugins/slidepushmenus/css/component.css'); ?>" rel="stylesheet" type="text/css"/>	
        <link href="<?php echo base_url('public/restrita/assets/plugins/weather-icons-master/css/weather-icons.min.css'); ?>" rel="stylesheet" type="text/css"/>	
        <link href="<?php echo base_url('public/restrita/assets/plugins/toastr/toastr.min.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('public/restrita/assets/plugins/offcanvasmenueffects/js/snap.svg-min.js'); ?>" rel="stylesheet" type="text/css"/>

		<!-- Pagina Editar Usuarios-->
		<link href="<?php echo base_url('public/restrita/assets/plugins/summernote-master/summernote.css'); ?>" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url('public/restrita/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css'); ?>" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url('public/restrita/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css'); ?>" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url('public/restrita/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css'); ?>" rel="stylesheet" type="text/css"/>
        
        <!-- Estilos do Tema -->

        <link href="<?php echo base_url('public/restrita/assets/css/meteor.min.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('public/restrita/assets/css/layers/dark-layer.css'); ?>" class="theme-color" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('public/restrita/assets/css/custom.css'); ?>" rel="stylesheet" type="text/css"/>
        <script src="<?php echo base_url('public/restrita/assets/plugins/3d-bold-navigation/js/modernizr.js'); ?>"></script>

		<?php if (isset($styles)) : ?>
		<?php foreach ($styles as $estilo) : ?>
			<link href="<?php echo base_url('public/restrita/' . $estilo); ?>" rel="stylesheet">
		<?php endforeach; ?>
		<?php endif; ?>
        

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body class="compact-menu">
