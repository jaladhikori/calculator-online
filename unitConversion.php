<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="assets/style.css" />
    <title>Kalkulator Online</title>
  </head>
  <body>
    <!--Sidebar Start  -->
    <div class="sidebar">
      <a href="#" class="logo">
        <i class="bx bx-math"></i>
        <div class="logo-name"><span>Calc</span>Online</div>
      </a>
      <ul class="side-menu">
        <li>
          <a href="index.html"><i class="bx bx-calculator"></i>Calculator</a>
        </li>
        <li class="active">
          <a href="conversion.html"
            ><i class="bx bx-analyse"></i>Unit Converstion</a
          >
        </li>
        <li>
          <a href="#"><i class="bx bx-money-withdraw"></i>Finance Calc</a>
        </li>
        <li>
          <a href="#"><i class="bx bx-group"></i>user</a>
        </li>
        <li>
          <a href="#"><i class="bx bx-cog"></i>Setting</a>
        </li>
      </ul>
      <ul class="side-menu">
        <li>
          <a href="#" class="logout">
            <i class="bx bx-log-out-circle"></i>
            Logout
          </a>
        </li>
      </ul>
    </div>
    <!-- Sidebar End -->

    <!-- Main Content Start -->
    <div class="content">
      <!-- Navbar Start -->
      <nav>
        <i class="bx bx-menu"></i>
        <input type="checkbox" id="theme-toggle" hidden />
        <label for="theme-toggle" class="theme-toggle"></label>
        <a href="#" class="profile">
          <img src="images/logo.png" />
        </a>
      </nav>
      <!-- Navbar End -->
      <main>
        <!-- Header Start -->
        <div class="header">
          <div class>
            <h1>Calculator</h1>
            <ul class="breadcrumb">
              <li><a href="#">Standar</a></li>
              /
              <li><a href="#" class="active">Scientific</a></li>
            </ul>
          </div>
        </div>
        <!-- Header End -->
        <!-- Calculator End -->
      </main>
    </div>
    <!-- Main Content End -->

    <script src="assets/script.js"></script>
  </body>
</html>