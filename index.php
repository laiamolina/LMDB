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
        "/info" => "views/frontend/moreInfo.php",
        "/actor" =>"views/frontend/actor.php"
    ];
    $params = multiexplode(['?', '&'], $_SERVER["REQUEST_URI"]);
    

    if(count($params) > 1){
        foreach($params as $param){
            $hasParam = strpos('=' , $param);
            if($hasParam){
                $param = explode('=', $param);
                $_GET[$param[0]] = $param[1];
            } 
        }
    }

    require($routes[$params[0]]);
    function multiexplode ($delimiters,$string) {

        $ready = str_replace($delimiters, $delimiters[0], $string);
        $launch = explode($delimiters[0], $ready);
        return  $launch;
    }
    
?>