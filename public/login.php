<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="loginStyle.css">

  <script src="header.js"></script>
  <link rel="stylesheet" href="headerStyle.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;1,300;1,400&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">

</head>



<body>

  <div class="headerDiv">
  </div>
  <div class="smallMenu">
  </div>



  <div>
    <form method="post" class="theForm">

      <div class="imgcontainer">
        <img src="../images/logIcon.jpg" alt="Login Icon" class="loginIcon">
      </div>

      <div class="logContainer">

        <label><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" required>
        <br>
        <label><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>
        <br>
        <button class="button" type="submit">Login</button>
        <label class='rem'>
          <input type="checkbox" checked="checked" name="dontForget"> Remember me
        </label>
      </div>

      <div class="registerContainer" style="background-color:#f1f1f1">
        <span class="psw">Don't have an acocunt? <a href="#"> Register </a></span>
      </div>

    </form>


  </div>
</body>

</html>
