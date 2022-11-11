<?php
date_default_timezone_set('Europe/Moscow');
$cell_number = $_POST["cell_number"];
$vacant = $_POST["vacant"];
$sector = $_POST["sector"];


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

$sql1 = "INSERT INTO storage_place (  ";
$sql2 = " VALUES (  ";

if ($cell_number != '') {
    $sql1 .= " cell_number, ";
    $sql2 .= " '$cell_number', ";
}
if ($vacant != '') {
    $sql1 .= " vacant, ";
    $sql2 .= " '$vacant', ";
}
if ($sector != '') {
    $sql1 .= " sector, ";
    $sql2 .= " '$sector', ";
}

$sql = substr($sql1, 0, -2) . ")" . substr($sql2, 0, -2) . ")";

var_dump($sql);

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header("Location: ../../storage.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

header("Location: ../../storage.php");
exit;

