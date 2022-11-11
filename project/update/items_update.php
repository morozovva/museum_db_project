<?php
date_default_timezone_set('Europe/Moscow');

$s_item_id = $_POST["s_item_id"];
$s_appearance = $_POST["s_appearance"];
$s_origin = $_POST["s_origin"];
$s_date_of_admission = $_POST["s_date_of_admission"];
$s_date_of_admission = date('Y-m-d H:i:s', strtotime($s_date_of_admission));
$s_cell_number = $_POST["s_cell_number"];
$s_record_number = $_POST["s_record_number"];
$s_act_number = $_POST["s_act_number"];
$s_date_of_dismissal = $_POST["s_date_of_dismissal"];
$s_date_of_dismissal = date('Y-m-d H:i:s', strtotime($s_date_of_dismissal));

$w_item_id = $_POST["w_item_id"];
$w_appearance = $_POST["w_appearance"];
$w_origin = $_POST["w_origin"];
$w_date_of_admission = $_POST["w_date_of_admission"];
$w_date_of_admission = date('Y-m-d H:i:s', strtotime($w_date_of_admission));
$w_cell_number = $_POST["w_cell_number"];
$w_record_number = $_POST["w_record_number"];
$w_act_number = $_POST["w_act_number"];
$w_date_of_dismissal = $_POST["w_date_of_dismissal"];
$w_date_of_dismissal = date('Y-m-d H:i:s', strtotime($w_date_of_dismissal));

if ($s_date_of_admission == "1970-01-01 03:00:00") {
    $s_date_of_admission = "0";
}
if ($w_date_of_admission == "1970-01-01 03:00:00") {
    $w_date_of_admission = "0";
}
if ($s_date_of_dismissal == "1970-01-01 03:00:00") {
    $s_date_of_dismissal = "0";
}
if ($w_date_of_dismissal == "1970-01-01 03:00:00") {
    $w_date_of_dismissal = "0";
}

if (strlen($s_date_of_admission) > strlen(date('y-m-d H:i:s', time()))) {
//    die("error");
    var_dump($s_date_of_admission, date('y-m-d H:i:s', time()));
    var_dump(strlen($s_date_of_admission), strlen(date('y-m-d H:i:s', time())));
//    header("Location: ../../index.php");
    exit;
}
//if (strlen($s_date_of_dismissal) > strlen(date('y-m-d H:i:s', time()))) {
////    die("error");
//    header("Location: ../../index.php");
//    exit;
//}

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
$sql = "UPDATE item SET";

if ($s_item_id != '') {
    $sql .= " item_id = '$s_item_id',";
}
if ($s_appearance != '') {
    $sql .= " appearance = '$s_appearance',";
}
if ($s_origin != '') {
    $sql .= " origin = '$s_origin',";
}
if ($s_date_of_admission != '0') {
    $sql .= " date_of_admission = '$s_date_of_admission',";
}
if ($s_record_number != '') {
    $sql .= " record_number = '$s_record_number',";
}
if ($s_act_number != '') {
    $sql .= " act_number = '$s_act_number',";
}
if ($s_cell_number != '') {
    $sql .= " cell_number = '$s_cell_number',";
}
if ($s_date_of_dismissal != '0') {
    $sql .= " date_of_dismissal = '$s_date_of_dismissal',";
}
$sql = substr($sql, 0, -1) . " WHERE";

if ($w_item_id != '') {
    $sql .= " item_id = '$w_item_id' and";
}
if ($w_appearance != '') {
    $sql .= " appearance = '$w_appearance' and";
}
if ($w_origin != '') {
    $sql .= " origin = '$w_origin' and";
}
if ($w_date_of_admission != '0') {
    $sql .= " date_of_admission = '$w_date_of_admission' and";
}
if ($w_record_number != '') {
    $sql .= " record_number = '$w_record_number' and";
}
if ($w_act_number != '') {
    $sql .= " act_number = '$w_act_number' and";
}
if ($w_cell_number != '') {
    $sql .= " cell_number = '$w_cell_number' and";
}
if ($w_date_of_dismissal != '0') {
    $sql .= " date_of_dismissal = '$w_date_of_dismissal' and";
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
