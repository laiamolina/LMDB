<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    $routes = [
        "/" => "views/frontend/frontend.php",
        "/login" => "views/login/loginController.php",
        "/register" => "views/backend/backendController.php",
        "/backend" => "views/backend/backend.php",
        "/logout" => "actions/logout.php",
        "/session" => "actions/session.php",
        "/usuari" => "views/frontend/frontendUsuari.php",
        "/info" => "views/frontend/moreInfo.php"
    ];

    require($routes[$_SERVER["REQUEST_URI"]]);
?>