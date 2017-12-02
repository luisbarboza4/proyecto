<?php
  include_once("config.php");
 ?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
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
                <a href="catalogo.php">
                    <h4> <span class="glyphicon glyphicon-chevron-left"></span> volver al catalogo</h4>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 baul">
                <div class="container"></div>
                <div class="row">
                    <div class="col-xs-offset-0 col-xs-12 col-sm-12 col-md-offset-1 col-md-10">
                        <div class="form-horizontal">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <center><strong>Pedidos</center></div>
                        <input type="hidden" id="pag" value="<?php echo @$_GET['type'];?>">
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-1">
                                    <label for="status_select" class="control-label">Status:</label>
                                </div>
                                <div class="col-xs-12 col-sm-5 col-md-3">
                                    <select id="status_select" class="form-control input-xs supp">
                                        <option value="">Todos</option>
                                        <option value="Pendiente">Pendiente</option>
                                        <option value="Listo">Listo</option>
                                        <option value="Cancelado">Cancelado</option>
                                        <option value="Aceptado">Aceptado</option>
                                    </select>
                                </div>
                          </div>
                          <br>
                          <div class="form-group" style="text-align: center;">
                            <div id="lista">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>
                                            Fecha
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Total
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
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
                <h4 class="modal-title">Pedido</h4>
            </div>
            <div class="row">
                <div class="col-xs-offset-1 col-xs-10">
                    <div id="lista-art">
                        <label for="name_modal">Status: <span id="status"></span></label>
                        <table id="artc" class="table">
                            <thead>
                                <tr>
                                    <th>
                                        Imagen
                                    </th>
                                    <th>
                                        Tamaño
                                    </th>
                                    <th>
                                        Soporte
                                    </th>
                                    <th>
                                        Cantidad
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <table id="message" class="table" style="margin-bottom:0px">
                            <thead>
                                <th style="text-align: center;">Comentarios
                                </th>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
             <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
         </div>
     </div>
 </div>
</div>
  <script src="js/viewcars.js"></script>
  </body>
</html>
