<?php
$links = array();
$links[] = array("title"=>"Carrito","link"=>"carrito.php","loggin"=>true,"grand"=>false);
$links[] = array("title"=>"Ver Carritos","link"=>"viewcars.php","loggin"=>true,"grand"=>false);
$links[] = array("title"=>"Panel Administrador","link"=>"admin.php","loggin"=>true,"grand"=>true);
$links[] = array("title"=>"Login","link"=>"#","loggin"=>false,"grand"=>false,"extra"=>'data-target="#logModal"');
$links[] = array("title"=>"Registro","link"=>"registro.php","loggin"=>false,"grand"=>false);
$links[] = array("title"=>"Perfil","link"=>"perfil.php","loggin"=>true,"grand"=>false);
//$links[] = array("title"=>"Contacto","link"=>"contacto.php");
$links[] = array("title"=>"Cerrar Sesi&oacute;n","link"=>"salir.php","loggin"=>true,"grand"=>false);

foreach ($links as $link) {
    if($link['loggin'] === true && isset($user)){
        if($link['grand'] === true && $user['type']=="Admin"){
            echo "<a href='{$link['link']}' {$link['extra']} ><h4>{$link['title']}</h4></a>";
        }else if($link['grand'] === false){
            echo "<a href='{$link['link']}' {$link['extra']} ><h4>{$link['title']}</h4></a>";
        }
    }else if ($link['loggin'] === false && !isset($user)){
        echo "<a href='{$link['link']}' {$link['extra']} ><h4>{$link['title']}</h4></a>";
    }else if(!isset($link['loggin'])){
        echo "<a href='{$link['link']}' {$link['extra']} ><h4>{$link['title']}</h4></a>";
    }
    
}
