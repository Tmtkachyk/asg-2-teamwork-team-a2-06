<?php
   
       // starting session named loggedIn 
    session_id("loggedIn");
    session_start();

    
   $config = include_once "../config.php";
    include "../database/Connection.php";
    include "../classes/Movie.php";

  
    //echo "Teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeestt";

    $password = "";
    $id = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $id = $_POST["username"];
        $password = $_POST["password"];

        //echo $id; //works

        validateLogin($id, $password, $config);
    }




    function validateLogin($id, $password, $config){

    
        $pdo = Connection::connect($config['database']); 
        $userPasswordSQL = "SELECT `id`, `password` FROM `users` WHERE id=$id"; 

        $userStatement = $pdo->prepare($userPasswordSQL);
        $userStatement->execute();

        $queryResult = $userStatement->fetchAll(PDO::FETCH_ASSOC);

       // print_r($queryResult); //WORKS !

        if($userStatement->rowCount())
        {
            foreach($queryResult as $oneRow)
            {
                // https://www.php.net/manual/en/function.password-verify.php

                if(password_verify($password, $oneRow['password'])){

                    $_SESSION['LoggedIn'] = true;
                    $_SESSION['id'] = $oneRow['id'];
                    $_SESSION["favs"] = []; 

                    //send user to the home page
                    header("location:index.php");

                }
                else{
                    //loginError("Incorrect password");
                    echo "incorrect password";
                }
            }
        }
        else{
            echo 'user does not exist';
            //loginError("User $id does not exist");
        }


    }


        // to be uncommented when the database stuff is fixed 

        function loginError($message)
        {
            echo "heeeeeeellllo";
            $str = '<script>';
            $str .= 'let logContainer = document.querySelector(".logContainer")';
            $str .='let loginErrorMessage = document.createElement("H3")';
            $str .= 'loginErrorMessage.textContent =' . $message;
            $str .= 'logContainer.appendChild(loginErrorMessage)';
            $str .= '</script>';
            echo $str;
        }


 
