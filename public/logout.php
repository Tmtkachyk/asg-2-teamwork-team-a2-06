<?php
session_start();
$config = include_once "../config.php";
include "../database/Connection.php";
$user_email = $_SESSION["email"];
$favList = $_SESSION["favs"];
var_dump($favList);
$favList = json_encode($favList);
var_dump($favList);
$pdo2 = Connection::connect($config['database']);
$favListUpdateQuery = "REPLACE INTO favourites_list (user_email, favourites_list) VALUES ($user_email, "{"1789":{"title":"Alien","posterPath":"\/bk9GVjN4kxmGekswNigaa5YIdr5.jpg"}}")";
$favStatment = $pdo2->prepare($favListUpdateQuery);
$favStatment->execute();

$_SESSION['favs'] = [];


$_SESSION["log"] = 'out';
$_POST["email"] = "";
$_POST["password"] = "";

header("location:index.php");
