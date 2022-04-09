let filterButton = document.querySelector("#filterButton");
let resetButton = document.querySelector("#resetButton");
let hideFilterButton = document.querySelector("#hideFilterButton");
let showFilterButton = document.querySelector("#showFilterButton");
let preFilterArray = JSON.parse(sessionStorage.getItem("matchingMovies"));


   
//click event listener on filter button
   filterButton.addEventListener("click", () => {
    filterMovies(preFilterArray);
    let listOfFilteredMovies = JSON.parse(sessionStorage.getItem("filteredMovies"));
    displayMatchingMovies(listOfFilteredMovies);
  })

//click event listener on reset button
  resetButton.addEventListener("click", () => {
   resetFilter();
  })

//click event listener on hide filters button
  hideFilterButton.addEventListener("click", () => {
    document.querySelector("#filterForm").classList.add("hidden");
    document.querySelector("#showFilterButtonDiv").classList.remove("hidden");
   })

   //click event listener on show filters button
  showFilterButton.addEventListener("click", () => {
    document.querySelector("#showFilterButtonDiv").classList.add("hidden");
    document.querySelector("#filterForm").classList.remove("hidden");
   })


//Checks filters
function filterMovies(preFilterArray){
  //pulls out matchingMovies session storage into an array


  //Title Filter
  titleFilter(preFilterArray);
  //before Year Filter
  beforeYearFilter(preFilterArray);
  //after Year Filter
  afterYearFilter(preFilterArray);
  //between Year Filter
  betweenYearFilter(preFilterArray);
  //Below rating filter
  belowRatingfilter(preFilterArray);  
  //Above rating filter
  aboveRatingFilter(preFilterArray);
  //inbetween rating Filter
  inbetweenRatingFilter(preFilterArray);

}

//TITLE filter
function titleFilter(preFilterArray){
  if(document.getElementById('radioTitle').checked) {
    let titleFilterValue = document.getElementById('titleFilter').value.toLowerCase();
    let postFilterMovieArray = preFilterArray.filter(movie => movie.title.toLowerCase().includes(titleFilterValue));
    //put filtered movies into session storage filteredMovies
  sessionStorage.setItem("filteredMovies", JSON.stringify(postFilterMovieArray));
  }
}  

//YEAR FILTERS BELOW
//before year filter
function beforeYearFilter(preFilterArray) {
  if(document.getElementById('radioBefore').checked) {
    let beforeYearValue = document.getElementById('beforeFilter').value;
    let postFilterMovieArray = preFilterArray.filter(movie => movie.release_date < beforeYearValue );
      //put filtered movies into session storage filteredMovies
    sessionStorage.setItem("filteredMovies", JSON.stringify(postFilterMovieArray));
  }
}

//after year filter
function afterYearFilter(preFilterArray) {
  if(document.getElementById('radioAfter').checked) {
    
    let afterYearValue = document.getElementById('afterFilter').value;
    let postFilterMovieArray = preFilterArray.filter(movie => movie.release_date > afterYearValue );
      //put filtered movies into session storage filteredMovies
    sessionStorage.setItem("filteredMovies", JSON.stringify(postFilterMovieArray));
  }
}

//between year filter
function betweenYearFilter(preFilterArray) {
  if(document.getElementById('radioBetween').checked) {
    let betweenFilterLowerBounds = document.getElementById('betweenFilterLowerBounds').value;
    let betweenFilterHigherBounds = document.getElementById('betweenFilterHigherBounds').value;

    let postFilterMovieArray = preFilterArray.filter(movie => movie.release_date > betweenFilterLowerBounds && movie.release_date < betweenFilterHigherBounds );
      //put filtered movies into session storage filteredMovies
    sessionStorage.setItem("filteredMovies", JSON.stringify(postFilterMovieArray));
  }
}


