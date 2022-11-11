<?php
date_default_timezone_set('Europe/Moscow');
$appearance = $_POST["appearance"];
$origin = $_POST["origin"];
$date_of_admission = $_POST["date_of_admission"];
var_dump($date_of_admission);
$date_of_admission = date('Y-m-d H:i:s', strtotime($date_of_admission));
$cell_number = $_POST["cell_number"];
if ($cell_number == "") {
    $cell_number = "NULL";
}

if ($date_of_admission == "1970-01-01 03:00:00") {
    $date_of_admission = date('Y-m-d H:i:s', time());
}
var_dump($date_of_admission, date('Y-m-d H:i:s', time()));
if (strlen($date_of_admission) > strlen(date('Y-m-d H:i:s', time()))) {
    die("error");
//    header("Location: ../../index.php");
    exit;
}

$record_number = $_POST["record_number"];
$act_number = $_POST["act_number"];
if ($record_number == "") {
    $record_number = "NULL";
}
if ($act_number == "") {
    $act_number = "NULL";
}
//$date_of_dismissal = $_POST["date_of_dismissal"];


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

$sql = "INSERT INTO item (appearance, origin, date_of_admission, record_number, act_number, cell_number)
         VALUES ('$appearance','$origin', '$date_of_admission', $record_number,
    $act_number, $cell_number)";

//var_dump($sql, $appearance, $origin, $date_of_admission, $record_number,
//    $act_number, $cell_number);

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

//header("Location: ../../index.php");
exit;
