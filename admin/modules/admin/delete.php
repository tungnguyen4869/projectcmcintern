<?php

$open == 'admin';
require 'C:\xampp\htdocs\projectthuctap\admin\autoload\autoload.php';
$id = intval($_GET['id']);
$deleteadmin = $db->delete('admin', $id);
if ($deleteadmin > 0) {
    $_SESSION['success'] = "Xóa dữ liệu thành công";
    redirectAdmin("admin");
} else {
    $_SESSION['error'] = "xóa dữ liệu thất bại";
    redirectAdmin("admin");
}
