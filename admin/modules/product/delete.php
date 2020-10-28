<?php
$open == 'product';
require 'C:\xampp\htdocs\projectthuctap\admin\autoload\autoload.php';
$id = intval($_GET['id']);
$deleteproduct = $db->delete('product', $id);
if ($deleteproduct > 0) {
    $_SESSION['success'] = "Xóa dữ liệu thành công";
    redirectAdmin("product");
} else {
    $_SESSION['error'] = "xóa dữ liệu thất bại";
    redirectAdmin("product");
}
