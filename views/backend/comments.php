<?php require 'views/partials/header.php';?>
<?php
$v1 = $_GET['id'];
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

<form class="form-inline my-4 my-lg-0">
<input class="form-control mr-sm-4 cercador" type="search"  placeholder="Cerca" ng-change="cerca(nom)" ng-model="nom" aria-label="Search">
</form>

<div class="container-fluid">
    <br>
    <div class="pare">
        <div class="fill mx-auto col-xs-12" style="background-image: url(https://image.tmdb.org/t/p/w500{{movie.backdrop_path}}); background-repeat: no-repeat; background-size: cover; height:521px;">
            <div class="fill fill1 mx-auto col-xs-12" style="background-image: radial-gradient(circle at -2% 45%, rgba(239, 124, 6, 0.81) 0%, rgba(152, 26, 26, 0.88) 100%)">
            <div class="row margin">
                    <div class="col-md-5 col-xs-12 center">
                         <img class="img-fluid mt-5 img-info"style="height:400px;" src="https://image.tmdb.org/t/p/w300/{{movie.poster_path}}">
                    <div class="row center">
                        <div class="col-md-4 col-xs-12 mt-3 mb-3 margin">
                        <a target="_blank" href="https://www.youtube.com/watch?v={{trailer}}"><i class="fas fa-play-circle play"></i></a>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-6 col-xs-3 mr-auto">
                        <h1 class="mt-5 text-white">{{movie.title}}
                        <span class="data">({{movie.release_date.substr(0,4)}})</h1>
                        <hr style="background-color:darkred;">
                        <p class="text-white genre"> Género:
                        <span class="genres" ng-repeat="genre in movie.genres">{{genre.name}}, </span></p>
                        <p class="text-white genre">Duración:
                        <span class="genres">{{movie.runtime}} min</p>
                        <h5 class="text-white genre">Sinopsis</h5>
                        <p class="text-white">{{movie.overview}}</p>
                    </div>
            </div>
        </div>
        
        <div class="extra">
            <div class="extra-fill">
                <div class="row margin">
                    <div class="col-lg-12 col-xs-12 mt-3 center">
                        <h2>Actores</h2>
                    </div>
                </div>
                    <div class="row margin">
                        <div class="col-lg-12">
                            <div class="col-lg-12 col-md-3 flex">
                                <div class="cartes">
                                <div class="row">
                                <div class="col-xs-12 carta" ng-repeat="actor in actor.cast|limitTo:8" style="width: 10.5rem;">
                                    <div class="card" style="height: 27.5rem;">
                                        <span class="img-fluid"><img class="card-img-top caratulaMoreinfo" src="https://image.tmdb.org/t/p/w300/{{actor.profile_path}}" on-error-src="/img/LMDB.png"></img>
                                        </span>
                                        <div class="card-body">
                                            <span><h5> {{actor.name}}</h5></span>
                                            <span><p> {{actor.character}} </p></span>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div> 

        <div class="reco">
            <div class="recom">
                <div class="row margin">
                    <div class="col-lg-12 col-xs-12 mt-5 center">
                         <h2>Recomendaciones</h2>
                    </div>
                </div>
                    <div class="row margin">
                            <div class="col-lg-12 col-md-3 col-xs-12 flex mb-5">
                                <div class="cartes">
                                    <div class="row">
                                        <div class="col-xs-12 ml-1 carta" style="width: 10.5rem;" ng-repeat="recomenacions in recomenacions.results|limitTo:8"> 
                                    <div class="card carta" >
                                        <span class="img-fluid"><a href="/info?id={{recomenacions.id}}"><img class="card-img-top caratulaReco" src="https://image.tmdb.org/t/p/w300/{{recomenacions.poster_path}}" on-error-src="/img/LMDB.png"></a></img>
                                        </span>
                                    </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

          <form>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Nom</label>
          <input type="email" class="form-control" id="inputEmail4" placeholder="Laia">
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Cognom</label>
          <input type="password" class="form-control" id="inputPassword4" placeholder="Molina">
        </div>
      </div>
      <div class="form-group">
        <label for="inputAddress">Adreça</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="ausies March S/N">
      </div>
      <div class="form-group">
        <label for="inputAddress2">Address 2</label>
        <input type="text" class="form-control" id="inputAddress2" placeholder="Línia adicional">
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputCity">Ciutat</label>
          <input type="text" class="form-control" id="inputCity" placeholder="Torelló">
        </div>
        <div class="form-group col-md-4">
          <label for="inputState">Estudis Superats</label>
          <select id="inputState" class="form-control">
            <option selected>Tria una opció</option>
            <option>...</option>
          </select>
        </div>
       <div class="form-group col-md-4">
            <label for="inputState">Cicle del qual demanes info</label>
            <select id="inputState" class="form-control">
                <option selected>Tria una opció.</option>
                <option>...</option>
            </select>
        </div>
          
          <div class="col-md-12">
          <label for="inputState">Comentaris</label>
          <input type="text" class="form-control">    
        </div>
          
      </div>
      
      <div class="form-group">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="gridCheck">
          <label class="form-check-label" for="gridCheck">
            Accepto LOPD
          </label>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Sign in</button>
    </form>
    
        
    </div>
</div>


<?php require 'views/partials/footer.php';?>
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
    var urlParams = new URLSearchParams(window.location.search);
    var id = urlParams.get('id');
    $scope.trailer='';
    $scope.fetch_trailer_url = `https://api.themoviedb.org/3/movie/${id}/videos?api_key=1c104b303dc877c992ec8975a7ccb2e5&language=es-ES`;
    $scope.url = `https://api.themoviedb.org/3/movie/${id}}?api_key=1c104b303dc877c992ec8975a7ccb2e5&language=es-ES`;
    $scope.actor=`https://api.themoviedb.org/3/movie/${id}/credits?api_key=1c104b303dc877c992ec8975a7ccb2e5&language=es-ES`;
    $scope.recomenacio= `https://api.themoviedb.org/3/movie/${id}/recommendations?api_key=1c104b303dc877c992ec8975a7ccb2e5&language=es-ES&page=1`;

    $scope.person='';
    $scope.movie='';
    $scope.video='';
    $scope.recomenacions='';


    getter($scope.url).then((movie) => {
        $scope.movie = movie;
        console.log(movie);
        $scope.$apply();
    })

    getter($scope.fetch_trailer_url).then((trailer) =>{
        $scope.video=trailer;
        $scope.trailer=trailer.results[0].key;
        $scope.$apply();
    })

    getter($scope.actor).then((actor) =>{
        $scope.actor=actor;
        console.log(actor);
        $scope.$apply();
    })

     getter($scope.recomenacio).then((reco) =>{
        $scope.recomenacions=reco;
        $scope.$apply();
    })

});
</script>
