<?php

$open == 'admin';
require 'C:\xampp\htdocs\projectthuctap\admin\autoload\autoload.php';
$id = intval($_GET['id']);
$deleteusers = $db->delete('users', $id);
if ($deleteusers > 0) {
    $_SESSION['success'] = "Xóa dữ liệu thành công";
    redirectAdmin("user");
} else {
    $_SESSION['error'] = "xóa dữ liệu thất bại";
    redirectAdmin("user");
}
