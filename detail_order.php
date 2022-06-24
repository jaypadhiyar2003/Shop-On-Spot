<html>
    <head>
         <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
    <body>
        <br><br>
        <center>
<table>
<?php
include 'cn.php';

$var=$_GET['order_id'];
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
?>
<tr>
<th>Prod name</th>
<th>Qty</th>
</tr>
<?php

$que3=mysqli_query($con,"SELECT * FROM `c_bill` WHERE `order_id`='$var'");
$row=mysqli_fetch_array($que3);
$ufqty=$row['prod_qty'];
$uprod=$row['prod_id'];
$orqty=unserialize(base64_decode($ufqty));
$orprod=unserialize(base64_decode($uprod));


foreach($orprod as $index => $id){
   // echo "Prod id = ".$id."  qty=".."\n";
    $que2=mysqli_query($con,"SELECT * FROM `product`where `Prod_id`='$id'");
    $row1=mysqli_fetch_array($que2);
    $Pname=$row1['Prod_name'];
    ?>
    <tr>
    <td><?php echo $Pname ;?></td>
    <td><?php echo $orqty[$index] ;?></td>
    </tr>
    <?php
    
}
?>
</table>
</center>
<center>
  <br>
  <br>
<a href="Sales.php">Click to Return</a>
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


</body>
</html>