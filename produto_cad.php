<?php

require("conexao.php");

$prod = $_POST['nome'];
$preco = $_POST['preco'];
$cat = $_POST['cat'];

$dir = "images/";
$ext = strtolower(substr($_FILES['file']['name'], -4));
$nome = md5(microtime()).$ext;

$tam = $_FILES['file']['size'];
$tam =ceil(($tam / 1024) / 1024);

if($tam < 2){
	if($ext == ".jpg" || $ext == ".png" || $ext == ".bmp" || $ext == ".gif"){
		if(move_uploaded_file($_FILES['file']['tmp_name'], $dir.$nome)){
			
			$sql = "INSERT INTO produto (nome, image, preco, categoria) VALUES ('".$prod."', '".$nome."','".$preco."','".$cat."');";
			
			$query = mysqli_query($con, $sql);

			if(!$query){
				echo "<script>alert('Erro ao Cadastar [Cadastro]!')</script>";
			}else{
				echo "<script>alert('Cadastrado com Sucesso!');
				</script>";
				header('location:Cad_Prod.php');
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

$ext2 = strtolower(substr($_FILES['file2']['name'], -4));
$nome2 = md5(microtime()).$ext2;

$tam2 = $_FILES['file2']['size'];
$tam2 =ceil(($tam2 / 1024) / 1024);

if($tam2 < 2){
	if($ext2 == ".jpg" || $ext2 == ".png" || $ext2 == ".bmp" || $ext2 == ".gif"){
		if(move_uploaded_file($_FILES['file2']['tmp_name'], $dir.$nome2)){
			
			$sql = "UPDATE produto SET image2='".$nome2."' WHERE image='".$nome."'";
			
			$query = mysqli_query($con, $sql);

			if(!$query){
				echo "<script>alert('Erro ao Cadastar [Cadastro]!')</script>";
			}else{
				echo "<script>alert('Cadastrado com Sucesso!');
				</script>";
				header('location:Cad_Prod.php');
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

$ext3 = strtolower(substr($_FILES['file3']['name'], -4));
$nome3 = md5(microtime()).$ext3;

$tam3 = $_FILES['file3']['size'];
$tam3 =ceil(($tam3 / 1024) / 1024);

if($tam3 < 2){
	if($ext3 == ".jpg" || $ext3 == ".png" || $ext3 == ".bmp" || $ext3 == ".gif"){
		if(move_uploaded_file($_FILES['file3']['tmp_name'], $dir.$nome3)){
			
			$sql = "UPDATE produto SET image3='".$nome3."' WHERE image='".$nome."'";
			
			$query = mysqli_query($con, $sql);

			if(!$query){
				echo "<script>alert('Erro ao Cadastar [Cadastro]!')</script>";
			}else{
				echo "<script>alert('Cadastrado com Sucesso!');
				</script>";
				header('location:Cad_Prod.php');
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

$ext4 = strtolower(substr($_FILES['file4']['name'], -4));
$nome4 = md5(microtime()).$ext;

$tam4 = $_FILES['file4']['size'];
$tam4 =ceil(($tam / 1024) / 1024);

if($tam4 < 2){
	if($ext4 == ".jpg" || $ext4 == ".png" || $ext4 == ".bmp" || $ext4 == ".gif"){
		if(move_uploaded_file($_FILES['file4']['tmp_name'], $dir.$nome4)){
			
			$sql = "UPDATE produto SET image4='".$nome4."' WHERE image='".$nome."'";
			
			$query = mysqli_query($con, $sql);

			if(!$query){
				echo "<script>alert('Erro ao Cadastar [Cadastro]!')</script>";
			}else{
				echo "<script>alert('Cadastrado com Sucesso!');
				</script>";
				header('location:Cad_Prod.php');
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

?>
