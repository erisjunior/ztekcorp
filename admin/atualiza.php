
<div class="container">
	<div class="row">
		<div class="col-sm-6">
			 <?php
			$us = $_SESSION['user'];

			$sql = "SELECT * FROM admin WHERE login ='".$us."'";
			$query = mysqli_query($con, $sql);

			if (isset($_GET['acao'])){
				$acao = $_GET['acao'];
			}

			while($dados = mysqli_fetch_assoc($query)){

				if (isset($acao)) {
					if ($acao == "up") {
						$nome = $_POST['nome'];
						$user = $_POST['user'];
						$email = $_POST['email'];
						$pass = $dados['senha'];
					}else if ($acao == "pass") {
						$pass = $_POST['pass'];
						$nome = $dados['nome'];
						$user = $dados['login'];
						$email = $dados['email'];
					}
				}else{
					$nome = $dados['nome'];
					$user = $dados['login'];
					$pass = $dados['senha'];
					$email = $dados['email'];
				}

				echo "<form action='?envia=atualiza&&acao=up' method='post'>

					<label>Nome</label>
					<input class='form-control' type='text' name='nome' value='".$nome."'>
					<label>Usuario</label>
					<input class='form-control' type='text' name='user' value='".$user."'>

					<label>Email</label>
					<input class='form-control' type='email' name='email' value='".$email."'>

					<input style='margin-top: 15px;'' class='form-control btn btn-primary' type='submit' name='Enviar' value='Enviar'>

				</form>

				<form style='margin-top:15px' action='?envia=atualiza&&acao=pass' method='post'>

					<label>Velha Senha</label>
					<input class='form-control' type='text' name='passv' placeholder='Velha Senha'>
					
					<label>Nova Senha</label>
					<input class='form-control' type='text' name='pass' placeholder='Nova Senha'>

					<input style='margin-top: 15px;'' class='form-control btn btn-primary' type='submit' name='Enviar' value='Enviar'>

				</form>			

				";

			}

			if (isset($acao)) {
			
			if ($acao == "up") {


				$sql = "UPDATE admin SET nome ='".$nome."', login ='".$user."', email ='".$email."' WHERE login='$us'";

				$query = mysqli_query($con,$sql);
				header("location: index.php"); 

			}else if ($acao == "pass") {

				if ($_POST['passv'] == $_SESSION['senha']) {
		
					$sql = "UPDATE admin SET senha ='".md5(base64_encode($pass))."' WHERE login='$us'";

					$query = mysqli_query($con,$sql);

					if (!$query) {
						echo "<script>alert('Erro ao cadastrar')</script>";
					}else{
						echo "<script>confirm('Mudanças realizadas com sucesso');</script>";
					}

					header("Location: index.php");

				}else{
					echo "<script>alert('Velha Senha Incorreta')</script>";
				}

			}
		}
		?>
		</div>
	</div>

</div>
<br>