<?php
$index = true;
include_once("../config.php");
require 'flight/Flight.php';

Flight::map('notFound', function(){
    echo(responseError("Parametros o método inválido.",404));
});

//rutas de sesión
//inicio de sesión
Flight::route('POST /@api/session/login', function() {
	global $db;
	$username = Flight::request()->data->username;
	$password = md5(Flight::request()->data->password);
	if ($db->fetch_item("SELECT * FROM user WHERE username=:username AND password=:pass",array(':username'=>$username,':pass'=>$password))){
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
    	responseOk("Bienvenido!");
	}else{
		responseError("Credenciales no válidas.","001");
	}
});

Flight::route('POST /@api/session/login/recover', function() {
	global $db;
	$email = Flight::request()->data->email;
	if($db->fetch_item("SELECT id FROM user WHERE email=:email",array(':email'=>$email))){
		responseOk("Correo enviado!.","002");
	}
	else{
		responseError("Correo inválido.","004");
	}
});

//Cambiar contraseña
Flight::route('POST /@api/session/changepass', function() {
	global $db;
	$username = Flight::request()->data->username;
	$newpass = md5(Flight::request()->data->newpassword);
	$pass = md5(Flight::request()->data->currentpassword);
	
	if($db->fetch_item("SELECT id FROM user WHERE username=:username",array(':username'=>$username))){
		
		if($db->fetch_item("SELECT id FROM user WHERE username=:username AND password=:password",array(':username'=>$username, ':password'=>$pass))){
			
			if($db->update("UPDATE user SET password=:password WHERE username=:username",array(':password'=>$newpass, ':username'=>$username))){
				responseOk("Contraseña actualizada con exito.","002");
			} else {
				responseError("Error en consulta!","002");
			}
			
		} else {
			responseError("Contraseña actual inválida.","004");
		}
	
	} else {
		responseError("No existe un usuario logueado actualmente.","004");
	}
	
	
});

//registro (not finished)
Flight::route('POST /@api/session/register', function() {
	global $db;
	$nombre = Flight::request()->data->nombre;
	$password = md5(Flight::request()->data->pass);
	$apellido = Flight::request()->data->apellido;
	$email = Flight::request()->data->email;
	$username = Flight::request()->data->username;
	if($db->fetch_item("SELECT id FROM user WHERE username=:username OR email=:email",array(':username'=>$username, ':email'=>$email))){
		responseError("Usuario y/o email existente.","002");
	}
	if ($db->insert("INSERT INTO user VALUES(null,:username,:nombre,:apellido,:email,:password,'User')",array(':username'=>$username,':password'=>$password, ':email'=>$email, ':nombre'=>$nombre, ':apellido'=> $apellido))){
    	responseOk("Registrado!");
	}else{
		responseError("Credenciales no válidas.","001");
	}
});

//service de carritos en el backend
//get
Flight::route('GET /@api/backend/carrito/items', function() {
	global $db;
        $carrito = $db->fetch_all("SELECT DATE_FORMAT(c.fecha,'%d/%m/%Y') AS fecha,u.nombre,u.apellido,u.email,c.id,c.active FROM carrito c INNER JOIN user u ON u.id=c.id_user WHERE c.active!=2");
        foreach ($carrito as $key => $value) {
            $carrito[$key]["items"] = $db->fetch_all("SELECT i.name as imagen,CONCAT(s.name,' ',s.resolucion) as size,sop.name as soporte, ac.cantidad,i.ruta,iss.costo FROM imagenes i INNER JOIN img_sop_size iss ON i.id=iss.id_imagen INNER JOIN soporte sop ON sop.id=iss.id_soporte INNER JOIN size s ON s.id=iss.id_size INNER JOIN articulos_carrito ac ON ac.id_img_sop=iss.id WHERE ac.id_carrito=:id",array(':id' =>$value['id']));
            $carrito[$key]["total"] = $db->fetch_one_col("SELECT SUM(ac.costo) FROM img_sop_size iss INNER JOIN articulos_carrito ac ON ac.id_img_sop=iss.id WHERE ac.id_carrito=:id",array(':id' =>$value['id']));
        	$carrito[$key]["comentarios"] = $db->fetch_all("SELECT m.*,CONCAT(u.nombre,' ',u.apellido) AS name FROM mensaje m INNER JOIN user u ON u.id=m.id_user WHERE m.id_carrito=:id",array(":id"=>$value['id']));
        }
        responseOk($carrito);
});

