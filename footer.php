<style type="text/css">
	.rede{
		color: #641880;
		background: rgba(0, 0, 0, 0.5);
		padding: 5px;
		border-radius: 2px;
		font-weight:bold;
	}

	#titulo{
		font-size: 18px;
	}
	#conteudo{
		font-size: 14px;
		text-align: justify;
	}

	#animate{
		width: 150px;
		-webkit-transform: rotateZ(0deg);
        -ms-transform: rotateZ(0deg);
        transform: rotateZ(0deg);
        transition: 1s;
	}

	#animate:hover{
        -webkit-transform: rotateZ(-25deg);
        -ms-transform: rotateZ(-25deg);
        transform: rotateZ(-25deg);
        transition: 1s;
	}

</style>

<?php
	if (isset($_POST['emailComent'])) {
		$query = mysqli_query($con,"INSERT INTO comentariossite (email,comentario) VALUES ('".$_POST['emailComent']."','".$_POST['textComent']."')");
	}
?>

<div style="clear: both;"></div>

<footer id="footer">
<div class="row">
	<div class="col-sm-12" style="background: url(img/vialactea.png);">
		<br>
		<div class="col-sm-4" >
			<label id="titulo">Sobre Nós:</label>

			<label id="conteudo">Ztekcorp fundada em 1930, a empresa tem como principal intuito
			fornecer as mais variadas tecnologias ao mercado. Um dos pontos fortes da mesma é
			a criação de novas tecnologias que tendem a inovar  e facilitar a vida das pessoas
			que as utilizam. A Ztekcorp tem uma grande rede de lojas e empresas associadas a mesma
			que ajudou a empresa a crescer  no mercado nacional e internacional de criação e vendas
			de novas tecnologias, mas existe uma informaçao que poucos sabem, que é sobre seus criadores,
			que são estudantes de uma escola profissionalisante e que são grandes gênios que nasceram para revolucionar,
			inovar e superar tudo já criado por outros gênios.

			</label>
		</div>

		<div class="col-sm-4">

			<label id="titulo">Informações Adicionais</label>

				<ul class="list-inline">
					<a class="btn btn-primary fa fa-youtube" onclick="mudaRede('https://youtube.com/channel/ZTekCorp')"></a>
					<a class="btn btn-primary fa fa-facebook" onclick="mudaRede('https://facebook.com/ZTekCorp')"></a>
					<a class="btn btn-primary fa fa-twitter" onclick="mudaRede('https://twitter.com/ZTekCorp')"></a>
					<a class="btn btn-primary fa fa-envelope" onclick="mudaRede('ztekcorp@gmail.com')"></a>
					<a class="btn btn-primary fa fa-phone" onclick="mudaRede('+55 (84) 9.9466-1363')"></a>
				</ul>
				<div id="rede"></div><br>
				<img id="animate" class="con" src="img/Zlogo.png">
		</div>

		<div class="col-sm-4" >

			<label id="titulo">Nos envie uma mensagem:</label>

			<form method="post">
				<input type="email" name="emailComent" required class="form-control" placeholder="Email"><br>
				<textarea name="textComent" class="form-control" placeholder="Comentario" style="height: 90px" maxlength="140" required></textarea><br>
				<input class="btn btn-primary" type="submit" value="Enviar">
			</form>

		</div>

		<br>
	</div>

</div>
<div class="row" style="background: #222;padding: 10px">

	<div class="col-sm-12">
		&copy; Copyright Reserved to ZTekCorp Corp
	</div>

</div>

</footer>
<div style="clear: both;"></div>


<script type="text/javascript">
	function mudaRede(S){
		var rede = document.querySelector("#rede");
		rede.textContent = S;
		rede.classList.add('rede');
	}

</script>