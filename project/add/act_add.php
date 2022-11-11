<?php

$act_number = $_POST["act_number"] ?? null;
$employee_id = $_POST["employee_id"] ?? null;
$document_file = $_POST["document_file"] ?? null;


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

$sql1 = "INSERT INTO act_of_accepting_an_object (  ";
$sql2 = " VALUES (  ";

if ($act_number != '') {
    $sql1 .= " act_number, ";
    $sql2 .= " '$act_number', ";
}
if ($employee_id != '') {
    $sql1 .= " employee_id, ";
    $sql2 .= " '$employee_id', ";
}
if ($document_file != '') {
    $sql1 .= " document_file, ";
    $sql2 .= " '$document_file', ";
}

$sql = substr($sql1, 0, -2) . ")" . substr($sql2, 0, -2) . ")";

//var_dump($sql);

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header("Location: ../../act.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

exit;


