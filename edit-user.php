<?php
$open = 'admin';
require 'C:\xampp\htdocs\projectthuctap\admin\autoload\autoload.php';
$id = intval($_GET['id']);
$edituser = $db->fetchID('users', $id);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        "name" => postInput('name'),
        "email" => postInput('email'),
        "phone" => postInput('phone'),
        "address" => postInput('address')
    ];
    $error = [];
    if (postInput('name') == '') {
        $error['name'] = "Mời bạn nhập đầy đủ tên ";
    }
    if (postInput('email') == '') {
        $error['email'] = "Mời bạn nhập đầy dủ email";
    }

    if (postInput('phone') == '') {
        $error['phone'] = "Mời bạn nhập đầy đủ số điện thoại";
    }
    if (postInput('address') == '') {
        $error['address'] = "Mời bạn nhập đầy đủ địa chỉ";
    }
    if (postInput('email') != $edituser['email']) {
        $is_check = $db->fetchOne("users", "email = '" . $data['email'] . "'");
        if ($is_check != null) {
            $error['email'] = "Email đã tồn tại";
        }
    }
    if (postInput('password') != NULL && postInput('configpassword') != NULL) {
        if (postInput('password') != postInput('configpassword')) {
            $error['password'] = "Password không khớp";
        } else {
            $data['password'] = md5(postInput('password'));
        }
    }

    if (empty($error)) {
        if (isset($_FILES['avatar'])) {
            $file_name = $_FILES['avatar']['name'];
            $file_tmp = $_FILES['avatar']['tmp_name'];
            $file_type = $_FILES['avatar']['type'];
            $file_erro = $_FILES['avatar']['error'];
            if ($file_erro == 0) {
                $part = ROOT . "avarta/";

                $data['avatar'] = $file_name;
            }
        }


        $update = $db->update("users", $data, array('id' => $id));
        if ($update > 0) {
            move_uploaded_file($file_tmp, "../../../public/uploads/avarta/" . $file_name);
           echo $_SESSION['success'] = "Cập nhật thành công";
           unset($_SESSION['success']);
            redirect("index.php");
        } else {
           echo $_SESSION['error'] = "Cập nhật thất bại";
           unset($_SESSION['error']);
        }
    }
}

?>

<style type="text/css">
    body {
        margin: 0;
        padding: 0;
        background-color: #17a2b8;
        height: 100vh;
    }
    #login .container #login-row #login-column #login-box {
        margin-top: 120px;
        max-width: 600px;
        height: 320px;
        border: 1px solid #9C9C9C;
        background-color: #EAEAEA;
    }
    #login .container #login-row #login-column #login-box #login-form {
        padding: 20px;
    }
    #login .container #login-row #login-column #login-box #login-form #register-link {
        margin-top: -85px;
    }
</style>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<body>
    <form class="form-horizontal" action="#" method="POST" enctype="multipart/form-data"> 
   <div class="form-group">
    <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger">
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </div>
            <?php endif; ?>
                    <label for="inputNamel3" class="col-sm-2 control-label">Họ và tên:</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" value="<?php echo $edituser['name'] ?>" class="form-control" id="inputEmail3" placeholder="Tên">
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
                        <input type="email" name="email" class="form-control"  value="<?= $edituser['email']?>" id="inputEmail3" placeholder="nguyenvana@gmail.com">    
                         <?php if (isset($error['email'])): ?>                                                 
                            <p class = "text-danger"><?= $error['email'] ?></p>
                        <?php endif ?>
                       
                    </div>
                </div>   
                <div class="form-group">
                    <label for="inputNamel3" class="col-sm-2 control-label">Addres:</label>
                    <div class="col-sm-10">
                        <input type="text" name="address" class="form-control"  value="<?= $edituser['address']?>" id="inputEmail3" placeholder="Tân Kỳ- Tứ Kỳ - Hải Dương">    
                         <?php if (isset($error['address'])): ?>                                                 
                            <p class = "text-danger"><?= $error['address'] ?></p>
                        <?php endif ?>
                    </div>
                </div> 
                <div class="form-group">
                    <label for="inputNamel3" class="col-sm-2 control-label">avatar</label>
                    <div class="col-sm-3">
                        <input type="file" name="avatar" class="form-control" id="inputEmail3">    
                       
                    </div>
                </div>   
                <div class="form-group">
                    <label for="inputNamel3" class="col-sm-2 control-label">Phone:</label>
                    <div class="col-sm-3">
                        <input type="number" name="phone" value="<?= $edituser['phone'] ?>" class="form-control" id="inputEmail3" placeholder="1234567890">   
                        <?php if (isset($error['phone'])): ?>                                                 
                            <p class = "text-danger"><?= $error['phone'] ?></p>
                        <?php endif ?>
                    </div>                                      
                </div>  
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-info">Lưu</button>
                    </div>
                </div>

                </form>
</body>