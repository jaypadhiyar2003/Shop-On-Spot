<html>
    <head>
           <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
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
                <a class="nav-link " aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="Sales.php">Sales</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="additem.php">Add Item</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="manageitem.php">Manage Item</a>
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
            
          </div>
        </div>
      </nav>
        <br>
        <br>
        <center>
            
    <form method="post">
        <h3> Enter Product Id :~ </h3>
    
    <input type="text" name="Prod_id" required><br><br>
    <input type="submit" class="btn btn-outline-success" name="search" value="Search">
    </form>
</center>
<br>
<br>


<?php


    if($_POST){
        $id=$_POST['Prod_id'];
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
$que1=mysqli_query($con,"SELECT * FROM `product` where `Prod_id` = '$id'");
while($row=mysqli_fetch_array($que1))
{
    $name=$row['Prod_name'];
    $price=$row['Prod_Price'];
    $Prodid=$row['Prod_id'];
    $Prod_qty=$row['Prod_qty'];
    $Prod_brand=$row['Prod_Brand'];
    $disc=$row['Prod_discreption'];
}
    //echo $Prod_id;

        ?>
        <br>
        <br>
        
        <center>
        <div id="container" style="width:350px; top:30%; left:40%; transform: translate (-30%,-30%); position:absolute;">
        <form method="post" action="updateitem_db.php" enctype="multipart/form-data">
        <br>
        <br>
        <h3>Item Name</h3>
        <input type="text" name="Prod_name" value=<?php echo $name; ?>>
        <h3>Item Brand</h3>
        <input type="text" name="Prod_Brand" value=<?php echo $Prod_brand; ?>>
        <h3>Item Category</h3>
        <select name="Prod_Cat">
        <?php
         include 'cn.php';
          $que5=mysqli_query($con,"SELECT * FROM `cate`");
          
  
          while($row5=mysqli_fetch_array($que5) ){
                $cat=$row5[1];
            ?>
          <option value="<?php echo $cat; ?>"><?php echo $cat; ?></option>
          <?php
        
          }
        ?> 
        </select>
        <h3>Item Quantity</h3>
        <input type="number" name="Prod_qty" value=<?php echo $Prod_qty; ?>>
        <h3>Item Price</h3>
        <input type="number" name="Prod_Price" value=<?php echo $price; ?>>
        <br>
        <br>
        <div class="form-group">
        <h3>Upload Image:</h3>
							<input type="file" class="form-control" name="uploadImg">
                            <br><br>
							<span style="color:#f00;font-size:15px;"><b>Note:</b> Only  JPG, PNG and GIF images are allowed. Maximum upload size is 50kb </span>
                        </div>
                            <br><br>

        <h3>Item Discreption</h3>
        <textarea row="8" cols="50" name="Prod_Disc"><?php echo $disc; ?></textarea>
        <input type="hidden" value=<?php echo $id ?> name="pid">
        <br><br>
        <input type="submit" class="btn btn-outline-success" name="Add" value="submit">
        </form>
</div>
        </center>
        <?php
    }

?>

    </body>
    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
   <script src= "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</html>
