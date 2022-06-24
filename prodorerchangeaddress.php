

<?php

session_start();
$cid= $_SESSION["cust_id"];
include 'cn.php';
$ftotal=$_POST['total'];
$fqty=$_POST['tqty'];
$fprod=$_POST['tprod'];

$que=mysqli_query($con,"SELECT * FROM `customer` WHERE `Cust_id`='$cid'");
$row=mysqli_fetch_array($que);
//print_r($row[4]);
?>
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
<style>
  a:link{text-decoration:none;
            color:black;
            }
</style>

  </head>
  <body>
  <div  id="main"style="height:800px; width:1500px; font-family:'Times New Roman'; background-image:url('back.jpg')">
    <div style=" width:350px; height: 350px; top:25%; left:35%; transform: translate (-20%,-20%); position:absolute; background-color:#FFFFCC;">
<div style="width:250px; top:10%; left:30%; transform: translate (-30%,-30%); position:absolute;">
<div id="cont" height="200px" Width="200px"  >

<form action="placeorder.php" method="post">
    <br>
    <br>
<label><h3>Old Address</h3></label>
<input type="radio" name="chooseaddress" value="0" required></input><br>
<label><h3>New Address</h3></label>
<input type="radio" name="chooseaddress" value="1" required></input>

<input type='hidden' name='tprod' value='<?php echo $fprod; ?>'></input>
<input type='hidden' name='tqty' value='<?php echo $fqty; ?>'></input>
<input type='hidden' name='total' value='<?php echo $ftotal; ?>'></input>
<br>
<br>

<input type="submit" class='btn btn-outline-success' name="Login" value="Change address">
</form>
        </div>
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
