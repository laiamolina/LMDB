<?php require './views/partials/header.php'; ?>
<body id="login">
<div class="contenidor"></div>
<div class="position-relative">
  <h2 class="titol">Registre </h2>
  <hr class="linia">
  <div class="wrapper">
      <form class="form-signin" action="/register" method="POST">       
        <h5 class="form-signin-heading plogin">Registre</h5>
        <input id="login_username" type="text" class="form-control" name="username" placeholder="Nom Usuari" required="" autofocus="" /><br>
        <input id="login_password" type="password" class="form-control" name="password" placeholder="Contrasenya" required=""/>      
        <label class="checkbox">
          <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Recorda'm
        </label>
        <button class="btn btn-lg btn-block boto" type="submit">Registrarse</button>
      </form>
    </div>
</div>
<?php require './views/partials/footer.php'; ?>