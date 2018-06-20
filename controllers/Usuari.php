<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require("./config.php");

class Usuari{
    protected static $redirectOnBackend = "/backend";
    protected static $redirectOnLogin = "/login";
    protected static $redirectPolitic= "/politica";

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

    static public function register($nom,$password,$password2,$email){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            global $db;
            $myusername = mysqli_real_escape_string($db,$nom);
            $mypassword = mysqli_real_escape_string($db,$password);
            $mypassword2 = mysqli_real_escape_string($db,$password2);
            $myemail= mysqli_real_escape_string($db,$email);

            $pass=password_hash($mypassword,PASSWORD_DEFAULT);
            $pass2= password_hash($mypassword2,PASSWORD_DEFAULT);


            if(!self::existeix($myusername)){
                $sql="INSERT INTO users (name,password,password2,email) VALUES ('$myusername', '$pass', '$pass2', '$myemail')";
                //die($sql);
                $result = mysqli_query($db,$sql) or die("register error");
                
                if($result){
                    header("Location: " . self::$redirectPolitic);
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

    static public function securityPassword($password,$password2){
        die('111');
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            global $db;
            $mypassword = mysqli_real_escape_string($db,$password);
            $mypassword2 = mysqli_real_escape_string($db,$password2);

            $pass=password_hash($mypassword,DEFAULT_PASSWORD);
            $pass2=password_hash($mypassword2,DEFAULT_PASSWORD);

            if($pass==$pass2){
                echo 'contras iguals';
                return true;
            }
            
        } return false;   
    }
    
}

