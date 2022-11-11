<?php
date_default_timezone_set('Europe/Moscow');
$employee_id = $_POST["employee_id"] ?? null;
$position_id = $_POST["position_id"] ?? null;
$surname = $_POST["surname"] ?? null;
$name = $_POST["name"] ?? null;
$patronymic = $_POST["patronymic"] ?? null;
$phone_number = $_POST["phone_number"] ?? null;
$date_of_birth = $_POST["date_of_birth"] ?? null;
$date_of_employment = $_POST["date_of_employment"] ?? null;
$date_of_dismissal = $_POST["date_of_dismissal"] ?? null;
$status = $_POST["status"] ?? null;

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

$sql = "DELETE FROM employee
         WHERE";

if ($employee_id != '') {
    $sql .= " employee_id = '$employee_id' and";
}
if ($position_id != '') {
    $sql .= " position_id = '$position_id' and";
}
if ($surname != '') {
    $sql .= " surname = '$surname' and";
}
if ($name != '') {
    $sql .= " name = '$name' and";
}
if ($patronymic != '') {
    $sql .= " patronymic = '$patronymic' and";
}
if ($phone_number != '') {
    $sql .= " phone_number = '$phone_number' and";
}
if ($date_of_birth != '') {
    $sql .= " date_of_birth = '$date_of_birth' and";
}
if ($date_of_employment != '') {
    $sql .= " date_of_employment = '$date_of_employment' and";
}
if ($date_of_dismissal != '') {
    $sql .= " date_of_dismissal = '$date_of_dismissal' and";
}
if ($status != '') {
    $sql .= " status = '$status' and";
}
$sql = substr($sql, 0, -4);

//var_dump($sql);

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header("Location: ../../employee.php");
} else {
    echo "Ошибка: " . $sql . "<br>" . mysqli_error($conn)
        . "<br><br> Эту запись нельзя удалить, пока она используется в других таблицах:(";
}
exit;