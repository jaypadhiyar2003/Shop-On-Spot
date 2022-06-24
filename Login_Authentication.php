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
$id=$_POST['eid'];
$password=$_POST['password'];
$que=mysqli_query($con,"Select * from customer where email=$id and Password=$password;");

if(isset($que)){
    $que1=mysqli_query($con,"SELECT * FROM `customer` WHERE `email`='{$id}'");
    $fetch=mysqli_fetch_array($que1);
    //echo $fetch['Cust_id'];
    $cust_id=$fetch['Cust_id'];

    session_start();
    $_SESSION["cust_id"]=$cust_id;
    if(isset($_SESSION["cust_id"]))
    {
       // echo $_SESSION["cust_id"];
       echo "<script>alert('You are now Logined .'); window.location = './index1.php';</script>";
       //header('Location:index1.php');
      
    }
    
}
else{
    echo "<script>alert('Your id or Password is Wrong.');</script>";
}
?>