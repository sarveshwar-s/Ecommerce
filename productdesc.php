<?php 
session_start();
include("db.php");
if(isset($_SESSION["userid"])){
   $userid = $_SESSION["userid"];
 ?>
<html>
<head>
<title>FARMAZON</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="styles pcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
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
<header class="section-header">
<?php include("navbar.php");?>
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
<div class="container">
    <div class="row" style="padding: 20px;">
    <div class="col-md-12 col-lg-12" >
 <!-- product description code -->
 <?php 
if(isset($_GET['id'])){
    $pid = $_GET['id'];
	$query = "select * from product where pid=$pid;";
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
    ?>
<div class="card shadow">
	<div class="row no-gutters">
		<aside class="col-sm-5 border-right">
<article class="gallery-wrap">
	 
<div class="img-big-wrap">
  <div> <a href="<?php echo $imagename; ?>" data-fancybox=""><img src="<?php echo $imagename;?>"></a></div>
</div> <!-- slider-product.// -->
<div class="img-small-wrap">
  <div class="item-gallery"> <img src="<?php echo $imagename; ?>"></div>
</div> <!-- slider-nav.// -->
</article> <!-- gallery-wrap .end// -->
		</aside>
		<aside class="col-sm-7">
<article class="p-5">
	<h3 class="title mb-3"><?php echo $product_name; ?></h3>  <!-- php title -->

<div class="mb-3"> 
	<var class="price h3 text-warning"> 
		<span class="currency">Rs.</span><span class="num"><?php echo $product_price; ?> </span>   <!-- php price -->
	</var> 
	<span>/per kg</span> 
</div> <!-- price-detail-wrap .// -->
<dl>
  <dt>Description</dt>
  <dd><p><?php echo $product_description; ?></p></dd>    <!-- description php -->
</dl>
<dl class="row">
  <dt class="col-sm-3">Seller</dt>
  <dd class="col-sm-9"><?php echo $product_seller; ?></dd>   <!-- name of the seller  php-->

  <dt class="col-sm-3">Delivery</dt>
  <dd class="col-sm-9">Chennai,Hyderabad,Bangalore</dd>
</dl>
<div class="rating-wrap">

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
	<div class="label-rating">132 reviews</div>  
	<div class="label-rating">154 orders </div>  
</div> <!-- rating-wrap.// -->
<hr>
<form  method="post">
	<div class="row">
		<div class="col-sm-5">
			<dl class="dlist-inline">
			  <dt>Quantity: </dt>
			  <dd> 
			  	<select class="form-control form-control-sm" style="width:70px;" name="quantity">
			  		<option selected value="1"> 1 </option>
			  		<option value="2"> 2 </option>
			  		<option value="3"> 3 </option>
			  	</select>
			  </dd>
			</dl>  <!-- item-property .// -->
		</div> <!-- col.// -->
		
	</div> <!-- row.// -->
	<hr>
	<div class="row">
	
	<input type="submit" style="height:43px;" id="addtocart" name="add_cart" class="btn btn-success" value="Add to cart">
     <!-- need php query to insert to cart table -->
	</form>
	<form action="refresh.php" method="post">
	<input type="submit" name="goto_cart" class="btn btn-primary" value="Buy now">
	<input type="hidden" name="productid" value="<?php echo $product_id; ?>"/>
     <!-- need php query to insert to cart table -->
	</form>

	
	<!-- <script>
		$(document).ready({
			$('#addtocart').click(function(){
				$.ajax({
					url: "productdesc.php",
					data:{ },
					success: function(data){
						$("#addedtocart").text("added to cart");
					}
			   });
			});
		});
	</script> -->
	<!-- <p id="addedtocart"></p> -->
	<?php
	 if(isset($_POST["add_cart"])){ 
		 $quantity = $_POST["quantity"];
		 $querycart = "INSERT INTO `cart`(`pid`, `pname`, `pprice`, `quantity`, `cid`, `sellerid`,`imagename`) VALUES ($product_id,'$product_name','$product_price','$quantity',$userid,$product_sellerid,'$imagename')";  
		 $resultcart = mysqli_query($connection,$querycart);
		 if($resultcart){
			 echo"<script>alert('added to cart');</script>";
		 } else{
			 echo "<script>alert('try again later');</script>";
		 }
		 } 
		 
       ?>
	</div>
</article> <!-- card-body.// -->
		</aside> <!-- col.// -->
	</div> <!-- row.// -->
</div> <!-- card.// -->

<?php  
 }  //while statement closing
} //if statment closing
?>

</div>  <!-- closing col-md-12 -->
</div>  <!--closing row -->
<!-- detailed overview -->
<div class="container">
<div class="col-md-12 col-lg-12">
<div class="row" style="padding-bottom:20px;">
    <div class="card shadow">
      <div class="card-body">
        <h5 class="card-title">Detailed Description</h5>
        <p class="card-text">
            Some quick example text to build on the card title and make up the bulk of the incididunt ut labore</p>
        <p>Some quick example text to build on the card title and make up the bulk of the card's  tempor incididunt ut labore Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.  </p>
      </div>
    </div> <!-- card.// -->
    
    </div>
</div>
</div>

</div>
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
} //closing the top if
else{
	header("Location: index.php");
}
?>