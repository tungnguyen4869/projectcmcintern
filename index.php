<!DOCTYPE html>
<?php
require_once 'C:\xampp\htdocs\projectthuctap\autoload\autoload.php';
$sqlhomeCate = "SELECT name,id FROM category WHERE home = 1 ORDER BY 	updated_at ";
$categoryHome = $db->fetchsql($sqlhomeCate);
$data = [];
foreach ($categoryHome as $item) {
    $cateid = intval($item['id']);
    $sql = "SELECT*FROM product WHERE category_id = $cateid ORDER BY ID DESC LIMIT 4";
    $productHome = $db->fetchsql($sql);
    $data[$item['name']] = $productHome;
}
?>
<?php require 'C:\xampp\htdocs\projectthuctap\layouts\header.php'; ?>  
<div class="col-md-9 bor">
    <section id="slide" class="text-center" >
        <img src="<?= base_url() . "public/frontend/images/anh1.jpg" ?>" height="300px" width="700px">
    </section>

    <section class="box-main1">
        <?php
        foreach ($data as $key => $value) {
            ?>
            <h3 class="title-main"><?= $key ?></h3>
            <div class="showitem">
                <?php
                foreach ($value as $item) {
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

                            <p><a href="addcart.php?id=<?= $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
                        </div>
                    </div>
                    <?php
                }
                ?>

            </div>
            <?php
        }
        ?>

    </section>
</div>
<?php unset($_SESSION['error']); ?>
<?php require 'C:\xampp\htdocs\projectthuctap\layouts\footer.php'; ?>      


