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
        pelis += `
        <div class="col-md-6 titleMovie">
         <div class="pelicula" id="pelicula${++i}">
            <div class="caratula col">
                  <img class="imgMovie" src="https://image.tmdb.org/t/p/w200/${peli.poster_path}">
                    <div class="nota">
                      <p class="nota-m">${peli.vote_average*10}<p class="percent">%</p></p>
                    </div>
           </div>
           <div class="contingut">
              <p class="movie">${peli.title}</p>  
              <p class="date">Estreno: ${peli.release_date}</p>
              <hr>
            <p class="text-s">${peli.overview.substr(0,138)}...</p>
            <p>${peli.adult ? `+18` : ``}</p>
            <div class="moreinfo">
                <a href="#">Más info</a>
            </div> 
             
           </div>
         </div>

         
          
            
        </div>
        `;
      });
      document.getElementById("pelis").innerHTML = pelis;
     
    });

