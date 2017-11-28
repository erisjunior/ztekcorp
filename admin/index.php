<?php
	require('../conexao.php');

	session_start();

	if (isset($_SESSION['user'])) {
		$logado = $_SESSION['user'];
	}else{
		header('location:../login.php');
	}

	if (isset($_GET['sair'])) {
		unset($_SESSION['user']);
		header("Location: index.php");

	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Área de Administrador</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width, initial-scale=1">
	<!-- <link rel="stylesheet" type="text/css" href="../css/bootstrap_s.min.css"> -->
	<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/slate/bootstrap.min.css" rel="stylesheet" integrity="sha384-RpX8okQqCyUNG7PlOYNybyJXYTtGQH+7rIKiVvg1DLg6jahLEk47VvpUyS+E2/uJ" crossorigin="anonymous">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="../css/style.css">

	<style type="text/css">
		body{
			 margin:15px
		}

		.fa{
			margin-right: 5px
		}

		.sair{
			float: right
		}
	</style>

</head>
<body>
<div class="row">
	<div class="col-sm-12">
		<h3><span>Área administrativa: </span><i><?php echo $logado;?></i></h3>

		<div class="btn-group">
			<a class="btn btn-primary" href="index.php?envia=Cad_Prod"><span class="fa fa-dashboard"></span> Cadastro de Produtos</a>
			<a class="btn btn-primary" href="index.php?envia=Gerenciador"><span class="fa fa-list-alt"></span> Gerencia de Produtos</a>
			<a class="btn btn-primary" href="index.php?envia=trabalho"><span class="fa fa-user"></span> Cadastro de Administradores</a>
			<a class="btn btn-primary" href="index.php?envia=atualiza"><span class="fa fa-refresh"></span> Gerencia de Perfil</a>
			<a class="btn btn-primary" href="index.php?envia=comentarios"><span class="fa fa-envelope"></span> Comentarios do Site</a>
		</div>

		<a class="btn btn-primary sair" href="index.php?sair=sair"><span class="fa fa-close"></span> Sair</a>
	</div>
</div>
	<br><hr>

	<div>
		<?php

			if (isset($_GET['envia'])) {
				include $_GET['envia'].".php";
			}

		?>
	</div>
	<!-- <div id="header">

			<div class="top">

				<div id="logo">
					<span class="image avatar48"><img src="images/avatar.jpg"/></span>
					<h1 id="title">Jane Doe</h1>
					<p>Hyperspace Engineer</p>
				</div>

				<nav id="nav">
					<ul>
						<li><a href="#top" id="top-link" class="skel-layers-ignoreHref"><span class="fa fa-home">Intro</span></a></li>
						<li><a href="#portfolio" id="portfolio-link" class="skel-layers-ignoreHref"><span class="fa fa-th">Portfolio</span></a></li>
						<li><a href="#about" id="about-link" class="skel-layers-ignoreHref"><span class="fa fa-user">About Me</span></a></li>
						<li><a href="#contact" id="contact-link" class="skel-layers-ignoreHref"><span class="fa fa-envelope">Contact</span></a></li>
					</ul>
				</nav>

			</div>

			<div class="bottom">

				<ul class="icons">
					<li><a href="#" class="fa fa-youtube"><span class="label">Twitter</span></a></li>
					<li><a href="#" class="fa fa-facebook"><span class="label">Facebook</span></a></li>
					<li><a href="#" class="fa fa-envelope"><span class="label">Email</span></a></li>
				</ul>

			</div>

		</div> -->
</body>
</html>