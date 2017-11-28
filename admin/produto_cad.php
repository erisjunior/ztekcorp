<?php

require('../conexao.php');

$prod = $_POST['nome'];
$preco = $_POST['preco'];
$detalhes = $_POST['detalhes'];
$cat = $_POST['cat'];

$dir = "../imgProd/";
$ext = strtolower(substr($_FILES['file']['name'], -4));
$nome = md5(microtime()).$ext;
$tam = $_FILES['file']['size'];
$tam =ceil(($tam / 1024) / 1024);
if($tam < 2){
	if($ext == ".jpg" || $ext == ".png" || $ext == ".bmp" || $ext == ".gif"){
		if(move_uploaded_file($_FILES['file']['tmp_name'], $dir.$nome)){

			$sql = "INSERT INTO produto (nome, image, preco, categoria,detalhes) VALUES ('".$prod."', '".$nome."','".$preco."','".$cat."','".$detalhes."');";

			$query = mysqli_query($con, $sql);

			if(!$query){
				echo "<script>alert('Erro ao Cadastar [Cadastro]!')</script>";
			}else{
				echo "<script>alert('Cadastrado com Sucesso!');
				</script>";
			}
		}else{
			echo "<script>alert('Erro ao Cadastar [Upload]!')</script>";
		}
	}else{
		echo "Os formatos aceitos: jpg, png, bmp e gif";
	}
}else{
	echo "Tamanho ultrapassou 2MB";
}

header('location:index.php?envia=Cad_Prod');
?>
