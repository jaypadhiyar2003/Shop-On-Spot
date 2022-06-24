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

$que="SELECT * FROM `customer` WHERE `email`='$email';";
$run_que=mysqli_query($con,$que);

$count=mysqli_num_rows($run_que);
$row=mysqli_fetch_array($run_que);

if($count>0){
    $password=$row['Password'];
    
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
    $mail->Subject = 'Password Recoveri';
    $mail->Body    = "Hi! $email  This is your password $password";
    $mail->AltBody = "Hi! $email  This is your password $password";

    $mail->send();
    //echo "<script>alert('Password has been sent');</script>";
    echo "<script>alert('Password has been sent.'); window.location = './Login.php';</script>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
else{
   // echo "<script>alert('Email is Wrong.');</script>";
    echo "<script>alert('Email is Wrong.'); window.location = './Forgot_login.html';</script>";
}

?>