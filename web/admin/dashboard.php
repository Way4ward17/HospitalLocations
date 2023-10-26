<?php 
include_once('header.php');
?>
<div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                        <div class="dash-widget">
							<span class="dash-widget-bg1"><i class="fa fa-stethoscope" aria-hidden="true"></i></span>
							<div class="dash-widget-info text-right">
								<h3><?php
                                $table = 'hospitals';
                                echo mysqli_num_rows(fetch_data($table));
                                ?>
                                </h3>
								<span class="widget-title1">Hospitals <i class="fa fa-check" aria-hidden="true"></i></span>
							</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                        <div class="dash-widget">
                            <span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>
                                <?php
                                $table = 'users';
                                echo mysqli_num_rows(fetch_data($table));
                                ?></h3>
                                <span class="widget-title2">Users <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg3"><i class="fa fa-user-md" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>72</h3>
                                <span class="widget-title3">Doctors <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                        <div class="dash-widget">
                            <span class="dash-widget-bg4"><i class="fa fa-heartbeat" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3><?php
                                $table = 'complaints';
                                echo mysqli_num_rows(fetch_data($table));
                                ?></h3>
                                <span class="widget-title4">Emergency <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="row">
					<div class="col-12 col-md-6 col-lg-8 col-xl-8">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title d-inline-block">New Users </h4> <a href="users.php" class="btn btn-primary float-right">View all</a>
							</div>
							<div class="card-block">
								<div class="table-responsive">
									<table class="table mb-0 new-patient-table">
										<tbody>
                                            <?php
                                            $table = 'users';
                                            $fetch_usrs = fetch_set($table);
                                            if ($fetch_usrs->num_rows > 0) {
                                                while ($fetch = $fetch_usrs->fetch_assoc()) { ?>
                                            
											<tr>
												<td>
													<img width="28" height="28" class="rounded-circle" src="assets/img/user.jpg" alt=""> 
													<h2><?php echo $fetch['username']; ?></h2>
												</td>
												<td><?php echo $fetch['email']; ?></td>
												<td><?php echo $fetch['phone']; ?></td>
												<td><button class="btn btn-primary btn-primary-one float-right">new</button></td>
											</tr>
                                            <?php
                                                }
                                            }else{
                                                echo '<tr><td>No records yet!</td></tr>';
                                            }
                                            ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-4 col-xl-4">
						<div class="hospital-barchart">
							<h4 class="card-title d-inline-block">Recent added Hospital</h4>
						</div>
						<div class="bar-chart">
							<!-- <div class="legend">
								<div class="item">
									<h4>Level1</h4>
								</div>
								
								<div class="item">
									<h4>Level2</h4>
								</div>
								<div class="item text-right">
									<h4>Level3</h4>
								</div>
								<div class="item text-right">
									<h4>Level4</h4>
								</div>
							</div> -->
							<div class="chart clearfix">
                            <?php
                                $table = 'hospitals';
                                $fetch_h = fetch_set($table);
                                if ($fetch_h->num_rows > 0) {
                                    while ($fetch = $fetch_h->fetch_assoc()) { ?>
								<div class="item">
									<div class="bar">
										<!-- <span class="percent">16%</span> -->
										<div class="item-progress" data-percent="16">
											<span class="title"><?php echo $fetch['hospitalname']; ?></span>
										</div>
									</div>
								</div>
                                <?php
                                    }
                                }else{
                                    echo '<tr><td>No records yet!</td></tr>';
                                }
                                ?>
								
							</div>
						</div>
					 </div>
				</div>
            </div>
           
        </div>
<?php
include_once('footer.php');
?>