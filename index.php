<?php
session_start();
if(isset($_POST['auth'])){
    unset($_SESSION['auth']);
    header("Location:login.php");
  
  
  }
include "base.php";
include "conn.php";
if(isset($_GET['id'])){
    // echo $_GET['id'];
    $id = $_GET['id'];

    $sql = "SELECT * from  crud WHERE id= '$id' ORDER BY id DESC ";
    $res = mysqli_query($conn,$sql);
    if($res){
        $file = mysqli_fetch_assoc($res);
        // echo var_dump($file);
    }



}   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
    <h1> Hello <?php echo $_SESSION['user']; ?></h1>
    
    <img src="uploads/<?php echo $file['image_address']; ?>"width=20% height=100% alt="Nopes" >




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body>
</html>