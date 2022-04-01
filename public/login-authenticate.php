<?php
    session_start();
    $config = include_once "../config.php";
    include "../database/Connection.php";

    

    $password = "";
    $id = "";
    $quote = '"';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $email = $quote . sanitizeEmailInput($_POST['email']) . $quote; 
        $password = $_POST["password"];
       // echo $email;
         validateLogin($email, $password, $config);
    }




    function validateLogin($email, $password, $config)
    {
        $pdo = Connection::connect($config['database']); 
        $emailPasswordSQL = "SELECT `email`, `password` FROM `users` WHERE email=$email"; 
        $userStatement = $pdo->prepare($emailPasswordSQL);
        $userStatement->execute();
        $queryResult = $userStatement->fetchAll(PDO::FETCH_ASSOC);
        


        // checking if there's a result then validating the password 
        if($userStatement->rowCount())
        {
            foreach($queryResult as $oneRow)
            {

                if(password_verify($password, $oneRow['password']))
                {
                    $_SESSION['log'] = 'in';
                    header("location:index.php");
                }
                else
                {
                    
                    $_SESSION['log'] = 'out';

                    $_SESSION['incorrectPassword'] = true;
                    header("location:login.php");
                }
            }
        }

        else
        {
         //  echo 'user does not exist';
            $_SESSION['exist'] = false;
            header("location:login.php");

        }
    }



        function sanitizeEmailInput($inpEmail){

            $inpEmail = trim($inpEmail);
            $inpEmail = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

            return $inpEmail;
        }

        function sanitizePassword($pasw){

            $inpEmail = trim($pasw);
            return $inpEmail;
        }


        // // to be uncommented when the database stuff is fixed 

        // function loginError($message)
        // {
       
        //     $str = '<script>';
        //     $str .= 'let logContainer = document.querySelector(".logContainer")';
        //     $str .='let loginErrorMessage = document.createElement("H3")';
        //     $str .= 'loginErrorMessage.textContent =' . $message;
        //     $str .= 'logContainer.appendChild(loginErrorMessage)';
        //     $str .= '</script>';
        //     echo $str;
        // }


 
