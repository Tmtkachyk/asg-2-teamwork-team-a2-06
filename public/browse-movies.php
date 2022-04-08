<?php
session_start();
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
  <script src="displayMovie.js"></script>
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

  <?php

  if (isset($_SESSION['log']) && $_SESSION['log'] == 'in') {
    echo '<div class="empty" style="display:none;"> </div>';
  }

  ?>

  <div class="flex flex-col justify-center m-0 h-[100vh] items-center font-open min-h-400px">


    <?php include 'header.php';
    ?>

    <div class=" w-10/12 h-[75vh]">

      <div class="min-h-screen grid place-items-center font-open" id="defaultPage">
        <div class="grid grid-cols-9 m-1 rounded-lg gap-1 ">
          <form id="filterForm" class="bg-black/80 text-white col-span-3  w-auto">
            <h2 class="text-xl font-semibold m-1">Movie Filters</h2>
            <div class="m-3 h-32" id="movieFilters">
              <h2 class="text-lg">Title</h2>
              <input id="radioTitle" type="radio" name="filterRadioBtns" value="1" />
              <label for="radioTitle">Contains</label> <br />
              <input id="titleFilter" for="radioTitle" type="text" title="title" class="border rounded w-28 text-black" placeholder="Jarhead" /><br />
              <!-- Year filter -->
              <p class="text-lg">Year</p>
              <!-- Year radioBefore -->
              <input id="radioBefore" type="radio" name="filterRadioBtns" value="1" />
              <label for="radioBefore">Before</label> <br />
              <!-- Year textBefore -->
              <input id="beforeFilter" type="text" title="year" class="w-28 border rounded text-black" placeholder="2000" /><br />
              <!-- Year radioAfter -->
              <input id="radioAfter" type="radio" name="filterRadioBtns" value="2" />
              <label for="radioAfter">After</label> <br />
              <!-- Year textAfter -->
              <input id="afterFilter" type="text" title="year" class="border rounded w-28 text-black" placeholder="1980" /><br />
              <!-- Year radioBetween-->
              <input id="radioBetween" type="radio" name="filterRadioBtns" value="3" />
              <label for="radioBetween">Between</label> <br />
              <!-- Year textBetween Lower -->
              <input id="betweenFilterLowerBounds" type="text" title="year" class="border rounded my-1 w-28 text-black" placeholder="1985" /><br />
              <!-- Year textBetween Higher -->
              <input id="betweenFilterHigherBounds" type="text" title="year" class="border rounded w-28 text-black" placeholder="2000" />
              <br />
              <!-- rating input -->
              <p class="text-lg">Rating</p>

              <datalist id="steplist">
                <br />
                <option value="0" label="0">0</option>
                <option value="1"></option>
                <option value="2"></option>
                <option value="3"></option>
                <option value="4"></option>
                <option value="5" label="5">5</option>
                <option value="6"></option>
                <option value="7"></option>
                <option value="8"></option>
                <option value="9"></option>
                <option value="10" label="10"></option>
              </datalist>

              <!-- radio above -->
              <input type="radio" name="filterRadioBtns" value="ratingAfterButton" id="radioAbove" />
              <label for="radioAbove">Above: </label> <span id="aboveValue">5</span> <br />
              <span id="aboveValue">1</span>
              <input type="range" title="range" id="aboveRating" class="form-range bg-transparent w-28 focus:outline-none focus:ring-0 focus:shadow-none" min="0" max="10" list="steplist" />
              <span>10</span>
              <br />
              <!-- radio below -->
              <input id="radioBelow" type="radio" name="filterRadioBtns" value="ratingBeforeButton" />
              <label for="radioBelow">Below: </label> <span id="belowValue">5</span><br />
              <span>1</span>
              <input type="range" name="filterRadioBtns" id="belowRating" class="form-range w-28 bg-transparent focus:outline-none focus:ring-0 focus:shadow-none" min="0" max="10" list="steplist" /><span>10</span>
              <br />
              <!-- Inbetween radio -->
              <input type="radio" name="filterRadioBtns" value="ratingInBetweenButton" id="radioInbetween" />
              <label for="radioInbetween">Inbetween: </label>
              <span id="lowerBoundsValue">5 </span> & <span id="upperBoundsValue">5</span><br />
              <span>1</span>
              <input type="range" title="range" id="betweenRatingLowerBounds" class="form-range w-28 bg-transparent focus:outline-none focus:ring-0 focus:shadow-none" min="0" max="10" list="steplist" />
              <span>10</span> <br />
              <span>1</span>
              <input type="range" title="range" id="betweenRatingHigherBounds" class="form-range w-28 bg-transparent focus:outline-none focus:ring-0 focus:shadow-none" min="0" max="10" list="steplist" />
              <span>10</span><br />
              <!-- buttons -->
              <div class="m-2">
                <div class="flex justify-evenly">
                  <button id="filterButton" class="bg-stone-500 hover:bg-stone-800 text-white font-bold rounded focus:outline-none focus:shadow-outline m-1 p-1 disabled:bg-stone-900 disabled:text-stone-600 disabled:cursor-default" type="button">
                    Filter
                  </button>
                  <button id="resetButton" class="bg-stone-500 hover:bg-stone-800 text-white font-bold rounded focus:outline-none focus:shadow-outline m-1 p-1" type="button">
                    Reset
                  </button>
                  <br />
                </div>
                <div class="flex justify-evenly">
                  <button id="hideFilterButton" class="bg-stone-500 hover:bg-stone-800 text-white font-bold rounded justify-self-center focus:outline-none focus:shadow-outline m-1 p-1" type="button">
                    Hide Filters
                  </button>
                </div>
              </div>
            </div>
          </form>

          <div class="col-span-6 overflow-auto bg-black/80 text-white font-source w-auto">
            <div id="moviesList" class="m-1">
              <h2 class="text-xl font-semibold">Results</h2>

              <div class="grid grid-cols-5 gap-2 h-[37em]">
                <div class="text-lg">Sort by:</div>
                <div class="grid grid-cols-8 col-span-4 justify-items-start" id="sortButtons">
                  <div class="col-span-2">

                    <p class="text-lg underline" id="titleSort">
                      Title
                    </p>
                    <a href="#" id="titleSortUp"> &#8657 </a>
                    <a href="#" id="titleSortDown"> &#8659 </a>
                  </div>
                  <div class="col-span-2">
                    <p class="text-lg underline" id="yearSort">Year</p>
                    <a href="#" id="yearSortUp"> &#8657 </a>
                    <a href="#" id="yearSortDown"> &#8659 </a>
                  </div>
                  <div class="col-span-2">
                    <p class="text-lg underline" id="ratingSort">Rating</p>
                    <a href="#" id="ratingSortUp"> &#8657 </a>
                    <a href="#" id="ratingSortDown"> &#8659 </a>
                  </div>
                </div>

                <div class="col-span-5">
                  <div class="grid grid-cols-5 gap-2" id="defaultInfo"></div>
                </div>

                <div class="col-span-5 flex justify-center font-montser text-5xl hidden" id="noResultsFilter">
                  No Filtered Movies
                </div>
                <div class="col-span-5 flex justify-center font-montser text-5xl hidden" id="noMovies">
                  No Movies Found
                </div>
                <div class="col-span-5 flex justify-center text-5xl font-montser hidden" id="noFavourites">
                  No Favourites Found
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</body>

<script src="movieHelpers.js"></script>
<script src="browseHelper.js"></script>

</html>
