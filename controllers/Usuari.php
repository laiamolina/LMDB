<?php
require("./config.php");

class Usuari{
    protected static $redirectOnLogin = "/backend";

    static public function login($nom, $password){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            global $db;
            $myusername = mysqli_real_escape_string($db,$nom);
            $mypassword = mysqli_real_escape_string($db,$password);
    
            $sql="SELECT name FROM users WHERE name ='$myusername' and password = '$mypassword'";
            $result = mysqli_query($db,$sql) or die("mysqli error");
            $comptador = mysqli_num_rows($result);
    
            if($comptador == 1){
                $_SESSION['login_user'] = $myusername;
                header("Location: " . self::$redirectOnLogin);
            } else return true;
            
        }
    }

}