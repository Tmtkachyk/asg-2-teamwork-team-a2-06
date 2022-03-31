<?php

    $config = include_once "../config.php";
    include "../database/Connection.php";
    include "../classes/Movie.php";

    $_SESSION['log'] = 'in';

    $password = "";
    $id = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $email = $_POST["email"];
        $password = $_POST["password"];

        //echo $id; //works

        validateLogin($email, $password, $config);
    }




    function validateLogin($email, $password, $config){

    
        $pdo = Connection::connect($config['database']); 
        $emailPasswordSQL = "SELECT `id`, `password` FROM `users` WHERE id=$email"; 

        $userStatement = $pdo->prepare($emailPasswordSQL);
        $userStatement->execute();

        $queryResult = $userStatement->fetchAll(PDO::FETCH_ASSOC);

       // print_r($queryResult); //WORKS !

        if($userStatement->rowCount())
        {
            foreach($queryResult as $oneRow)
            {
                // https://www.php.net/manual/en/function.password-verify.php

                if(password_verify($password, $oneRow['password']))
                {


                    $_SESSION['log'] = 'in';

                   header("location:index.php");

                }
                else{
                    $_SESSION['log'] = 'out';
                    //loginError("Incorrect password");
                    echo "incorrect password";
                }
            }
        }
        else{
            $_SESSION['log'] = 'out';
            $state = 'out';
            echo 'user does not exist';
            //loginError("User $id does not exist");
        }


    }


        // to be uncommented when the database stuff is fixed 

        function loginError($message)
        {
       
            $str = '<script>';
            $str .= 'let logContainer = document.querySelector(".logContainer")';
            $str .='let loginErrorMessage = document.createElement("H3")';
            $str .= 'loginErrorMessage.textContent =' . $message;
            $str .= 'logContainer.appendChild(loginErrorMessage)';
            $str .= '</script>';
            echo $str;
        }


 
