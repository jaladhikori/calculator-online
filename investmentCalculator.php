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
        <h3>Investment Calculator</h3>
        <form action="" method="post">
            <label for="initial_investment">Initial Investment Amount:</label>
            <input type="text" id="initial_investment" name="initial_investment" required><br><br>

            <label for="annual_interest_rate">Annual Interest Rate (%):</label>
            <input type="text" id="annual_interest_rate" name="annual_interest_rate" required><br><br>

            <label for="years">Number of Years:</label>
            <input type="text" id="years" name="years" required><br><br>

            <label for="contribution">Monthly Contribution (optional):</label>
            <input type="text" id="contribution" name="contribution"><br><br>

            <input type="submit" value="Calculate">


            <?php
            function calculate_investment($initial_investment, $annual_interest_rate, $years, $monthly_contribution)
            {
                $monthly_interest_rate = $annual_interest_rate / 100 / 12;
                $number_of_months = $years * 12;

                $future_value = $initial_investment * pow(1 + $monthly_interest_rate, $number_of_months);

                if ($monthly_contribution > 0) {
                    for ($i = 1; $i <= $number_of_months; $i++) {
                        $future_value += $monthly_contribution * pow(1 + $monthly_interest_rate, $number_of_months - $i);
                    }
                }

                return $future_value;
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $initial_investment = $_POST['initial_investment'];
                $annual_interest_rate = $_POST['annual_interest_rate'];
                $years = $_POST['years'];
                $monthly_contribution = $_POST['contribution'];

                if (is_numeric($initial_investment) && is_numeric($annual_interest_rate) && is_numeric($years)) {
                    $monthly_contribution = is_numeric($monthly_contribution) ? $monthly_contribution : 0;
                    $future_value = calculate_investment($initial_investment, $annual_interest_rate, $years, $monthly_contribution);
                    echo "<h3>Investment Details</h3>";
                    echo "<p>Future Value: Rp" . number_format($future_value, 2) . "</p>";
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