<?php
require_once 'database.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <title>Website Registration</title>
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
            <form action="registration.php" method="post">
                <input type="text" name="username" placeholder="Username">
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <div class="link">
                    <button type="submit" name="register" class="register">Register</button>
                </div>
                <hr>
                <div>
                    <p class="p-link">
                        Already have an account?
                        <a href="login.php" class="login-link">Login</a>
    
                    </p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>