Flight::route('GET /@api/backend/viewcars', function() {
	global $db;
	global $user;
        $carrito = $db->fetch_all("SELECT DATE_FORMAT(c.fecha,'%d/%m/%Y') AS fecha,u.nombre,u.apellido,c.id,c.active FROM carrito c INNER JOIN user u ON u.id=c.id_user WHERE u.id=:id AND c.active!=2",array(":id"=>$user['id']));
        foreach ($carrito as $key => $value) {
            $carrito[$key]["items"] = $db->fetch_all("SELECT i.name as imagen,CONCAT(s.name,' ',s.resolucion) as size,sop.name as soporte, ac.cantidad,i.ruta,iss.costo FROM imagenes i INNER JOIN img_sop_size iss ON i.id=iss.id_imagen INNER JOIN soporte sop ON sop.id=iss.id_soporte INNER JOIN size s ON s.id=iss.id_size INNER JOIN articulos_carrito ac ON ac.id_img_sop=iss.id WHERE ac.id_carrito=:id",array(':id' =>$value['id']));
            $carrito[$key]["total"] = $db->fetch_one_col("SELECT SUM(ac.costo) FROM img_sop_size iss INNER JOIN articulos_carrito ac ON ac.id_img_sop=iss.id WHERE ac.id_carrito=:id",array(':id' =>$value['id']));
        	$carrito[$key]["comentarios"] = $db->fetch_all("SELECT m.*,CONCAT(u.nombre,' ',u.apellido) AS name FROM mensaje m INNER JOIN user u ON u.id=m.id_user WHERE m.id_carrito=:id",array(":id"=>$value['id']));
        }
        responseOk($carrito);
});

Flight::route('GET /@api/backend/carrito/items_descr', function() {
	global $db;
	global $user;
    $carrito = $db->fetch_all("SELECT c.id as car,ac.id,CONCAT(s.name,' ',s.resolucion) as size,sop.name as support, ac.cantidad as cant,i.ruta as image,iss.costo as price FROM imagenes i INNER JOIN img_sop_size iss ON i.id=iss.id_imagen INNER JOIN soporte sop ON sop.id=iss.id_soporte INNER JOIN size s ON s.id=iss.id_size INNER JOIN articulos_carrito ac ON ac.id_img_sop=iss.id INNER JOIN carrito c ON c.id=ac.id_carrito INNER JOIN user u ON u.id=c.id_user WHERE u.id=:id AND c.active=2",array(':id' =>$user['id']));
    responseOk($carrito);
});

//Datos perfil
Flight::route('POST /@api/session/perfil', function() {
	global $db;
	$username = Flight::request()->data->username;
    $infouser = $db->fetch_item("SELECT * FROM user WHERE username=:username",array(':username' =>$username));
    if($infouser){
    	responseOk($infouser);
    } else {
    	responseError("Error en consulta!","002");
    }
});

//Actualizar datos perfil
Flight::route('POST /@api/session/perfil/editar', function() {
	global $db;
	$username = Flight::request()->data->username;
	$nombre = Flight::request()->data->nombre;
	$apellido = Flight::request()->data->apellido;
	$email = Flight::request()->data->email;
    $update = $db->update("UPDATE user SET nombre=:nombre, apellido=:apellido, email=:email  WHERE username=:username",array(':username' =>$username, ':nombre' =>$nombre, ':apellido' =>$apellido, ':email' =>$email));
    if($update){
    	responseOk("Datos actualizados con exito!");
    } else {
    	responseError("Debe tener una sesión iniciada para efectuar esta operación.","002");
    }
});

