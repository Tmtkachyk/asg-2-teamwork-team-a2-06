
function fetchingMatchingMovies(searchTerm) {
  sessionStorage.clear();
  
  //vvv This one for Local vvv
  //  fetch (`http://localhost/asg-2-teamwork-team-a2-06/public/api/movies.php?title=${searchTerm}`)
  fetch (`api/movies.php?title=${searchTerm}`)
  //vvv This one for Heroku vvv
  //fetch (`https://comp-3512-w22-team-6.herokuapp.com/api/movies.php?title=${searchTerm}`)
    .then(turnResponseIntoSearchResultObject)
    .then(turnSearchResultObjectIntoTitleMatches)
    .then(sortMovies)
    .then(saveMoviesToSessionStorage);

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

 //Sorting Functions
function sortAlpha(unSortedMovies){
  let sortedMoviesAlpha = unSortedMovies.sort((movie1, movie2) => movie1.title.localeCompare(movie2.title));
  return sortedMoviesAlpha;
    }

function saveMoviesToSessionStorage(sortedMovies){
  sessionStorage.setItem("matchingMovies", JSON.stringify(sortedMovies));
  //vvv This one for Local vvv
  //window.location.href = "/asg-2-teamwork-team-a2-06/public/browse-movies.php";
  window.location.href = "/browse-movies.php";
  //vvv This one for Heroku vvv
  //window.location.href = "/browse-movies.php";

}

  