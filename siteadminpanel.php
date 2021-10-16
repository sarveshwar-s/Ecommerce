<?php
  include("db.php");
 session_start();
 if(isset($_SESSION["adminuserid"])){
?>
<html>
<head>
<title>FARMAZON</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
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
    <!-- list out vendors -->
 <!-- list out all orders -->
 <!-- display vendor maps -->
 <!-- all insertion forms should be available -->
 <!-- clients purchase history -->
 <!-- if possible a graph for sale -->

 <?php include('admin_navbar.php'); ?>
 <br>
 <div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="processing-tab" data-toggle="tab" href="#processingorders" role="tab" aria-controls="home"
      aria-selected="true">Orders Information</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="completed-tab" data-toggle="tab" href="#completedorders" role="tab" aria-controls="profile"
      aria-selected="false">Client Details</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="vendor-details" data-toggle="tab" href="#vendordetails" role="tab" aria-controls="vendor"
      aria-selected="false">vendor Details</a>
  </li>
</ul>
<!-- ============================================================================================== -->
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="processingorders" role="tabpanel" aria-labelledby="processing-tab">
    <!-- processing orders -->
        <!-- for every order iterate the button onyl -->
        
        
        <!-- <p> this is in processing tab </p> -->
        

<!--/ Collapse buttons -->

<!-- Collapsible content -->
<div class="row">
  <div class="col-md-12 col-sm-12">
        <!-- add table here -->
        <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">sl.no</th>
      <th scope="col">Product Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Product Price</th>
      <th scope="col">Client Name </th>
      <th scope="col">Client address </th>
      <th scope="col">Vendor name </th>
      <th scope="col">Vendor Mail </th>
    </tr>
  </thead>
  <tbody>
  <?php
$sql = "select u.name,u.address,s.sname,s.email,o.vid,p.pname,p.pprice,o.qty from users u INNER JOIN orders o ON u.id = o.cid INNER JOIN product p ON o.pid = p.pid INNER JOIN supplier s ON s.sid = o.vid";
$results = mysqli_query($connection,$sql);
while($rows = mysqli_fetch_assoc($results)){
    $name = $rows['name'];
    $address = $rows['address'];
    $product_name = $rows['pname'];
    $product_price = $rows['pprice'];
    $product_qty = $rows['qty'];
    $vendor_id = $rows["vid"];
    $vendor_name = $rows["sname"];
    $vendor_email = $rows["email"];

    ?> 
    <!-- used to get data from orders table -->
    <tr>
      <td> 1 </td>
      <td> <?php echo $product_name;?> </td>
      <td> <?php echo $product_qty; ?> </td>
      <td> <?php echo $product_price ?></td>
      <td> <?php echo $name; ?> </td>
      <td> <?php echo $address;?></td>
      <td> <?php echo $vendor_name ?></td>
      <td> <?php echo $vendor_email ?></td>
 </tr>
      <?php } ?>
  </tbody>
</table>
      
  </div>
  
</div>

<hr>    

  </div>
  <!-- ========================================================================================= -->
  <div class="tab-pane fade" id="completedorders" role="tabpanel" aria-labelledby="completed-tab">
    <!-- completed orders table -->
     <!-- <p>to be updted soon</p> -->
     <div class="row">
     <div class="col-md-6">
     <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">sl.no</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Pincode</th>
      <th scope="col">Contact Number </th>
    </tr>
  </thead>
  <tbody>
  <?php
$sql123 = "select u.id,u.name,u.address,u.pincode,u.contact from users u";
$results1 = mysqli_query($connection,$sql123);
while($rowz = mysqli_fetch_assoc($results1)){
    $id = $rowz["id"];
    $name = $rowz['name'];
    $address = $rowz['address'];
    $pincode = $rowz['pincode'];
    $contactnumber = $rowz['contact'];
    ?> 
    <!-- used to get data from orders table -->
    <tr>
      <td> <?php echo $id;?> </td>
      <td> <?php echo $name;?> </td>
      <td> <?php echo $address; ?> </td>
      <td> <?php echo $pincode ?></td>
      <td> <?php echo $contactnumber; ?> </td>
      <!-- <td> <?php //echo $address;?></td>
      <td> <?php //echo $vendor_name ?></td>
      <td> <?php// echo $vendor_email ?></td> -->
 </tr>
      <?php } ?>
  </tbody>
</table>
</div>
<!-- OPENING THE REMAILNING 6 COLUMNS -->
<div class="col-md-6">
  <!-- INSERT THE CLIENT LOCAITON MAP HERE========================================================= -->
  <iframe style="width:100%;height:450px;" src="customerlocationdisp.php" frameborder="0"></iframe>
</div>
</div>  <!-- closing row -->
  </div>
  <div class="tab-pane fade" id="vendordetails" role-"tabpanel" aria-labelledby="vendor-details">
    <div class="row">
   <div class="col-md-6">
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">sl.no</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Pincode</th>
      <th scope="col">Contact Number </th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php 
     $query = "select * from supplier";
     $results = mysqli_query($connection,$query);
     while($rows = mysqli_fetch_assoc($results)){
        $id = $rows["sid"];
         $name = $rows["sname"];
         $email = $rows["email"];
         $password = $rows["password"];
         $contact = $rows["contact"];
         $address = $rows["address"];
         $city = $rows["city"];
         $pincode = $rows["pincode"];            
         $latitude = $rows["latitude"];
         $longitude = $rows["longitude"];
         $status = $rows["vstatus"];
      ?>
  <tr>
      <td> <?php echo $id;?> </td>
      <td> <?php echo $name;?> </td>
      <td> <?php echo $address; ?> </td>
      <td> <?php echo $pincode ?></td>
      <td> <?php echo $contact; ?> </td>
      <?php if($status=="Not Approved"){ ?>
      <td>
        <form action="refresh.php" method="post">
          <input type="text" name="vid" value="<?php echo $id; ?>" hidden>
        <input class="btn btn-success" type="submit" name="approved" value="Qualified"> 
        </form>
        <form action="refresh.php" method="post">
          <input type="text" name="vid" value="<?php echo $id; ?>" hidden>
          <input type="submit" class="btn btn-danger" name="notapproved" value="Not Qualified">
      </form>
         </td>
      <?php }
        else{ ?>
         <td> <?php echo $status; ?> 
        </td>
          <?php } ?>
      <!-- <td> <?php //echo $address;?></td>
      <td> <?php //echo $vendor_name ?></td>
      <td> <?php// echo $vendor_email ?></td> -->
 </tr>
     <?php } ?>
 </tbody>
     </table>

  </div>
  <div class="col-md-6">
  <iframe style="width:100%;height:450px;" src="vendorlocationdisp.php" frameborder="0"></iframe>
     </div>
     </div>
     </div>
        
     
        </div> <!-- closing the container -->

 
</body>
</html>
<?php 
} //closing the top if
else{
  header("Location: adminlogin.php");
} 
?>