<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Shop On Spot</title>
    <link rel="stylesheet"  href="home_style.css">
</link>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
   a:link{
    text-decoration:none;
            color: black;

            }
.fa {
  padding: 20px;
  font-size: 30px;
  width: 50px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}

.fa-google {
  background: #dd4b39;
  color: white;
}

.fa-linkedin {
  background: #007bb5;
  color: white;
}

.fa-youtube {
  background: #bb0000;
  color: white;
}

.fa-instagram {
  background: #C13584;
  color: white;
}

.fa-snapchat-ghost {
  background: #fffc00;
  color: white;
  text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
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
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>

        <li class="nav-item">
           <a class="nav-link" href="About.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="viewcart.php">Cart</a>
        </li>
        <li class="nav-item">
        <?php
         session_start();

         if(isset($_SESSION["cust_id"])){
           echo "<a class='nav-link' href='userprofile.php'>My Profile</a>";
         }
         else{
            echo "<a class='nav-link' href='Login.php'>Login</a>";
         }
         ?>
         </li>
        
    
      </ul>
       <form action="index1.php" method="get" target="_parent">
      <select id="Prod_Cat" name="Prod_Cat">
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
       
        <button class="btn btn-outline-success" type="submit" >Search</button>
          </form>
    </div>
  </div>
</nav>

<?php
/*session_start();
if(isset($_SESSION["cust_id"]))
{
   echo "<script>alert('You are now Logined .');</script>";
  
} */
?>

<table>   
<?php


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








if(!$_GET){
$que2="SELECT `Prod_id`, `Prod_name`,  `Prod_Price`, `Prod_img` FROM `product`";
$run_que2=mysqli_query($con,$que2);
while($row=mysqli_fetch_array($run_que2))
{
    $name=$row['Prod_name'];
    $price=$row['Prod_Price'];
    $Prodid=$row['Prod_id'];

    //echo $Prod_id;
        static $i=0;
        $i++;

     ?>
          <td><?php  echo '<a href="detail.php?Prod_id='. $Prodid. '"><img src="uploads/'.$row['Prod_img'].'" width="200px;" height="200px;" alt="image"> <br><center>'.$name.'<br> Price :'.$price.'</center></a>'; ?></td>
    <?php

    if($i==7){
         echo '<tr></tr>';
         $i=0;
    }
    ?>
    
    <?php
    
}
}
else{



?>
</table>
<table>
<?php
$cat=$_GET["Prod_Cat"];

$que3="SELECT `Prod_id`, `Prod_name`,  `Prod_Price`, `Prod_img` FROM `product` WHERE `Prod_cat`='$cat'";
$run_que3=mysqli_query($con,$que3);

while($row1=mysqli_fetch_array($run_que3))
{
    $name1=$row1['Prod_name'];
    $price1=$row1['Prod_Price'];
    $Prodid1=$row1['Prod_id'];
    //echo $Prod_id;
        static $i1=0;
        $i1++;

     ?>
          <td><?php  echo '<a href="detail.php?Prod_id='. $Prodid1. '"><img src="uploads/'.$row1['Prod_img'].'" width="200px;" height="200px;" alt="image"> <br><center>'.$name1.'<br> Price :'.$price1.'</center></a>'; ?></td>
    <?php

    if($i1==7){
         echo '<tr></tr>';
         $i1=0;
    }
    ?>
    
    <?php
    
}
}
?>
</table>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
   <script src= "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



<br>
<br>
<!-- Footer -->
<footer class="text-center text-lg-start bg-dark text-muted">
  <!-- Section: Social media -->
 


  <section
    class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom"
  >
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Get connected with us on social networks:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
    <a href="https://instagram.com/itzklp_?utm_medium=copy_link" class="fa fa-instagram"></a>
    <a href="" class="fa fa-snapchat-ghost"></a>
    <a href="https://www.facebook.com/padhiyar.jay.583" class="fa fa-facebook"></a>
    <a href="" class="fa fa-twitter"></a>
  
    </div>
    <!-- Right -->
  </section>



  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>Shop On Spot
          </h6>
          <p>
          The Shop On Spot is a online shoping website (E-Commerce website) Which is created for the project(semester-6).
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
      
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
         
          <p>
            <a href="signin.html" class="text-reset">Register</a>
          </p>
          <p>
            <a href="userprofile.php" class="text-reset">Orders</a>
          </p>
          <p>
            <a href="About.php" class="text-reset">About Us</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Contact
          </h6>
          <p><i class="fas fa-home me-3"></i>BBIT POLYTECHENIC , VVNAGAR</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            kalpdalsania@gmail.com
          </p>
          <p><i class="fas fa-phone me-3"></i> + 91 96870 01314</p>
          <p><i class="fas fa-print me-3"></i> + 91 94297 39261</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Copyright:
    <a class="text-reset fw-bold">ShopOnSpot.com</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->






   <script src="js/script.js"></script>
  </body>
</html>