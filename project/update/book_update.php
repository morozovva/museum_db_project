<?php
date_default_timezone_set('Europe/Moscow');

$w_record_number = $_POST["w_record_number"] ?? null;
$w_book_number = $_POST["w_book_number"] ?? null;

$s_record_number = $_POST["s_record_number"] ?? null;
$s_book_number = $_POST["s_book_number"] ?? null;

$host = "localhost";
$dbname = "museum_database";
$username = "root";
$password = "root";

$conn = mysqli_connect(hostname: $host,
    username: $username,
    password: $password,
    database: $dbname);

//var_dump($s_cell_number, $s_sector, $s_vacant, $w_cell_number, $w_sector, $w_vacant);
if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}
$sql = "UPDATE inventory_book SET";

if ($s_record_number != '') {
    $sql .= " record_number = '$s_record_number',";
}
if ($s_book_number != '') {
    $sql .= " book_number = '$s_book_number',";
}

$sql = substr($sql, 0, -1) . " WHERE";

if ($w_record_number != '') {
    $sql .= " record_number = '$w_record_number' and";
}
if ($w_book_number != '') {
    $sql .= " book_number = '$w_book_number' and";
}

$sql = substr($sql, 0, -4);
//var_dump($sql);

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header("Location: ../../book.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

exit;