//update
Flight::route('POST /@api/backend/carrito/items', function() {
		global $db;
		global $user;
		$id = Flight::request()->data->id;
		$status = Flight::request()->data->status;
		$message = Flight::request()->data->message;
		if($message!=""){
			$db->update("INSERT mensaje SET id_carrito=:id,mensaje=:msj,id_user=:user",array(":msj"=>$message,":id"=>$id,":user"=>$user['id']));
		}
		
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
	global $db;
	foreach (Flight::request()->data as $key => $value) {
		$db->insert("INSERT INTO config SET name=:name,value=:value ON DUPLICATE KEY UPDATE value=:value",array(":name"=>$key,":value"=>$value));
	}
	$files = Flight::request()->files;
	if(isset($files) && $files['image_user']['tmp_name']){
		move_uploaded_file($files['image_user']['tmp_name'], "../img/profile/image_user") or die($files["image_user"]["error"]);
		$db->insert("INSERT INTO config SET name=:name,value=:value ON DUPLICATE KEY UPDATE value=:value",array(":name"=>"image_user",":value"=>"img/profile/image_user"));
	}
});


////rutas de imagenes
//obtener todas las imagenes (sólo datos de la tabla)
Flight::route('GET /@api/images/', function() {
	global $db,$user;
	$images = $db->fetch_all("SELECT * FROM imagenes WHERE mostrar=1");
	foreach($images as $key=>$value){
		$images[$key]['user_select'] = $db->fetch_one_col("SELECT voto FROM votos WHERE id_imagen:id AND id_user=:user",array(":user"=>@$user['id'],":id",$value['id']));
    	$images[$key]['likes'] = $db->fetch_one_col("SELECT count(*) FROM votos WHERE voto=:voto AND id_imagen=:id",array(":voto"=>"GOOD",":id",$value['id']));
    	$images[$key]['dislikes'] = $db->fetch_one_col("SELECT count(*) FROM votos WHERE voto=:voto AND id_imagen=:id",array(":voto"=>"BAD",":id",$value['id']));
    }
	if ($images){
		responseOk($images);
	}else{
		responseError("Error en consulta!","002");
	}
});

//obtener todos los tamanos disponibles de un id
Flight::route('POST /@api/size/', function() {
	global $db;
	$id = Flight::request()->data->id;
	$images = $db->fetch_item("SELECT * FROM size WHERE id = :id GROUP BY name",array(":id"=>$id));
	if ($images){
		responseOk($images);
	}else{
		responseError("Error en consulta!","002");
	}
});

//obtener todos los soportes disponibles de un id
Flight::route('POST /@api/soporte/', function() {
	global $db;
	$id = Flight::request()->data->id;
	$images = $db->fetch_all("SELECT * FROM soporte WHERE id = :id",array(":id"=>$id));
	if ($images){
		responseOk($images);
	}else{
		responseError("Error en consulta!","002");
	}
});

//obtener las relaciones soporte-tamaño-imagen
Flight::route('POST /@api/images/rel/', function() {
	global $db;
	$id = Flight::request()->data->id;
	$images = $db->fetch_all("SELECT * FROM img_sop_size WHERE id_imagen = :id GROUP BY id_size", array(":id"=>$id));
	if ($images){
		responseOk($images);
	}else{
		responseError("Error en consulta!","002");
	}
});

Flight::route('POST /@api/images/rel/getSupport', function() {
	global $db;
	$id = Flight::request()->data->id;
	$id_size = Flight::request()->data->size_id;
	$images = $db->fetch_all("SELECT img.* , supp.name FROM img_sop_size AS img INNER JOIN soporte AS supp ON img.id_soporte = supp.id WHERE img.id_imagen = :id AND img.id_size = :id_size", array(":id"=>$id, ":id_size"=>$id_size));
	if ($images){
		responseOk($images);
	}else{
		responseError("Error en consulta!","002");
	}
});

