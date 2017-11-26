<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
  	<link rel="stylesheet" type="text/css" href="js/jquery-ui-1.12.1/jquery-ui.min.css">
  	<link rel="stylesheet" type="text/css" href="css/loading.css">
  	<link rel="stylesheet" type="text/css" href="css/styles.css">
  	<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
  	<link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Saira+Semi+Condensed" rel="stylesheet">
  	<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
  	<script type="text/javascript" src="js/jquery-ui-1.12.1/jquery-ui.min.js"></script>
  	<script type="text/javascript" src="js/bootstrap.js"></script>
  	<script type="text/javascript" src="js/sweetalert.js"></script>
  	<script src="js/loading.js"></script>
  	<meta charset="utf-8">
  	<title>TSUKUYOMI STORE | CATALOGO</title>
  </head>
  <body class="catalogo">

    <div class="row">
        <div id="menu-carrito" class="col-sm-12 text-center">
          <a href="catalogo.php"><h4> <span class="glyphicon glyphicon-chevron-left"></span> volver al catalogo</h4></a>
        </div>
    </div>

    <div class="row">
      <div id="menu-carrito" class="col-sm-12 text-center">
        <h4 class="logh">Registro</h4>
        <br>
        <form class="login" action="catalogo.php" method="post">
          <label for="username"> Nombre </label>
          <br>
          <input type="text" name="nombre" value="" placeholder="Nombre">
          <br>
          <label for="username"> Apellido </label>
          <br>
          <input type="text" name="apellido" value="" placeholder="Apellido">
          <br>
          <label for="username"> E-mail </label>
          <br>
          <input type="email" name="email" value="" placeholder="ejemplo@ejemplo.com">
          <br>
          <label for="username"> Usuario </label>
          <br>
          <input type="text" name="username" value="" placeholder="usuario">
          <br>
          <label for="pass"> Contraseña </label>
          <br>
          <input type="password" name="pass" value="" placeholder="contraseña">
          <br>
          <label for="pass"> Repita la Contraseña </label>
          <br>
          <input type="password" name="pass" value="" placeholder="repita la contraseña">
          <br><br>
          <button type="button" name="button" class="btn elim">Registrarse</button>
        </form>
      </div>
    </div>


  </body>
</html>
