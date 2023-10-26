<?php
include_once('model/controller.php');
include_once('session.php');
function log_in(){
    if (isset($_SESSION["username"]) || isset($_SESSION["email"])) {
        return true;
    }else{
        return false;
    }
}
if(log_in() != true){
 header("Location: ./");
}

if(isset($_SESSION['username']) || isset($_SESSION["email"])){
    $username = $_SESSION["username"];
    $email = $_SESSION["email"];
    $chk = getAdminUsrz($username, $email);
        if(mysqli_num_rows($chk) > 0){
         //return true;
        }else{
            session_destroy();
            header("Location: ./");
        }
    }
    if ($_SESSION["username"]){
        $em = $_SESSION["username"];
        $user = getAdminUsr($em);
    }else if($_SESSION["email"]) {
        $em = $_SESSION["email"];
        $user = getAdminUsr($em);
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
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
    <div class="main-wrapper">
        <div class="header">
			<div class="header-left">
				<a href="#" class="logo">
					<img src="assets/img/logo.png" width="35" height="35" alt=""> <span>ER-HELP</span>
				</a>
			</div>
			<a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
                <li class="nav-item dropdown d-none d-sm-block">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><i class="fa fa-bell-o"></i></a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span>Notifications</span>
                        </div>
                        <div class="drop-scroll">
                            <ul class="notification-list">
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="media">
											<span class="avatar">
												<img alt="John Doe" src="assets/img/user.jpg" class="img-fluid">
											</span>
											<div class="media-body">
												<p class="noti-details"><span class="noti-title">John Doe</span> added new task <span class="noti-title">Patient appointment booking</span></p>
												<p class="noti-time"><span class="notification-time">4 mins ago</span></p>
											</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="#">View all Notifications</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img"><img class="rounded-circle" src="assets/img/user.jpg" width="40" alt="Admin">
							<span class="status online"></span></span>
                        <span><?php echo $user; ?></span>
                    </a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="logout.php">Logout</a>
					</div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <?php 
                    $activepage = basename($_SERVER['PHP_SELF'], ".php");
                    ?>
                    <ul>
                        <li class="menu-title">Main</li>
                        <li class="<?php if($activepage == 'dashboard'){echo 'active';} else{ echo '';} ?>">
                            <a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
						<li class="<?= ($activepage == 'hospital') ? 'active' : ''; ?>">
                            <a href="hospital.php"><i class="fa fa-hospital-o"></i> <span>Hospitals</span></a>
                        </li>
                        <li class="<?= ($activepage == 'users') ? 'active' : ''; ?>">
                            <a href="users.php"><i class="fa fa-users"></i> <span>Users</span></a>
                        </li>
                        <li class="<?= ($activepage == 'emergency') ? 'active' : ''; ?>">
                            <a href="messages.php"><i class="fa fa-warning"></i> <span>Emergency</span></a>
                        </li>
                    
                    </ul>
                </div>
            </div>
        </div>