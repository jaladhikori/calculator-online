<?php
//require_once 'database.php';

//session_check(true);

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
      <form action="#">
        <input type="text" placeholder="Username" required>
        <input type="password" placeholder="Password" required>
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





  <!-- <div class="wrapper">
    <span class="icon-close">
      <i class="bx bx-x"></i>
    </span>
    <div class="form-box login">
      <h2>Login</h2>
      <form action="#">
        <div class="input-box">
          <span class="icon">
            <i class="bx bx-envelope"></i>
          </span>
          <input type="text" required />
          <label>Email</label>
        </div>
        <div class="input-box">
          <span class="icon">
            <i class="bx bx-lock-alt"></i>
          </span>
          <input type="password" required />
          <label>Password</label>
        </div>
        <div class="remember-forgot">
          <label><input type="checkbox" />Remember me</label>
          <a href="#">Forgot Password?</a>
        </div>
        <button type="submit" class="btn">Login</button>
        <div class="login-register">
          <p>
            Don't have an account?
            <a href="#" class="register-link">Register</a>
          </p>
        </div>
      </form>
    </div>

    <div class="form-box register">
      <h2>Registration</h2>
      <form action="#">
        <div class="input-box">
          <span class="icon">
            <i class="bx bx-user"></i>
          </span>
          <input type="text" required />
          <label>Username</label>
        </div>
        <div class="input-box">
          <span class="icon">
            <i class="bx bx-envelope"></i>
          </span>
          <input type="text" required />
          <label>Email</label>
        </div>
        <div class="input-box">
          <span class="icon">
            <i class="bx bx-lock-alt"></i>
          </span>
          <input type="password" required />
          <label>Password</label>
        </div>
        <div class="remember-forgot">
          <label><input type="checkbox" />I agree to the terms & conditions</label>
        </div>
        <button type="submit" class="btn">Register</button>
        <div class="login-register">
          <p>
            Already have an account?
            <a href="#" class="login-link">Login</a>
          </p>
        </div>
      </form>
    </div>
  </div>

  <p>teastetetetettete</p>
  <P>ococaoa</P>
  <P>test cobakkkka</P>
  <script src="assets/script.js"></script> -->
</body>

</html>