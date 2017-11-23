<?php
if(!isset($_SESSION)){
    session_start();
}
include_once("class.db.php");
include_once("functions.php");

$userdb = "abakus";
$passdb = "abakus";
$hostdb = "localhost";
$namedb = "c9";

$db = new SQL($hostdb,$userdb,$passdb,$namedb);
if(!$db){
    die("Error Comuniquese con el administrador del sistema bajo error 004455");
}

$username = $_SESSION['username'];
$password = $_SESSION['password'];

if(isset($username) && isset($password)){
    $user = $db->fetch_item("SELECT * FROM user WHERE username=:username AND password=:pass",array(':username'=>$username,':pass'=>$password));
   
}

if(!$user && !$index){
    redirect("index.php");
}