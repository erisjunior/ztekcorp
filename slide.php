<div class="row" style="background-color:; height: 400px;">
	<div class="col-sm-12">
		<div class="w3-content w3-section">
			<img class="mySlides img" src="img/vialactea.png">
			<img class="mySlides img" src="Logo/LogoFi.png">
		</div>
	</div>
</div>
</body>

<script type="text/javascript">

	var myIndex = 0;
	carousel();

	function carousel() {
	    var i;
	    var x = document.getElementsByClassName("mySlides");
	    for (i = 0; i < x.length; i++) {
	       x[i].style.display = "none";
	    }
	    myIndex++;
	    if (myIndex > x.length) {myIndex = 1}
	    x[myIndex-1].style.display = "block";
	    setTimeout(carousel, 2000); // Change image every 2 seconds
	}

</script>