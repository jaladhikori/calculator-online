<?php

require_once('database.php');
session_check();


$user_id = $_SESSION['id'];

$result = $mysqli->query("SELECT * FROM users WHERE id = $user_id");


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

    <!-- Header -->
    <div class="header">
        <h3>User Information</h3>
    </div>

    <div class="card">
        <?php
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            echo '<dl>';
            echo '<dt>Username</dt>';
            echo '<dd>' . $user['username'] . '</dd>';
            echo '<dt>Email</dt>';
            echo '<dd>' . $user['email'] . '</dd>';
        } else {
            echo '<p>User Tidak Ditemukan.</p>';
        }
        ?>
        </a>
    </div>

    <div class="container">
        <a href="history.php"><button>CSV</button></a>
    </div>
    <?php include "layout/footer.php" ?>
    <script src="assets/script.js"></script>
</body>

</html>