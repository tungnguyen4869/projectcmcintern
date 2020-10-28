<?php

$open = 'category';
require 'C:\xampp\htdocs\projectthuctap\admin\autoload\autoload.php';
$id = intval($_GET['id']);
$editcategory = $db->fetchID('category', $id);
if (empty($editcategory)) {
    $_SESSION['error'] = "Dữ liệu không tồn tại";
    redirectAdmin("category");
}
$home = $editcategory['home'] == 1 ? 0 : 1;
$id_update = $db->update("category", array("home" => $home), array("id" => $id));
if ($id_update > 0) {
    $_SESSION['success'] = "Cập nhật thành công";
    redirectAdmin("category");
} else {
    $_SESSION['error'] = "Dữ liệu không thay đổi";
    redirectAdmin("category");
}