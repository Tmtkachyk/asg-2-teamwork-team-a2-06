<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  date_default_timezone_set("America/Edmonton");
  $dueDate = mktime(21, 0, 0, 4, 6, 2022); //April 6, 2022 21:00:00
  $dueDateRegular = date("h:i a D, M d, Y", $dueDate);
  $todayTime = time(); // current time in seconds since 1970.
  $todayDate = date("D, M d, Y");
  $currentTime = date("h:i a");
  $timeRemaining = $dueDate - $todayTime;

  $daysRemaining = round($timeRemaining / (60 * 60 * 24));
  $hoursRemaining = round(($timeRemaining - ($daysRemaining * 60 * 60 * 24)) / (60 * 60));
  $minutesRemaining = round(($timeRemaining - ($hoursRemaining * 60 * 60) - ($daysRemaining * 60 * 60 * 24)) / (60));


  echo "<p>It is currently $currentTime on $todayDate in Alberta</p>";
  echo "<p>The due date for Milestone #5 is: $dueDateRegular</p>";
  echo "<p>There are $daysRemaining days, $hoursRemaining hours and $minutesRemaining minutes remaining until Milestone #5 is due </p>";
  ?>
</body>

</html>
