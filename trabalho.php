<form action="" method="post" class="container">
	<fieldset>
		<legend>Cadastro de Administradores</legend>
	<label>Nome:</label>
	<input class="form-control" type="text" name="nome" placeholder="Nome Completo" required>
	<label>CPF:</label>
	<input class="form-control" type="text" name="cpf" placeholder="999.999.999-99" minlength="11" maxlength="11" required>
	<label>Endereço:</label>
	<input class="form-control" type="text" name="end" placeholder="rua alguma coisa, 00" minlength="8" maxlength="20" required>
	<label>Telefone:</label>
	<input class="form-control" type="text" name="tel" placeholder="(99) 9 9999-9999" minlength="11" maxlength="11" required>
	<label>E-mail:</label>
	<input class="form-control" type="text" name="email" placeholder="seuemail@email.com" required>
	<label>Login:</label>
	<input class="form-control" type="text" name="login" placeholder="eusou_vc" required>
	<label>Senha:</label>
	<input class="form-control" type="password" name="pass" placeholder="Senha" maxlength="15" minlength="10" required><br>
	<button class="form-control btn btn-primary" type="submit" name="enviar">Cadastrar</button>
	</fieldset>
</form>
<?php

if (isset($_POST['enviar'])) {

require('conexao.php');

	$nome = $_POST['nome'];
	$cpf = $_POST['cpf'];
	$end = $_POST['end'];
	$tel = $_POST['tel'];
	$user = $_POST['login'];
	$pas = $_POST['pass'];
	$pass = md5(base64_encode($pas));
	$email = $_POST['email'];

$sql = "SELECT * FROM admin";
$query = mysqli_query($con, $sql);

$boolean = True;

while ($dados = mysqli_fetch_assoc($query)) {
	if ($dados['user'] == $user) {
		echo "<script>alert('Administrador ja existe')</script>";
		$boolean = False;
	}
	else if($dados['email'] == $email) {
		echo "<script>alert('Email ja existe')</script>";
		$boolean = False;
	}


}

	if ($boolean == True) {
		$sql = "INSERT INTO admin (nome, cpf, end, tel, login, senha, email) VALUES ('".$nome."','".$cpf."','".$end."','".$tel."','".$user."','".$pass."','".$email."')";

		$query = mysqli_query($con,$sql);

		if ($query) {
			echo "<script>alert('Usuario Cadastrado')</script>";
		}else{
			echo "<script>alert('Usuario não Cadastrado')</script>";
		}
	}
}
?>