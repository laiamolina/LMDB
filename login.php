<?php
    include("config.php");
    session_start();
    $displayLoginincorrecte = false;

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $myusername = mysqli_real_escape_string($db,$_POST['username']);
        $mypassword = mysqli_real_escape_string($db,$_POST['password']);

        $sql="SELECT name FROM users WHERE name ='$myusername' and password = '$mypassword'";
        $result = mysqli_query($db,$sql) or die("mysqli error");
        $comptador = mysqli_num_rows($result);

        if($comptador == 1){
            $_SESSION['login_user'] = $myusername;
            header("location: /index");
        } else{
            $displayLoginincorrecte = true;
        }
    }

?>
