<head>
	
</head>

<div class="row" style="height: 400px; width: 100%">
	<div class="col-sm-12">
			<img class="mySlides img img-thumbnail img-responsive" style="width: 100%;height: 400px" src="img/black-friday.png">
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