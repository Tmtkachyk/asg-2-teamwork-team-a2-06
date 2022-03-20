<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="headerStyle.css">
  <script src="header.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
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
          // sm: "425px",
          'sm': {
            'max': '650px'
          },
          md: "500px",
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



<body class="bg-image-1 transition-all ease-linear duration-[3000ms] bg-cover bg-center bg-fixed bg-gray-400">

  <!-- <div class="headerDiv">
  </div>
  <div class="smallMenu">
  </div> -->

  <div class="flex flex-col justify-center m-0 h-[100vh] items-center font-open min-h-400px">


    <?php include 'header.php';
    ?>

    <div class="container m-auto h-[75vh] w-10/12">


    </div>
  </div>
</body>

</html>
