<?php
require_once 'database.php';

session_check();

unset($_SESSION['username']);

header('Location: login.php');
exit;