//RATING FILTERS BELOW
//below rating filter
function belowRatingfilter(preFilterArray) {
  if(document.getElementById('radioBelow').checked) {
    let belowFilterValue = document.getElementById('belowRating').value;
    let postFilterMovieArray = preFilterArray.filter(movie => movie.vote_average < belowFilterValue );
      //put filtered movies into session storage filteredMovies
    sessionStorage.setItem("filteredMovies", JSON.stringify(postFilterMovieArray));
  }
}

//bug on 10
//above rating filter
function aboveRatingFilter(preFilterArray) {
  if(document.getElementById('radioAbove').checked) {
    let aboveFilterValue = document.getElementById('aboveRating').value;
    let postFilterMovieArray = preFilterArray.filter(movie => movie.vote_average > aboveFilterValue );
      //put filtered movies into session storage filteredMovies
    sessionStorage.setItem("filteredMovies", JSON.stringify(postFilterMovieArray));
  }
}

//Inbetween rating filter
function inbetweenRatingFilter(preFilterArray) {
  if(document.getElementById('radioInbetween').checked) {
    let lowerFilterValue = document.getElementById('betweenRatingLowerBounds').value;
    let higherFilterValue = document.getElementById('betweenRatingHigherBounds').value;

    //If higher and lower are same value displays movies with that number
    if (lowerFilterValue == higherFilterValue) {
      let postFilterMovieArray = preFilterArray.filter(movie => movie.vote_average > lowerFilterValue && movie.vote_average < parseInt(higherFilterValue)+1 );
      //put filtered movies into session storage filteredMovies
    sessionStorage.setItem("filteredMovies", JSON.stringify(postFilterMovieArray));
    }
    else {
      let postFilterMovieArray = preFilterArray.filter(movie => movie.vote_average > lowerFilterValue && movie.vote_average < higherFilterValue );
      //put filtered movies into session storage filteredMovies
    sessionStorage.setItem("filteredMovies", JSON.stringify(postFilterMovieArray));
    }
  }
}


//After reset button is clicked sets everything back to starting
function resetFilter(){
  clearDefault();
  clearFilters();
  sessionStorage.removeItem("filteredMovies");

 if (JSON.parse(sessionStorage.getItem("matchingMovies")).length > 0) {
  document.querySelector("#noMovies").classList.add("hidden");
 } ;

  displayMatchingMovies(JSON.parse(sessionStorage.getItem("matchingMovies")));
}

//resets the input filter values
function clearFilters() {
  document.getElementById('filterForm').reset();
}

//clears all the movie details i.e. poster, title, date and rating
  function clearDefault() {
   while (document.querySelector("#defaultInfo").firstChild) {
    document.querySelector("#defaultInfo").removeChild(document.querySelector("#defaultInfo").lastChild);
  }
  };

  document.addEventListener("DOMContentLoaded", (event) => {
    
    //display below rating slider amount
    displaySliderAmounts('belowRating', 'belowValue');
    //display above rating slider amount
    displaySliderAmounts('aboveRating', 'aboveValue');
    //display inbetween lower bound rating slider amount
    displaySliderAmounts('betweenRatingLowerBounds', 'lowerBoundsValue');
  //display inbetween upper bound rating slider amount
    displaySliderAmounts('betweenRatingHigherBounds', 'upperBoundsValue');
  });

//displays slider input amount
 function displaySliderAmounts(slider, span) {
  document.getElementById(slider).addEventListener('input', (event) => {
    let belowFilterValue = document.getElementById(slider).value;
    document.getElementById(span).textContent = `${belowFilterValue}`;
   });
 }


//Title sort event listener

//Sort Title UP
document.getElementById('titleSortUp').addEventListener("click", () => {
  sortTitleUp();
 })
function sortTitleUp(){
  clearDefault();
  if (JSON.parse(sessionStorage.getItem("filteredMovies")) !== null) {
    let sortedMoviesTitle = JSON.parse(sessionStorage.getItem("filteredMovies")).sort((movie1, movie2) => movie1.title.localeCompare(movie2.title));
    displayMatchingMovies(sortedMoviesTitle);
  } else{
    let sortedMoviesTitle = preFilterArray.sort((movie1, movie2) => movie1.title.localeCompare(movie2.title));
    displayMatchingMovies(sortedMoviesTitle);
  }
    }

