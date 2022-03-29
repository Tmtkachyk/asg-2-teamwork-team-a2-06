<?php
   
       // starting session named loggedIn 
    session_id("loggedIn");
    session_start();

    
   $config = include_once "../config.php";
    include "../database/Connection.php";
    include "../classes/Movie.php";

  
    echo "Teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeestt";

    $password = "";
    $id = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $id = $_POST["username"];
        $password = $_POST["password"];

        //echo $id; //works

        validateLogin($id, $password);
    }




    function validateLogin($id, $password){

    
        $pdo = Connection::connect($config['users']); // ask james about this 
        $userPasswordSQL = "SELECT id, password FROM users WHERE id=:id"; //ask james about this 

        $userPassStatement = $pdo->prepare($userPasswordSQL);
        $userPassStatement->execute();

        $queryResult = $userPassStatement->fetchAll(PDO::FETCH_ASSOC);

        

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
            echo "shiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiitttt";
            //loginError("User $id does not exist");
        }


    }


        // to be uncommented when the database stuff is fixed 

        // function loginError($message)
        // {
        //     echo "heeeeeeellllo"
        // // $str = '<script>';
        // // $str .= 'let logContainer = document.querySelector(".logContainer");'
        // // $str .='let loginErrorMessage = document.createElement("H3");'
        // // $str .= 'loginErrorMessage.textContent =' . $message;
        // // $str .= '</script>';
        // // echo $str;
        // }


 