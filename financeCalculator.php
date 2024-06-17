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

    <!-- Header -->
    <div class="header">
        <h3>Finance Calculator</h3>
    </div>

    <div class="card">
        <a href="loanInterest.php" class="card-info">
            <i class='bx bxs-bank'></i>
            <h4>Loan Interest</h4>
        </a>
        <a href="amortizationCalculator.php" class="card-info">
            <i class='bx bx-money-withdraw'></i>
            <h4>Amortization Calculator</h4>
        </a>
        <a href="investmentCalculator.php" class="card-info">
            <i class='bx bx-wallet'></i>
            <h4>Investment Calculator</h4>
        </a>
    </div>
    <?php include "layout/footer.php" ?>
    <script src="assets/script.js"></script>
</body>

</html>