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
    <link href="https://fonts.googleapis.com/css?family=Saira+Semi+Condensed" rel="stylesheet">
  	<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
  	<script type="text/javascript" src="js/jquery-ui-1.12.1/jquery-ui.min.js"></script>
  	<script type="text/javascript" src="js/bootstrap.js"></script>
  	<script type="text/javascript" src="js/sweetalert.js"></script>
  	<script type="text/javascript" src="js/registro.js"></script>
  	<script src="js/loading.js"></script>
  	<meta charset="utf-8">
  	<title>TSUKUYOMI STORE | PERFIL</title>
  </head>
  <body class="catalogo">

    <div class="row">
        <div id="menu-carrito" class="col-sm-12 text-center">
          <a href="catalogo.php"><h4> <span class="glyphicon glyphicon-chevron-left"></span> volver al catalogo</h4></a>
        </div>
    </div>
    
    <div class="container-fluid">
      <div class="row">
        <div id="reg-form" class="col-xs-12 col-xs-offset-0 col-sm-6 col-sm-offset-3 col-md-2 col-md-offset-5 text-center">
          <h4 class="logh">Actualizar Información</h4>
          <br>
          <form class="editar" id="edit" action="catalogo.php" method="post">
            
            <div class="form-group">
              <label for="e_nombre"> Nombre </label>
              <input id="e_nombre" class="form-control input-sm" type="text" name="nombre" value="" placeholder="Nombre" required>
            </div>
            
            <div class="form-group">
              <label for="e_apellido"> Apellido </label>
              <input id="e_apellido" class="form-control input-sm" type="text" name="apellido" value="" placeholder="Apellido" required>
            </div>
            
            <div class="form-group">
              <label for="e_email"> E-mail </label>
              <input id="e_email" class="form-control input-sm" type="email" name="email" value="" placeholder="ejemplo@ejemplo.com" required>
            </div>
            
            <div class="form-group">
              <label for="e_usuario"> Usuario </label>
              <input id="e_usuario" class="form-control input-sm" type="text" name="username" value="" placeholder="usuario" required>
            </div>
            
            <div class="form-group">
              <label for="e_password"> Contrase&ntilde;a </label>
              <input id="e_password" class="form-control input-sm" type="password" name="pass" value="" placeholder="contraseña" disabled>
            </div>
            
            <a href="cambiar.php" target="_blank" class="change">Cambiar Contrase&ntilde;a</a>
            <br><br><br>
            <button type="submit" name="button" class="btn elim">Actualizar</button>
          </form>
        </div>
      </div>
    </div>

  </body>
</html>
