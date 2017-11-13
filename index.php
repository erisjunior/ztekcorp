<!DOCTYPE html>
<html>
<head>
	<title>ZTekCorp</title>

	<link rel="stylesheet" type="text/css" href="css/style.css">

	<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/slate/bootstrap.min.css" rel="stylesheet" integrity="sha384-RpX8okQqCyUNG7PlOYNybyJXYTtGQH+7rIKiVvg1DLg6jahLEk47VvpUyS+E2/uJ" crossorigin="anonymous">

	<meta name="viewport" content="width=device-width, user-scalable=no">
	<link rel="icon" href="favicon.ico" type="image/x-icon">

	<style type="text/css" media="screen">
		a:hover, a:visited{
			text-decoration: none
		}

		#rowtop{
			position: fixed;
			height: 18%;
		}

		#topp{
			margin: 20px;
		}
		.desce{
			margin-top: 20px;
		}

		.logo{
			float: left;
			width: 200px
		}

		#num_itens{
			background: rgba(50, 50, 230, .7);
			border-radius: 20%;
			width: 20px;
			text-align: center;
			position: relative;
			left: 112px;
			bottom: 45px
		}

	</style>

</head>
<body>

<div class="row" id="rowtop">
	<div id="topp">
		<div class="col-sm-3">
			<img class="logo" src="Logo/LogoFi.png">
		</div>

		<div class="col-sm-2">
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
		</div>

		<div class="col-sm-3">
		    <div class="input-group desce">
	            <input type="text" class="form-control" placeholder="Pesquisa...">
	            <div class="input-group-addon">
	            	<a><span class="glyphicon glyphicon-search"></span></a>
	            </div>
	        </div>
	    </div>

		<div class="col-sm-1"></div>

		<div class="col-sm-3 desce">
			<a href="#">
				<span  style="font-size: 34px" class="glyphicon glyphicon-user"></span>
			</a>

			<a href="#">
				<span style="margin-left: 50px;font-size: 34px" class="glyphicon glyphicon-shopping-cart"></span>
			</a>

			<a href="#">
				<span style="margin-left: 50px;font-size: 34px" class="glyphicon glyphicon-wrench"></span>
			</a>

			<div id="num_itens">0</div>

		</div>
	</div>

</div>

</body>
</html>