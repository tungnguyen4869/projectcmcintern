<?php

require_once 'C:\xampp\htdocs\projectthuctap\autoload\autoload.php';

if (!isset($_SESSION['name_user']) ) {
    echo "<script>alert('bạn cần đăng nhập');location.href='dang-nhap-thanh-vien.php'</script>";
}
    $id = intval(getInput('id'));
    $product = $db->fetchID('product', $id);
    if (!isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['name'] = $product['name'];
        $_SESSION['cart'][$id]['thunbar'] = $product['thunbar'];
        $_SESSION['cart'][$id]['gia'] = ($product['price'] - (($product['price'] * $product['sale']) / 100));
        $_SESSION['cart'][$id]['qty'] = 1;
    } else {
        $_SESSION['cart'][$id]['qty'] += 1;
    }

//    header("location:index.php");
    echo "<script>alert('thêm hàng thành công');location.href='index.php'</script>";

?>