$(document).ready(function() {
  var url = `https://api.themoviedb.org/3/movie/popular?api_key=1c104b303dc877c992ec8975a7ccb2e5&language=es-ES&page=4`;

  $.fn.extend({
    animateCss: function(animationName, callback) {
      var animationEnd = (function(el) {
        var animations = {
          animation: "animationend",
          OAnimation: "oAnimationEnd",
          MozAnimation: "mozAnimationEnd",
          WebkitAnimation: "webkitAnimationEnd"
        };

        for (var t in animations) {
          if (el.style[t] !== undefined) {
            return animations[t];
          }
        }
      })(document.createElement("div"));

      this.addClass("animated " + animationName).one(animationEnd, function() {
        $(this).removeClass("animated " + animationName);

        if (typeof callback === "function") callback();
      });

      return this;
    }
  });

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
            <img class="imgMovie" src="https://image.tmdb.org/t/p/w200/${
              peli.poster_path
            }">
            <p class="movie">${peli.title}</p>  
            <hr>
            <p>Vots: ${peli.vote_count}</p>
            <p>Nota: ${peli.vote_average}</p>
            <p>${peli.adult ? `+18` : ``}</p>
            <hr>
            <p>Data d'estrena: ${peli.release_date}</p>
            </div>
            
        </div>
        `;
      });
      document.getElementById("pelis").innerHTML = pelis;
      $(".pelicula").hover(function() {
          $(this).animateCss("flip", function() {
          console.log("ola");
        });
      });
    });

    

});
