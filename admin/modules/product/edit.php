<?php
$open = 'product';
require 'C:\xampp\htdocs\projectthuctap\admin\autoload\autoload.php';
$id = intval($_GET['id']);
$editproduct = $db->fetchID('product', $id);
if (empty($editproduct)) {
    $_SESSION['error'] = "Dữ liệu không tồn tại";
    redirectAdmin("product");
}
$category = $db->fetchAll("category");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        "name" => postInput('name'),
        "slug" => to_slug(postInput('name')),
        "category_id" => postInput('category_id'),
        "price" => postInput('price'),
        "sale" => postInput('sale'),
        "number" => postInput('number'),
        "content" => postInput('content')
    ];
    $error = [];

    if (postinput('name') == '') {
        $error['name'] = "Mời bạn nhập đầy đủ tên sản phẩm";
    }
    if (postinput('category_id') == '') {
        $error['category_id'] = "Mời bạn chọn danh mục sản phẩm";
    }
    if (postinput('price') == '') {
        $error['price'] = "Mời bạn nhập đầy đủ giá sản phẩm";
    }
    if (postinput('content') == '') {
        $error['content'] = "Mời bạn nhập đầy đủ giá sản phẩm";
    }
    if (postinput('number') == '') {
        $error['number'] = "Mời bạn nhập đầy đủ số lượng sản phẩm";
    }
    if (empty($error)) {
        if (isset($_FILES['thunbar'])) {
            $file_name = $_FILES['thunbar']['name'];
            $file_tmp = $_FILES['thunbar']['tmp_name'];
            $file_type = $_FILES['thunbar']['type'];
            $file_erro = $_FILES['thunbar']['error'];
            if ($file_erro == 0) {
                $part = ROOT . "product/";

                $data['thunbar'] = $file_name;
            }
        }
        $update = $db->update("product", $data, array('id' => $id));
        if ($update > 0) {
            move_uploaded_file($file_tmp, "../../../public/uploads/product/" . $file_name);
            $_SESSION['success'] = "Cập nhật thành công";
            redirectAdmin("product");
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
            Thêm mới sản phẩm                            
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
                    <label for="inputNamel3" class="col-sm-2 control-label">Danh mục sản phẩm:</label>
                    <div class="col-sm-10">
                        <select class="form-control col-md-8" name="category_id" >
                            <option>-Mời bạn chọn danh mục sản phẩm-</option>
                            <?php
                            foreach ($category as $item) {
                                ?> 
                                <option value="<?= $item['id'] ?>" <?=
                                $editproduct['category_id'] == $item['id'] ?
                                        "selected='selected'" : ''
                                ?>><?= $item['name'] ?></option>
                                        <?php
                                    }
                                    ?>
                        </select>     
                        <?php if (isset($error['category'])): ?>                                                 
                            <p class = "text-danger"><?= $error['category'] ?></p>
                        <?php endif ?>
                    </div>
                </div>     
                <div class="form-group">
                    <label for="inputNamel3" class="col-sm-2 control-label">Tên sản phẩm:</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" value="<?= $editproduct['name'] ?>" class="form-control" id="inputEmail3" placeholder="Tên danh mục" >

                        <?php if (isset($error['name'])): ?>                                                 
                            <p class = "text-danger"><?= $error['name'] ?></p>
                        <?php endif ?>

                    </div>
                </div> 
                <div class="form-group">
                    <label for="inputNamel3" class="col-sm-2 control-label">Giá sản phẩm:</label>
                    <div class="col-sm-10">
                        <input type="number" name="price" value="<?= $editproduct['price'] ?>" class="form-control" id="inputEmail3" placeholder="9.000.000">                     
                    </div>
                </div>   
                <div class="form-group">
                    <label for="inputNamel3" class="col-sm-2 control-label">Số lượng sản phẩm:</label>
                    <div class="col-sm-10">
                        <input type="number" name="number" value="<?= $editproduct['number'] ?>" class="form-control" id="inputEmail3" placeholder="100">    
                        <?php if (isset($error['number'])): ?>                                                 
                            <p class = "text-danger"><?= $error['number'] ?></p>
                        <?php endif ?>
                    </div>
                </div>   
                <div class="form-group">
                    <label for="inputNamel3" class="col-sm-2 control-label">Giảm giá:</label>
                    <div class="col-sm-3">
                        <input type="number" name="sale" value="<?= $editproduct['sale'] ?>" class="form-control" id="inputEmail3" placeholder="10%" value="0">                  
                    </div>
                    <label for="inputNamel3" class="col-sm-1 control-label">Hình ảnh:</label>
                    <div class="col-sm-2">
                        <input type="file" name="thunbar" class="form-control" id="inputEmail3">
                        <img src="<?= uploads() ?>product/<?= $editproduct['thunbar'] ?>" width="80px" height="80px">
                        <?php if (isset($error['thunbar'])): ?>                                                 
                            <p class = "text-danger"><?= $error['thunbar'] ?></p>
                        <?php endif ?>
                    </div>
                </div>  
                <div class="form-group">
                    <label for="inputNamel3" class="col-sm-2 control-label" >Nội dung:</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="content" rows ="4"><?= $editproduct['content'] ?></textarea>
                        <?php if (isset($error['content'])): ?>                                                 
                            <p class = "text-danger"><?= $error['content'] ?></p>
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
