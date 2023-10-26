<?php 
include_once('header.php');
?>
 <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-5 col-5">
                        <h4 class="page-title">All Users</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>longitude</th>
                                        <th>Lattitude</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $count = 0;
                                        $table = 'users';
                                        $fetch_usrs = fetch_data($table);
                                        if ($fetch_usrs->num_rows > 0) {
                                            while ($fetch = $fetch_usrs->fetch_assoc()) { ?>  
                                    <tr>
                                        <td><?php echo $count = $count + 1; ?></td>
                                        <td><?php echo $fetch['username']; ?></td>
                                        <td><?php echo $fetch['email']; ?></td>
                                        <td><?php echo $fetch['phone']; ?></td>
                                        <td><?php echo $fetch['address']; ?></td>
                                        <td><?php echo $fetch['longitude']; ?></td>
                                        <td><?php echo $fetch['latitude']; ?></td>
										<td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="delu dropdown-item" id="<?php echo $fetch['id']; ?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
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
        </div>
<script src="assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
 $(document).ready(function(){
    $('.delu').click(function(){
        var delu = $(this).attr("id");
        if(confirm("Are you sure you want to delete?")){
            $.ajax({
            url:'ajaxcall.php',
            method:'POST',
            data:'delu='+delu,
            success:function(data){
              alert(data);
            },
            error: function(data){
            }
            });
            location.reload();
        }
    });
})
</script>
<?php 
include_once('footer.php');
?>