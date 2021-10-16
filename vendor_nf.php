<?php 
include("db.php");
session_start();
if(isset($_SESSION["vendoruserid"])){
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
<nav class="navbar navbar-top navbar-expand-lg navbar-dark bg-green">
<div class="container">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
  
    <ul class="navbar-nav">
<li class="nav-item activ// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!e">
<a class="nav-link" href="/organic">Home <span class="sr-only">(current)</span></a>
</li>
<!-- <li class="nav-item"><a class="nav-link" href="/organic/productdisplay.php"> Product list </a></li> -->
<!-- <li class="nav-item"><a class="nav-link" href="/organic/cart.php"> Cart </a></li> -->
<!-- <li class="nav-item"><a class="nav-link" href="/organic/cart.php"><i class="fas fa-shopping-basket">1</i></a></li> -->
	</ul>
  </div>
  
  <form class="form-inline">
      <div class="md-form my-0">
        <div class="row">
			<!-- dropdown -->
<a class="btn btn-green dropdown-toggle mr-4" type="button" data-toggle="dropdown" aria-haspopup="true"
  aria-expanded="false"><?php echo $_SESSION["username"]; ?></a>

<div class="dropdown-menu">
  <a class="dropdown-item" href="/organic/vendorprofile.php">Profile</a>
  <!-- <a class="dropdown-item" href="/organic/myorders.php">My Orders</a> -->
  <div class="dropdown-divider"></div>
  <a class="dropdown-item" href="/organic/session_end.php">Logout</a>
</div>
<!-- dropdown -->
	   <!-- <a class="nav-link" href="/organic/profile.php">profile</a> -->
	   <!-- <a class="btn btn-danger" href="/organic/session_end.php">Logout</a> -->
       <!-- <a class="nav-link" href="/organic/refresh.php">Logout</a> -->
      </div>
</div>
    </form>
</div> <!-- container //  -->
</nav>
    <br>
    <center><h1><strong> Your verification status is: Under Examination </strong></h1></center>
</body>
</html>

<?php 
}
?>