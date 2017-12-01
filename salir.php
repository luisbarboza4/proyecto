<?php
$index = true;
include_once("config.php");
if(!isset($_SESSION)){
    session_start();
}
$place = (isset($user) && $user['type']=='Admin') ? "admin.php" : "index.php";
unset($_SESSION['username']);
unset($_SESSION['password']);
session_destroy();

redirect($place);