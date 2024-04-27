<?php
require 'dbconnection.php';

// This is used to get the values 
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="SELECT * FROM `employee` where `id` = '$id'";
    $result=mysqli_query($conn, $query);
    if($result){
       $row=mysqli_fetch_assoc($result);
       
    }}
    // this is used to update the values
if(isset($_POST['update'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $location=$_POST['location'];
    $dept=$_POST['dept'];
    $query_update="UPDATE `employee` SET `dept` = '$dept' ,`First`= '$fname', `last`='$lname',
     `email`= '$email', `phone`= '$phone', `location`='$location' WHERE `employee`.`id` = '$id'";
    $result_update=mysqli_query($conn, $query_update);
    if($result_update){
        header("location:dashboard.php");
        //echo"<script>alert('updated')</script>";
    }
    else{
        echo"<script>alert('Sorry: not updated')</script>";
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

    <title>Add</title>
  </head>
  <body>
    <div class="container my-4">
        <h2>Update Employee</h2>
    <form action="edit.php?id=<?php echo $id;?>" method='post'>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email"  value="<?php echo $row['email']?>" name="email" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="fname">First</label>
    <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $row['First']?>">
  </div>
  <div class="form-group">
    <label for="lname">Last</label>
    <input type="text" class="form-control" id="lname"  value="<?php echo $row['last']?>"   name="lname">
  </div>
  <div class="form-group">
    <label for="phone">Phone</label>
    <input type="number" class="form-control" id="phone"   value="<?php echo $row['phone']?>" name="phone">
  </div>
  <div class="form-group">
    <label for="location">Location</label>
    <input type="text" class="form-control" id="location"  value="<?php echo $row['location']?>" name="location">
  </div>
  <div class="form-group">
    <label for="dept">Department</label>
    <input type="text" class="form-control" id="dept"  value="<?php echo $row['dept']?>" name="dept">
  </div>
  <button type="submit" class="btn btn-primary" name="update">Update</button>
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