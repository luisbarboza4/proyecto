<?php
if(!isset($_SESSION)){
    session_start();
}

$errormsg = "";
$successmsg = "";

if(isset($_SESSION['msge'])){
    $errormsg = $_SESSION['msge'];
    unset($_SESSION['msge']);
}

if(isset($_SESSION['msgs'])){
    $successmsg = $_SESSION['msgs'];
    unset($_SESSION['msgs']);
}

function successMessage($msg){
    $_SESSION['msgs'] = $msg;
}

function errorMessage($msg){
    $_SESSION['msge'] = $msg;
}

function showMessage($msg,$type = "success"){
    
    switch ($type) {
        case 'success':
            $typemsg = "alert-success";
            break;
        case 'error':
            $typemsg = "alert-danger";
            break;
    }
    echo "<div class='alert {$typemsg}'> {$msg}</div>";    
    
}
