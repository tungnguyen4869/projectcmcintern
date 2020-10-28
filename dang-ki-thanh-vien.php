
<?php
require_once 'C:\xampp\htdocs\projectthuctap\autoload\autoload.php';

if(isset($_SESSION['id_user'])){
    echo "<script>alert('bạn đã có tài khoản');location.href='index.php'</script>";
}
$data = [
    "name" => postInput('name'),
    "email" => postInput('email'),
    "phone" => postInput('phone'),
    "password" => md5(postInput('password')),
    "address" => postInput('address'),
];
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $error = [];
    if (postinput('name') == '') {
        $error['name'] = "Mời bạn nhập đầy đủ tên sản phẩm";
    }
    if (postinput('email') == '') {
        $error['email'] = "Mời bạn nhập đầy dủ email";
    } else {
        $is_check = $db->fetchOne("users", "email = '" . $data['email'] . "'");
        if ($is_check != null) {
            $error['email'] = "Email đã tồn tại";
        }
    }
    if (postinput('phone') == '') {
        $error['phone'] = "Mời bạn nhập đầy đủ số điện thoại";
    }
    if (postinput('password') == '') {
        $error['password'] = "Mời bạn nhập đầy đủ password";
        $ok = 1;
    }
    if (postinput('address') == '') {
        $error['address'] = "Mời bạn nhập đầy đủ địa chỉ";
    }
    if ($data['password'] != md5(postInput('configpassword'))) {
        $error['password'] = "Password không khớp";
    }


    if (empty($error)) {
        $id_insert = $db->insert("users", $data);
        if ($id_insert > 0) {
            $_SESSION['success'] = "Chúc mừng bạn đã đăng kí thành công";
            header("location:dang-nhap-thanh-vien.php");
        } else {
            $_SESSION['error'] = "Bạn đã đăng kí thất bại";
        }
    }
}
?>
<?php require 'C:\xampp\htdocs\projectthuctap\layouts\header.php'; ?>  
<div class="col-md-9 bor">
    <section class="box-main1">
        <h3 class="title-main"><a href="">Đăng kí thành viên</a> </h3>
        <div class="row">
            <div class="col-md-10">
                <form class="form-horizontal" action="#" method="POST" enctype="multipart/form-data">              
                    <div class="form-group">
                        <label for="inputNamel3" class="col-sm-2 control-label">Họ và tên:</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" value="<?php echo $data['name']; ?>" class="form-control" id="inputEmail3" placeholder="Tên">

                            <?php if (isset($error['name'])): ?>                                                 
                                <p class = "text-danger"><?= $error['name'] ?></p>
                            <?php endif ?>

                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="inputNamel3" class="col-sm-2 control-label">Password:</label>
                        <div class="col-sm-10">
                            <input type="password" name="password"  class="form-control" id="inputEmail3" placeholder="********">

                            <?php if (isset($error['password'])): ?>                                                 
                                <p class = "text-danger"><?= $error['password'] ?></p>
                            <?php endif ?>

                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="inputNamel3" class="col-sm-2 control-label">ConfigPassword:</label>
                        <div class="col-sm-10">
                            <input type="password" name="configpassword"  required="" class="form-control" id="inputEmail3" placeholder="********">
                            <?php if (isset($error['configpassword'])): ?>                                                 
                                <p class = "text-danger"><?= $error['configpassword'] ?></p>
                            <?php endif ?>

                        </div>
                    </div>             
                    <div class="form-group">
                        <label for="inputNamel3" class="col-sm-2 control-label">Email:</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" value="<?php echo $data['email']; ?>" class="form-control" id="inputEmail3" placeholder="nguyenvanA@gmail.com">
                            <?php if (isset($error['email'])): ?>                                                 
                                <p class = "text-danger"><?= $error['email'] ?></p>
                            <?php endif ?>

                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="inputNamel3" class="col-sm-2 control-label">Addres:</label>
                        <div class="col-sm-10">
                            <input type="text" name="address" class="form-control"  value="<?= $data['address'] ?>" id="inputEmail3" placeholder="Tân Kỳ - Tứ Kỳ - Hải Dương">    
                            <?php if (isset($error['address'])): ?>                                                 
                                <p class = "text-danger"><?= $error['address'] ?></p>
                            <?php endif ?>
                        </div>
                    </div>                  
                    <div class="form-group">
                        <label for="inputNamel3" class="col-sm-2 control-label">Phone:</label>
                        <div class="col-sm-3">
                            <input type="number" name="phone" value="<?= $data['phone'] ?>" class="form-control" id="inputEmail3" placeholder="1234567890">   
                            <?php if (isset($error['phone'])): ?>                                                 
                                <p class = "text-danger"><?= $error['phone'] ?></p>
                            <?php endif ?>
                        </div>                                      
                    </div>  
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-info">Đăng kí</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger">
        <?php
        echo $_SESSION['error'];
        unset($_SESSION['error'])
        ?>
    </div>
<?php endif; ?>
<?php require 'C:\xampp\htdocs\projectthuctap\layouts\footer.php'; ?>      


