<?php
session_start();
$movieID = $_POST['movieID'];
$movieTitle = $_POST['movieTitle'];
$moviePosterPath = $_POST['posterPath'];
$location = $_POST['location'];
$removeAll = $_POST['removeAll'];


if ($removeAll == "true") {
  $_SESSION['favs'] = [];
} else {
  $movie[$movieID] = array(
    "title" => $movieTitle,
    "posterPath" => $moviePosterPath
  );
  if (isset($_SESSION['favs'])) {
    $listOfMovies =  $_SESSION['favs'];
    if (array_key_exists($movieID, $listOfMovies)) {
      unset($listOfMovies[$movieID]);
    } else {
      $listOfMovies[$movieID] = $movie[$movieID];
    }
    $_SESSION['favs'] = $listOfMovies;
  } else {
    $listOfMovies[$movieID] = $movie[$movieID];
    $_SESSION['favs'] = $listOfMovies;
  }
  // var_dump($_SESSION['favs']);
  // foreach ($_SESSION['favs'] as $key => $value) {
  //   var_dump($key);
  //   var_dump($value['title']);
  //   var_dump($value['posterPath']);
  // }
  // if (isset($_SESSION['favs'])) {
  //   echo " is set ";
  //   if (array_key_exists($movieID, $_SESSION['favs'])) {
  //     echo " is fav ";
  //   } else {
  //     echo " is not fav ";
  //   }
  // } else {
  //   echo " is not set ";
  // }
}
header("Location: $location");
