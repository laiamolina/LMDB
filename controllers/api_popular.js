var url = `https://api.themoviedb.org/3/movie/popular?api_key=1c104b303dc877c992ec8975a7ccb2e5&language=es-ESP&page=2
`;

fetch(url)
    .then(function(response) {
      return response.json();
    })
    .then(function(data) {
      console.log(data);
      var pelis = ``;
      var i = 0;
      Object(data.results).forEach(function(peli) {
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
     
    });

