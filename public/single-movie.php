<?php
include 'all-movie-ids.php';
include 'mad-max.php';
// var_dump($allIds);
// var_dump($_GET);

if (isset($_GET["id"])) {
  $id = $_GET["id"];

  if (!in_array($id, $allIds)) {
    header("Location: error.php");
  }
} else {
  header("Location: error.php");
}

// elseif (is_numeric($id) == true) {
//   header("Location: error.php");}


$title = $madMax["title"];
$posterPath = $madMax["poster_path"];
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="headerStyle.css">
  <script src="header.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;1,300;1,400&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
  <script>
    tailwind.config = {
      theme: {
        backgroundImage: {
          "image-1": "url('../images/2049SS.jpg')",
          "image-2": "url('../images/titanicSS.jpg')",
          "image-3": "url('../images/interstellarSS.jpg')",
          "image-4": "url('../images/jokerSS.jpg')",
          "image-5": "url('../images/alienSS.png')",
        },

        fontFamily: {
          Times: ["Times New Roman", "sans-serif"],
          Arial: ["Arial", "sans-serif"],
          open: ["Open Sans", "serif"],
          source: ["Source Sans Pro", "sans-serif"],
          montser: ["Montserrat", "serif"],
        },
        screens: {
          // sm: "425px",
          'sm': {
            'max': '650px'
          },
          md: "500px",
          lg: "1440px",
          // maxSC: {
          //   max: "426px"
          // },
        },

        extend: {},
      },
      height: {
        128: "32rem",
      },
      plugins: [],
    };
  </script>

</head>



