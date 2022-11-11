<?php
date_default_timezone_set('Europe/Moscow');

$s_book_number = $_POST["s_book_number"] ?? null;

$w_book_number = $_POST["w_book_number"] ?? null;

$host = "localhost";
$dbname = "museum_database";
$username = "root";
$password = "root";

$conn = mysqli_connect(hostname: $host,
    username: $username,
    password: $password,
    database: $dbname);

if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}
$sql = "UPDATE archive SET
           book_number = '$s_book_number'
           WHERE book_number = '$w_book_number'";

var_dump($sql);

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header("Location: ../../archive.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


exit;
