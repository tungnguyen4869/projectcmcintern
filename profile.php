<?php 
require_once 'C:\xampp\htdocs\projectthuctap\admin\autoload\autoload.php';
$id = intval(getInput('id'));
$user = $db->fetchID('users', $id); 
        
 ?>

 

<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
    <div class="row">
         <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="row" style="text-align: center;">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="border-radius: 16px;">
                        <div class="well profile col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">




                                <figure>
                                     <img src="<?= uploads() ?>avarta/<?= $user['avatar'] ?>" width="80px" height="80px">
                                </figure>
                                <h5 style="text-align:center;"><strong id="user-name"> <?php echo $user['name']; ?> </strong></h5>
                                <p style="text-align:center;font-size: smaller;" id="user-frid"><?php echo $user['address']; ?> </p>
                                <p style="text-align:center;font-size: smaller;overflow-wrap: break-word;" id="user-email"><?php echo $user['email']; ?> </p>
                                <p style="text-align:center;font-size: smaller;"><strong>tài khoản vip: </strong>
                                    <?php if ($user['level']=='1') {
                                        echo "Active";
                                        # code...
                                    }else{
                                        echo "bạn chưa nâng vip";
                                    }
                                    ?>
                                </p>

                                <h4><p style="text-align: center;"><strong id="tientrongtk"><?php echo $user['taikhoan']; echo "đ"; ?> </strong></p></h4>  

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 divider text-center"></div>
                                    <div class="col-lg-6 left" style="text-align:center;overflow-wrap: break-word;">
                                                  
                                        
                                        <a class="btn btn-success btn-block" href="nap-the.php? id=<?php echo $user['id'] ?>"><span class="fa fa-plus-circle"></span> Nạp  </a>
                                    </div>
                                    <div class=" col-lg-6 left" style="text-align:center;overflow-wrap: break-word;">
                                                         
                                     
                                         <a class="btn btn-info btn-block" href="edit-user.php? id=<?php echo $user['id']  ?>"><span class="fa fa-user"></span> edit </a>
                                    </div>

                                    &nbsp
                                   <a class="btn btn-info" style="text-align:center;overflow-wrap: break-word;" id="user-frid" href="nang-vip.php? id=<?php echo $_SESSION['id_user'] ?>">nâng vip </a>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </div>
</div>