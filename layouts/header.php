<?php
$category1 = $db->fetchAll("category");
?>
<html>
    <head>       
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/frontend/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/frontend/css/bootstrap.min.css">

        <script  src="<?= base_url() ?>public/frontend/js/jquery-3.2.1.min.js"></script>
        <script  src="<?= base_url() ?>public/frontend/js/bootstrap.min.js"></script>
        <!---->
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/frontend/css/slick.css"/>
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/frontend/css/slick-theme.css"/>
        <!--slide-->
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/frontend/css/style.css">

    </head>
    <body>
        <div id="wrapper">
            <!---->
            <!--HEADER-->
            <div id="header">
                <div id="header-top">
                    <div class="container">
                        <div class="row clearfix">
                            <div class="col-md-6" id="header-text">
                                <a href="index.php">TEWIND</a>
                            </div>
                            <div class="col-md-6">
                                <nav id="header-nav-top">

                                    <ul class="list-inline pull-right" id="headermenu">
                                        <?php
                                        if (isset($_SESSION['id_user'])) {

                                            ?>
                                            <li style="font-size: 20px">
                                                <?php
                                                if (isset($_SESSION['name_user'])) {
                                                    ?>                                               
                                                    <?php echo"Xin Chào: " . $_SESSION['name_user']; ?>
                                                    <?php
                                                }
                                                ?>
                                            </li>
                                            <li>
                                                <a href=""><i class="fa fa-user"></i> Tài khoản <i class="fa fa-caret-down"></i></a>
                                                <ul id="header-submenu">

                                                    <li><a href="gio-hang.php? id=<?php echo $_SESSION['id_user'] ?>">Giỏ hàng</a></li>
                                                    <li><a href="thoat.php">Thoát</a></li>
                                                    <li><a href="profile.php? id=<?php echo $_SESSION['id_user'] ?>">Profile</a></li>
                                                    <li><a href="chuyen-tien.php? id=<?php echo $_SESSION['id_user'] ?>">chuyển tiền</a></li>
                                                </ul>
                                            </li>
                                            <?php
                                        } else {
                                            ?>
                                            <li>
                                                <a href="dang-ki-thanh-vien.php"><i class="fa fa-unlock"></i>Đăng kí</a>
                                            </li>
                                            <li>
                                                <a href="dang-nhap-thanh-vien.php"><i class="fa fa-unlock"></i>Đăng nhập</a>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row" id="header-main">
                        <div class="col-md-5">
                            <form action="tim-kiem.php" class="form-inline" autocomplete="off">
                                <div class="form-group">

                                    <input type="text" name="keywork" placeholder=" input keywork" class="form-control">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>

                                </div>
                                <?php if (isset($_SESSION['errork'])): ?>                                                 
                                    <p class = "text-danger"><?= $_SESSION['errork'] ?></p>                                  
                                <?php endif ?>
                            </form>
                        </div>
                        <div class="col-md-4" >
                            <a href="">
                                <img src="<?= base_url() . "public/frontend/images/helo.jpg" ?>" height="250px" width="300px">
                            </a>
                        </div>
                        <div class="col-md-3" id="header-right">
                            <div class="pull-right">
                                <div class="pull-left">
                                    <i class="glyphicon glyphicon-phone-alt"></i>
                                </div>
                                <div class="pull-right">
                                    <p id="hotline">HOTLINE</p>
                                    <p>0343087684</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--END HEADER-->


            <!--MENUNAV-->
            <div id="menunav">
                <div class="container">
                    <nav>
                        <div class="home pull-left">
                            <a href="index.php">Trang chủ</a>
                        </div>
                        <!--menu main-->
                        <ul id="menu-main">
                            <li>
                                <a href="Gioi-thieu.php">Giới Thiệu</a>
                            </li>                          
                            <li>
                                <a href="lien-he.php">Liên Hệ</a>
                            </li>                         
                        </ul>
                        <!-- end menu main-->

                        <!--Shopping-->
                        <ul class="pull-right" id="main-shopping">
                            <li>
                                <a href="gio-hang.php? id=<?php echo $_SESSION['id_user'] ?>"><i class="fa fa-shopping-basket"></i> My Cart </a>
                            </li>
                        </ul>
                        <!--end Shopping-->
                    </nav>
                </div>
            </div>
            <!--ENDMENUNAV-->

            <div id="maincontent">
                <div class="container">
                    <div class="col-md-3  fixside" >
                        <div class="box-left box-menu" >
                            <h3 class="box-title"><i class="fa fa-list"></i>  Danh mục</h3>                           
                            <ul>
                                <?php
                                foreach ($category as $item) {
                                    ?>
                                    <li ><a href="danh-muc-san-pham.php?id=<?= $item['id'] ?>"><?php echo $item['name']; ?></a></li>
                                    <?php
                                }
                                ?>

                            </ul>
                        </div>

                        <div class="box-left box-menu">
                            <h3 class="box-title"><i class="fa fa-warning"></i>  Sản phẩm mới </h3>

                            <ul>
                                <?php
                                foreach ($productNew as $item) {
                                    $giamgia = ($item['price'] - (($item['price'] * $item['sale']) / 100));
                                    ?>

                                    <li class="clearfix">
                                        <a href="chi-tiet-san-pham.php?id=<?= $item['id'] ?>">
                                            <img src="<?= uploads() . "product/" . $item['thunbar'] ?>" class="img-responsive pull-left" width="80" height="80">
                                            <div class="info pull-right">
                                                <p class="name"> <?= $item['name'] ?></p >
                                                <b class="price">Giảm giá:<?= formtPrice($giamgia) ?></b><br>
                                                <b class="sale">Giá gốc: <?= formtPrice($item['price']) ?></b><br>                                  
                                            </div>
                                        </a>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                            <!-- </marquee> -->
                        </div>

                        <div class="box-left box-menu">
                            <h3 class="box-title"><i class="fa fa-warning"></i>  Sản phẩm bán chạy </h3>
                            <!--  <marquee direction="down" onmouseover="this.stop()" onmouseout="this.start()"  > -->
                            <ul>

                                <?php
                                foreach ($productPay as $item) {
                                    $giamgia = ($item['price'] - (($item['price'] * $item['sale']) / 100));
                                    ?>

                                    <li class="clearfix">
                                        <a href="chi-tiet-san-pham.php?id=<?= $item['id'] ?>">
                                            <img src="<?= uploads() . "product/" . $item['thunbar'] ?>" class="img-responsive pull-left" width="80" height="80">
                                            <div class="info pull-right">
                                                <p class="name"> <?= $item['name'] ?></p >
                                                <b class="price">Giảm giá:<?= formtPrice($giamgia) ?></b><br>
                                                <b class="sale">Giá gốc: <?= formtPrice($item['price']) ?></b><br>                                  
                                            </div>
                                        </a>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>                         
                        </div>
                    </div>
<?php
                               
?>