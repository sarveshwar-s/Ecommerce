<?php
session_start(); 
if(isset($_SESSION["userid"])){

// echo $_SESSION['username']; 
?>
<?php
 include("db.php");
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
<script>
	$(document).ready(function(){
  $("#myInputcategory").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myListcategory li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
//  $("#wishlist").click(function(){
// 	 var productids = $('#secretid');
// 	 $.ajax({
//      url: "wishlist.php",
// 		 type="POST",
// 		 data: productids,
// 		 success: function(data){ alert("added to wishlist"); }
// 	 }); //ajax closing
//  }); //wishilist closing
});
</script>
</head>

<body>

  <header class="section-header">
     <?php include("navbar.php"); ?>
<!-- </div> -->
<!-- end of navigation bar -->

   <!-- END OF NAVIGATION BAR======================================================================= -->
<section class="header-main shadow">
	<div class="container">
<div class="row align-items-center">
	<div class="col-lg-3 col-sm-4">
	<div class="brand-wrap">
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

<!-- ========================= SECTION PAGETOP ========================= -->
<!-- <section class="section-pagetop bg-green">
<div class="container clearfix">
	<h2 class="title-page">Page heading</h2>

	<nav class="float-left">
	<ol class="breadcrumb text-white">
	    <li class="breadcrumb-item"><a href="#">Home</a></li>
	    <li class="breadcrumb-item"><a href="#">Library</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Data</li>
	</ol>  
	</nav>
</div> 
</section> -->
<!-- ========================= SECTION INTRO END// ========================= -->

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content bg padding-y" style="padding:14px;">
<div class="container">

<div class="row">
	<aside class="col-sm-3 cold-md-4 col-lg-4">

<div class="card card-filter">
	<article class="card-group-item">
		<header class="card-header">
			<a class="" aria-expanded="true" href="#" data-toggle="collapse" data-target="#collapse22">
				<i class="icon-action fa fa-chevron-down"></i>
				<h6 class="title">By Category</h6>
			</a>
		</header>
		<div style="" class="filter-content collapse show" id="collapse22">
			<div class="card-body">
				<form class="pb-3">
				<div class="input-group">
				  <input id="myInputcategory" class="form-control" placeholder="Search" type="text">
				  <div class="input-group-append">
				    <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
				  </div>
				</div>
				</form>

				<ul id="myListcategory" class="list-unstyled list-lg">
					<li><a href="#">Vegetables<span class="float-right badge badge-light round">142</span> </a></li>
					<li><a href="#">Fruits <span class="float-right badge badge-light round">3</span>  </a></li>
					<li><a href="#">pulses <span class="float-right badge badge-light round">32</span>  </a></li>
					<li><a href="#">Oils <span class="float-right badge badge-light round">12</span>  </a></li>
				</ul>  
			</div> <!-- card-body.// -->
		</div> <!-- collapse .// -->
	</article> <!-- card-group-item.// -->
	<article class="card-group-item">
		<header class="card-header">
			<a href="#" data-toggle="collapse" data-target="#collapse33">
				<i class="icon-action fa fa-chevron-down"></i>
				<h6 class="title">By Price  </h6>
			</a>
		</header>
		<div class="filter-content collapse show" id="collapse33">
			<div class="card-body">
				<input type="range" class="custom-range" min="0" max="100" name="">
				<div class="form-row">
				<div class="form-group col-md-6">
				  <label>Min</label>
				  <input class="form-control" placeholder="$0" type="number">
				</div>
				<div class="form-group text-right col-md-6">
				  <label>Max</label>
				  <input class="form-control" placeholder="$1,0000" type="number">
				</div>
				</div> <!-- form-row.// -->
				<button class="btn btn-block btn-outline-primary">Apply</button>
			</div> <!-- card-body.// -->
		</div> <!-- collapse .// -->
	</article> <!-- card-group-item.// -->
	<article class="card-group-item">
		<header class="card-header">
			<a href="#" data-toggle="collapse" data-target="#collapse44">
				<i class="icon-action fa fa-chevron-down"></i>
				<h6 class="title">By Feature </h6>
			</a>
		</header>
		<div class="filter-content collapse show" id="collapse44">
			<div class="card-body">
			<form>
				<label class="form-check">
				  <input class="form-check-input" value="" type="checkbox">
				  <span class="form-check-label">
				  	<span class="float-right badge badge-light round">5</span>
				    Vegetables
				  </span>
				</label>  <!-- form-check.// -->
				<label class="form-check">
				  <input class="form-check-input" value="" type="checkbox">
				  <span class="form-check-label">
				  	<span class="float-right badge badge-light round">13</span>
				    Fruits
				  </span>
				</label> <!-- form-check.// -->
				<label class="form-check">
				  <input class="form-check-input" value="" type="checkbox">
				  <span class="form-check-label">
				  	<span class="float-right badge badge-light round">12</span>
				    Oils
				  </span>
				</label>  <!-- form-check.// -->
				<label class="form-check">
				  <input class="form-check-input" value="" type="checkbox">
				  <span class="form-check-label">
				  	<span class="float-right badge badge-light round">32</span>
				     Pulses
				  </span>
				</label>  <!-- form-check.// -->
			</form>
			</div> <!-- card-body.// -->
		</div> <!-- collapse .// -->
	</article> <!-- card-group-item.// -->
</div> <!-- card.// -->


	</aside> <!-- col.// -->
	<main class="col-sm-8">

<!-- add php here to display products -->
<?php
  $querystring = "select * from product where sellerid in (";
  //echo $_SESSION["selectedseller"][0]; 
  $size  = sizeof($_SESSION["selectedseller"]);
  //echo $size;
  $querystring = $querystring.$_SESSION["selectedseller"][0];
  for($i=1;$i<$size;$i++){
	 //products
	 $querystring = $querystring.','.$_SESSION["selectedseller"][$i];
  }
   $querystring = $querystring.')';
//    $query = "select * from product";
   $query = $querystring;
  // echo $query;
   $result = mysqli_query($connection,$query);
   while($rows = mysqli_fetch_assoc($result)){
       $product_id = $rows["pid"];
       $product_name = $rows["pname"];
       $product_description = $rows["pdesc"];
       $product_price = $rows["pprice"];
       $product_categoryid = $rows["cid"];
       $product_category = $rows["cname"];
       $product_sellerid = $rows["sellerid"];
			 $product_seller = $rows["seller"];
			 $imagename = $rows["imagename"];
			 $rating = $rows["rating"];
			 $stock = $rows["stock"];

?>
<article class="card card-product">
	<div class="card-body">
	<div class="row">
		<aside class="col-sm-3">
			<div class="img-wrap"><img src="<?php echo $imagename; ?>"></div>
		</aside> <!-- col.// -->
		<article class="col-sm-6">
				<h4 class="title"> <?php echo $product_name; ?>  </h4>
				<div class="rating-wrap  mb-2">
					<ul class="rating-stars">
						<li style="width:80%" class="stars-active"> 
							<i class="fa fa-star"></i> <i class="fa fa-star"></i> 
							<i class="fa fa-star"></i> <i class="fa fa-star"></i> 
							<i class="fa fa-star"></i> 
						</li>
						<li>
							<i class="fa fa-star"></i> <i class="fa fa-star"></i> 
							<i class="fa fa-star"></i> <i class="fa fa-star"></i> 
							<i class="fa fa-star"></i> 
						</li>
					</ul>
					<?php $getreview = "select * from feedback where sellername=".$product_seller;
					  $gotresult = mysqli_query($connection,$getreview);
					  ?>
					<div class="label-rating"><?php echo $rating; ?> reviews</div>
					<div class="label-rating"><?php echo $stock; ?> orders </div>
				</div> <!-- rating-wrap.// -->
				<p> <?php echo $product_description; ?></p>
				
				<dl class="dlist-align">
				  <dt>Seller</dt>
				  <dd><?php echo $product_seller; ?></dd>
				</dl>  <!-- item-property-hor .// -->
				<dl class="dlist-align">
				  <dt>Delivery</dt>
				  <dd>Chennai,Hyderabad,Banglore</dd>
				</dl>  <!-- item-property-hor .// -->
			
		</article> <!-- col.// -->
		<aside class="col-sm-3 border-left">
			<div class="action-wrap">
				<div class="price-wrap h4">
					<span class="price"> Rs.<?php echo $product_price; ?></span>	
					<!-- <del class="price-old"> $98</del> -->
				</div> <!-- info-price-detail // -->
				<p class="text-success">Free shipping</p>
				<br>
				<p>
					<form action="refresh.php" method="post">
						<input type="submit" name="addtocart" class="btn btn-primary" value="Buy Now">
					 <input type="text" id="secretid" name="productidcart" value="<?php echo $product_id; ?>" hidden>
	        </form>
					<?php echo"<a href='productdesc.php?id=$product_id' class='btn btn-secondary'> Details  </a>"; ?>
				</p>
				<a href="#" id="wishlist"><i class="fa fa-heart"></i> Add to wishlist</a>
			</div> <!-- action-wrap.// -->
		</aside> <!-- col.// -->
	</div> <!-- row.// -->
	</div> <!-- card-body .// -->
</article> <!-- card product .// -->
   <?php } ?>   <!-- ending of php while loop -->

	</main> <!-- col.// -->
</div>

</div> <!-- container .//  -->
</section>


<!-- ========================= SECTION CONTENT END// ========================= -->

<!-- ========================= SECTION  ========================= -->

<!-- ========================= SECTION  END// ========================= -->


<!-- ========================= FOOTER ========================= -->
<!-- Footer -->
<footer class="section-footer bg-green">
	<div class="container">
		<section class="footer-top padding-top">
			<div class="row">
				<aside class="col-sm-3 col-md-3">
					<h5 class="title">Customer Services</h5>
					<ul class="list-unstyled">
						<li> <a href="#">Help center</a></li>
						<li> <a href="#">Money refund</a></li>
						<li> <a href="#">Terms and Policy</a></li>
						<li> <a href="#">Open dispute</a></li>
					</ul>
				</aside>
				<aside class="col-sm-3  col-md-3">
					<h5 class="title">My Account</h5>
					<ul class="list-unstyled">
						<li> <a href="#"> User Login </a></li>
						<li> <a href="#"> User register </a></li>
						<li> <a href="#"> Account Setting </a></li>
						<li> <a href="#"> My Orders </a></li>
						<li> <a href="#"> My Wishlist </a></li>
					</ul>
				</aside>
				<aside class="col-sm-3  col-md-3">
					<h5 class="title">About</h5>
					<ul class="list-unstyled">
						<li> <a href="#"> Our history </a></li>
						<li> <a href="#"> How to buy </a></li>
						<li> <a href="#"> Delivery and payment </a></li>
						<li> <a href="#"> Advertice </a></li>
						<li> <a href="#"> Partnership </a></li>
					</ul>
				</aside>
				<aside class="col-sm-3">
					<article class="">
						<h5 class="title">Contacts</h5>
						<p>
							<strong>Phone: </strong> +123456789 <br> 
						    <strong>Fax:</strong> +123456789
						</p>

						 <div class="btn-group bg-white">
						    <a class="btn btn-facebook" title="Facebook" target="_blank" href="#"><i class="fab fa-facebook-f  fa-fw"></i></a>
						    <a class="btn btn-instagram" title="Instagram" target="_blank" href="#"><i class="fab fa-instagram  fa-fw"></i></a>
						    <a class="btn btn-youtube" title="Youtube" target="_blank" href="#"><i class="fab fa-youtube  fa-fw"></i></a>
						    <a class="btn btn-twitter" title="Twitter" target="_blank" href="#"><i class="fab fa-twitter  fa-fw"></i></a>
						</div>
					</article>
				</aside>
			</div> <!-- row.// -->
			<br> 
		</section>
		<section class="footer-bottom row border-top-white">
			<div class="col-sm-6"> 
				<p class="text-white-50"> Developed by <br>S.Sarveshwar.</p>
			</div>
			<div class="col-sm-6 text-right">
				<p class="text-sm-right text-white-50">
	Copyright &copy 2019 <br>
<a href="#" class="text-white-50">FARMAZON</a>
				</p>
			</div>
		</section> <!-- //footer-top -->
	</div><!-- //container -->
</footer>
<!-- Footer -->
<!-- ========================= FOOTER END // ========================= -->



</body>

</html>
<?php 
 }  //closing top "if"
 else{
	 header("Location: index.php");
 }
?>