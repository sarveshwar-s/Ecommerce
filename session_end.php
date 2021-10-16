<?php
// Initialize the session.
// If you are using session_name("something"), don't forget it now!
session_start();

// Unset all of the session variables.
$_SESSION = array();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finally, destroy the session.
session_destroy();
header("Location: index.php");
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

  <header class="section-header">
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
<li class="nav-item"><a class="nav-link" href="/organic/productdisplay.php"> Product list </a></li>
<li class="nav-item"><a class="nav-link" href="/organic/cart.php"> Cart </a></li>
<li class="nav-item"><a class="nav-link" href="/organic/cart.php"><i class="fas fa-shopping-basket">1</i></a></li>
    </ul>
  </div>
  
  <form class="form-inline">
      <div class="md-form my-0">
        <div class="row">
	   <a class="nav-link" href="/organic/profile.php">profile</a>
       <!-- <a class="nav-link" href="/organic/refresh.php">Logout</a> -->
      </div>
</div>
    </form>
</div> <!-- container //  -->
</nav>
<!-- end of navigation bar -->

   <!-- END OF NAVIGATION BAR======================================================================= -->
<section class="header-main shadow">
	<div class="container">
<div class="row align-items-<?php header("refresh:5,url:/organic/index.php"); ?>ter">
	<div class="col-lg-3 col<?php header("refresh:5,url:/organic/index.php"); ?>-4">
	<div class="brand-wrap"><?php header("refresh:5,url:/organic/index.php"); ?>
		<img class="logo" src="images/logo-dark.png">
		<h2 class="logo-text">FARMAZON</h2>
	</div> <!-- brand-wrap.// -->
	</div>
	<div class="col-lg-6 col-sm-8">
			<form action="#" class="search-wrap">
				<div class="input-group w-100">
				    <input type="text" class="form-control" style="width:55%;" placeholder="Search">
				    <select class="custom-select"  name="category_name">
							<option value="">All type</option><option value="codex">Special</option>
							<option value="comments">Only best</option>
							<option value="content">Latest</option>
					</select>
				    <div class="input-group-append">
				      <button class="btn btn-primary" type="submit">
				        <i class="fa fa-search"></i>
				      </button>
				    </div>
			    </div>
			</form> <!-- search-wrap .end// -->
	</div> <!-- col.// -->
	<div class="col-lg-3 col-sm-12">
			<a href="#" class="widget-header float-md-right">
				<div class="icontext">
					<div class="icon-wrap"><i class="flip-h fa-lg fa fa-phone"></i></div>
					<div class="text-wrap">
						<small>Phone</small>
						<div>+97150 2813773</div>
					</div>
				</div>
			</a>
			<!-- <a href="#" class="widget-header float-md-right">
				<div class="icontext">
					<div class="icon-wrap"><i class="fas fa-shopping-basket">1</i></div>
					 <div class="text-wrap">
					</div>
				</div>
			</a> -->
			
	</div> <!-- col.// -->
</div> <!-- row.// -->
	</div> <!-- container.// -->
</section> <!-- header-main .// -->
</header> <!-- section-header.// -->
<br>
<center><h1> Logout successfull.Redirecting in 5 seconds </h1></center>

</body>
</html>