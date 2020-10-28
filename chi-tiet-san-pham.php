<!DOCTYPE html>
<?php
require_once 'C:\xampp\htdocs\projectthuctap\autoload\autoload.php';
$id = intval($_GET['id']);
$product = $db->fetchID("product", $id);
$giamgia1 = ($product['price'] - (($product['price'] * $product['sale']) / 100));
$cateid1 = intval($product['category_id']);
$sql1 = "SELECT * FROM product WHERE category_id = $cateid1 ORDER BY ID DESC LIMIT 4";
$flowProduct = $db->fetchsql($sql1);
?>
<?php require 'C:\xampp\htdocs\projectthuctap\layouts\header.php'; ?>  
<div class="col-md-9 bor">
    <section class="box-main1" >
        <div class="col-md-6 text-center">
            <img src="<?= uploads() ?>product/<?= $product['thunbar'] ?>" class="img-responsive bor" id="imgmain" width="100%" height="370" data-zoom-image="images/16-270x270.png">

<!--            <ul class="text-center bor clearfix" id="imgdetail">
                <li>
                    <img src="<?= public_frontend() ?>images/anh3.png" class="img-responsive pull-left" width="80" height="80">
                </li>
                <li>
                    <img src="<?= public_frontend() ?>images/anh3.png" class="img-responsive pull-left" width="80" height="80">
                </li>
                <li>
                    <img src="<?= public_frontend() ?>images/anh3.png" class="img-responsive pull-left" width="80" height="80">
                </li>
                <li>
                    <img src="<?= public_frontend() ?>images/anh3.png" class="img-responsive pull-left" width="80" height="80">
                </li>

            </ul>-->
        </div>
        <div class="col-md-6 bor" style="margin-top: 20px;padding: 30px;">
            <ul id="right">
                <li><h3> <?= $product['name'] ?> </h3></li>
                <li><p> </p></li>
                <?php
                if ($product['sale'] > 0) {
                    ?>
                    <li><p><strike class="sale"><?= formtPrice($product['price']) ?></strike> <b class="price"><?= formtPrice($giamgia1) ?></b</li>
                    <?php
                } else {
                    ?>
                    <li><p><strike class="sale"></strike> <b class="price"><?= formtPrice($product['price']) ?></b</li>
                    <?php
                }
                ?>

            <li><a href="addcart.php?id=<?php echo $product['id'] ?> " class="btn btn-default"> <i class="fa fa-shopping-basket"></i>Add TO Cart</a></li>
            </ul>
        </div>

    </section>
    <div class="col-md-12" id="tabdetail">
        <div class="row">

            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Mô tả sản phẩm </a></li>
                <li><a data-toggle="tab" href="#menu1">Nội dung bình luận</a></li>
<!--                <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
                <li><a data-toggle="tab" href="#menu3">Menu 3</a></li>-->
            </ul>
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <h3>Nội dung</h3>
                    <p><?= $product['content'] ?></p>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <h3> Nội dung bình luận </h3>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
                <div id="menu2" class="tab-pane fade">
                    <h3>Menu 2</h3>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                </div>
                <div id="menu3" class="tab-pane fade">
                    <h3>Menu 3</h3>
                    <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <section class="box-main1">           

            <div class="showitem">
                <?php
                foreach ($flowProduct as $item) {
                    $giamgia = ($item['price'] - (($item['price'] * $item['sale']) / 100));
                    ?>
                    <div class="col-md-3 item-product bor">
                        <a href="chi-tiet-san-pham.php?id=<?= $item['id'] ?>">
                            <img src="<?= uploads() . "product/" . $item['thunbar'] ?>" class="" width="100%" height="180">
                        </a>
                        <div class="info-item">
                            <a href="chi-tiet-san-pham.php?id=<?= $item['id'] ?>"><?= $item['name'] ?></a>
                            <p><strike class="sale"><?= formtPrice($item['price']) ?></strike> <b class="price"><?= formtPrice($giamgia) ?></b></p>
                        </div>
                        <div class="hidenitem">
                            <p><a href="chi-tiet-san-pham.php?id=<?= $item['id'] ?>"><i class="fa fa-search"></i></a></p>
                            <p><a href=""><i class="fa fa-heart"></i></a></p>
                            <p><a href=""><i class="fa fa-shopping-basket"></i></a></p>
                        </div>
                    </div>
                    <?php
                }
                ?>

            </div>            
        </section>

    </div>
</div>
<?php require 'C:\xampp\htdocs\projectthuctap\layouts\footer.php'; ?>      


