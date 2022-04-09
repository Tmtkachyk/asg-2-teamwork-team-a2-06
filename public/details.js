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
