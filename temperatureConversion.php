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
        <h3>Temperature Converter</h3>
        <form action="" method="post">
            <label for="value">Value:</label>
            <input type="text" id="value" name="value" required><br><br>

            <label for="from_unit">From:</label>
            <select id="from_unit" name="from_unit">
                <option value="celsius" <?php if (isset($_POST['from_unit']) && $_POST['from_unit'] == 'celsius') echo 'selected'; ?>>Celsius</option>
                <option value="fahrenheit" <?php if (isset($_POST['from_unit']) && $_POST['from_unit'] == 'fahrenheit') echo 'selected'; ?>>Fahrenheit</option>
                <option value="kelvin" <?php if (isset($_POST['from_unit']) && $_POST['from_unit'] == 'kelvin') echo 'selected'; ?>>Kelvin</option>
            </select><br><br>

            <label for="to_unit">To:</label>
            <select id="to_unit" name="to_unit">
                <option value="celsius" <?php if (isset($_POST['to_unit']) && $_POST['to_unit'] == 'celsius') echo 'selected'; ?>>Celsius</option>
                <option value="fahrenheit" <?php if (isset($_POST['to_unit']) && $_POST['to_unit'] == 'fahrenheit') echo 'selected'; ?>>Fahrenheit</option>
                <option value="kelvin" <?php if (isset($_POST['to_unit']) && $_POST['to_unit'] == 'kelvin') echo 'selected'; ?>>Kelvin</option>
            </select><br><br>

            <input type="submit" value="Convert">


            <?php
            function convert_temperature($value, $from_unit, $to_unit)
            {
                switch ($from_unit) {
                    case "celsius":
                        if ($to_unit == "fahrenheit") {
                            return ($value * 9 / 5) + 32;
                        } elseif ($to_unit == "kelvin") {
                            return $value + 273.15;
                        }
                        break;
                    case "fahrenheit":
                        if ($to_unit == "celsius") {
                            return ($value - 32) * 5 / 9;
                        } elseif ($to_unit == "kelvin") {
                            return ($value - 32) * 5 / 9 + 273.15;
                        }
                        break;
                    case "kelvin":
                        if ($to_unit == "celsius") {
                            return $value - 273.15;
                        } elseif ($to_unit == "fahrenheit") {
                            return ($value - 273.15) * 9 / 5 + 32;
                        }
                        break;
                }
                return $value; // If same unit, return the value
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $value = $_POST['value'];
                $from_unit = $_POST['from_unit'];
                $to_unit = $_POST['to_unit'];

                if (is_numeric($value)) {
                    $converted_value = convert_temperature($value, $from_unit, $to_unit);
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

    <?php include "layout/footer.php" ?>
    <script src="assets/script.js"></script>
</body>

</html>