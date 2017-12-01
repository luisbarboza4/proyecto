<?php 
  $index = true;
  include_once("../config.php");
  switch ($_GET['type']) {
    case "get":
        $result = $db->fetch_all("SELECT * FROM imagenes");
        foreach($result as $key=>$value){
            $result[$key]['costo'] = $db->fetch_all("SELECT * FROM img_sop_size WHERE id_imagen=:imagen",array(":imagen"=>$value['id']));
            $result[$key]['likes'] = $db->fetch_one_col("SELECT count(*) FROM votos WHERE voto=:voto",array(":voto"=>"GOOD"));
            $result[$key]['dislikes'] = $db->fetch_one_col("SELECT count(*) FROM votos WHERE voto=:voto",array(":voto"=>"BAD"));
        }
        die(json_encode($result));
    case "post":
        if(isset($_FILES) && $_FILES['image_user']['tmp_name']){
            do{
                $imageId = uniqid();
            }while(file_exists("../upload/{$imageId}"));
            move_uploaded_file($_FILES['image_user']['tmp_name'], "../upload/{$imageId}") or die ($_FILES["image_user"]["error"]);
            $id = $db->insert("INSERT INTO imagenes SET ruta=:ruta, name=:name, mostrar=:mostrar",array(":ruta"=>"upload/{$imageId}",":name"=>$_POST['name_img'],":mostrar"=>($_POST['public_img']?1:0)));
        } else {
            $id = $db->insert("INSERT INTO imagenes SET name=:name, mostrar=:mostrar",array(":name"=>$_POST['name_img'],":mostrar"=>($_POST['public_img']?1:0)));
        }
        foreach($_POST['costo'] as $i=>$val){
            $db->insert("INSERT INTO img_sop_size SET id_imagen=:idimg, id_size=:idsize, id_soporte=:idsop, costo=:costo ON DUPLICATE KEY UPDATE costo=:costo", array(":idimg"=>$id,":idsize"=>$_POST['size_img'][$i],":idsop"=>$_POST['type_img'][$i],":costo"=>$_POST['costo'][$i]));
        }
        break;
    case "update":
        if(isset($_FILES) && $_FILES['image_user']['tmp_name']){
            $ruta = $db->fetch_one_col("SELECT ruta FROM imagenes WHERE id=:id",array(":id"=>$_POST["id_imagen"]));
            do{
                $imageId = uniqid();
            }while(file_exists("../upload/{$imageId}"));
            move_uploaded_file($_FILES['image_user']['tmp_name'], "../upload/{$imageId}") or die($_FILES["image_user"]["error"]);
            unlink("../".$ruta);
            $db->update("UPDATE imagenes SET ruta=:ruta, name=:name, mostrar=:mostrar WHERE id=:id",array(":ruta"=>"upload/{$imageId}",":name"=>$_POST['name_img'],":mostrar"=>($_POST['public_img']?1:0),":id"=>$_POST["id_imagen"]));
        } else {
            $db->update("UPDATE imagenes SET name=:name, mostrar=:mostrar WHERE id=:id",array(":name"=>$_POST['name_img'],":mostrar"=>($_POST['public_img']?1:0),":id"=>$_POST["id_imagen"]));
        }
        /* $array = $db->fetch_all("SELECT id FROM img_sop_size WHERE id NOT IN (".implode(",", $_POST["id_costo"]).")");
        error_log("ErrorGG: SELECT id FROM img_sop_size WHERE id NOT IN (".implode(",", $_POST["id_costo"]).")");
        error_log("ErrorGG: (".print_r($array,true)); */
        
        $db->delete("DELETE FROM img_sop_size WHERE id NOT IN (".implode(",", $_POST["id_costo"]).") AND id_image=:idimg", array(":idimg"=>$_POST["id_imagen"]));
        foreach($_POST['costo'] as $i=>$val){
            if($_POST["id_costo"][$i] > 0){
                //die("UPDATE img_sop_size SET id_size={$_POST['size_img'][$i]}, id_soporte={$_POST['type_img'][$i]}, costo={$_POST['costo'][$i]}  WHERE id=:id");
               $db->update("UPDATE img_sop_size SET id_size=:idsize, id_soporte=:idsop, costo=:costo  WHERE id=:id", array(":idsize"=>$_POST['size_img'][$i],":idsop"=>$_POST['type_img'][$i],":costo"=>$_POST['costo'][$i],":id"=>$_POST["id_costo"][$i])); 
            }else{
                
               $db->insert("INSERT INTO img_sop_size SET id_imagen=:idimg, id_size=:idsize, id_soporte=:idsop, costo=:costo ON DUPLICATE KEY UPDATE costo=:costo", array(":idimg"=>$_POST["id_imagen"],":idsize"=>$_POST['size_img'][$i],":idsop"=>$_POST['type_img'][$i],":costo"=>$_POST['costo'][$i]));
            }
        }
        break;
    case "del":
        $ruta = $db->fetch_one_col("SELECT ruta FROM imagenes WHERE id=:id",array(":id"=>$_POST["id"]));
        $db->delete("DELETE FROM imagenes WHERE id=:id",array(":id"=>$_POST["id"]));
        $db->delete("DELETE FROM img_sop_size WHERE id_imagen=:id",array(":id"=>$_POST["id"]));
        unlink("../".$ruta);
        break;
    }
?>