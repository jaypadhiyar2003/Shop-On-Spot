<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>About Us</title>
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
              <a class="nav-link " aria-current="page" href="index1.php">Home</a>
            </li>
    
            <li class="nav-item">
               <a class="nav-link active" href="About.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="viewcart.php">Cart</a>
            </li>
            <li class="nav-item">
              <?php
               session_start();
      
               if(isset($_SESSION["cust_id"])){
                 echo "<a class='nav-link' href='userprofile.php'>My Profile</a>";
               }
               else{
                  echo "<a class='nav-link' href='Login.php'>Login</a>";
               }
               ?>
               </li>
          
          </ul>
          </div>
          </div>
          </nav>

          <div style="border: 2px;background-image: url('back.jpg'); width: 1520px; height: 630px; ">
          <br>
          <br>
            <center>
            <div id="header" style="height: 100px; width: 1300px; background-color: rgb(208, 255, 0); color: crimson; font-size: 70px;">
            <P>Welcome to Shop On Spot !!!</P>
          </div>
          <div id="content1" style="font-size: 30px; height: 400px; width: 1300px; color: rgb(251, 255, 0); background-color: darkseagreen; text-align: left;">
          <p>Get your dream Product here.</p>  
          <p>Our Customer is most important for Us
          </p>
          <p>The Shop On Spot is a online shoping website (E-Commerce website) Which is created for the project(semester-6).<br>
            This website is created using Technologyes like PHP,HTML,CSS,Java Script,MYSQL and for designing of the website the references is taken from bootstrap.<br>
            The website is created by 3 students of BBIT-Computer Department namely Kalpkumar Dalsania,Jay Padhiyar and Jaimin Rana under the guidence of Mr. Hitesh Patel (Prof BBIT).</p>

          </div>
        </center>  
        </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>