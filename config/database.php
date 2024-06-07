<?php

session_start();

const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASS = '';
const DB_NAME = 'calculator_online';

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if($mysqli->connect_error) {
  echo "koneksi database error";
  die("error!");
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