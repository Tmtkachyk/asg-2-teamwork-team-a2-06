<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="loginStyle.css">
    <script src="formValidation.js"></script>
    <title>Login Page</title>
</head>
<body>
<form method="post" class="theForm" action="testAction.php">

<div class="imgcontainer">
  <img src="../images/registerIcon.png" alt="Register Icon" class="loginIcon">
</div>

<div class="logContainer">

  <label><b>First name</b></label>
  <input type="text" placeholder="Enter your first name" name="firstName" required>
  <br>

  <label><b>Last name</b></label>
  <input type="text" placeholder="Enter your last name" name="lastName" required>
  <br>

  <label><b>Country</b></label>
  <input type="text" placeholder="Enter your country" name="country" required>
  <br>
  <label><b>Home city</b></label>
  <input type="text" placeholder="Enter your city" name="country" required>
  <br>


  <!-- inline styling cause css did not work for some reason -->
  <label><b>e-mail</b></label>
  <input type="email" class="email" placeholder="Enter your email address" name="email" style="width:95%; padding:12px 20px; margin: 15px 0px; display: inline-block; border: 1px solid #ccc; box-sizing:border-box;border-radius:5px" required>
  <br>



  <label><b>Password</b></label>
  <input type="password" placeholder="Enter Password" name="psw" required minlength="8" required>
  <br>

  <label><b>Confirm password</b></label>
  <input type="password" placeholder="Re-enter Password" name="psw_confirm" required minlength="8" required>
  <br>


  <button class="button" type="submit">Register</button>

</div>


<div class="registerContainer" style="background-color:#f1f1f1">
  <span class="psw">Already have an acocunt? <a href="#"> Login </a></span>
</div>

</form>
    
</body>
</html>