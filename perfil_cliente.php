<?php
session_start();
require('conexao.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Perfil Cliente</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/bootstrap_s.min.css">-->
	<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/slate/bootstrap.min.css" rel="stylesheet" integrity="sha384-RpX8okQqCyUNG7PlOYNybyJXYTtGQH+7rIKiVvg1DLg6jahLEk47VvpUyS+E2/uJ" crossorigin="anonymous">

	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

	<meta name="viewport" content="width=device-width, user-scalable=no">
	<link rel="icon" href="favicon.ico" type="image/x-icon">

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta charset="utf-8">
	<style type="text/css" media="screen">
		*{
			margin: 0 auto;
			padding: 0;
		}
		#image{
			height:300px; 
			width:300px;
			border-radius: 5px;

		}
		#heade{
			height: 100px;
			width: 100%;
			background-image: url('img/vialactea.png');
		}
		.logo{
			margin-top: 13px;
		}
		#login{
			height: 60px;
			width: 60px;
			border-radius: 100%;
			margin-top: 20px;
			/*float: right;
			left: -400px;*/
		}
		#user{
			font: 23px Arial white;
			margin-top: 20px;
		}
		#sair{
			height: 40px;
			width: 70px;
			margin-top: 30px;
		}
		#sairr{
			font: 23px Arial white;
			
			text-align: center;
		}
	</style>
</head>
<body>
	<div class="row">
		<div id="heade">
		<div class="col-sm-2">
			<a href="#">
				<img class="logo" src="Logo/LogoFi.png">
			</a>
		</div>

		<div class="col-sm-5"></div>		
		<div class="col-sm-2">
		<?php 
			$sql = "SELECT image FROM usuario WHERE id = '".$_SESSION['id']."'";

			$query = mysqli_query($con, $sql);
			
				while ($dados = mysqli_fetch_assoc($query)) {
					if(isset($_SESSION['user'])){
							echo "<img id='login' src='images/".$dados['image']."'>";
					}
				}
		?> 
		</div>
		
		<div class="col-sm-2">
				<?php 
					if(isset($_SESSION['user'])){
						echo "<span id='user'>".$_SESSION['user']."</span>";
					}
				?>		 	
		</div>
		
		<button type="submit" name="sair" id="sair" class="col-sm-2 btn btn-primary">
			<a id="sairr" href="index.php?sair=">
				<?php 
					if(isset($_POST['sair'])){
					unset($_SESSION['user']);
					header('location:index.php');
				}
				?>	
			Sair</a>
		</button>

		</div> 
		
		<div class="row" style="			
				width: 100%;
				height: 5px;
				background: linear-gradient(to right,#350D3F,#122E59,#350D3F);
				box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);">
		</div> 
			 <?php

			$sql = "SELECT * FROM usuario WHERE id = '".$_SESSION['id']."'";

			$query = mysqli_query($con, $sql);
			
			while ($dados = mysqli_fetch_assoc($query)) {
				echo"
			<div class='row'>
				<div class='col-md-12 text-center'>
					<div id='image'><img src='images/".$dados['image']."'></div>
				</div>
			</div>
			<div class='row'>
					<span>".$dados['nome']."</span><br>
					<span>".$dados['cpf']."</span><br>
					<span>".$dados['nasc']."</span><br>
					<span>".$dados['end']."</span><br>
					<span>".$dados['tel']."</span><br>
					<span>".$dados['email']."</span>
			 </div>";
			}

		?> 
	</div>
</body>
</html>