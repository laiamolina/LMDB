<?php require 'views/partials/header.php'; ?>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">LMDB</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Pel·lícules <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Nose</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Ranking
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Més buscades</a>
          <a class="dropdown-item" href="#">Millors valorades</a>
          <a class="dropdown-item" href="#">Pitjors valorades</a>
      </li>
    </ul>
    <a href="/login" class="btn btn-warning  navright"> 
        <i class="fas fa-user"></i>
    </a>
  </div>
</nav>

<form class="form-inline my-4 my-lg-0">
<input class="form-control mr-sm-4 cercador" type="search"  placeholder="Cerca" aria-label="Search">   
</form>

<div class="container">
<div class="row" id="pelis"></div>
</div>
<?php require 'views/partials/footer.php'; ?>

