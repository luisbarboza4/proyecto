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
            $db->insert("INSERT INTO size SET name=:name,resolucion=:resolucion",array(":name"=>$_POST["name"],":resolucion"=>$_POST['size']));
        }else{
            $db->insert("INSERT INTO soporte SET name=:name",array(":name"=>$_POST["name"]));
        }
        break;
    case "update":
        if($_GET["pag"]=="size"){
            $db->update("UPDATE size SET name=:name,resolucion=:resolucion WHERE id=:id",array(":name"=>$_POST["name"],":resolucion"=>$_POST["size"],":id"=>$_POST["id"]));
        }else{
            $db->update("UPDATE soporte SET name=:name WHERE id=:id",array(":name"=>$_POST["name"],":id"=>$_POST["id"]));
        }
        break;
    case "del":
        if($_GET["pag"]=="size"){
            $db->delete("DELETE FROM size WHERE id=:id",array(":id"=>$_POST["id"]));
            $db->delete("DELETE FROM img_sop_size WHERE id_size=:id",array(":id"=>$_POST["id"]));
        }else{
            $db->delete("DELETE FROM soporte WHERE id=:id",array(":id"=>$_POST["id"]));
            $db->delete("DELETE FROM img_sop_size WHERE id_soporte=:id",array(":id"=>$_POST["id"]));
        }
        break;
    }
?>