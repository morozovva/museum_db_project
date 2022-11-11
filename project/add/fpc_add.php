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

$sql1 = "INSERT INTO fpc_visit (  ";
$sql2 = " VALUES (  ";

if ($visit_number != '') {
    $sql1 .= " visit_number, ";
    $sql2 .= " '$visit_number', ";
}
if ($fpc_decision != '') {
    $sql1 .= " fpc_decision, ";
    $sql2 .= " '$fpc_decision', ";
}
if ($item_id != '') {
    $sql1 .= " item_id, ";
    $sql2 .= " '$item_id', ";
}

$sql = substr($sql1, 0, -2) . ")" . substr($sql2, 0, -2) . ")";

var_dump($sql);

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
//    header("Location: ../../employee.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

//header("Location: ../../fpc.php");
exit;



