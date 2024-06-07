<?php

require_once 'database.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $checkEmail = "SELECT * FROM users where email='$email'";
    $result = $mysqli->query($checkEmail);
    if ($result->num_rows > 0) {
        echo "Email Address Already Exists !";
    } else {
        $insertQuery = "INSERT INTO users(username,email,password)
                       VALUES ('$username','$email','$password')";
        if ($mysqli->query($insertQuery) == TRUE) {
            header("location: index.php");
        } else {
            echo "Error:" . $mysqli->error;
        }
    }
}

// if (isset($_POST["submit"])) {
//     $username = $_POST["username"];
//     $email = $_POST["email"];
//     $password = $_POST["password"];
//     $passwordRepeat = $_POST["repeat_password"];

//     $passwordHash = password_hash($password, PASSWORD_DEFAULT);

//     $errors = array();

//     if (empty($username) or empty($email) or empty($password) or empty($passwordRepeat)) {
//         array_push($errors, "All fields are required");
//     }
//     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//         array_push($errors, "Email is not valid");
//     }
//     if (strlen($password) < 8) {
//         array_push($errors, "Password must be at least 8 charactes long");
//     }
//     if ($password !== $passwordRepeat) {
//         array_push($errors, "Password does not match");
//     }

//     $sql = "SELECT * FROM users WHERE username = '$username'";
//     $result = mysqli_query($mysqli, $sql);
//     $rowCount = mysqli_num_rows($result);
//     if ($rowCount > 0) {
//         array_push($errors, "Username already exists!");
//     }
//     if (count($errors) > 0) {
//         foreach ($errors as  $error) {
//             echo "<div class='alert alert-danger'>$error</div>";
//         }
//     } else {

//         $sql = "INSERT INTO users (username, email, password) VALUES ( ?, ?, ? )";
//         $stmt = mysqli_stmt_init($mysqli);
//         $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
//         if ($prepareStmt) {
//             mysqli_stmt_bind_param($stmt, "sss", $username, $email, $passwordHash);
//             mysqli_stmt_execute($stmt);
//             echo "<div class='alert alert-success'>You are registered successfully.</div>";
//         } else {
//             die("Something went wrong");
//         }
//     }
// }
