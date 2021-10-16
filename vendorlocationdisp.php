<?php 
include('keyformap.php');
include('db.php');
$latitude = array();
$longitude = array();
$addressandc=array();
$sellername=array();
// query for getting lat and long from user table
$query = "select sname,latitude,longitude,address,contact from supplier";
$result = mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($result)){
	array_push($latitude,$row["latitude"]);
   array_push($longitude ,$row["longitude"]);
   array_push($addressandc ,$row["address"]."ContactNo:".$row["contact"]);
   array_push($sellername ,$row["sname"]);
}
?>
<html>
   <head>
      <title></title>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <script type="text/javascript" src="http://ecn.dev.virtualearth.net/mapcontrol/mapcontrol.ashx?v=7.0">
</script>

 <script type="text/javascript">
  var map = null, infobox, dataLayer;

  function GetMap() 
  {
  
      map = new Microsoft.Maps.Map(document.getElementById("myMap"),
         {
            credentials:"<?php echo $key?>",
            center: new Microsoft.Maps.Location(<?php echo $latitude[0];?>,<?php echo $longitude[0];?>)});
     dataLayer = new Microsoft.Maps.EntityCollection();
     map.entities.push(dataLayer);
     map.setView({ zoom: 5 });
   var infoboxLayer = new Microsoft.Maps.EntityCollection();
     map.entities.push(infoboxLayer);
     infobox = new Microsoft.Maps.Infobox();
     infoboxLayer.push(infobox);
     AddData();
  }

function AddData() {
   <?php
$latarray = json_encode($latitude);
$longarray = json_encode($longitude);
$addarray=json_encode($addressandc);
$selarray=json_encode($sellername);
echo "var lat = ". $latarray . ";\n";
echo "var long=".$longarray.";\n";
echo "var title = ". $selarray . ";\n";
echo "var desc= ". $addarray . ";\n";

?>
var length=<?php echo sizeof($latitude);?>;
//Below is temp data that contains lat , lng and description values.
for(var i=0;i<length;i++){
 var pin1 = new Microsoft.Maps.Pushpin(new Microsoft.Maps.Location(Number(lat[i]),Number(long[i])));
    pin1.Title = title[i];
    pin1.Description = desc[i];
    Microsoft.Maps.Events.addHandler(pin1, 'click', displayInfobox);
    dataLayer.push(pin1);
}
}

function displayInfobox(e) {
    if (e.targetType == 'pushpin') {
        infobox.setLocation(e.target.getLocation());
                 
        infobox.setOptions({
            visible: true,
            title: e.target.Title,
            description: e.target.Description
        });
    }
}
</script>

   </head>
   <body onload="GetMap();">
      <div id='myMap' style="position:relative;width:600px;height:400px;"></div>
   </body>
</html>