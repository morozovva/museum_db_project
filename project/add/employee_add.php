<?php
date_default_timezone_set('Europe/Moscow');
$position_id = $_POST["position_id"];
$surname = $_POST["surname"];
$name = $_POST["name"];
$patronymic = $_POST["patronymic"];
$phone_number = $_POST["phone_number"];
$date_of_birth = $_POST["date_of_birth"];
$date_of_employment = $_POST["date_of_employment"];
$date_of_dismissal = $_POST["date_of_dismissal"];

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

$sql1 = "INSERT INTO employee (  ";
$sql2 = " VALUES (  ";

if ($position_id != '') {
    $sql1 .= " position_id, ";
    $sql2 .= " '$position_id', ";
}
if ($surname != '') {
    $sql1 .= " surname, ";
    $sql2 .= " '$surname', ";
}
if ($name != '') {
    $sql1 .= " name, ";
    $sql2 .= " '$name', ";
}
if ($patronymic != '') {
    $sql1 .= " patronymic, ";
    $sql2 .= " '$patronymic', ";
}
if ($phone_number != '') {
    $sql1 .= " phone_number, ";
    $sql2 .= " '$phone_number', ";
}
if ($date_of_birth != '') {
    $sql1 .= " date_of_birth, ";
    $sql2 .= " '$date_of_birth', ";
}
if ($date_of_employment != '') {
    $sql1 .= " date_of_employment, ";
    $sql2 .= " '$date_of_employment', ";
}
$sql = substr($sql1, 0, -2) . ")" . substr($sql2, 0, -2) . ")";

var_dump($sql);

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

header("Location: ../../employee.php");
exit;
