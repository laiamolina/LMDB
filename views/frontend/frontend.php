<?php require 'views/partials/header.php'; ?>
<body ng-app="myApp" ng-controller="myCtrl">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/">LMDB</a>
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
     <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Ranking
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Més buscades</a>
          <a class="dropdown-item" href="#">Millors valorades</a>
          <a class="dropdown-item" href="#">Pitjors valorades</a>
      </li>-->
    </ul>
    <a href="/login" class="btn btn-warning  navright"> 
        <i class="fas fa-user"></i>
    </a>
  </div>
</nav>

<form class="form-inline my-4 my-lg-0">
<input class="form-control mr-sm-4 cercador" type="search"  placeholder="Cerca" ng-change="cerca(nom)" ng-model="nom" aria-label="Search">   
</form>


<div class="container-fluid">
  <br>
  <div class="row">
    <div class="col-lg-2 col-xs-12">
      <div class="list-group col-xs-12 pt-4">
        <button type="button" class="list-group-item list-group-item-action bg-warning list-group-general">
          Filtros
        </button>
        <a type="button" class="list-group-item list-group-item-action filtre" id="focus" ng-click="filter('popular');">Popular <i class="fas fa-fire"></i></a>
        <a type="button" class="list-group-item list-group-item-action filtre" id="focus" ng-click="filter('now_playing')">En cartelera <i class="far fa-calendar-alt"></i></a>
        <a type="button" class="list-group-item list-group-item-action filtre" id="focus" ng-click="filter('top_rated')">Mejores valoradas <i class="fas fa-thumbs-up"></i></a>
        <a type="button" class="list-group-item list-group-item-action filtre" id="focus" ng-click="filter('upcoming')">Próximamente <i class="fas fa-stopwatch"></i></a>
      </div>
    </div>

  
    <div class="col-lg-8 col-xs-12 pb-3">
    <div class="row">
      <div class="col-lg-12 col-xs-12">
        <h1 ng-if="filtre == 'popular'">Películas más populares</h1>
        <h1 ng-if="filtre == 'now_playing'">En cartelera</h1>
        <h1 ng-if="filtre == 'top_rated'">Mejores valoradas</h1>
        <h1 ng-if="filtre == 'upcoming'">Próximamente</h1>
      </div>  
    </div> 
    <div class="row" id="pelis">
    </div>
    </div>
  </div>

  <nav>
    <ul class="pagination">
        <!--Arrow left-->
        <div id="paginacio" class="align">
        <li class="page-item">
            <a class="page-link" aria-label="Previous" ng-click="first()">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">First</span>
            </a>
        </li>

        <!--Numbers-->
        <li class="page-item" ng-if="(pagina - 4) > 0" ng-click="cargarPagina(pagina-4)"><a class="page-link">{{ pagina-4 }}</a></li>
        <li class="page-item" ng-if="(pagina - 3) > 0" ng-click="cargarPagina(pagina-3)"><a class="page-link">{{ pagina-3 }}</a></li>
        <li class="page-item" ng-if="(pagina - 2) > 0" ng-click="cargarPagina(pagina-2)"><a class="page-link">{{ pagina-2 }}</a></li>
        <li class="page-item" ng-if="(pagina - 1) > 0" ng-click="cargarPagina(pagina-1)"><a class="page-link">{{ pagina-1 }}</a></li>
        <li class="page-item active" ng-class="expression"><a class="page-link paginacio">{{ pagina }}</a></li>
        <li class="page-item" ng-if="(pagina + 1) < numPagines" ng-click="cargarPagina(pagina+1)"><a class="page-link">{{ pagina+1 }}</a></li>
        <li class="page-item" ng-if="(pagina + 2) < numPagines" ng-click="cargarPagina(pagina+2)"><a class="page-link">{{ pagina+2 }}</a></li>
        <li class="page-item" ng-if="(pagina + 3) < numPagines" ng-click="cargarPagina(pagina+3)"><a class="page-link">{{ pagina+3 }}</a></li>
        <li class="page-item" ng-if="(pagina + 4) < numPagines" ng-click="cargarPagina(pagina+4)"><a class="page-link">{{ pagina+4 }}</a></li>

        <!--Arrow right-->
        <li class="page-item">
            <a class="page-link" aria-label="Next" ng-click="last()">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Last</span>
            </a>
        </li>
        </div>
    </ul>
</nav>
  
