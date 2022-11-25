<!DOCTYPE html>
<?php
    include("config.php");
    session_start();
   
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $password = mysqli_real_escape_string($conn,$_POST['password']); 
        
        $sql = "SELECT * FROM patient WHERE email = '$email' and pw = '$password'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $fname = $row["fname"];
        //$fname = $row['fname'];
        //$active = $row['active'];
        
        $count = mysqli_num_rows($result);
        
        // If result matched $email and $password, table row must be 1 row
		
        if($count == 1) {
         //session_register("myusername");
            $_SESSION['fname'] = $fname;
         
            header("location: index.php");
        }else {
            $error = "Your Login Email or Password is invalid";
      }
   }
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<div class="container login-container">
    <div class="row">
        <div class="col-md-6">
            <h3>Login</h3>
            <form action="" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name = "email" placeholder="Email" value="" />
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name = "password" placeholder="Password" value="" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btnSubmit" value="Login" />
                </div>
                <div class="form-group">
                    <a href="#" class="ForgetPwd">Forgot Password?</a>
                    <span id="forgotpwdsent"></span>
                </div>
            </form>
        </div>
    </div>
</div>