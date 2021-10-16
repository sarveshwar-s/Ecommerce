<?php
include("db.php"); 
session_start(); 
if(isset($_SESSION["vendoruserid"]) || isset($_SESSION["adminuserid"])){

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
 <!-- for filtering the category -->
</head>
<body>
  <?php include("vendor_navbar.php"); ?>
  <br>
<div class="container">
<!-- =============================TOP TAB NAVIGATION=============================     -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="processing-tab" data-toggle="tab" href="#processingorders" role="tab" aria-controls="home"
      aria-selected="true">New orders</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="completed-tab" data-toggle="tab" href="#completedorders" role="tab" aria-controls="profile"
      aria-selected="false">Completed orders</a>
  </li>
</ul>
<!-- =============================TOP TAB NAVIGATION=============================     -->
<?php 
  $orderids = array();
  $removeduplicates="SELECT DISTINCT(oid) from `orders` WHERE status='Accepted'";
  $resultz = mysqli_query($connection,$removeduplicates);
  while($row = mysqli_fetch_assoc($resultz)){
    array_push($orderids,$row["oid"]);
  }
  ?>
<!-- =============================DATA DISPLAYED INSIDE PROCESSING TAB=============================     -->
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="processingorders" role="tabpanel" aria-labelledby="processing-tab">
    <!-- processing orders -->
        <!-- for every order iterate the button onyl -->
        <?php
        //select o.oid,u.name,u.address,u.contact,p.pname,p.pprice,o.qty from users u INNER JOIN orders o ON u.id = o.cid INNER JOIN product p ON o.pid = p.pid WHERE o.status='Accepted'
         for($y=0;$y<sizeof($orderids);$y++){
          $sql = "select o.oid,u.name,u.address,u.contact,p.pname,p.pprice,o.qty from users u INNER JOIN orders o ON u.id = o.cid INNER JOIN product p ON o.pid = p.pid WHERE o.status='Accepted' and oid=.$orderids[$y]";
          $results = mysqli_query($connection,$sql);
         ?>
  <!--====================== ORDER BUTTON AND MARK AS COMPLETE BUTTON ========================== -->
    <div class="row">
  <button class="btn btn-success" type="button" data-toggle="collapse" data-target="<?php echo".multi-collapse".$orderids[$y]; ?>"
   aria-expanded="false" aria-controls="table address"> 
    <p>Order number: <?php echo $orderids[$y]; ?></p>
 </button>

  
 <form action="refresh.php" method="post">
 <input type="text" name="orderid" value="<?php echo $orderids[$y];?>" hidden>
 <input class="btn btn-success" name="completed" type="submit" value="Mark as complete">
           </form>   
             
 <form action="distance.php" method="post">
 <input type="text" name="orderid" value="<?php echo $orderids[$y];?>" hidden>
 <input class="btn btn-success" name="getdistance" type="submit" value="Get Directions">
           </form>   
           
           
</div>
  <!--====================== ORDER BUTTON AND MARK AS COMPLETE BUTTON ========================== -->


<!--/ Collapse buttons -->
<!-- ===================================CONTENT HIDDEN BY ORDER BUTTON-=================== -->
<!-- Collapsible content -->
<div class="row">
  <div class="col-md-8">
    <div class="<?php echo "collapse multi-collapse".$orderids[$y];?>" id="table" style="padding: 5px;">
      <div class="card card-body">
        <!-- add table here -->
        <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">sl.no</th>
      <th scope="col">Product Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Product Price</th>
    </tr>
  </thead>
  <tbody>
    <!-- CREATING TABLE TO FETCH ALL PRODUCT IDS  -->
    <?php
$sql = "select o.oid,u.name,u.address,u.contact,p.pname,p.pprice,o.qty from users u INNER JOIN orders o ON u.id = o.cid INNER JOIN product p ON o.pid = p.pid WHERE o.status='Accepted' and oid=".$orderids[$y];
$results = mysqli_query($connection,$sql);
while($rows = mysqli_fetch_assoc($results)){
      $order_id = $rows['oid'];
      $name = $rows['name'];
$address = $rows['address'];
$product_name = $rows['pname'];
$product_price = $rows['pprice'];
$product_qty = $rows['qty'];
$contactnumber = $rows['contact'];

?>
    <tr>
      <th scope="row">1</th>
      <td><?php echo $product_name; ?></td>
      <td><?php echo $product_qty ?></td>
      <td><?php echo $product_price ?></td>
    </tr>
    <?php } //closing while loop ?>
  </tbody>
</table>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="<?php echo "collapse multi-collapse".$orderids[$y];?>" style="padding: 5px;">
      <div class="card card-body">
        <!-- add address of the client here -->
            <h4><strong>Name:</strong> <?php echo $name; ?> </h4>
            <h4><strong>Phone No:</strong> <?php echo $contactnumber; ?> </h4>
            <h4><strong> Address: </strong> </h4>
        <h5> <?php echo $address ?></h5>
        <?php //} ?>
      </div>
    </div>
  </div>
</div>
<!-- creates horizontal line -->
<hr> 

  <?php  } //closing for loop?>
        
     
    <!-- Collapse buttons -->
<!-- ===================================CONTENT HIDDEN BY PROCESSING ORDER BUTTON-=================== -->


  </div>
  <!-- ===================================CONTENT HIDDEN BY COMPLETED ORDER BUTTON-=================== -->

  <div class="tab-pane fade" id="completedorders" role="tabpanel" aria-labelledby="completed-tab">
    <!-- completed orders table -->
     <!-- to be updted soon -->
     <?php 
                $sql = "select o.oid,u.name,u.address,u.contact,p.pname,p.pprice,o.qty from users u INNER JOIN orders o ON u.id = o.cid INNER JOIN product p ON o.pid = p.pid WHERE o.status='Completed'";
                $results = mysqli_query($connection,$sql);
           while($rows = mysqli_fetch_assoc($results)){
                $order_id = $rows['oid'];   
                $name = $rows['name'];
        $address = $rows['address'];
        $product_name = $rows['pname'];
        $product_price = $rows['pprice'];
        $product_qty = $rows['qty'];
        $contactnumber = $rows['contact'];        
     ?>
      <button class="btn btn-success" type="button" data-toggle="collapse" data-target="<?php echo".multi-collapse".$order_id; ?>"
   aria-expanded="false" aria-controls="table address"> 
           <p>Order number: <?php echo $order_id; ?></p>
 </button>
     <div class="row">
  <div class="col-md-8">
    <div class="<?php echo "collapse multi-collapse".$order_id;?>" id="table" style="padding: 5px;">
      <div class="card card-body">
        <!-- add table here -->
        <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">sl.no</th>
      <th scope="col">Product Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Product Price</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td><?php echo $product_name; ?></td>
      <td><?php echo $product_qty ?></td>
      <?php //$totalprice = $product_qty * $product_price; ?>
      <td><?php echo $product_price; ?></td>
    </tr>
       <?php //} ?>
  </tbody>
</table>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="<?php echo "collapse multi-collapse".$order_id;?>" style="padding: 5px;">
      <div class="card card-body">
            <h4><strong>Name:</strong> <?php echo $name; ?> </h4>
            <h4><strong>Phone No:</strong> <?php echo $contactnumber; ?> </h4>
            <h4><strong> Address: </strong> </h4>
        <h5> <?php echo $address ?></h5>
        <?php //} ?>
      </div>
    </div>
  </div>
</div>
<!-- creates horizontal line -->
<hr> 
           <?php } ?>
  </div>

</div>
<!-- ===================================CONTENT HIDDEN BY COMPLETED ORDER BUTTON-=================== -->

        
     
        </div> <!-- closing the container -->    
</body>
</html>
<?php 
}
else{
  header("Location: vendor_login.php");
}

?>