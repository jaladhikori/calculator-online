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