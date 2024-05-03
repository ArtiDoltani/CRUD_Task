<?php 
session_start();
if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
include "decoration/_nav.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Dashboard</title>
  </head>
  <body>
     <div class="container my-5">
    <h2 >Employee Data</h2>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Location</th>
      <th scope="col">Department</th>
      <th scope="col">Signin Time</th>
      <th scope="col">Signout Time</th>
      <th scope="col">Total Time</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
   
    <?php
    require "dbconnection.php";
    // Dispaly Data
    $query_select="SELECT * FROM `employee`";
    $result_select=mysqli_query($conn,$query_select);
    $lt=strtotime('9:00:00');
    while($row=mysqli_fetch_assoc($result_select)){

      //this code will retrun floating numbers
  //  $start_time=strtotime($row['signin_time']);
  //   $end_time=strtotime($row['signout_time']);
  //   $total_time=abs($start_time - $end_time)/3600;

        $first  = new DateTime( $row['signin_time'] );
        $second = new DateTime( $row['signout_time'] );
        $diff = $first->diff( $second );
        echo" <tr>
        <th scope='row'>".$row['id']."</th>
      <td>".$row['First']."</td>
      <td>".$row['last']."</td>
      <td>".$row['email']."</td>
      <td>".$row['phone']."</td>
      <td>".$row['location']."</td>
      <td>".$row['dept']."</td>";
       // This is Sign In Time
      if(strtotime($row['signin_time'])< $lt){
        echo"<td>Early ".$row['signin_time']."</td>";
      }
      elseif(strtotime($row['signin_time'])> $lt){
        echo"<td>Late </td>";
      }
      else{
        echo"<td>on Time </td>";
      }
      // This is Sign out Time
      if($row['signout_time'] < "18:00"){
        echo"<td>Early
        
         </td>";
      }
      elseif($row['signout_time']> "18:00"){
        echo"<td>Late 
        
        </td>";
      }
     echo" 
     <td>". $diff->format( '%H:%I:%S' )."</td>
     <td>
      
                <a href='Edit.php?id=".$row['id']."' class='btn btn-success'>Edit</a> </td>
                
                <td>      <a href='delete.php?id=".$row['id']."' class='btn btn-danger'>Delete</a></td>
      </tr>
        ";
    }
    
    ?>
  </tbody>
</table>

<a href='add_employee.php' class='btn btn-primary'>Add Employee</a>
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