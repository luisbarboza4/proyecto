<?php 
  $index = true;
  include_once("../config.php");
  switch ($_GET['type']) {
    case "get":
        if($_GET["pag"]=="size"){
            $result = $db->fetch_all("SELECT * FROM size");
        }else{
            $result = $db->fetch_all("SELECT * FROM soporte");
        }
        die(json_encode($result));
    case "post":
        if($_GET["pag"]=="size"){
            $db->insert("INSERT INTO size SET size=:name,resolucion=:resolucion",array(":name"=>$_POST["name"],":resolucion"=>$_POST["size"]));
        }else{
            $db->insert("INSERT INTO soporte SET name=:name",array(":name"=>$_POST["name"]));
        }
        break;
    case "del":
        if($_GET["pag"]=="size"){
            $db->delete("DELETE FROM tamaño WHERE id=:id",array(":id"=>$_POST["id"]));
        }else{
            $db->delete("DELETE FROM soporte WHERE id=:id",array(":id"=>$_POST["id"]));
        }
        break;
    }
?>