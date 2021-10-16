<?php
include('keyformap.php');
include('db.php');
session_start();
// query for getting lat and long from user table
$query = "select latitude,longitude from users where id=".$_SESSION["userid"];
$result = mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($result)){
	$latitude = $row["latitude"];
	$longitude = $row["longitude"];
  $latlongstring = ''.$latitude.','.$longitude;

}
$sellerid = array();
// echo $latlongstring;
$destination = array();
//query for getting lat and long from supplier table
$query = "select * from supplier";
$results = mysqli_query($connection,$query);
while($rows = mysqli_fetch_assoc($results)){
	array_push($sellerid,$rows["sid"]);
	$slatitude = $rows["latitude"];
	$slongitude = $rows["longitude"];
  $slatlongstring = ''.$slatitude.','.$slongitude;
  array_push($destination,$slatlongstring);
}
$origin=array();
array_push($origin,$latlongstring);
//$destination=array("18.1234,30.1234","45.5347,-122.6231","50.12345,-122.12345","47.4747,-122.2057");

$originforurl=$latlongstring;
echo "origin: ".$originforurl;
$destinationforurl="";
$index=array();
$count=sizeof($destination);
echo "count desitnations: ".$count;
$travelDistance;
$min;
$i=0;
for ($x = 0; $x <$count-1; $x++) {
    $destinationforurl=$destinationforurl.$destination[$x].";";
	
} 
$destinationforurl=$destinationforurl.$destination[$count-1];
echo $destinationforurl;

$url="https://dev.virtualearth.net/REST/v1/Routes/DistanceMatrix?origins=".$originforurl."&destinations=".$destinationforurl."&travelMode=driving&key=".$key;

// $context = stream_context_create(array(
//     'http' => array('ignore_errors' => true),
// ));

//echo $url;
$REQUEST = file_get_contents($url);
$REQUEST = json_decode($REQUEST);
$selecteddestination = array();
for($y=0;$y<$count;$y++)
{
	$min=json_encode($REQUEST->resourceSets[0]->resources[0]->results[$y]->travelDistance);
	//echo $min."</br>";
	//if($min<$travelDistance && $min>0)
	if($min<25 && $min>0)
	{
		//$index=$y;
		//$selectedlat= json_encode($REQUEST->resourceSets[0]->resources[0]->destination[$y]->latitude);
		//$selectedlong=json_encode($REQUEST->resourceSets[0]->resources[0]->destination[$y]->longitude);

		array_push($index,$sellerid[$y]);
		echo "sellerid: ".$sellerid[$y]."<br>";
		//array_push($selecteddestination,);
		$travelDistance=$min;
	}
	
}
$_SESSION['selectedseller']=array();
for($iter=0;$iter<sizeof($index);$iter++)
{
	//seller id array
	echo $index[$iter]."<br>";
	array_push($_SESSION['selectedseller'],$index[$iter]);
	//echo $travelDistance."<br>";
//	echo $_SESSION["selectedseller"][$iter];
	echo $destination[$iter]."<br>";
}
header("Location:productdisplay.php");
// foreach ($index as $values){
// 	$REQUEST->resourceSets[0];
// }
  
// echo json_encode($REQUEST->resourceSets[0]->resources[0]->results[0]->travelDistance);
// echo json_encode($REQUEST->resourceSets[0]->resources[0]);
// print_r($REQUEST->resourceSets[0]->resources[0]->results[0]->travelDistance);
?>