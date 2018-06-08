<?php require './views/partials/header.php'; ?>
<body id="login">
<div class="contenidor"></div>
<div class="position-relative">
  <h2 class="titol">Registre </h2>
  <hr class="linia">
  <div class="wrapper">
      <form class="form-signin" action="/register" method="POST">       
        <h5 class="form-signin-heading plogin">Registre</h5>
          <?php if($existeix) : ?>
            <div class="alert alert-warning" role="alert">
                <a href="#" class="alert-link">Ja existeix un usuari amb aquest nom, prova un altre...</a>
            </div>
          <?php endif; ?> 
        <input id="login_username" type="text" class="form-control" name="username" placeholder="Nom Usuari" required="" autofocus="" /><br>
        <input id="login_password" type="password" class="form-control" name="password" placeholder="Contrasenya" required=""/>      
        <button class="btn btn-lg btn-block boto" type="submit">Registrarse</button>
      </form>
    </div>
</div>
<?php require './views/partials/footer.php'; ?>