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
      let fullDate = theMovie.release_date;
      let split = fullDate.split('-');
      let justYear = split[0];


        document.querySelector("#defaultInfo").append(makeDiv(imageFrom(theMovie)));
        document.querySelector("#defaultInfo").append(makeDiv(titleFrom(theMovie)));
       document.querySelector("#defaultInfo").append(makeDiv(justYear));
       document.querySelector("#defaultInfo").append(makeDiv(theMovie.vote_average));
       //document.querySelector("#defaultInfo").append(makeDiv(theMovie.vote_average));
       //document.querySelector("#defaultInfo").append(makeFavButton(theMovie));
       
   
       // kind of a ghetto fix but it works -> this hides/unhide the favourtie button based on the login state in the Session varible 'Log' 

      if ( typeof(document.querySelector(".empty")) && document.querySelector(".empty") != null)
      {
          let favouriteButton = makeFavButton(theMovie);
          document.querySelector("#defaultInfo").append(makeDiv(favouriteButton));

         // document.querySelector(".empty").remove();
      }
      else{
        let favouriteButton = makeFavButton(theMovie);
        favouriteButton.style.display="none";
        document.querySelector("#defaultInfo").append(makeDiv(favouriteButton));

      }

        

     
     }
 
     function imageFrom(movie){
       let anchor = document.createElement("a");
       let img = document.createElement("img");
       img.setAttribute("data-type", "posterOrTitle");
       anchor.setAttribute("href", `single-movie.php?id=${movie.id}`);
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
       anchor.setAttribute("href", `single-movie.php?id=${movie.id}`);
       anchor.textContent = movie.title;
       return anchor;
     
     }
     function makeDiv(thing) {
       const div = document.createElement("div");
       div.append(thing);
       return div;
     }

     function makeFavButton(movie){
      let form = document.createElement("form");
      form.setAttribute("action", "favMovieHelper.php"); 
      form.setAttribute("method", "post");
      form.append(addInput("movieID",movie.id));
      form.append(addInput("movieTitle",movie.title));
      form.append(addInput("posterPath",movie.poster_path));
      form.append(addInput("location","browse-movies.php"));
      form.append(addInput("removeAll","false"));
      let but = document.createElement("button");
      but.setAttribute("data-id", movie.id);
      but.setAttribute("data-type", "favButton");
      but.append('\u2605'); 
      but.title = "Favourites"
      but.classList.add("text-[25px]", "focus:outline-none", "focus:shadow-outline");
      form.append(but);
      return form;
    }

    
        // <input type='hidden' id='movieID' name='movieID' value='<?= $key?>'>
        // /* <input type='hidden' id='movieTitle' name='movieTitle' value='<?=" . $val['title'] ."?>'>
        // <input type='hidden' id='posterPath' name='posterPath' value='<?=" . $val['posterPath'] . "?>'>
        // <input type='hidden' id='location' name='location' value='favourites.php'>
        // <input type='hidden' id='removeAll' name='removeAll' value='false'>
        // <button class='bg-yellow-600 hover:bg-yellow-700 text-black  font-bold py-2 px-4 my-2 lg:ml-2 rounded focus:outline-none focus:shadow-outline justify-self-auto' type='submit' id='unfav'>
        //     Unfavourite
        //   </button>
        // </form>"; */}
  
    function addInput(id,val){
      let input = document.createElement("input");
      input.setAttribute("type","hidden");
      input.setAttribute("id", id);
      input.setAttribute("name", id);
      input.setAttribute("value", val);
      return input;
    }
    function showNoResults() {
      document.querySelector("#noMovies").classList.remove("hidden");
    }
