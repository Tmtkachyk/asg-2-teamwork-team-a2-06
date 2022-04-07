<?php
#add log in check
#add pulling from session storage

$movieID = 170;
$title = "Mad Max 2: The Road Warrior";
$posterpath = "/cjh3bj1tc49RZcQwDPJtNHsdvHq.jpg";
$movie[$movieID] = array(
  "title" => $title,
  "posterPath" => $posterpath
);
$moviesList[$movieID] = $movie[$movieID];
$movieID2 = 2;
$title2 = "The Princess Diaries 2: Royal Engagement";
$posterpath2 = "/9GkLjwvqjwDfLZkWLGjLLfQf2Be.jpg";
$movie[$movieID2] = array(
  "title" => $title2,
  "posterPath" => $posterpath2
);
$moviesList[$movieID2] = $movie[$movieID2];
$movieID3 = 11;
$title3 = "Rocky";
$posterpath3 = "/eeUqKTX0YYw3T53rjYQMKOwf0TF.jpg";
$movie[$movieID3] = array(
  "title" => $title3,
  "posterPath" => $posterpath3
);
$moviesList[$movieID3] = $movie[$movieID3];

$_SESSION["fav"] = $moviesList;


// if(!array_key_exists($keyToAdd,$_SESSION['favs']){

// }

// $_SESSION["faves"] = $moviesList;




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


  <div class="flex flex-col justify-center m-0 h-[100vh] items-center font-open" id="homePage">
    <?php include 'header.php';
    ?>
    <main class="container m-auto h-[75vh]">
      <div class="flex justify-center">
        <?php
        $activeMovieList = $_SESSION["fav"];
        foreach ($activeMovieList as $key => $val) {
          echo "<div>";
          echo "<p class='text-lg font-semibold'>" . $val['title'] . "</p>";
          echo "<img src='https://image.tmdb.org/t/p/w342" .  $val['posterPath'] . "' alt='Movie Poster' />";
          echo "</div>";
        }
        ?>
      </div>
    </main>
  </div>
</body>
<script src="search.js"></script>
<script src="movieHelpers.js"></script>

</html>