</div>
<footer class="page-footer font-small unique-color-dark mt-4">

  <div style="background-color: #F5B041;">
    <div class="container">
      <div class="row py-4 d-flex align-items-center">

        <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
          <h6 class="mb-0">Síguenos en nuestras redes para estar al corriente de todo!</h6>
        </div>
      
        <div class="col-md-6 col-lg-7 text-center text-md-right">
          <a href="https://www.facebook.com">

            <i class="fab fa-facebook-square mr-4 mida"></i>
          </a>
    
          <a href="https://www.twitter.com">
            <i class="fab fa-twitter-square mr-4 mida"></i>
          </a>
          
          <a  href="https://plus.google.com/discover">
            <i class="fab fa-google-plus-square mr-4 mida"></i>
          </a>
       
          <a href="https://www.instagram.com">
             <i class="fab fa-instagram mida"></i>
          </a>

        </div>
       
      </div>
    

    </div>
  </div>

  <div class="container text-center text-md-left mt-5">

    <div class="row mt-3">
      <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
        <h6 class="text-uppercase font-weight-bold">LMDB</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>En esta página web vas a encontrar lo último en películas. También podras tener tu lista de películas favoritas! Registrate y disfruta!</p>

      </div>

      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

        <h6 class="text-uppercase font-weight-bold">Usuario</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a href="/login">Iniciar sesión</a>
        </p>
        <p>
          <a href="/register">Regístrate</a>
        </p>
        <p>

      </div>
    
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

        <h6 class="text-uppercase font-weight-bold">Contacto</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <i class="fa fa-home mr-3"></i> Carrer del Dr.Roux, 08017, Barcelona</p>
        <p>
          <i class="fa fa-envelope mr-3"></i> lmdb@gmail.com</p>
        <p>
          <i class="fa fa-phone mr-3"></i> + 34 123 567 060</p>
        <p>
          <i class="fa fa-print mr-3"></i> + 01 765 456 344</p>

      </div>

    </div>

  </div>
 
  <div class="footer-copyright text-center py-3">© 2018 Copyright:
    <a class="lmdb"> LMDB</a>
  </div>

</footer>
<?php require 'views/partials/footer.php'; ?>
<script>
var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope) {
  $scope.filtre = 'popular';
  $scope.pagina = 1;
  $scope.numPagines = 0;
  $scope.url = `https://api.themoviedb.org/3/movie/${$scope.filtre}?api_key=1c104b303dc877c992ec8975a7ccb2e5&language=es-ESP&page=${$scope.pagina}`;

  getMovies($scope.url).then((movies) => {
    $scope.numPagines = movies.total_pages;
    printMovies(movies);
    $scope.$apply();
  })

  $scope.last = function (){
    $scope.pagina = $scope.numPagines;
    $scope.url = "https://api.themoviedb.org/3/movie/popular?api_key=1c104b303dc877c992ec8975a7ccb2e5&language=es-ESP&page="+$scope.pagina;
    getMovies($scope.url).then((movies) => {
      $scope.numPagines = movies.total_pages;
      printMovies(movies);
      $scope.$apply();
    });
    
  }

  $scope.first = function (){
    $scope.pagina = 1;
    $scope.url = "https://api.themoviedb.org/3/movie/popular?api_key=1c104b303dc877c992ec8975a7ccb2e5&language=es-ESP&page="+$scope.pagina;
    getMovies($scope.url).then((movies) => {
      $scope.numPagines = movies.total_pages;
      printMovies(movies);
      $scope.$apply();
    });
  }

  $scope.filter = function (filtre){
    $scope.filtre = filtre;
    $scope.pagina = 1;
    $scope.url = `https://api.themoviedb.org/3/movie/${filtre}?api_key=1c104b303dc877c992ec8975a7ccb2e5&language=es-ESP&page=${$scope.pagina}`;
    getMovies($scope.url).then((movies) => {
      $scope.numPagines = movies.total_pages;
      printMovies(movies);
      $scope.$apply();
    });
  }

  $scope.cargarPagina = function (pagina){
    $scope.pagina = pagina;
    $scope.url = "https://api.themoviedb.org/3/movie/popular?api_key=1c104b303dc877c992ec8975a7ccb2e5&language=es-ESP&page="+$scope.pagina;
    getMovies($scope.url).then((movies) => {
      $scope.numPagines = movies.total_pages;
      printMovies(movies);
      $scope.$apply();
    });
  }

  $scope.cerca = function (nom){
    $scope.url = `https://api.themoviedb.org/3/search/movie?api_key=1c104b303dc877c992ec8975a7ccb2e5&query=${nom}&language=es-ESP&page=+${$scope.pagina}`;
    getMovies($scope.url).then((movies) => {
      $scope.pagina = 1;
      $scope.numPagines = movies.total_pages;
      printMovies(movies);
      $scope.$apply();
    });
  }

});
</script>