Flight::route('POST /@api/carrito/agregar', function() {
	global $db;
	global $user;
	$cantidad = Flight::request()->data->cantidad;
	$carritouser = false;
	if($cantidad > 10){
		$cantidad = 10;
	}elseif($cantidad < 1){
		responseError("Cantidad no válida!","004");
	}
	$rel = Flight::request()->data->rel;
	//AY PAPA TE JODISTE SI ME INYECTASTE EL HTML
	$buscarel = $db->fetch_item("SELECT * FROM img_sop_size WHERE id = :rel",array(":rel"=>$rel));
	$costoreal = 0;
	if($buscarel){
		$costoreal = $cantidad * $buscarel["costo"];
	}
	else{
		responseError("No se ubicó la relacion adecuada.","004");
	}
	//luego ubikmos el carrito del COMPADRE
	$carritouser = $db->fetch_item("SELECT * FROM carrito WHERE id_user = :user AND active=2",array(":user"=>$user['id']));
	if($carritouser){
		$carritouser = $carritouser["id"];
	}
	else{
		$createcarro = $db->insert("INSERT INTO carrito VALUES(null,:user,2,null)",array(":user"=>$user['id']));
		$carritouser = $createcarro;
		if(!$createcarro){
			responseError("Error al crear carrito.","004");
		}
	}
	//luego verificamos que el articulo no este repetido
	$carritouser = $db->fetch_item("SELECT * FROM carrito WHERE id_user = :user AND active=2",array(":user"=>$user['id']));
	if($carritouser){
		$carritouser = $carritouser["id"];
	}
	$relexistente = $db->fetch_item("SELECT * FROM articulos_carrito WHERE id_carrito = :carrito AND id_img_sop = :rel", array(':carrito'=>$carritouser,':rel'=>$rel));
	$sumatoria = 0;
	if($relexistente){
		$sumatoria = (int)$relexistente["cantidad"] + (int)$cantidad;
		$error = false;
		if($sumatoria > 10){
			//$sumatoria = 10;
			$error = true;
		}else{
			$costoreal = (int)$buscarel["costo"] + (int)$sumatoria;
			$act = $db->update("UPDATE articulos_carrito SET cantidad = :sumatoria , costo = :costoreal WHERE id_carrito = :carrito",array(':sumatoria'=>$sumatoria,':costoreal'=>$costoreal,':carrito'=>$carritouser));
		}
		if($act !== false && !$error){
			responseOk("Registrado!");
		}else{
			$meesage = $error ? "ERROR!. Valor excede el maximo permitido por compra" : $db->getError() ;
			responseError($meesage ,"001");
		}
	}else{
	$db->insert("INSERT INTO articulos_carrito VALUES(:carrito,:cant,:costo,:rel,null)",array(':carrito'=>$carritouser,':cant'=>$cantidad, ':costo'=>$costoreal, ':rel'=>$rel));
    $error = $db->getError();
    if($error){
    	responseOk("Registrado!");
	}else{
		responseError("Valor excede el maximo posible" ,"001");
	}
	}
});

Flight::route('POST /@api/backend/carrito/delete_item', function() {
		global $db;
		$id = Flight::request()->data->id;
        if($db->delete("DELETE FROM articulos_carrito WHERE id=:id",array(":id"=>$id))){
        	responseOk("");
        }else{
        	responseError("Error en query","");
        }
});

Flight::route('POST /@api/images/voto', function() {
	global $db;
	global $user;
	$id = Flight::request()->data->id;
	$idimg = Flight::request()->data->idimg;
	$voto = Flight::request()->data->voto;
	$insert = $db->insert("INSERT INTO votos VALUES (:idimg, :id, :voto)  ON DUPLICATE KEY UPDATE voto = :voto", array(":id"=>$user['id'], ":idimg"=>$idimg, ":voto"=>$voto));
	if ($insert){
		responseOk("Voto agregado");
	}else{
		responseError("INSERT INTO votos VALUES ({$idimg}, {$user['id']}, {$voto})  ON DUPLICATE KEY UPDATE voto = {$voto}","");
	}
});

Flight::start();
?>
