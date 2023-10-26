<?php 
include_once('header.php');
?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">View Message</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="mailview-content">
                                <div class="mailview-header">
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <div class="text-ellipsis m-b-10">
                                                <span class="mail-view-title">Emergency Help</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="mail-view-action">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-white btn-sm" data-toggle="tooltip" title="Delete"> <i class="fa fa-trash-o"></i></button>
                                                    <button type="button" class="btn btn-white btn-sm" data-toggle="tooltip" title="Reply"> <i class="fa fa-reply"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php 
                                    $eid = $_GET['eid'];
                                    $fmsg = fetch_cmp($eid);
                                    if ($fmsg->num_rows > 0) {
                                        while ($fetch = $fmsg->fetch_assoc()) { 
                                    ?>
                                    <div class="sender-info">
                                        <div class="sender-img">
                                            <img width="40" alt="" src="assets/img/user.jpg" class="rounded-circle">
                                        </div>
                                        <div class="receiver-details float-left">
                                            <span class="sender-name"><?php echo $fetch['fullname']; ?></span>
                                            <span class="receiver-name">
												to <span>me</span>
                                            </span>
                                        </div>
                                        <div class="mail-sent-time">
                                            <span class="mail-time"><?php echo $fetch['date']; ?></span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="mailview-inner">
                                    <p>Nearest Hospital: <h4><?php echo $fetch['hospital']; ?></h4></p>
                                    <p>Message: <h4><?php echo $fetch['description']; ?></h4></p>
                                </div>
                            </div>
                            <!-- <div class="mailview-footer">
                                <div class="row">
                                    <div class="col-sm-6 left-action">
                                        <button type="button" class="btn btn-white"><i class="fa fa-reply"></i> Reply</button>
                                    </div>
                                    <div class="col-sm-6 right-action">
                                        <button type="button" class="btn btn-white"><i class="fa fa-trash-o"></i> Delete</button>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <?php
                        }
                    }else{
                        echo 'no message';
                    }
                    ?>
                </div>
            </div>
        </div>
<?php 
include_once('footer.php');
?>