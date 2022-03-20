//Adding functionallity to the Cast and Crew Buttons [Details.8/9]
//Additonally added colour changing to show which button is selected
document.querySelector("#castAndCrewButtons").addEventListener("click", function (e){
  const castInformation = document.querySelector("#castInfo");
  const crewInformation = document.querySelector("#crewInfo");
  const castButton = document.querySelector("#castButton");
  const crewButton = document.querySelector("#crewButton");

  if (e.target && e.target.id == "castButton"){
      crewInformation.classList.add("hidden");
      castInformation.classList.remove("hidden");
      castButton.classList.add("bg-neutral-700");
      castButton.classList.remove("bg-neutral-600");
      crewButton.classList.add("bg-neutral-600");
      crewButton.classList.remove("bg-neutral-700");

  }else if (e.target && e.target.id == "crewButton"){
      castInformation.classList.add("hidden");
      crewInformation.classList.remove("hidden");
      crewButton.classList.add("bg-neutral-700");
      crewButton.classList.remove("bg-neutral-600");
      castButton.classList.add("bg-neutral-600");
      castButton.classList.remove("bg-neutral-700");
  }
});

//When a user clicks on the header the details view is hidden and the home view is visable [Details.10]
document.querySelector("#detailsHeader").addEventListener("click", function (){
  showHomePage();
  document.querySelector("#homeSearchBox").value = "";
  document.querySelector("#homeSearchButton").disabled = true;
  document.querySelector("#favouritesButton").disabled = false;
});

//When a user clicks on the close button the details view is hidden and the default view is visable [Details.3]
document.querySelector("#closeButton").addEventListener("click", function(){
  showDefaultPage();
});

//[DETAILS.7] When a user clicks on the poster, a larger (w500 @ mobile L, w780 @ laptop L) version of the poster is displayed in a pop-up modal.
let detailsPoster = document.querySelector("#details-poster");
let posterModal = document.querySelector("#modal-bg");

detailsPoster.addEventListener('click', function() {
    posterModal.classList.remove('hidden');
    posterModal.classList.add('flex');
})

posterModal.addEventListener('click', function() {
  posterModal.classList.remove('flex');
  posterModal.classList.add('hidden');
})

function populateDetails(movieID) {
  clearDetails();
  //Finding the movie...
  let movieList = JSON.parse(sessionStorage.getItem("activeMovieList"));
  let movie = movieList.find(e => e.id == movieID);
  //Set title
  let titleDiv = document.createElement("h2");
  titleDiv.classList.add("text-2xl", "lg:text-4xl", "self-center", "text-center", "justify-center", "font-semibold", "p-1", "bg-black/80");
  titleDiv.textContent = movie.title;

  //TTS Button
  document.querySelector("#ttsButton").addEventListener("click", () => {
    let msg = new SpeechSynthesisUtterance(`${movie.title}`);
    speechSynthesis.speak(msg);
  });

  document.querySelector("#laptopPosterImg").srcset = `https://image.tmdb.org/t/p/w342/${movie.poster_path}`;
  document.querySelector("#mobilePosterImg").src = `https://image.tmdb.org/t/p/w185/${movie.poster_path}`;

  document.querySelector("#smallPosterDisplay").src = `https://image.tmdb.org/t/p/w500/${movie.poster_path}`;
  document.querySelector("#largePosterDisplay").src = `https://image.tmdb.org/t/p/w780/${movie.poster_path}`;

  document.querySelector("#movieHeaderSection").append(titleDiv);
  document.querySelector("#releaseDateSection").append(makeSpan(movie.release_date));
  document.querySelector("#revenueSection").append(makeSpan("$" + new Intl.NumberFormat().format(movie.revenue)));
  document.querySelector("#runtimeSection").append(makeSpan(movie.runtime + " min"));
  document.querySelector("#taglineSection").append(makeSpan(`"${movie.tagline}"`));
  document.querySelector("#popularitySection").append(makeSpan(movie.popularity));
  document.querySelector("#averageSection").append(makeSpan(movie.vote_average));
  document.querySelector("#countSection").append(makeSpan(new Intl.NumberFormat().format(movie.count)));

  document.querySelector("#imdbLink").href = `https://www.imdb.com/title/${movie.imdb_id}`;
  document.querySelector("#tmdbLink").href = `https://www.themoviedb.org/collection/${movieID}`;

  document.querySelector("#castNameSection").append(makeNameList(movie.cast));
  document.querySelector("#castCharacterSection").append(makeCharacterList(movie.cast));
  document.querySelector("#crewDepartmentSection").append(makeDepartList(movie.crew));
  document.querySelector("#crewJobSection").append(makeJobList(movie.crew));
  document.querySelector("#crewNameSection").append(makeNameList(movie.crew));

  document.querySelector("#lapTopOverviewSection").textContent = movie.overview;
  document.querySelector("#mobileOverviewSection").textcontent = movie.overview;

  document.querySelector("#companySection").append(makeCompaniesList(movie.companies));
  document.querySelector("#countriesSection").append(makeCountriesList(movie.countries));
  
  document.querySelector("#genreSection").append(makeTagList(movie.genres));
  document.querySelector("#keywordsSection").append(makeTagList(movie.keywords));
}

