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

        
        if($userStatement->rowCount())
        {
            
            foreach($queryResult as $oneRow)
            {

                if ($oneRow['email'] == $email)
                {
                    $_SESSION['alreadyExists'] = true;
                    header("location:register.php");
                }
            }


            if ($_SESSION['alreadyExists'] == false){

                $firstN = $_POST['firstNameRegister'];
                $lastN = $_POST['lastNameRegister'];
                $email = '"' . $_POST['emailRegister'] . '"';
                $city = $_POST['cityRegister'];
                $country = $_POST['countryRegister'];
                $password = $_POST['passwordRegister'];
            
                //hashing the password 
                $digest = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
            
                $addUserSQL = "INSERT INTO users (firstname, lastname, city, country, email, password) VALUES ('$firstN', '$lastN', '$city', '$country', '$email', '$digest')";
              
                $pdo = Connection::connect($config['database']); 
                $userStatement = $pdo->prepare($addUserSQL);
                $userStatement->execute();
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



