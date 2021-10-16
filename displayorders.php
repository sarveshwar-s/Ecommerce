<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
if(isset($_SESSION["vendoruserid"]) || isset($_SESSION["adminuserid"])){
include("db.php");
// echo $_SESSION['username']; 
// echo $_SESSION["userid"];

?>

<html>
<head>
<title>FARMAZON</title>
<!-- the library inclusion for this file is different. do not optimize it -->
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
<!-- bootstrap4 -->
<!-- <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"> -->

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
  <?php include('vendor_navbar.php'); ?>
  <br>
    <div class="container">
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
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="processingorders" role="tabpanel" aria-labelledby="processing-tab">
    <!-- processing orders -->
        <!-- for every order iterate the button onyl -->
        <?php 
           $sql = "select o.oid,u.name,v.sid,u.address,u.contact,p.pname,p.pprice,o.qty from users u INNER JOIN orders o ON u.id = o.cid INNER JOIN product p ON o.pid = p.pid INNER JOIN supplier v ON o.vid=v.sid WHERE o.status='Accepted' AND o.vid =".$_SESSION["userid"];
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
    <div class="row">
  <button class="btn btn-success" type="button" data-toggle="collapse" data-target="<?php echo".multi-collapse".$order_id; ?>"
   aria-expanded="false" aria-controls="table address"> 
    <p>Order number: <?php echo $order_id; ?></p>
 </button>
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
 <input type="text" name="orderid" value="<?php echo $order_id;?>" hidden>
 <input class="btn btn-success" name="completed" type="submit" value="Mark as complete">
           </form>           
</div>
               


<!--/ Collapse buttons -->

<!-- Collapsible content -->
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
      <?php
    //    $sql = "select u.name,u.address,u.contact,p.pname,p.pprice,o.qty from users u INNER JOIN orders o ON u.id = o.cid INNER JOIN product p ON o.pid = p.pid";
    //    $results = mysqli_query($connection,$sql);
    //    while($rows = mysqli_fetch_assoc($results)){
    //     $name = $rows['name'];
    //     $address = $rows['address'];
    //     $product_name = $rows['pname'];
    //     $product_price = $rows['pprice'];
    //     $product_qty = $rows['qty'];
      ?>
    <tr>
      <th scope="row">1</th>
      <td><?php echo $product_name; ?></td>
      <td><?php echo $product_qty ?></td>
      <td><?php echo $product_price ?></td>
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
        <!-- add address of the client here -->
        <?php 
        // $sql = "select u.name,u.address,p.pname,p.pprice,o.qty from users u INNER JOIN orders o ON u.id = o.cid INNER JOIN product p ON o.pid = p.pid";
        // $results = mysqli_query($connection,$sql);
        // while($rows = mysqli_fetch_assoc($results)){
        //     $name = $rows['name'];
        //     $contactnumber = $rows['contact'];
        //     $address = $rows['address'];
            ?>
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
        
     
    <!-- Collapse buttons -->


  </div>
  <div class="tab-pane fade" id="completedorders" role="tabpanel" aria-labelledby="completed-tab">
    <!-- completed orders table -->
     <!-- to be updted soon -->
     <?php 
     //"select o.oid,u.name,v.sid,u.address,u.contact,p.pname,p.pprice,o.qty from users u INNER JOIN orders o ON u.id = o.cid INNER JOIN product p ON o.pid = p.pid INNER JOIN supplier v ON o.vid=v.sid WHERE o.status='Completed' AND o.vid =".$_SESSION["userid"];
                $sql = "select o.oid,u.name,v.sid,u.address,u.contact,p.pname,p.pprice,o.qty from users u INNER JOIN orders o ON u.id = o.cid INNER JOIN product p ON o.pid = p.pid INNER JOIN supplier v ON o.vid=v.sid WHERE o.status='Completed' AND o.vid =".$_SESSION["userid"];
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
      <?php
    //    $sql = "select u.name,u.address,u.contact,p.pname,p.pprice,o.qty from users u INNER JOIN orders o ON u.id = o.cid INNER JOIN product p ON o.pid = p.pid";
    //    $results = mysqli_query($connection,$sql);
    //    while($rows = mysqli_fetch_assoc($results)){
    //     $name = $rows['name'];
    //     $address = $rows['address'];
    //     $product_name = $rows['pname'];
    //     $product_price = $rows['pprice'];
    //     $product_qty = $rows['qty'];
      ?>
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
        <!-- add address of the client here -->
        <?php 
        // $sql = "select u.name,u.address,p.pname,p.pprice,o.qty from users u INNER JOIN orders o ON u.id = o.cid INNER JOIN product p ON o.pid = p.pid";
        // $results = mysqli_query($connection,$sql);
        // while($rows = mysqli_fetch_assoc($results)){
        //     $name = $rows['name'];
        //     $contactnumber = $rows['contact'];
        //     $address = $rows['address'];
            ?>
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

        
     
        </div> <!-- closing the container -->
</body>
</html>
<?php 
  if(isset($_POST["completed"])){
    //update the order status and remove the order list from orders table
    $updated_status = "completed";
    $ordersid = $_POST['orderid'];
    $updateorder = "UPDATE `orders` SET `status`='completed' WHERE oid=".$ordersid;
    //$deleteorder="DELETE from orders where oid=".$ordersid;
    //$queryorder="UPDATE `orderstatus` SET `status`='completed' WHERE oid=".$ordersid;
   // mysqli_query($connection,$queryorder);
    mysqli_query($connection,$updateorder);
    header("Location:displayorders.php");
  }
?>
<?php 
} //closing if statement
else{
  header("Location: vendor_login.php");
}
?>