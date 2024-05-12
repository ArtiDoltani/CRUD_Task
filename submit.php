<?php
require 'dbconnection.php';
$login_alert=false;
if (isset($_POST['submit_button'])) {
    $clicked_button = $_POST['submit_button'];
    if ($clicked_button == 'signin_time') {
        // echo $c
        // Button 1 was clicked
        $employee_id = $_POST['employee_id'];
        $employee_exist = "SELECT* FROM `employee` where `id` = '$employee_id'";
        $result_exits = mysqli_query($conn, $employee_exist);
        $num_row = mysqli_num_rows($result_exits);
        if ($num_row == 0) {
            echo "<script>alert('invalid! Employee not Exists');
            window.location.href='login_user.php';
            </script>";
        } else {
            // $login=true;
            //session_start();
            // $_SESSION['signin_time']=true;
            // $_SESSION['employee_id']=$employee_id;
            // echo"<script>alert('loggedin')</script>";
            // header("location:dashboard.php");
            $query_insert = "INSERT INTO `employee_attendance` (`employee_id`)
             VALUES ('$employee_id')";
            $result_insert = mysqli_query($conn, $query_insert);
            if ($result_insert) {
                echo "<script>alert('Logged In');
            window.location.href='login_user.php';
            </script>";
            } else {
                echo "<script>alert('Server down')</script>";
            }
        }
    }
    // here is Button to Logout time
    elseif ($clicked_button == 'signout_time') {
        // Button 2 was clicked
        $employee_id = $_POST['employee_id'];
        date_default_timezone_set('Asia/karachi');
        $logout_time = date('H:i:s');
        $date = date('Y-m-d');
        $employee_exist = "SELECT* FROM `employee_attendance` where `employee_id` = '$employee_id' and `date`='$date' ";
        $result_exits = mysqli_query($conn, $employee_exist);
        $num_row = mysqli_num_rows($result_exits);
        if ($num_row == 0) {
            echo "<script>alert('Not exists or Not loggedin');
        window.location.href='login_user.php';       
        </script>";
        } else {
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
    // This Button is to Mark Absent

    elseif ($clicked_button == 'mark_absent') {
        // Button 3 was clicked
        $employee_id = $_POST['employee_id'];
        date_default_timezone_set('Asia/karachi');
        $login_time = date('00:00:00');
        $logout_time = date('00:00:00');
        $employee_exist = "SELECT* FROM `employee` where `id` = '$employee_id'";
        $result_exits = mysqli_query($conn, $employee_exist);
        $num_row = mysqli_num_rows($result_exits);
        if ($num_row == 0) {
            echo "<script>alert('invalid! Employee not Exists');
            window.location.href='login_user.php';
            </script>";
        } else {
            $query_insert = "INSERT INTO `employee_attendance` (`employee_id`, `login_time`,`logout_time`,`is_absent`) 
          VALUES ('$employee_id', '$login_time','$logout_time',1)";
            $result_insert = mysqli_query($conn, $query_insert);
            if ($result_insert) {
                echo "<script>alert('Marked as Absent');
            window.location.href='login_user.php';
            </script>";
            } else {
                echo "<script>alert('Server down')</script>";
            }
        }
    }
}
