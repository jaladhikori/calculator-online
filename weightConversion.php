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
        <h3>Weight and Mass Converter</h3>
        <form action="" method="post">
            <label for="value">Value:</label>
            <input type="text" id="value" name="value" required><br><br>

            <label for="from_unit">From:</label>
            <select id="from_unit" name="from_unit">
                <option value="kilograms" <?php if (isset($_POST['from_unit']) && $_POST['from_unit'] == 'kilograms') echo 'selected'; ?>>Kilograms</option>
                <option value="grams" <?php if (isset($_POST['from_unit']) && $_POST['from_unit'] == 'grams') echo 'selected'; ?>>Grams</option>
                <option value="pounds" <?php if (isset($_POST['from_unit']) && $_POST['from_unit'] == 'pounds') echo 'selected'; ?>>Pounds</option>
                <option value="ounces" <?php if (isset($_POST['from_unit']) && $_POST['from_unit'] == 'ounces') echo 'selected'; ?>>Ounces</option>
            </select><br><br>

            <label for="to_unit">To:</label>
            <select id="to_unit" name="to_unit">
                <option value="kilograms" <?php if (isset($_POST['to_unit']) && $_POST['to_unit'] == 'kilograms') echo 'selected'; ?>>Kilograms</option>
                <option value="grams" <?php if (isset($_POST['to_unit']) && $_POST['to_unit'] == 'grams') echo 'selected'; ?>>Grams</option>
                <option value="pounds" <?php if (isset($_POST['to_unit']) && $_POST['to_unit'] == 'pounds') echo 'selected'; ?>>Pounds</option>
                <option value="ounces" <?php if (isset($_POST['to_unit']) && $_POST['to_unit'] == 'ounces') echo 'selected'; ?>>Ounces</option>
            </select><br><br>

            <input type="submit" value="Convert">


            <?php
            function convert_weight($value, $from_unit, $to_unit)
            {
                // Conversion factors relative to kilograms
                $conversion_factors = array(
                    "kilograms" => 1,
                    "grams" => 0.001,
                    "pounds" => 0.453592,
                    "ounces" => 0.0283495
                );

                // Convert the input value to kilograms first
                if (array_key_exists($from_unit, $conversion_factors)) {
                    $value_in_kilograms = $value * $conversion_factors[$from_unit];
                } else {
                    return "Invalid unit";
                }

                // Convert from kilograms to the target unit
                if (array_key_exists($to_unit, $conversion_factors)) {
                    $converted_value = $value_in_kilograms / $conversion_factors[$to_unit];
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
                    $converted_value = convert_weight($value, $from_unit, $to_unit);
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