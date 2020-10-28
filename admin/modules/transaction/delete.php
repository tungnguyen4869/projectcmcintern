<?php

$open == 'transaction';
require 'C:\xampp\htdocs\projectthuctap\admin\autoload\autoload.php';
$id = intval($_GET['id']);
$is_tran = $db->fetchOne("transaction", " id = $id ");
if ($$is_tran  == NULL) {
    $deletettran = $db->delete('transaction', $id);
    if ($deletettran > 0) {
        $_SESSION['success'] = "Xóa dữ liệu thành công";
        redirectAdmin("transaction");
    } else {
        $_SESSION['error'] = "xóa dữ liệu thất bại";
        redirectAdmin("transaction");
    }
} else {
    $_SESSION['error'] = "xóa dữ liệu thất bại";
    redirectAdmin("transaction");
}

