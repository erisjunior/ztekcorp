<!DOCTYPE html>
<html>
<head>
</head>
<body>
<div class="container">
<div class="row"><div class="col-sm-12">
	<?php

		$id = $_GET['prod_id'];

		$sql = "SELECT * FROM produto WHERE id ='$id'";
		$query = mysqli_query($con, $sql);

		if (isset($_GET['acao'])){
			$acao = $_GET['acao'];
		}

		while($dados = mysqli_fetch_assoc($query)){

			if (isset($acao)) {
				$prod = $_POST['produto'];
				$preco = $_POST['preco'];
				$cat = $_POST['cat'];
				$detalhes = $_POST['detalhes'];
			}else{
				$prod = $dados['nome'];
				$preco = $dados['preco'];
				$cat = $dados['categoria'];
				$detalhes = $dados['detalhes'];
			}

			echo "<h4>Edição do Produto ".$prod."</h4>";

			echo "<form action='?envia=edit_prod&&prod_id=".$id."&&acao=up' method='post' enctype='multipart/form-data'>

				<label>Nome do Produto</label>
				<input class='form-control' type='text' name='produto' value='".$prod."'>

				<label>Preço do Produto</label>
				<input class='form-control' type='text' name='preco' value='".$preco."'>

				<label></label>
				<textarea name='detalhes' class='form-control' style='resize: vertical;'>".$detalhes."</textarea>

				<label>Categoria do Produto</label>
				<select class='form-control' name='cat'>
					<option value='".$cat."'>Categoria</option>
					<option>Acessorio</option>
			        <option>Smartphone</option>
			        <option>Gadgets</option>
			        <option>Gaming</option>
			        <option>Computadores</option>

				</select>

				<label>Imagem do Produto</label>
				<input style='height: 40px;' class='form-control' type='file' name='file'>

				<input style='margin-top: 15px;'' class='form-control btn btn-primary' type='submit' name='Enviar' value='Enviar'>

				<a style='margin-top:15px' class='btn btn-primary form-control' href='index.php?envia=Gerenciador'>Voltar</a>

			</form>";

		}


		if (isset($acao)) {

			if($_FILES['file']['name'] == ""){

				$sql = "UPDATE produto SET nome ='".$prod."', preco ='".$preco."', categoria ='".$cat."', detalhes ='".$detalhes."' WHERE id='$id'";

				$query = mysqli_query($con,$sql);

				if (!$query) {
					echo "<script>alert('Erro no processo')</script>";
				}else{
					echo "<script>confirm('Mudanças realizadas com sucesso');</script>";
				}

			}else{

				$dir="../imgProd/";

				$ext = strtolower(substr($_FILES['file']['name'], -4));
				$nome = md5(microtime()).$ext;

				$tam = $_FILES['file']['size'];
				$tam = ceil(($tam / 1024)/1024);
				if ($tam < 2) {
					if ($ext == ".jpg" || $ext == ".png" || $ext == ".bmp" || $ext == ".gif"){
						if (move_uploaded_file($_FILES['file']['tmp_name'], $dir.$nome)) {

							$sql = "UPDATE produto SET nome ='".$prod."', preco ='".$preco."', categoria ='".$cat."', detalhes ='".$detalhes."', image = '".$nome."' WHERE id='$id'";

							$query = mysqli_query($con,$sql);

							if (!$query) {
								echo "<script>alert('Erro no processo')</script>";
							}

						} else{
							echo "<script>alert('Erro no upload')</script>";
						}
					}else{
						echo "<script>alert('Formato incompativel, tente .jpg ou .png ou .bmp ou .gif')</script>";
					}
				}else{
					echo "<script>alert('O seu arquivo é muito grande, insira um menor')</script>";
				}
			}
			//header('location:?envia=Gerenciador');
		}
	?>
</div></div></div>
</body>
</html>