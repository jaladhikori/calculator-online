<?php
require_once 'database.php';

session_check(true);

$username = $_POST['username'];
$password = $_POST['password'];

$result = $mysqli->query("SELECT * FROM users WHERE username ='$username'");

// if (mysqli_num_rows($result) !=0) {
//   $row = $result->fetch_assoc();

//   session_start();
//   $_SESSION['id'] = $row['id'];
//   $_SESSION['role'] = $row['role'];
//   if ($row['role'] == 'admin') {
//     header("location: index.php");
//   } else if ($row['role'] == 'user') {
//     header("location: index.php");
//   }
// } else {
//   header("location: login.php");
// }


if ($result->num_rows === 1) {
    $member = $result->fetch_assoc();
    if (password_verify($password, $member['password'])) {
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $member['id'];

        header('Location: index.php');
        exit;
    }
}

$_SESSION['alert'] = 'Username / Password Salah!';

header('Location: login.php');
exit;
