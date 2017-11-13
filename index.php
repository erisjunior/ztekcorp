<!DOCTYPE html>
<html>
<head>
	<title>ZTekCorp</title>

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/bootstrap_s.min.css">-->
	<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/slate/bootstrap.min.css" rel="stylesheet" integrity="sha384-RpX8okQqCyUNG7PlOYNybyJXYTtGQH+7rIKiVvg1DLg6jahLEk47VvpUyS+E2/uJ" crossorigin="anonymous">

	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

	<meta name="viewport" content="width=device-width, user-scalable=no">
	<link rel="icon" href="favicon.ico" type="image/x-icon">

	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>

<?php
	include 'header.php';

	echo "<div style='width: 100%; height: 10px; background: linear-gradient(to right ,#591111,#350D3F,#122E59)'></div>";

	include 'main.php';

	include 'menu.php';

	if(isset($_POST['pag'])){
		include $_POST['pag'].'.php';
	}

	include 'footer.php';

?>

</body>
</html>