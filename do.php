<?php
require 'vendor/autoload.php';

use Dompdf\Dompdf;
$dompdf=new Dompdf();

$dompdf->lodeHtml('<h1>hello</h1>');
$dompdf->stream();
?>