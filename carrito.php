<?php
  include_once("config.php");
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
      <div class="col-xs-12 baul">
        <table id="carrito" class="table table-hover table-condesed">
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
        <div class="col-xs-offset-1 col-xs-2 col-md-offset-0 col-md-4 comprar text-center">
          <h4>Total de Impresiones: <span id="timp">0</span></h4>
        </div>
        <div class="col-xs-3 col-md-4  comprar">
          <h4>Pago Total: <span id="tpago">0</span></h4>
        </div>
        <div class="col-xs-3 col-md-4  comprar">
          <button type="button" name="button" id="btnCompra" disabled="true" class="btn reaCompra" data-toggle="modal" data-target="#myModal">Realizar Compra</button>
        </div>
      </div>

    </div>
    <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <input type="hidden" id="id_modal" name="id_modal" value="0">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Realizar compra</h4>
            </div>
            <div class="row">
                <div class="col-xs-offset-1 col-xs-10">
                  <div>
                      <label for="comentario">Comentarios</label>
                      <textarea id="comentario" name="comentario" style="width:100%"></textarea>
                  </div>
                  <br>
                </div>
            </div>
            <div class="modal-footer">
             <button type="button" class="btn btn-primary" id="save-modal">Aceptar</button>
             <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
         </div>
     </div>
 </div>
</div>
  <script src="js/carrito.js"></script>
  </body>
</html>
