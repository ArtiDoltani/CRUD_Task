<?php
$username="root";
$password="";
$servername="localhost";
$database="crud_employee";
$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    echo"Sorry could not connect ".mysqli_connect_error()."";
}


?>