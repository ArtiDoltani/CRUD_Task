<?php
require 'dbconnection.php';
$showalert=false;
if($_SERVER['REQUEST_METHOD']=='POST'){
    $email=$_POST['Email'];
    $password=$_POST['Password'];
    $user_exist="SELECT * FROM `admin` where `Email` = '$email'";
    $result_exits=mysqli_query($conn, $user_exist);
    $num_row= mysqli_num_rows($result_exits);
    if($num_row>0){
        $showalert=true;
    }
    else{
        $query_insert="INSERT INTO `admin` (`Email`, `Password`) VALUES ('$email', '$password')";
        $result_insert=mysqli_query($conn,$query_insert);
        if($result_insert){
          header("location:login.php");
         
 //   echo" account has been created successfully";
                
            
        }
        else{
            echo"<script>alert('error')</script>";
        }
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

    <title>Sign up</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="login.php">Admin Login</a>
    </li>
    
    <li class="nav-item active">
    <a class="nav-link" href="login_user.php">User Login</a>
  </li>

         
  </ul>
</div>
</nav>
<?php
if($showalert){

  echo " <div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong>Invalid!</strong> This user already exists.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
  </div>";
}

?>
<div class="container my-4">
        <h2>Sign Up</h2>

        <form action="index.php" method="post">
        <div class="form-group col-md-6">
        <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="Email" aria-describedby="emailHelp">
    </div>
  <div class="form-group col-md-6">
    <label for="password" name="password">Password</label>
    <input type="password" class="form-control" id="password" name="Password">
  </div>
               
            <button type="submit " class="btn btn-primary ">Sign Up</button>
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