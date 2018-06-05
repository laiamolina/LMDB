var popu = 'popular';
var filtre = 'popular';
var best = 'top_rated';
var prox = 'upcoming';
var pagina = 1;

var getMovies = function(url){
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

function numPag(num){
  pagina = num;
  var url = `https://api.themoviedb.org/3/movie/${filtre}?api_key=1c104b303dc877c992ec8975a7ccb2e5&language=es-ESP&page=${pagina}`;
  getMovies(url).then((movies) => {
    printMovies(movies);
  })
}
function first(){
  console.log("asdas")
  pagina = 1;
  var url = `https://api.themoviedb.org/3/movie/${filtre}?api_key=1c104b303dc877c992ec8975a7ccb2e5&language=es-ESP&page=${pagina}`;
  getMovies(url).then((movies) => {
    printMovies(movies);
  })
}
function last(){
  var url = `https://api.themoviedb.org/3/movie/${filtre}?api_key=1c104b303dc877c992ec8975a7ccb2e5&language=es-ESP&page=${pagina}`;
  getMovies(url).then((movies) => {
    printMovies(movies);
  })
}




