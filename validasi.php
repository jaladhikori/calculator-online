<?php
require_once 'database.php';

session_check(true);

$username = $_POST['username'];
$password = $_POST['password'];

$result = $mysqli->query("SELECT * FROM users WHERE username ='$username'");

if ($result->num_rows === 1) {
    $member = $result->fetch_assoc();
    if (password_verify($password, $member['password'])) {
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $member['id'];

        header('Location: index.php');
        exit;
    }
}

$_SESSION['alert'] = 'Wrong Username / Password!';

header('Location: login.php');
exit;
