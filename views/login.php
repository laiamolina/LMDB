<?php
    include("config.php");
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $myusername = mysqli_real_escape_string($db,$_POST['username']);
        $mypassword = mysqli_real_escape_string($db,$_POST['password']);

        $sql="SELECT name FROM users WHERE name ='$myusername' and password = '$mypassword'";
        $result = mysqli_query($db,$sql);
        $comptador = mysqli_num_rows($result);

        if($comptador == 1){
            $_SESSION['login_user'] = $myusername;
            header("location: /");
        } else{
            echo "Ha hagut un error";
        }
    }

?>
