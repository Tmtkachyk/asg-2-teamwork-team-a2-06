<?php

session_start();
$config = include_once "../config.php";
include "../database/Connection.php";



$password = "";
$id = "";
$quote = '"';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $quote . sanitizeEmailInput($_POST['email']) . $quote;
  $password = $_POST["password"];
  // echo $email;
  validateLogin($email, $password, $config);
}




function validateLogin($email, $password, $config)
{
  $pdo = Connection::connect($config['database']);
  $emailPasswordSQL = "SELECT email, password, firstname, lastname, city, country FROM users WHERE email=$email";
  $userStatement = $pdo->prepare($emailPasswordSQL);
  $userStatement->execute();
  $queryResult = $userStatement->fetchAll(PDO::FETCH_ASSOC);


  // var_dump($queryResult);



  // checking if there's a result then validating the password 
  if ($userStatement->rowCount()) {
    foreach ($queryResult as $oneRow) {

      if (password_verify($password, $oneRow['password'])) {
        $_SESSION['log'] = 'in';
        $_SESSION['firstname'] = $queryResult[0]['firstname'];
        $_SESSION['lastname'] = $queryResult[0]['lastname'];
        $_SESSION['city'] = $queryResult[0]['city'];
        $_SESSION['country'] = $queryResult[0]['country'];
        $_SESSION['email'] = $queryResult[0]['email'];

        header("location:index.php");
      } else {

        $_SESSION['log'] = 'out';

        $_SESSION['incorrectPassword'] = true;
        header("location:login.php");
      }
    }
  } else {
    //  echo 'user does not exist';
    $_SESSION['exist'] = false;
    header("location:login.php");
  }
}



function sanitizeEmailInput($inpEmail)
{

  $inpEmail = trim($inpEmail);
  $inpEmail = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

  return $inpEmail;
}

function sanitizePassword($pasw)
{

  $inpEmail = trim($pasw);
  return $inpEmail;
}
