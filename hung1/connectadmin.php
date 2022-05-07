<?php 
  
$conn = ""; 
   
try { 
	$server_host = "localhost";
	$database = "comicstore";
    $username = "hung123"; 
    $password = ""; 
   
    $conn = new PDO( 
        "mysql:host=$server_host; dbname=comicstore", 
        $username, $password
    ); 
      
   $conn->setAttribute(PDO::ATTR_ERRMODE, 
                    PDO::ERRMODE_EXCEPTION); 
} 
catch(PDOException $e) { 
    echo "Connection failed: " . $e->getMessage(); 
} 
  
?> 