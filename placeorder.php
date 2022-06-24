<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Downloade Invoice</title>
  </head>
  <body>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
session_start();
$cid=$_SESSION["cust_id"];
include 'cn.php';

$ftotal=$_POST['total'];
$fqty=$_POST['tqty'];
$fprod=$_POST['tprod'];
$ca=$_POST['chooseaddress'];

$que5=mysqli_query($con,"SELECT * FROM `customer` WHERE `Cust_id`=$cid");
$row3=mysqli_fetch_array($que5);
$gc=$row3[4];
date_default_timezone_set('Asia/Kolkata');
$odate=date('y-m-d');
if($ca==0){
if(isset($_SESSION['Product_cart']) && !empty($_SESSION['Product_cart'])){
    $i=0;
    $buyqtn=$_SESSION["qtyitem"];
    
    foreach($_SESSION['Product_cart'] as $key=>$value){
        $que1=mysqli_query($con,"SELECT `Prod_qty` FROM `product` WHERE `Prod_id`='{$value}'");
        $qtn=mysqli_fetch_array($que1);
       
       
        $updqtn=$qtn[0]-$buyqtn[$i];
        $que2=mysqli_query($con,"UPDATE `product` SET `Prod_qty`='{$updqtn}' WHERE `Prod_id`='{$value}'");
        $updqtn=0;
        $i++;

        
    }
    $que3=mysqli_query($con,"INSERT INTO `c_bill` (`cust_id`, `prod_id`, `prod_qty`, `odate`, `g_total`,`adress`) VALUES ('$cid','$fprod','$fqty','$odate','$ftotal','{$gc}');");
    if($que3){
      



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


$que="SELECT * FROM `customer` WHERE `cust_id`='{$cid}'";
$run_que=mysqli_query($con,$que);
$row=mysqli_fetch_array($run_que);
$email=$row[6];
$que4=mysqli_query($con,"SELECT * FROM `c_bill` WHERE `cust_id`='$cid' AND `odate`='$odate' AND `prod_id`='$fprod'");
$row6=mysqli_fetch_array($que4);
$oid=$row6[0];
$msg="Hurrey!!!\n\n Hello user you order is placed and will be deleverd within 7 working days. \n  \n \n Here is some details of the orderd placed \n \n \n
<html><body><table><tr><th>Order Id</th><th>Total Price</th><th>Adress to Delever</th></tr><tr><td>$oid</td><td>$ftotal</td><td>$gc</td></tr></table></body></html> \n \n \n we will request you to download the invoice \n \n \n thank you for trusting the Shop On Spot";
  /*<table align='center' width='100%'><tr align='center'>
    <th>Sr no.</th>
    <th>Name</th>
    <th>Price</th>
    <th>Quantity</th>

    </tr>
    <?php
    $i=0;
    $grandtotal=array();
    $grandqty=array();
    foreach($_SESSION['Product_cart'] as $key=>$value){
        $i++;
        $productq=mysqli_query($con,"SELECT * FROM `product` WHERE `Prod_id`='{$value}'") or die(mysqli_error($con));
        $row=mysqli_fetch_array($productq);
        
        $qty=$_SESSION['qtyitem'][$key];
        $subtotal=$row['Prod_Price'] * $qty;
        ?>
       <tr align='center'>
       <td><?php echo $i; ?></td>
       <td><?php echo {$row['Prod_name']}; ?></td>
       <td><?php echo {$row['Prod_Price']}; ?></td>
       <td><?php echo $qty; ?></td>
       <td><?php echo $subtotal; ?></td>
       </tr>
       <?php
       $grandtotal[]=$subtotal;
       $grandqty[]=$qty;
       $grandprod[]=$value;
       //print_r($value);
       
    }

    $finaltotal=array_sum($grandtotal);
    $finalqty=base64_encode(serialize($grandqty));
    $finalprod=base64_encode(serialize($grandprod));
    ?>
    <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><center><?php echo $finaltotal; ?></center></td>
    </tr>

  </table>";*/
//if($count>0){
  //  $password=$row['Password'];
    
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function


//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
   // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'padhiyarjay029@gmail.com';                     //SMTP username
    $mail->Password   = 'padhiyar2003';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('padhiyarjay029@gmail.com', 'jay padhiyar');
    $mail->addAddress($email, $email);     //Add a recipient
   // $mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
 //   $mail->addCC('cc@example.com');
   // $mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Order is placed';
    $mail->Body    = "$msg";
    $mail->AltBody = "$msg";

    $mail->send();
    //echo "<script>alert('Password has been sent');</script>";
    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
//}
//else{
   // echo "<script>alert('Email is Wrong.');</script>";
    //echo "<script>alert('Email is Wrong.'); window.location = './Forgot_login.html';</script>";
//}

    }
    //require__once__DIR.'/vender/autoload.php';
    ?>
    <div style="width:350px; top:20%; left:40%; transform: translate (-30%,-30%); position:absolute;">
<div id="cont" height="300px" Width="300px" >
<form method="Post" action="print_invoice.php">
        <center>
          <p>Your Order is Placed.</br>Your Product will be delevered in next 7 day At your registered address.</p> 
    </br>
    <input type="hidden" name="oid" value="<?php echo $oid; ?>">
    <input type="submit" class='btn btn-outline-success' name="Login" value="Download Your Invoice"></br>
    <a href='index1.php'>Buy Products</a>
    </center> 
</form>
</div>
</div>
<?php
  }
}
/*
$que3=mysqli_query($con,"SELECT * FROM `c_bill` WHERE `order_id`='11'");
$row=mysqli_fetch_array($que3);
$ufqty=$row['prod_qty'];
$uprod=$row['prod_id'];
$orqty=unserialize(base64_decode($ufqty));
$orprod=unserialize(base64_decode($uprod));
print_r($orprod);
print_r($orqty);
*/
else{
  
  ?>
  
  <div  id="main"style="height:800px; width:1500px; font-family:'Times New Roman'; background-image:url('back.jpg')">
    <div style=" width:350px; height:350px; top:25%; left:35%; transform: translate (-20%,-20%); position:absolute; background-color:#FFFFCC;">
<div style="width:350px; top:10%; left:5%; transform: translate (-30%,-30%); position:absolute;">
<div id="cont" height="200px" Width="200px"  >
  <center>
  <form action="adresschange.php" method="get">
    <label><h4>Add new Address</h4></label><br>
    <input type="text" name="blockno" placeholder="Block no/house/building">
    <input type="text" name="street" placeholder="Street name/Area/village ">
    <input type="text" name="area" placeholder="Land Mark">
    <input type="text" name="City" placeholder="City">
    <input type="text" name="state" placeholder="State">
    <input type="text" name="Pincoad" placeholder="pincod">
 <!--<textarea name="address" rows="4" cols="25" placeholder="Block no"  required ></textarea>-->
   <br><br>
    <input type='hidden' name='tprod' value='<?php echo $fprod; ?>'></input>
<input type='hidden' name='tqty' value='<?php echo $fqty; ?>'></input>
<input type='hidden' name='total' value='<?php echo $ftotal; ?>'></input>
<input type="submit" class='btn btn-outline-success' name="Login" value="Change address">
  </form>
</center>
</div>
</div>
</div>
</div>
<?php
}


?>
  




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
