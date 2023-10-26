<?php
include_once('admin/model/controller.php');
//include_once('session.php');
   if (isset($_POST["loguser"])) {
            // Grab Variable Values And Escape String
            session_start();
            $username   = secure($_POST["username"]);
            $password   = secure(md5($_POST["password"]));
            $email = secure($_POST["username"]);
            //Check if Values supplied are valid
            if (empty($username) || empty($password)) {
                $error =  'Please Fill all details Before submiting';
            }else{
            	$chk = user_exist($username,$email, 'users');
                if ($chk==true) {
                    $stmt = $mysqli->prepare("SELECT * FROM users WHERE username = ? || email = ? ");
                    $stmt->bind_param("ss", $username,$email);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $rows = $result->fetch_assoc();
                    $db_password = $rows['passw'];
                    $user = $row['username'];
                    if ($password == $db_password) {
                        $_SESSION['username'] = $username;
                        $_SESSION['email'] = $email;
                        $success =  'Login Successful!';
                        $curl = curl_init();
                        curl_setopt($curl, CURLOPT_URL, "http://ip-api.com/php" . $ipAddr);
                        curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);
                        $content = curl_exec ($curl);
                        curl_close ($curl); 
                    
                        if (curl_errno($curl))
                            throw new \Exception(sprintf("Connection error %s: %s", curl_errno($curl), curl_error($curl)));
                    
                        $d = unserialize($content);
                        $longitude = $d['lon'];
                        $latitude = $d['lat'];
                        $address = $d['city'].' - '.$d['country'];
                        $username = $user;
                        $upad = update_addr($longitude, $latitude, $address, $username);
                        header("Location: emergency.php");
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
    <title><?php echo SITE_NAME; ?></title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<style>
    body {
        background-image: url("assets/img/bgg.jpeg") !important;
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
                            <a href="index-2.html"><img src="assets/img/logo-dark.png" alt=""></a>
                        </div>
                        <center><p style="font-size: 2em; color: #009efb;">User Sign in</p></center>
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
                            <input type="text" autofocus="" class="form-control" name="username" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="form-group text-right">
                            <a href="#">Forgot your password?</a>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary account-btn"><input type="hidden" name="loguser">Login</button>
                        </div>
                        <div class="text-center register-link">
                            Don’t have an account? <a href="signup.php">Register Now</a>
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