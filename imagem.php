<!DOCTYPE html>
<html>
<head>
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery.maskedinput.js" type="text/javascript"></script>
	<script type="text/javascript">

		jQuery(function($){
			$("#cpff").mask("999.999.999-99");
			$("#tele").mask("(99) 9.9999-9999");
			$("#Data").mask("99/99/9999");
		});
	</script>
</head>
<body>
	<form action="" method="post" class="container" enctype="multipart/form-data">
		<fieldset>
			<legend>Cadastrar-se</legend>
		<label>Nome:</label>
		<input class="form-control" type="text" name="nome" placeholder="Nome Completo" required>
		<label>CPF:</label>
		<input class="form-control" type="text" name="cpf" id="cpff" minlength="11" required>
		<label>Data Nascimento:</label>
		<input class="form-control" type="text" name="nasc" id="Data" required>
		<label>Endereço:</label>
		<input class="form-control" type="text" name="end" placeholder="rua alguma coisa, 00" minlength="8" required>
		<label>Telefone:</label>
		<input class="form-control" type="text" name="tel" id="tele" minlength="11" required>
		<label>E-mail:</label>
		<input class="form-control" type="text" name="email" placeholder="seuemail@email.com" required>
		<label>Usuário:</label>
		<input class="form-control" type="text" name="login" placeholder="eusou_vc" required>
		<label>Senha:</label>
		<input class="form-control" type="password" name="pass" minlength="8" required><br>
		<label>Sua Foto:</label>
		<input class="form-control" type="file" name="file" required><br>
		<input class="form-control btn btn-primary" type="submit" name="enviar" value="Cadastrar">
		</fieldset>
	</form>
	<?php

	if (isset($_POST['enviar'])) {

	require('conexao.php');

		$nome = $_POST['nome'];
		$cpf = $_POST['cpf'];
		$nasc = $_POST['nasc'];
		$end = $_POST['end'];
		$tel = $_POST['tel'];
		$user = $_POST['login'];
		$pas = $_POST['pass'];
		$pass = md5(base64_encode($pas));
		$email = $_POST['email'];
		
		$dir = "images/";
		$ext = strtolower(substr($_FILES['file']['name'], -4));
		$image = md5(microtime()).$ext;
		$tam = $_FILES['file']['size'];
		$tam =ceil(($tam / 1024) / 1024);

	$sql = "SELECT * FROM cliente";
	$query = mysqli_query($con, $sql);

	$boolean = True;

		while ($dados = mysqli_fetch_assoc($query)) {
			if ($dados['user'] == $user) {
				echo "<script>alert('Administrador já existe!')</script>";
				$boolean = False;
			}
			else if($dados['email'] == $email) {
				echo "<script>alert('Email já existe!')</script>";
				$boolean = False;
			}
		}
		if ($boolean == True) {
			if($tam < 2){
				if($ext == ".jpg" || $ext == ".png" || $ext == ".bmp" || $ext == ".gif"){
					if(move_uploaded_file($_FILES['file']['tmp_name'], $dir.$image)){
				$sql = "INSERT INTO usuario (nome, cpf, nasc, end, tel, email, user, senha, image) VALUES ('".$nome."','".$cpf."','".$nasc."','".$end."','".$tel."','".$email."','".$user."','".$pass."','".$image."')";

				$query = mysqli_query($con,$sql);

				if ($query) {
					echo "<script>alert('Usuário Cadastrado com sucesso')</script>";
					echo '<script> setTimeout(function(){window.location = "index.php";}, 1000);</script>';
				}else{
					echo "<script>alert('Usuario não Cadastrado, tente novamente')</script>";
				}
			
		}else{
			echo "Os formatos aceitos: jpg, png, bmp e gif";
		}
	}else{
		echo "Tamanho ultrapassou 2MB";
	}
}
	}
	}
	?>

</body>
</html>

