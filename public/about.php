<?php
date_default_timezone_set("America/Edmonton");
$dueDate = mktime(21, 0, 0, 4, 6, 2022); //April 6, 2022 21:00:00
$dueDateRegular = date("h:i a D, M d, Y", $dueDate);
$todayTime = time(); // current time in seconds since 1970.
$todayDate = date("D, M d, Y");
$currentTime = date("h:i a");
$timeRemaining = $dueDate - $todayTime;

$daysRemaining = floor($timeRemaining / (60 * 60 * 24));
$hoursRemaining = floor(($timeRemaining - ($daysRemaining * 60 * 60 * 24)) / (60 * 60));
$minutesRemaining = floor(($timeRemaining - ($hoursRemaining * 60 * 60) - ($daysRemaining * 60 * 60 * 24)) / (60));

?>


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
          sm: "425px",
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



<body class="bg-image-1 transition-all ease-linear duration-[3000ms] bg-cover bg-center bg-fixed bg-gray-400">

  <!-- <div class="headerDiv">
  </div>
  <div class="smallMenu">
  </div> -->

  <div class="flex flex-col justify-center m-0 h-[100vh] items-center font-open min-h-400px">


    <?php include 'header.php';
    ?>

    <div class="container m-auto h-[75vh] w-10/12">

      <div class="p-4 bg-black/80 m-auto  text-center  rounded-t-3xl h-auto">
        <div>
          <h1 class="text-white text-6xl font-montser">About Us</h1>
        </div>
      </div>

      <div class=" bg-white m-auto h-5/6 w-auto text-center rounded-b-3xl pb-4 overflow-y-scroll">
        <table class="table-fixed m-auto w-3/4 ">
          <tbody class="divide-y divide-gray-300 ">
            <tr>
              <td class="p-4 text-gray-500 text-left w-2/4">
                <div>University</div>
              </td>
              <td class="p-2">
                <div class="text-left font-semibold w-2/4">Mount Royal University</div>
              </td>
            </tr>
            <tr>
              <td class="p-4 p text-gray-500 text-left w-2/4">
                <div class=" text-left">Class Name</div>
              </td>
              <td class="p-2">
                <div class="text-left font-semibold">Computer Science 3512 - Web ll: Web Application Development</div>
              </td>
            </tr>
            <tr>
              <td class="p-4 p text-gray-500 text-left w-2/4">
                <div class=" text-left mr-4">Semester</div>
              </td>
              <td class="p-2">
                <div class="text-left font-semibold">Fall 2022</div>
              </td>
            </tr>
            <tr>
              <td class="p-4 p text-gray-500 text-left w-2/4">
                <div class=" text-left ">Tech Used</div>
              </td>
              <td class="p-2">
                <div class="text-left font-semibold">HTML, CSS, Javascript, PHP, MySQL and XAMPP</div>
              </td>
            </tr>
            <tr>
              <td class="p-4 p text-gray-500 text-left w-2/4">
                <div class=" text-left">Project Repo</div>
              </td>
              <td class="p-2">
                <div class="text-left font-semibold"><a href="https://github.com/MRU-CSIS-3512-202201-001/asg-2-teamwork-team-a2-06">Github Link</a></div>
              </td>
            </tr>
            <tr>
              <td class="px-4 text-gray-500 text-left w-2/4">
                <div class=" text-left">Members</div>
              </td>
              <td>
                <table>
                  <tbody class="divide-y divide-gray-300">
                    <tr>
                      <td class="px-2">
                        <div class="font-semibold text-left">Travis Tkachyk</div>
                      </td>
                      <td>
                        <div class="text-left font-semibold"><a href="https://github.com/Tmtkachyk">Github Profile</a></div>
                      </td>
                    </tr>
                    <tr>
                      <td class="px-2">
                        <div class="font-semibold text-left">Mohammed Hachmi</div>
                      </td>
                      <td>

                        <div class="text-left font-semibold"><a href="https://github.com/mhach145">Github Profile</a></div>
                      </td>
                    </tr>
                    <tr>
                      <td class="px-2">
                        <div class="font-semibold text-left">James Holloway</div>
                      </td>
                      <td>
                        <div class="text-left font-semibold"><a href="https://github.com/jholl810">Github Profile</a></div>

                      </td>
                    </tr>
                  </tbody>
                </table>

              </td>
            </tr>
          </tbody>
        </table>

        <div class="flex flex-row justify-around mt-5 min-h-1/4 h-auto">
          <div class="bg-black/80  text-center m-2 basis-2/6 p-4">
            <div class="text-white/80">Alberta Time and Date</div>
            <div class=" p-auto font-semibold text-xl text-white">
              <p><?= $currentTime . " on " . $todayDate ?></p>
            </div>
          </div>

          <div class="bg-black/80  text-center m-2 basis-2/6 p-4">
            <div class="text-white/80">Time Remaining until Milestone 5 is due</div>
            <div class=" p-auto font-semibold text-xl text-white"><?= $daysRemaining . " days, " . $hoursRemaining . " hours and " . $minutesRemaining  . " minutes " ?></div>
          </div>

        </div>
        <?php
        //echo "<p>It is currently $currentTime on $todayDate in Alberta</p>" . "<p>The due date for Milestone #5 is: $dueDateRegular</p>";
        //echo "<p>There are $daysRemaining days, $hoursRemaining hours and $minutesRemaining minutes remaining until Milestone #5 is due </p>";
        ?>
      </div>
    </div>
  </div>
</body>

</html>
