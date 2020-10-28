<?php
require_once './autoload/autoload.php';
$category = $db->fetchAll("category");
?>


<?php require_once 'C:\xampp\htdocs\projectthuctap\admin\layouts\header.php'; ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Xin Chào Đến Với Trang Quản Trị                               
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
            </li>                                      
        </ol>      
    </div>
</div>     

<?php require_once 'C:\xampp\htdocs\projectthuctap\admin\layouts\footer.php'; ?>