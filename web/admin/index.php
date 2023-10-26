<?php
include_once('model/controller.php');
//include_once('session.php');
   if (isset($_POST["login"])) {
            // Grab Variable Values And Escape String
            session_start();
            $username   = secure($_POST["username"]);
            $password   = secure(md5($_POST["password"]));
            $email = secure($_POST["username"]);
            //Check if Values supplied are valid
            if (empty($username) || empty($password)) {
                $error =  'Please Fill all details Before submiting';
            }else{
            	$chk = user_exist($username,$email, 'admin');
                if ($chk==true) {
                    //$success =  'Login Successful! phase 1';
                    //Get password From Database where email = $email
                    $stmt = $mysqli->prepare("SELECT * FROM admin WHERE username = ? || email = ? ");
                    $stmt->bind_param("ss", $username,$email);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $rows = $result->fetch_assoc();
                    $db_password = $rows['password'];

                    if ($password == $db_password) {
                        $_SESSION['username'] = $username;
                        $_SESSION['email'] = $email;
                        $success =  'Login Successful!';
                        header("Location: dashboard.php");
                    }else{
                        $error =  'Incorrect Password Entered';
                    }

                }else{
                    $error =  'This username/email does not exist';
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
        background-image: url("assets/img/hth.jpeg") !important;
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
                        <center><p style="font-size: 2em; color: #009efb;">Admin Sign in</p></center>
                        <?php
                        if(isset($error)){
                            echo '<center><h5 style="color: red;">'.$error.'</h5></center>';
                        }
                        if(isset($success)){
                            echo '<center><h5 style="color: green;">'.$success.'</h5></center>';
                        }
                        ?>
                        <div class="form-group">
                            <label>Username or Email</label>
                            <input type="text" autofocus="" class="form-control" name="username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary account-btn"><input type="hidden" name="login">Login</button>
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