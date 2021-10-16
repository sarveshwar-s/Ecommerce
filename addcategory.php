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
<form method="post">
   <div class="form-group">
   <label>Category</label>
   <input type="text" name="category" class="form-control" placeholder="Enter category">
   </div>
   <center>
   <div class="form-group">
   <input type="submit" name="category_submit" class="btn btn-success">
   </div>
   </center>
</form>
</div>
</body>
</html>
<?php 
if(isset($_POST['category_submit'])){
    $category = $_POST["category"];
    $query = "INSERT INTO `category`(`name`) VALUES ('$category');";
    $result = mysqli_query($connection,$query);
    if($result){
        echo "<script>alert('category added')</script>";
    }
    else{
        echo "Error in adding category";
    }
}
?>
<?php
   } //closing top if statement
   else{
       header("Location: vendor_login.php");
   }
?>