<?php

if ($_POST["check"]) {

}

$user = $_POST['user'];
$pas = $_POST['pass'];

$pass = md5(base64_encode($pas));

require('conexao.php');
$sql = "SELECT * FROM admin WHERE login ='$user' AND senha = '$pass'";
$query = mysqli_query($con, $sql);

if(mysqli_num_rows($query) > 0) {
	session_start();

	while ($dados = mysqli_fetch_assoc($query)) {
		$SESSION['id'] = $dados['id'];
	}

	$_SESSION['user']=$user;
	$_SESSION['pass']=$pas;

	header('location:admin/index.php');
}
else{
	unset($_SESSION['user']);
	$sqlv = "SELECT * FROM admin WHERE login ='$user' AND senha = '$pass'";
	$queryv = mysqli_query($con, $sqlv);
	$dados = mysqli_fetch_assoc($queryv);

	if(mysqli_num_rows($queryv) > 0) {
		session_start();

		$_SESSION['user'] = $user;
		$_SESSION['pass'] = $pas;
		$_SESSION['nome'] = $dados['nome'];
		$_SESSION['endereco'] = $dados['endereco'];
		$_SESSION['email'] = $dados['email'];
        $_SESSION['id'] = $dados['id'];

		header('location:index.php');
	}
	else{
		unset($_SESSION['user']);
		header('location:login.php');
	}

}
?>