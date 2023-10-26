<?php 
include_once('header.php');
if(isset($_POST['uhospital'])){
$hid = $_GET['hosp'];
$hospitalname = secure($_POST["hospitalname"]);
$description = secure($_POST["description"]);
$doctors = secure($_POST["doctors"]);
$address = secure($_POST["address"]);
$longitude = secure($_POST["longitude"]);
$latitude = secure($_POST["latitude"]);
$nurses = secure($_POST["nurses"]);
$rooms = secure($_POST["rooms"]);
$add = update_hospital($hid,$hospitalname, $description, $doctors, $address, $longitude, $latitude,$nurses, $rooms);
    if($add==true){
        $success = 'Hospital info updated successfully';
    }else{
        $error = 'Error updating Info, Try again';
    }
}
?>
  <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Update Hospital Info</h4>
                    </div>
                </div>
                <?php
                    if(isset($error)){
                        echo '<center><h4 style="color: red;">'.$error.'</h4></center>';
                    }
                    if(isset($success)){
                        echo '<center><h4 style="color: green;">'.$success.'</h4></center>';
                    }
                    ?>
                <?php
                if(isset($_GET['hosp'])){
                $hid = $_GET['hosp'];
                $fetch_d = fetchinf($hid);
                if($fetch_d->num_rows > 0) {
                    while ($fetch = $fetch_d->fetch_assoc()) { 
                ?>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Hospital Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="hospitalname" required value="<?php echo $fetch['hospitalname']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Available Doctors</label>
                                        <input class="form-control" type="text" name="doctors" value="<?php echo $fetch['doctors']; ?>" required>
                                    </div>
                                </div>
								<div class="col-sm-12">
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label>Address <span class="text-danger">*</span></label>
												<input type="text" class="form-control " name="address" value="<?php echo $fetch['address']; ?>" required>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Longitude <span class="text-danger">*</span></label>
												<input type="text" class="form-control " name="longitude" value="<?php echo $fetch['longitude']; ?>" required>
											</div>
										</div>
                                        <div class="col-sm-6">
											<div class="form-group">
												<label>Latitude <span class="text-danger">*</span></label>
												<input type="text" class="form-control " name="latitude" value="<?php echo $fetch['latitude']; ?>" required>
											</div>
										</div>
                                        <div class="col-sm-6">
											<div class="form-group">
												<label>Nurses <span class="text-danger">*</span></label>
												<input type="text" class="form-control " name="nurses" value="<?php echo $fetch['nurses']; ?>" required>
											</div>
										</div>
                                        <div class="col-sm-6">
											<div class="form-group">
												<label>Rooms <span class="text-danger">*</span></label>
												<input type="text" class="form-control " name="rooms" value="<?php echo $fetch['rooms']; ?>" required>
											</div>
										</div>
									</div>
								</div>
                            </div>
							<div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="3" cols="30" name="description" required> <?php echo $fetch['description']; ?></textarea>
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn"><input type="hidden" name="uhospital">Update Hospital</button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
                        }
                        }
                    }else{
                        echo 'invalid';
                    }
                ?> 
            </div>
  </div>
<?php 
include_once('footer.php');
?>