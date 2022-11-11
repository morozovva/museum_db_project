<?php
date_default_timezone_set('Europe/Moscow');
$item_id = $_POST["item_id"];
$appearance = $_POST["appearance"];
$origin = $_POST["origin"];
$date_of_admission = $_POST["date_of_admission"];
$date_of_admission = date('Y-m-d H:i:s', strtotime($date_of_admission));
$cell_number = $_POST["cell_number"];
$record_number = $_POST["record_number"];
$act_number = $_POST["act_number"];
$date_of_dismissal = $_POST["date_of_dismissal"];
$date_of_dismissal = date('Y-m-d H:i:s', strtotime($date_of_dismissal));


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
$sql = "DELETE FROM item
         WHERE ";
if ($item_id != '') {
    $sql .= "item_id = '$item_id' and";
}
if ($appearance != '') {
    $sql .= " appearance = '$appearance' and";
}
if ($origin != '') {
    $sql .= " origin = '$origin' and";
}
if ($date_of_admission != '1970-01-01 03:00:00') {
    $sql .= " date_of_admission = '$date_of_admission' and";
}
if ($record_number != '') {
    $sql .= " record_number = '$record_number' and";
}
if ($act_number != '') {
    $sql .= " act_number = '$act_number' and";
}
if ($cell_number != '') {
    $sql .= " cell_number = '$cell_number' and";
}
if ($date_of_dismissal != '1970-01-01 03:00:00') {
    $sql .= " date_of_dismissal = '$date_of_dismissal' and";
}
$sql = substr($sql, 0, -4);

//var_dump($sql, $appearance, $origin, $date_of_admission, $record_number,
//    $act_number, $cell_number);

//var_dump($sql);

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

header("Location: ../../index.php");
exit;
