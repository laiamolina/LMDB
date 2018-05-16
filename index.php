<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    $routes = [
        "/ola" => "ola.php",
        "/adeu" => "adeu.php",
        "/" => "views/indexLogin.php",
        "/index" => "views/indexPrincipal.php"
    ];

    require($routes[$_SERVER["REQUEST_URI"]]);
?>