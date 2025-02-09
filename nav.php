<?php
$ca=$_GET["Prod_Cat"];
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid"><img src="/Shop On Spot/Logosop.png" height="80px" width="130px"></img>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php echo (($_SERVER['REQUEST_URI'] == '/shop%20on%20spot/index1.php')or($_SERVER['REQUEST_URI'] == '/shop%20on%20spot/index1.php?Prod_Cat='.$ca)) ? 'active' : '';?> " aria-current="page" href="index1.php">Home</a>
        </li>

        <li class="nav-item">
           <a class="nav-link <?php echo $_SERVER['REQUEST_URI'] == '/shop%20on%20spot/About.php' ? 'active' : ''; ?>" href="About.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $_SERVER['REQUEST_URI'] == '/shop%20on%20spot/viewcart.php' ? 'active' : ''; ?>" href="viewcart.php">Cart</a>
        </li>
        <li class="nav-item">
        <?php
        
         session_start();

         if(isset($_SESSION["cust_id"])){
            $f='active';    
            echo "<a class='nav-link $f' href='userprofile.php'>My Profile</a>";
         }
         else{
            $_SERVER['REQUEST_URI'] == '/shop%20on%20spot/Login.php' ? $f='active' : $f='';
            echo "<a class='nav-link $f' href='Login.php'>Login</a>";
         }
         ?>
         </li>
        
    
      </ul>
      <?php 
      if(($_SERVER['REQUEST_URI'] == '/shop%20on%20spot/index1.php') or ($_SERVER['REQUEST_URI'] == '/shop%20on%20spot/index1.php?Prod_Cat='.$ca)){ 
        
       ?>
       <form action="/shop%20on%20spot/index1.php" method="get" target="_parent">
      <select id="Prod_Cat" name="Prod_Cat">
        <?php
         include 'cn.php';
          $que5=mysqli_query($con,"SELECT * FROM `cate`");
          
  
          while($row5=mysqli_fetch_array($que5) ){
                $cat=$row5[1];
            ?>
          <option value="<?php echo $cat; ?>"><?php echo $cat; ?></option>
          <?php
          
          }

        ?> 
        </select>
       
        <button class="btn btn-outline-success" type="submit" >Search</button>
          </form>
          <?php
       }
          ?>
    </div>
  </div>
</nav>
