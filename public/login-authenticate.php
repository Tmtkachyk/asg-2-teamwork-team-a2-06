<?php
    $config = include_once "../config.php";
    include "../database/Connection.php";
    include "../classes/Movie.php";

    // starting session named loggedIn 
    session_id("loggedIn");
    session_start();

    $password = "";
    $id = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $id = $_POST["username"];
        $password = $_POST["password"];

        validateLogin($id, $password);
    }


    function validateLogin($id, $password){

        


        $pdo = Connection::connect($config['users']); // ask james about this 
        $userPasswordSQL = "SELECT id, password FROM users WHERE id=:id"; //ask james about this 
        $userPassStatement = $pdo->prepare($userPasswordSQL);
        $userPassStatement->execute();

        $queryResult = $userPassStatement->fetchAll(PDO::FETCH_ASSOC)

        if($userPassStatement->rowCount())
        {
            foreach($queryResult as $oneRow)
            {
                // https://www.php.net/manual/en/function.password-verify.php

                if(verify_password($password, $oneRow['password'])){

                    $_SESSION['LoggedIn'] = true;
                    $_SESSION['id'] = $oneRow['id'];
                    $_SESSION["favs"] = []; 

                    //send user to the home page
                    header("location:index.php");

                }
                else{
                    loginError("Incorrect password");
                }
            }
        }
        else{
            loginError("User $id does not exist");
        }


    }


 