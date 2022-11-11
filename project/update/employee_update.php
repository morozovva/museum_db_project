<?php
date_default_timezone_set('Europe/Moscow');

$s_employee_id = $_POST["s_employee_id"];
$s_position_id = $_POST["s_position_id"];
$s_surname = $_POST["s_surname"];
$s_name = $_POST["s_name"];
$s_patronymic = $_POST["s_patronymic"];
$s_phone_number = $_POST["s_phone_number"];
$s_date_of_birth = $_POST["s_date_of_birth"];
$s_date_of_employment = $_POST["s_date_of_employment"];
$s_date_of_dismissal = $_POST["s_date_of_dismissal"];
$s_status = $_POST["s_status"];

$w_employee_id = $_POST["w_employee_id"];
$w_position_id = $_POST["w_position_id"];
$w_surname = $_POST["w_surname"];
$w_name = $_POST["w_name"];
$w_patronymic = $_POST["w_patronymic"];
$w_phone_number = $_POST["w_phone_number"];
$w_date_of_birth = $_POST["w_date_of_birth"];
$w_date_of_employment = $_POST["w_date_of_employment"];
$w_date_of_dismissal = $_POST["w_date_of_dismissal"];
$w_status = $_POST["w_status"];


$host = "localhost";
$dbname = "museum_database";
$username = "root";
$password = "root";

$conn = mysqli_connect(hostname: $host,
    username: $username,
    password: $password,
    database: $dbname);

//var_dump($where);
if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}
$sql = "UPDATE employee SET";

if ($s_employee_id != '') {
    $sql .= " employee_id = '$s_employee_id',";
}
if ($s_position_id != '') {
    $sql .= " position_id = '$s_position_id',";
}
if ($s_surname != '') {
    $sql .= " surname = '$s_surname',";
}
if ($s_name != '') {
    $sql .= " name = '$s_name',";
}
if ($s_patronymic != '') {
    $sql .= " patronymic = '$s_patronymic',";
}
if ($s_phone_number != '') {
    $sql .= " phone_number = '$s_phone_number',";
}
if ($s_date_of_birth != '') {
    $sql .= " date_of_birth = '$s_date_of_birth',";
}
if ($s_date_of_employment != '') {
    $sql .= " date_of_employment = '$s_date_of_employment',";
}
if ($s_date_of_dismissal != '') {
    $sql .= " date_of_dismissal = '$s_date_of_dismissal',";
}
if ($s_status != '') {
    $sql .= " status = '$s_status',";
}
$sql = substr($sql, 0, -1) . " WHERE";

if ($w_employee_id != '') {
    $sql .= " employee_id = '$w_employee_id' and";
}
if ($w_position_id != '') {
    $sql .= " position_id = '$w_position_id' and";
}
if ($w_surname != '') {
    $sql .= " surname = '$w_surname' and";
}
if ($w_name != '') {
    $sql .= " name = '$w_name' and";
}
if ($w_patronymic != '') {
    $sql .= " patronymic = '$w_patronymic' and";
}
if ($w_phone_number != '') {
    $sql .= " phone_number = '$w_phone_number' and";
}
if ($w_date_of_birth != '') {
    $sql .= " date_of_birth = '$w_date_of_birth' and";
}
if ($w_date_of_employment != '') {
    $sql .= " date_of_employment = '$w_date_of_employment' and";
}
if ($w_date_of_dismissal != '') {
    $sql .= " date_of_dismissal = '$w_date_of_dismissal' and";
}
if ($w_status != '') {
    $sql .= " status = '$w_status' and";
}
$sql = substr($sql, 0, -4);
var_dump($sql);

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

//header("Location: ../../index.php");
exit;
