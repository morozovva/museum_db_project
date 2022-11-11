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

$sql = "DELETE FROM storage_place
         WHERE";

if ($cell_number != '') {
    $sql .= " cell_number = '$cell_number' and";
}
if ($vacant != '') {
    $sql .= " vacant = '$vacant' and";
}
if ($sector != '') {
    $sql .= " sector = '$sector' and";
}

$sql = substr($sql, 0, -4);

var_dump($sql);

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

header("Location: ../../storage.php");
exit;


