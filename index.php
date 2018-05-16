<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    $routes = [
        "/" => "views/indexPrincipal.php",
        "/login" => "views/login/loginController.php",
        "/backend" => "views/backend.php",
        "/logout" => "actions/logout.php",
        "/session" => "actions/session.php"
    ];

    require($routes[$_SERVER["REQUEST_URI"]]);
?>