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
    <script type="text/javascript" src="js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/sweetalert.js"></script>
    <script src="js/loading.js"></script>
    <meta charset="utf-8">
    <title>Configuracion - Pedidos</title>
</head>
<body class="admin">
    <?php
        include_once("navbar.php");
    ?>
        <div class="row">
        <div class="col-md-offset-2 col-md-8 col-xs-12 col-sm-10 col-sm-offset-1">
                <div class="form-horizontal">
                    <div class="panel panel-default">
                        <div class="panel-heading"><center><strong>Pedidos</center></div>
                        <input type="hidden" id="pag" value="<?php echo @$_GET['type'];?>">
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-offset-2 col-md-1 col-xs-offset-0 col-xs-1">
                                    <label for="buscar" class="control-label">Buscar:</label>
                                </div>
                                <div class="col-xs-5">
                                    <input  type="text" maxlength="30" name="buscar" id="buscar" class="form-control" placeholder="busqueda por nombre"/>
                                </div>
                                <div class="col-xs-1">
                                    <label for="status_select" class="control-label">Status:</label>
                                </div>
                                <div class="col-xs-3">
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
                                <table class="table table-condensed">
                                    <thead>
                                    <tr>
                                        <th>
                                            Cliente
                                        </th>
                                        <th>
                                            Email
                                        </th>
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
      <?php
  include("footer.php");
  ?>
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
                        <label for="name_modal">Status:</label>
                        <select class="form-control" id="status">
                            <option value="0">Pendiente</option>
                            <option value="1">Listo</option>
                            <option value="4">Cancelado</option>
                            <option value="3">Aceptado</option>
                        </select>
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
                                    <th>
                                        Ver
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
                        <textarea id="comentario" name="comentario" style="width:100%"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
             <button type="button" class="btn btn-primary" id="save-modal">Aceptar</button>
             <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
         </div>
     </div>
 </div>
</div>
<script type="text/javascript" src="js/pedidos.js"></script>
</body>
</html>
