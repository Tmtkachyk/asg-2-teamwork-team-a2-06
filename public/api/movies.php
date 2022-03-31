<?php
$config = include "../../config.php";
include "../../database/Connection.php";
include "../../classes/Movie.php";
include "queryHelper.php";

if (!validTitleQuery()) {
  return [];
} else {

  $titleQuery = $_GET["title"];
  //echo $titleQuery;
  //$id = 170;
  $rawMovieDetails =
    "
SELECT
id as id,
title as title,
release_date as release_date,
revenue as revenue,
runtime as runtime,
tagline as tagline,
popularity as popularity,
vote_average as vote_average,
vote_count as vote_count,
overview as overview,
cast as cast,
crew as crew,
production_companies as companies,
production_countries as countries,
genres as genres,
keywords as keywords,
poster_path as poster_path,
imdb_id as imdb_id,
tmdb_id as tmdb_id
FROM
  movie
WHERE
  movie.title LIKE '%$titleStuff%'
";
  $pdo = Connection::connect($config['database']);
  $statement = $pdo->prepare($rawMovieDetails);
  $statement->execute();


  echo json_encode($statement->fetchAll(PDO::FETCH_ASSOC));
  // $results = $statement->fetchAll(PDO::FETCH_OBJ);
  // $arrayOfMovies = array();
  // foreach ($results as $movieObj) {
  //   $movie = new Movie(
  //     $movieObj->id,
  //     $movieObj->title,
  //     $movieObj->release_date,
  //     $movieObj->revenue,
  //     $movieObj->runtime,
  //     $movieObj->tagline,
  //     $movieObj->popularity,
  //     $movieObj->vote_average,
  //     $movieObj->vote_count,
  //     $movieObj->overview,
  //     $movieObj->cast,
  //     $movieObj->crew,
  //     $movieObj->companies,
  //     $movieObj->countries,
  //     $movieObj->genres,
  //     $movieObj->keywords,
  //     $movieObj->poster_path,
  //     $movieObj->imdb_id,
  //     $movieObj->tmdb_id
  //   );
  //   array_push($arrayOfMovies, $movie);
  // }

  // foreach ($arrayOfMovies as $movie) {
  //   echo "MOVIE: <br>";
  //   echo "$movie->title";
  //   echo "<br>";
  // }

  // var_dump(json_encode($arrayOfMovies));
  // return json_encode($arrayOfMovies);
}
