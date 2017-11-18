<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width-device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap_s.min.css">
	
<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/slate/bootstrap.min.css" rel="stylesheet" integrity="sha384-RpX8okQqCyUNG7PlOYNybyJXYTtGQH+7rIKiVvg1DLg6jahLEk47VvpUyS+E2/uJ" crossorigin="anonymous">

<link rel="icon" href="favicon.ico" type="image/x-icon">

	<title>Loja</title>
	<meta charset="utf-8">

</head>
<style type="text/css">
	img#prod{
		width:200px;
		height: 200px;
	}
	#produtos{
		height:370px;
		width: 260px;
		float:left;
		text-align:center;
		margin:10px 5px 5px 10px;
		background:rgba(0,0,0,.3);
		padding: 20px;
		margin-left: 20px;
		padding-bottom: 30px;
		border:1px solid rgba(0,0,0,.3);
		border-radius: 3%;
		transition: 1s;
	}

	#produtos:hover{transform: translateY(-3px);

				background-color:rgba(0,0,0,.5);
				transition: 1s; }

	
	.col-md-12{float: right;}
</style>
<body style="margin-left: 10px; margin-right: 10px" class="content">


		
<?php 
	
	require("conexao.php");

	$registros = 4;

	if(isset($_GET['cat'])){
		$sql = "SELECT * FROM produto WHERE categoria='".$_GET['cat']."'";
	}else{
		$sql = "SELECT * FROM produto";
	}
	$query = mysqli_query($con, $sql);

	if (isset($_GET['pagina'])) {
		$pagina = $_GET['pagina'];
	}else{
		$pagina = 1;
	}

	$resultados = mysqli_num_rows($query);

	$inicial = ($registros*$pagina)-$registros;
	$numPaginas = ceil($resultados / $registros); 

	if (isset($_GET['cat'])) {
		$sql = "SELECT * FROM produto WHERE categoria='".$_GET['cat']."' LIMIT $inicial, $registros";
	}else{
		$sql = "SELECT * FROM produto LIMIT $inicial, $registros";
	}

	$query = mysqli_query($con, $sql);

	// if ($_GET['cat'] == "Smartphone") {
	// 	echo"asjaiusnsiansiausnhaiushasiuahs"
	// }
	

	echo "<div class='container'><div class='row'>";

	while ($dados = mysqli_fetch_assoc($query)) { 
		echo "<div class='col-sm-2.5' id='produtos'>";
		echo "<img id='prod' src='imgProd/".$dados['image']."'>";
		echo "<h5>".$dados['nome']."</h5>";
		echo "Preço: ".$dados['preco']."<br><br>";
		echo "<a class='btn btn-primary' href='detalhes.php?id=".$dados['id']."'> Detalhes</a>";

		echo "</div>";
	}

	echo "</div>";

echo "<center><ul class ='pagination'>";

		if ($pagina > 1) {
			echo "<li><a href='?cat=".$_GET['cat']."&&pagina=".($_GET['pagina'] - 1)."'>&laquo</a></li>";
		}
		for ($i=1; $i < $numPaginas + 1 ; $i++) { 
			if ($pagina == $i) {
				echo "<li class='active'><a href='?cat=".$_GET['cat']."&&pagina=".$i."'>$i</a></li>";
			}else{
				echo "<li><a href='?cat=".$_GET['cat']."&&pagina=".$i."'>$i</a></li>";
			}
			
		}

		 if ($numPaginas > $pagina) {
		 	echo "<li><a href='?cat=".$_GET['cat']."&&pagina=".($pagina + 1)."'>&raquo</a></li> ";
		 }

	echo "</ul></center></div></div>";
 ?>
 </div>
</body>
</html>