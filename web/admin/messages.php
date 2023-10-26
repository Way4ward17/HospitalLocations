<?php 
include_once('header.php');
?>

<div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Inbox</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <div class="email-header">
                                <div class="row">
                                    <div class="col-sm-10 col-md-8 col-8 top-action-left">
                                        <div class="float-left">
                                            
                                        </div>
                            
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="email-content">
								<div class="table-responsive">
									<table class="table table-inbox table-hover">
										<thead>
											<tr>
												<th colspan="6">
                                                <tr>
                                                    <th>Action</th>
                                                    <th>Name</th>
                                                    <th>Emergency</th>
                                                    <th>Date</th>
                                                   </tr>
												</th>
											</tr>
										</thead>
										<tbody>
                                        <?php
                                        $table = 'complaints';
                                        $fd = fetch($table);
                                        if ($fd->num_rows > 0) {
                                            while ($fetch = $fd->fetch_assoc()) { 
                                        ?>
											<tr class="unread clickable-row" data-href="viewmsg.php?eid=<?php echo $fetch['id']; ?>">
                                            <a href="viewmsg.php?eid=<?php echo $fetch['id']; ?>">
												
												<td><a href="viewmsg.php?eid=<?php echo $fetch['id']; ?>">view <i class="fa fa-eye"></i></a></td>
												<td class="name"><?php echo $fetch['fullname']; ?></td>
												<td class="subject">New Emergency</td>
												<td></td>
                                                <td class="mail-date"><?php echo $fetch['date']; ?></td>
                                            </a>
											</tr>
                                            <?php
                                            }
                                        }
                                        ?>
										</tbody>
									</table>
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