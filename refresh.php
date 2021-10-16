<?php 
session_start();
// echo $_SESSION["userid"];
include("db.php");
// $userid = $_SESSION["userid"];

  //buy-now button from productdisplay.php
  if(isset($_POST["addtocart"])){
    $userid = $_SESSION["userid"];
    $product_id = $_POST["productidcart"];
    $selectionquery = "select * from product where pid=".$product_id;
    $resultcart = mysqli_query($connection,$selectionquery);
    while($row = mysqli_fetch_assoc($resultcart)){
			$productids = $row["pid"];
			$product_name = $row["pname"];
			$product_price = $row["pprice"];
			$quantity = $row["quantity"];
			$sellerid = $row["sellerid"];
      $imagename = $row["imagename"];
    }
    //by default quantity inserted is 1
    $cartinsertquery = "INSERT INTO `cart`(`pid`, `pname`, `pprice`, `quantity`, `cid`, `sellerid`,`imagename`) VALUES ($product_id,'$product_name','$product_price','1',$userid,$sellerid,'$imagename')";
    //inserts data into cart table
    $results= mysqli_query($connection,$cartinsertquery);
    header("Location:cart.php");
  }

  // buy-now button from productdesc.php
  if(isset($_POST["goto_cart"])){
    $userid = $_SESSION["userid"];
    $product_id = $_POST["productid"];
    $selectionquery = "select * from product where pid=".$product_id;
    $resultcart = mysqli_query($connection,$selectionquery);
    while($row = mysqli_fetch_assoc($resultcart)){
			$productids = $row["pid"];
			$product_name = $row["pname"];
			$product_price = $row["pprice"];
			$quantity = $row["quantity"];
			$sellerid = $row["sellerid"];
      $imagename = $row["imagename"];
    }
    //by default quantity inserted is 1
    $cartinsertquery = "INSERT INTO `cart`(`pid`, `pname`, `pprice`, `quantity`, `cid`, `sellerid`,`imagename`) VALUES ($product_id,'$product_name','$product_price','1',$userid,$sellerid,'$imagename')";
    //inserts data into cart table
    $results= mysqli_query($connection,$cartinsertquery);
    header("Location:cart.php");
  }

  //remove-button from cart.php
  if(isset($_POST["deletesub"])){
    $userid = $_SESSION["userid"];
    $delete_id = $_POST["deleteid"];
    $query4 = "DELETE FROM `cart` WHERE cart_id=$delete_id";
    $result4 = mysqli_query($connection,$query4);
    header("Location:cart.php");
  }

  if(isset($_POST["completed"])){
    //update the order status and remove the order list from orders table
    $updated_status = "completed";
    $ordersid = $_POST['orderid'];
    $updateorder = "UPDATE `orders` SET `status`='completed' WHERE oid=".$ordersid;
    //$deleteorder="DELETE from orders where oid=".$ordersid;
    //$queryorder="UPDATE `orderstatus` SET `status`='completed' WHERE oid=".$ordersid;
   // mysqli_query($connection,$queryorder);
    mysqli_query($connection,$updateorder);
    header("Location: deliveryperson.php");
  }

  //client profile update
  if(isset($_POST["profileupdate"])){
    $userid = $_SESSION["userid"];
    //$userid is defined as global variable
    $user_name = $_POST["name"];
    $user_email = $_POST["email"];
    $user_password = $_POST["password"];
    $user_number = $_POST["mobilenumber"];
    $user_address = $_POST["address"];
    $user_pincode = $_POST["pincode"];
    $user_latitude = $_POST["latitude"];
    $user_longitude = $_POST["longitude"];
    $profileupdatequery = "UPDATE `users` SET `name`='$user_name',`email`='$user_email',`password`='$user_password',`contact`='$user_number',`address`='$user_address',`pincode`='$user_pincode',`latitude`='$user_latitude',`longitude`='$user_longitude' WHERE id=".$userid;
    mysqli_query($connection,$profileupdatequery);
    header("Location:profile.php");
  }
  if(isset($_POST["approved"])){
    $adminvid = $_POST["vid"];
    $approvequery = "UPDATE `supplier` SET `vstatus`='Approved' WHERE sid=".$adminvid;
    $resultapp = mysqli_query($connection,$approvequery);
    header("Location: siteadminpanel.php");
  }
  if(isset($_POST["notapproved"])){
    $adminvid1 = $_POST["vid"];
    $selectfromvendor = "select * from supplier";
    $queryselectvendor = mysqli_query($connection,$selectfromvendor);
    while($selectvendor = mysqli_fetch_assoc($queryselectvendor)){
      $vendorids = $selectvendor["sid"];
    }
    $approvequery1 = "UPDATE `supplier` SET `vstatus`='Not Approved' WHERE sid=".$adminvid;
    $resultapp1 = mysqli_query($connection,$approvequery1);
    $deletevendor = "DELETE FROM supplier WHERE sid=".$vendorids;
    mysqli_query($connection,$deletevendor);
    header("Location: siteadminpanel.php");
  }
  if(isset($_POST["newprofile"])){
    $userid = $_SESSION["userid"];
    //session
    $user_name = $_POST["name"];
    $user_email = $_POST["email"];
    $user_password = $_POST["password"];
    $user_number = $_POST["mobilenumber"];
    $user_address = $_POST["address"];
    $user_pincode = $_POST["pincode"];
    $user_latitude = $_POST["latitude"];
    $user_longitude = $_POST["longitude"];
    $profileinsertquery="INSERT INTO `users`(`name`, `email`, `password`, `contact`, `address`, `pincode`, `latitude`, `longitude`)
     VALUES ('$user_name','$user_email','$user_password','$user_number','$user_address','$user_pincode','$user_latitude','$user_longitude')";
    mysqli_query($connection,$profileinsertquery);
    header("Location:index.php");
  }

  if(isset($_POST["newvendor"])){
    $userid = $_SESSION["userid"];
    //session
    $vendor_name = $_POST["name"];
    $vendor_email = $_POST["email"];
    $vendor_password = $_POST["password"];
    $vendor_number = $_POST["mobilenumber"];
    $vendor_address = $_POST["address"];
    $vendor_city = $_POST["city"];
    $vendor_pincode = $_POST["pincode"];
    $vendor_latitude = $_POST["latitude"];
    $vendor_longitude = $_POST["longitude"];
    $vendorinsertquery="INSERT INTO `supplier`(`sname`, `contact`, `address`, `city`, `pincode`, `email`, `password`, `latitude`, `longitude`) 
    VALUES ('$vendor_name','$vendor_number','$vendor_address','$vendor_city','$vendor_pincode','$vendor_email','$vendor_password','$vendor_latitude','$vendor_longitude')";
    mysqli_query($connection,$vendorinsertquery);
    header("Location:vendor_login.php");
  }

  //vendor profile update
  if(isset($_POST["vendorprofileupdate"])){
    $userid = $_SESSION["userid"];
    //$userid is defined as global variable
    $vendor_name = $_POST["name"];
    $vendor_email = $_POST["email"];
    $vendor_password = $_POST["password"];
    $vendor_number = $_POST["mobilenumber"];
    $vendor_address = $_POST["address"];
    $vendor_pincode = $_POST["pincode"];
    $vendor_latitude = $_POST["latitude"];
    $vendor_longitude = $_POST["longitude"];
    $vendor_profile_update_query = "UPDATE `supplier` SET `sname`='$vendor_name',`contact`='$vendor_number',`address`='$vendor_address',`pincode`='$vendor_pincode',`email`='$vendor_email',`password`='$vendor_password',`latitude`='$vendor_latitude',`longitude`='$vendor_longitude' WHERE sid=".$userid;
    mysqli_query($connection,$vendor_profile_update_query);
    header("Location:vendorprofile.php");
  }

  if(isset($_POST["product_submit"])){
    $userid = $_SESSION["userid"];
    //session
    $pname = $_POST["pname"];
    $pdesc = $_POST["pdesc"];
    $pprice = $_POST["pprice"];
    $pstock = $_POST["pstock"];
    $cname = $_POST["pcategory"];
    echo $cname;
    $query2 = "select * from category where name='$cname'";
    $result2 = mysqli_query($connection,$query2);
    while($rows = mysqli_fetch_assoc($result2)){
        $cid = $rows["id"];
    }
    $query = "INSERT INTO `product`(`pname`,`pdesc`, `pprice`, `stock`,`cid`, `cname`) VALUES ('$pname','$pdesc','$pprice','$pstock',$cid,'$cname')";
    $result = mysqli_query($connection,$query);
    if($result){
        echo "Product added successfully";
    }
    header("Location:products.php");
}

