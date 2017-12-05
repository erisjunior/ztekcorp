<!DOCTYPE html>
<html>
<head>

	<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/slate/bootstrap.min.css" rel="stylesheet" integrity="sha384-RpX8okQqCyUNG7PlOYNybyJXYTtGQH+7rIKiVvg1DLg6jahLEk47VvpUyS+E2/uJ" crossorigin="anonymous">

	<meta name="viewport" content="width=device-width, user-scalable=no">
	<link rel="icon" href="admin/favicon.ico" type="image/x-icon">
	<!-- <link rel="stylesheet" type="text/css" href="css/bootstrap_s.min.css"> -->
	<title>ZTekCorp - Login</title>
	<meta charset="utf-8">
</head>
<body>

<div class="container">

	<div class="row">

		<div class="col-sm-4">

			<h4>Login</h4>

			<form action="index.php" method="post">
			<label>Usuário</label>
			<input class="form-control" type="text" name="user">

			<label>Senha</label>
			<input class="form-control" type="password" name="pass">

			<input style="margin-top: 15px" class="form-control btn btn-primary" type="submit" value="Login">

			<a style="margin-top: 30px" class="btn btn-primary form-control" href="index.php">Voltar ao inicio</a>

			</form>

			<?php

			if (isset($_GET['acao'])) {
				include $_GET['acao'].".php";
			}

			?>

		</div>
	</div>
</div>
</body>
</html>