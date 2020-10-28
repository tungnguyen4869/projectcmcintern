<?php 
 	require_once 'C:\xampp\htdocs\projectthuctap\admin\autoload\autoload.php';
	$id = intval($_GET['id']);
	$user = $db->fetchID('users',$id);
    $taikhoan = intval($user['taikhoan']);
    $level = intval($user['level']);
	if ($user['level'] !=0) {
		$_SESSION['error'] = "đã nâng vip";
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (isset($_POST['vip1']) && $_POST['vip1']==true) {
			
            if ($taikhoan >= 300000) {
                $taikhoan = $taikhoan - 30000;
                $endtime= time()+(30*0*0*0);
                $level = 1;
                # code...
            }else{
                
               echo "<script>alert('không có tiền còn đòi nâng vip');location.href='index.php'</script>";
            }
            
	}

		if (isset($_POST['vip2']) && $_POST['vip2']==true) {
			
            if ($taikhoan >= 3600000) {
                $taikhoan = $taikhoan - 360000;

                $endtime= time()+(360*0*0*0);
                $level = 1;
                # code...
            }else{
                
                echo "<script>alert('không có tiền còn đòi nâng vip');location.href='index.php'</script>";
            }
	}

		
		$data = [
			"level" => $level,
            "taikhoan"=>$taikhoan
		];
		
    $error = [];
    
    if (empty($error)) {
        $update = $db->update("users", $data, array('id' => $id));
        if ($update > 0) {
            $_SESSION['success'] = "nâng vip thành công";
            redirect("index.php");
        } else {
            $_SESSION['error'] = "nâng vip thất bại";
        }
 
    }

}




 ?>

 <style type="text/css">
    body {
        margin: 0;
        padding: 0;
        background-color: #17a2b8;
        height: 100vh;
    }
    #login .container #login-row #login-column #login-box {
        margin-top: 120px;
        max-width: 600px;
        height: 320px;
        border: 1px solid #9C9C9C;
        background-color: #EAEAEA;
    }
    #login .container #login-row #login-column #login-box #login-form {
        padding: 20px;
    }
    #login .container #login-row #login-column #login-box #login-form #register-link {
        margin-top: -85px;
    }
</style>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">VIP form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="#" method="post">
                            <h3 class="text-center text-info">Nâng VIP</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Option:</label><br>
                                <input type="checkbox" name="vip1">
                                <label for="vip1"> Vip 1: 30.000 đ- 1 tháng.</label> <br>
                                <input type="checkbox" name="vip2">
                                <label for="vip1"> Vip 1: 360.000 đ- 1 năm.</label>
                                
                            </div>
                           &emsp;
                           &emsp;
                           &emsp;
                           &emsp;
                            <div class="form-group">
                                
                                <input type="submit" name="submit" class="btn btn-info align-items-center" value="submit">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>