<!DOCTYPE html>
<?php
require_once 'C:\xampp\htdocs\projectthuctap\autoload\autoload.php';
$user = $db->fetchID("users", intval($_SESSION['id_user']));
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        'amount' => $_SESSION['tongtt'],
        'users_id' => $_SESSION['id_user'],
        'note' => postInput('note'),
    ];
    $idtran = $db->insert("transaction", $data);
    if ($idtran > 0) {
        foreach ($_SESSION['cart'] as $key => $value) {
            $data2 = [
                        'transaction_id' => $idtran,
                        'product_id' => $key,
                        'qty' => $value['qty'],
                        'price' => $value['gia'],
            ];
            $id_insert = $db->insert("orders", $data2);
        }
        $_SESSION['success'] = "Lưu thông tin đơn hàng thành công";
        header("location:thong-bao.php");
    }
}
?>
<?php require 'C:\xampp\htdocs\projectthuctap\layouts\header.php'; ?>  
<div class="col-md-9 bor">
    <section class="box-main1">
        <h3 class="title-main"><a href="">Thanh toán đơn hàng</a> </h3>
        <form class="form-horizontal" action="#" method="POST" enctype="multipart/form-data">              
            <div class="form-group">
                <label for="inputNamel3" class="col-sm-2 control-label">Họ và tên:</label>
                <div class="col-sm-10">
                    <input type="text" name="name" readonly="" value="<?php echo $user['name']; ?>" class="form-control" id="inputEmail3" placeholder="Tên">
                </div>         
            </div>               
            <div class="form-group">
                <label for="inputNamel3" class="col-sm-2 control-label">Email:</label>
                <div class="col-sm-10">
                    <input type="text" name="email" readonly="" value="<?php echo $user['email']; ?>" class="form-control" id="inputEmail3" placeholder="nguyenvanA@gmail.com">


                </div>
            </div> 
            <div class="form-group">
                <label for="inputNamel3" class="col-sm-2 control-label">Addres:</label>
                <div class="col-sm-10">
                    <input type="text" name="address" class="form-control" readonly=""  value="<?= $user['address'] ?>" id="inputEmail3" placeholder="Tân Kỳ - Tứ Kỳ - Hải Dương">    

                </div>
            </div> 
            <div class="form-group">
                <label for="inputNamel3" class="col-sm-2 control-label">Số tiền:</label>
                <div class="col-sm-10">
                    <input type="text" name="address" class="form-control" readonly=""  value="<?= formtPrice($_SESSION['tongtt']) ?>" id="inputEmail3" >    

                </div>
            </div>      
            <div class="form-group">
                <label for="inputNamel3" class="col-sm-2 control-label">Phone:</label>
                <div class="col-sm-3">
                    <input type="number" name="phone" readonly="" value="<?= $user['phone'] ?>" class="form-control" id="inputEmail3" placeholder="0123456789">   

                </div>                                      
            </div>  
            <div class="form-group">
                <label for="inputNamel3" class="col-sm-2 control-label">Ghi chú:</label>
                <div class="col-sm-10">
                    <input type="text" name="note"   class="form-control" id="inputEmail3" placeholder="">   

                </div>                                      
            </div>  
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-info">Xác nhận</button>
                </div>
            </div>
        </form>
    </section>
</div>
<?php require 'C:\xampp\htdocs\projectthuctap\layouts\footer.php'; ?>      


