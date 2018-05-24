var url = `https://api.themoviedb.org/3/movie/popular?api_key=1c104b303dc877c992ec8975a7ccb2e5&language=es-ESP&page=1
`;

getMovies(url).then((movies) => {
  printMovies(movies);
})