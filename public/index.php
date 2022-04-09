<?php session_start(); ?>

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
  <link href="indexStyle.css" rel="stylesheet">
  <link rel="stylesheet" href="headerStyle.css">
  <script src="header.js"></script>



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
          'sm': {
            'max': '650px'
          },
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

  <!-- <div class="headerDiv">
  </div>
  <div class="smallMenu">
  </div> -->

  <div class="flex flex-col justify-center m-0 h-[100vh] items-center font-open" id="homePage">
    <?php include 'header.php';
    ?>
    <main class="container m-auto h-[75vh]">




      <?php

      if (isset($_SESSION['log']) && $_SESSION['log'] == 'in') {

        echo ' <div class="grid-container" class="pb-16"> <div class="item1">';
        echo  '<h1 style="font-weight:bold" >Hello ' . $_SESSION["firstname"] . '! </h1>';
        echo "<br>";
        echo '<div class="py-1 px-3 mb-3 ">
          <input type="text" id="homeSearchBox" class="search border rounded border-4 shadow-xl w-50 py-2 px-3 text-gray-700" placeholder="Find a movie..." list="filterList" />
          <datalist id="filterList"></datalist>
        </div>
        <div class="flex items-center justify-between mb-3 lg:justify-center">
          <button id="homeSearchButton" name="movieName" class="bg-gray-200 hover:bg-stone-800 text-black py-1 px-3 mr-3 lg:ml-2 rounded shadow-xl focus:outline-none focus:shadow-outline disabled:bg-stone-900 disabled:text-stone-600 disabled:cursor-default flex justify-center" type="button">
            Search
          </button>
          
        </div>
        <div id="noSearchMessage" class="hidden"> Enter something..Anything!</div>
        </div>';


        echo '<div class="item2" >';
        echo '<h2 class="shadow-2xl pt-10"> Your Info </h2>';
        echo '<h3 class="shadow-2xl pt-4">' . 'Name: ' . $_SESSION['firstname'] . " " . $_SESSION['lastname'] . '</h3>';
        echo '<h3 class="shadow-2xl pt-4" >' . 'Country: ' . $_SESSION['country'] . '</h3>';
        echo '<h3 class="shadow-2xl pt-4" >' . 'City: ' . $_SESSION['city'] . '</h3> </div>';




        echo '<div class="item3"> ';

        if (empty($_SESSION['favs'])) {
          echo "No Favourites Found";
        }

        if (count($_SESSION['favs']) > 0) {

          echo '<h3> Favourites </h3>';

          $activeMovieList = $_SESSION['favs'];
          echo '<div class="inline-flex flex-wrap pt-10 shadow-md " >';
          foreach ($activeMovieList as $key => $val) {

            echo '<a style="display:flex-auto"' . "href='single-movie.php?id=$key'>";
            echo '    <img src="https://image.tmdb.org/t/p/w200' .  $val['posterPath'] . '" alt="Movie Poster" style="width:125px;" class="px-1 shadow-2xl" />';
            echo "<a>";
          }
          echo "</div>";
        }




        echo '</div>';


        echo '<div class="item4">Suggestions</div>
           </div>';
      } else {

        echo '<div class="container bg-white rounded-3xl m-auto w-[40rem] text-center ">
          <!--goes down below-> action="single-movie.php" method="POST"  -->
  
          <form id="homeSearch" class="pt-3 pb-1 px-2">
  
            <div class="mb-3">
              <h1 class="text-silver text-6xl font-montser">Movie Browser</h1>
            </div>
            <div class="py-1 px-3 mb-3">
              <input type="text" id="homeSearchBox" class="search border rounded w-full py-2 px-3 text-gray-700 shadow-xl" placeholder="Find a movie..." list="filterList" />
              <datalist id="filterList"></datalist>
            </div>
            <div class="flex items-center justify-between mb-3 lg:justify-end">
              <button id="favouritesButton" class="bg-stone-600 hover:bg-stone-800 text-white font-bold py-2 px-4 ml-3 rounded focus:outline-none focus:shadow-outline disabled:bg-stone-900 disabled:text-stone-600 disabled:cursor-default shadow-xl" type="button">
                Login
              </button>
              <div id="noSearchMessage" class="hidden"> Enter something..Anything!</div>
              <button id="homeSearchButton" name="movieName" class="bg-stone-600 hover:bg-stone-800 text-white font-bold py-2 px-4 mr-3 lg:ml-2 rounded focus:outline-none focus:shadow-outline disabled:bg-stone-900 disabled:text-stone-600 disabled:cursor-default flex justify-center shadow-xl" type="button">
                Search
  
              </button>
            </div>
  
            <div class="text-white">
                <span style="color:gray">Dont have an account? <a href="register.php" class="text-blue-500 underline"> Register </a></span>
            </div>
  
          </form> ';
      }

      ?>








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

<script src="search.js"></script>
<script src="movieHelpers.js"></script>

</html>
