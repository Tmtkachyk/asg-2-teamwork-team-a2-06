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
  $dueDate = mktime(21, 0, 0, 4, 6, 2022); //April 6, 2014 21:00:00
  $today = time(); // current time in seconds since 1970.
  $timeRemaining = $dueDate - $today;

  echo "<p>Todays date is" . date("M d, Y", $today) .
    ":</p>";
  echo "<p>Milestone 5 is due on" . date("M d, Y", $dueDate) .
    ":</p>";
  echo "<p>Time remaining" . date("M d, Y", $timeRemaining) .
    ":</p>";

  ?>
</body>

</html>
