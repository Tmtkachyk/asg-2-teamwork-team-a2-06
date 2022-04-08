let filterButton = document.querySelector("#filterButton");
let resetButton = document.querySelector("#resetButton");
let hideFilterButton = document.querySelector("#hideFilterButton");
   
//click event listener on filter button
   filterButton.addEventListener("click", () => {
    filterMovies();
    displayFilteredMovies();
  })

//click event listener on reset button
  resetButton.addEventListener("click", () => {
   resetFilter();
  })

//click event listener on hide filters button
  hideFilterButton.addEventListener("click", () => {
    document.querySelector("#filterForm").classList.add("hidden");
   })


//Checks filters
function filterMovies(){
  //pulls out matchingMovies session storage into an array
  let preFilterArray = JSON.parse(sessionStorage.getItem("matchingMovies"));

  //Title Filter
  titleFilter(preFilterArray);
  //Title Filter
  beforeYearFilter(preFilterArray);
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
function afterYearFilter() {
  return;
}

//between year filter
function betweenYearFilter() {
  return;
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

//Displays the filtered movies from session storage onto the page
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
  }};


//After reset button is clicked sets everything back to starting
function resetFilter(){
  clearDefault();
  clearFilters();
  sessionStorage.removeItem("filteredMovies");

 if (JSON.parse(sessionStorage.getItem("matchingMovies")).length > 0) {
  document.querySelector("#noMovies").classList.add("hidden");
 } ;

  displayMatchingMovies();
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

//  document.getElementById('belowRating').addEventListener('input', (event) => {
//   let belowFilterValue = document.getElementById('belowRating').value;
//   document.getElementById('belowValue').textContent = `${belowFilterValue}`;
//  });
 



  //gets it as a normal array
  //console.log(JSON.parse(sessionStorage.getItem("filteredMovies"))[0].title);
  //working
  //sessionStorage.setItem("filteredMovies", sessionStorage.getItem("matchingMovies"));
  //filter the array
  //working vote_average array
  //let postFilterMovieArray = preFilterArray.filter(movie => movie.vote_average > 5 );



  // function titleFilter(listOfMovies){
  //   let sortedMovies = sortAlpha(listOfMovies);
  //    return sortedMovies;
  //    }
