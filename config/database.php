<?php

session_start();

$host = 'localhost';
$db   = 'calculator_online';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

function session_check($login=false) {
  if($login) {
    if(isset($_SESSION['username'])) {
      header('Location: index.php');
      exit;
    }
  } else {
    if(!isset($_SESSION['username'])) {
      $_SESSION['alert'] = 'Login terlebih dahulu!';
      header('Location: login.php');
      exit;
    }  
  }
}