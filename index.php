<?php

require_once 'database.php';
session_check();

$currentValue = 0;

$input = [0];


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

  <!-- Header -->
  <div class="header">
    <h3>Calculator</h3>
  </div>

  <div class="main-calc" style="border: 1px solid #ccc; border-radius: 3px; padding: 5px; display: inline-block">
    <div class="calc">
      <form class="calcu" method="post">
        <input type="hidden" name="input" value='<?php echo json_encode($input); ?>' />
        <p style="padding: 3px; margin: 0; min-height: 20px;"><?php echo getInputAsString($input); ?></p>
        <input type="text" value="<?php echo $currentValue; ?>" />
        <table>
          <tr>
            <td><input type="submit" name="ce" value="CE" /></td>
            <td><input type="submit" name="c" value="C" /></td>
            <td><button type="submit" name="back" value="back">&#8592;</button></td>
            <td><button type="submit" name="divide" value="/">&#247;</button></td>
            <td><input type="submit" name="sin" value="sin"></td>
          </tr>
          <tr>
            <td><input type="submit" name="7" value="7" /></td>
            <td><input type="submit" name="8" value="8" /></td>
            <td><input type="submit" name="9" value="9" /></td>
            <td><input type="submit" name="multiply" value="x" /></td>
            <td><input type="submit" name="cos" value="cos"></td>
          </tr>
          <tr>
            <td><input type="submit" name="4" value="4" /></td>
            <td><input type="submit" name="5" value="5" /></td>
            <td><input type="submit" name="6" value="6" /></td>
            <td><input type="submit" name="minus" value="-" /></td>
            <td><input type="submit" name="tan" value="tan"></td>
          </tr>
          <tr>
            <td><input type="submit" name="1" value="1" /></td>
            <td><input type="submit" name="2" value="2" /></td>
            <td><input type="submit" name="3" value="3" /></td>
            <td><input type="submit" name="add" value="+" /></td>
            <td><input type="submit" name="sqrt" value="sqrt"></td>
          </tr>
          <tr>
            <td><input type="submit" name="percent" value="%"></td>
            <td><input type="submit" name="zero" value="0" /></td>
            <td><input type="submit" name="." value="." /></td>
            <td><input type="submit" name="log" value="log"></td>
            <td><input type="submit" name="equal" value="=" /></td>
          </tr>
        </table>
      </form>
    </div>
  </div>


  <td><input type="submit" name="btn" value="ln"></td>





  <script src="assets/script.js"></script>
</body>

</html>