<!DOCTYPE html>
<?php
require_once 'C:\xampp\htdocs\projectthuctap\autoload\autoload.php';

$data = [
    "email" => postInput('email'),
    "password" => md5(postInput('password')),
];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $error = [];
    if (postinput('email') == '') {
        $error['email'] = "Mời bạn nhập đầy dủ email";
    }
    if (postinput('password') == '') {
        $error['password'] = "Mời bạn nhập đầy đủ password";
    }
    if (empty($error)) {
        echo 'aa';
        $check = $db->fetchOne("users", "email='" . $data['email'] . "'AND password = '" . $data['password'] . "'");
        if ($check != NULL) {
            $_SESSION['name_user'] = $check['name'];
            $_SESSION['id_user'] = $check['id'];
            echo "<script>alert('đăng nhập thành công');location.href='index.php'</script>";
            //header("location:index.php");
        } 
    }
}
?>
<?php require 'C:\xampp\htdocs\projectthuctap\layouts\header.php'; ?>  
<div class="col-md-9 bor">
    <section class="box-main1">
        <h3 class="title-main"><a href="">Đăng nhập thành viên</a> </h3>
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success'])
                ?>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-10">
                <form class="form-horizontal" action="#" method="POST" enctype="multipart/form-data">   
                    <div class="form-group">
                        <label for="inputNamel3" class="col-sm-2 control-label">Email:</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" class="form-control" id="inputEmail3" placeholder="phanphuc@gmail.com">
                            <?php if (isset($error['email'])): ?>                                                 
                                <p class = "text-danger"><?= $error['email'] ?></p>
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
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-info">Đăng nhập</button>
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


