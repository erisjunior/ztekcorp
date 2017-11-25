<?php
session_start();
require('conexao.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Perfil Cliente</title>
	<style type="text/css" media="screen">
		#image{
			height:350px; 
			width:250px;                                                             
			border-radius: 10px;
		}	
		#span{
			margin-left: -50px;
		}

		#span .input-group-addon{
			width: 200px;
			text-align:left;
		}
	</style>

</head>
<!--<body>
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
		
		<div class="col-sm-2" style="margin-top: 35px; margin-left: -60px;">
				<?php 
					if(isset($_SESSION['user'])){
						echo "<span id='user'>".$_SESSION['user']."</span>";
					}
				?>		 	
		</div>
		<div class="col-sm-1">
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
		</div> 
		
		<div class="row" style="			
				width: 100%;
				height: 5px;
				background: linear-gradient(to right,#350D3F,#122E59,#350D3F);
				box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);">
		</div> --> 
			 <?php 
			 
			// $sql = "SELECT * FROM usuario WHERE id = '".$_SESSION['id']."'";

			// $query = mysqli_query($con, $sql);
			// require('conexao.php');
			// if (isset($_GET['edit'])) {
				
			// 	$user = $_POST['login'];
			// 	$nome = $_POST['nome'];
			// 	$cpf = $_POST['cpf'];
			// 	$nasc = $_POST['nasc'];
			// 	$end = $_POST['end'];
			// 	$tel = $_POST['tel'];
			// 	$email = $_POST['email'];

			// 	$update = "UPDATE usuario SET nome='".$nome."', cpf='".$cpf."', nasc='".$nasc."', end='".$end."', tel='".$tel."', email='".$email."', user='".$user."' WHERE id='".$_SESSION['id']."'";
			
			// 	$updat = mysqli_query($con, $update);

			// 	}

			// if (isset($_GET['edita'])) {
				
			// 	$imagem = $_POST['file'];
			// 	$dir = "images/";
			// 	$ext2 = strtolower(substr($_FILES['file']['name'], -4));
			// 	$image = md5(microtime()).$ext2;

			// 	$tam2 = $_FILES['file']['size'];
			// 	$tam2 =ceil(($tam2 / 1024) / 1024);

			// 	if($tam2 < 2){
			// 		if($ext2 == ".jpg" || $ext2 == ".png" || $ext2 == ".bmp" || $ext2 == ".gif"){
			// 			if(move_uploaded_file($_FILES['file']['tmp_name'], $dir.$image)){
							
			// 				$sql = "UPDATE usuario SET image='".$image."' WHERE image='".$_SESSION['id']."'";
							
			// 				$query = mysqli_query($con, $sql);

			// 				if(!$query){
			// 					echo "<script>alert('Erro ao Cadastar [Cadastro]!')</script>";
			// 				}else{
			// 					echo "<script>alert('Cadastrado com Sucesso!');
			// 					</script>";
			// 					header('location:Cad_Prod.php');
			// 				}
			// 			}else{
			// 				echo "<script>alert('Erro ao Cadastar [Upload]!')</script>";
			// 			}
			// 		}else{
			// 			echo "Os formatos aceitos: jpg, png, bmp e gif";
			// 		}
			// 	}else{
			// 		echo "Tamanho ultrapassou 2MB";
			// 	}
			// }



			// while ($dados = mysqli_fetch_assoc($query)) {
			// 	echo"

			// 		<br>

			// 		<div class='row'>
			// 			<div class='col-sm-2'></div>
			// 			<div class='col-sm-3'>
			// 				<img id='image' src='images/".$dados['image']."'><br>
			// 			</div>
			// 			<div class='col-sm-6'>

			// 				<div id='span'>
			// 				<form method='post' action='?pag=perfil_cliente&edit=edit'>
			// 					<span class='input-group'><div class='input-group-addon'>Login: </div><input class='form-control' style='min-width:400px;' name='login' value='".$dados['user']."'></span>
			// 					<span class='input-group'><div class='input-group-addon'>Nome: </div><input class='form-control' style='min-width:400px;' name='nome' value='".$dados['nome']."'></span>
			// 					<span class='input-group'><div class='input-group-addon'>CPF: </div><input class='form-control' style='min-width:400px;' name='cpf' value='".$dados['cpf']."'></span>
			// 					<span class='input-group'><div class='input-group-addon'>Nascimento: </div><input class='form-control' style='min-width:400px;' name='nasc' value='".$dados['nasc']."'></span>
			// 					<span class='input-group'><div class='input-group-addon'>Endereço: </div><input class='form-control' style='min-width:400px;' name='end' value='".$dados['end']."'></span>
			// 					<span class='input-group'><div class='input-group-addon'>Telefone: </div><input class='form-control' style='min-width:400px;' name='tel' value='".$dados['tel']."'></span>
			// 					<span class='input-group'><div class='input-group-addon'>E-mail: </div><input class='form-control' style='min-width:400px;' name='email' value='".$dados['email']."'></span>
			// 					<span class='input-group'><div class='input-group-addon'>Foto: </div><input class='form-control' style='min-width:400px;' name='file' type='file'></span
			// 					<span class='input-group'><div class='input-group-addon'>Edite Dados: </div>  <input class='form-control btn-primary btn-md' style='min-width:400px;' type='submit' name='editar' value='Editar'></span>
			// 				</form>	
			// 				</div>

			// 			 </div>
			//  		</div>

			//  		<br>";
			// 	}

			$us = $_SESSION['user'];

			$sql = "SELECT * FROM usuario WHERE user ='".$us."'";
			$query = mysqli_query($con, $sql);

			if (isset($_GET['acao'])){
				$acao = $_GET['acao'];
			}

			while($dados = mysqli_fetch_assoc($query)){

				if (isset($acao)) {
					if ($acao == "up") {
						$nome = $_POST['nome'];
						$user = $_POST['user'];
						$email = $_POST['email'];
						$pass = $dados['pass'];
					}else if ($acao == "pass") {
						$pass = $_POST['pass'];
						$nome = $dados['nome'];
						$user = $dados['user'];
						$email = $dados['email'];
					}	
				}else{
					$nome = $dados['nome'];
					$user = $dados['user'];
					$pass = $dados['senha'];
					$email = $dados['email'];
				}

				echo "<form action='?pag=perfil_cliente&&acao=up' method='post'>
					
					<label>Nome</label>
					<input class='form-control' type='text' name='nome' value='".$nome."'>
					
					<label>Usuario</label>
					<input class='form-control' type='text' name='user' value='".$user."'>

					<label>Email</label>
					<input class='form-control' type='email' name='email' value='".$email."'>

					<input style='margin-top: 15px;'' class='form-control btn btn-primary' type='submit' name='Enviar' value='Enviar'>

				</form>

				<form style='margin-top:15px' action='?pag=perfil_cliente&&acao=pass' method='post'>

					<label>Velha Senha</label>
					<input class='form-control' type='text' name='passv' placeholder='Velha Senha'>
					
					<label>Nova Senha</label>
					<input class='form-control' type='text' name='pass' placeholder='Nova Senha'>

					<input style='margin-top: 15px;'' class='form-control btn btn-primary' type='submit' name='Enviar' value='Enviar'>

				</form>			

				";

			}

			if (isset($acao)) {
			
			if ($acao == "up") {


				$sql = "UPDATE usuario SET nome ='".$nome."', user ='".$user."', email ='".$email."' WHERE user='$us'";

				$query = mysqli_query($con,$sql);
				header("location: index.php"); 

			}else if ($acao == "pass") {

				if ($_POST['passv'] == $_SESSION['senha']) {
		
					$sql = "UPDATE usuario SET senha ='".md5(base64_encode($pass))."' WHERE user='$us'";

					$query = mysqli_query($con,$sql);

					if (!$query) {
						echo "<script>alert('Erro ao cadastrar')</script>";
					}else{
						echo "<script>confirm('Mudanças realizadas com sucesso');</script>";
					}

					header("Location: index.php");

				}else{
					echo "<script>alert('Velha Senha Incorreta')</script>";
				}

			}
		}
		?> 