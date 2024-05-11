<?php
require "dbconnection.php"; 
//For Employee record
if(isset($_GET['id'])){
    $id=$_GET['id'];
      $query_delete="DELETE FROM `employee_attendance` WHERE `employee_id`=  '$id'";
      $result_delete=mysqli_query($conn, $query_delete);
      if($result_delete){
          echo"<script>
          alert('Deleted Successfully');
          window.location.href='attendance_report.php';
          </script>";
         // header("location:dashboard.php");
      }
      else{
          echo " data is not deleted";
      }
  }
  // Delete operation For employee Attendance 


?>