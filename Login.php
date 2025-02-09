<?php
require("header.php");
require("nav.php");
?>
<div style=" width:1550px; height:700px; background-image:url('back.jpg'); ">
<div style=" width:350px; height: 330px; top:15%; left:40%; transform: translate (-30%,-30%); position:absolute; background-color:#FFFFCC;">
<div id="cont" height="200px" Width="200px" >
<form method="Post" action="Login_Authentication.php">
    <center>
    <br>
    <h3>Email Id:</h3>
    <input type="email" name="eid" placeholder="name@example.com" required>
    <h3>Password:</h3>
    <input type="Password" name="password" required>
</br>
    </br>
    <input type="submit" class='btn btn-outline-success' name="Login" value="Login">
        </center>
</form>
<br>
<center>
<a href="signin.html">Register Your Self</a>
|
<a href="Admin.php">Login As Admin</a>
          </center>
<br>

<center>
<a href="Forgot_login.html">Forgot Password? </a></center>
</div>
</div>
    </div>







    <!-- -->

    <!-- -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- -->   <script src= "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


  </body>
  
<?php
require("footer.php");
?>
</html>