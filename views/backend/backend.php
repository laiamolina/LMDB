<?php
    require('./actions/session.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="/resources/bootstrap-4.1.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/resources/index.css">
    <title>Hello, world!</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">LMDB</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Posts <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pel·lícules</a>
      </li>
      <!--<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Ranking
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Més buscades</a>
          <a class="dropdown-item" href="#">Millors valorades</a>
          <a class="dropdown-item" href="#">Pitjors valorades</a>
      </li>-->
    </ul>
    <form class="form-inline my-4 my-lg-0">
      <input class="form-control mr-sm-4" type="search" placeholder="Cerca" aria-label="Search">
      <button class="btn btn-warning my-3 my-sm-0 navright" type="submit">Cerca</button>
    </form>
    <li class="nav-item dropdown move">
        <a class="nav-link dropdown-toggle btn btn-warning boto_user move" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu move" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Editar perfil</a>
          <a class="dropdown-item" href="/logout">Tancar sessió</a>
    </li>
  </div>
</nav>
   
<?php require 'views/partials/footer.php'; ?>