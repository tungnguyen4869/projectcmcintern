<!DOCTYPE html>
<?php
require_once 'C:\xampp\htdocs\banhang\autoload\autoload.php';
unset($_SESSION['cart']);
unset($_SESSION['tongtt']);
?>
<?php require 'C:\xampp\htdocs\banhang\layouts\header.php'; ?>  
<div class="col-md-9 bor">
    <section class="box-main1">
        <h3 class="title-main"><a href="">Thông báo thanh toán</a> </h3>
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success'])
                ?>
            </div>
        <?php endif; ?>
        <a href="index.php" class="btn btn-success"> Trở về trang chủ </a>
    </section>
</div>
<?php require 'C:\xampp\htdocs\banhang\layouts\footer.php'; ?>      
