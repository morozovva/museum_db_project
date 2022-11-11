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

<?php

$from = $_POST["from"];
$input_select_arr = $_POST["select"];
$join_from = $_POST["join_from"] ?? null;
$join_select_arr = $_POST["join_select"] ?? null;

//var_dump($join_select_arr);

$host = "localhost";
$dbname = "museum_database";
$username = "root";
$password = "root";

$conn = mysqli_connect(hostname: $host,
                        username: $username,
                        password: $password,
                        database: $dbname);

//var_dump($join_select);

if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}
    $sql = "DESCRIBE $from";
    $result = $conn->query($sql);
    $rows_from = [];
    while($row = $result-> fetch_assoc()) {
        array_push($rows_from, $row['Field']);
//        echo "<th>" . $row['Field'] . " " . "</th>";
    }

    if ($join_from <> null and $join_select_arr <> null) {
        $sql_j = "DESCRIBE $join_from";
        $result = $conn->query($sql_j);
        $rows_from_j = [];
        while($row = $result-> fetch_assoc()) {
            array_push($rows_from_j, $row['Field']);
            //        echo "<th>" . $row['Field'] . " " . "</th>";
        }

        $i = 0;
        $final_select_arr_j = [];
        while($i < count($rows_from_j)) {
            if (in_array($i,$join_select_arr)) {
                array_push($final_select_arr_j, $rows_from_j[$i]);
            }
            $i++;
        }
//        $sql2 = "";
        $final_select_j = implode(", ", $final_select_arr_j);
//        var_dump($final_select_j);
    }


    $i = 0;
    $final_select_arr = [];
    while($i < count($rows_from)) {
        if (in_array($i,$input_select_arr)) {
            array_push($final_select_arr, $rows_from[$i]);
        }
        $i++;
    }
$sql1 = "";
$final_select = implode(", ", $final_select_arr);

?>

<div class="container p-4">
    <h3>Результат запроса</h3>
<table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">#</th>

            <?php
            $i = 0;
            while($i < count($final_select_arr)) {
                echo "<th>" . $final_select_arr[$i] . "</th>";
                $i++;
            }
            $i = 0;
            if ($join_from <> null and $join_select_arr <> null) {
                while($i < count($final_select_arr_j)) {
                    echo "<th>" . $final_select_arr_j[$i] . "</th>";
                    $i++;
                }
            }
            ?>
        </tr>
    </thead>
    <tbody>
  <?php
$sql = "";

  $select1_finale = "";
      $i = 0;
      while($i < count($final_select_arr)) {
          $select1_finale .= $from . "." . $final_select_arr[$i] . ", ";
          $i++;
      }
      $i = 0;
      if ($join_from <> null and $join_select_arr <> null) {
          while($i < count($final_select_arr_j)) {
              $select1_finale .= $join_from . "." . $final_select_arr_j[$i] . ", ";
              $i++;
          }
      }

      $select1_finale = substr($select1_finale, 0, -2);

//      var_dump($select1_finale);

  $id = "";
  switch ([$from, $join_from]) {
      case ["employee", "act_of_accepting_an_object"]:
      case ["act_of_accepting_an_object", "employee"]:
          $id = "employee_id";
          break;
      case ["item", "act_of_accepting_an_object"] :
      case ["act_of_accepting_an_object", "item"] :
          $id = "act_number";
          break;
      case ["positons", "employee"]:
      case ["employee", "positons"] :
          $id = "position_id";
          break;
      case ["archive", "inventory_book"]:
      case ["inventory_book", "archive"] :
          $id = "book_number";
          break;
      case ["inventory_book", "item"]:
      case ["item", "inventory_book"] :
          $id = "record_number";
          break;
      case ["item", "storage_place"]:
      case ["storage_place", "item"]:
          $id = "act_number";
          break;
      case ["item", "fpc_visit"]:
      case ["fpc_visit", "item"] :
          $id = "item_id";
          break;
  }
//var_dump($join_from, $from,$id);
  if ($join_select_arr == NULL) {
      $sql = "SELECT $final_select FROM $from";
      }
  else {
      $sql = "SELECT $select1_finale FROM $from
                 INNER JOIN $join_from on $from.$id=$join_from.$id";
  }
//  var_dump($sql);
    $result = $conn->query($sql);
    $rowNumber = 1;
    if ($result->num_rows > 0) {
        while ($row = $result-> fetch_assoc()) {
            echo "<tr><th>" . "$rowNumber" . "</th>";
            $i = 0;
            while($i < count($final_select_arr)) {
                echo "<td>" . $row["$final_select_arr[$i]"] . "</td>";
                $i++;
            }
            if ($join_from <> null and $join_select_arr <> null) {
                $i = 0;
                while($i < count($final_select_arr_j)) {
                    echo "<td>" . $row["$final_select_arr_j[$i]"] . "</td>";
                    $i++;
                }
            }

        echo "</tr>";
        $rowNumber+=1;
        }
    }
    else {
        echo "No результатов";
    }
    $conn->close();
 ?>

    </tbody>
</table>
    <a href="query.php">
        <button type="button" class="btn btn-dark float-end">Ввести новый запрос</button>
    </a>
</div>
</body>
</html>
