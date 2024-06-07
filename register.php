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
            <form action="#">
                <input type="text" placeholder="Username" required>
                <input type="email" placeholder="Email" required>
                <input type="password" placeholder="Password" required>
                <div class="link">
                    <button type="submit" class="login">Register</button>
                </div>
                <hr>
                <div class="button">
                    <a href="register.php">Create new account</a>
                </div>
                <div>
                    <p class="p-link">
                        Already have an account?
                        <a href="login.php" class="login-link">Login</a>
                    </p>
                </div>
            </form>
        </div>
    </div>