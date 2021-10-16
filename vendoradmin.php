<?php
  session_start();
//   echo "welcome ".$_SESSION["username"];
  include("db.php");
  if(isset($_SESSION["vendoruserid"])){
?>
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
 <!-- for filtering the category -->
</head>
<body>
    <?php  include("vendor_navbar.php"); ?>
    <div class="container">
        <center>
       
      <div style="padding: 150px;">  
          <center> <h1> Vendor Admin </h1> </center>
      <center> <h2> Choose an action </h2> </center> 
           <form action = "addcategory.php" method="post">
                <input type="submit" value="Add category" style="width:180px;height:100px;" class="btn btn-primary">
           </form>
           <form action = "addimage.php" method="post">
                <input type="submit" value = "Add image" style="width:180px;height:100px;" class="btn btn-primary">
           </form>
           <form action = "products.php" method="post">
                <input type="submit" value="Add products" style="width:180px;height:100px;" class="btn btn-primary">
           </form>
</div>
</center>
<!-- <input type="submit" value="Add category" style="width:180px;height:100px;" class="btn btn-primary">
<input type="submit" value = "Add image" style="width:180px;height:100px;" class="btn btn-primary">
<input type="submit" value="Add products" style="width:180px;height:100px;" class="btn btn-primary"> -->

</div> 

<?php
$sql = "select u.name,u.address,p.pname,p.pprice,o.qty from users u INNER JOIN orders o ON u.id = o.cid INNER JOIN product p ON o.pid = p.pid";
$results = mysqli_query($connection,$sql);
while($rows = mysqli_fetch_assoc($results)){
    $name = $rows['name'];
    $address = $rows['address'];
    $product_name = $rows['pname'];
    $product_price = $rows['pprice'];
    $product_qty = $rows['qty'];
    ?>
   
<?php } ?>   
</body>
</html>
<?php 
  } //closing the top if statement
  else{
    header("Location: vendor_login.php");
  }
?>