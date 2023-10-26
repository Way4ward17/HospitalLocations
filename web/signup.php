<?php
include_once('admin/model/controller.php');
if(isset($_POST['reg'])){
    $username = secure($_POST["username"]);
    $email = secure($_POST["email"]);
    $phone = secure($_POST["phone"]);
    $pass = secure($_POST["passwordy"]);
    $passw = md5($pass);
    $date_joined = date("d-m-Y h:i:sa");
    $chk_u =  getUsrz_exist($username,$email);
    if($chk_u==true){
        $error = 'Account already exist, try again';
    }else if(!is_numeric($phone)){
        $error = 'Only numeric value accepted for phone number';
    }
    else{
        $ins = add_user($username,$email,$phone,$passw,$date_joined);
        if($ins==true){
            $success = 'Account created successfully, Login now';
            // echo '<script>
            // alert("Account created successfully, Login now")
            // </script>';
            // header("Location: ./");
        }else{
            $error = 'Cannot create account, try again';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title><?php echo SITE_NAME; ?> </title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<style>
    body {
        background-image: url("assets/img/bgrd.jpeg") !important;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
<body>
    <div class="main-wrapper account-wrapper">
        <div class="account-page">
			<div class="account-center">
				<div class="account-box">
                    <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" class="form-signin" enctype="multipart/form-data">
						<div class="account-logo">
                            <a href="#"><img src="assets/img/logo-dark.png" alt=""></a>
                        </div>
                        <center><p style="font-size: 2em; color: #009efb;">User Signup</p></center>
                       <?php
                        if(isset($error)){
                            echo '<center><h5 style="color: red;">'.$error.'</h5></center>';
                        }
                        if(isset($success)){
                            echo '<center><h5 style="color: green;">'.$success.'</h5><a href="./" style="color: blue;">Click here to Login Now</a></center>';
                        }
                        ?>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" required>
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="passwordy" required>
                        </div>
                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="text" class="form-control" name="phone" required>
                        </div>
                        <div class="form-group checkbox">
                            <label>
                                <input type="checkbox"> I have read and agree the Terms & Conditions
                            </label>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary account-btn" type="submit"><input type="hidden" name="reg">Signup</button>
                        </div>
                        <div class="text-center login-link">
                            Already have an account? <a href="./">Login</a>
                        </div>
                    </form>
                </div>
			</div>
        </div>
    </div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>

</html>