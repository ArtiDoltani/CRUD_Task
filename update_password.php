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
  <?php 
    require "dbconnection.php";
    if(isset($_GET['Email'])&& isset($_GET['resettoken']) ){
        date_default_timezone_set('Asia/karachi');
        $date=date("Y-m-d");
        $query= "SELECT* from `admin` WHERE `Email` ='$_GET[Email]' and 
         `resettoken`='$_GET[resettoken]' and `token_expire`='$date'";
        $result= mysqli_query($conn, $query);
        if($result){
            if(mysqli_num_rows($result)>0){

            echo "<div class='container my-4' >
            <h2>Reset Password</h2>
    
            <form method='post'>
          
    
      <div class='form-group'>
        <label for='password' name='password'>Password</label>
        <input type='password' class='form-control' placeholder='New Password' id='password' name='Password'>
      </div>
      <div>
        <button type='submit' name='new_password' class='btn btn-primary'>Update</button>
        <input type='hidden' class='form-control' name='Email' value='$_GET[Email]' >
      </div>
                   
              </form>
          </div>"; }
            else{
                echo"
                <script>
                
                alert('invalid or Link is Expired');
                window.location.href='login.php';
                
                </script>";
            }
        }
        else{
            echo"
                <script>
                
                alert('Server is Down');
                window.location.href='login.php';
                
                </script>";

        }

    }
    else{

        " <script>
                
        alert('Server is Down');
        window.location.href='login.php';
        
        </script>";
    }  
    ?>

    <?php 
    if(isset($_POST['new_password'])){
      $pass=$_POST['Password'];
      $query_update="UPDATE `admin` SET `Password`='$pass',`resettoken`=Null,`token_expire`=Null
      WHERE `Email`='$_POST[Email]'";
      if(mysqli_query($conn,$query_update)){
        echo"
        
                <script>
                
                alert('Password Updated Successfully');
                window.location.href='login.php';
                
                </script>";
      }
      else{
        echo"
                <script>
                
                alert('Server is Down');
                window.location.href='login.php';
                
                </script>";

      }
    }
    
    ?>
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