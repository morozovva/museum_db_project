<?php
date_default_timezone_set('Europe/Moscow');
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

//var_dump($sql);

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header("Location: ../../act.php");
} else {
    echo "Ошибка: " . $sql . "<br>" . mysqli_error($conn)
    . "<br><br> Эту запись нельзя удалить, пока она используется в других таблицах:(";
}
exit;



