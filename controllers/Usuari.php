<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require("./config.php");

class Usuari{
    protected static $redirectOnBackend = "/backend";
    protected static $redirectOnLogin = "/login";

    static public function login($nom, $password){
    
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            global $db;
            $myusername = mysqli_real_escape_string($db,$nom);
            $mypassword = mysqli_real_escape_string($db,$password);
    
            $sql="SELECT name FROM users WHERE name ='$myusername' and password = '$mypassword'";
            $result = mysqli_query($db,$sql) or die("login error");
            $comptador = mysqli_num_rows($result);
    
            if($comptador == 1){
                $_SESSION['login_user'] = $myusername;
                header("Location: " . self::$redirectOnBackend);
            } else return true;
        }
    }

    static public function register($nom,$password){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            global $db;
            $myusername = mysqli_real_escape_string($db,$nom);
            $mypassword = mysqli_real_escape_string($db,$password);

            if(!self::existeix($myusername)){
                $sql="INSERT INTO users (name,password) VALUES ('$myusername', '$mypassword')";
                $result = mysqli_query($db,$sql) or die("register error");

                if($result){
                    header("Location: " . self::$redirectOnLogin);
                } else echo "Error de redirecció";
            }
        }
    }

    static public function existeix($nom){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            global $db;
            $myusername = mysqli_real_escape_string($db,$nom);
            
            $sql1= "SELECT name FROM users WHERE name = '$myusername'";
            $result = mysqli_query($db,$sql1);
        
            if(mysqli_num_rows($result) !=0){
                echo 'usuari ja existent';
                return true;
            } 
        } return false;   
    }   

}

