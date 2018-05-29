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
function printMovies(movies){
  console.log("cargando")
  console.log(movies)
  var pelis = '';
  Object(movies.results).forEach(function(peli) {
    if(peli.overview)
    pelis += `
      <div class="col-lg-6 col-md-6 col-xs-1 pb-3">
        <div class="row margin boto">
          <div class="col-lg-6 col-md-6 col-xs-6 caratula">
          <div class="imatge">
            <img class="img-fluid imgMovie" src="https://image.tmdb.org/t/p/w200/${peli.poster_path}">
            <div class="nota-m">
            <p class="text-white nota">${peli.vote_average*10}<p class="text-white percent">%</p></p>
          </div>
          </div>  

          </div>
          <div class="col-lg-6 col-md-6 col-xs-6">
            <p class="titol">${peli.title}</p>
            <p class="date">Estreno: ${peli.release_date}</p>
            <hr>          
            <p class="text-s">${peli.overview.substr(0,138)}...</p>
            <p class="center">${peli.adult ? `+18` : ``}</p>
            <hr>
            <a class="moreinfo" href="#"><p class="text-s">Más info</p></a>

        </div>
      </div>   
      </div>
    
    `;
  });
  document.getElementById("pelis").innerHTML = pelis;
}

function filtrar(nouFiltre){
  var titol_peli = ``;
  if(nouFiltre !== filtre){
    switch(nouFiltre){
      case 'upcoming':
          filtre = 'upcoming';
          titol = 'Próximamente';
          var url = `https://api.themoviedb.org/3/movie/${filtre}?api_key=1c104b303dc877c992ec8975a7ccb2e5&language=es-ESP&page=${pagina}`;
          getMovies(url).then((movies) => {
            printMovies(movies);
            titol_peli += `
              <h1>${titol}</h1>
            `;
            document.getElementById('titol-peli').innerHTML = titol_peli;
          })
          break;
      case 'popular':
          filtre = 'popular';
          titol = 'Películas populares';
          var url = `https://api.themoviedb.org/3/movie/${filtre}?api_key=1c104b303dc877c992ec8975a7ccb2e5&language=es-ESP&page=${pagina}`;
          getMovies(url).then((movies) => {
            printMovies(movies);
            titol_peli += `
            <h1>${titol}</h1>
            `;
            document.getElementById('titol-peli').innerHTML = titol_peli;
          })
          break;
      case 'now_playing':
          filtre = 'now_playing';
          titol = 'En cartelera';
          var url = `https://api.themoviedb.org/3/movie/${filtre}?api_key=1c104b303dc877c992ec8975a7ccb2e5&language=es-ESP&page=${pagina}`;
          getMovies(url).then((movies) => {
            printMovies(movies);
            titol_peli += `
              <h1>${titol}</h1>
            `;
            document.getElementById('titol-peli').innerHTML = titol_peli;
          })
          break;
     case 'top_rated':
          filtre = 'top_rated';
          titol = 'Mejores valoradas';
          var url = `https://api.themoviedb.org/3/movie/${filtre}?api_key=1c104b303dc877c992ec8975a7ccb2e5&language=es-ESP&page=${pagina}`;
          getMovies(url).then((movies) => {
            printMovies(movies);
            titol_peli += `
            <h1>${titol}</h1>
            `;
            document.getElementById('titol-peli').innerHTML = titol_peli;
          })
          break;
    }
  }

}

