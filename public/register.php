<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="loginStyle.css">
    <title>Login Page</title>
</head>
<body>
<form method="post" class="theForm">

<div class="imgcontainer">
  <img src="../images/registerIcon.png" alt="Register Icon" class="loginIcon">
</div>

<div class="logContainer">

  <label><b>First name</b></label>
  <input type="text" placeholder="Enter Username" name="firstName" required>
  <br>

  <label><b>Last name</b></label>
  <input type="text" placeholder="Enter Username" name="lastName" required>
  <br>

  <label><b>Password</b></label>
  <input type="password" placeholder="Enter Password" name="psw" required>
  <br>

  <label><b>Confirm password</b></label>
  <input type="password" placeholder="Re-enter Password" name="psw_confirm" required>
  <br>


  <button class="button" type="submit">Register</button>

</div>

<div class="registerContainer" style="background-color:#f1f1f1">
  <span class="psw">Already have an acocunt? <a href="#"> Login </a></span>
</div>

</form>
    
</body>
</html>