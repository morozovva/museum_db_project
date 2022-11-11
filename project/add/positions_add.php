<?php

$duties = $_POST["duties"];

$host = "localhost";
$dbname = "museum_database";
$username = "root";
$password = "root";
        
$conn = mysqli_connect(hostname: $host,
                       username: $username,
                       password: $password,
                       database: $dbname);
        
//var_dump($duties);
 if (mysqli_connect_errno()) {
     die("Connection error: " . mysqli_connect_error());
 }
        
 $sql = "INSERT INTO positons (duties)
         VALUES (?)";

 $stmt = mysqli_stmt_init($conn);

 if ( ! mysqli_stmt_prepare($stmt, $sql)) {
 
     die(mysqli_error($conn));
 }

 mysqli_stmt_bind_param($stmt, "s",
                        $duties);

 mysqli_stmt_execute($stmt);

header("Location: ../../positions.php");
exit;