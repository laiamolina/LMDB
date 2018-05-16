<?php
include('login.php');
if(!$_SESSION['login_user']) header("Location: /");

