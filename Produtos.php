<!DOCTYPE html>
<html>
<head>
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
<body>


		
<?php 
	
	$registros = 3;

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
	

	echo "<div class='container'><div class='row'>";

	while ($dados = mysqli_fetch_assoc($query)) { 
		echo "<div class='col-sm-2.5' id='produtos'>";
		echo "<img id='prod' src='imgProd/".$dados['image']."'>";
		echo "<h5>".$dados['nome']."</h5>";
		echo "Preço: ".$dados['preco']."<br><br>";
		echo "<a class='btn btn-primary' href='?cat=".$dados['categoria']."&pag=detalhes&id=".$dados['id']."'> Detalhes</a>";

		echo "</div>";
	}

	echo "</div>";

echo "<center><ul class ='pagination'>";
	
		if (isset($_GET['cat'])) {
			$cat = "cat=".$_GET['cat'];
		}else{
			$cat="";
		}

		if ($pagina > 1) {
			echo "<li><a href='?".$cat."&pagina=".($_GET['pagina'] - 1)."'>&laquo</a></li>";
		}
		for ($i=1; $i < $numPaginas + 1 ; $i++) { 
			if ($pagina == $i) {
				echo "<li class='active'><a href='?".$cat."&pagina=".$i."'>$i</a></li>";
			}else{
				echo "<li><a href='?".$cat."&pagina=".$i."'>$i</a></li>";
			}
			
		}

		 if ($numPaginas > $pagina) {
		 	echo "<li><a href='?".$cat."&pagina=".($pagina + 1)."'>&raquo</a></li> ";
		 }

	echo "</ul></center></div></div>";
 ?>
 </div>
</body>
</html>