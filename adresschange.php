<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Shop On Spot</title>
    <link rel="stylesheet"  href="home_style.css">
</link>
<style>
  a:link{text-decoration:none;
            color:black;
            }
</style>

  </head>
  <body>
 
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
session_start();
include 'cn.php';
    $ftotal=$_GET['total'];
$fqty=$_GET['tqty'];
$fprod=$_GET['tprod'];
date_default_timezone_set('Asia/Kolkata');
$odate=date('y-m-d');
$blockno=$_GET['blockno'];
$street=$_GET['street'];
$area=$_GET['area'];
$City=$_GET['City'];
$state=$_GET['state'];
$Pincoad=$_GET['Pincoad'];

    $gc= $blockno.','.$street.','.$area.','. $City .','. $state .','. $Pincoad;
    if(isset($_SESSION['Product_cart']) && !empty($_SESSION['Product_cart'])){
      $i=0;
      $buyqtn=$_SESSION["qtyitem"];
      $cid=$_SESSION["cust_id"];
      foreach($_SESSION['Product_cart'] as $key=>$value){
          $que1=mysqli_query($con,"SELECT `Prod_qty` FROM `product` WHERE `Prod_id`='{$value}'");
          $qtn=mysqli_fetch_array($que1);
         
         
          $updqtn=$qtn[0]-$buyqtn[$i];
          $que2=mysqli_query($con,"UPDATE `product` SET `Prod_qty`='{$updqtn}' WHERE `Prod_id`='{$value}'");
          $updqtn=0;
          $i++;
  
          
      }
      $que3=mysqli_query($con,"INSERT INTO `c_bill` (`cust_id`, `prod_id`, `prod_qty`, `odate`, `g_total`,`adress`) VALUES ('$cid','$fprod','$fqty','$odate','$ftotal','$gc')");
      //require__once__DIR.'/vender/autoload.php';
    }
      ?>
      <div style="width:350px; top:20%; left:40%; transform: translate (-30%,-30%); position:absolute;">
  <div id="cont" height="300px" Width="300px" >
      <?php
      if($que3){
          $que4=mysqli_query($con,"SELECT * FROM `c_bill` WHERE `cust_id`='$cid' AND `odate`='$odate' AND `prod_id`='$fprod'");
          $row6=mysqli_fetch_array($que4);
          $oid=$row6[0];
          $que="SELECT * FROM `customer` WHERE `cust_id`='{$cid}'";
        $run_que=mysqli_query($con,$que);
        $row=mysqli_fetch_array($run_que);
        $email=$row[6];
        $msg="Hurrey!!!\n\n Hello user you order is placed and will be deleverd within 7 working days. \n  \n \n Here is some details of the orderd placed \n \n \n
<html><body><table><tr><th>Order Id</th><th>Total Price</th><th>Adress to Delever</th></tr><tr><td>$oid</td><td>$ftotal</td><td>$gc</td></tr></table></body></html> \n \n \n we will request you to download the invoice \n \n \n thank you for trusting the Shop On Spot";
      
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

      
      
  <form method="Post" action="print_invoice.php">
          <center>
            <p>Your Order is Placed.</br>Your Product will be delevered in next 7 day At your registered address.</p> 
      </br>
      <input type="hidden" name="oid" value="<?php echo $oid; ?>">
      <input type="submit" class='btn btn-outline-success' name="Login" value="Download Your Invoice"></br><br>
      <a href='index1.php'>Buy Products</a>
      </center> 
  </form>

  </div>
  </div>
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