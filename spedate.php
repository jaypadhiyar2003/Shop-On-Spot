<?php
include 'cn.php';

?>

<!doctype html>
<html lang="en">
  <head>
    <style>table,tr,th,td{
      border:2px solid black;
    }</style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Admin Login</title>
    <link rel="stylesheet"  href="home_style.css">
</link>

  </head>
  <body>
<Center>
    <h1>Select the Dates </h1><br><br>
<form method="post">
    <input type="date" name="stdt" required>
    <br><br>
    <p>
        <input type="submit" name="search" class="btn btn-success" value="Search Order...!">
</p>
</form>
</center>
<?php
if($_POST){
$stadt=$_POST['stdt'];
  $que1=mysqli_query($con,"SELECT * FROM `c_bill` WHERE `odate`='$stadt'");
 
  ?>
  <center>
  <table class="table">
  <th>Order id</th>
  <th>Customer Id</th>
  <th>Order Detail Link</th>
  <th>Order Date</th>
  <th>Grand Total</th>
  <th>Delevired At</th>
  <?php

   while($row=mysqli_fetch_array($que1))
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
        <td ><?php echo $oid ?></td>
        <td ><?php echo $cid ?></td>
        <td><a href="detail_order.php?order_id=<?php echo $oid; ?>">Order Detail</a></td>
        <td ><?php echo $orddate ?></td>
        <td ><?php echo $gtotal ?></td>
        <td><?php echo $address; ?></td>
        
</tr>
<?php    
}
}
?>
</table>
</center>
<center>
  <br>
  <br>
<a href="Sales.php">Click to Return</a>
</center>








    <!-- -->

    <!-- -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- -->   <script src= "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!--
<div id="footer">
    This is footer
</div> -->
  </body>
</html>