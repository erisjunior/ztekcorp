<?php

if(isset($_SESSION['user'])){
	$logado = $_SESSION['user'];
  	$idc = $_SESSION['id'];
}
?>
<!DOCTYPE html>
<html>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">

	jQuery(document).ready(function(){
	  $(".oculto").hide();
	    $(".inf").click(function(){
	          var nodo = $(this).attr("href");
	          if ($(nodo).is(":visible")){
	               $(nodo).hide();
	               return false;
	          }else{
	        $(".oculto").hide("slow");
	        $(nodo).fadeToggle("fast");
	        return false;
	          }
	    });
	});

	</script>
</head>
	<div class="container">

		<?php
			$ttotal = 0;
			foreach ($_SESSION['carrinho'] as $id => $qnt) {

				$sql = "SELECT * FROM produto WHERE id = '$id'";
				$query = mysqli_query($con, $sql);
				$dados = mysqli_fetch_assoc($query);

				$nome = $dados['nome'];
				$preco = $dados['preco'];
				$total = $preco * $qnt;

				echo '
				<div class="row" style="margin: 5px 0">
					<div class="col-md-3">
					'.$nome.'
					</div>
					<div class="col-md-3">
					'.$qnt.'
					</div>
					<div class="col-md-3">
					R$ '.number_format($preco,2,',','.').'
					</div>
					<div class="col-md-3">
					R$ '.number_format($total,2,',','.').'
					</div>

				</div>
				';
				$ttotal += $total;

			}
			echo '
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-3"></div>
					<div class="col-md-3"></div>
					<div class="col-md-3">
							<h3>Valor Total
							<br><span class="text-danger">R$ '.number_format($ttotal,2,',','.').'</span>
					</h3></div>
				</div>
			';
		?>
		<div class="row">
			<div class="col-md-12">
				<h4>Endereço:</h4>
				<?php

				$sql = "SELECT end FROM usuario WHERE id = '$idc'";

				$query = mysqli_query($con, $sql);

				$end = mysqli_fetch_assoc($query);

				echo $end['end'];

				?>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<h4>Formas de Pagamento:</h4>
				<div class="row">
					<div class="col-md-12">

						<div class="row" style="margin-bottom: 20px;">
						    <div class="col-sm-2 col-sm">
						    	<a href="#info1" class="inf btn btn-danger"><span class="fa fa-barcode"></span> Boleto</a>
						    </div>
						    <div class="col-sm-2 col-sm">
						    	<a href="#info2" class="inf btn btn-danger"><span class="fa fa-credit-card-alt"></span> Cartão</a>
						    </div>
			  			</div>
						<div class="row">
				    		<div id="info1" class="col-md-6 well oculto">

					            <h4>
								No fechamento da compra com essa modalidade é necessário efetuar o pagamento do boleto, para que o processo seja devidamente finalizado.
							    </h4>
							    <form action="img/boleto.png">
							    <input class="btn btn-danger" type="submit" value="Gerar Boleto.">
							  	</form>
						    </div>
						    <div id="info2" class="col-md-6 well oculto">
							    <form>
							    	<label for="nome">Nome</label>
							    	<input class="form-control" type="text" name="num" style="width: 330px" required>

							    	<label for="num">Número do Cartão</label>
							    	<input class="form-control" type="text" name="num" id="num" maxlength="20" style="width: 200px" required>

							    	<label for="num">CCV</label>
							    	<input class="form-control" type="text" name="num" id="num" maxlength="3" style="width: 80px" required>

							    	<label for="num">Data de Validade</label>
							    	<input class="form-control" type="text" name="num" id="num" style="width: 200px" required>


							    	<label for="num">Parcelas</label>
							    	<select class="form-control" style="width: 150px; margin-bottom: 25px">
										<?php
										for($i = 1; $i < 13; $i++){
											echo '<option> '.$i.'x '.number_format($ttotal/$i,2,".",",").'</option>';
										}
										?>
							    	</select>

							    	<input class="btn btn-primary" type="submit" value="Realizar Compra.">
								</form>
						    </div>
						</div>
					</div>
			</div><!-- Col-md-->
		</div><!--Row-->

	</div><!-- Content -->