<?php 
	include_once("conexion.php");

	$password = md5($_REQUEST['clave']);
	$username = mysqli_real_escape_string($mysqli,$_REQUEST['usuario']);
	$results = $mysqli->query("SELECT u.*,p.perfil FROM users u INNER JOIN perfiles p ON p.id=u.idperfil WHERE u.username='$username' AND u.password='$password'");
	if (mysqli_num_rows($results) == 1){
		// Inicio la sesión
		session_start();
		while ($fila=mysqli_fetch_array($results)){
			$_SESSION['id'] = $fila['id'];
			$_SESSION['usuario'] = $fila['username'];
			$_SESSION['active'] = true;
			$_SESSION['type'] = $fila['perfil'];
		}
		header("Location: index.php");
	}
	else{
		header("Location: index.php?error");
	}
 ?>