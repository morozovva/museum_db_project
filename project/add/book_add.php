<?php
date_default_timezone_set('Europe/Moscow');
$record_number = $_POST["record_number"];
$book_number = $_POST["book_number"];

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

$sql1 = "INSERT INTO inventory_book (  ";
$sql2 = " VALUES (  ";

if ($record_number != '') {
    $sql1 .= " record_number, ";
    $sql2 .= " '$record_number', ";
}
if ($book_number != '') {
    $sql1 .= " book_number, ";
    $sql2 .= " '$book_number', ";
}

$sql = substr($sql1, 0, -2) . ")" . substr($sql2, 0, -2) . ")";

var_dump($sql);

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header("Location: ../../book.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

//header("Location: ../../book.php");
exit;

