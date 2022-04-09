let faveButton = document.querySelector("#favouritesButton");
let searchButton = document.querySelector("#homeSearchButton")
let homeSearchBox = document.querySelector("#homeSearchBox");

window.addEventListener("load", () => {
   searchButton.value = "";
   
  clearEverything();
});


//Enter key to search
// homeSearchBox.addEventListener("keyup", function(event) {
//   if (event.keyCode == 13) {
//     if(homeSearchBox != ""){
//     let userSearch = homeSearchBox.value;
//     fetchingMatchingMovies(userSearch);
//     }
//   }
// });

//[HOME.4] A user should not be allowed to search for a title when the title search box is empty.
// homeSearchBox.addEventListener("input", () => {
//   if (homeSearchBox.value == "") {
//     searchButton.disabled = true;
//   } else {
//     searchButton.disabled = false;
// }
// });

// searchButton.addEventListener("click", () => {
// let userSearch = homeSearchBox.value;
// fetchingMatchingMovies(userSearch);

// });



//A user should not be allowed to search for a title when the title search box is empty.
// homeSearchBox.addEventListener("input", () => {
//   if (homeSearchBox.value == "") {
//     // searchButton.disabled = true;
//     // console.log("empty");
//     return;
//   } else {
//   //Search movie through click
// searchButton.addEventListener("click", () => {
//   let userSearch = homeSearchBox.value;
//   fetchingMatchingMovies(userSearch);
//   })
// }
// });

// window.addEventListener('keyup', function(event) {
//   if (event.keyCode == 13) {
//     alert('enter was pressed!');
//     let userSearch = homeSearchBox.value;
//   }
// });


searchButton.onclick = function(event) {
    if (homeSearchBox.value == "") {
      document.querySelector("#noSearchMessage").classList.remove("hidden");
  } else {
    document.querySelector("#noSearchMessage").classList.add("hidden");
    let userSearch = homeSearchBox.value;
    fetchingMatchingMovies(userSearch);
  }
}

//search when user hits enter
  window.addEventListener("keyup", function(event) {
    if (event.keyCode == 13) {
      event.preventDefault();
      searchButton.click();

      }
  });

 
     //Clear session and local
     function clearEverything(){
      sessionStorage.clear();
      localStorage.clear();
      
    }
