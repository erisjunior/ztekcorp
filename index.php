<!DOCTYPE html>
<html>
<head>
	<title>ZTekCorp</title>

	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/bootstrap_s.min.css">-->
	<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/slate/bootstrap.min.css" rel="stylesheet" integrity="sha384-RpX8okQqCyUNG7PlOYNybyJXYTtGQH+7rIKiVvg1DLg6jahLEk47VvpUyS+E2/uJ" crossorigin="anonymous">

	<meta name="viewport" content="width=device-width, user-scalable=no">
	<link rel="icon" href="favicon.ico" type="image/x-icon">

</head>
<body>

<?php

	session_start();

	require('conexao.php');
	include 'header.php';

	//#350D3F,#122E59,#591111
	echo "<div style='width: 100%;
		height: 5px;
		background: linear-gradient(to right,#350D3F,#122E59,#350D3F);
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);'>	</div>";

	if(isset($_GET['pag'])){
		include_once $_GET['pag'].'.php';
	}else{
		include_once 'Produtos.php';
	}

	echo "<div style='width: 100%;
		height: 5px;
		background: linear-gradient(to right,#350D3F,#122E59,#350D3F);
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);'>	</div>";

	include 'footer.php';

?>

</body>
</html>