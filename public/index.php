<?php
//this is a comment
function makeh1()
{
  return "<h1>It's alive</h1>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- <meta name="Author" content="" /> -->
  <title>HomePage</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;1,300;1,400&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="headerStyle.css">
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
          sm: "425px",
          md: "768px",
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



<body class="bg-image-1 transition-all ease-linear duration-[3000ms] bg-cover bg-center bg-fixed">



  <div class="flex flex-col justify-center m-0 h-[100vh] items-center font-open" id="homePage">
    <?php include 'header.php'; ?>
    <main class="container m-auto h-[75vh]">

      <div class="container bg-black/80 rounded-3xl m-auto w-[40rem] text-center ">
        <form id="homeSearch" class="pt-3 pb-1 px-2">
          <div class="mb-3">
            <h1 class="text-white text-6xl font-montser">Movie Browser</h1>
          </div>
          <div class="py-1 px-3 mb-3">
            <input type="text" id="homeSearchBox" class="search border rounded w-full py-2 px-3 text-gray-700" placeholder="Find a movie..." list="filterList" />
            <datalist id="filterList"></datalist>
          </div>
          <div class="flex items-center justify-between mb-3 lg:justify-end">
            <button id="favouritesButton" class="bg-stone-600 hover:bg-stone-800 text-white font-bold py-2 px-4 ml-3 rounded focus:outline-none focus:shadow-outline disabled:bg-stone-900 disabled:text-stone-600 disabled:cursor-default" type="button">
              Login
            </button>
            <button id="homeSearchButton" class="bg-stone-600 hover:bg-stone-800 text-white font-bold py-2 px-4 mr-3 lg:ml-2 rounded focus:outline-none focus:shadow-outline disabled:bg-stone-900 disabled:text-stone-600 disabled:cursor-default flex justify-center" type="button">
              Search

              <!-- <svg class="animate-spin ml-1 mt-1 h-5 w-5 text-white hidden" xmlns="http://www.w3.org/2000/svg" id="loadingAnimation" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
              </svg> -->

            </button>
          </div>
          <div class="text-white">
            <span class="">Don't have an acocunt? <a href="#" class="text-blue-500 underline"> Register </a></span>
          </div>
        </form>
      </div>
      <div class="flex justify-center font-montser">
        <p id="image-2-credits" class="text-white/60 fixed bottom-0 content-center hidden">
          Image Credits: James Cameron (Director), 1997,
          <span class="italic"> "Titanic"</span>
        </p>

        <p id="image-1-credits" class="text-white/60 fixed bottom-0 content-center">
          Image Credits: Denis Villeneuve (Director), 2017,
          <span class="italic"> "Blade Runner 2049"</span>
        </p>

        <p id="image-3-credits" class="text-white/60 fixed bottom-0 content-center hidden">
          Image Credits: Christopher Nolan (Director), 2014,
          <span class="italic"> "Interstellar"</span>
        </p>

        <p id="image-4-credits" class="text-white/60 fixed bottom-0 content-center hidden">
          Image Credits: Todd Phillips (Director), 2019,
          <span class="italic"> "Joker"</span>
        </p>

        <p id="image-5-credits" class="text-white/60 fixed bottom-0 content-center hidden">
          Image Credits: Ridley Scott (Director), 1979,
          <span class="italic"> "Alien"</span>
        </p>
      </div>
    </main>
  </div>
</body>

</html>
