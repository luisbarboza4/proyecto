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
  	<title>TSUKUYOMI STORE | REGISTRO</title>
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
          <h4 class="logh">Registro</h4>
          <br>
          <form class="login" id="registro" action="catalogo.php" method="post">
            
            <div class="form-group">
              <label for="r_nombre"> Nombre </label>
              <input id="r_nombre" class="form-control input-sm" type="text" name="nombre" value="" placeholder="Nombre" required>
            </div>
            
            <div class="form-group">
              <label for="r_apellido"> Apellido </label>
              <input id="r_apellido" class="form-control input-sm" type="text" name="apellido" value="" placeholder="Apellido" required>
            </div>
            
            <div class="form-group">
              <label for="r_email"> E-mail </label>
              <input id="r_email" class="form-control input-sm" type="email" name="email" value="" placeholder="ejemplo@ejemplo.com" required>
            </div>
            
            <div class="form-group">
              <label for="r_usuario"> Usuario </label>
              <input id="r_usuario" class="form-control input-sm" type="text" name="username" value="" placeholder="usuario" required>
            </div>
            
            <div class="form-group">
              <label for="r_password"> Contraseña </label>
              <input id="r_password" class="form-control input-sm" type="password" name="pass" value="" placeholder="contraseña" required>
            </div>
            
            <div class="form-group">
              <label for="r_passrepeat"> Confirmar contraseña </label>
              <input id="r_passrepeat" class="form-control input-sm" type="password" name="passrepit" value="" placeholder="confirme la contraseña" required>
            </div>
            
            <br>
            <button type="submit" name="button" class="btn elim">Registrarse</button>
          </form>
        </div>
      </div>
    </div>

  </body>
</html>
