<?php

require_once('database.php');
session_check();

$currentValue = 0;

$input = [];


function getInputAsString($values)
{
  $o = "";
  foreach ($values as $value) {
    $o .= $value;
  }
  return $o;
}

function calculateInput($userInput)
{
  // format user input
  $arr = [];
  $char = "";
  foreach ($userInput as $num) {
    if (is_numeric($num) || $num == ".") {
      $char .= $num;
    } else if (!is_numeric($num)) {
      if (!empty($char)) {
        $arr[] = $char;
        $char = "";
      }
      $arr[] = $num;
    }
  }
  if (!empty($char)) {
    $arr[] = $char;
  }
  // calculate user input

  $current = 0;
  $action = null;
  for ($i = 0; $i <= count($arr) - 1; $i++) {
    if (is_numeric($arr[$i])) {
      if ($action) {
        if ($action == "+") {
          $current = $current + $arr[$i];
        }
        if ($action == "-") {
          $current = $current - $arr[$i];
        }
        if ($action == "x") {
          $current = $current * $arr[$i];
        }
        if ($action == "/") {
          $current = $current / $arr[$i];
        }
        $action = null;
      } else {
        if ($current == 0) {
          $current = $arr[$i];
        }
      }
    } else {
      $action = $arr[$i];
    }
  }
  return $current;
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (isset($_POST['input'])) {
    $input = json_decode($_POST['input']);
  }



  if (isset($_POST)) {
    foreach ($_POST as $key => $value) {
      if ($key == 'equal') {
        $currentValue = calculateInput($input);
        $input = [];
        $input[] = $currentValue;
      } elseif ($key == "ce") {
        array_pop($input);
      } elseif ($key == "c") {
        $input = [];
        $currentValue = 0;
      } elseif ($key == "back") {
        $lastPointer = count($input) - 1;
        if (is_numeric($input[$lastPointer])) {
          array_pop($input);
        }
      } elseif ($key != 'input') {
        $input[] = $value;
      }
    }
  }
}
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


  <div class="main-calc">
    <h3>My Calculator</h3>
    <div class="calc">
      <form class="calcu" method="post">
        <input type="hidden" value name="input" value='<?php echo json_encode($input); ?>' />
        <p><?php echo getInputAsString($input); ?></p>
        <input type="text" value="<?php echo $currentValue; ?>" />
        <table>
          <tr>
            <td><input class="calcu" type="submit" name="ce" value="CE" /></td>
            <td><input class="calcu" type="submit" name="c" value="C" /></td>
            <td><button class="calcu" type="submit" name="back" value="back">&#8592;</button></td>
            <td><button class="calcu" type="submit" name="divide" value="/">&#247;</button></td>
          </tr>
          <tr>
            <td><input type="submit" name="7" value="7" /></td>
            <td><input type="submit" name="8" value="8" /></td>
            <td><input type="submit" name="9" value="9" /></td>
            <td><input type="submit" name="multiply" value="x" /></td>
          </tr>
          <tr>
            <td><input type="submit" name="4" value="4" /></td>
            <td><input type="submit" name="5" value="5" /></td>
            <td><input type="submit" name="6" value="6" /></td>
            <td><input type="submit" name="minus" value="-" /></td>
          </tr>
          <tr>
            <td><input type="submit" name="1" value="1" /></td>
            <td><input type="submit" name="2" value="2" /></td>
            <td><input type="submit" name="3" value="3" /></td>
            <td><input type="submit" name="add" value="+" /></td>
          </tr>
          <tr>
            <td><button type="submit" name="plusminus" value="plusminus">&#177;</button></td>
            <td><input type="submit" name="zero" value="0" /></td>
            <td><input type="submit" name="." value="." /></td>
            <td><input type="submit" name="equal" value="=" /></td>
          </tr>
        </table>
      </form>
    </div>
  </div>

  <div class="calculator">
    <form method="post" action="">
      <table>
        <tr>
          <td colspan="4">
            <input type="text" name="display" id="display" value="<?php echo isset($_POST['display']) ? htmlspecialchars($_POST['display']) : '0'; ?>" disabled>
            <input type="hidden" name="hidden_display" value="<?php echo isset($_POST['display']) ? htmlspecialchars($_POST['display']) : '0'; ?>">
          </td>
        </tr>
        <tr>
          <td><input type="submit" name="btn" value="7"></td>
          <td><input type="submit" name="btn" value="8"></td>
          <td><input type="submit" name="btn" value="9"></td>
          <td><input type="submit" name="btn" value="/"></td>
        </tr>
        <tr>
          <td><input type="submit" name="btn" value="4"></td>
          <td><input type="submit" name="btn" value="5"></td>
          <td><input type="submit" name="btn" value="6"></td>
          <td><input type="submit" name="btn" value="*"></td>
        </tr>
        <tr>
          <td><input type="submit" name="btn" value="1"></td>
          <td><input type="submit" name="btn" value="2"></td>
          <td><input type="submit" name="btn" value="3"></td>
          <td><input type="submit" name="btn" value="-"></td>
        </tr>
        <tr>
          <td><input type="submit" name="btn" value="0"></td>
          <td><input type="submit" name="btn" value="."></td>
          <td><input type="submit" name="btn" value="C"></td>
          <td><input type="submit" name="btn" value="+"></td>
        </tr>
        <tr>
          <td colspan="4"><input type="submit" name="btn" value="="></td>
        </tr>
      </table>
    </form>
  </div>
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $display = $_POST['hidden_display'];
    $button = $_POST['btn'];

    if ($button == "C") {
      $display = "0";
    } elseif ($button == "=") {
      try {
        $result = eval("return $display;");
        $display = $result;
      } catch (Exception $e) {
        $display = "Error";
      }
    } else {
      if ($display == "0" || $display == "Error") {
        $display = $button;
      } else {
        $display .= $button;
      }
    }

    echo '<script>document.getElementById("display").value = "' . htmlspecialchars($display) . '";</script>';
  }
  ?>

  <script src="assets/script.js"></script>
</body>

</html>