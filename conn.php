<?php

$serverName = "localhost:3307";
$userName = "root";
$password = "";
$dbName = "php_mysql";  

// try {
//     $conn = new PDO("mysql:host=$serverName;dbname=$dbName",$userName,$password);

//     $conn ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
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
  

$conn = mysqli_connect('localhost:3307','root','','php_mysql');
mysqli_select_db($conn,'php_mysql');
// if ($conn){
//     echo "Connected";
// }

// ?>