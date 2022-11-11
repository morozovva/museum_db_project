<?php
date_default_timezone_set('Europe/Moscow');

$s_cell_number = $_POST["s_cell_number"] ?? null;
$s_vacant = $_POST["s_vacant"] ?? null;
$s_sector = $_POST["s_sector"] ?? null;

$w_cell_number = $_POST["w_cell_number"] ?? null;
$w_vacant = $_POST["w_vacant"] ?? null;
$w_sector = $_POST["w_sector"] ?? null;

$host = "localhost";
$dbname = "museum_database";
$username = "root";
$password = "root";

$conn = mysqli_connect(hostname: $host,
    username: $username,
    password: $password,
    database: $dbname);

var_dump($s_cell_number, $s_sector, $s_vacant, $w_cell_number, $w_sector, $w_vacant);
if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}
$sql = "UPDATE storage_place SET";

if ($s_cell_number != '') {
    $sql .= " cell_number = '$s_cell_number',";
}
if ($s_vacant != '') {
    $sql .= " vacant = '$s_vacant',";
}
if ($s_sector != '') {
    $sql .= " sector = '$s_sector',";
}

$sql = substr($sql, 0, -1) . " WHERE";

if ($w_cell_number != '') {
    $sql .= " cell_number = '$w_cell_number' and";
}
if ($w_vacant != '') {
    $sql .= " vacant = '$w_vacant' and";
}
if ($w_sector != '') {
    $sql .= " sector = '$w_sector' and";
}

$sql = substr($sql, 0, -4);
//var_dump($sql);

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header("Location: ../../storage.php");
} else {
    echo "Ошибка: " . $sql . "<br>" . mysqli_error($conn);
}

exit;