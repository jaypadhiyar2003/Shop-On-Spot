<html>
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
<?php

include 'cn.php';

session_start();

if(!isset($_SESSION["cust_id"])){
    echo "You are not Logined . So Login first.";
    echo "<center></br></br><a href='Login.php'>Click to Login. </a></br></center";
}
else{

$id=$_SESSION['cust_id'];

/*declare variables
$dbhost = 'localhost';  //Default hostname
$dbuser = 'root'; //Default username
$dbpass = ''; //Default password
$dbname = 'shoponspot'; //your database name
$con=mysqli_connect($dbhost,$dbuser);
$sel=mysqli_select_db($con,$dbname);
//Check Connection
if (!$con) {
    echo "Connect failed: <br />";
}
*/
$name;
$address;
$email;
$cont;
$que=mysqli_query($con,"SELECT * FROM `customer` where `Cust_id`='$id'");

while($row=mysqli_fetch_array($que)){

    $name=$row['First_name'];
    $address=$row['Address'];
    $cont=$row['Phone_no'];
    $email=$row['email'];
}

echo "<center><h1>Welcome ".$name."</h1></center>";
echo "<center><h3>Your current address is :- ".$address."</h3></center>";
echo "<center><h3>Your current email address is :- ".$email."</h3></center>";
echo "<center><h3>Your Phone no is :- ".$cont."</h3></center>";



?>

<br><br><br><br>

<center>
<h1>Following are your orders</h1>
<table>
</center>
<br>
<?php

$que2=mysqli_query($con,"SELECT * FROM `c_bill` WHERE `cust_id` = $id ");

    ?>
    <center>
  <table class="table">
  <th>Order id</th>
  <th>Customer Id</th>
  <th>Order Detail Link</th>
  <th>Order Date</th>
  <th>Grand Total</th>
  <th>Delivery At</th>

  <?php

   while($row=mysqli_fetch_array($que2))
  {
   $oid=$row['order_id'];
   $cid=$row['cust_id'];

   $orddate=$row['odate'];
    $gtotal=$row['g_total'];
    $address=$row['adress'];
  // $Prod_brand=$row[''];
   //echo $Prod_id;
    
  
  ?>

  <tr > 
        <td ><?php echo $oid; ?></td>
        <td ><?php echo $cid; ?></td>
        <td><a href="usdetail_order.php?order_id=<?php echo $oid; ?>">Order Detail</a></td>
        <td ><?php echo $orddate; ?></td>
        <td ><?php echo $gtotal; ?></td>
        <td><?php echo $address; ?></td>
        
</tr>
<?php    
}

?>
</table>
<br>
<form method="post" action="logut.php"> 
<button class="btn btn-outline-success" type="submit" >Logout</button>
</form>
<?php
}
?>
 <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
   <script src= "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


</body>
</html>


