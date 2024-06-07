<?php
require_once 'database.php';

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["repeat_password"];

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $errors = array();

    if (empty($username) or empty($email) or empty($password) or empty($passwordRepeat)) {
        array_push($errors, "All fields are required");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email is not valid");
    }
    if (strlen($password) < 8) {
        array_push($errors, "Password must be at least 8 charactes long");
    }
    if ($password !== $passwordRepeat) {
        array_push($errors, "Password does not match");
    }

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($mysqli, $sql);
    $rowCount = mysqli_num_rows($result);
    if ($rowCount > 0) {
        array_push($errors, "Username already exists!");
    }
    if (count($errors) > 0) {
        foreach ($errors as  $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
    } else {

        $sql = "INSERT INTO users (username, email, password) VALUES ( ?, ?, ? )";
        $stmt = mysqli_stmt_init($mysqli);
        $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
        if ($prepareStmt) {
            mysqli_stmt_bind_param($stmt, "sss", $username, $email, $passwordHash);
            mysqli_stmt_execute($stmt);
            echo "<div class='alert alert-success'>You are registered successfully.</div>";
        } else {
            die("Something went wrong");
        }
    }
}



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
                <!-- <input type="password" name="repeat_password" placeholder="Repeat Password"> -->
                <div class="link">
                    <button type="submit" name="submit" class="register">Register</button>
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