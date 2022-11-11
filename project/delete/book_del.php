<?php
date_default_timezone_set('Europe/Moscow');
$record_number = $_POST["record_number"] ?? null;
$book_number = $_POST["book_number"] ?? null;

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

$sql = "DELETE FROM inventory_book
         WHERE";

if ($record_number != '') {
    $sql .= " record_number = '$record_number' and";
}
if ($book_number != '') {
    $sql .= " book_number = '$book_number' and";
}

$sql = substr($sql, 0, -4);

//var_dump($sql);

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header("Location: ../../book.php");
} else {
    echo "Ошибка: " . $sql . "<br>" . mysqli_error($conn)
        . "<br><br> Эту запись нельзя удалить, пока она используется в других таблицах:(";
}
exit;


