<?php 
include_once('header.php');
if(isset($_POST['emg'])){
    $hosp = $_GET['hosp'];
    $fullname = secure($_POST["fullname"]);
    $phone = secure($_POST["phone"]);
    $des = secure($_POST["description"]);
    $chk_u =  complaints($fullname,$phone,$des,$hosp);
    if($chk_u==true){
        $success = 'Emergency Complaints Submitted';
    }else{
        $error = 'Error, try again';
    }
}
?>

<div class="main-wrapper account-wrapper">
        <div class="account-page">
			<div class="account-center">
				<div class="account-box">
                    <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" class="form-signin" enctype="multipart/form-data">
						<div class="account-logo">
                            <a href="#"><img src="assets/img/logo-dark.png" alt=""></a>
                        </div>
                        <center><p style="font-size: 2em; color: #009efb;">Emergency Complaints Form</p></center>
                        <center><h5 style="color: #009ce7;">Nearby Hospital:<b> <?php echo $_GET['hosp']; ?> </b></h5></center>
                       <?php
                        if(isset($error)){
                            echo '<center><h5 style="color: red;">'.$error.'</h5></center>';
                        }
                        if(isset($success)){
                            echo '<center><h5 style="color: green;">'.$success.'</h5></center>';
                        }
                        ?>
                        <div class="form-group">
                            <label>Fullname</label>
                            <input type="text" class="form-control" name="fullname" required>
                        </div>
                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="text" class="form-control" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description" required></textarea>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary account-btn" type="submit"><input type="hidden" name="emg">Request Emergency</button>
                        </div>
                    </form>
                </div>
			</div>
        </div>
    </div>
<?php
include_once('footer.php');
?>