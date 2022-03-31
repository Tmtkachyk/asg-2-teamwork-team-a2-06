<?php
    session_start();
    $_SESSION["log"] = 'out';
    $_POST["email"] = "";
    $_POST["password"] = "";

    header("location:index.php");