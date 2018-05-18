<?php
session_start();
require("././controllers/Usuari.php");

$registre = false;
$existeix = false;


if($_POST){
    $registre = Usuari::register($_POST['username'], $_POST['password']);
}

if($_POST){
    $existeix = Usuari::existeix($_POST['username']);
}
require("views/register/register.php");

