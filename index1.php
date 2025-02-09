<table>   
<?php
require("header.php");
require("nav.php");
include 'cn.php';

if(!$_GET){
$que2="SELECT `Prod_id`, `Prod_name`,  `Prod_Price`, `Prod_img` FROM `product`";
$run_que2=mysqli_query($con,$que2);
while($row=mysqli_fetch_array($run_que2))
{
    $name=$row['Prod_name'];
    $price=$row['Prod_Price'];
    $Prodid=$row['Prod_id'];

    //echo $Prod_id;
        static $i=0;
        $i++;

     ?>
          <td><?php  echo '<a href="detail.php?Prod_id='. $Prodid. '"><img src="uploads/'.$row['Prod_img'].'" width="200px;" height="200px;" alt="image"> <br><center>'.$name.'<br> Price :'.$price.'</center></a>'; ?></td>
    <?php

    if($i==7){
         echo '<tr></tr>';
         $i=0;
    }
    ?>
    
    <?php
    
}
}
else{



?>
</table>
<table>
<?php

$cat=$_GET["Prod_Cat"];
$que3="SELECT `Prod_id`, `Prod_name`,  `Prod_Price`, `Prod_img` FROM `product` WHERE `Prod_cat`='$cat'";
$run_que3 = mysqli_query($con,$que3);
while($row1=mysqli_fetch_array($run_que3))
{
    $name1=$row1['Prod_name'];
    $price1=$row1['Prod_Price'];
    $Prodid1=$row1['Prod_id'];
    //echo $Prod_id;
        static $i1=0;
        $i1++;
     ?>
          <td><?php  echo '<a href="detail.php?Prod_id='. $Prodid1. '"><img src="uploads/'.$row1['Prod_img'].'" width="200px;" height="200px;" alt="image"> <br><center>'.$name1.'<br> Price :'.$price1.'</center></a>'; ?></td>
    <?php

    if($i1==7){
         echo '<tr></tr>';
         $i1=0;
    }
    ?>
    
    <?php
    
}
}
?>
</table>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
   <script src= "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



<br>
<br>

<?php
require("footer.php");
?>



   <script src="js/script.js"></script>
  </body>
</html>