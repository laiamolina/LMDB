var popu = 'popular';
var filtre = 'popular';
var best = 'top_rated';
var prox = 'upcoming';
var pagina = 1;

var getter = function(url){
  return new Promise (function(resolve, reject) {
    fetch(url)
    .then(function(response) {
      return response.json();
    })
    .then(function(movies) {
      if(movies) resolve(movies);
      else reject("Error");
    });
  });
}






