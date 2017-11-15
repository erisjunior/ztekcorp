<meta charset="utf-8">
<?php

//Verifica se o usuario forneceu os dados corretamente
if (isset($_POST['entrar'])) {
	
	$user = $_POST['user'];
	$pas = $_POST['senha'];
	$token = md5(microtime());

	$senha = md5(base64_encode($pas));

	require('conexao.php');
	$sql = "SELECT * FROM usuario WHERE user ='$user' AND senha = '$senha'";
	$query = mysqli_query($con, $sql);

	if(mysqli_num_rows($query) > 0) {
		session_start();

		while ($dados = mysqli_fetch_assoc($query)) {
			$SESSION['id'] = $dados['id'];
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
	<div class="row"">

		<div id="topp">
			<div class="col-sm-3">
				<a href="#">
					<img class="logo" src="Logo/LogoFi.png">
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

			<div class="col-sm-1"></div>

			<div class="col-sm-4">
			    <div class="input-group desce" style="box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);">
		            <input type="text" class="form-control" placeholder="Search...">
		            <div class="input-group-addon">
		            	<a><span class="glyphicon glyphicon-search"></span></a>
		            </div>
		        </div>
		    </div>

			<div class="col-sm-1"></div>

			<div class="col-sm-1 desce">
				
				<?php
				if(isset($_SESSION['user'])){
					$logado = $_SESSION['user'];

					$sql = "SELECT image FROM usuario WHERE user='$logado'";
					$query = $query = mysqli_query($con, $sql);
					$dados = mysqli_fetch_assoc($query);
					$imagem = $dados['image'];  

					echo "

							<div class='dropdown' style='width: 34px'>

								<a href='#'>
									<span  style='font-size: 34px' class='glyphicon glyphicon-user sombra'></span>
								</a>

								<div class='dropdown-content' id='desceu' style='background: rgba(39, 43, 48, .8)'>
		                			<h2>".$logado."</h2>
		                			<h3><img style='height:100px;' class='img-responsive img img-circle' src='images/".$imagem."'></h3>
		                			<form method='post'>
		                    			<input type='submit' class='btn btn-primary' value='Sair' name='sair'><br>
		                			</form>
		            			</div>

		        			</div>
		        		";
				}
				else{
						echo "

							<div class='dropdown' style='width: 34px'>

								<a href='#'>
									<span  style='font-size: 34px' class='glyphicon glyphicon-user sombra'></span>
								</a>

								<div class='dropdown-content' id='desceu' style='background: rgba(39, 43, 48, .8)'>
		                			<h2>Entrar na sua conta</h2>
		                			<form method='post'>
		                    			<input type='text' name='user' placeholder='Usuário' required><br>
		                    			<input type='password' name='senha' placeholder='Insira sua senha' required minlength='8'><br>
		                    			<input type='submit' class='btn btn-primary' value='Entrar' name='entrar'><br>
		                    			<label>Ainda não tem uma conta ? <a href='imagem.php' style='color:white'>Cadastre-se.</a></label>
		                			</form>
		            			</div>

		        			</div>
		        		";
					}
				if(isset($_POST['sair'])){
					unset($_SESSION['user']);
					header('location:index.php');
				}

		        ?>

		    </div>

		    <div class="col-sm-1 desce">

				<a href="#">
					<span style="font-size: 34px" class="glyphicon glyphicon-shopping-cart"></span>
				</a>

				<div id="num_itens">0</div>
			</div>

			<div class="col-sm-1 desce">

				<a href="admin/">
					<span style="font-size: 34px" class="glyphicon glyphicon-wrench sombra"></span>
				</a>

			</div>
		</div>

	</div>

	<br>

	<div class="con">
		<div class="row">
			<div class="col-sm-12">
				<ul id="ul">
					<a href="#"><li><img src="MenuIcons/Smartphone.png"></li></a>
					<a href="#"><li><img src="MenuIcons/Gaming.png"></li></a>
					<a href="#"><li><img src="MenuIcons/Computadores.png"></li></a>
					<a href="#"><li><img src="MenuIcons/Gadgets.png"></li></a>
					<a href="#"><li><img src="MenuIcons/Acessorios.png"></li></a>
				</ul>
			</div>
		</div>
	</div>

</header>