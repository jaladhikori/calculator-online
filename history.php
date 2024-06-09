<?php

require_once('database.php');
session_start();


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
        <h3>User Calculation History</h3>
    </div>
    <form action="" method="post">
        <table>
            <tr>
                <th>Angka1</th>
                <th>Operator</th>
            </tr>
            <tr>
                <td>
                    <input type="text" name="angka1">
                </td>
            </tr>
        </table>


    </form>


    <script src="assets/script.js"></script>
</body>

</html>