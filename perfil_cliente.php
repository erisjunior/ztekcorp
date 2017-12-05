
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
		.input-group-addon{
			width: 130px
		}
		.input-group .form-control{
			min-width: 450px
		}
	</style>

</head>
<div class="container"><br>
	<div class="row">
		<div class="col-sm-6">
			<?php
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
						$pass = $dados['senha'];
						$image = $dados['image'];
					}else if ($acao == "pass") {
						$pass = $_POST['pass'];
						$nome = $dados['nome'];
						$user = $dados['user'];
						$email = $dados['email'];
						$image = $dados['image'];
					}else if($acao=="image"){
					    $pass = $dados['senha'];
						$nome = $dados['nome'];
						$user = $dados['user'];
						$email = $dados['email'];
						$image = $dados['image'];
					}
				}else{
					$nome = $dados['nome'];
					$user = $dados['user'];
					$pass = $dados['senha'];
					$email = $dados['email'];
					$image = $dados['image'];
				}
			}

				if(isset($acao)) {
			        

    			        if ($acao == "up") {
    
    
        				    $sql = "UPDATE usuario SET nome ='".$nome."', user ='".$user."', email ='".$email."' WHERE user='$us'";
        
        				    $query = mysqli_query($con,$sql);
        
        			    }else if ($acao == "pass") {
        
        				    if ($_POST['passv'] == $_SESSION['senha']) {
        
        				    	$sql = "UPDATE usuario SET senha ='".md5(base64_encode($pass))."' WHERE user='$us'";
        
        				    	$query = mysqli_query($con,$sql);
        
        				    }else{
        				    	echo "<script>alert('Velha Senha Incorreta')</script>";
        			    	}
    
    			        }else if($acao == "image"){
    			            $dir = "images/";
        					$ext = strtolower(substr($_FILES['file']['name'], -4));
        					$image = md5(microtime()).$ext;
        					$tam = $_FILES['file']['size'];
        					$tam =ceil(($tam / 1024) / 1024);
        
        					if($tam < 2){
        						if($ext == ".jpg" || $ext == ".png" || $ext == ".bmp" || $ext == ".gif"){
        							if(move_uploaded_file($_FILES['file']['tmp_name'], $dir.$image)){
        								$sqll = "UPDATE usuario SET image='".$image."' WHERE user ='".$us."'";
        
        								$queryy = mysqli_query($con,$sqll);
        							}
        						}
        					}
    			        }
		            
				}

				echo "<form action='?pag=perfil_cliente&&acao=up' method='post'>

					<span class='input-group'>
					<label class='input-group-addon'>Nome</label>
					<input class='form-control' type='text' name='nome' value='".$nome."'></span>

					<span class='input-group'>
					<label class='input-group-addon'>Usuario</label>
					<input class='form-control' type='text' name='user' value='".$user."'></span>

					<span class='input-group'>
					<label class='input-group-addon'>Email</label>
					<input class='form-control' type='email' name='email' value='".$email."'></span>

					<input style='margin-top: 15px;' class='form-control btn btn-primary' type='submit' name='Enviar' value='Enviar'>

				</form>

				<form style='margin-top:15px' action='?pag=perfil_cliente&&acao=pass' method='post'>

					<span class='input-group'>
					<label class='input-group-addon'>Velha Senha</label>
					<input class='form-control' type='text' name='passv' placeholder='Velha Senha'></span>

					<span class='input-group'>
					<label class='input-group-addon'>Nova Senha</label>
					<input class='form-control' type='text' name='pass' placeholder='Nova Senha'></span>

					<input style='margin-top: 15px;'' class='form-control btn btn-primary' type='submit' name='Enviar' value='Enviar'>

				</form>

				</div>

				<div class='col-sm-6'>
					<br>
					<img class='center-block img img-responsive img-thumbnail' style='width:300px;height:300px;border-radius:100%' src='images/".$image."'><br>
					<center>
						<form action='?pag=perfil_cliente&&acao=image' class='form-inline' method='post' enctype='multipart/form-data'>
							<input class='form-control' type='file' name='file' required>
							<input class='form-control input-group-addon' type='submit'>
						</form>
					</center>
				</div>

				";

		
		?>
	</div>

</div>
<br>