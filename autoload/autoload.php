<?php

session_start();
require 'C:\xampp\htdocs\projectthuctap\libraries\database.php';
require 'C:\xampp\htdocs\projectthuctap\libraries\function.php';
$db = new Database;
define("ROOT", $_SERVER['DOCUMENT_ROOT'] . "../../../public/uploads/");
$category = $db->fetchAll("category");
$sqlNew = "SELECT * FROM product WHERE 1 ORDER BY ID DESC LIMIT 3";
$productNew = $db->fetchsql($sqlNew);
$sqlpay = "SELECT * FROM product WHERE 1 ORDER BY PAY DESC LIMIT 3";
$productPay = $db->fetchsql($sqlpay);

