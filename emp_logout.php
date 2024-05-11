<?php
require 'dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $employee_id = $_POST['employee_id'];
    date_default_timezone_set('Asia/karachi');
    $logout_time = date('H:i:s');
    $date = date('Y-m-d');
    $employee_exist="SELECT* FROM `employee_attendance` where `employee_id` = '$employee_id' and `date`='$date' ";
    $result_exits=mysqli_query($conn, $employee_exist);
    $num_row= mysqli_num_rows($result_exits);
    if($num_row==0){
        echo"<script>alert('Not exists or Not loggedin');
        window.location.href='login_user.php';       
        </script>";
 }
else{
    $update_query = "UPDATE `employee_attendance` SET `logout_time` = '$logout_time' WHERE `employee_id` = '$employee_id' AND `date` = '$date'";
    $result_update = mysqli_query($conn, $update_query);
    if ($result_update) {
        echo "<script>alert('logged out')
        window.location.href='login_user.php';
        </script>";

                    exit();
    } else {
        echo "<script>alert('Failed to update logout time')</script>";
    }
}
}
?>
