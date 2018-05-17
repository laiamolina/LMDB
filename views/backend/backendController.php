<?php
session_start();
require("././controllers/Usuari.php");

$registre = false;

if($_POST){
    $registre = Usuari::register($_POST['username'], $_POST['password']);
}

require("views/register/register.php");

