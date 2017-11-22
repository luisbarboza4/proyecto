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
	<title>Configuracion - Imagenes</title>
</head>
<body>
	<?php 
	include_once("navbar.php");
	if(isset($_SESSION['active'])){
	header('Location: index.php');
}else{
?>
<div class="row row-main">
	<div class="col-xs-offset-3 col-xs-6">
		<div class="img">
			<img src="img/user.jpg" class="img-responsive" data-toggle="modal" data-target="#myModal">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-edit"></span>Editar</button>
			<button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Eliminar</button>
		</div>
		<div class="img">
			<img src="img/user.jpg" class="img-responsive" data-toggle="modal" data-target="#myModal">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-edit"></span>Editar</button>
			<button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Eliminar</button>
		</div>
		<div class="img">
			<img src="img/user.jpg" class="img-responsive" data-toggle="modal" data-target="#myModal">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-edit"></span>Editar</button>
			<button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Eliminar</button>
		</div>
		<div class="img">
			<img src="img/user.jpg" class="img-responsive" data-toggle="modal" data-target="#myModal">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-edit"></span>Editar</button>
			<button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Eliminar</button>
		</div>
	</div>
</div>
<?php 
}
include("footer.php");
?>
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
	<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Imagenes</h4>
			</div>
			<div class="row">
				<div class="col-xs-8">
					<div class="modal-body">
						<div class="form-group" style="text-align: center;">
							<label for="image_user">
								<img src="img/user.jpg" id="image-show" class="img-responsive">
								<input type="file" name="image_user" id="image_user">
							</label>
						</div>
					</div>
				</div>
				<div class="col-xs-4">
					<div class="row">
						<div class="col-xs-10">
							<label for="name_img">Nombre:</label>
							<input type="text" id="name_img" name="name_img" class="form-control input-xs">
							<hr>
							<label for="cost_img">Costo:</label>
							<input type="number" id="cost_img" name="cost_img" class="form-control input-xs">
							<hr>
							<label for="size_img">Tamaño:</label>
							<select class="form-control" id="size_img" name="size_img">
								<option>Chiquito</option>
								<option>Grande</option>
							</select>
							<hr>
							<label for="type_img">Soporte:</label>
							<select class="form-control" id="type_img" name="type_img">
								<option>Opalina</option>
								<option>Papel Bond</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				 <button type="button" class="btn btn-remove">Aceptar</button>
				 <button type="button" class="btn btn-remove" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>
<div class="row flotante" data-toggle="modal" data-target="#myModal">
	<div class="col-xs-2" style="position: relative;">
		<img src="img/add.png" class="img-responsive" style="position: relative;">
	</div>
</div>

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
</script>
</body>
</html>