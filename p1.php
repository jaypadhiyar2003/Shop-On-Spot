<html>
    <head>
        <title> temp </title>
</head>
<body>
 <table border="1">   
<?php
include 'cn.php';

$que2="SELECT  `Prod_name`,  `Prod_Price`, `Prod_img` FROM `product`";
$run_que2=mysqli_query($con,$que2);

while($row=mysqli_fetch_array($run_que2))
{
    $name=$row['Prod_name'];
    $price=$row['Prod_Price'];
    
        static $i=0;
        $i++;

     ?>
          <td><?php echo '<a href="detail.php"><img src="uploads/'.$row['Prod_img'].'" width="200px;" height="200px;" alt="image"> <br>'.$name.'<br> Price :'.$price.'</a>'; ?></td>
    <?php

    if($i==7){
         echo '<tr></tr>';
         $i=0;
    }
    ?>
    
    <?php
    
}
//echo $i;
?>
</table>
</body>
</html>
