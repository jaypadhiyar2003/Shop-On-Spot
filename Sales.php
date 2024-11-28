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
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid"><img src="/Shop On Spot/Logosop.png" height="80px" width="130px"></img>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="admin_home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="Sales.php">Sales</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="additem.php">Add Item</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="manageitem.php">Manage Item</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="add_supplier.html">Add Suplier</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="add_admin.html">Add Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cat.php">Category</a>
        </li>

    </ul>
        <form action="Sales.php" method="get" target="_parent">
      <select id="odate" name="odate">
            <option value="Today">Today</option>
            <option value="btd">Between Two Dates</option>
            <option value="Specific Date">Specific Date</option> 
        </select>
       
        <button class="btn btn-outline-success" type="submit" >Submit</button>
          </form>
      

    </div>
  </div>
</nav>


<?php
include 'cn.php';

if(!$_GET){

    echo "<h1><center>Select Day or Days whose Sales Details need to be known</center></h1>";
}

else{
    $var=$_GET['odate'];
    $tod="Today";
    $BTD="btd";
    $yest="Yesterday";
    $spd="Specific Date";
    if($var==$tod){
        $todayDate=date("y-m-d");
        $que1=mysqli_query($con,"SELECT * FROM `c_bill` WHERE `odate`='$todayDate'");

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
          <td ><?php echo $oid; ?></td>
          <td ><?php echo $cid; ?></td>
          <td><a href="detail_order.php?order_id=<?php echo $oid; ?>">Order Detail</a></td>
          <td ><?php echo $orddate; ?></td>
          <td ><?php echo $gtotal; ?></td>
          <td><?php echo $address; ?></td>
          
</tr>
<?php    
}
?>
</table>
</center>
<?php
      
    }
    elseif($var==$BTD){
        header('Location:btd.php');
    }
    elseif($var==$spd){
        header('Location:spedate.php');
    }

}
?>










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