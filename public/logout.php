<?php
session_start();
$config = include_once "../config.php";
include "../database/Connection.php";
$user_email = $_SESSION["email"];
var_dump($user_email);
$favList = $_SESSION["favs"];
var_dump($favList);
$favList = json_encode($favList);
var_dump($favList);
$pdo2 = Connection::connect($config['database']);
$favListUpdateQuery = "REPLACE INTO favourites (user_email, favourites_list) VALUES ('$user_email', :favList)";
$favStatment = $pdo2->prepare($favListUpdateQuery);
$favStatment->execute(["favList" => $favList]);

$_SESSION['favs'] = [];


$_SESSION["log"] = 'out';
$_POST["email"] = "";
$_POST["password"] = "";

header("location:index.php");
