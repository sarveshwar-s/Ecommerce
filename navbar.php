<nav class="navbar navbar-top navbar-expand-lg navbar-dark bg-green">
<div class="container">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
  
    <ul class="navbar-nav">
<li class="nav-item active>
<a class="nav-link" href="/organic">Home <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item"><a class="nav-link" href="/organic/productdisplay.php"> Product list </a></li>
<li class="nav-item"><a class="nav-link" href="/organic/cart.php"> Cart </a></li>
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
  <a class="dropdown-item" href="/organic/profile.php">Profile</a>
  <a class="dropdown-item" href="/organic/myorders.php">My Orders</a>
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