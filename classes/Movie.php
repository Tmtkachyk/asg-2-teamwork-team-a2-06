<?php

class Movie
{

  public $id;
  public $title;
  public $release_date;
  public $revenue;
  public $runtime;
  public $tagline;
  public $popularity;
  public $vote_average;
  public $vote_count;
  public $overview;
  public $cast;
  public $crew;
  public $companies;
  public $countries;
  public $genres;
  public $keywords;
  public $poster_path;
  public $imdb_id;
  public $tmdb_id;

  public function __construct(
    $id,
    $title,
    $release_date,
    $revenue,
    $runtime,
    $tagline,
    $popularity,
    $vote_average,
    $vote_count,
    $overview,
    $castRaw,
    $crewRaw,
    $companiesRaw,
    $countriesRaw,
    $genresRaw,
    $keywordsRaw,
    $poster_path,
    $imdb_id,
    $tmdb_id
  ) {
    $cast = array();
    $crew = array();
    $companies = array();
    $countries = array();
    $genres = array();
    $keywords = array();
    $this->id = $id;
    $this->title = $title;
    $this->release_date = $release_date;
    $this->revenue = $revenue;
    $this->runtime = $runtime;
    $this->tagline = $tagline;
    $this->popularity = $popularity;
    $this->vote_average = $vote_average;
    $this->vote_count = $vote_count;
    $this->overview = $overview;

    $castRaw = json_decode($castRaw);
    foreach ($castRaw as $val) {
      $objVars = get_object_vars($val);
      $cast["$objVars[name]"] = "$objVars[character]";
    }
    $crewRaw = json_decode($crewRaw);
    $tempArray = array();
    foreach ($crewRaw as $val) {
      $objVars = get_object_vars($val);
      unset($tempArray);
      $tempArray[] = "$objVars[name]";
      array_push($tempArray, "$objVars[job]", "$objVars[department]");
      $crew[] = $tempArray;
    }
    $this->cast = $cast;
    $this->crew = $crew;

    $companiesRaw = json_decode($companiesRaw);
    foreach ($companiesRaw as $val) {
      $objVars = get_object_vars($val);
      array_push($companies, "$objVars[name]");
    }
    $countriesRaw = json_decode($countriesRaw);
    foreach ($countriesRaw as $val) {
      $objVars = get_object_vars($val);
      array_push($countries, "$objVars[name]");
    }
    $this->companies = $companies;
    $this->countries = $countries;
    $genresRaw = json_decode($genresRaw);
    foreach ($genresRaw as $val) {
      $objVars = get_object_vars($val);
      array_push($genres, "$objVars[name]");
    }
    $keywordsRaw = json_decode($keywordsRaw);
    foreach ($keywordsRaw as $val) {
      $objVars = get_object_vars($val);
      array_push($keywords, "$objVars[name]");
    }
    $this->genres = $genres;
    $this->keywords = $keywords;
    $this->poster_path = $poster_path;
    $this->imdb_id = $imdb_id;
    $this->tmdb_id = $tmdb_id;
  }

  public function getImgUrl($size)
  {
    $poster_path = $this->poster_path;
    return "https://image.tmdb.org/t/p/w$size/$poster_path";
  }



  



}
