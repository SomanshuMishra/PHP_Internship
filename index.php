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

    $sql = "SELECT * from  crud1 WHERE id= '$id' ORDER BY id DESC ";
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
    <style>
        html,body{
            overflow-x: hidden;
        }
    .header img {
  float: left;
  width: 30%;
  height: auto;
  background: #555;
  
}

.header h1 {
  position: relative;
  top: 40px;
  left: 140px;
}
.header h3{
    position: relative;
    top: 100px;
    left: 0px;
    right: 100px;
    font-weight:200;
}
.conatiner1{
    float: right;
}
</style>
</head>
<body>
    
    <div class="header">
    <img src="uploads/<?php echo $file['image_address']; ?>"width=30% height=100% alt="Can't Load Image..." >

    <h1>
        <?php  echo $file['prod_name'];  ?>
    </h1>

    
    <h3>
<?php echo $file['description']; ?>
    </h3>


</div>
<div class="container1">
<button class="btn btn-success">BUY</button> 
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body>
</html>