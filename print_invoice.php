<?php
require('vendor/fpdf/fpdf.php');

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
$oid=$_POST["oid"];
session_start();
$cid=$_SESSION["cust_id"];
date_default_timezone_set('Asia/Kolkata');
$odate=date('y-m-d');

$que5=mysqli_query($con,"SELECT * FROM `c_bill` WHERE `cust_id`='$cid' AND `odate`='$odate' AND order_id='$oid'");
$row5=mysqli_fetch_array($que5);
$address=$row5[6];
$que=mysqli_query($con,"SELECT * FROM `customer` WHERE `Cust_id`=$cid");
$row=mysqli_fetch_array($que);
$fname=$row['First_name'];
$lname=$row['Last_name'];

$email=$row['email'];
$phono=$row['Phone_no'];

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',20);
$pdf->Cell(0,10,'Shop On Spot',0,1,'C');
$pdf->Cell(10,10,'',0,1);
$pdf->Cell(0,10,'Customer Invoice ',0,1,'C');
$pdf->SetFont('Arial','',16);
$pdf->cell(40,10,"Order Id: ",0,0);
$pdf->Cell(40,10,$oid,0,1);
$pdf->Cell(40,10,'Name :',0,0);
$pdf->Cell(70,10,$fname.' '.$lname,0,1);
$pdf->Cell(40,10,'Address :',0,0);
$pdf->Cell(100,10,$address,0,1);
$pdf->Cell(30,10,'Email id:',0,0);
$pdf->Cell(100,10,$email,0,1);
$pdf->Cell(30,10,'Phone no:',0,0);
$pdf->Cell(100,10,$phono,0,1);
//$pdf->Cell(40,10,'Order Date :',0,0);
//$pdf->Cell(100,10,$date,0,1);

$pdf->Cell(40,10,'Contact Us :',0,0);
$pdf->Cell(60,10,'9429739261',0,1);

$pdf->Cell(10,10,'No ',1,0);
$pdf->Cell(115,10,'Name ',1,0);
$pdf->Cell(30,10,'Quantity ',1,0);
$pdf->Cell(30,10,'Total ',1,1);

$i=0;
    $grandtotal=array();
    foreach($_SESSION['Product_cart'] as $key=>$value){
        $i++;
        $productq=mysqli_query($con,"SELECT * FROM `product` WHERE `Prod_id`='{$value}'") or die(mysqli_error($con));
        $row=mysqli_fetch_array($productq);
        
        $qty=$_SESSION['qtyitem'][$key];
        $subtotal=$row['Prod_Price'] * $qty;
        $pname=$row['Prod_name'];
        $pprice=$row['Prod_Price'];

        $pdf->Cell(10,10,$i,1,0);
    $pdf->Cell(115,10,$pname,1,0);
    $pdf->Cell(30,10,$qty,1,0);
    $pdf->Cell(30,10,$subtotal,1,1);
    $grandtotal[]=$subtotal;
    }



    $finaltotal=array_sum($grandtotal);
    $pdf->Cell(10,10,'',0,0);
    $pdf->Cell(75,10,'',0,0);
    $pdf->Cell(30,10,'',0,0);
    $pdf->cell(50,10,"Grand Total:",1,0);
    $pdf->Cell(20,10,$finaltotal,1,1);
/*

require('vendor\mpdf\vendor\mpdf\mpdf\src\Mpdf.php');


if(isset($_SESSION['Product_cart']) && !empty($_SESSION['Product_cart'])){
    $data ='';
    $data .= "<table align='center' width='100%'>";
    $data .="<tr align='center'>";
    $data .="<th>Sr no.</th>";
    $data .="<th>Name</th>";
    $data .="<th>Price</th>";
    $data .="<th>Quantity</th>";

    $data .= "</tr>";
    
        $data .= "<tr align='center'>";
        $data .= "<td>$i</td>";
        $data .= "<td><img src='uploads/{$row['Prod_img']}' style='width:100px;'></td>";
        $data .="<td>{}</td>";
        $data .= "<td>{}</td>";
        $data .= "<td>$qty</td>";
        $data .="<td>$subtotal</td>";
        $data .= "</tr>";
       $grandtotal[]=$subtotal;
       
    }

    

    $data .= "<tr>";
    $data .= "<td></td>";
    $data .= "<td></td>";
    $data .= "<td></td>";
    $data .= "<td></td>";
    $data .= "<td></td>";
    $data .= "<td><center>$finaltotal</center></td>";
    $data .= "</tr>";
    $data .= "</table>";
    

    $mpdf = new \mPDF();

    $mpdf->WriteHTML($data);

    $mpdf->Output('myfile.pdf','D');
  
}*/







$pdf->Output(); 
unset($_SESSION['Product_cart']);
unset($_SESSION['qtyitem']);

?>
