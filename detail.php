<!doctype html> 
<html>
    <head>
        <title>
            Product information
        </title>
        <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
    <?php
include 'cn.php';
$id=$_REQUEST['Prod_id'];
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

$que=mysqli_query($con,"SELECT * FROM `product` WHERE `Prod_id`=$id;");
$row=mysqli_fetch_array($que);
$name=$row['Prod_name'];
$brand=$row['Prod_Brand'];
$cat=$row['Prod_cat'];
$price=$row['Prod_Price'];
$img=$row['Prod_img'];
$disc=$row['Prod_discreption'];





?>
        <div  id="main"style="height:740px; width:1500px; font-family:'Times New Roman'; background-image:url('back.jpg')">
            
            <div id="img" style="height: 650px; width: 500px; border-style:solid; border-width:3px; border-color:black; background-color:white; margin-left: 40px; margin-top: 20px; float: left;">
           <center>
            <?php  echo '<img src="uploads/'. $img .'" width="450px;" height="550px;" alt="image">';?>
</center>    
        </div>
            <div id="discription" style="height: 650px; width: 810px; margin-left: 40px;background-color:white; margin-top: 20px;float: right; border-style:solid; border-width:3px; border-color:black;">
            <div id="intro" style="height: 135px; width: 810px; padding-left:10px;">
               <strong> <p style="font-size:30px;"><?php echo $name."\n"; ?></p></strong>
               <strong> <p style="font-size:20px;"><?php echo "Price:- ".$price."RS"; ?></p></strong>
            </div>
            <div id="detail" style="height: 300px; width: 810px; padding-left:10px;">
                <strong><p style="font-size:30px;">Description <br></p></strong>
                <p style="font-size:20px"><?php echo "<strong>Brand:-</strong> ".$brand;?></p>
                <p style="font-size:20px"><?php echo "<strong>Category:-</strong> ".$cat;?></p>
                <p style="font-size:20px"><?php echo "<strong>About Product:-</strong> ".$disc;?></p>
            </div>
            <div id="nav_buttons" style="height: 162px; width: 810px; padding-left:10px;">

            <form method="POST" action="cart.php"> 
                <br><br>
                <input type="number" name="qty" min="1" max="10" required>
                <br>
                <br>
            
            <button type="submit" class="btn btn-success " name="ADD">Add To Cart</button>
            <input type="hidden" name="Pid" value="<?php echo $id; ?>">
            </form>
            <form method="POST" action="detail_action.php" ><button style="margin-top:10px;" type="submit" class="btn btn-warning" name="Back">Back</button> </form>
            </div>
      
                
        </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>