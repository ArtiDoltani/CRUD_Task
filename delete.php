<?php
require "dbconnection.php"; 
if(isset($_GET['id'])){
  $id=$_GET['id'];
    $query_delete="DELETE FROM `employee` WHERE `employee`.`id` = '$id'";
    $result_delete=mysqli_query($conn, $query_delete);
    if($result_delete){
        echo"<script>alert('Deleted Successfully')</script>";
       // header("location:dashboard.php");
    }
    else{
        echo " data is not deleted";
    }
}
?>