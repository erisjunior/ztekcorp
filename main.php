<?php
	//include 'slide.php';
?>

<div class="container">

<?php
error_reporting(0);
require("conexao.php");
$registros = 10;

$sql = "SELECT * FROM produtos";
$query = mysqli_query($con, $sql);

if(isset($_GET['pagina'])){
	$pagina = $_GET['pagina'];
}else{
	$pagina = 1;
}

$resultados = mysqli_num_rows($query);

$inicial = ($registros*$pagina)-$registros;
$numPaginas = ceil($resultados/$registros);

$sql = "SELECT * FROM produtos LIMIT $inicial, $registros";
$query = mysqli_query($con, $sql);

echo "<div class='row'>";

while($dados = mysqli_fetch_assoc($query)){
	echo "<div class='col-md-4'>";
		echo "<div id='produtos'>";
			echo "<h4>".$dados['nome']."</h4>";
			echo "<img class='img-responsive' src='images/".$dados['imagem']."'/>";
			echo "<h5>Preço: ".number_format($dados['preco'],2,",",".")."</h5>";
			echo "<a  class='btn' href='detalhes.php?id=".$dados['id']."'>+ Detalhes</a>";
		echo "</div>";
	echo "</div>";
}
echo "</div>";
echo "<div class='row' id='space'>";
	echo "<div class='col-md-12'>";

	echo "</div>";
echo "</div>";

echo "<div class='row'>";
	echo "<div class='col-md-12'><center><ul>";
	for($i = 1; $i < $numPaginas + 1; $i++){
		echo "<a href='index.php?pagina=".$i."'>$i</a>";
	}
	echo "</center></ul></div>";
echo "</div>";
?>

</div>

<div style="clear: both;"></div>