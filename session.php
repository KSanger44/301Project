<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['fname'];
   
   $ses_sql = mysqli_query($conn,"SELECT fname FROM patient WHERE fname = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['fname'];
   
   if(!isset($_SESSION['fname'])){
      header("location:login.php");
      die();
   }
?>