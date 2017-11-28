<?php 
  $index = true;
  include_once("../config.php");
  switch (@$_GET['type']) {
    case "get":
        $carrito = $db->fetch_all("SELECT DATE_FORMAT(c.fecha,'%d/%m/%Y') AS fecha,u.nombre,u.apellido,c.id,c.active FROM carrito c INNER JOIN user u ON u.id=c.id_user WHERE c.active!=2");
        foreach ($carrito as $key => $value) {
            $carrito[$key]["items"] = $db->fetch_all("SELECT i.name as imagen,CONCAT(s.name,' ',s.resolucion) as size,sop.name as soporte, ac.cantidad,i.ruta FROM imagenes i INNER JOIN img_sop_size iss ON i.id=iss.id_imagen INNER JOIN soporte sop ON sop.id=iss.id_soporte INNER JOIN size s ON s.id=iss.id_size INNER JOIN articulos_carrito ac ON ac.id_img_tam=iss.id");
        }
        die(json_encode($carrito));
    case "update":
        $db->update("UPDATE carrito SET active=:active WHERE id=:id",array(":active"=>$_POST['status'],":id"=>$_POST['id']));
        break;
    }
?>