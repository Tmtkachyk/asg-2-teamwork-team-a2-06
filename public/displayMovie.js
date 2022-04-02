document.addEventListener("DOMContentLoaded", (event) => {
  displayMatchingMovies();
});

 function displayMatchingMovies(){
      
  let listOfMovies = JSON.parse(sessionStorage.getItem("matchingMovies"));

  if (listOfMovies.length == 0) {
    //showNoResults();
    document.querySelector("#noMovies").classList.remove("hidden");
  }else {
    listOfMovies.forEach(movie =>{
      populateDefault(movie);
      });
  }

     }
 
 
     function populateDefault(theMovie){
 
        document.querySelector("#defaultInfo").append(makeDiv(imageFrom(theMovie)));
        document.querySelector("#defaultInfo").append(makeDiv(titleFrom(theMovie)));
       document.querySelector("#defaultInfo").append(makeDiv(theMovie.release_date));
       document.querySelector("#defaultInfo").append(makeDiv(theMovie.vote_average));
   
       
   

      if ( typeof(document.querySelector(".empty")) && document.querySelector(".empty") != null)
      {
          let favouriteButton = makeFavButton(theMovie);
          document.querySelector("#defaultInfo").append(makeDiv(favouriteButton));

         // document.querySelector(".empty").remove();
      }

        

     
     }
 
     function imageFrom(movie){
       let anchor = document.createElement("a");
       let img = document.createElement("img");
       img.setAttribute("data-type", "posterOrTitle");
       anchor.setAttribute("href", "#");
       img.alt = "No Image Found!";
       img.src = `https://image.tmdb.org/t/p/w92/${movie.poster_path}`;
       img.setAttribute("data-id",movie.id);
       anchor.append(img);
       return anchor;
     }
     function titleFrom(movie){
       let anchor = document.createElement("a");
       anchor.setAttribute("data-id", movie.id);
       anchor.setAttribute("data-type", "posterOrTitle");
       anchor.setAttribute("href", "#");
       anchor.textContent = movie.title;
       return anchor;
     
     }
     function makeDiv(thing) {
       const div = document.createElement("div");
       div.append(thing);
       return div;
     }

     function makeFavButton(movie){
      let but = document.createElement("button");
      but.setAttribute("data-id", movie.id);
      but.setAttribute("data-type", "favButton");
      but.append('\u2605'); 
      but.title = "Favourite"
      but.classList.add("text-[25px]", "focus:outline-none", "focus:shadow-outline");
      return but;
    }

    function showNoResults() {
      document.querySelector("#noMovies").classList.remove("hidden");
    }