<?php 
	$index=true;
	include_once("config.php");
	if(@$user && @$user['type']!='Admin'){
	    redirect("index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="js/jquery-ui-1.12.1/jquery-ui.min.css">
	<link rel="stylesheet" type="text/css" href="css/loading.css">
	<link rel="stylesheet" type="text/css" href="css/styles2.css">
	<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
	<link rel="icon" href="img/favicon.ico" type="image/x-icon">
	<meta charset="UTF-8">
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
	<meta http-equiv="Pragma" content="no-cache"/>
	<meta http-equiv="Expires" content="0"/>
	<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.12.1/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/sweetalert.js"></script>
	<script src="js/loading.js"></script>
	<meta charset="utf-8">
	<title>Configuracion</title>
</head>
<body class="admin">
<?php
	include_once("navbar.php");
	if(!isset($user)){
		include_once("login.php");
	}else{
?>
<form class="container inicio" id="form" method="post" enctype="multipart/form-data">
	<div class="row">
		<div class="col-xs-offset-3 col-xs-6">
			<div class="form-group formini" style="text-align: center;">
				<div id="image-show" class="img-profile img-responsive img-circle"></div>
				<label for="image_user">
				<input type="file" name="image_user" id="image_user">
				</label>
			</div>
			<div class="form-group formini">
				<label for="name_user">Nombre:
				</label>
				<input type="text" name="name_user" id="name_user">
			</div>
			<div class="form-group formini">
				<label for="about_user" style="vertical-align: top;">Acerca del artista:
				</label>
				<textarea name="about_user" id="about_user" rows="5"></textarea>
			</div>
			<div class="form-group" style="text-align: center;">
				<input class="btn elim" type="submit" id="save" value="Guardar">
			</div>
		</div>
	</div>
</form>
<?php
}
include("footer.php");
?>
<script type="text/javascript" src="js/admin.js"></script>
</body>
</html>
