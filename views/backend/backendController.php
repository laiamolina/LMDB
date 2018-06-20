<?php
session_start();
require("././controllers/Usuari.php");

$registre = false;
$existeix = false;
$securityPassword=false;


if($_POST){
    $registre = Usuari::register($_POST['username'], $_POST['password'], $_POST['password2'], $_POST['email']);
}

if($_POST){
    $existeix = Usuari::existeix($_POST['username']);
}

if($_POST){
    $securityPassword = Usuari::securityPassword($_POST['password'], $_POST['password2']);
}
require("views/register/register.php");

