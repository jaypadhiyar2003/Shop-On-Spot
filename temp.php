<?php
$que2="SELECT * FROM `product`";
$run_que2=mysqli_query($con,$que2);
 if (mysqli_num_rows($run_que2)>0){
    while($row=mysqli_fetch_assoc($run_que2)){
        echo '<img src="uploads/'.$row['Prod_img'].'" width="50px;" height="50px;" alt="image"> ';
    }
 }
 else{
     echo "photo not found";
 }

?>