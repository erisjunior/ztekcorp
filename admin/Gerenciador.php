
<!DOCTYPE html>
<html>
<head>
	<script src="../js/bootstrap.min.js"></script>

	<style type="text/css">
		* {margin:0 auto; padding:0px}

		thead {font-weight: bold }

		img { width: 50px; height: 50px; }

		#pag {clear: both; color: red}

		#pag a{color: red; font:55px}
	</style>


</head>
<body>


<div class="container">

	<div class="row">
		<div class="col-sm-7"><h2>Produtos</h2></div>
		<div class="col-sm-3">
			<input type="text" class="form-control" name="busca" placeholder="Faça sua busca aqui...">
		</div>
		<div class="col-sm-2">
			<input type="submit" class="form-control btn btn-primary" value="Buscar">
		</div>
	</div>


<hr/>
<?php

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
		echo "<img src='../imgProd/".$dados['image']."'/>";
		echo "</td>";
		echo "<td>
		<a class='btn btn-warning' href='index.php?envia=edit_prod&prod_id=".$dados['id']."'><span class='fa fa-edit'></span> Editar</a>
		<a class='btn btn-danger' href='removeProdutos.php?prod_id=".$dados['id']."'><span class='fa fa-trash'></span> Remover</a>
		</td>
		</tr>";

}
echo "</tbody>";
echo "</table>";
echo "</div>";
echo "<div class='row'>";
	echo "<div class='col-md-12'><center><ul>";
	for($i = 1; $i < $numPaginas + 1; $i++){
		echo "<a href='?pagina=".$i."'>$i</a>";
	}
	echo "</center></ul></div>";
echo "</div>";
?>

</body>


