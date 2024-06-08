<?php
require_once('database.php');
session_check();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="assets/style.css" />
  <title>Kalkulator Online</title>
</head>

<body>
  <!-- Navbar -->
  <?php include "layout/navbar.php" ?>

  <!-- Header -->
  <div class="header">
    <h3>Unit Conversion</h3>
  </div>
  <div class="card">
    <a href="lenghtConversion.php" class="card-info">
      <i class='bx bx-ruler'></i>
      <h4>Lenght Conversion</h4>
    </a>
    <a href="weightConversion.php" class="card-info">
      <i class='bx bxs-inbox bx-rotate-180'></i>
      <h4>Weight Conversion</h4>
    </a>
    <a href="temperatureConversion.php" class="card-info">
      <i class='bx bxs-thermometer'></i>
      <h4>Temperature Conversion</h4>
    </a>
    <script src="assets/script.js"></script>
</body>

</html>