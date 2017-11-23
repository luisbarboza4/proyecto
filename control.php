<?php 
	$index = true;
	include_once("config.php");
	include_once("messages.php");
	//$mysqli = connectDB();
	$password = md5($_REQUEST['clave']);
	$username = $_REQUEST['usuario'];
	//$results = $mysqli->query("SELECT * FROM user WHERE username='$username' AND password='$password'");
	if ($db->fetch_item("SELECT * FROM user WHERE username=:username AND password=:pass",array(':username'=>$username,':pass'=>$password))){
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
	}else{
		errorMessage('Usuario y/o contraseña inválidos');
		
	}
	redirect("index.php");
 ?>