<?php
$open = 'admin';
require 'C:\xampp\htdocs\projectthuctap\admin\autoload\autoload.php';
$id = intval($_GET['id']);
$editadmin = $db->fetchID('admin', $id);
if (empty($editadmin)) {
    $_SESSION['error'] = "Dữ liệu không tồn tại";
    redirectAdmin("admin");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        "name" => postInput('name'),
        "email" => postInput('email'),
        "phone" => postInput('phone'),
        "address" => postInput('address'),
        "level" => postInput('level')
    ];
    $error = [];
    if (postinput('name') == '') {
        $error['name'] = "Mời bạn nhập đầy đủ tên ";
    }
    if (postinput('email') == '') {
        $error['email'] = "Mời bạn nhập đầy dủ email";
    }

    if (postinput('phone') == '') {
        $error['phone'] = "Mời bạn nhập đầy đủ số điện thoại";
    }
    if (postinput('address') == '') {
        $error['address'] = "Mời bạn nhập đầy đủ địa chỉ";
    }
    if (postInput('email') != $editadmin['email']) {
        $is_check = $db->fetchOne("admin", "email = '" . $data['email'] . "'");
        if ($is_check != null) {
            $error['email'] = "Email đã tồn tại";
        }
    }
    if (postInput('password') != NULL && postInput('configpassword') != NULL) {
        if (postInput('password') != postInput('configpassword')) {
            $error['password'] = "Password không khớp";
        } else {
            $data['password'] = postInput('password');
        }
    }

    if (empty($error)) {
        $update = $db->update("admin", $data, array('id' => $id));
        if ($update > 0) {
            $_SESSION['success'] = "Cập nhật thành công";
            redirectAdmin("admin");
        } else {
            $_SESSION['error'] = "Cập nhật thất bại";
        }
    }
}
?>
<?php require 'C:\xampp\htdocs\projectthuctap\admin\layouts\header.php'; ?>                   
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Thêm mới Admin                           
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
            </li>
            <li>
                <i></i> <a href="">Sản phẩm</a>
            </li>  
            <li class="active">
                <i class="fa fa-file"></i> Thêm mới
            </li>  
        </ol> 
        <div class="clearfix">
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger">
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error'])
                    ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
    <div class="row">
        <div class="col-md-10">
            <form class="form-horizontal" action="#" method="POST" enctype="multipart/form-data">              
                <div class="form-group">
                    <label for="inputNamel3" class="col-sm-2 control-label">Họ và tên:</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" value="<?php echo $editadmin['name']; ?>" class="form-control" id="inputEmail3" placeholder="Tên">

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
                        <input type="email" name="email" class="form-control"  value="<?= $editadmin['email'] ?>" id="inputEmail3" placeholder="nguyenvana@gmail.com">    
                        <?php if (isset($error['email'])): ?>                                                 
                            <p class = "text-danger"><?= $error['email'] ?></p>
                        <?php endif ?>
                    </div>
                </div>   
                <div class="form-group">
                    <label for="inputNamel3" class="col-sm-2 control-label">Addres:</label>
                    <div class="col-sm-10">
                        <input type="text" name="address" class="form-control"  value="<?= $editadmin['address'] ?>" id="inputEmail3" placeholder="Tân Kỳ- Tứ Kỳ - Hải Dương">    
                        <?php if (isset($error['address'])): ?>                                                 
                            <p class = "text-danger"><?= $error['address'] ?></p>
                        <?php endif ?>
                    </div>
                </div> 
                <div class="form-group">
                    <label for="inputNamel3" class="col-sm-2 control-label">Level:</label>
                    <div class="col-sm-10">
                        <select name ="level" class="form-control">
                            
                            <option value="2" <?php isset($editadmin['level']) && $editadmin['level'] == 2 ? "selected='selected'" : '' ?>>Admin</option>
                        </select>  
                        <?php if (isset($error['level'])): ?>                                                 
                            <p class = "text-danger"><?= $error['level'] ?></p>
                        <?php endif ?>
                    </div>
                </div>   
                <div class="form-group">
                    <label for="inputNamel3" class="col-sm-2 control-label">Phone:</label>
                    <div class="col-sm-3">
                        <input type="number" name="phone" value="<?= $editadmin['phone'] ?>" class="form-control" id="inputEmail3" placeholder="1234567890">   
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
        </div>
    </div>
</div>                  
<?php require 'C:\xampp\htdocs\projectthuctap\admin\layouts\footer.php'; ?>      
