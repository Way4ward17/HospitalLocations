<?php 
include_once('header.php');
?>
 <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-7 col-6">
                        <h4 class="page-title">My Profile</h4>
                    </div>
                </div>
                <div class="card-box profile-header">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
                                <div class="profile-img-wrap">
                                    <div class="profile-img">
                                        <a href="#"><img class="avatar" src="assets/img/user.jpg" alt=""></a>
                                    </div>
                                </div>
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile-info-left">
                                                <br>
                                                <h3 class="user-name m-t-0 mb-0"><?php echo $usn; ?></h3>
                                                <small class="text-muted">Date Joined: <?php echo $dat; ?></small>
                                                <div class="staff-msg"><a href="message.php" class="btn btn-primary">Send Message</a></div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <ul class="personal-info">
                                                <li>
                                                    <span class="title">Phone:</span>
                                                    <span class="text"><a href="#"><?php echo $num; ?></a></span>
                                                </li>
                                                <li>
                                                    <span class="title">Email:</span>
                                                    <span class="text"><a href="#"><?php echo $mail; ?></a></span>
                                                </li>
                                                <li>
                                                    <span class="title">Address:</span>
                                                    <span class="text"><?php echo $add; ?></span>
                                                </li>
                                                <li>
                                                    <span class="title">Longitude:</span>
                                                    <span class="text"><?php echo $log; ?></span>
                                                </li>
                                                <li>
                                                    <span class="title">Lattitude:</span>
                                                    <span class="text"><?php echo $lat; ?></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>
 </div>

<?php 
include_once('footer.php');
?>