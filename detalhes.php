<!DOCTYPE html>
<head>
	<script src="js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/lightbox.js"></script>
	<script type="text/javascript" src="js/elevatezoom.js"></script>
	<link rel="stylesheet" type="text/css" href="css/lightbox.css">
	<style type="text/css">

		#produtos { height:200px; float: left; margin: 30px 5px 20px 15px; text-align: center; background: #fff;}
		#produtos:hover { opacity: 0.8; transition: 0.5s; cursor: pointer;}
		a#bug{width: 100%; padding: 5px 45px;}

		#pag {clear: both; color: red}
		#pag a{color: red; font:55px;}
		input { width: 180px; }
		span {font: 22px;}
		#frete { margin-top: 5px; text-align: center }
			input[type="radio"] {
	        visibility: hidden;
		}
		input[type=text] {
			height: 35px;
			border-radius: 5px;
			border: 1px solid #ccc;
			color: #495057;
			background-color: #fff;
			border-color: #80bdff;
			outline: none;
		}

		.com { font:14px; }

		#cep input[type=text] {
			height: 35px;
			border-radius: 5px;
			border: 1px solid #ccc;
			color: #495057;
			background-color: #fff;
			border-color: #80bdff;
			outline: none;
			display: inline;
		}

		input[type=radio]:checked + label>img {
			border: 3px solid #62C462;
			width: 80px;
			height: 30px;
		}
		
		input[type=radio] + label>img {
			width: 80px;
 			height: 30px;
		}

		/*
			#pac label, #sedex label {
			   display: block;
			   border: 4px solid #666;
			   width: 60px;
			   float: left;
			}
		*/
	
	</style>
