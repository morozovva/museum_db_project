<?php
date_default_timezone_set('Europe/Moscow');
$act_number = $_POST["act_number"];
$employee_id = $_POST["employee_id"];
$document_file = $_POST["document_file"];

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

$sql = "DELETE FROM act_of_accepting_an_object
         WHERE";

if ($act_number != '') {
    $sql .= " act_number = '$act_number' and";
}
if ($employee_id != '') {
    $sql .= " employee_id = '$employee_id' and";
}
if ($document_file != '') {
    $sql .= " document_file = '$document_file' and";
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



