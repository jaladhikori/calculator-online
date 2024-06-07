<?php
require_once 'database.php';

session_check(true);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <title>Website Login</title>
  <link rel="stylesheet" href="assets/style.css" />
</head>

<body>
  <?php include('layout/navbar.php'); ?>

  <div class="container flex">
    <div class="calc-page flex">
      <div class="text">
        <i class="bx bx-math"></i>
        <h1><span>Calc</span>Online</h1>
        <p>Get the ease of calculating anything</p>
        <p>from the source of calculator online</p>
      </div>
      <form action="validasi.php" method="post">
        <div class="alert">
          <?php
          if (isset($_SESSION['alert'])) {
            echo $_SESSION['alert'];
            unset($_SESSION['alert']);
          }
          ?>
        </div>
        <input type="text" name="username" placeholder="Username" autofocus required>
        <input type="password" name="password" placeholder="Password" required>
        <div class="link">
          <button type="submit" class="login">Login</button>
          <a href="#" class="forgot">Forgot password?</a>
        </div>
        <hr>
        <div class="button">
          <a href="register.php">Create new account</a>
        </div>
      </form>
    </div>
  </div>
</body>

</html>