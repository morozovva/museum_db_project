<?php
date_default_timezone_set('Europe/Moscow');

$w_position_id = $_POST["w_position_id"] ?? null;
$w_duties = $_POST["w_duties"] ?? null;

$s_position_id = $_POST["s_position_id"]?? null;
$s_duties = $_POST["s_duties"] ?? null;

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
$sql = "UPDATE positons SET";

if ($s_position_id != '') {
    $sql .= " position_id = '$s_position_id',";
}
if ($s_duties != '') {
    $sql .= " duties = '$s_duties',";
}

$sql = substr($sql, 0, -1) . " WHERE";

if ($w_position_id != '') {
    $sql .= " position_id = '$w_position_id' and";
}
if ($w_duties != '') {
    $sql .= " duties = '$w_duties' and";
}

$sql = substr($sql, 0, -4);
//var_dump($sql);

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header("Location: ../../positions.php");
} else {
    echo "Ошибка: " . $sql . "<br>" . mysqli_error($conn);
}

exit;