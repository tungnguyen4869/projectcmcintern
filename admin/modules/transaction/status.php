<?php

$open = 'transaction';
require 'C:\xampp\htdocs\projectthuctap\admin\autoload\autoload.php';
$id = intval($_GET['id']);
$edittransaction = $db->fetchID('transaction', $id);
if (empty($edittransaction)) {
    $_SESSION['error'] = "Dữ liệu không tồn tại";
    redirectAdmin("transaction");
}
if ($edittransaction['status'] == 1) {
    $_SESSION['error'] = "Đơn hàng đã được xử lý";
    redirectAdmin("transaction");
}
$status = 1;
$id_update = $db->update("transaction", array("status" => $status), array("id" => $id));
if ($id_update > 0) {
    $_SESSION['success'] = "Cập nhật thành công";
    $sql = "SELECT product_id,qty FROM orders WHERE  transaction_id = $id";
    $order = $db->fetchsql($sql);
    foreach ($order as $item) {
        $idproduct = intval($item['product_id']);
        $product = $db->fetchID("product",$idproduct);
        $number = $product['number']-$item['qty'];
        $up_pro = $db->update("product",array("number"=>$number,"pay"=>$product['pay']+1),array("id"=>$idproduct));
        
    }
    redirectAdmin("transaction");
} else {
    $_SESSION['error'] = "Dữ liệu không thay đổi";
    redirectAdmin("transaction");
}

