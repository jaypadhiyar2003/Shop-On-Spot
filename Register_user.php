<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include 'cn.php';
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
$email=$_POST['email'];
//Load Composer's autoloader

$fname=$_POST['Fname'];
$lname=$_POST['Lname'];
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
    $rotp=rand(100000,999999);
    
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'OTP verification';
    $mail->Body    = "Your OTP is $rotp ";
    $mail->AltBody = "Your OTP is $rotp";

   if($mail->send()){
       ?>
        <html>
    <head>
        <title>Forgot Password</title>
         <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- Bootstrap CSS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>

<body>
    
    <div style="border: 2px;background-image: url('back.jpg'); width: 1520px; height: 760px; ">
      <div style=" width:350px; height: 350px; top:20%; left:40%; transform: translate (-30%,-30%); position:absolute; background-color:#FFFFCC;">
<center>
    Check your email for otp.
    
            <br>
            <br>
    <form method="post" action="email_check.php">
        <h3>Enter your Otp From Your email id :</h3>
        <input type="number" name="otp" required>
        <br><br>
        <input type='hidden' name='fname' value='<?php echo $fname; ?>'>
        <input type='hidden' name='lname' value='<?php echo $lname; ?>'>
        <input type='hidden' name='gender' value='<?php echo $gender; ?>'>
        <input type='hidden' name='password' value='<?php echo $password; ?>'>
        <input type='hidden' name='phoneno' value='<?php echo $phoneno; ?>'>
        <input type='hidden' name='email' value='<?php echo $email; ?>'>
        <input type='hidden' name='address' value='<?php echo $address; ?>'>
        <input type='hidden' name='rotp' value='<?php echo $rotp; ?>'>
        <center></br></br><a href='singin.html'>If otp is not get then click here for re-registeration .</a></br>  </center>
        <button type="submit" class="btn btn-success" name="Add">submit</button>
        </form>
    </center>
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
       <?php
   }
   else{
     //echo "<script>alert('Email is Wrong.');</script>";
     echo "<script>alert('Email is Wrong.'); window.location = './signin.html';</script>";
    }
    //echo "<script>alert('Password has been sent');</script>";
    //echo "<script>alert('Password has been sent.'); window.location = './Login.php';</script>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>