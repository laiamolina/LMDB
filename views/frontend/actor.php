<?php require 'views/partials/header.php'; ?>
<?php  
$v1=$_GET['id'];
?>
<body ng-app="myApp" ng-controller="myCtrl">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/">LMDB</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Pel·lícules <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Nose</a>
      </li>
    </ul>
    <a href="/login" class="btn btn-warning  navright"> 
        <i class="fas fa-user"></i>
    </a>
  </div>
</nav>

<div class="container-fluid">
    <div class="row margin">
        <div class="col-lg-6 col-xs-12 mt-5 bg-dark">
            <img src="https://image.tmdb.org/t/p/w300{{actor.profile_path}}" class="imgActor">
        </div>
        <div class="col-lg-6 col-xs-12 mt-5 bg-primary">
            <p>{{actor.biography}}</p>
    </div>   
</div>





<?php require 'views/partials/footer.php'; ?>
<script>
var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope) {
    var urlParams = new URLSearchParams(window.location.search);
    var id = urlParams.get('id');
   
    $scope.recomenacio= `https://api.themoviedb.org/3/movie/${id}/recommendations?api_key=1c104b303dc877c992ec8975a7ccb2e5&language=es-ES&page=1`;
    $scope.actor='https://api.themoviedb.org/3/person/16851?api_key=1c104b303dc877c992ec8975a7ccb2e5&language=es-ES';


    $scope.recomenacions='';
  

     getMovies($scope.recomenacio).then((reco) =>{
        $scope.recomenacions=reco;
        $scope.$apply();
    })

    getMovies($scope.actor).then((person) =>{
        $scope.actor=person;
        console.log(person);
        $scope.$apply();
    })

});
</script>