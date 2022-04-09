<?php
session_start();
$config = include_once "../config.php";
include "../database/Connection.php";

// we need to get all the email addresses on the database to see if the entered email is already in use

$email = $_POST['emailRegister'];
$quote = '"';
$email = sanitizeEmailInput($_POST['emailRegister']);

checkIfEmailExists($email, $config);










function checkIfEmailExists($email, $config)
{
  // grabbing emails from database 
  $pdo = Connection::connect($config['database']);
  $emailPasswordSQL = "SELECT email FROM users";
  $userStatement = $pdo->prepare($emailPasswordSQL);
  $userStatement->execute();
  $queryResult = $userStatement->fetchAll(PDO::FETCH_ASSOC);


  $_SESSION['alreadyExists'] = false;

  //checking if there is a result returned 


  if ($userStatement->rowCount()) {

    foreach ($queryResult as $oneRow) {

      if ($oneRow['email'] == $email) {
        $_SESSION['alreadyExists'] = true;
        header("location:register.php");
      }
    }


    if ($_SESSION['alreadyExists'] == false) {

      $firstN = $_POST['firstNameRegister'];
      $lastN = $_POST['lastNameRegister'];
      //  $email = '"' . $_POST['emailRegister'] . '"';
      $city = $_POST['cityRegister'];
      $country = $_POST['countryRegister'];
      $password = $_POST['passwordRegister'];

      //hashing the password 
      $digest = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);

      $addUserSQL = "INSERT INTO users (firstname, lastname, city, country, email, password) VALUES (:fn, :ln, :city, :country, :email, :pw)";

      $pdo = Connection::connect($config['database']);
      $userStatement = $pdo->prepare($addUserSQL);
      $userStatement->execute([
        "fn" => $firstN,
        "ln" => $lastN,
        "city" => $city,
        "country" => $country,
        "email" => $email,
        "pw" => $digest
      ]);

      loginNewUser($email, $config);
    }
  }
}


// sanitizing email inout 
function sanitizeEmailInput($inpEmail)
{

  $inpEmail = trim($inpEmail);
  $inpEmail = filter_var($_POST["emailRegister"], FILTER_SANITIZE_EMAIL);

  return $inpEmail;
}


function loginNewUser($email, $config)
{



  //  $email =  sanitizeEmailInput($email);

  //  echo '<br> ' . $email . '<br>';

  //  $email =  "'" . $email . "'";

  // echo $email;

  //   $email = 'hemmens0@de.vu';

  $pdo = Connection::connect($config['database']);
  $emailPasswordSQL = "SELECT email, password, firstname, lastname, city, country FROM users WHERE email='$email'";
  $userStatement = $pdo->prepare($emailPasswordSQL);
  $userStatement->execute();
  $queryResult = $userStatement->fetchAll(PDO::FETCH_ASSOC);

  // log the user 

  var_dump($queryResult);


  $_SESSION['log'] = 'in';
  $_SESSION['firstname'] = $queryResult[0]['firstname'];
  $_SESSION['lastname'] = $queryResult[0]['lastname'];
  $_SESSION['city'] = $queryResult[0]['city'];
  $_SESSION['country'] = $queryResult[0]['country'];

  header("location:index.php");
}
