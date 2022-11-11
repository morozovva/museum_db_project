<?php

$position_id = $_POST["position_id"];
$duties = $_POST["duties"];

$host = "localhost";
$dbname = "museum_database";
$username = "root";
$password = "root";

$conn = mysqli_connect(hostname: $host,
    username: $username,
    password: $password,
    database: $dbname);

var_dump($position_id, $duties);
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

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($conn));
}
var_dump($position_id, $duties);
mysqli_stmt_execute($stmt);

header("Location: ../../positions.php");
exit;