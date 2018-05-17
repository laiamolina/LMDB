<?php
session_start();
require("././controllers/Usuari.php");

$displayLoginincorrecte = false;

if($_POST){
    $displayLoginincorrecte = Usuari::login($_POST['username'], $_POST['password']);
}

require("login.php");