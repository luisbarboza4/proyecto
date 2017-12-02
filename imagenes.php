<?php 
	include_once("config.php");
	if(isset($user) && $user['type']!='Admin'){
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
	<script type="text/javascript" src="js/imagenes.js"></script>
	<meta charset="utf-8">
	<title>Configuracion - Imagenes</title>
</head>
<body class="imagenes">
	<?php
		include_once("navbar.php");
	?>
<div class="row">
	<br>
	<div class="form-group">
	    <div class="col-xs-offset-4 col-xs-1">
	        <label for="buscar" class="control-label">Buscar:</label>
	    </div>
	    <div class="col-xs-3">
	        <input  type="text" maxlength="30" name="buscar" id="buscar" class="form-control" placeholder="nombre de ilustracion"/>
	    </div>
	</div>
	<br>
</div>
<div class="row row-main images-list">
</div>

<?php
	include("footer.php");
?>
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
	<!-- Modal content-->
		<form id="dialog_image" class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Imagenes</h4>
			</div>
			<div class="row">
				<div class="col-xs-8">
					<div class="modal-body">
						<div class="form-group" style="text-align: center;">
							<label for="image_user">
								<img src="img/placeholder.jpg" id="image-show" class="img-responsive ignore">
								<input type="file" name="image_user" id="image_user">
							</label>
						</div>
					</div>
				</div>
				<div class="col-xs-4">
					<div class="row">
						<div class="col-xs-10">
							<input type="hidden" name="id_imagen"  id="id_imagen" value="0">
							<label for="name_img">Nombre:</label>
							<input type="text" id="name_img" name="name_img" class="form-control input-xs">
							<hr>
							<label for="add-costo">Costo</label>
							<div class="row">
								<div class="col-xs-offset-3 col-xs-6 align-center">
									<img id="add-costo" src="img/add.png" class="img-responsive">
								</div>
							</div>
							<hr>
							<label for="public_img">Publicar:</label>
							<input type="checkbox" id="public_img" name="public_img">
							<hr>
							<div class="row">
								<div class="col-xs-6">
									<span id="numberlike">0 </span><span class="glyphicon glyphicon-thumbs-up"></span>
								</div>
								<div class="col-xs-6">
									<span id="numberdislike">0 </span><span class="glyphicon glyphicon-thumbs-down"></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-offset-1 col-xs-offset-0 col-xs-12 col-md-10">
					<table id="table-cost" class="table" style="display:none;">
						<thead>
							<tr>
								<th>
									Costo
								</th>
								<th>
									Tamaño
								</th>
								<th>
									Soporte
								</th>
								<th>
									Opciones
								</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">
				 <button type="submit" class="btn elim">Aceptar</button>
				 <button type="button" class="btn elim" data-dismiss="modal">Cerrar</button>
			</div>
		</form>
	</div>
</div>
<div class="row flotante" data-toggle="modal" data-target="#myModal">
	<div class="col-xs-2" style="position: relative;">
		<img src="img/add.png" class="img-responsive" style="position: relative;">
	</div>
</div>
</body>
</html>
