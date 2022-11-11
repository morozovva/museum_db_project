<?php
date_default_timezone_set('Europe/Moscow');
$book_number = $_POST["book_number"];

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

$sql = "INSERT INTO archive (book_number) VALUES ('$book_number')";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header("Location: ../../archive.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

//header("Location: ../../archive.php");
exit;

