<html>
    <head>
        <title>Add Item</title>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css'>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    </head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid"><img src="/Shop On Spot/logo.png" height="80px" width="130px"></img>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="admin_home.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="Sales.php">Sales</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="additem.php">Add Item</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="manageitem.php">Manage Item</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="add_supplier.html">Add Suplier</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="add_admin.html">Add Admin</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="cat.php">Category</a>
              </li>
          
            </ul>
            
          </div>
        </div>
      </nav>
    <div  id="main"style="height:900px; width:1500px; font-family:'Times New Roman'; background-image:url('back.jpg')">
    <div style=" width:550px; height: 850px; top:15%; left:25%; transform: translate (-20%,-20%); position:absolute; background-color:#FFFFCC;">
    <div id="container" style="width:350px; top:5%; left:20%; transform: translate (-30%,-30%); position:absolute;">
    <form method="post" action="additem_db.php" enctype="multipart/form-data">
        <h3>Item Name</h3>
        <input type="text" name="Prod_name" required>
        <h3>Item Brand</h3>
        <input type="text" name="Prod_Brand" required>
        <h3>Item Category</h3>
        <select name="Prod_Cat">
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
        <h3>Item Quantity</h3>
        <input type="number" name="Prod_qty" required>
        <h3>Item Price</h3>
        <input type="number" name="Prod_Price" required>
        <br>
        <br>
        <div class="form-group">
        <h3>Upload Image:</h3>
							<input type="file" class="form-control" name="uploadImg" required>
                            <br><br>
							<span style="color:#f00;font-size:15px;"><b>Note:</b> Only  JPG, PNG and GIF images are allowed. Maximum upload size is 50kb </span>
                        </div>
                            <br><br>

        <h3>Item Discreption</h3>
        <textarea row="8" cols="50" name="Prod_Disc"required></textarea>
        <br><br>
        <input type="submit" class="btn btn-outline-success" name="Add" value="submit">
        </form>

    </div>
    </div>
</div>
</body>
</html>