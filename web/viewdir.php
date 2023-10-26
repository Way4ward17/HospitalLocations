<?php 
include_once('header.php');
$hid = $_GET['hosp'];
$fetch_d = fetchinf($hid);
    while ($fetch = $fetch_d->fetch_assoc()) {
       $longi = $fetch['longitude'];
       $latt = $fetch['latitude'];
       $tt = $fetch['hospitalname'];
        $_SESSION['lt'] = $latt;
        $_SESSION['lg'] = $longi;
        $_SESSION['tit'] = $tt;
    }
?>
  <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-5 col-4">
                        <h4 class="page-title">Nearby Hospital <i class="fa fa-map-marker" style="color: red;"></i> <marquee><i class="fa fa-ambulance" style="color: red;"></i></marquee></h4>
                    </div>
                </div>
                <center><p style="color: red;"><i class="fa fa-map-marker" style="color: red;"></i> A is your current location, while <i class="fa fa-map-marker" style="color: red;"></i> B is your destination</p></center>
                <div class="row">
                    <div class="col-md-12">
                        
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

      var startPoint = "<?php echo $lat; ?>, <?php echo $log; ?>";
      var endPoint = "<?php echo $_SESSION['lt']; ?> , <?php echo $_SESSION['lg']; ?>";

      var directionsService = new google.maps.DirectionsService();
      var directionsRenderer = new google.maps.DirectionsRenderer();

      var myOptions = {
        zoom: 8,
        center: myLatlng,
        // mapTypeId: google.maps.MapTypeId.TERRAIN
        mapTypeId: google.maps.MapTypeId.ROADMAP
      }
      var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
      directionsRenderer.setMap(map);
        var request = {
        origin: startPoint,
        destination: endPoint,
        travelMode: google.maps.TravelMode.DRIVING, // You can also use BICYCLING, TRANSIT, or WALKING
        };
        directionsService.route(request, function(result, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionsRenderer.setDirections(result);
        } else {
            console.error("Directions request failed: " + status);
        }
        });
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