<?php
date_default_timezone_set('Europe/Moscow');

$w_visit_number = $_POST["w_visit_number"] ?? null;
$w_fpc_decision = $_POST["w_fpc_decision"] ?? null;
$w_item_id = $_POST["w_item_id"] ?? null;

$s_visit_number = $_POST["s_visit_number"] ?? null;
$s_fpc_decision = $_POST["s_fpc_decision"] ?? null;
$s_item_id = $_POST["s_item_id"] ?? null;

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
$sql = "UPDATE fpc_visit SET";

if ($s_visit_number != '') {
    $sql .= " visit_number = '$s_visit_number',";
}
if ($s_fpc_decision != '') {
    $sql .= " fpc_decision = '$s_fpc_decision',";
}
if ($s_item_id != '') {
    $sql .= " item_id = '$s_item_id',";
}

$sql = substr($sql, 0, -1) . " WHERE";

if ($w_visit_number != '') {
    $sql .= " visit_number = '$w_visit_number' and";
}
if ($w_fpc_decision != '') {
    $sql .= " fpc_decision = '$w_fpc_decision' and";
}
if ($w_item_id != '') {
    $sql .= " item_id = '$w_item_id' and";
}

$sql = substr($sql, 0, -4);
//var_dump($sql);

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header("Location: ../../fpc.php");
} else {
    echo "Ошибка: " . $sql . "<br>" . mysqli_error($conn);
}

exit;
