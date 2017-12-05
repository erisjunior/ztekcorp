<?php

require('../conexao.php');

$id = $_GET['prod_id'];
$sql = "DELETE FROM produto WHERE id = '$id'";

$query = mysqli_query($con, $sql);

if ($query) {
	header('location:index.php?envia=Gerenciador');
}
?>