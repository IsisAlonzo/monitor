<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/" media="screen">  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/tuicono.ico">
    <title>Admin - Noticiero</title>
    
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
		<a href="#" class="navbar-brand text-white"><?php echo $nombre; ?></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
			<span class="navbar-toggler-icon" ></span>
		</button>

		<div class="collapse navbar-collapse" id="menu">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item" >
                    <a href="<?php echo base_url().'administrador/ver/noticias/0'; ?>" class="nav-link text-white" id="navbarDropdown" role="button" >
                    <i class="far fa-newspaper"></i>   Noticias</a>
				</li>
                <li class="nav-item">
                    <a href="<?php echo base_url().'administrador/agregar/noticia'; ?>" class="nav-link text-white" id="navbarDropdown" role="button">Agregar Noticia</a>
                </li>
			</ul>
            <div class="nav-item">
				</a>
                <a href="<?php echo base_url().'logout';?>">Salir   <i class="fas fa-sign-out-alt"></i></a>
			</div>



		</div>
	</nav>
	
