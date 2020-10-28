<?php

require_once 'C:\xampp\htdocs\projectthuctap\autoload\autoload.php';
$key = intval(getInput("key"));
$qty = intval(getInput("qty"));
$sql = "SELECT*FROM product WHERE id = $key";
$product = $db->fetchsql($sql);


$_SESSION['cart'][$key]['qty'] = $qty;


echo "<script>alert('thành công');location.href='index.php'</script>";






