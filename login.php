<?php
session_start();
include 'conn.php';

if(isset($_POST['done'])){

    $username  =  $_POST['name'];
    $password =  $_POST['password1'];
    
    $sql = "SELECT name   FROM register WHERE name = '$username' and password = '$password'";
    $result = mysqli_query($conn,$sql);
    $check = mysqli_fetch_array($result);
    // echo $check;
    if(isset($check)){
        
        header("location:e-commerce.php");
        $_SESSION['user']=$username;
        // echo $sql;
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