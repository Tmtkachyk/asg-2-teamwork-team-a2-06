<?php
$config = include "../../config.php";
include "../../database/Connection.php";
// include "../../classes/Movie.php";
include "queryHelper.php";

if (!validTitleQuery()) {
  echo "bad query";
  return [];
} else {

  $titleSearch = $_GET["title"];
  echo "This is the query string $titleSearch";

  //echo $titleQuery;
  //$id = 170;
  $rawMovieDetails =
    "
SELECT
id ,
title ,
release_date,
revenue,
runtime,
tagline,
popularity,
vote_average,
vote_count,
overview,
cast,
crew,
production_companies as companies,
production_countries as countries,
genres,
keywords,
poster_path,
imdb_id,
tmdb_id
FROM
  movie
WHERE
  movie.title LIKE :title
";
  $pdo = Connection::connect($config['database']);
  $statement = $pdo->prepare($rawMovieDetails);
  $titleQuery = "%$titleSearch%";
  $statement->execute(["title" => $titleQuery]);


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