//Sort Title DOWN
document.getElementById('titleSortDown').addEventListener("click", () => {
  sortTitleDown();
 })
function sortTitleDown(){
  clearDefault();
  if (JSON.parse(sessionStorage.getItem("filteredMovies")) !== null) {
    let sortedMoviesTitle = JSON.parse(sessionStorage.getItem("filteredMovies")).sort((movie1, movie2) => movie1.title.localeCompare(movie2.title));
    displayMatchingMovies(sortedMoviesTitle);
  } else{
    let sortedMoviesTitle = preFilterArray.sort((movie1, movie2) => movie2.title.localeCompare(movie1.title));
    displayMatchingMovies(sortedMoviesTitle);
  }
    }

 
//Year sort event listener

//Year sort up
document.getElementById('yearSortUp').addEventListener("click", () => {
  sortYearUp();
 })

function sortYearUp(){
  clearDefault();
  if (JSON.parse(sessionStorage.getItem("filteredMovies")) !== null) {
    let sortedMoviesYear = JSON.parse(sessionStorage.getItem("filteredMovies")).sort((movie1, movie2) => movie1.release_date.localeCompare(movie2.release_date));
  displayMatchingMovies(sortedMoviesYear);
  } else {
    let sortedMoviesYear = preFilterArray.sort((movie1, movie2) => movie2.release_date.localeCompare(movie1.release_date));
    displayMatchingMovies(sortedMoviesYear);
  }
    }

//Year sort down
document.getElementById('yearSortDown').addEventListener("click", () => {
  sortYearDown();
 })

function sortYearDown(){
  clearDefault();
  if (JSON.parse(sessionStorage.getItem("filteredMovies")) !== null) {
    let sortedMoviesYear = JSON.parse(sessionStorage.getItem("filteredMovies")).sort((movie1, movie2) => movie1.release_date.localeCompare(movie2.release_date));
  displayMatchingMovies(sortedMoviesYear);
  } else {
    let sortedMoviesYear = preFilterArray.sort((movie1, movie2) => movie1.release_date.localeCompare(movie2.release_date));
    displayMatchingMovies(sortedMoviesYear);
  }
    }    
 
//Rating sort event listener

//sort rating up
document.getElementById('ratingSortUp').addEventListener("click", () => {
  sortRatingUp();
 });
function sortRatingUp(){
  clearDefault();
  if (JSON.parse(sessionStorage.getItem("filteredMovies")) !== null) {
    let sortedMoviesRating = JSON.parse(sessionStorage.getItem("filteredMovies")).sort((movie1, movie2) => movie1.vote_average.localeCompare(movie2.vote_average));
  displayMatchingMovies(sortedMoviesRating);
  } else {
    let sortedMoviesRating = preFilterArray.sort((movie1, movie2) => movie2.vote_average.localeCompare(movie1.vote_average));
    displayMatchingMovies(sortedMoviesRating);
  }
    };
//sort rating down
document.getElementById('ratingSortDown').addEventListener("click", () => {
  sortRatingDown();
 })
function sortRatingDown(){
  clearDefault();
  if (JSON.parse(sessionStorage.getItem("filteredMovies")) !== null) {
    let sortedMoviesRating = JSON.parse(sessionStorage.getItem("filteredMovies")).sort((movie1, movie2) => movie1.vote_average.localeCompare(movie2.vote_average));
  displayMatchingMovies(sortedMoviesRating);
  } else {
    let sortedMoviesRating = preFilterArray.sort((movie1, movie2) => movie1.vote_average.localeCompare(movie2.vote_average));
    displayMatchingMovies(sortedMoviesRating);
  }
    };
