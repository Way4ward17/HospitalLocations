<?php 
include_once('header.php');
if(isset($_POST['getaddr'])){
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
    if($upad==true){
        $success = 'Location info updated successfully';
    }else{
        $error = 'Cannot update location info, try again';
    }
}
?>
  <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-5 col-4">
                        <h4 class="page-title">Nearby Hospitals <i class="fa fa-map-marker" style="color: red;"></i> <marquee><i class="fa fa-ambulance" style="color: red;"></i></marquee></h4>
                    </div>
                </div>
                <?php
                    if(isset($error)){
                        echo '<center><h5 style="color: red;">'.$error.'</h5></center>';
                    }
                    if(isset($success)){
                        echo '<center><h5 style="color: green;">'.$success.'</h5> <a href="emergency.php">Click here to reload page <i class="fa fa-cog"></i></a></center>';
                    }
                    ?>
            <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" class="form-signin" enctype="multipart/form-data">
                <div class="row filter-row">
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus">
                            <label class="focus-label">Your Latitude</label>
                            <div class="cal-ico">
                                <input class="form-control floating" type="text" value="<?php echo $lat; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus">
                            <label class="focus-label">Your Longitude</label>
                            <div class="cal-ico">
                                <input class="form-control floating" type="text" value="<?php echo $log; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <button class="btn-success btn-round"> <input type="hidden" name="getaddr"><i class="fa fa-refresh"></i></button>
                    </div>
                </div>
            </form>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Doctors</th>
                                        <th>Address</th>
                                        <th>longitude</th>
                                        <th>Latitude</th>
                                        <th>Distance</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $count = 0;
                                        $latt = $lat;
                                        $logg = $log;
                                        $chk = fetch_loc($latt,$logg);
                                        if ($chk->num_rows > 0) {
                                            while ($fetch = $chk->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td><?php echo $count = $count + 1; ?></td>
                                        <td><?php echo $fetch['hospitalname']; ?></td>
                                        <td><?php echo $fetch['description']; ?></td>
                                        <td><?php echo $fetch['doctors']; ?></td>
                                        <td><?php echo $fetch['address']; ?></td>
                                        <td><?php echo $fetch['longitude']; ?></td>
                                        <td><?php echo $fetch['latitude']; ?></td>
                                        <td><?php echo $fetch['distance']; ?></td>
										<td><span class="custom-badge status-green">Active</span></td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="viewdir.php?hosp=<?php echo $fetch['id']; ?>"><i class="fa fa-pencil m-r-5"></i> view directions</a>
                                                    <a class="dropdown-item" href="emergency_complaints.php?hosp=<?php echo $fetch['hospitalname']; ?>"><i class="fa fa-warning m-r-5"></i> emergency complaints</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                            }
                                        }else{
                                            echo '<tr><td>No Nearby hospital found</td></tr>';
                                        }
                                    
                                    
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="map_canvas" style="width:100%;height:300px;"></div>
        </div>
  </div>
<script src="assets/js/jquery-3.2.1.min.js"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAlu141pyz-gUf0iE4UmkjMOoEmgt8mOsM&callback=my_map_add"></script> -->
<script type="text/javascript">
    function initialize() {
      var myLatlng = new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $log; ?>);
      var myOptions = {
        zoom: 8,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      }
      var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
        var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        title: "My Location" 
        });
    <?php
    $latt = $lat;
    $logg = $log;
    $chk = fetch_loc($latt,$logg);
        while ($fetch = $chk->fetch_assoc()) 
            echo "addMarker(new google.maps.LatLng(".$fetch['latitude'].", ".$fetch['longitude']."), map);";
        
    ?>
    function addMarker(latLng, map) {
        var marker = new google.maps.Marker({
            position: latLng,
            map: map,
            draggable: true, // enables drag & drop
            animation: google.maps.Animation.DROP
        });

        return marker;
    }
  }
    function loadScript() {
      var script = document.createElement("script");
      script.type = "text/javascript";
      script.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyAlu141pyz-gUf0iE4UmkjMOoEmgt8mOsM&callback=initialize";
      document.body.appendChild(script);
    }

    window.onload = loadScript;


</script>
<?php 
include_once('footer.php');
?>