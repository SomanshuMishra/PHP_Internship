
<?php 
session_start();
include "conn.php";

$prod_id = $_SESSION['id'];
if(isset($_POST['auth'])){
  unset($_SESSION['auth']);
  header("Location:login.php");
}
if(isset($_GET['id'])){
  $del_id=$_GET['id'];
  $sql = "DELETE FROM crud where id = $del_id";
  $res = mysqli_query($conn,$sql);
}




?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Products!</title>
    <style>
      .container{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap:wrap  ;
        min-height: 100vh;
      }
      .alb{
        height: 200px;
        width: 200px;
        padding-top: 15px;
        margin: 10px;
        
      }
      .alb img{
        /* max-width: 100%; */
        /* height: 200%; */
        margin: 30px;
      }
      .card{
        /* margin-block: 20px; */
        padding-left: 20px;
      }
    </style>
  </head>
  <body>
    <!-- <h1>Hello, world!</h1> -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="e-com.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="products.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="crud.php" tabindex="-1" >CRUD</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?php echo $_SESSION['user'] ?> 
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <form action="" method="post">
            <!-- <li type="submit" name='auth' >Logout</li> -->
          <button type="submit" name='auth'>Logouttt</button> 
            </form>
            <!-- <input type="submit" name='auth' value="Logout"> -->
            
            
          </ul>
        </li>
        
      </ul>
      <!-- <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>

<div class="container" >
<?php

$result_per_page=3;
$sql1 = "SELECT * from crud WHERE prod_id= '$prod_id' ";
$res1 = mysqli_query($conn,$sql1);
$number_of_results = mysqli_num_rows($res1);
$number_of_pages = ceil($number_of_results/$result_per_page);

if(!isset($_GET['page'])){
    $page=1;
}else{
    $page=$_GET['page'];
}

$this_page_first_result = ($page-1)* $result_per_page;

$sql2 = "SELECT * from crud WHERE prod_id= '$prod_id' LIMIT ".$this_page_first_result.','.$result_per_page;
$res2 = mysqli_query($conn,$sql2);?>


<!-- Pagination -->
<?php for($page=1;$page<=$number_of_pages;$page++){?>
<nav aria-label="...">
  <ul class="pagination pagination-lg">
    <li class="page-item active" aria-current="page">
      <span class="page-link " ><?php echo '<a href="products.php?page='.$page.'">'.$page.'</a>'; ?></span>
    </li>
  </ul>
</nav>
<?php }?>

<?php while($row=mysqli_fetch_array($res2)){?>
    


  <!-- start -->
  
  <div class="card mb-4 mx-3" style="width: 540px; height: auto; min-height:280px; ">
  <div class="row g-0" >
    <div class="col-md-4 ">
    <img src="uploads/<?php echo $row['image_address'];?>" width="200px" height="100px" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <?php    ?>
        <h4 class="card-title"><?php echo $row['prod_name']; ?></h4>
        <h5>(₹ <?php echo $row['price'];?>)</h5>
        <p class="card-text"><?php $d =$row['description'];$rest = substr($d,0,180); echo $rest?>.....</p>
        <h5><a href="index.php?id=<?php echo $row['id']; ?>">Open </a></h5>
        <h5><a href="products.php?id=<?php echo $row['id']; ?>">Delete </a></h5>
        
      </div>
    </div>
  </div>
</div>

<!-- End -->
<?php }



?>

</div>


<!-- CARAOUSEL -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>