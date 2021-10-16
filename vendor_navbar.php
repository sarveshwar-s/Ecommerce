<nav class="navbar navbar-top navbar-expand-lg navbar-dark bg-green">
<div class="container">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
  
    <ul class="navbar-nav">
<li class="nav-item active">
<a class="nav-link" href="/organic">Home <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item"><a class="nav-link" href="/organic/addcategory.php"> Add category </a></li>
<li class="nav-item"><a class="nav-link" href="/organic/addimage.php"> Add Image </a></li>
<li class="nav-item"><a class="nav-link" href="/organic/products.php"> Add Products </a></li>
<li class="nav-item"><a class="nav-link" href="/organic/displayorders.php"> Orders </a></li>
<li class="nav-item"><a class="nav-link" href="/organic/deliveryperson.php"> Deliver </a></li>

<!-- <li class="nav-item"><a class="nav-link" href="/organic/cart.php"><i class="fas fa-shopping-basket">1</i></a></li> -->
    </ul>
  </div>
  
  <form class="form-inline">
      <div class="md-form my-0">
       <a class="btn btn-success" href="/organic/vendorprofile.php"><?php echo $_SESSION["username"]; ?></a>
       <a class="btn btn-danger" href="/organic/session_end.php">Logout</a>
      </div>
    </form>
</div> <!-- container //-->
</nav>
<!-- end of navigation bar -->