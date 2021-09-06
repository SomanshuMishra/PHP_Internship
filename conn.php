<?php
$serverName = "localhost";
$userName = "root";
$password = "12345";
$dbName = "php_mysql";

// try {
//     $con = new PDO("mysql:host=$serverName;dbname=$dbName",$userName,$password);

//     $con ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//     echo " Connection Success"; 
// }
// catch(PDOException $e){
//     echo "Error in connection ". $e->getMessage();
// }
// $conn = new mysqli($serverName, $userName, $password);

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
//   }
//   echo "Connected successfully";
  

$conn = mysqli_connect('localhost','root','12345');
mysqli_select_db($conn,$dbName);

?>