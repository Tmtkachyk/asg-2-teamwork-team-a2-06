
function fetchingMatchingMovies(searchTerm) {
  sessionStorage.clear();
  
  fetch (`http://localhost/asg-2-teamwork-team-a2-06/public/api/movies.php?title=${searchTerm}`)
    .then(turnResponseIntoSearchResultObject)
    .then(turnSearchResultObjectIntoTitleMatches)
    //.then(turnMatchesIntoIds)
    //.then(turnIdsIntoPromiseClumps)
     //.then(turnSmallerClumpsIntoOneBigClump)
     //.then(turnArrayOfPromisesIntoMovieElements)
    .then(sortMovies)
     .then(saveMoviesToSessionStorage)
    //.then(displayMatchingMovies)
}

function turnResponseIntoSearchResultObject(response){
  return response.json();

}

function turnSearchResultObjectIntoTitleMatches(responseJson){
 
  return responseJson;
}

function sortMovies(listOfMovies){
let sortedMovies = sortAlpha(listOfMovies);
 return sortedMovies;
 }

function saveMoviesToSessionStorage(sortedMovies){
  sessionStorage.setItem("matchingMovies", JSON.stringify(sortedMovies));
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
