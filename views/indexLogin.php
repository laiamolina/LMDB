<?php
include('./login.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hola</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="/resources/login.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>
<body>

<div class="contenidor"></div>
<div class="position-relative">
  <h2 class="titol">Inici de sessió </h2>
  <hr class="linia">
  <div class="wrapper">
      <form class="form-signin" action="/" method="POST">       
        <p class="form-signin-heading">Inicia sessió amb el teu usuari</p>
        <?php if($displayLoginincorrecte) : ?>
      <div class="alert alert-warning" role="alert">
           <a href="#" class="alert-link">Nom d'usuari o contrasenya incorrecte</a>.
       </div>
      <?php endif; ?>
        <input id="login_username" type="text" class="form-control" name="username" placeholder="Nom Usuari" required="" autofocus="" /><br>
        <input id="login_password" type="password" class="form-control" name="password" placeholder="Contrasenya" required=""/>      
        <label class="checkbox">
          <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Recorda'm
        </label>
        <button class="btn btn-lg btn-block boto" type="submit">Entrar</button>
      </form>
    </div>
</div>
</body>
</html>



