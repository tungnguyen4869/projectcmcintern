<?php
require_once 'C:\xampp\htdocs\projectthuctap\autoload\autoload.php';
$key = intval(getInput('id'));
unset($_SESSION['cart'][$key]);
header("location:gio-hang.php");
