<?php
session_start();
include 'conn.php';
if(isset($_SESSION['auth'])){
  header('location:e-com.php');
}
if(isset($_POST['done'])){

    $username  =  $_POST['name'];
    $password =  $_POST['password1'];
    
    $sql = "SELECT name   FROM login_authentication WHERE name = '$username' and password = '$password'";
    $sql1 = "SELECT id FROM login_authentication WHERE name='$username'";
    $sql2 = "SELECT email FROM login_authentication WHERE name='$username'";
    $result = mysqli_query($conn,$sql);
    $check = mysqli_fetch_array($result);
    $result1 = mysqli_query($conn,$sql1);
    $check1 = mysqli_fetch_array($result1);
    $result2 = mysqli_query($conn,$result2);
    $check2 = mysqli_fetch_array($result2);

    if(isset($check)){ 
      $_SESSION['id']=$check1['id'];
      $_SESSION['user']=$username;    
      $_SESSION['auth']=True;
      $_SESSION['email']=$check2['email'];
      $id = $_SESSION['id'];
      $user = $_SESSION['user'];

    //   PHP MAILER START

    require 'PHPMailerAutoload.php';
    require 'credential.php';
    $mail = new PHPMailer;
    
    $mail->SMTPDebug = 4;                               // Enable verbose debug output
    
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = EMAIL;                 // SMTP username
    $mail->Password = PASS;                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    
    $mail->setFrom(EMAIL, 'PHP INTERNSHIP');
    $mail->addAddress([$_SESSION['email']]);     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo(EMAIL);
     // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML
    
    $mail->Subject = 'Php Internship Subject';
    $mail->Body    = '<div style="border:2px solid red;">You Logged into Php Project <b>Welcome</b></div>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }


    // PHP MAILER END

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
    
  </div>
</div>