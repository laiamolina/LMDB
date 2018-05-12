<?php

    $routes = [
        "/ola" => "ola.php",
        "/adeu" => "adeu.php",
        "/login" => "views/login.php",
        "/" => "views/indexPrincipal.php"
    ];

    require($routes[$_SERVER["REQUEST_URI"]]);
?>