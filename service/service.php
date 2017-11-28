<?php
require 'flight/Flight.php';
//@api debe ser llamado al principio de la ruta si no explota porque el htaccess explota

/////////rutas de sesión

//inicio de sesión
Flight::route('/@api/session/@pepe', function($api,$pepe){
    echo "hello $pepe";
});

Flight::start();
?>
