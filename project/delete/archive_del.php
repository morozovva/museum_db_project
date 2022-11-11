<?php
date_default_timezone_set('Europe/Moscow');
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

$sql = "DELETE FROM archive 
       WHERE book_number = '$book_number'";

var_dump($sql);

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header("Location: ../../archive.php");
} else {
    echo "Ошибка: " . $sql . "<br>" . mysqli_error($conn)
        . "<br><br> Эту запись нельзя удалить, пока она используется в других таблицах:(";
}
exit;