<body class="bg-image-1 transition-all ease-linear duration-[3000ms] bg-cover bg-center bg-fixed bg-gray-400">

  <div class="flex flex-col justify-center m-0 h-[100vh] items-center font-open min-h-400px">


    <?php include 'header.php';
    ?>

    <div class="container m-auto h-[75vh] w-10/12">

      <div class="bg-neutral-900/50 text-white font-open" id="detailsPage">
        <div class="flex justify-center">
          <div class="grid lg:grid-cols-3 gap-2 lg:gap-3">

            <div class="mx-2">
              <div class="flex justify-center">
                <button class="lg:text-2x text-white bg-neutral-600 hover:bg-neutral-700 font-bold py-2 px-4 my-2 lg:ml-2 rounded focus:outline-none focus:shadow-outline" type="submit" id="closeButton">
                  Favourite
                </button>
              </div>

              <picture id="details-poster" class="flex justify-center cursor-pointer">
                <source id="laptopPosterImg" media="(min-width: 1440px)" srcset="
                  https://image.tmdb.org/t/p/w342<?= $posterPath ?>
                " />
                <img id="mobilePosterImg" src="https://image.tmdb.org/t/p/w185<?= $posterPath ?>" alt="poster" />
              </picture>
            </div>

            <div id="modal-bg" class="fixed top-0 left-0 w-full h-full justify-center items-center bg-stone-900/50 hidden">
              <div id="modal" class="flex place-content-around items-center flex-col">
                <img id="smallPosterDisplay" class="fixed justify-center lg:invisible" src="#" alt="Movie Poster" />
                <img id="largePosterDisplay" class="fixed justify-center sm:invisible md:invisible lg:visible" src="#" alt="Movie Poster" />
              </div>
            </div>

            <div class="bg-black/80">
              <div class="mx-2 flex justify-center">


                <div id="movieHeaderSection">
                  <h2 class="text-2xl lg:text-4xl self-center text-center justify-center font-semibold p-1">
                    <?= $title ?>
                  </h2>
                </div>
              </div>

              <div class="p-1">
                <span class="text-lg lg:text-2xl"> Release Date: </span>

                <span id="releaseDateSection" class="lg:text-2xl float-right text-neutral-300">2005-11-04</span>
                <br />

                <span class="text-lg lg:text-2xl"> Revenue: </span>
                <span id="revenueSection" class="lg:text-2xl float-right text-neutral-300">$97,076,152</span>
                <br />

                <span class="text-lg lg:text-2xl"> Runtime: </span>
                <span id="runtimeSection" class="lg:text-2xl float-right text-neutral-300">123 min</span>
                <br />

                <span class="text-lg lg:text-2xl">Tagline: </span>
                <span id="taglineSection" class="lg:text-2xl float-right text-neutral-300 font-light italic">"Welcome to the suck"</span>
                <br />

                <hr class="p-1" />
                <div>
                  <span class="text-lg lg:text-2xl">Popularity:</span>
                  <span id="popularitySection" class="lg:text-2xl float-right text-neutral-300">35.713
                  </span>
                  <br />

                  <span class="text-lg lg:text-2xl">Average: </span>

                  <span id="averageSection" class="lg:text-2xl float-right text-neutral-300">
                    6.6
                  </span>

                  <br />
                  <span class="text-lg lg:text-2xl"> Count: </span>

                  <span id="countSection" class="lg:text-2xl float-right text-neutral-300">2190</span>
                </div>

                <div class="text-blue-500 font-semibold text-lg lg:text-2xl">
                  <a id="imdbLink" href="" target="_blank">IMDB Link</a>
                  <a id="tmdbLink" class="float-right" href="" target="_blank">TMDB Link</a>
                </div>

                <hr class="p-1" />

                <div class="maxSC:hidden mx-2 lg:mx-0">
                  <h2 class="text-lg lg:text-3xl">Overview:</h2>
                  <p id="lapTopOverviewSection" class="text-xs ml-4 mr-1 lg:text-2xl font-source"></p>
                </div>
              </div>
            </div>

            <div class="pr-2">
              <div class="flex justify-left" id="castAndCrewButtons">
                <button class="bg-neutral-600 text-white font-bold py-2 px-4 mr-0.5 rounded-t-lg" type="submit" id="castButton">
                  Cast
                </button>
                <button class="bg-neutral-700 text-white font-bold py-2 px-4 ml-0.5 rounded-t-lg" type="submit" id="crewButton">
                  Crew
                </button>
              </div>
              <div class="grid grid-cols-6 font-source bg-black/80 justify-items-center overflow-y-auto h-60 lg:h-[40rem]" id="castInfo">
                <div class="col-span-3">
                  <h2 class="underline underline-offset-2 text-2xl mb-4">
                    Actor
                  </h2>
                  <div class="text-s" id="castNameSection">
                    <p>Staff Sgt. Sykes</p>
                  </div>
                </div>
                <div class="col-span-3">
                  <h2 class="underline underline-offset-2 text-2xl mb-4">
                    Character
                  </h2>
                  <div class="text-s" id="castCharacterSection">
                    <p>Staff Sgt. Sykes</p>
                  </div>
                </div>
              </div>
              <div class="grid grid-cols-6 font-source bg-black/80 justify-items-center overflow-y-auto h-60 lg:h-[40rem] hidden" id="crewInfo">
                <div class="col-span-2">
                  <h2 class="underline underline-offset-2 grid justify-items-center">
                    Department
                  </h2>
                  <div class="text-xs" id="crewDepartmentSection">
                    <p>Staff Sgt. Sykes</p>
                  </div>
                </div>
                <div class="col-span-2">
                  <h2 class="underline underline-offset-2">Job</h2>
                  <div class="text-xs" id="crewJobSection">
                    <p>Staff Sgt. Sykes</p>
                  </div>
                </div>
                <div class="col-span-2">
                  <h2 class="underline underline-offset-2">Name</h2>
                  <div class="text-xs" id="crewNameSection">
                    <p>Staff Sgt. Sykes</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="lg:hidden mx-2">
              <h2 class="text-lg">Overview:</h2>
              <p id="mobileOverviewSection" class="ml-4 mr-2"></p>
            </div>

            <div class="lg:col-span-3 p-2 lg:flex lg:">
              <div class="lg:grid lg:grid-cols-6 bg-black/80">
                <div class="font-semibold font-lg ml-1 lg:text-xl">
                  Companies
                  <div id="companySection">
                    <p class="ml-4 mr-2">Red Wagon Entertainment</p>
                  </div>
                </div>

                <div>
                  <div class="font-semibold font-lg ml-1 lg:text-xl">
                    Countries
                    <div id="countriesSection">
                      <p class="ml-4 mr-2">Germany</p>
                    </div>
                  </div>
                </div>
                <div>
                  <p class="font-semibold font-lg ml-1 lg:text-xl">Genres</p>
                  <div class="font-semibold text-neutral-800 p-1" id="genreSection">
                    <p class="ml-2 bg-neutral-800 rounded p-1 hover:cursor-pointer inline-flex m-1">
                      Drama
                    </p>
                  </div>
                </div>

                <div class="lg:col-span-3">
                  <p class="font-semibold font-lg ml-1 lg:text-xl">Keywords</p>
                  <div class="font-semibold text-neutral-800 p-1" id="keywordsSection">
                    <span class="ml-2 bg-neutral-800 rounded p-1 hover:cursor-pointer inline-flex m-1">Desert storm</span>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

        <script src="/JavaScript/details.js"></script>
</body>

</html>
