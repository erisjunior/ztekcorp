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
<br><!-- 
<?php
	include('slide.php');
?> -->
<div class='container'>

	<div class="row">
		<div class="col-sm-12">
			<?php
				if(isset($_GET['busca'])){
					echo "<h3>Buscando por: <i>".$_GET['busca']."</i></h3>";
				}

				$cat="";

				if (isset($_GET['cat'])) {
					$cat = $_GET['cat'];
				}
			?>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-8">
			<form method='get' action='index.php?' class='form-inline'>
				<select class="form-control" name="filtro">
					<option value="view DESC">Mais Relevantes</option>
					<option value="preco DESC">Maior Preço</option>
					<option value="preco ASC">Menor Preço</option>
					<option value="nome ASC">A-Z</option>
					<option value="nome DESC">Z-A</option>
				</select>

			    <div class="form-group" style="box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);">
		            <input type="text" class="form-control" name="busca" placeholder="Search...">
					<input type="hidden" name="cat" value="<?php echo $cat;?>">

		            <button type="submit" class=" btn btn-primary">
		            	<span class="fa fa-search"></span>
		            </button>
		        </div>
		    </form>
		</div>
    </div>

<?php
	$registros = 8;

	$where="";

	if (isset($_GET['cat']) && $_GET['cat'] !="") {
		$where = " WHERE categoria='".$_GET['cat']."'";
		if (isset($_GET['busca'])) {
			$where .= " AND nome LIKE '%".$_GET['busca']."%'";
		}
	}else if (isset($_GET['busca'])) {
		$where .= " WHERE nome LIKE '%".$_GET['busca']."%'";
	}

	if(isset($_GET['filtro'])){
		$where .= " ORDER BY ".$_GET['filtro'];
	}else{
		$where .= " ORDER BY view DESC";
	}

	$sql = "SELECT * FROM produto".$where;

	$query = mysqli_query($con, $sql);

	if (isset($_GET['pagina'])) {
		$pagina = $_GET['pagina'];
	}else{
		$pagina = 1;
	}

	$resultados = mysqli_num_rows($query);

	$inicial = ($registros*$pagina)-$registros;
	$numPaginas = ceil($resultados / $registros);

	$sql = "SELECT * FROM produto ".$where." LIMIT $inicial, $registros";

	$query = mysqli_query($con, $sql);

	echo "<div class='row'>";

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


		$cat="";
		if (isset($_GET['cat'])) {
			$cat .= "cat=".$_GET['cat'];
			if (isset($_GET['busca'])) {
				$cat .= "&busca=".$_GET['busca'];
			}
		}else if (isset($_GET['busca'])) {
			$cat .= "busca=".$_GET['busca'];
		}

		if(isset($_GET['filtro'])){
			$cat .= "&filtro=".$_GET['filtro'];
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