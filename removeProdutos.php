<?php

session_start();

if (isset($_SESSION['usuario'])) {
	$logado = $_SESSION['usuario'];
}
else{
	header('login.php');
}
if (isset($_GET['sair'])) {
	unset($_SESSION['usuario']);
	header('login.php');
}

require("conexao.php");

$id = $_GET['prod_id'];
$sql = "DELETE FROM produto WHERE id = '$id'";

$query = mysqli_query($con, $sql);

if ($query) {
	echo "deu certo";
	header('location:Gerenciador.php');
}
?>