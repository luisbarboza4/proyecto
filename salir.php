<?php
include_once("functions.php");
if(!isset($_SESSION)){
    session_start();
}

unset($_SESSION['username']);
unset($_SESSION['password']);
session_destroy();

redirect("admin.php");