<?php 
session_start();
  //$connection = mysqli_connect("localhost","root","","organic");
include("db.php");
$userid = $_SESSION["userid"];
$clientname = $_SESSION["username"];
//   $query3 = "select * from users where id=$userid";
//   $result3 = mysqli_query($connection,$query3);
//   while($rows = mysqli_fetch_assoc($result3)){
//       $clientname = $rows["name"];
  
//   }
  $query4 = "select * from orders where cid=".$userid;
  $result4 = mysqli_query($connection,$query4);
  while($row = mysqli_fetch_assoc($result4)){
    $sellerid = $row["vid"];
}
$query5 = "select * from supplier where sid=$sellerid";
$result5 = mysqli_query($connection,$query5);
while($rowss = mysqli_fetch_assoc($result5)){
  $sellername = $rowss["sname"];
}
?>
<html><head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

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
<div class="container">
    <center><h1> Feedback Form </h1> </center>
<div class="card" style="padding:160px;">
<article class="card-body">
	 <form method="post">
    <div class="form-group">
    	<label>Your name</label>
        <input class="form-control" value="<?php echo $clientname; ?>" name="email" placeholder="Email">
    </div> <!-- form-group// -->
    <div class="form-group">
        <!-- <a class="float-right" href="#">Forgot?</a> -->
    	<label>Your seller name</label>
        <input class="form-control" name="sellername" value="<?php echo $sellername;?>" placeholder="Email" type="text">
    </div> <!-- form-group// --> 
    <div class="form-group"> 
        <label> Comments </label>
        <textarea class="form-control" name="comments" placeholder="enter your comments"></textarea>
    </div> <!-- form-group// -->  
    <div class="form-group">
     <label> Ratings </label>
     <select  class="form-group" name="ratings">
         <option>0</option>
         <option>1</option>
         <option>2</option>
         <option>3</option>
         <option>4</option>
         <option>5</option>
     </select>
    </div>
    <div class="form-group">
        <button type="submit" name="user_feedback" class="btn btn-primary btn-block"> Login  </button>
    </div> <!-- form-group// -->                                                           
</form>
</article>
</div> <!-- card.// -->
</div>
</body>
</html>
<?php
if(isset($_POST["user_feedback"])){

    $comments = $_POST["comments"];
    $ratings = $_POST["ratings"];
     $query = "INSERT INTO `feedback`(`custname`, `sellername`, `comments`, `ratings`) VALUES ('$clientname','$sellername','$comments','$ratings')";
     $result = mysqli_query($connection,$query);
     if($result){
         echo"<script>Your feedback has been submitted.Thanks for your response<script>";
         header("Location: myorders.php");
     }else{
         echo "error";
     }
} 
 ?>