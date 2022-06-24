<?php

include 'cn.php';

$id=$_POST['pid'];
$Prodname=$_POST['Prod_name'];
$Prodbrand=$_POST['Prod_Brand'];
$Prodcat=$_POST['Prod_Cat'];
$Prodqty=$_POST['Prod_qty'];
$Prodprice=$_POST['Prod_Price'];
$Prodimg=$_FILES['uploadImg']['name'];
$temimg=$_FILES['uploadImg']['tmp_name'];
$ProdDisc=$_POST['Prod_Disc'];

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
//move_uploaded_file( $temimg,"uploads/" . $Prodimg);
$que=mysqli_query($con,"UPDATE `product` SET `Prod_name`='$Prodname',`Prod_Brand`='$Prodbrand',`Prod_cat`='$Prodcat',`Prod_Price`='$Prodprice',`Prod_qty`='$Prodqty',`Prod_discreption`='$ProdDisc' WHERE `Prod_id` = '$id'");



if(isset($que)){
   // echo "<script>alert('Item is inserted.');</script>";
    echo "<script>alert('Item is updated.'); window.location = './admin_home.php';</script>";
    //header('Location:additem.html');
      
}


?>