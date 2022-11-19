<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>База данных музея</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="project/main/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!--    <script src="https://cdn.jsdelivr.net/npm/swiffy-slider@1.5.3/dist/js/swiffy-slider.min.js" crossorigin="anonymous" defer></script>-->
    <!--    <link href="https://cdn.jsdelivr.net/npm/swiffy-slider@1.5.3/dist/css/swiffy-slider.min.css" rel="stylesheet" crossorigin="anonymous">-->
</head>

<body>
<script src="/bootstrap/js/bootstrap.bundle.min.js"> </script>
<script id="add_nav" src="/project/nav/nav.js"></script>

<div class="container p-4">
    <h3>Результат запроса</h3>

<?php

$find_what = $_POST["find_what"] ?? null;

$host = "localhost";
$dbname = "museum_database";
$username = "root";
$password = "root";

$conn = mysqli_connect(hostname: $host,
    username: $username,
    password: $password,
    database: $dbname);

function searchAllDB($search){
    $host = "localhost";
    $dbname = "museum_database";
    $username = "root";
    $password = "root";
//      $conn = mysqli_connect(hostname:

    $mysqli = new mysqli($host, $username, $password, $dbname);

    $out = "";
    $out1 = [];
    $total = 0;
    $sql = "SHOW TABLES";
    $rs = $mysqli->query($sql);
    if($rs->num_rows > 0){
        while($r = $rs->fetch_array()){
            $table = $r[0];
            $sql_search = "select * from ".$table." where ";
            $sql_search_fields = Array();
            $sql2 = "SHOW COLUMNS FROM ".$table;
            $rs2 = $mysqli->query($sql2);
            if($rs2->num_rows > 0){
                while($r2 = $rs2->fetch_array()){
                    $colum = $r2[0];
                    $sql_search_fields[] = $colum." like('%".$search."%')";
                    if(strpos($colum,$search))
                    {
                        echo "FIELD NAME: ".$colum."\n";
                    }
                }
                $rs2->close();
            }
            $sql_search .= implode(" OR ", $sql_search_fields);
            $rs3 = $mysqli->query($sql_search);
            if($rs3 && $rs3->num_rows > 0)
            {
                $out .= $table." ";
                if($rs3->num_rows > 0){
                    $total += $rs3->num_rows;
                   array_push($out1, $rs3->fetch_all());
                    $rs3->close();
                }
            }
        }
        echo "<label>По вашему запросу было найдено $total результатов</label>";
        $rs->close();
    }
//    var_dump($out1);
    return [$out, $out1];
}

function remove_word($sentence)
{
    $exp = explode(' ', $sentence);
    $removed_words = array_shift($exp);
    if(count($exp)>1){
        $w = implode(' ', $exp);
    }else{
        $w = $exp[0];
    }
    return $w;
}

$result_dbs_s = searchAllDB($find_what);

$result_dbs = explode(" ", substr($result_dbs_s[0], 0, -1));
$result_data = $result_dbs_s[1];
//$final_select = implode(", ", $final_select_arr);
//var_dump($result_dbs);

//var_dump($result_dbs);

for ($x = 0; $x <= count($result_dbs)+1; $x++) {
//    echo "The number is: $x <br>";

$conn = mysqli_connect("localhost", "root", "root", "museum_database");
$curr = array_shift($result_dbs);
//var_dump($curr);
if ($curr == NULL){
    break;
}
?>
    <table class='table table-hover'>
        <thead>
        <tr>
            <th scope='col'>#</th>
            <?php
            $sql = "DESCRIBE $curr";
//            var_dump($sql);
            echo "<br> Таблица " . $curr;
            $result = $conn->query($sql);
            while($row = $result-> fetch_assoc()) {
                echo "<th>" . $row['Field'] . "</th>";
            }
            ?>

        </tr>
        </thead>
        <tbody>
        <?php
        $sql = "DESCRIBE $curr";
        $result = $conn->query($sql);
        $rows_from = [];
        while($row = $result-> fetch_assoc()) {
            array_push($rows_from, $row['Field']);
        }
        $i = 0;
        $final_select_arr = [];
        while($i < count($rows_from)) {
            array_push($final_select_arr, $rows_from[$i]);
            $i++;
        }

        for ($j = 0; $j < count($result_data[$x]); $j++) {
            echo "<tr><th>" . "$j" . "</th>";
            for ($k = 0; $k < count($result_data[$x][$j]); $k++){
//                var_dump($result_data[$x][$j][$k]);
//                echo "<br><br>";
                echo "<td>" . $result_data[$x][$j][$k] . "</td>";
            }
            echo "</tr>";
//            echo "<br>";
        }
}
?>

</tbody>
</table>

    <?php
//while ($result_dbs > []){
//
//    $sql = "SELECT * FROM $curr";
//    $result = $conn->query($sql);
//    $rowNumber = 1;
//    if ($result->num_rows > 0) {
//        $i = 0;
//        while($i < count($result_dbs_s[1][0])) {
//            echo "<td>" . $row[$result_dbs_s[1][0][$i]] . "</td>";
//            $i++;
//        }
//    }
//    else {
//        echo "No результатов";
//    }
//    $conn->close();
//    ?>
<!--    </tbody>-->
<!--    --><?php
//}

?>
<!--    </div>-->
<a href="finder.php">
        <button type="button" class="btn btn-dark float-end">Ввести новый запрос</button>
    </a>
    <br>
</div>
</body>
</html>
