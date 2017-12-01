<?php
  include_once("modals.php");
 ?>

<!DOCTYPE html>
<html>
  <head>
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
  	<title>TSUKUYOMI STORE | CARRITO</title>
  </head>
  <body class="catalogo">

    <div class="row">

      <div id="menu-carrito" class="col-sm-12 text-center">
          <a href="catalogo.php"><h4> <span class="glyphicon glyphicon-chevron-left"></span> volver al catalogo</h4></a>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12 baul">

        <table id="carrito" class="table table-hover">
          <thead>
            <tr>
              <td>ilustraci&oacuten</td>
              <td>cantidad</td>
              <td>tama&ntilde;o</td>
              <td>soporte</td>
              <td>total</td>
              <td> </td>
            </tr>
          </thead>
          <tbody>
            
          </tbody>
        </table>
      </div>

      <div class="row">
        <div class="col-sm-4 comprar text-center">
          <h4>Total de Impresiones: <span id="timp">0</span></h4>
        </div>
        <div class="col-sm-4 comprar">
          <h4>Pago Total: <span id="tpago">0</span></h4>
        </div>
        <div class="col-sm-4 comprar">
          <button type="button" name="button" id="btnCompra" disabled="true" class="btn reaCompra">Realizar Compra</button>
        </div>
      </div>

    </div>
  <script src="js/carrito.js"></script>
  </body>
</html>
