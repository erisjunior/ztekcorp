<style type="text/css">
	.f{
		font-size: 44px;
		color: #eee
	}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $(".dropdown").click(function(){
        $(".dropdown-content").slideToggle("slow");
    });
});
</script>
<meta charset="utf-8">
<?php
//Verifica se o usuario forneceu os dados corretamente
if (isset($_POST['entrar'])) {

	$user = $_POST['user'];
	$pas = $_POST['senha'];
	$token = md5(microtime());
	$senha = md5(base64_encode($pas));
	$sql = "SELECT * FROM usuario WHERE user ='$user' AND senha = '$senha'";
	$query = mysqli_query($con, $sql);
	if(mysqli_num_rows($query) > 0) {
		while ($dados = mysqli_fetch_assoc($query)) {
			$_SESSION['id'] = $dados['id'];
		}
		$_SESSION['user']=$user;
		$_SESSION['senha']=$pas;
	}
	else{
		//nao consegui azer isto, mas se nao estiver correto ele nao loga e faz o que eu mandar, a nao ser
		echo "<script> alert('Usuário e/ou senha incorreto')(s)</script>";
	}
}
?>

<header style="background: url(img/vialactea.png);">
	<div class="row">
		<div id="topp">
			<div class="col-sm-2">
				<a href="index.php">
					<img class="logo" src="img/LogoFi.png">
				</a>
			</div>
			<!-- <div class="col-sm-2">
				<div class="form-group desce">
			      <select id="selec_cat" class="form-control">
			        <option>Categoria...</option>
			        <option value="acessorios">Acessorios</option>
			        <option value="gadgets">Gadgets</option>
			        <option value="smartphones">Smartphones</option>
			        <option value="gaming">Gaming</option>
			        <option value="computadores">Computadores</option>
			      </select>
			    </div>
			</div> -->
			<div class="col-sm-3"></div>
			<div class="col-sm-3">
				<form method="get" class="form-inline">
				    <div class="form-group desce" style="box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);">
			            <input type="text" class="form-control" name="busca" placeholder="Search...">

			            <button type="submit" class="btn btn-primary">
			            	<span class="fa fa-search"></span>
			            </button>
			        </div>
		        </form>
		    </div>
			<div class="col-sm-1"></div>
			<div class="col-sm-1 desce">

				<?php
				if(isset($_SESSION['user'])){
					$logado = $_SESSION['user'];
					$sql = "SELECT image FROM usuario WHERE user='$logado'";
					$query = mysqli_query($con, $sql);
					while ($dados = mysqli_fetch_assoc($query)) {

					echo "
							<div class='dropdown'>
								<a href='#'>
									<span><img class='img img-responsive img-thumbnail center-block' style='height:50px; width: 50px; border-radius:100%;' src='images/".$dados['image']."'></span>
								</a>
							</div>
								<div class='dropdown-content' id='desceu' style='background: rgba(39, 43, 48, .8);width:280px'>
		                			<h2>".$logado."</h2>
		                			<div class='row'><img class='img img-responsive img-thumbnail center-block' style='height:150px; width: 150px; border-radius:100%;' src='images/".$dados['image']."'></div>
		                			<form method='post'>
		                				<input type='submit' class='btn btn-primary' style='width:100px' value='Perfil' name='perfil'>
		                    			<input type='submit' class='btn btn-primary' style='width:100px' value='Sair' name='sair'><br>
		                			</form>
		            			</div>
		        		";
				}
					}
				else{
						echo "
							<div class='dropdown'>
								<a href='#'>
									<center><span class='fa f fa-user'></span></center>
								</a>
							</div>
								<div class='dropdown-content' id='desceu' style='background: rgba(39, 43, 48, .8); width:280px'>
		                			<h2>Entrar na sua conta</h2>
		                			<form method='post'>
		                    			<input type='text' name='user' placeholder='Usuário' required><br>
		                    			<input type='password' name='senha' placeholder='Insira sua senha' required minlength='8'><br>
		                    			<input type='submit' class='btn btn-primary' value='Entrar' name='entrar'><br>
		                    			<label>Ainda não tem uma conta ? <a href='index.php?pag=imagem' style='color:white'>Cadastre-se.</a></label>
		                			</form>
		            			</div>
		        		";
					}

				if(isset($_POST['sair'])){
					unset($_SESSION['user']);
					header('location:index.php');
				}else if(isset($_POST['perfil'])){
					$_SESSION['user'];
					header('location:index.php?pag=perfil_cliente');
				}


		        ?>
		    </div>
		    <div class="col-sm-1 desce">
				<a href="index.php?pag=carrinho">
					<span class="fa f fa-shopping-cart"></span>
				</a>
				<div id="num_itens"><?php if (isset($_SESSION['carrinho'])){
					echo count($_SESSION['carrinho']);
				}else{
					echo "0";
				}
				?>
				</div>
			</div>
			<div class="col-sm-1 desce">
			</div>
		</div>
	</div>
	<br>
	<div class="con">
		<div class="row">
			<div class="col-sm-12">
				<ul id="ul">
					<a href="?cat=Smartphone"><li><img src="img/Smartphone.png"></li></a>
					<a href="?cat=Gaming"><li><img src="img/Gaming.png"></li></a>
					<a href="?cat=Computadores"><li><img src="img/Computadores.png"></li></a>
					<a href="?cat=Gadgets"><li><img src="img/Gadgets.png"></li></a>
					<a href="?cat=Acessorio"><li><img src="img/Acessorios.png"></li></a>
				</ul>
			</div>
		</div>
	</div>
</header>