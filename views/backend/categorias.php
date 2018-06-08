<?php
    require('./actions/session.php');
?>
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
        <a class="nav-link" href="#">Categorias</a>
      </li>
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
    <div class="col-lg-6 col-md-6 col-xs-1 pb-3" ng-repeat="movie in movies.results" ng-if="movie.overview" >
        <div class="row margin boto">
          <div class="col-lg-6 col-md-6 col-xs-6 caratula">
          <div class="imatge">
            <img class="img-fluid imgMovie" src="https://image.tmdb.org/t/p/w200/{{movie.poster_path}}" on-error-src="/img/LMDB.png">
            <div class="nota-m">
            <p class="text-white nota">{{movie.vote_average*10}}<p class="text-white percent">%</p></p>
          </div>
          </div>  

          </div>
          <div class="col-lg-6 col-md-6 col-xs-6">
            <p class="titol">{{movie.title}}</p>
            <p class="date">Estreno: {{movie.release_date}}</p>
            <hr>          
            <p class="text-s">{{movie.overview.substr(0,138)}}...</p>
            <hr>
            <a class="moreinfo" href="/info?id={{movie.id}}"><p class="text-s">Más info</p></a>
        </div>
      </div>   
      </div>
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


  
<?php require 'views/partials/footer.php'; ?>
<script>
var app = angular.module('myApp', []);
app.directive('onErrorSrc', function() {
    return {
        link: function(scope, element, attrs) {
          element.bind('error', function() {
            if (attrs.src != attrs.onErrorSrc) {
              attrs.$set('src', attrs.onErrorSrc);
            }
          });
        }
    }
});

app.controller('myCtrl', function($scope) {
  $scope.filtre = 'popular';
  $scope.pagina = 1;
  $scope.numPagines = 0;
  $scope.url = `https://api.themoviedb.org/3/movie/${$scope.filtre}?api_key=1c104b303dc877c992ec8975a7ccb2e5&language=es-ESP&page=${$scope.pagina}`;
  $scope.movies='';
  $scope.category = `https://api.themoviedb.org/3/genre/movie/list?api_key=1c104b303dc877c992ec8975a7ccb2e5&language=es-ES`;
  $scope.categories='';

    getter($scope.category).then((cat) =>{
        $scope.categories=cat;
        console.log(cat);
        $scope.$apply();
    })

  getter($scope.url).then((movies) => {
    $scope.numPagines = movies.total_pages;
    $scope.movies = movies;
    $scope.$apply();
  })

  $scope.last = function (){
    $scope.pagina = $scope.numPagines;
    $scope.url = "https://api.themoviedb.org/3/movie/popular?api_key=1c104b303dc877c992ec8975a7ccb2e5&language=es-ESP&page="+$scope.pagina;
    getter($scope.url).then((movies) => {
      $scope.numPagines = movies.total_pages;
      $scope.movies = movies;
      $scope.$apply();
    });
    
  }

  $scope.first = function (){
    $scope.pagina = 1;
    $scope.url = "https://api.themoviedb.org/3/movie/popular?api_key=1c104b303dc877c992ec8975a7ccb2e5&language=es-ESP&page="+$scope.pagina;
    getter($scope.url).then((movies) => {
      $scope.numPagines = movies.total_pages;
      $scope.movies = movies;
      $scope.$apply();
    });
  }

  $scope.filter = function (filtre){
    $scope.filtre = filtre;
    $scope.pagina = 1;
    $scope.url = `https://api.themoviedb.org/3/movie/${filtre}?api_key=1c104b303dc877c992ec8975a7ccb2e5&language=es-ESP&page=${$scope.pagina}`;
    getter($scope.url).then((movies) => {
      $scope.numPagines = movies.total_pages;
      $scope.movies = movies;
      $scope.$apply();
    });
  }

  $scope.cargarPagina = function (pagina){
    $scope.pagina = pagina;
    $scope.url = "https://api.themoviedb.org/3/movie/popular?api_key=1c104b303dc877c992ec8975a7ccb2e5&language=es-ESP&page="+$scope.pagina;
    getter($scope.url).then((movies) => {
      $scope.numPagines = movies.total_pages;
      $scope.movies = movies;
      $scope.$apply();
    });
  }

  $scope.cerca = function (nom){
    $scope.url = `https://api.themoviedb.org/3/search/movie?api_key=1c104b303dc877c992ec8975a7ccb2e5&query=${nom}&language=es-ESP&page=+${$scope.pagina}`;
    getter($scope.url).then((movies) => {
      $scope.pagina = 1;
      $scope.numPagines = movies.total_pages;
      $scope.movies = movies;
      $scope.$apply();
    });
  }
  


});
</script>
