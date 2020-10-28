<?php
$open = 'transaction';
require_once 'C:\xampp\htdocs\projectthuctap\admin\autoload\autoload.php';
$sql = "SELECT transaction.*, users.name as nameuser,users.phone as phoneuser FROM transaction LEFT JOIN users ON users.id = transaction.users_id
        ORDER BY ID DESC";
$total = count($db->fetchsql($sql));
if (isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = 1;
}
$transaction = $db->fetchJones("transaction", $sql, $total, $p, 4, true);
$sotrang = $transaction ['page'];
unset($transaction ['page']);
$path = $_SERVER['SCRIPT_NAME'];
?>
<?php require 'C:\xampp\htdocs\projectthuctap\admin\layouts\header.php'; ?>                   
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Danh Sách đơn hàng                            
        </h1>    
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
            </li>
                                      
        </ol>  
        <div class="clearfix"></div>
        <?php
        require_once 'C:\xampp\htdocs\projectthuctap\partials\notification.php';
        ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">          
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Phone</th>   
                        <th>Status</th>   
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $stt = 1;
                    foreach ($transaction as $item):
                        ?>
                        <tr>
                            <td><?= $stt ?></td>
                            <td><?= $item['nameuser'] ?></td> 
                            <td><?= $item['phoneuser'] ?></td>      
                            <td>
                                <a href="status.php?id=<?=$item['id']?>" class="btn btn-xs <?php echo $item['status'] == 0 ? "btn btn-danger" : "btn-info"; ?>"><?php echo $item['status'] == 0 ? "chưa xử lý" : "đã xử lý"; ?></a> 
                            </td>      
                            <td>                               
                                <a class="btn btn-xs btn-danger" href="delete.php?id=<?= $item['id'] ?>">
                                    <i class="fa fa-times"></i>Xóa</a>

                            </td>
                        </tr>                          
                        <?php
                        $stt++;
                    endforeach
                    ?>
                </tbody>
            </table>
            <div class="pull-right">
                <nav aria-label="Page navigation">

                    <ul class="pagination">
                        <?php
                        for ($i = 1; $i <= $sotrang; $i++) {
                            ?>
                            <li class="<?= isset($_GET['p']) && $_GET['p'] == $i ? 'active' : '' ?>"><a href="<?= $path ?>?p=<?= $i ?>"><?= $i ?></a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </nav>
            </div>

        </div>
    </div>

</div>
<?php require 'C:\xampp\htdocs\projectthuctap\admin\layouts\footer.php'; ?>      

