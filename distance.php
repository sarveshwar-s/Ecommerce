<?php
session_start(); 
include('keyformap.php');
include('db.php');
if(isset($_POST["getdistance"])){
    $ordersid = $_POST["orderid"];
}
$latitude = array();
$longitude = array();
// query for getting lat and long from user table
$query = "select DISTINCT o.vid,s.latitude,s.longitude from orders o INNER JOIN supplier s ON o.vid=s.sid where oid=".$ordersid; //order id when button clicked 
$query1="select DISTINCT o.cid,u.latitude,u.longitude from orders o INNER JOIN users u ON o.cid=u.id where oid=".$ordersid; //same as above
$result = mysqli_query($connection,$query);
$result1 = mysqli_query($connection,$query1);
$row1 = mysqli_fetch_assoc($result1);
array_push($latitude,$row1["latitude"]);
array_push($longitude,$row1["longitude"]);
while($row = mysqli_fetch_assoc($result)){
	array_push($latitude,$row["latitude"]);
   array_push($longitude ,$row["longitude"]);
}
?>
<!DOCTYPE html>
<?php include ('keyformap.php');?>
<html>
<head>
<title>FARMAZON</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- bootstrap4 -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">

<!-- custom styles -->
<link href="css/ui.css" rel="stylesheet" type="text/css">
<link href="css/responsive.css" rel="stylesheet" media="only screen and (max-width: 1200px)">




<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.5/css/mdb.min.css" rel="stylesheet">
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.5/js/mdb.min.js"></script>

	<script type='text/javascript'>
        var map;
        var directionsManager;
        var noofpoint=0;
        <?php
        $latarray=json_encode($latitude);
        $longarray=json_encode($longitude);
        echo "var latitude=".$latarray.";\n";
        echo "var longitude=".$longarray.";\n";

?>

        function GetMap()
        {
            map = new Microsoft.Maps.Map('#myMap', {});
            initmap();
        }
         function initmap() { //Load the directions module.
            Microsoft.Maps.loadModule('Microsoft.Maps.Directions', function () {
                //Create an instance of the directions manager.
                directionsManager = new Microsoft.Maps.Directions.DirectionsManager(map);
for( noofpoint=1;noofpoint<latitude.length;noofpoint++) //size should be mentioned
{
                //Create waypoints to route between.
                var waypoint = new Microsoft.Maps.Directions.Waypoint({ address: 'Vendor'+noofpoint, location: new Microsoft.Maps.Location(latitude[noofpoint],longitude[noofpoint])});
                directionsManager.addWaypoint(waypoint);

}       
var waypoint = new Microsoft.Maps.Directions.Waypoint({ address: 'customer', location: new Microsoft.Maps.Location(latitude[0],longitude[0])});
                directionsManager.addWaypoint(waypoint);


                //Specify the element in which the itinerary will be rendered.
                directionsManager.setRenderOptions({ itineraryContainer: '#directionsItinerary' });

                //Calculate directions.
                directionsManager.calculateDirections();
            });
        }
    </script>
    <script type='text/javascript' src='http://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=<?php echo $key;?>' async defer></script>
</head>
<body>
    <?php include("vendor_navbar.php"); ?>
    <div class="container">
    <div class="row">
    <div class="col-sm-6 col-md-6">
    <div id="myMap" style="position:relative;width:relative;height:relative;"></div>
    </div>
    <div class="col-sm-6 col-md-6">
    <div id='directionsItinerary'></div>
    </div>
    </div> <!-- closing row -->
    </div><!-- closing container -->
  </body>
</html>
