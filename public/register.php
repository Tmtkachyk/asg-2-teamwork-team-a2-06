<?php
  session_start();
?>

<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="loginStyle.css">

  <script src="header.js"></script>
  <link rel="stylesheet" href="headerStyle.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="formValidation.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;1,300;1,400&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">

  <script>
    tailwind.config = {
      theme: {
        backgroundImage: {
          "image-1": "url('../images/2049SS.jpg')",
          "image-2": "url('../images/titanicSS.jpg')",
          "image-3": "url('../images/interstellarSS.jpg')",
          "image-4": "url('../images/jokerSS.jpg')",
          "image-5": "url('../images/alienSS.png')",
        },

        fontFamily: {
          Times: ["Times New Roman", "sans-serif"],
          Arial: ["Arial", "sans-serif"],
          open: ["Open Sans", "serif"],
          source: ["Source Sans Pro", "sans-serif"],
          montser: ["Montserrat", "serif"],
        },
        screens: {
          'sm': {
            'max': '650px'
          },
          md: "768px",
          lg: "1440px",
          // maxSC: {
          //   max: "426px"
          // },
        },

        extend: {},
      },
      height: {
        128: "32rem",
      },
      plugins: [],
    };
  </script>

</head>




<body>

<div style="margin-top:2%">
<?php include 'header.php';?>
  </div>

<form method="post" class="theForm" action="regitserAction.php">

<div class="imgcontainer">
  <img src="../images/registerIcon.png" alt="Register Icon" class="loginIcon">
</div>

<div class="logContainer">

  <label><b>First name</b></label>
  <input type="text" placeholder="Enter your first name" name="firstNameRegister" required>
  <br>

  <label><b>Last name</b></label>
  <input type="text" placeholder="Enter your last name" name="lastNameRegister" required>
  <br>

  <label><b>Country</b></label>
  <input type="text" placeholder="Enter your country" name="countryRegister" required>
  <br>
  <label><b>Home city</b></label>
  <input type="text" placeholder="Enter your city" name="cityRegister" required>
  <br>


  <!-- inline styling cause css did not work for some reason -->
  <label><b>e-mail</b></label>
  <input type="email" class="email" placeholder="Enter your email address" name="emailRegister" style="width:95%; padding:12px 20px; margin: 15px 0px; display: inline-block; border: 1px solid #ccc; box-sizing:border-box;border-radius:5px" required>
  <br>



  <label><b>Password</b></label>
  <input type="password" class="password" placeholder="Enter Password" name="passwordRegister"  required minlength="8" required>
  <br>

  <label><b>Confirm password</b></label>
  <input type="password" class="passwordConfirm" placeholder="Re-enter Password" name="psw_confirm"  required minlength="8" required>
  <br>

    <!-- inline styling cause Tailwind was interferring with the css-->
  <button class="button" type="submit" style="background-color: grey; color: white; padding: 8px 10px; margin: 8px 0; border: none; cursor: pointer; display: block; margin-left: auto; margin-right: auto;">Register</button>

  
</div>

<?php
            if (isset($_SESSION['alreadyExists']) && $_SESSION['alreadyExists'] == true)
            {
              echo '<h3 style="text-align:center; color:red;"> E-mail entered is already in use, please try a different email </h3>';

           //   unset($_SESSION['alreadyExists']);
            }


          ?>


<div class="registerContainer" style="background-color:#f1f1f1">
  <span class="psw">Already have an acocunt? <a href="login.php"> Login </a></span>
</div>

</form>
    
</body>
</html>