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
  	<script src="js/loading.js"></script>
  	<meta charset="utf-8">
  	<title>TSUKUYOMI STORE | RESTABLECER CONTRASEÑA</title>
  </head>
  <body class="catalogo">

    <div class="row">
        <div id="menu-carrito" class="col-sm-12 text-center">
          <a href="catalogo.php"><h4> <span class="glyphicon glyphicon-chevron-left"></span> volver al catalogo</h4></a>
        </div>
    </div>

    <div class="row">
      <div id="reg-form" class="col-sm-12 text-center">
        
        <form class="login" action="catalogo.php" method="post">

          <!-- Despues de verificar que el email y el usuario existen.

          <label for="pass"> Contraseña </label>
          <br>
          <input type="password" name="pass" value="" placeholder="contraseña">
          <br>
          <label for="pass"> Repita la Contraseña </label>
          <br>
          <input type="password" name="pass" value="" placeholder="repita la contraseña">
          <br><br>
          <button type="button" name="button" class="btn elim">Restaurar Contraseña</button>

          -->

        </form>
      </div>
    </div>
    
    <div class="container-fluid">
      <div class="row">
        
        <div class="col-xs-12 col-xs-offset-0 col-sm-8 col-sm-offset-2 col-md-12 col-md-offset-0 text-center">
          <h4 class="logh">Cambiar contrase&ntilde;a</h4>
        </div>
        <div id="reg-form" class="col-xs-12 col-xs-offset-0 col-sm-6 col-sm-offset-3 col-md-2 col-md-offset-5 text-center">
          
          <br>
          <form class="editar" id="cambiar" action="" method="post">
            
            <div class="form-group">
              <label for="e_password"> Contrase&ntilde;a Actual</label>
              <input id="e_password" class="form-control input-sm" type="password" name="pass" value="" placeholder="contraseña actual" required>
            </div>
            <br>
            <div class="form-group">
              <label for="ed_password"> Nueva Contrase&ntilde;a </label>
              <input id="ed_password" class="form-control input-sm" type="password" name="pass" value="" placeholder="nueva contraseña" required>
            </div>
            
             <div class="form-group">
              <label for="ed_password"> Repita la nueva Contrase&ntilde;a </label>
              <input id="ed_password" class="form-control input-sm" type="password" name="pass" value="" placeholder=" repetir contraseña" required>
            </div>
            
            <br>
            <button type="submit" name="button" class="btn elim">Cambiar</button>
          </form>
        </div>
      </div>
    </div>


  </body>
  
  <script type="text/javascript" src="js/recuperar.js"></script>
</html>
