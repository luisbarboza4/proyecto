<?php 
	include_once("config.php");
?>
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
    <title>Configuracion <?php echo $_GET['type']=='size' ? "- Tamaño" : "- Soporte"; ?></title>
</head>
<body>
    <?php 
    include_once("navbar.php");
    if(isset($_SESSION['active'])){
        header('Location: index.php');
    }else{
        ?>
        <input type="hidden" name="type" value="<?php echo $_GET['type'] ?>">
        <div class="row">
        <div class="col-xs-offset-2 col-xs-8">
                <div class="form-horizontal">
                    <div class="panel panel-default">
                        <div class="panel-heading"><center><strong><?php echo $_GET['type']=='size' ? "Tamaño" : "Soporte"; ?></strong></center></div>
                        <input type="hidden" id="pag" value="<?php echo $_GET['type'];?>">
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-xs-3 text-right">
                                    <label for="buscar" class="control-label">Buscar:</label>
                                </div>
                                <div class="col-xs-8">
                                    <input  type="text" maxlength="30" name="buscar" id="buscar" class="form-control" placeholder="busqueda por nombre"/>
                                </div>
                          </div>
                          <br>
                          <div class="form-group" style="text-align: center;">
                            <div id="lista">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>
                                            <?php echo $_GET['type']=='size' ? "Tamaño" : "Soporte"; ?>
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
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <?php 
  }
  include("footer.php");
  ?>
  <div class="row flotante" data-toggle="modal" data-target="#myModal">
    <div class="col-xs-2" style="position: relative;">
        <img src="img/add.png" class="img-responsive" style="position: relative;">
    </div>
</div>
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <input type="hidden" id="id_modal" name="id_modal" value="0">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo $_GET['type']=='size' ? "Tamaño" : "Soporte";  ?></h4>
            </div>
            <div class="row">
                <div class="col-xs-offset-2 col-xs-8">
                    <label for="name_modal">Nombre:</label>
                    <input type="text" id="name_modal" name="name_modal" class="form-control input-xs">
                    <?php 
                        if($_GET['type']=='size'){
                    ?>
                    <hr>
                    <label for="size_modal">Resolucion:</label>
                    <input type="text" id="size_modal" name="size_modal" class="form-control input-xs">
                    <?php 
                        }
                    ?>
                    <br>
                </div>
            </div>
            <div class="modal-footer">
             <button type="button" class="btn btn-remove" id="save-modal">Aceptar</button>
             <button type="button" class="btn btn-remove" data-dismiss="modal">Cerrar</button>
         </div>
     </div>
 </div>
</div>
<script type="text/javascript" src="js/configuration.js"></script>
</body>
</html>