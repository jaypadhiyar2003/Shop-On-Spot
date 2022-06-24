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
 session_start();
 if(!isset($_SESSION["cust_id"])){
        echo "You are not Logined . So Login first.";
        echo "<center></br></br><a href='Login.php'>Click to Login. </a></br></center";
}
else{
$qty=$_POST['qty'];
$id=$_POST['Pid'];
$cid=$_SESSION["cust_id"];

$que5=mysqli_query($con,"SELECT  `Prod_qty` FROM `product` WHERE `Prod_id`='{$id}'");
$row5=mysqli_fetch_array($que5);
$avalqty=$row5[0];
echo $avalqty;
if($avalqty < $qty){
    echo "<script>alert('Sory we only have .$row5[0].Quantity avaleble'); window.location = './index1.php';</script>";
}

else{
    if(isset($_SESSION['Product_cart'])){
        $current_num=$_SESSION['counter']+1;
        $_SESSION['Product_cart'][$current_num]=$id;
        $_SESSION['qtyitem'][$current_num]=$qty;
        $_SESSION['counter']=$current_num;
        
        
        $que=mysqli_query($con,"SELECT `Cart_id` FROM cart WHERE `Cust_id`=$cid");
        $row=mysqli_fetch_array($que);
        $cartid=$row[0];
        echo $cartid;
        switch($current_num){
            case 2;
                $que1=mysqli_query($con,"UPDATE `cart_item` SET `item2`='$id' WHERE `cart_id`=$cartid");  
                break;
            case 3;
                $que1=mysqli_query($con,"UPDATE `cart_item` SET `item3`='$id' WHERE `cart_id`=$cartid");  
                break;
            case 4;
                $que1=mysqli_query($con,"UPDATE `cart_item` SET `item4`='$id' WHERE `cart_id`=$cartid");  
                break;
            case 5;
                $que1=mysqli_query($con,"UPDATE `cart_item` SET `item5`='$id' WHERE `cart_id`=$cartid");  
                break;
            case 6;
                $que1=mysqli_query($con,"UPDATE `cart_item` SET `item6`='$id' WHERE `cart_id`=$cartid");  
                break;
            case 7;
                $que1=mysqli_query($con,"UPDATE `cart_item` SET `item7`='$id' WHERE `cart_id`=$cartid");  
                break;
            case 8;
                $que1=mysqli_query($con,"UPDATE `cart_item` SET `item8`='$id' WHERE `cart_id`=$cartid");  
                break;
            case 9;
                $que1=mysqli_query($con,"UPDATE `cart_item` SET `item9`='$id' WHERE `cart_id`=$cartid");  
                break;
            case 10;
                $que1=mysqli_query($con,"UPDATE `cart_item` SET `item10`='$id' WHERE `cart_id`=$cartid");  
                break;
        }
    }
    else{
        $Product_cart=array();
        $qtyitem=array();
        $_SESSION['Product_cart'][0]=$id;
        $_SESSION['qtyitem'][0]=$qty;
        $_SESSION['counter']=0;
        switch($current_num){
            case 1:
                $que1=mysqli_query($con,"UPDATE `cart_item` SET `item1`='$id' WHERE `cart_id`=$cartid");  
                break;
            }

    }
    header('Location:viewcart.php');
}

}

?>
