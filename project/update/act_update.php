<?php
date_default_timezone_set('Europe/Moscow');

$w_act_number = $_POST["w_act_number"];
$w_employee_id = $_POST["w_employee_id"];
$w_document_file = $_POST["w_document_file"];

$s_act_number = $_POST["s_act_number"];
$s_employee_id = $_POST["s_employee_id"];
$s_document_file = $_POST["s_document_file"];

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
$sql = "UPDATE act_of_accepting_an_object SET";

if ($s_act_number != '') {
    $sql .= " act_number = '$s_act_number',";
}
if ($s_employee_id != '') {
    $sql .= " employee_id = '$s_employee_id',";
}
if ($s_document_file != '') {
    $sql .= " document_file = '$s_document_file',";
}

$sql = substr($sql, 0, -1) . " WHERE";

if ($w_act_number != '') {
    $sql .= " act_number = '$w_act_number' and";
}
if ($w_employee_id != '') {
    $sql .= " employee_id = '$w_employee_id' and";
}
if ($w_document_file != '') {
    $sql .= " document_file = '$w_document_file' and";
}

$sql = substr($sql, 0, -4);
var_dump($sql);

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

header("Location: ../../act.php");
exit;

