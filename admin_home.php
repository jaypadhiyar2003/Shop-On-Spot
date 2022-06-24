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
  <div class="container-fluid"><img src="/Shop On Spot/logo.png" height="80px" width="130px"></img>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="Sales.php">Sales</a>
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
        <li class="nav-item">
          <a class="nav-link" href="index1.php">Logout</a>
        </li>
    
      </ul>
      
    </div>
  </div>
</nav>
<center>
<h1>Availabel Products</h1>
</center>
    </br>
    </br>
<center>
<table class="table">  
  
  <tr class="tr">
<th class="th">Product id</th>
<th class="th">Product name</th>
<th class="th">Product Brand</th>
<th class="th">Product Quantity</th>
<th class="th">Product Price</th>
    

</tr>
  
<?php
include 'cn.php';
/*declare variables
$dbhost = 'localhost';  //Default hostname
$dbuser = 'root'; //Default username
$dbpass = ''; //Default password
$dbname = 'shoponspot'; //your database name

//Create connection using object oriented way
$con=mysqli_connect($dbhost,$dbuser);
$sel=mysqli_select_db($con,$dbname);
//Check Connection
if (!$con) {
    echo "Connect failed: <br />";
}
*/
$que1=mysqli_query($con,"SELECT * FROM `product` ");


while($row=mysqli_fetch_array($que1))
{
    $name=$row['Prod_name'];
    $price=$row['Prod_Price'];
    $Prodid=$row['Prod_id'];
    $Prod_qty=$row['Prod_qty'];
    $Prod_brand=$row['Prod_Brand'];
    //echo $Prod_id;
      
    
    ?>

    <tr > 
          <td ><?php echo $Prodid ?></td>
          <td ><?php echo $name ?></td>
          <td ><?php echo $Prod_brand ?></td>
          <td ><?php echo $Prod_qty ?></td>
          <td ><?php echo $price ?></td>
</tr>
<?php    
}
?>
</table>

<form action="inventoryprint.php" method="post">
<input type="submit" name="search" class="btn btn-success" value="Download Inventory Details">
</form>
</center>












    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
   <script src= "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!--
<div id="footer">
    This is footer
</div> -->
  </body>
</html>