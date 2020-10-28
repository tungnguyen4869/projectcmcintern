<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Web Admin</title>
        <link href="/projectthuctap/public/admin/css/bootstrap.min.css" rel="stylesheet">
        <link href="/projectthuctap/public/admin/css/sb-admin.css" rel="stylesheet">
        <link href="/projectthuctap/public/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="wrapper">           
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">               
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/projectthuctap/admin/index.php/">Hello </a>
                </div>               
                <ul class="nav navbar-right top-nav">
                  
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> tung ewind <b class="caret"></b></a>
                        <ul class="dropdown-menu">                      
                            <li class="divider">
                                
                            </li>
                            <li>
                                <a href="/projectthuctap/dang-xuat-admin.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>             
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li>
                            <a href="/projectthuctap/admin/index.php/"><i class="fa fa-fw fa-dashboard"></i> Bảng điều khiển</a>
                        </li>
                        <li class="<?php echo isset($open) && $open == 'category' ? 'active' : '' ?>">
                            <a href="<?php echo modules('category'); ?>"><i class="fa fa-list"></i> Danh mục sản phẩm</a>
                        </li>
                        <li class="<?php echo isset($open) && $open == 'product' ? 'active' : '' ?>">
                            <a href="<?php echo modules('product'); ?>"><i class="fa fa-database"></i>Sản phẩm</a>
                        </li>
                        <li class="<?php echo isset($open) && $open == 'admin' ? 'active' : '' ?>">
                            <a href="<?php echo modules('admin'); ?>"><i class="fa fa-database"></i>Admin</a>
                        </li>
                        <li class="<?php echo isset($open) && $open == 'user' ? 'active' : '' ?>">
                            <a href="<?php echo modules('user'); ?>"><i class="fa fa-database"></i>User</a>
                        </li>
                         <li class="<?php echo isset($open) && $open == 'transaction' ? 'active' : '' ?>">
                            <a href="<?php echo modules('transaction'); ?>"><i class="fa fa-database"></i>Quản lý đơn hàng</a>
                        </li>                                                            
                    </ul>
                </div>             
            </nav>
