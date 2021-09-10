<?php

$serverName = "localhost:3307";
$userName = "root";
$password = "";
$dbName = "php_mysql";  


  

$conn = mysqli_connect('localhost:3307','root','','php_mysql');
mysqli_select_db($conn,'php_mysql');
// if ($conn){
//     echo "Connected";
// }

// ?>