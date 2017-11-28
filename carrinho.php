<?php
if (isset($_GET['nao'])) {
	echo "<script>alert('Faça o login')</script>";
}

error_reporting(0);

if(isset($_GET['acao'])){

$id = $_GET['id'];

if(!isset($_SESSION['carrinho'])){
	$_SESSION['carrinho'] = array();
}

if($_GET['acao'] == "add"){
	if(!isset($_SESSION['carrinho'][$id])){
		$_SESSION['carrinho'][$id] = 1;
	}else{
		$_SESSION['carrinho'][$id] += 1;
	}
}

if($_GET['acao'] == "del"){
	if(isset($_SESSION['carrinho'][$id])){
		unset($_SESSION['carrinho'][$id]);
	}
}

if($_GET['acao'] == "up"){
	foreach ($_POST['produto'] as $id => $qnt) {

		if(!(empty($_POST['produto'])) || $_POST['produto'] == 0) {
			$_SESSION['carrinho'][$id] = $qnt;
		}
	}	
}	

}


?>

<!DOCTYPE html>
<html>
<body>
<br>
<div class="container">
<form action="?pag=carrinho&acao=up" method="post">
<div class="table-responsive">
<table align='center' cellpadding="10" class="table table-striped">
	<thead>
		<th class='danger'>Produto</th>
		<th class='danger'>Quantidade</th>
		<th class='danger'>Preço Un</th>
		<th class='danger'>Preço Total</th>
		<th class='danger'>Ação</th>
	</thead>
	<tbody>
		<?php
		if(count($_SESSION['carrinho']) == 0){
			echo "
			<tbody>
			<tr><td colspan='5' align='center'><span class='text text-danger'>Não há produtos no carrinho!</span></td></center></tr>
			</tbody>
			";
		}else{
		require("conexao.php");
		$ttotal = 0;
		foreach ($_SESSION['carrinho'] as $id => $qnt) {

			$sql = "SELECT * FROM produto WHERE id = '$id'";
			$query = mysqli_query($con, $sql);
			$dados = mysqli_fetch_assoc($query);

			$nome = $dados['nome'];
			$preco = $dados['preco'];
			$total = $preco * $qnt;
			echo "<tr>
			<td>$nome</td>
			<td><input name='produto[".$id."]' type='text' size='1' value='".$qnt."'></td>
			<td>R$ ".number_format($preco,2,',','.')."</td>
			<td>R$ ".number_format($total,2,',','.')."</td>
			<td><a href='?pag=carrinho&acao=del&id=".$id."'>
			<button type='button' class='btn btn-default'>
				<span class='fa fa-trash'></span> Excluir
			</button>
			</a></td>
			</tr>";
			$ttotal += $total;

		}
		}

		?>
	</tbody>
	<tfoot>
		<tr>
			<td  colspan="2"><input class='btn btn-sm btn-primary' style="width: 100%; font-weight: bold" type="submit" value="Atualizar pedidos"/></td>
			<td>Total: </td>
			<td>
			R$ <?php echo number_format($ttotal,2,',','.');?>
			</td>
			<td></td>
		</tr>
		<tr>
		<td><a class='btn btn-danger' href="index.php">Continuar Comprando</a></td>
		<?php
			if (isset($_SESSION['user'])) {
				echo "<td><a class='btn btn-danger' href='index.php?pag=checkout'>Finalizar Pedido</a></td>";
			}else{
				echo "<td class='text text-danger'>Faça login para finalizar a compra</td>";
			}
		?>
		<td></td>
		<td></td>
		<td></td>
		</tr>
	</tfoot>
</table>
</div>
</form>
</div>
</body>
</html>