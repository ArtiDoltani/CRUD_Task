<?php
require 'dbconnection.php';
$showalert=false;
if($_SERVER['REQUEST_METHOD']=='POST'){
    $email=$_POST['Email'];
    $password=$_POST['Password'];
    $exits=false;
    if($exits==false){
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
