<?php

$open == 'category';
require 'C:\xampp\htdocs\projectthuctap\admin\autoload\autoload.php';
$id = intval($_GET['id']);
$is_product = $db->fetchOne("product", " category_id = $id ");
if ($is_product == NULL) {
    $deletetcategory = $db->delete('category', $id);
    if ($deletetcategory > 0) {
        $_SESSION['success'] = "Xóa dữ liệu thành công";
        redirectAdmin("category");
    } else {
        $_SESSION['error'] = "xóa dữ liệu thất bại";
        redirectAdmin("category");
    }
} else {
    $_SESSION['error'] = "xóa dữ liệu thất bại";
    redirectAdmin("category");
}

