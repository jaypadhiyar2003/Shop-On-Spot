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

$que1=mysqli_query($con,"SELECT * FROM `product`");


$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',20);
$pdf->Cell(0,10,'Shop On Spot',0,1,'C');
$pdf->Cell(10,10,'',0,1);
$pdf->Cell(0,10,'Inventory Details ',0,1,'C');
$pdf->SetFont('Arial','',16);



$pdf->Cell(10,10,'PId ',1,0);
$pdf->Cell(90,10,'Product Name ',1,0);
$pdf->Cell(40,10,'PBrand ',1,0);
$pdf->Cell(30,10,'quantity',1,0);
$pdf->Cell(20,10,'Price',1,1);



while($row=mysqli_fetch_array($que1))
{

    $name=$row['Prod_name'];
    $price=$row['Prod_Price'];
    $Prodid=$row['Prod_id'];
    $Prod_qty=$row['Prod_qty'];
    $Prod_brand=$row['Prod_Brand'];
          
    $pdf->Cell(10,10,$Prodid,1,0);
    $pdf->Cell(90,10,$name,1,0);
    $pdf->Cell(40,10,$Prod_brand,1,0);
    $pdf->Cell(30,10,$Prod_qty,1,0);
    $pdf->Cell(20,10,$price,1,1);

}


$pdf->Cell(10,10,'',0,0);
$pdf->Cell(90,10,'',0,0);
$pdf->Cell(40,10,'',0,0);
$pdf->Cell(30,10,'',0,0);
$pdf->Cell(20,10,'',0,1);
$pdf->Cell(10,10,'',0,0);
$pdf->Cell(90,10,'',0,0);
$pdf->Cell(50,10,'Authorised By :',0,0);
$pdf->Cell(30,10,'Shop On Spot',0,0,'R');
$pdf->Cell(20,10,'',0,1);





$pdf->Output();


?>