</head>
<body>
<div style="clear: both;"></div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Detalhes</h1>		
		</div>
	</div>
	
	<hr>
	
	<?php
	$id = $_GET['id'];
	$categoria = $_GET['cat'];
	$sql = "SELECT * FROM produto WHERE id = '".$id."'";

	//Consultar as Views
	$view_sql = "SELECT view FROM produto WHERE id = '".$id."'";
	$view_query = mysqli_query($con, $view_sql);
	//While das Views
	while( $view = mysqli_fetch_assoc($view_query)){
		$c = $view['view'];
	}
	$C = $c + 1;
	//Atualiza as Views
	$sql_view = "UPDATE produto SET view = '$C' WHERE id = '$id'";
	$view_query = mysqli_query($con, $sql_view);

	$query = mysqli_query($con, $sql);
	while($dados = mysqli_fetch_assoc($query)){
	echo '
		<div class="row">
			<div class="col-md-12 text-center">
				<h4>'.$dados['nome'].'</h4>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-5">
				<a href="imgProd/'.$dados['image'].'" data-lightbox="roadtrip">
					<img style="border-radius:5px; width:300px; max-height:300px" id="zoom" class="img img-responsive" src="imgProd/'.$dados['image'].'" data-zoom-image="imgProd/'.$dados['image'].'"/>
				</a>
			</div>
			<div class="col-md-7">
				<div class="row" style="height:50px"></div>
				<div class="col-md-6 text-center">
					<h2 id="sub">R$ '.number_format($dados['preco'],2,",",".").'</h2>		
					<div class="row" style="height:10px"></div>	
					<a id="bug" class="btn btn-danger" href="?cat='.$dados['categoria'].'&pag=carrinho&acao=add&id='.$dados['id'].'">Comprar</a>

					<div class="row" style="height:50px"></div>

					<div class="row">
							<form method="post">
							<div class="row">
							<div class="col-md-12 text-left">
								<label>CEP</label>
							</div>
							</div>
							<div class="row">
							<div class="col-md-4">
								<input id="cep" class="form-control" type="text" required name="cep1" maxlength="5" minlength="2">
							</div>
							<div class="col-md-2">
							<input id="cep" class="form-control" required style="width:80px"type="text" name="cep2" maxlength="3" minlength="3">
							</div>
							<div class="col-xs-1"></div>
							<div class="col-md-4">
					 			<input  class="form-control btn btn-success "type="submit" value="Calcular" name="enviar">
					 		</div>
					 		</div>
					 			<div class="row" style="height:5px"></div>
					 		<div class="row">
					 		<div class="col-md-6">
					 			<input id="pac" type="radio" value="41106" name="tipo">
					 			<label for="pac">
					 			<img src="img/pac.png" alt="pac" />
					 			</label>
					 		</div>
					 		<div class="col-md-6">
					 			<input id="sedex" type="radio" value="40010" name="tipo">
					 			<label for="sedex">
					 			<img src="img/sedex.png" alt="sedex" />
					 			</label>
					 		</div>
					 		</div>
							</form>	
						</div>
					</div>
				</div>
		
		</div>';

		echo '<div class="row">';
		echo 
		'<div id="frete" class="col-md-12">';
			if(isset($_POST['enviar'])){

				if (isset($_POST['tipo'])) {
					$tipo = $_POST['tipo'];
					$c1 = $_POST['cep1'];
					$c2 = $_POST['cep2'];
					$cep = $c1.$c2;

					if($tipo == "41106"){
						$servico = "PAC";
					}
					else if($tipo == "40010"){
						$servico = "SEDEX";
					}

					$val = (CalcFrete($tipo, $cep));
					if($val->Valor>0){
    					echo "<div class='alert alert-success'>";
    						echo '<span>Serviço: '.$servico.'</span><br>';
    						echo '<span>Valor: R$ '.$val->Valor.'</span><br>';
    						echo "Prazo: ".$val->PrazoEntrega." dias";
    						unset($_POST);
    					echo "</div>";
					}else{
					    echo "<div class='alert alert-success'>ERRO!</div>";
					}
				}else{
					echo "<div class='alert alert-success'>Selecione o <b>serviço</b>!</div>";
				}

			} 
			else{
				echo "<div class='alert alert-success'>Informe o CEP para calcular o valor do <b>frete</b>!</div>";
			}
		$detalhes = $dados['detalhes'];
	}
	echo '</div>
		  </div>';

	function CalcFrete($tipo, $cepD){

		$url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?";
		$url .= "nCdEmpresa=";
		$url .= "&sDsSenha=";
		$url .= "&nCdServico=".$tipo;
		$url .= "&sCepOrigem=63460000";
		$url .= "&sCepDestino=".$cepD;
		$url .= "&nVlPeso=1";
		$url .= "&nCdFormato=1";
		$url .= "&nVlComprimento=20";
		$url .= "&nVlAltura=5";
		$url .= "&nVlLargura=20";
		$url .= "&nVlDiametro=0";
		$url .= "&sCdMaoPropria=5";
		$url .= "&nVlValorDeclarado=1500";
		$url .= "&sCdAvisoRecebimento=s";
		$url .= "&StrRetorno=xml";

		$xml = simplexml_load_file($url);

		return $xml->cServico;
		unlink($_POST);
	}

	if(isset($_GET['comenta'])){
	    if($_POST){
    		$n = $_POST['nome'];
    		$e = $_POST['email'];
    		$m = $_POST['msg'];
    
        	//Comentou...
        	$sql = "INSERT INTO comentarios (nome, email, msg, prod_id) VALUES ('".$n."', '".$e."', '".$m."', '".$id."')";
        	$query = mysqli_query($con, $sql);
	    }
	}

	$sql_com = "SELECT * FROM comentarios WHERE prod_id = '$id'";
	$sql_query = mysqli_query($con, $sql_com);

	?>

	<div class="row">
		<div class="col-md-12">
			<h3 class="text-left">Detalhes Técnicos</h3><hr>
		</div>
	</div>	

	<div class="row">
		<div class="col-md-12 text-left">
			<?php
				echo $detalhes;
			?>
		</div>
	</div>
	
	<hr>
	
	<div class="row">
		<div class="col-md-12">
			<h3>Comentários (<?php echo mysqli_num_rows($sql_query)?>)</h3><hr>
		</div>
	</div>

	<div class="row">

		<div class="col-md-7">
			<?php
				if(mysqli_num_rows($sql_query) > 0){
					while($com = mysqli_fetch_assoc($sql_query)){
					echo "
						<span class='com'><b>Comentário:</b> ".$com['msg']."</span><br>
						<span class='com'><b>Nome:</b> ".$com['nome']."</span><br>
						<span class='com'><b>Email:</b> ".$com['email']."</span><br>
						<hr>
					";
					}
				}else{
					echo "<h6>Ainda não possui comentários. Seja o primeiro.</h6>";
				}
			?>
		</div>

		<div class="col-md-5">
			<h6>Deixe o seu.</h6>
			<form action="?cat=<?php echo $categoria;?>&pag=detalhes&id=<?php echo $id;?>&comenta=ok" method="post">
				<label class="text-danger">Nome</label><br>
				<input class="form-control" type="text" name="nome" required><br>
				<label class="text-danger">Email</label><br>
				<input class="form-control" type="email" name="email" required><br>
				<label class="text-danger">Comentário</label><br>
				<textarea class="form-control" name="msg" required cols="23" rows="3"></textarea><br>
				<input class="form-control btn btn-danger" type="submit" value="Enviar">
			</form>


		</div>		
		

	</div>

	

	<hr>

	<h3>Mais Visualizados</h3><br>
	
	<div class="row">
	<?php

		$sql_top = "SELECT * FROM produto ORDER BY view DESC LIMIT 4";

		$sql_query = mysqli_query($con, $sql_top);

		while($dados = mysqli_fetch_assoc($sql_query)){

		echo "<div class='col-md-3' >";
		echo "<h4>".$dados['nome']."</h4>";
		echo "<img width='150' height='150' src='imgProd/".$dados['image']."'/>";
		echo "<h5>Preço: ".number_format($dados['preco'],2,",",".")."</h5>";
		echo "<h5>Visualizações: ".$dados['view']."</h5>";
		echo "<a id='bug' class='btn btn-danger' href='?cat=".$dados['categoria']."&pag=detalhes&id=".$dados['id']."'>+ Detalhes</a>";
		echo "</div>";

		}

	?>
	</div>

	<br>

</div>
<div style="clear: both;"></div>
</body>
<script>
		$("#zoom").elevateZoom({
			zoomType: "inner",
			cursor:"crosshair",
		});
</script>

