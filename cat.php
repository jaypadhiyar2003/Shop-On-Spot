<?php
if($_POST){
    include 'cn.php';
    $cat=$_POST['cat'];
    
    $que1=mysqli_query($con,"INSERT INTO `cate`(`catname`) VALUES ('$cat')");
    if($que1){
        echo "<script>alert('New Category is Inserted.'); window.location = './cat.php';</script>";  
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Login</title>
    <link rel="stylesheet"  href="home_style.css">
</link>
<style>
  a:link{text-decoration:none;
            color:black;
            }
</style>

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
          <a class="nav-link " aria-current="page" href="admin_home.php">Home</a>
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
          <a class="nav-link active" href="cat.php">Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index1.php">Logout</a>
        </li>
    
      </ul>
      
    </div>
  </div>
</nav>

<div style=" width:1550px; height:700px; background-image:url('back.jpg'); ">
<div style=" width:350px; height: 330px; top:20%; left:40%; transform: translate (-30%,-30%); position:absolute; background-color:#FFFFCC;">
<div id="cont" height="200px" Width="200px" >
<form method="Post" action="">
    <center>
    <br>
    <h3>Add new Category</h3>
    <input type="text" name="cat" required>
    <br><br>
    
    <input type="submit" class='btn btn-outline-success' name="Login" value="Add">
        </center>
</form>
</div>
</div>
</div>







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