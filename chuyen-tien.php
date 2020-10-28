<?php 
require_once 'C:\xampp\htdocs\projectthuctap\autoload\autoload.php';
$id = intval($_GET['id']);
$user = $db->fetchID('users', $id);
$num = intval($user['taikhoan']);

$data = [
    "email" => postinput('name'),
   
];
$data1 = [
             "password" => md5(postInput('password')),
                                
          ];


$tien = intval(postinput('tien'));

if ($_SERVER["REQUEST_METHOD"] == "POST") {

           if ($data1["password"] == $user['password']) {

                    $check = $db->fetchOne('users', "email='" . $data['email'] . "'");

                    if ($check != NULL) {
                        if ($num >= $tien) {

                            $num = $num - $tien;
                            $_SESSION['id_destination'] = $check['id'];
                            $id2 = intval($_SESSION['id_destination']);
                            $taikhoan2 = intval($check['taikhoan']);
                            $taikhoan2 = $taikhoan2 + $tien;
                            $data2 = ["taikhoan" => $taikhoan2, ];
                            $update = $db->update("users", $data2, array('id' => $id2));
                        }else{
                            
                             echo "<script>alert('không có tiền còn đòi chuyển');location.href='index.php'</script>";
                        }

                    }else{
                        echo "<script>alert('không tìm thấy tài khoản cần chuyển');location.href='index.php'</script>";
                    }
        }
        $data1=[
            "taikhoan" => $num,
        ];
        
        $error = [];
    
    if (empty($error)) {

        $update = $db->update("users", $data1, array('id' => $id));
    //    $update = $db->update("users", $data2, array('id' => $id2));

        if ($update > 0) {
            echo "<script>alert('chuyển tiền thanh công');location.href='index.php'</script>";
           
       } else {
           echo "<script>alert('chuyển tiền thất bại');location.href='chuyen-tien.php'</script>";
        }

    }
}

 ?>

<?php require 'C:\xampp\htdocs\projectthuctap\layouts\header.php'; ?>  

<div class="col-md-9 bor">
    <section class="box-main1">
        <form id="login-form" class="form" action="#" method="post">
        <h3 class="title-main"><a href="">chuyển tiền</a> </h3>
        <div>
        <label for="inputNamel3" class="col-md-3">email:</label>
        </div>
        <div class="col-sm-10">
            <input type="text" name="name" value="" class="form-control" id="inputEmail3" placeholder="Tên">
        </div>
        <div>
        <label for="inputNamel3" class="col-md-3">số tiền:</label>
        </div>
        <div class="col-sm-10">
            <input type="text" name="tien" value="" class="form-control" id="inputEmail3" placeholder="số tiền">
        </div>
        <div>
        <label for="inputNamel3" class="col-md-3">password của bạn:</label>
        </div>
        <div class="col-sm-10">
            <input type="password" name="password" value="" class="form-control" id="inputEmail3" placeholder="*****">
        </div>

        <div class="col-sm-10">
            <input type="submit" name="submit" class="btn btn-info btn-md" value="chuyển tiền">
        </div>
    </form>
    </section>
</div>
<?php require 'C:\xampp\htdocs\projectthuctap\layouts\footer.php'; ?>      
