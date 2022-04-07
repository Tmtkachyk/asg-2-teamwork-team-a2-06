let filterButton = document.querySelector("#filterButton");
let resetButton = document.querySelector("#resetButton");
   
   filterButton.addEventListener("click", () => {


    filterMovies();
    displayFilteredMovies();


  })

  resetButton.addEventListener("click", () => {
    
   resetFilters();


  })

// function titleFilter(listOfMovies){
//   let sortedMovies = sortAlpha(listOfMovies);
//    return sortedMovies;
//    }


function filterMovies(){
  //gets it as a normal array
  //console.log(JSON.parse(sessionStorage.getItem("filteredMovies"))[0].title);
  //working
  //sessionStorage.setItem("filteredMovies", sessionStorage.getItem("matchingMovies"));

  //pulls out matchingMovies session storage into an array
  let preFilterArray = JSON.parse(sessionStorage.getItem("matchingMovies"));

  //filter the array
  //working vote_average array
  //let postFilterMovieArray = preFilterArray.filter(movie => movie.vote_average > 5 );


//Title Filter

  //Before Year Filter
  if(document.getElementById('radioTitle').checked) {

    let titleFilterValue = document.getElementById('titleFilter').value.toLowerCase();
    let postFilterMovieArray = preFilterArray.filter(movie => movie.title.toLowerCase().includes(titleFilterValue));
    //put filtered movies into session storage filteredMovies
  sessionStorage.setItem("filteredMovies", JSON.stringify(postFilterMovieArray));


  // filtered = myArray.filter(function (str) { return str.includes(PATTERN); });
  }

  //Below rating filter
  if(document.getElementById('radioBelow').checked) {
 
    let belowFilterValue = document.getElementById('belowRating').value;
    let postFilterMovieArray = preFilterArray.filter(movie => movie.vote_average < belowFilterValue );
      //put filtered movies into session storage filteredMovies
    sessionStorage.setItem("filteredMovies", JSON.stringify(postFilterMovieArray));
  }

  //Above rating filter
  if(document.getElementById('radioAbove').checked) {
 
    let aboveFilterValue = document.getElementById('aboveRating').value;
    let postFilterMovieArray = preFilterArray.filter(movie => movie.vote_average > aboveFilterValue );
      //put filtered movies into session storage filteredMovies
    sessionStorage.setItem("filteredMovies", JSON.stringify(postFilterMovieArray));
    console.log(aboveFilterValue);
  }
  

  
  
}

//reset filters
function resetFilters(){
  clearDefault();
  sessionStorage.removeItem("filteredMovies");

 if (JSON.parse(sessionStorage.getItem("matchingMovies")).length > 0) {
  document.querySelector("#noMovies").classList.add("hidden");
 } ;

  displayMatchingMovies();
}


function displayFilteredMovies(){
      
  let listOfMovies = JSON.parse(sessionStorage.getItem("filteredMovies"));

  if (listOfMovies.length == 0 || listOfMovies == null ) {
    clearDefault();
    document.querySelector("#noMovies").classList.remove("hidden");
  }else {
    clearDefault();
    listOfMovies.forEach(movie =>{
      populateDefault(movie);
      });
    
    //populateDefault(listOfMovies[0]);
    
  }};


  function clearDefault() {


   while (document.querySelector("#defaultInfo").firstChild) {
    document.querySelector("#defaultInfo").removeChild(document.querySelector("#defaultInfo").lastChild);
  }
  
  };
