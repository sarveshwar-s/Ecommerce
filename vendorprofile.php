<?php include("db.php") ?>
<?php include('keyformap.php');?>
<?php 
  session_start();
  if(isset($_SESSION["vendoruserid"])){
  $userid = $_SESSION["userid"];
  ?>
<html>
<head>
<title>FARMAZON</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type='text/javascript' src='http://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=<?php echo $key?>' async defer></script>
  
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
</head>
<body>

<!-- navigation bar -->
<nav class="navbar navbar-top navbar-expand-lg navbar-dark bg-green">
<div class="container">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
  
    <ul class="navbar-nav">
<li class="nav-item active">
<a class="nav-link" href="/organic">Home <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item"><a class="nav-link" href="/organic/productdisplay.php"> Product list </a></li>
<li class="nav-item"><a class="nav-link" href="/organic/cart.php"> Cart </a></li>
<li class="nav-item"><a class="nav-link" href="/organic/cart.php"><i class="fas fa-shopping-basket">1</i></a></li>
    </ul>
  </div>
  
  <form class="form-inline">
      <div class="md-form my-0">
       <a class="nav-link" href="/organic/profile.php">profile</a>
      </div>
    </form>
</div> <!-- container //  -->
</nav>
<!-- end of navigation bar -->

<!-- ====================================section================================================= -->
<section class="section-content bg padding-y" style="padding:14px;">
<div class="container">
 <div class="row">
     <div class="col-md-6">
         <?php 
         //get the id value from cookies stored
         $query = "select * from supplier where sid =".$userid;
         $results = mysqli_query($connection,$query);
         while($rows = mysqli_fetch_assoc($results)){
             $name = $rows["sname"];
             $email = $rows["email"];
             $password = $rows["password"];
             $contact = $rows["contact"];
             $address = $rows["address"];
             $city = $rows["city"];
             $pincode = $rows["pincode"];            
             $latitude = $rows["latitude"];
             $longitude = $rows["longitude"];
          ?>
         <!-- user profile details -->
<form class="text-center border border-light p-5" action="refresh.php" method="post">

<p class="h4 mb-4"> Vendor Profile Page</p>

<!-- Name -->
<input type="text" name="name" value="<?php echo $name; ?>" id="defaultContactFormName" class="form-control mb-4" placeholder="Name">

<!-- Email -->
<input type="email" name="email" value="<?php echo $email; ?>" id="defaultContactFormEmail" class="form-control mb-4" placeholder="E-mail">
<!-- password -->
<input type="password" name="password" value="<?php echo $password; ?>" id="defaultContactFormEmail" class="form-control mb-4" placeholder="Password">
<!-- mobile number -->
<input type="text" name="mobilenumber" value="<?php echo $contact; ?>" id="defaultContactFormEmail" class="form-control mb-4" placeholder="Mobile number">



<!-- Message -->
<div class="form-group">
    <textarea name="address" class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Message"><?php echo $address; ?></textarea>
</div>
<div class="form-group">
<input type="text" name="pincode" value="<?php echo $pincode; ?>" id="defaultContactFormEmail" class="form-control mb-4" placeholder="Pincode">
</div>

<!-- Send button -->
<button class="btn btn-info btn-block" type="submit" name="vendorprofileupdate">Update Profile</button>


<!-- Default form contact -->
     </div>
    <div class="col-md-6">
      <!-- Draggable pushpin map for address plotting -->
       <div id='searchBoxContainer'>
           <label>Enter Your City</label>
        <input type='text' id='searchBox'/>
    </div>

    <div id="myMap" style="position:relative;width:600px;height:500px;"></div>
    <strong>Drag The Pin To Your Delivery Location.</strong>
    </div>
    <input type="text" name="latitude" id="lat" hidden>
    <input type="text" name="longitude" id="long" hidden>
     
</div>
</form>
         <?php }  //ending php while loop ?>
</div>
    
         </section>
<script type='text/javascript'>
    var map;
    var pin;
    var events;
    var lat;
    var lon;
    function GetMap() {
        map = new Microsoft.Maps.Map('#myMap', {});

        Microsoft.Maps.loadModule('Microsoft.Maps.AutoSuggest', function () {
            var manager = new Microsoft.Maps.AutosuggestManager({ map: map });
            manager.attachAutosuggest('#searchBox', '#searchBoxContainer', selectedSuggestion);
           

        });
    }

    function selectedSuggestion(result) {
        //Remove previously selected suggestions from the map.
                map.entities.clear();
        //Show the suggestion as a pushpin and center map over it.
        pin = new Microsoft.Maps.Pushpin(result.location,{draggable:true});
        map.entities.push(pin);
        map.setView({ bounds: result.bestView });
         Microsoft.Maps.Events.addHandler(pin, 'dragend', function () {lat=pin.getLocation().latitude;
             lon=pin.getLocation().longitude;
			 
	      //gets the location when address is entered 
		 console.log(pin.getLocation().latitude);
		 console.log(pin.getLocation().longitude);
         document.getElementById("lat").value = pin.getLocation().latitude;
         document.getElementById("long").value = pin.getLocation().longitude;
         });
     }
    </script>
</body>
</html>
<?php
}  //closing the top if statement
else{
    header("Location: vendor_login.php");
}
?>