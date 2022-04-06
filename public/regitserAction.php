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

      //  var_dump($queryResult);
      //  echo $email;

        //checking if there is a result returned 

        if($userStatement->rowCount())
        {
            
            foreach($queryResult as $oneRow)
            {

                if ($oneRow['email'] == $email)
                {
                    $_SESSION['alreadyExists'] = true;
                    header("location:register.php");
                }
                else{
                    // create a new user on the database: firstname, lastname, email, city, country 
                }

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