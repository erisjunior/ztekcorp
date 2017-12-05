<?php

if(isset($_POST['user'])){
    $user = $_POST['user'];
    $pas = $_POST['pass'];
    $pass = md5(base64_encode($pas));
    
    session_start();

    $sql = "SELECT * FROM admin WHERE login ='$user' AND senha = '$pass'";
    $query = mysqli_query($con, $sql);
    
    if(mysqli_num_rows($query) > 0) {
    
    	while ($dados = mysqli_fetch_assoc($query)) {
    		$_SESSION['idadmin'] = $dados['id'];
    		$_SESSION['admin']=$dados['login'];
        	$_SESSION['passadmin']=$dados['senha'];
    	}
        
        header('location:index.php');
    }
    else{
    
    	unset($_SESSION['admin']);
    	header('location:login.php');
    
    }
}
?>