<?php
$index = true;
include_once("../config.php");
require 'flight/Flight.php';

Flight::map('notFound', function(){
    echo(responseError("Parametros o método inválido.",404));
});


//@api debe ser llamado al principio de la ruta si no explota porque el htaccess explota y todo explota
//putas de sesión
//inicio de sesión
Flight::route('POST /@api/session/login', function() {
	global $db;
	$username = Flight::request()->data->username;
	$password = md5(Flight::request()->data->password);
	$username = $username;
	//$results = $mysqli->query("SELECT * FROM user WHERE username='$username' AND password='$password'");
	if ($db->fetch_item("SELECT * FROM user WHERE username=:username AND password=:pass",array(':username'=>$username,':pass'=>$password))){
    responseOk("Bienvenido!");
	}else{
	responseError("Credenciales no válidas.","001");
	}
});

//service de carritos en el backend
//get
Flight::route('GET /@api/backend/carrito/items', function() {
	global $db;
        $carrito = $db->fetch_all("SELECT DATE_FORMAT(c.fecha,'%d/%m/%Y') AS fecha,u.nombre,u.apellido,c.id,c.active FROM carrito c INNER JOIN user u ON u.id=c.id_user WHERE c.active!=2");
        foreach ($carrito as $key => $value) {
            $carrito[$key]["items"] = $db->fetch_all("SELECT i.name as imagen,CONCAT(s.name,' ',s.resolucion) as size,sop.name as soporte, ac.cantidad,i.ruta FROM imagenes i INNER JOIN img_sop_size iss ON i.id=iss.id_imagen INNER JOIN soporte sop ON sop.id=iss.id_soporte INNER JOIN size s ON s.id=iss.id_size INNER JOIN articulos_carrito ac ON ac.id_img_tam=iss.id");
        }
        responseOk($carrito);
});

//update
Flight::route('POST /@api/backend/carrito/items', function() {
		global $db;
		$id = Flight::request()->data->id;
		$status = Flight::request()->data->status;
        if($db->update("UPDATE carrito SET active=:active WHERE id=:id",array(":active"=>$status,":id"=>$id))){
        	responseOk("");
        }else{
        	responseError("Error en query","");
        }
});

//config del backend

Flight::route('GET /@api/backend/config', function() {
	global $db;
	$config = $db->fetch_all("SELECT * FROM config",false,"name");
	if ($config){
	responseOk($config);
	}else{
	responseError("Error en consulta!","002");
	}
});

Flight::route('POST /@api/backend/config', function() {
	foreach (Flight::request()->data as $key => $value) {
		$db->insert("INSERT INTO config SET name=:name,value=:value ON DUPLICATE KEY UPDATE value=:value",array(":name"=>$key,":value"=>$value));
	}
	if(isset($_FILES) && $_FILES['image_user']['tmp_name']){
		move_uploaded_file($_FILES['image_user']['tmp_name'], "../img/profile/image_user") or die($_FILES["image_user"]["error"]);
		$db->insert("INSERT INTO config SET name=:name,value=:value ON DUPLICATE KEY UPDATE value=:value",array(":name"=>"image_user",":value"=>"img/profile/image_user"));
	}
	if ($config){
	responseOk($config);
	}else{
	responseError("Error en consulta!","002");
	}
});

////rutas de imagenes
//obtener todas las imagenes (sólo datos de la tabla)
Flight::route('GET /@api/images/', function() {
	global $db;
	$images = $db->fetch_all("SELECT * FROM imagenes");
	if ($images){
	responseOk($images);
	}else{
	responseError("Error en consulta!","002");
	}
});

Flight::start();
?>
