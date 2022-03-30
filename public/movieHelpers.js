
function fetchingMatchingMovies(searchTerm) {
  sessionStorage.clear();
  
  fetch (`http://localhost/asg-2-teamwork-team-a2-06/public/api/movies.php?title=${searchTerm}`)
    .then(turnResponseIntoSearchResultObject)
    .then(turnSearchResultObjectIntoTitleMatches)
    .then(turnMatchesIntoIds)
    .then(turnIdsIntoPromiseClumps)
     .then(turnSmallerClumpsIntoOneBigClump)
     .then(turnArrayOfPromisesIntoMovieElements)
    //.then(sortMovies)
     .then(saveMoviesToSessionStorage)
    //.then(displayMatchingMovies)
}

function turnResponseIntoSearchResultObject(response){
  
  return response.json();
}

function turnSearchResultObjectIntoTitleMatches(responseJson){
  return responseJson;
}

function turnMatchesIntoIds(matchingMovieObjs){
  let arrayOfIDs = []
  matchingMovieObjs.forEach(element => {
    arrayOfIDs.push(element.id);
  });
  
  return arrayOfIDs;
}

function turnIdsIntoPromiseClumps(arrayOfIDs){
  let arrayOfPromises = [];
  arrayOfIDs.forEach(element =>{ 
  arrayOfPromises.push(getMovieData(element));
});
return arrayOfPromises;
}

function turnSmallerClumpsIntoOneBigClump(arrayOfPromises){
  return Promise.all(arrayOfPromises);
}

function turnArrayOfPromisesIntoMovieElements(arrayOfMovieElements){
  let listOfMovies = [];
  arrayOfMovieElements.forEach(element =>{ 
      let movie = new Movie(element[0],element[1],element[2]);
      listOfMovies.push(movie);
    });
    return listOfMovies;
}

function sortMovies(listOfMovies){
let sortedMovies = sortAlpha(listOfMovies);
 return sortedMovies;
 }

function saveMoviesToSessionStorage(sortedMovies){
  sessionStorage.setItem("matchingMovies", JSON.stringify(sortedMovies));
}

function saveMoviesToLocalStorage(sortedMovies){
  localStorage.setItem("favouriteMovies", JSON.stringify(sortedMovies));
}

function getMovieData(movieid){
  let credits1 = fetch(`http://localhost/asg-2-teamwork-team-a2-06/public/api/movies.php?title=${movieid}`).then( response => response.json());
  let keywords1 = fetch(`http://localhost/asg-2-teamwork-team-a2-06/public/api/movies.php?title=${movieid}`).then( response => response.json());
  let details1 = fetch(`http://localhost/asg-2-teamwork-team-a2-06/public/api/movies.php?title=${movieid}`).then( response => response.json());
 return Promise.all([credits1, keywords1, details1]);
}

function populateFavourites(){
  localStorage.clear();
  let exactMovieID = ["679","348","1091","2666","10204","1124","9342","8536","13342","72105"];
  const promise1 = new Promise((resolve) =>{
    resolve(Promise.all(turnIdsIntoPromiseClumps(exactMovieID)));
  });
  
    promise1
    .then(turnSmallerClumpsIntoOneBigClump)
    .then(turnArrayOfPromisesIntoMovieElements)
    .then(sortMovies)
    .then(saveMoviesToLocalStorage)
    .then(displayFavourites)
}

function Movie(credits, keywords, details){
    this.id = details.id;
    this.title = details.title;
    this.release_date = details.release_date;
    this.revenue = details.revenue;
    this.runtime = details.runtime;
    this.tagline = details.tagline;
    this.popularity = details.popularity;
    this.vote_average = details.vote_average;
    this.count = details.vote_count;
    this.overview = details.overview;
    this.cast = credits.cast;
    this.crew = credits.crew;
    this.companies = details.production_companies;
    this.countries = details.production_countries;
    this.genres = details.genres;
    this.keywords = keywords.keywords;
    this.poster_path = details.poster_path;
    this.imdb_id = details.imdb_id;
}
//Sorting Functions
function sortAlpha(unSortedMovies){
  let sortedMoviesAlpha = unSortedMovies.sort((movie1, movie2) => movie1.title.localeCompare(movie2.title));
  return sortedMoviesAlpha;
    }

function clearEverything(){
      sessionStorage.clear();
      localStorage.clear();
      // clearDefault();
    }
