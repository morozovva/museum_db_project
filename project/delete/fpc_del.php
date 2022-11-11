<?php
date_default_timezone_set('Europe/Moscow');
$visit_number = $_POST["visit_number"];
$fpc_decision = $_POST["fpc_decision"];
$item_id = $_POST["item_id"];

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

$sql = "DELETE FROM fpc_visit
         WHERE";

if ($visit_number != '') {
    $sql .= " visit_number = '$visit_number' and";
}
if ($fpc_decision != '') {
    $sql .= " fpc_decision = '$fpc_decision' and";
}
if ($item_id != '') {
    $sql .= " item_id = '$item_id' and";
}

$sql = substr($sql, 0, -4);

var_dump($sql);

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

header("Location: ../../fpc.php");
exit;




