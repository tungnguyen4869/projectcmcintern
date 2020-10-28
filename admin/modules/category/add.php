<?php
$open = 'category';
require 'C:\xampp\htdocs\projectthuctap\admin\autoload\autoload.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        "name" => postInput('name'),
        "slug" => to_slug(postInput('name'))
    ];
    $error = [];

    if (postinput('name') == '') {
        $error['name'] = "Mời bạn nhập đầy đủ tên danh mục";
    }
    if (empty($error)) {
        $insert = $db->fetchOne("category", "name ='" . $data['name'] . "'");
        if ($insert > 0) {
            $_SESSION['error'] = "Danh mục dã tồn tại";
        } else {
            $id_insert = $db->insert("category", $data);
            if ($id_insert > 0) {
                $_SESSION['success'] = "Thêm mới thành công";
                redirectAdmin("category");
            } else {
                $_SESSION['error'] = "Thêm mới thất bại";
            }
        }
    }
}
?>
<?php require 'C:\xampp\htdocs\projectthuctap\admin\layouts\header.php'; ?>                   
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Thêm mới danh mục                             
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
            </li>
            <li>
                <i></i> <a href=""> Danh mục</a>
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
        <div class="col-md-12">
            <form class="form-horizontal" action="#" method="POST">
                <div class="form-group">
                    <label for="inputNamel3" class="col-sm-2 control-label">Tên:</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="Tên danh mục">

                        <?php if (isset($error['name'])): ?>                                                 
                            <p class = "text-danger"><?= $error['name'] ?></p>
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
