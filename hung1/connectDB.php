<?php
function connectDB() {
    $servername = "localhost";
    $username = "hung123";
    $password = "";
    $dbname = "comicstore";
  
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } 
    return $conn;
} 
?>