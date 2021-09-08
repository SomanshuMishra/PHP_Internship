<?php
session_start();
include 'conn.php';
if(isset($_SESSION['auth'])){
  header('location:e-com.php');
}
if(isset($_POST['done'])){

    $username  =  $_POST['name'];
    $password =  $_POST['password1'];
    
    $sql = "SELECT name   FROM login_authetication WHERE name = '$username' and password = '$password'";
    $sql1 = "SELECT id FROM login_authetication WHERE name='$username'";
    $result = mysqli_query($conn,$sql);
    $check = mysqli_fetch_array($result);
    $result1 = mysqli_query($conn,$sql1);
    $check1 = mysqli_fetch_array($result1);
    

    if(isset($check)){ 
      $_SESSION['id']=$check1['id'];
      $_SESSION['user']=$username;    
      $_SESSION['auth']=True;
      $id = $_SESSION['id'];
      $user = $_SESSION['user'];
      header("location:e-com.php");
    }else{
        
    }

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Somanshu | Login Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Login page </b></a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">


      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Full name" name="name" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password1" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-8">
            
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name='done'>Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>



      <a href="register.php" class="text-center">I do not have membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>