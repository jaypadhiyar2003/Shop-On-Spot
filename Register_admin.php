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
$fname=$_POST['Fname'];
$lname=$_POST['Lname'];
$email=$_POST['email'];
$password=$_POST['Password'];
$gender=$_POST['Gender'];
$phoneno=$_POST['phoneNo'];
$blockno=$_POST['blockno'];
$street=$_POST['street'];
$area=$_POST['area'];
$City=$_POST['City'];
$state=$_POST['state'];
$Pincoad=$_POST['Pincoad'];
$address=$blockno.','.$street.','.$area.','. $City .','. $state .','. $Pincoad;

//$que="INSERT INTO `customer`( `First_name`, `Last_name`, `Password`, `Address`, `Gender`, `email`, `Phone_no`) VALUES ('[$fname]','[$lname]','[$email]','[$password]','[$gender]','[$phoneno]','[$address]');"

$cmd=mysqli_query($con,"INSERT INTO `admin`( `First_name`, `Last_name`, `Password`, `Address`, `Gender`, `email`, `Phone_no`) VALUES ('$fname','$lname','$password','$address','$gender','$email','$phoneno');");
if($cmd){
    echo "<script>alert('Admin is Registered .'); window.location = './admin_home.php';</script>";
    //echo "Admin is Registered";
    //echo "<center><a href='admin_home.php'> Click here to go Home Page. </a></center>";
}
?>