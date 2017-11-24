<?php 
  $index = true;
  include_once("../config.php");
  switch ($_GET['type']) {
    case "get":
        $config = $db->fetch_all("SELECT * FROM config",false,"name");
        die(json_encode($config));
    case "post":
        foreach ($_POST as $key => $value) {
            $db->insert("INSERT INTO config SET name=:name,value=:value ON DUPLICATE KEY UPDATE value=:value",array(":name"=>$key,":value"=>$value));
        }
        if(isset($_FILES) && $_FILES['image_user']['tmp_name']){
            move_uploaded_file($_FILES['image_user']['tmp_name'], "../img/profile/image_user") or die($_FILES["image_user"]["error"]);
            $db->insert("INSERT INTO config SET name=:name,value=:value ON DUPLICATE KEY UPDATE value=:value",array(":name"=>"image_user",":value"=>"img/profile/image_user"));
        }
    }
?>