<?php
session_start(); 
// echo $_SESSION['username']; 
include("db.php");
?>
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
<?php include("navbar.php"); ?>
<div class="container">
    <div class="col-md-12 col-sm-12">
        <!-- user orders table -->
        <table class="table table-hover">
         <?php 
          //USE THIS CODE WHEN NECESSARY..TO ELIMINATE DUPLICATE ENTRIES 
            // $yourorderids = array();
            //  $query = "SELECT DISTINCT(oid) from `orders` WHERE cid=".$_SESSION["userid"];
            //  $resultz = mysqli_query($connection,$query);
            //  while($row = mysqli_fetch_assoc($resultz)){
            //    array_push($yourorderids,$row["oid"]);
            //  }
            ?>
  <thead>
    <tr>
      <th scope="col">Order id</th>
      <th scope="col">Product name</th>
      <th scope="col">Product price</th>
      <th scope="col">Product Quantity</th>
      <th scope="col">Order status</th>
      <th scope="col"> Feedback </th>
      
    </tr>
  </thead>
  <tbody>
  <?php
        
              $sql = "select o.oid,o.status,u.name,v.sid,u.address,u.contact,p.pname,p.pprice,o.qty from users u INNER JOIN orders o ON u.id = o.cid INNER JOIN product p ON o.pid = p.pid INNER JOIN supplier v ON o.vid=v.sid WHERE o.cid =".$_SESSION["userid"];
              $results = mysqli_query($connection,$sql);
                while($rows = mysqli_fetch_assoc($results)){
                    $order_id = $rows['oid'];
                    $name = $rows['name'];
              $address = $rows['address'];
              $product_name = $rows['pname'];
              $product_price = $rows['pprice'];
              $product_qty = $rows['qty'];
              $contactnumber = $rows['contact'];
              $status = $rows["status"];
              
        
            ?>
    <tr>
      <th scope="row"><?php echo $order_id ?></th>
      <td><?php echo $product_name; ?></td>
      <td><?php echo $product_price; ?></td>
      <td><?php echo $product_qty; ?> </td>
      <td><?php echo $status; ?> </td>
      <!-- dummy button no connections yetx -->
      <td><a href="feedback.php"><input type="button" class="btn btn-warning" value="feedback"></a></td>

    </tr>
                <?php } ?>
  </tbody>
</table>
</div>
</div>
</body>
</html>