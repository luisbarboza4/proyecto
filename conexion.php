<?php 
function connectDB(){
    $server = "localhost";
    $user = "cuatro";
    $pass = "";
    $bd = "c9";
    $conexion = mysqli_connect($server, $user, $pass,$bd);
    if(!$conexion){
        ?>
        <script type="text/javascript">
          alert("Ha sucedido un error inexperado en la conexion de la base de datos");
        </script>
        <?php 
        die();
    }
    return $conexion;
}

function disconnectDB($conexion){
    $close = mysqli_close($conexion);
    if(!$close){
        ?>
        <script type="text/javascript">
            alert("Ha sucedido un error inexperado en la desconexion de la base de datos");
        </script>
        <?php 
    }
    return $close;
}
?>