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
        <h3>Unit Conversion</h3>
    </div>

    <div class="main-container">
        <h3>Length Converter</h3>
        <form action="" method="post">
            <label for="value">Value:</label>
            <input type="text" id="value" name="value" required><br><br>

            <label for="from_unit">From:</label>
            <select id="from_unit" name="from_unit">
                <option value="meters" <?php if (isset($_POST['from_unit']) && $_POST['from_unit'] == 'meters') echo 'selected'; ?>>Meters</option>
                <option value="kilometers" <?php if (isset($_POST['from_unit']) && $_POST['from_unit'] == 'kilometers') echo 'selected'; ?>>Kilometers</option>
                <option value="feet" <?php if (isset($_POST['from_unit']) && $_POST['from_unit'] == 'feet') echo 'selected'; ?>>Feet</option>
                <option value="miles" <?php if (isset($_POST['from_unit']) && $_POST['from_unit'] == 'miles') echo 'selected'; ?>>Miles</option>
            </select><br><br>

            <label for="to_unit">To:</label>
            <select id="to_unit" name="to_unit">
                <option value="meters" <?php if (isset($_POST['to_unit']) && $_POST['to_unit'] == 'meters') echo 'selected'; ?>>Meters</option>
                <option value="kilometers" <?php if (isset($_POST['to_unit']) && $_POST['to_unit'] == 'kilometers') echo 'selected'; ?>>Kilometers</option>
                <option value="feet" <?php if (isset($_POST['to_unit']) && $_POST['to_unit'] == 'feet') echo 'selected'; ?>>Feet</option>
                <option value="miles" <?php if (isset($_POST['to_unit']) && $_POST['to_unit'] == 'miles') echo 'selected'; ?>>Miles</option>
            </select><br><br>

            <input type="submit" value="Convert">

            <?php
            function convert_length($value, $from_unit, $to_unit)
            {
                // Conversion factors relative to meters
                $conversion_factors = array(
                    "meters" => 1,
                    "kilometers" => 1000,
                    "feet" => 0.3048,
                    "miles" => 1609.34
                );

                // Convert the input value to meters first
                if (array_key_exists($from_unit, $conversion_factors)) {
                    $value_in_meters = $value * $conversion_factors[$from_unit];
                } else {
                    return "Invalid unit";
                }

                // Convert from meters to the target unit
                if (array_key_exists($to_unit, $conversion_factors)) {
                    $converted_value = $value_in_meters / $conversion_factors[$to_unit];
                } else {
                    return "Invalid unit";
                }

                return $converted_value;
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $value = $_POST['value'];
                $from_unit = $_POST['from_unit'];
                $to_unit = $_POST['to_unit'];

                if (is_numeric($value)) {
                    $converted_value = convert_length($value, $from_unit, $to_unit);
                    echo "<h3>Conversion Result</h3>";
                    echo "<p>$value $from_unit is equal to $converted_value $to_unit</p>";
                } else {
                    echo "<h3>Error</h3>";
                    echo "<p>Please enter a valid number.</p>";
                }
            }
            ?>
        </form>
    </div>

    <script src="assets/script.js"></script>
</body>

</html>