<?php

$position_id = $_POST["position_id"] ?? null;
$duties = $_POST["duties"] ?? null;

$host = "localhost";
$dbname = "museum_database";
$username = "root";
$password = "root";

$conn = mysqli_connect(hostname: $host,
    username: $username,
    password: $password,
    database: $dbname);

//var_dump($position_id, $duties);
if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}

if ($position_id == "" and $duties == "") {
    header("Location: ../../positions.php");
}
else if ($position_id == "") {
    $sql = "DELETE FROM positons
         WHERE duties = '$duties'";
    $position_id = -1;
}
else if ($duties == "") {
    $sql = "DELETE FROM positons
         WHERE position_id = $position_id";
    $duties = "-1";
}
else {
    $sql = "DELETE FROM positons
         WHERE position_id = $position_id and duties = '$duties'";
}

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header("Location: ../../positions.php");
} else {
    echo "Ошибка: " . $sql . "<br>" . mysqli_error($conn)
        . "<br><br> Эту запись нельзя удалить, пока она используется в других таблицах:(";
}
exit;