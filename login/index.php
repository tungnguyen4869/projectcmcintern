
<?php
session_start();
require 'C:\xampp\htdocs\projectthuctap\libraries\database.php';
require 'C:\xampp\htdocs\projectthuctap\libraries\function.php';
$db = new Database;
$data = [
    "email" => postInput('email'),
    "password" =>postInput('password'),
];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $error = [];
     if ($data["email"] == '')    
    {
        $error['email'] = "Mời bạn nhập đầy dủ email";
        
    }
    if (postinput('password') == '') {
        $error['password'] = "Mời bạn nhập đầy đủ password";
    }

    if (isset($_POST['submit'])) {
        $input = $_POST['input'];

        if ($input == $_SESSION['captcha']) {

            if (empty($error)) {
        
        $check = $db->fetchOne("admin", "email='" . $data['email'] . "'AND password = '" . $data['password'] . "'");
       
        if ($check != NULL) {
         
            $_SESSION['name_admin'] = $check['name'];
            $_SESSION['id_admin'] = $check['id'];
            if (isset($_POST["remember"])) {
                setcookie("emailcookie",$check['email'],time()+60*60);
                setcookie("passwordcookie",$check['password'],time()+60*60);
                
                # code...
            }else{
                setcookie("emailcookie",$check['email'],time()-60*60);
                setcookie("passwordcookie",$check['password'],time()-60*60);
                
            }
            echo "<script>alert('đăng nhập thành công');location.href='/projectthuctap/admin/'</script>";
           
        }else{

            $_SESSION['error']= " đăng nhập thất bại";

        }

    }
}


            
            # code...
        }else
        $_SESSION['error']= " đăng nhập thất bại";
        # code...
    }
    
?>


<?php 
     function setvalue($field)
    {
        if (isset($_COOKIE[$field])) {
            echo $_COOKIE[$field];
            # code...
        }
        # code...
    }

    function setchecked($field){
        if (isset($_COOKIE[$field])) {
            echo $_COOKIE[$field];
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
        
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Login</h3>

                            <?php if (isset($_SESSION['error'])):?>

                            <div class="alert alert-danger">
                                <strong style="color: #3c763d"> error!</strong> <?php echo $_SESSION['error'];unset($_SESSION['error']) ?>
                            </div>
                             <?php endif ?>



                            <div class="form-group">
                                <label for="username" class="text-info">Email:</label><br>
                                <input type="text" name="email" id="username" class="form-control" value="<?php setvalue("emailcookie")   ?>">
                               
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control" value="<?php  setvalue("passwordcookie")  ?>">
                            </div>

                            <div class="form-group">
                                <label for="password" class="text-info">enter the captcha</label><br>
                               <input type="text" name="input"><img src="/captcha.php" title="" alt="" /><br />


                            </div>

                            <div class="form-group">
                                <input type="checkbox" name="remember" <?php setchecked("emailcookie") ?>>
                                <label for="remember-me" class="text-info"> remember me</label><br>
                            </div>

                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="login">
                            </div>
                            <div id="register-link" class="text-right">
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

