
<?php
include 'cn.php';
/*declare variables
$dbhost = 'localhost';  //Default hostname
$dbuser = 'root'; //Default username
$dbpass = ''; //Default password
$dbname = 'shoponspot'; //your database name
*/

$Prodname=$_POST['Prod_name'];
$Prodbrand=$_POST['Prod_Brand'];
$Prodcat=$_POST['Prod_Cat'];
$Prodqty=$_POST['Prod_qty'];
$Prodprice=$_POST['Prod_Price'];
$Prodimg=$_FILES['uploadImg']['name'];
$temimg=$_FILES['uploadImg']['tmp_name'];
$ProdDisc=$_POST['Prod_Disc'];

/*Create connection using object oriented way
$con=mysqli_connect($dbhost,$dbuser);
$sel=mysqli_select_db($con,$dbname);

//Check Connection
if (!$con) {
    echo "Connect failed: <br />";
}*/
move_uploaded_file( $temimg,"uploads/" . $Prodimg);
//$que="INSERT INTO `product`( `Prod_name`, `Prod_Brand`, `Prod_cat`, `Prod_Price`, `Prod_qty`, `Prod_img`, `Prod_discreption`) VALUES ('$Prodname','$Prodbrand','$Prodcat','$Prodprice','$Prodqty','$Prodimg','$ProdDisc')";

$run_que=mysqli_query($con,"INSERT INTO `product`( `Prod_name`, `Prod_Brand`, `Prod_cat`, `Prod_Price`, `Prod_qty`, `Prod_img`, `Prod_discreption`) VALUES ('$Prodname','$Prodbrand','$Prodcat','$Prodprice','$Prodqty','$Prodimg','$ProdDisc');");
if(isset($run_que)){
   // echo "<script>alert('Item is inserted.');</script>";
    echo "<script>alert('Item is inserted.'); window.location = './admin_home.php';</script>";
    //header('Location:additem.html');
      
}



?>