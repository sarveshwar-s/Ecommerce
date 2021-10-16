<?php 
session_start();
include("db.php");
if(isset($_SESSION["userid"]))
{	
$userid = $_COOKIE["userid"];
	//$userid = $_SESSION["userid"];
	//$productid = $_POST["productid"];
	$query = "select * from product where pid=".$userid;
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
				$product_image = $rows["imagename"];
		}
		//$insertquery = "INSERT INTO `cart`(`pid`, `pname`, `pprice`, `quantity`, `cid`, `sellerid`,`imagename`) VALUES ($product_id,'$product_name','$product_price','1',$userid,$product_sellerid,'$product_image')";
		//$resultquery= mysqli_query($connection,$insertquery);
		
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

</head>
<body>
	
<header class="section-header">
<?php include("navbar.php"); ?>
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
<section class="section-content bg padding-y border-top">
<div class="container">

<div class="row">
	<main class="col-sm-9">

<div class="card">
<table class="table table-hover shopping-cart-wrap">
<thead class="text-muted">
<tr>
  <th scope="col">Product</th>
  <th scope="col" width="120">Quantity</th>
  <th scope="col" width="120">Price</th>
  <th scope="col" class="text-right" width="200">Action</th>
</tr>
</thead>
<tbody>
	<?php 
		 $selectquery = "select * from cart where cid=".$userid;
		 $selectresult = mysqli_query($connection,$selectquery);
		 while($row = mysqli_fetch_assoc($selectresult)){
			 $cart_id = $row["cart_id"];
			$productids = $row["pid"];
			$productname = $row["pname"];
			$productprice = $row["pprice"];
			$quantity = $row["quantity"];
			$sellerid = $row["sellerid"];
			$imagename = $row["imagename"];
		 // echo $productprice;
	?>
<tr>
	<td>
<figure class="media">
	<div class="img-wrap"><img src="<?php echo $imagename; ?>" class="img-thumbnail img-sm"></div>
	<figcaption class="media-body">
		<h6 class="title text-truncate"><?php echo $productname; ?></h6>
		<dl class="dlist-inline small">
		  <dt>Seller: </dt>
		  <?php $sql="select * from supplier where sid=$sellerid";
		  $resultss=mysqli_query($connection,$sql);
		  while($rowz = mysqli_fetch_assoc($resultss)){
		   $product_sellers = $rowz["sname"];  
		?>
		  <dd><?php echo $product_sellers; ?></dd>
		  <?php }?>
		</dl>
	</figcaption>
</figure> 
	</td>
	<td> 
		<select class="form-control">
			<?php 
			  switch($quantity){
				  case '1': 
					 echo "<option selected>1</option>
					 <option>2</option>	
					 <option>3</option>	
					 <option>4</option>";
					 break;
				  case '2': 
					 echo "<option>1</option>
					 <option selected>2</option>	
					 <option>3</option>	
					 <option>4</option>";
					 break;
				  case '3':
					 echo "<option>1</option>	
					 <option>2</option>	
					 <option selected>3</option>
					 <option>4</option>";
					 break;
				  case '4': 
					 echo "<option selected>1</option>
					 <option>2</option>	
					 <option>3</option>	
					 <option selected>4</option>";
					 break;
			  }
			?>
			<!-- <option selected value="<?php //echo $quantity; ?>"> <?php //echo $quantity; ?> </option>
			
			<option>2</option>	
			<option>3</option>	
			<option>4</option>	 -->
		</select> 
	</td>
	<td> 
		<div class="price-wrap"> 
			<var class="price">Rs.<?php echo $productprice; ?></var> 
			<!-- <small class="text-muted">(USD5 each)</small>  -->
		</div> <!-- price-wrap .// -->
	</td>
	<td class="text-right"> 
	<!-- <a data-original-title="Save to Wishlist" title="" href="" class="btn btn-outline-success" data-toggle="tooltip"> <i class="fa fa-heart"></i></a>  -->
	<!-- <a href="" class="btn btn-outline-danger"> × Remove</a> -->
<form method="post" action="refresh.php">
	 <input type="hidden" name="deleteid" value="<?php echo $cart_id; ?>">
	 <input type="submit" name="deletesub" class="btn btn-danger" value="Remove">
		 </form>	
	
</td>
</tr>
		 <?php } ?>  <!-- closing the while loop -->
</tbody>
</table>
</div> <!-- card.// -->

	</main> <!-- col.// -->

	
	<aside class="col-sm-3">
<p class="alert alert-success">Add INR 100 of eligible items to your order to qualify for FREE Shipping. </p>
<dl class="dlist-align">
  <dt>Total price: </dt>
  <dd class="text-right">
	  <!-- to calculate total price of the products in cart -->
  <?php 
	$selectquery = "select * from cart where cid=$userid";
	$selectresults = mysqli_query($connection,$selectquery);
	$total = 0;
	$tax=0;
	$grandtotal = 0;
	while($rows = mysqli_fetch_assoc($selectresults)){
		$cart_id = $rows["cart_id"];
	   $productids = $rows["pid"];
	   $productprice = $rows["pprice"];
	   $quantity = $rows["quantity"];
	?>
	<?php  $total = $total + ($productprice * $quantity); ?>
	<?php } ?> <!-- closing the total calculation loop -->
	<?php echo $total; ?>
	</dd>
</dl>
<dl class="dlist-align">
  <dt>Total tax </dt>
  <?php $tax = $total * 0.18; ?>
  <dd class="text-right"><?php echo $tax;?> </dd>
</dl>

<dl class="dlist-align h4">
  <dt>Total:</dt>
  <?php $grandtotal = $total + $tax; ?>
  <dd class="text-right"><strong><?php echo $grandtotal; ?></strong></dd>
</dl>
<form method="post" action="refresh.php">
   <input type="submit" name="place_order" value="Place order" class="btn btn-success">
</form>
<hr>
<figure class="itemside mb-3">
	<aside class="aside"><img src="images/icons/pay-visa.png"></aside>
	 <div class="text-wrap small text-muted">
Pay 84.78 AED ( Save 14.97 AED )
By using ADCB Cards 
	 </div>
</figure>
<figure class="itemside mb-3">
	<aside class="aside"> <img src="images/icons/pay-mastercard.png"> </aside>
	<div class="text-wrap small text-muted">
Pay by MasterCard and Save 40%. <br>
Lorem ipsum dolor 
	</div>

</figure>

	</aside> <!-- col.// -->
</div>

</div> <!-- container .//  -->
</section>
</body>
</html>
<?php 
 }  //closing the top if
else{
	header("Location: index.php");
}
?>