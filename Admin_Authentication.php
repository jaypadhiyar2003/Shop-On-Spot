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

$id=$_POST['adminid'];
$password=$_POST['password'];
$que=mysqli_query($con,"Select * from Admin where Admin_id=$id and Password=$password;");

if($que){
    //echo "runed";
    echo "<script>alert('Admin is Logined.'); window.location = './Admin_home.php';</script>";
    //header('Location:Admin_home.php');
}
else{
    echo "<script>alert('Login_id or password is incorrect.'); window.location = './Admin_Authentication.php';</script>";
    //echo "Login_id and password are incorrect";
}
?>