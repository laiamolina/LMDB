<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hola</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="/resources/login.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>
<body>
<div class="wrapper">
    <form class="form-signin" action="/login" method="POST">       
      <h2 class="form-signin-heading">Inici sessió</h2>
      <input id="login_username" type="text" class="form-control" name="username" placeholder="Nom Usuari" required="" autofocus="" />
      <input id="login_password" type="password" class="form-control" name="password" placeholder="Contrasenya" required=""/>      
      <label class="checkbox">
        <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Recorda'm
      </label>
      <button class="btn btn-lg btn-block" type="submit" style="background-color: #e67300">Entrar</button>   
    </form>
  </div>
</body>
</html>
