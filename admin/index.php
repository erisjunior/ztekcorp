<?php
    require('../conexao.php');
    session_start();

    if(isset($_POST['user'])){
        $user = $_POST['user'];
        $pas = $_POST['pass'];
        $pass = md5(base64_encode($pas));
    
        $sql = "SELECT * FROM admin WHERE login ='$user' AND senha = '$pass'";
        $query = mysqli_query($con, $sql);
        
        if(mysqli_num_rows($query) > 0) {
        
        	while ($dados = mysqli_fetch_assoc($query)) {
        		$_SESSION['idadmin'] = $dados['id'];
        		$_SESSION['admin']=$dados['login'];
            	$_SESSION['passadmin']=$dados['senha'];
        	}
        }
        else{
        
        	unset($_SESSION['admin']);
        	header('location:login.php');
        
        }
    }

	if(isset($_SESSION['admin'])) {
		$logado = $_SESSION['admin'];
	}else{
	    unset($_SESSION['admin']);
		header('location:login.php');
	}

	if (isset($_GET['sair'])) {
		unset($_SESSION['admin']);
		header("Location: index.php");

	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Área de Administrador</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width, initial-scale=1">
	 <link rel="stylesheet" type="text/css" href="../css/bootstrap_s.min.css"> 
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
</body>
</html>