if(isset($_POST["place_order"])){
  $userid = $_SESSION["userid"];
  //session
  $orderid = rand(); 
  //orderid is generated randomly based on timestamp
	  $_SESSION["productid"] = array();
	  $_SESSION["sellerid"] = array();
	  $_SESSION["quantity"] = array();
	  // add userid if needed.
	  $selectquery1 = "select * from cart where cid=$userid";
	  $selectresults1 = mysqli_query($connection,$selectquery1);
	  while($rows = mysqli_fetch_assoc($selectresults1)){
		array_push($_SESSION["productid"],$rows["pid"]);
		array_push($_SESSION["sellerid"],$rows["sellerid"]);
    array_push($_SESSION["quantity"],$rows["quantity"]);	  
    }//closing while loop
    $selleridarray = array();
    $quantityarray = array();
    $productidarray = array();
     for($i=0;$i<sizeof($_SESSION["productid"]);$i++){
         array_push($selleridarray,$_SESSION["sellerid"][$i]);
         array_push($quantityarray,$_SESSION["quantity"][$i]);
         array_push($productidarray,$_SESSION["productid"][$i]);
     }
    //inserting the data into db
    for($i=0;$i<sizeof($_SESSION["productid"]);$i++){
       $insertorder = "INSERT INTO `orders`(`oid`, `cid`, `vid`, `pid`, `qty`, `status`) VALUES ($orderid,$userid,$selleridarray[$i],$productidarray[$i],$quantityarray[$i],'Accepted')";
         $resultss = mysqli_query($connection,$insertorder);
      if($resultss){
        $removefromcart = "DELETE FROM `cart` WHERE cid=".$userid;
        $result = mysqli_query($connection,$removefromcart);
      }
   }
   header("Location:order.php");
  }
  if(isset($_POST["logoutsession"])){
    session_destroy();
    header("Location:/organic/");
  }
  ?>