<?php 
session_start();
include "conn.php";
include "base.php";
$search_item=$_GET['search_item'];


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Search</title>
</head>
<body>
    <h1>Search</h1>


<?php  
$sql = "SELECT * FROM crud1 WHERE prod_name = $search_item";
$res = mysqli_query($conn,$sql);

while($row=mysqli_fetch_array($res)){ ?>
    <div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="uploads/<?php echo $row['image_address'];?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <a href="index.php?id=<?php echo $row['id'];?>"><h5 class="card-title"><?php echo $row['prod_name']; ?></h5></a>
        <h5 class="card-title"><?php echo $row['price']; ?></h5>
        <p class="card-text"><?php echo $row['description']; ?></p>
        
      </div>
    </div>
  </div>
</div>

<?php } ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>