<!DOCTYPE html>
<html>
<head>
	<title>Cadastrar Produto</title>
	<meta charset="utf-8">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/bootstrap_s.min.css">
</head>
<body>
	<form action="produto_cad.php" method="post" class="container" enctype="multipart/form-data">
		<fieldset>
			<legend>Cadastro de Produtos</legend>
		<label>Nome do Produto:</label>
			<input class="form-control" type="text" name="nome" placeholder="Nome Produto" required>
		<label>Preço:</label>
			<input class="form-control" type="text" name="preco" placeholder="000,00" minlength="4" maxlength="10" required>
		<label>Imagem do Produto:</label><br>
			<input class="form-control" type="file" name="file"><br>
		<label>Categoria do Produto:</label><br>
        	<select class="form-control" name="cat">
		        <option>Categoria</option>
		        <option>Acessorio</option>
		        <option>SmartPhone</option>
		        <option>Gadgets</option>
		        <option>Gaming</option>
		        <option>Computador</option>
        	</select><br>
		<button class="form-control btn btn-primary" type="submit" name="enviar">Cadastrar</button>
		</fieldset>
	</form>
</body>
</html>
