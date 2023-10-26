<?php 
include_once('header.php');
if(isset($_POST['addhospital'])){
$hospitalname = secure($_POST["hospitalname"]);
$description = secure($_POST["description"]);
$doctors = secure($_POST["doctors"]);
$address = secure($_POST["address"]);
$longitude = secure($_POST["longitude"]);
$latitude = secure($_POST["latitude"]);
$nurses = secure($_POST["nurses"]);
$rooms = secure($_POST["rooms"]);
$status = 'active';
$add = add_hospital($hospitalname, $description, $doctors, $address, $longitude, $latitude, $nurses, $rooms, $status);
    if($add==true){
        $success = 'Hospital info added successfully';
    }else{
        $error = 'Error adding Info, Try again';
    }
}
?>
  <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Add Hospital</h4>
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
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Hospital Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="hospitalname" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Available Doctors</label>
                                        <input class="form-control" type="text" name="doctors" required>
                                    </div>
                                </div>
								<div class="col-sm-12">
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label>Address <span class="text-danger">*</span></label>
												<input type="text" class="form-control " name="address" required>
											</div>
										</div>
                                        <div class="col-sm-6">
											<div class="form-group">
												<label>Available Nurse <span class="text-danger">*</span></label>
												<input type="number" class="form-control " name="nurses" required>
											</div>
										</div>
                                        <div class="col-sm-6">
											<div class="form-group">
												<label>Available Rooms</label>
												<input type="number" class="form-control " name="rooms" required>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Longitude <span class="text-danger">*</span></label>
												<input type="text" class="form-control " name="longitude" required>
											</div>
										</div>
                                        <div class="col-sm-6">
											<div class="form-group">
												<label>Latitude <span class="text-danger">*</span></label>
												<input type="text" class="form-control " name="latitude" required>
											</div>
										</div>
									</div>
								</div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone </label>
                                        <input class="form-control" type="text" name="phone" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email </label>
                                        <input class="form-control" type="text" name="email" required>
                                    </div>
                                </div>
                            </div>
							<div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="3" cols="30" name="description" required></textarea>
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn"><input type="hidden" name="addhospital">Create Hospital</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
  </div>
<?php 
include_once('footer.php');
?>