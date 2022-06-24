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


$fname=$_POST['fname'];
$lname=$_POST['lname'];
$password=$_POST['password'];
$gender=$_POST['gender'];
$phoneno=$_POST['phoneno'];
$address=$_POST['address'];
$email=$_POST['email'];
$otp=$_POST['otp'];
$rotp=$_POST['rotp'];


if($rotp==$otp){
//$que="INSERT INTO `customer`( `First_name`, `Last_name`, `Password`, `Address`, `Gender`, `email`, `Phone_no`) VALUES ('[$fname]','[$lname]','[$email]','[$password]','[$gender]','[$phoneno]','[$address]');"

$cmd=mysqli_query($con,"INSERT INTO `customer`( `First_name`, `Last_name`, `Password`, `Address`, `Gender`, `email`, `Phone_no`) VALUES ('$fname','$lname','$password','$address','$gender','$email','$phoneno');");
if($cmd){

    $que1=mysqli_query($con,"SELECT `Cust_id` FROM `customer` WHERE `email`='$email';");
    $fetch1=mysqli_fetch_row($que1);
    $cust_id=$fetch1[0];
    $que2=mysqli_query($con,"INSERT INTO `cart` (`Cust_id`) VALUES ('$cust_id');");
    $que3=mysqli_query($con,"SELECT `Cart_id` FROM `cart` WHERE `Cust_id`='$cust_id';");
    if($que3){
        $fetch2=mysqli_fetch_row($que3);
        $cart_id=$fetch2[0];
        $que4=mysqli_query($con,"INSERT INTO `cart_item` (`cart_id`) VALUES ('$cart_id');");
       
        //echo "<script>alert('Registerion succesful.');</script>";
        echo "<script>alert('Registerion succesful.'); window.location = './Login.php';</script>";
        //header('Location:Login.php');

    }

    }
else{
    echo "<script>alert('Registerion unsuccesful.'); window.location = './signin.html';</script>";
   // echo "<script>alert('Registerion unsuccesful.');</script>";
}
}
else{
    echo "<script>alert('Your Otp is wrong.'); window.location = './Register_user.php';</script>";
}

?>