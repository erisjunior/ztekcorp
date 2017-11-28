<?php
define("HOST", "localhost");
define("USER", "root");
define("PASS", "");
define("DB", "loja");
$con = mysqli_connect(HOST,USER,PASS) or die(" when i outside and saw the moom,i breathe and think of you, i'm think of you ooo ");
$banco = mysqli_select_db($con, DB);
?>