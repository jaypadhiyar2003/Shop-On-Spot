<?php
include 'cn.php';
/*
$con=mysqli_connect("localhost","root");
$select=mysqli_select_db($con,"shoponspot");
if(!$con){
    echo "Connection Failed";
}
if(!$select){
    echo "Database connection faied";
}
*/

$name=$_POST['name'];
$email=$_POST['email'];
$phoneno=$_POST['phoneNo'];
$address=$_POST['address'];

//$que="INSERT INTO `customer`( `First_name`, `Last_name`, `Password`, `Address`, `Gender`, `email`, `Phone_no`) VALUES ('[$fname]','[$lname]','[$email]','[$password]','[$gender]','[$phoneno]','[$address]');"

$cmd=mysqli_query($con,"INSERT INTO `supplier`(`supplier_name`, `supplier_add`, `supplier_cont`, `supplier_email`) VALUES ('$name','$address','$phoneno','$email');");
if($cmd){
    echo "<script>alert('Supplier is Registered .'); window.location = './admin_home.php';</script>";
   // echo "Supplier is Registered";
    //echo "<center><a href='admin_home.php'> Click here to go Home Page. </a></center>";
}
?>