function makeSpan(attribute) {
  let span = document.createElement("span");
  span.classList.add("lg:text-2xl", "float-right", "text-neutral-300");
  span.textContent = `${attribute}`;
  return span;
}

function makeNameList(people) {
  let divList = document.createElement("div");
  people.forEach(function(person) {
    let div = document.createElement("div");

    if (person.name.length > 20) {
      div.textContent = `${person.name.substring(0, 20)}...`;
      div.title = person.name;
    } else {
      div.textContent = person.name;
    }
    divList.append(div);
  })
  return divList;
}

function makeCharacterList(people) {
  let divList = document.createElement("div");

  people.forEach(function(person) {
    let div = document.createElement("div");
    div.textContent = person.character;
    divList.append(div);
  })
  return divList;
}

function makeDepartList(people) {
  let divList = document.createElement("div");

  people.forEach(function(person) {
    let div = document.createElement("div");
    div.textContent = person.department;
    divList.append(div);
  })
  return divList;
}

function makeJobList(people) {
  let divList = document.createElement("div");

  people.forEach(function(person) {
    let div = document.createElement("div");

    if (person.job.length > 20) {
      div.textContent = `${person.job.substring(0, 20)}...`;
      div.title = person.job;
    } else {
      div.textContent = person.job;
    }
    divList.append(div);
  })
  return divList;
}

function makeCompaniesList(companies) {
  let pList = document.createElement("div");
  
  companies.forEach(function(company) {
    let p = document.createElement("p");
    p.textContent = company.name;
    p.classList.add("ml-4", "mr-2", "font-normal");
    pList.append(document.createElement("hr"));
    pList.append(p);
  })
return pList;
}

function makeCountriesList(countries) {
  let pList = document.createElement("div");
  
  countries.forEach(function(country) {
    let p = document.createElement("p");
    p.textContent = country.name;
    p.classList.add("ml-4", "mr-2", "font-normal");
    pList.append(document.createElement("hr"));
    pList.append(p);
  })
return pList;
}

function makeTagList(array) {
  console.log(array);
  let pList = document.createElement("div");

  array.forEach(function(word) {
    let span = document.createElement("span");
    span.textContent = word.name;
    span.classList.add("ml-2", "bg-neutral-400", "rounded", "p-1", "hover:cursor-pointer", "inline-flex", "m-1");
    pList.append(span);
  })
  return pList;
}

function clearDetails() {
  document.querySelector("#movieHeaderSection").replaceChildren();
  document.querySelector("#releaseDateSection").replaceChildren();
  document.querySelector("#revenueSection").replaceChildren();
  document.querySelector("#runtimeSection").replaceChildren();
  document.querySelector("#taglineSection").replaceChildren();
  document.querySelector("#popularitySection").replaceChildren();
  document.querySelector("#averageSection").replaceChildren();
  document.querySelector("#countSection").replaceChildren();

  document.querySelector("#castNameSection").replaceChildren();
  document.querySelector("#castCharacterSection").replaceChildren();
  document.querySelector("#crewDepartmentSection").replaceChildren();
  document.querySelector("#crewJobSection").replaceChildren();
  document.querySelector("#crewNameSection").replaceChildren();

  document.querySelector("#companySection").replaceChildren();
  document.querySelector("#countriesSection").replaceChildren();

  document.querySelector("#genreSection").replaceChildren();
  document.querySelector("#keywordsSection").replaceChildren();
}
