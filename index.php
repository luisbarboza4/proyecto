<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="js/jquery-ui-1.12.1/jquery-ui.min.css">
	<link rel="stylesheet" type="text/css" href="css/loading.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.12.1/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script src="js/loading.js"></script>
	<meta charset="utf-8">
	<title>Configuracion</title>
</head>
<body>
<?php 
	include_once("navbar.php");
	if(isset($_SESSION['active'])){
		include_once("login.php");
	}else{
?>
<form class="container inicio" id="form" method="post" enctype="multipart/form-data">
	<div class="row">
		<div class="col-xs-offset-3 col-xs-6">
			<div class="form-group formini" style="text-align: center;">
				<label for="image_user">
					<img src="img/user.jpg" id="image-show" class="img-responsive">
					<input type="file" name="image_user" id="image_user">
					</label>
			</div>
			<div class="form-group formini">
				<label for="name_user">Nombre a mostrar del usuario:
				</label>
				<input type="text" name="name_user" id="name_user">
			</div>
			<div class="form-group formini">
				<label for="about_user" style="vertical-align: top;">Acerca del usuario:
				</label>
				<textarea name="about_user" id="about_user" rows="5"></textarea>
			</div>
			<div class="form-group" style="text-align: center;">
				<input class="btn btn-primary" type="button" name="save" id="save" value="Guardar">
			</div>
		</div>
	</div>
</form>
<?php 
}
include("footer.php");
?>
<script type="text/javascript">
	$("#image_user").change(function(){
		var allowedExtension = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/bmp'];
		if(allowedExtension.indexOf($(this).get(0).files[0].type) < 0){
			alert("Extension no permitida");
			$(this).val("");
			return false;
		}else{
			var reader = new FileReader();
	        reader.onload = function (e) {
	           $('#image-show').attr('src', e.target.result);
	        }
	       reader.readAsDataURL($(this).get(0).files[0]);
		}
	})
	$("#save").click(function(){
		$('html').loading();
		$j.ajax({
	        url: "ajax/save.php",
	        type: "POST",
	        data: $('#form').serialize(),
	        success:function (data) {
	        	$('html').loading("stop");
	        	alert("Configuracion Guardada Exitosamente");
	        }
    	});
	})
</script>
</body>
</html>