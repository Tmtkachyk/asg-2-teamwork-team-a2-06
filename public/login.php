<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="loginStyle.css">
  <link rel="stylesheet" href="headerStyle.css">
  <script src="header.js"></script>
  <title>Login Page</title>
</head>



<body>

<div class="headerDiv">

</div>

  <form action="" method="post" class="theForm">

    <div class="imgcontainer">
      <img src="../images/logIcon.jpg" alt="Login Icon" class="loginIcon">
    </div>

    <div class="logContainer">

      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" required>
      <br>
      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
      <br>
      <button type="submit">Login</button>
      <label class='rem'>
        <input type="checkbox" checked="checked" name="dontForget"> Remember me
      </label>
    </div>


    <div class="registerContainer" style="background-color:#f1f1f1">
      <span class="psw">Don't have an acocunt? <a href="#"> Register </a></span>
    </div>


  </form>

</body>

</html>
