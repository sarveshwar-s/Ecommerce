<?php 
session_start();
include("db.php"); 
if(isset($_SESSION["vendoruserid"]) || isset($_SESSION["adminuserid"])){
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
    <?php include("vendor_navbar.php"); ?>
    <br>
<div class="container jumbotron">
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
  <div class="form-group">
  <label> Product name </label>
  <input type="text" name="pname" class="form-control" placeholder="Enter product name">
  </div>
  <div class="form-group">
  <select class="form-control" name="pcategory">
  <?php 
    $query1 = "select * from category;";
    $result1 = mysqli_query($connection,$query1);
    while($rows = mysqli_fetch_assoc($result1)){
        $cid = $rows["id"];
        $category = $rows["name"];
  ?> 
      <option><?php echo $category; ?></option>
    <?php } ?>   <!-- closing while loop -->
    </select>
    </div>
  <div class="form-group">
  <label> Product desc </label>
  <input type="text" name="pdesc" class="form-control" placeholder="Enter product Description">
  </div>
  <div class="form-group">
  <label> Product Price </label>
  <input type="text" name="pprice" class="form-control" placeholder="Enter product Price">
  </div>
  <div class="form-group">
  <label> Product stock </label>
  <input type="text" name="pstock" class="form-control" placeholder="Enter product Quantity">
  </div>
  <center>
  <input type="submit" name="product_submit" class="btn btn-primary">
  </center>
</form>
</div>
</body>

</html>
<?php 
if(isset($_POST["product_submit"])){
    $pname = $_POST["pname"];
    $pdesc = $_POST["pdesc"];
    $pprice = $_POST["pprice"];
    $pstock = $_POST["pstock"];
    $cname = $_POST["pcategory"];
    $sellerids = $_SESSION["userid"];
    // echo $cname;
    // to get seller name
    $query3 = "select sname from supplier where sid=".$sellerids;
    $result3 = mysqli_query($connection,$query3);
    while($rowz = mysqli_fetch_assoc($result3)){
        $sellername = $rowz["sname"];
    }
    $query2 = "select * from category where name='$cname'";
    $result2 = mysqli_query($connection,$query2);
    while($rows = mysqli_fetch_assoc($result2)){
        $cid = $rows["id"];
    }
    $query = "INSERT INTO `product`(`pname`,`pdesc`, `pprice`, `stock`,`seller`,`sellerid`,`cid`, `cname`) VALUES ('$pname','$pdesc','$pprice','$pstock','$sellername',$sellerids,$cid,'$cname')";
    $result = mysqli_query($connection,$query);
    
    
    if($result){
        echo "Product added successfully";
    }
}

?>
<?php 
} //top if statement
else{
    header("Location: vendor_login.php");
} 

?>