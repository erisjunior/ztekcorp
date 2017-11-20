
<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
	<title>Gerenciador de Produtos</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">

<link rel="stylesheet" type="text/css" href="css/bootstrap_s.min.css">

	<meta name="viewport" content="width=device-width, initial-scale=1">


	
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->


		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" 
		crossorigin="anonymous"> -->
	
	<script src="js/bootstrap.min.js"></script>

	<style type="text/css">
		body{background-color:; }

		* {margin:0 auto; padding:0px}

		thead { background: #CCC; font-weight: bold }
		
		#produtos { height:200px; float: left; margin: 50px 15px; text-align: center; 
			background: #fff;}
		
		#produtos:hover { opacity: 0.8; transition: 0.5s; cursor: pointer;}
		
		#produtos a {position:  relative; top: 15px; background: red; color: white; padding: 5px 45px; text-decoration: none; cursor: pointer;}
		
		img { width: 50px; height: 50px; }
		
		#pag {clear: both; color: red}
		
		#pag a{color: red; font:55px arial;}
		
		#space { height: 100px;}
		
	</style>
	

</head>
<body>
	

<div class="container">

	<img src="Logo/LogoFi.png" style="width: 500px; height: 150px;">
	<div class="form-group">
		<form method="post" class="form-group" style="float: right; margin-top: -75px; margin-right: 60px;">
	
			<a href="index.php" type="submit" class="form-group btn btn-primary" value="Home">Home</a>

			<a href="Cad_Prod.php" type="submit"  class="form-group btn btn-primary" value="Cadastro de Produtos">Cadastro de Produtos</a>

		

			<input type="submit" class="form-group btn btn-primary" value="Sair" name="sair">

		</form>
	</div>

<div class="row" style="height: 0px">
<!-- 		<h2>Produtos</h2>
		<div id="busca"> -->
			<!-- <form action="Gbusca.php" method="get"> -->
			<div class="col-sm-7"><h2>Produtos</h2></div>
			<div class="col-sm-3">
				<input type="text" class="form-control" name="busca" placeholder="Faça sua busca aqui...">
			</div>
			<div class="col-sm-2">
				<input type="submit" class="form-control btn btn-primary" value="Buscar">
			</div>
			<!-- </form> -->
		
<!-- 	</div>	 -->
</div>

<br>
	


<hr/>
<?php
require("conexao.php");
$registros = 10;

$sql = "SELECT * FROM produto";
$query = mysqli_query($con, $sql);

if(isset($_GET['pagina'])){
	$pagina = $_GET['pagina'];
}else{
	$pagina = 1;
}

$resultados = mysqli_num_rows($query);

$inicial = ($registros*$pagina)-$registros;
$numPaginas = ceil($resultados/$registros);

$sql = "SELECT * FROM produto LIMIT $inicial, $registros";
$query = mysqli_query($con, $sql);

echo "<div class='row'>
<table class='table table-striped'>
<thead>
<tr>
<td width='70%'>Produto</td>
<td width='10%'>Miniatura</td>
<td width='20%'>Ação</td>
</tr>
</thead>
<tbody>
";
while($dados = mysqli_fetch_assoc($query)){
	
		echo "<tr>
			  <td>";
		echo "<h5>".$dados['nome']."</h5>";
		echo "</td>";
		echo "<td>";
		echo "<img src='imgProd/".$dados['image']."'/>";
		echo "</td>";
		echo "<td>
		<a class='btn btn-warning glyphicon glyphicon-edit' href='edit_prod.php?prod_id=".$dados['id']."'> Editar</a>
		<a class='btn btn-danger glyphicon glyphicon-trash' href='removeProdutos.php?prod_id=".$dados['id']."'> Remover</a>
		</td>
		</tr>";

}
echo "</tbody>";
echo "</div>";
echo "<div class='row' id='space'>";
	echo "<div class='col-md-12'>";

	echo "</div>";
echo "</div>";
echo "</table>";
echo "<div class='row'>";
	echo "<div class='col-md-12'><center><ul>";
	for($i = 1; $i < $numPaginas + 1; $i++){
		echo "<a href='?pagina=".$i."'>$i</a>";
	}
	echo "</center></ul></div>";
echo "</div>";
?>

</body>


