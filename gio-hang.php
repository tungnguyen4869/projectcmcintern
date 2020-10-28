<!DOCTYPE html>
<?php
require_once 'C:\xampp\htdocs\projectthuctap\autoload\autoload.php';
$id = intval($_GET['id']);
$sum = 0;
$user = $db->fetchID('users',$id);
$level = intval($user['level']);

if ($level==1) {
    $sale = 30;
    # code...
}else{
    $sale=0;
}



//if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
  //  echo "<script>alert('giỏ hàng của bạn đang rỗng');location.href='index.php'</script>";}
?>
<?php require 'C:\xampp\htdocs\projectthuctap\layouts\header.php'; ?>  

<div class="col-md-9 bor">
    <section class="box-main1">
        <h3 class="title-main"><a href="">Giỏ hàng của bạn</a> </h3>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Giá</th>
                    <th>Số lượng</th>               
                    <th>Tổng tiền</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody id="tbody">
                <?php $stt=1; foreach ($_SESSION['cart'] as $key => $value): ?>
                    <tr>
                        <td><?= $stt ?></td>
                        <td><?= $value['name'] ?></td>
                        <td><img src="<?= uploads() . "product/" . $value['thunbar'] ?> "width="80px" height="80px" ></td>
                        <td><?= formtPrice($value['gia']) ?></td>
                        <td>
                            <input style="width:70px" type="number" name = 'qty' value="<?= $value['qty'] ?>" 
                                   class="form-control" id="qty" min="0" max="">
                        </td>
                        <td><?= formtPrice($value['qty'] * $value['gia']) ?></td>
                        <td>
                            <a href="remove.php?id=<?= $key ?>" class="btn btn-xs btn-danger">REMOVE</a>
                            <a href="#" class="btn btn-xs btn-info updatecart" data-key=<?php echo $key ?>>UPDATE</a>

                        </td>
                    </tr>

                    <?php $sum += $value['gia'] * $value['qty']; $_SESSION['tongtien']=$sum ?>
                <?php $stt++; endforeach ?>
            </tbody>
        </table>
        <div class="col-md-5 pull-right">
            <ul class="list-group">
                <li class="list-group-item active ">
                    <h3>Thông tin đơn hàng </h3>
                </li>
                <li class="list-group-item">
                    <span class="badge"><?= formtPrice($_SESSION['tongtien']) ?></span>
                    Số tiền
                </li>
                <li class="list-group-item">
                    <span class="badge"> 10%</span>
                    Thuế VAT
                </li>
                <li class="list-group-item">
                    <span class="badge"> <?php echo $sale; echo("%"); ?></span>
                    sale
                </li>
                <li class="list-group-item">
                    <span class="badge"><?php
                        $_SESSION['tongtt'] = $_SESSION['tongtien'] * (110 / 100)*($sale/100);
                        echo formtPrice($_SESSION['tongtt']);
                        ?></span>
                    Tổng tiền cần thanh toán 
                </li>
                <li class="list-group-item">
                    <a href="index.php" class="btn btn-success">Tiếp tục mua hàng</a>
                    <a href="thanh-toan.php" class="btn btn-success">Thanh toán</a>

                </li>     
            </ul>
        </div>
    </section>
</div>
<?php require 'C:\xampp\htdocs\projectthuctap\layouts\footer.php'; ?>      


