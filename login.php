<?php
require 'dbconnection.php';
$login=false;
if($_SERVER['REQUEST_METHOD']=='POST'){
    $email=$_POST['Email'];
    $password=$_POST['Password'];
      $query_select="SELECT * FROM `admin` where Email='$email' AND Password='$password'";
        $result_select=mysqli_query($conn,$query_select);
        $num=mysqli_num_rows($result_select);
        if($num==1){
            // $login=true;
           session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['Email']=$email;
            // echo"<script>alert('loggedin')</script>";
             header("location:dashboard.php");
        }
        else{
            echo"<script>alert('Invalid Username or Password ')</script>";
        }

}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body>

<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Sign up <span class="sr-only">(current)</span></a>
      </li>
           
    </ul>
  </div>
</nav> -->


  <div class="container my-4" >
        <h2>Login</h2>

        <form action="login.php" method="post">
        <label for="email">Email</label>
    <input type="text" class="form-control" id="email" name="Email" aria-describedby="emailHelp">

  <div class="form-group ">
    <label for="password" name="password">Password</label>
    <input type="password" class="form-control" id="password" name="Password">
  </div>
               
            <button type="submit" class="btn btn-primary">Login</button>
          </form>


      </div>

   

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>