
<?php
require("header.php");
require("nav.php");

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
    echo "<br> <br> You are not Logined . So Login first.";
    echo "<center></br></br><a href='Login.php'>Click to Login. </a></br></center";
}
else{
if(isset($_GET['id'])){
    $pid=$_GET['id'];
    unset($_SESSION['Product_cart'][$pid]);
    unset($_SESSION['qtyitem'][$pid]);
}
if(isset($_SESSION['Product_cart']) && !empty($_SESSION['Product_cart'])){
    echo "<table align='center' width='100%'>";
    echo "<tr align='center'>";
    echo "<th>Sr no.</th>";
    echo "<th>Image</th>";
    echo "<th>Name</th>";
    echo "<th>Price</th>";
    echo "<th>Quantity</th>";

    echo "</tr>";
    $i=0;
    $grandtotal=array();
    $grandqty=array();
    foreach($_SESSION['Product_cart'] as $key=>$value){
        $i++;
        $productq=mysqli_query($con,"SELECT * FROM `product` WHERE `Prod_id`='{$value}'") or die(mysqli_error($con));
        $row=mysqli_fetch_array($productq);
        
        $qty=$_SESSION['qtyitem'][$key];
        $subtotal=$row['Prod_Price'] * $qty;
       echo "<tr align='center'>";
       echo "<td>$i</td>";
       echo "<td><img src='uploads/{$row['Prod_img']}' style='width:100px;'></td>";
       echo "<td>{$row['Prod_name']}</td>";
       echo "<td>{$row['Prod_Price']}</td>";
       echo "<td>$qty</td>";
       echo "<td>$subtotal</td>";
       echo "<td><a href='?id=$key'>Remove Product</a></td>";
       echo "</tr>";
       $grandtotal[]=$subtotal;
       $grandqty[]=$qty;
       $grandprod[]=$value;
       //print_r($value);
       
    }

    $finaltotal=array_sum($grandtotal);
    $finalqty=base64_encode(serialize($grandqty));
    $finalprod=base64_encode(serialize($grandprod));
    
    echo "<tr>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td><center>$finaltotal</center></td>";
    echo "</tr>";

    echo "</table>";
    echo "   <center></br></br><a href='index1.php'>Buy More Products</a></br>  </center>";
    echo"<form action='prodorerchangeaddress.php' method='post'><input type='hidden' name='tprod' value='$finalprod'></input><input type='hidden' name='tqty' value='$finalqty'></input><input type='hidden' name='total' value='$finaltotal'></input></br><center><button class='btn btn-outline-success' type='submit'>Buy Now</button></center></form>";
}
else{
    echo "Cart is Empty!!";
    echo "<center><a href='index1.php'> Click here to Buy . </a></center>";
}
}

?>
<br>
<br>
<br>
<br>

<br>
<br>
<br>
<br>
<br>    
<!-- -->

    <!-- -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- -->   <script src= "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

<?php
require("footer.php");
?>
</html>