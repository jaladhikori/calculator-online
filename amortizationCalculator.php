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

    <div class="main-container">
        <h3>Amortization Calculator</h3>
        <form action="" method="post">
            <label for="loan_amount">Loan Amount:</label>
            <input type="text" id="loan_amount" name="loan_amount" required><br><br>

            <label for="annual_interest_rate">Annual Interest Rate (%):</label>
            <input type="text" id="annual_interest_rate" name="annual_interest_rate" required><br><br>

            <label for="loan_term">Loan Term (years):</label>
            <input type="text" id="loan_term" name="loan_term" required><br><br>

            <input type="submit" value="Calculate">


            <?php
            function calculate_amortization($loan_amount, $annual_interest_rate, $loan_term)
            {
                $monthly_interest_rate = $annual_interest_rate / 100 / 12;
                $number_of_payments = $loan_term * 12;

                if ($monthly_interest_rate > 0) {
                    $monthly_payment = $loan_amount * $monthly_interest_rate / (1 - pow(1 + $monthly_interest_rate, -$number_of_payments));
                } else {
                    $monthly_payment = $loan_amount / $number_of_payments;
                }

                $schedule = [];
                $balance = $loan_amount;

                for ($month = 1; $month <= $number_of_payments; $month++) {
                    $interest_payment = $balance * $monthly_interest_rate;
                    $principal_payment = $monthly_payment - $interest_payment;
                    $balance -= $principal_payment;

                    $schedule[] = [
                        'month' => $month,
                        'payment' => $monthly_payment,
                        'principal' => $principal_payment,
                        'interest' => $interest_payment,
                        'balance' => $balance
                    ];
                }

                $total_payment = $monthly_payment * $number_of_payments;
                $total_interest = $total_payment - $loan_amount;

                return array($monthly_payment, $total_payment, $total_interest, $schedule);
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $loan_amount = $_POST['loan_amount'];
                $annual_interest_rate = $_POST['annual_interest_rate'];
                $loan_term = $_POST['loan_term'];

                if (is_numeric($loan_amount) && is_numeric($annual_interest_rate) && is_numeric($loan_term)) {
                    list($monthly_payment, $total_payment, $total_interest, $schedule) = calculate_amortization($loan_amount, $annual_interest_rate, $loan_term);
                    echo "<h3>Loan Details</h3>";
                    echo "<p>Monthly Payment: Rp" . number_format($monthly_payment, 2) . "</p>";
                    echo "<p>Total Payment: Rp" . number_format($total_payment, 2) . "</p>";
                    echo "<p>Total Interest: Rp" . number_format($total_interest, 2) . "</p>";

                    echo "<h3>Amortization Schedule</h3>";
                    echo "<table border='1'>";
                    echo "<tr><th>Month</th><th>Payment</th><th>Principal</th><th>Interest</th><th>Balance</th></tr>";
                    foreach ($schedule as $payment) {
                        echo "<tr>";
                        echo "<td>" . $payment['month'] . "</td>";
                        echo "<td>" . number_format($payment['payment'], 2) . "</td>";
                        echo "<td>" . number_format($payment['principal'], 2) . "</td>";
                        echo "<td>" . number_format($payment['interest'], 2) . "</td>";
                        echo "<td>" . number_format($payment['balance'], 2) . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<h3>Error</h3>";
                    echo "<p>Please enter valid numeric values.</p>";
                }
            }
            ?>
        </form>
    </div>
    <?php include "layout/footer.php" ?>
    <script src="assets/script.js"></script>
</body>

</html>